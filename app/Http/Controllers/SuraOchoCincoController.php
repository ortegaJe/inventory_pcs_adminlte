<?php

namespace App\Http\Controllers;

use App\Helpers\UserSystemInfoHelper;
use App\Machine;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class SuraOchoCincoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
    }

    public function index(Request $request)
    {
        $name_campu_table_index = DB::table('campus')->get();

        //info_box//
        $atril_count = DB::table('machines')
            ->select('type_id', 'campus_id', 'status_deleted_at', 'deleted_at')
            ->where('status_deleted_at', '=', [1])
            ->where('deleted_at', '=', NULL)
            ->where('type_id', '=', [2]) //id en la tabla types
            ->where('campus_id', '=', [9]) //id en la tabla campus
            ->count();

        $type_atril = DB::table('types')->get(); //nombres de los tipos

        $pc_count = DB::table('machines')
            ->select('type_id', 'campus_id', 'status_deleted_at')
            ->where('status_deleted_at', '=', [1])
            ->where('deleted_at', '=', NULL)
            ->where('type_id', '=', [1])
            ->where('campus_id', '=', [9])
            ->count();

        $type_pc = DB::table('types')->get();

        $laptop_count = DB::table('machines')
            ->select('type_id', 'campus_id', 'status_deleted_at')
            ->where('status_deleted_at', '=', [1])
            ->where('deleted_at', '=', NULL)
            ->where('type_id', '=', [3])
            ->where('campus_id', '=', [9])
            ->count();

        $type_laptop = DB::table('types')->get();

        $berry_count = DB::table('machines')
            ->select('type_id', 'campus_id', 'status_deleted_at')
            ->where('status_deleted_at', '=', [1])
            ->where('deleted_at', '=', NULL)
            ->where('type_id', '=', [4])
            ->where('campus_id', '=', [9])
            ->count();

        $type_berry = DB::table('types')->get();
        //end info_box//

        if ($request->ajax()) {
            $s85_machines = DB::table('machines AS m')
                ->join('types AS t', 't.id', '=', 'm.type_id')
                ->join('campus AS c', 'c.id', '=', 'm.campus_id')
                ->select(
                    'm.id',
                    't.name',
                    'm.serial',
                    'm.manufacturer',
                    'm.model',
                    'm.cpu',
                    'm.name_pc',
                    'm.ip_range',
                    'm.mac_address',
                    'm.anydesk',
                    'm.os',
                    'm.location',
                    'm.comment',
                    'm.created_at',
                    'c.campu_name'
                )->where('label', '=', 'S85')->whereNull('deleted_at');

            return DataTables::of($s85_machines)
                ->addColumn('action', 'sedes.sura_85.actions')
                ->rawColumns(['action'])
                ->make(true);
        }

        return view(
            'sedes.sura_85.index',
            [
                'name_campu_table_index' => $name_campu_table_index,
                'atril_count' => $atril_count,
                'type_atril' => $type_atril,
                'pc_count' => $pc_count,
                'type_pc' => $type_pc,
                'laptop_count' => $laptop_count,
                'type_laptop' => $type_laptop,
                'berry_count' => $berry_count,
                'type_berry' => $type_berry
            ]
        );
    }

    public function export_excel()
    {
        //return new MachinesExport;
    }

    public function exportPdf()
    {
        //return new MachinesPdfExport;
        //return $this->excel->download(new MachinesPdfExport, 'invoices.pdf', Excel::DOMPDF);
        $s85_machines = DB::table('machines AS m')
            ->join('types AS t', 't.id', '=', 'm.type_id')
            ->join('campus AS c', 'c.id', '=', 'm.campus_id')
            ->select(
                'm.id',
                't.name',
                'm.serial',
                'm.manufacturer',
                'm.model',
                'm.cpu',
                'm.name_pc',
                'm.ip_range',
                'm.mac_address',
                'm.anydesk',
                'm.os',
                'm.location',
                'm.comment',
                'm.created_at',
                'c.campu_name'
            )->where('label', '=', 'S85')->whereNull('deleted_at');
        $types = DB::select('SELECT id,name FROM types', [1]);
        $rams = DB::select('SELECT id,ram FROM rams', [1]);
        $hdds = DB::select('SELECT id,size,type FROM hdds', [1]);
        $campus = DB::select('SELECT id,campu_name FROM campus', [1]);

        $pdf = PDF::loadView(
            'machines.table_machines',
            [
                's85_machines' => $s85_machines,
                'types' => $types,
                'campus' => $campus,
                'rams' => $rams,
                'hdds' => $hdds,
            ]
        )->setPaper('a4', 'landscape');

        return $pdf->stream('export-machines.pdf');
    }

    public function create()
    {
        $s85_machines = DB::select('SELECT `id`,`serial`, `lote`, `type_id`, `manufacturer`, 
                                       `model`, `ram_slot_00_id`, `ram_slot_01_id`, 
                                       `hard_drive_id`, `cpu`, `ip_range`, `mac_address`,
                                       `anydesk`, `campus_id`, `location`, `image`, 
                                       `comment`, `created_at`, `updated_at` 
                                        FROM 
                                       `machines` WHERE campus_id=9', [1]);

        $types = DB::select('SELECT id,name FROM types', [1]);
        $rams = DB::select('SELECT id,ram FROM rams', [1]);
        $hdds = DB::select('SELECT id,size,type FROM hdds', [1]);
        $campus = DB::select('SELECT id,campu_name FROM campus', [1]);
        $name_campu_table_index = DB::table('campus')->get();
        $s85_campus = DB::table('campus')->select('id', 'campu_name')->where('label', '=', 'S85')->get();

        //$getip = UserSystemInfoHelper::get_ip();
        $findmacaddress = exec('getmac');
        $getmacaddress = strtok($findmacaddress, ' ');
        $getos = UserSystemInfoHelper::get_os();

        return view('sedes.sura_85.create', [
            's85_machines' => $s85_machines,
            'name_campu_table_index' => $name_campu_table_index,
            's85_campus' => $s85_campus,
            'types' => $types,
            'campus' => $campus,
            'rams' => $rams,
            'hdds' => $hdds,
            'getmacaddress' => $getmacaddress,
            'getos' => $getos,
            //'getip' => $getip,
        ]);
    }

    public function store(Request $request)
    {
        //$getip = UserSystemInfoHelper::get_ip();
        //$findmacaddress = exec('getmac');
        //$getmacaddress = strtok($findmacaddress, ' ');

        $roles = Auth::user()->rol_id;

        $machines = new Machine();

        //               [db]           [name] (db campos en la base de datos - name campus en el blade create)
        $machines->type_id = request('type');
        $machines->manufacturer = request('manufact');
        $machines->model = request('model');
        $machines->serial = request('serial');
        $machines->ram_slot_00_id = request('ramslot00');
        $machines->ram_slot_01_id = request('ramslot01');
        $machines->hard_drive_id = request('hard-drive');
        $machines->cpu = request('cpu');
        $machines->name_pc = request('name-pc');
        $machines->ip_range = request('ip');
        $machines->mac_address = request('mac');
        $machines->anydesk = request('anydesk');
        $machines->os = request('os');
        $machines->created_by = Auth::user()->id;
        $machines->rol_id = $roles;
        $machines->status_deleted_at = request('status');
        $machines->campus_id = request('campus');
        $machines->location = request('location');
        $machines->comment = request('comment');
        //dd($machines);
        $machines->save();

        return redirect('/sedes/sura_85');
    }

    public function edit($machines)
    {
        $types = DB::select('SELECT id,name FROM types', [1]);
        $rams = DB::select('SELECT id,ram FROM rams', [1]);
        $hdds = DB::select('SELECT id,size,type FROM hdds', [1]);
        $campus = DB::select('SELECT id,campu_name FROM campus', [1]);
        $s85_campus = DB::table('campus')->select('id', 'campu_name')->where('label', '=', 'S85')->get();

        //$getos = UserSystemInfoHelper::get_os();

        return view('sedes.sura_85.edit', [
            'machine' => Machine::findOrFail($machines),
            's85_campus' => $s85_campus,
            //'getos' => $getos,
            'types' => $types,
            'campus' => $campus,
            'rams' => $rams,
            'hdds' => $hdds
        ]);
    }

    public function update(Request $request, $id)
    {
        //$getos = UserSystemInfoHelper::get_os();

        $machines = Machine::findOrFail($id);

        //        [db]                 [name] (db campos en la base de datos - name campus en el blade edit)
        $machines->type_id = $request->get('type');
        $machines->manufacturer = $request->get('manufact');
        $machines->model = $request->get('model');
        $machines->serial = $request->get('serial');
        $machines->ram_slot_00_id = $request->get('ramslot00');
        $machines->ram_slot_01_id = $request->get('ramslot01');
        $machines->hard_drive_id = $request->get('hard-drive');
        $machines->cpu = $request->get('cpu');
        $machines->name_pc = request('name-pc');
        $machines->ip_range = $request->get('ip');
        $machines->mac_address = $request->get('mac');
        $machines->anydesk = $request->get('anydesk');
        $machines->os = $request->get('os');
        $machines->campus_id = $request->get('campus_id');
        $machines->location = $request->get('location');
        $machines->comment = $request->get('comment');

        $machines->update();

        return redirect('/sedes/sura_85');
    }

    public function destroy($id)
    {
        $mac_machines = Machine::findOrFail($id);


        if ($mac_machines->delete()) { // If softdeleted

            $ts = now()->toDateTimeString();
            $data = array('deleted_at' => $ts, 'status_deleted_at' => 0);
            DB::table('machines')->where('id', $id)->update($data);
        }

        return redirect('/sedes/sura_85');
    }
}
