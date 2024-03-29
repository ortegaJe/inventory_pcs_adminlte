<?php

namespace App\Http\Controllers;

use App\Exports\CompensarExport;
use App\Helpers\UserSystemInfoHelper;
use App\Machine;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Excel;
use Yajra\DataTables\Facades\DataTables;

class CompensarController extends Controller
{
    public function __construct(Excel $excel)
    {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->excel = $excel;
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
            ->where('campus_id', '=', [19]) //id en la tabla campus
            ->count();

        $type_atril = DB::table('types')->get(); //nombres de los tipos

        $pc_count = DB::table('machines')
            ->select('type_id', 'campus_id', 'status_deleted_at')
            ->where('status_deleted_at', '=', [1])
            ->where('deleted_at', '=', NULL)
            ->where('type_id', '=', [1])
            ->where('campus_id', '=', [19])
            ->count();

        $type_pc = DB::table('types')->get();

        $laptop_count = DB::table('machines')
            ->select('type_id', 'campus_id', 'status_deleted_at')
            ->where('status_deleted_at', '=', [1])
            ->where('deleted_at', '=', NULL)
            ->where('type_id', '=', [3])
            ->where('campus_id', '=', [19])
            ->count();

        $type_laptop = DB::table('types')->get();

        $berry_count = DB::table('machines')
            ->select('type_id', 'campus_id', 'status_deleted_at')
            ->where('status_deleted_at', '=', [1])
            ->where('deleted_at', '=', NULL)
            ->where('type_id', '=', [4])
            ->where('campus_id', '=', [19])
            ->count();

        $type_berry = DB::table('types')->get();
        //end info_box//

        if ($request->ajax()) {
            $comp_machines = DB::table('machines AS m')
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
                )
                ->join('types AS t', 't.id', '=', 'm.type_id')
                ->join('campus AS c', 'c.id', '=', 'm.campus_id')
                ->where('c.label', '=', 'COMP')
                ->where('m.status_deleted_at', '=', 1)
                ->whereNull('deleted_at');

            return DataTables::of($comp_machines)
                ->addColumn('action', 'sedes.compensar.actions')
                ->rawColumns(['action'])
                ->make(true);
        }

        return view(
            'sedes.compensar.index',
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
        return new CompensarExport;
    }

    public function export_pdf()
    {
        //return new MachinesPdfExport;
        //return $this->excel->download(new MachinesPdfExport, 'invoices.pdf', Excel::DOMPDF);
        $machines = DB::table('machines')
            ->select(
                'types.name',
                'machines.serial',
                'machines.manufacturer',
                'machines.model',
                'machines.cpu',
                'hdds.size',
                'hdds.type',
                'ram0.ram AS r0',
                'ram1.ram AS r1',
                'machines.name_pc',
                'machines.ip_range',
                'machines.mac_address',
                'machines.anydesk',
                'machines.os',
                'machines.location',
                'machines.comment',
                'machines.created_at',
                'campus.campu_name'
            )
            ->leftJoin('types', 'types.id', '=', 'machines.type_id')
            ->leftJoin('hdds', 'hdds.id', '=', 'machines.hard_drive_id')
            ->leftJoin('campus', 'campus.id', '=', 'machines.campus_id')
            ->leftJoin('rams AS ram0', 'ram0.id', '=', 'machines.ram_slot_00_id')
            ->leftJoin('rams AS ram1', 'ram1.id', '=', 'machines.ram_slot_01_id')
            ->where('machines.status_deleted_at', '=', 1)
            ->where('campus.label', '=', 'COMP')
            ->orderBy('machines.id', 'ASC')
            ->get();

        $pdf = PDF::loadView(
            'machines.export_pdf_table',
            [
                'machines' => $machines
            ]
        )->setPaper('a4', 'landscape');

        return $pdf->stream('inventor_export_comp.pdf');
    }

    public function create()
    {
        $comp_machines = DB::select('SELECT `id`,`serial`, `lote`, `type_id`, `manufacturer`, 
                                       `model`, `ram_slot_00_id`, `ram_slot_01_id`, 
                                       `hard_drive_id`, `cpu`, `ip_range`, `mac_address`,
                                       `anydesk`, `campus_id`, `location`, `image`, 
                                       `comment`, `created_at`, `updated_at` 
                                        FROM 
                                       `machines` WHERE campus_id=19', [1]);

        $types = DB::select('SELECT id,name FROM types', [1]);
        $rams = DB::select('SELECT id,ram FROM rams', [1]);
        $hdds = DB::select('SELECT id,size,type FROM hdds', [1]);
        $campus = DB::select('SELECT id,campu_name FROM campus', [1]);
        $name_campu_table_index = DB::table('campus')->get();
        $comp_campus = DB::table('campus')->select('id', 'campu_name')->where('label', '=', 'COMP')->get();
        $s85_campus = DB::table('campus')->select('id', 'campu_name')->where('label', '=', 'S85')->get();

        //$getip = UserSystemInfoHelper::get_ip();
        $findmacaddress = exec('getmac');
        $getmacaddress = strtok($findmacaddress, ' ');
        $getos = UserSystemInfoHelper::get_os();

        return view('sedes.compensar.create', [
            's85_campus' => $s85_campus,
            'comp_machines' => $comp_machines,
            'name_campu_table_index' => $name_campu_table_index,
            'comp_campus' => $comp_campus,
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

        return redirect('/sedes/compensar')->with(
            'machine_created',
            'Nuevo equipo fué añadido al inventario'
        );
    }

    public function edit($machines)
    {
        $types = DB::select('SELECT id,name FROM types', [1]);
        $rams = DB::select('SELECT id,ram FROM rams', [1]);
        $hdds = DB::select('SELECT id,size,type FROM hdds', [1]);
        $campus = DB::select('SELECT id,campu_name FROM campus', [1]);
        $comp_campus = DB::table('campus')->select('id', 'campu_name')->where('label', '=', 'COMP')->get();

        //$getos = UserSystemInfoHelper::get_os();

        return view('sedes.compensar.edit', [
            'machine' => Machine::findOrFail($machines),
            'comp_campus' => $comp_campus,
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

        return redirect('/sedes/compensar')
            ->with(
                'machine_update',
                'Equipo fue actualizado en el inventario'
            );
    }

    public function destroy($id)
    {
        $mac_machines = Machine::findOrFail($id);


        if ($mac_machines->delete()) { // If softdeleted

            $ts = now()->toDateTimeString();
            $data = array('deleted_at' => $ts, 'status_deleted_at' => 0);
            DB::table('machines')->where('id', $id)->update($data);
        }

        return redirect('/sedes/compensar')
            ->with(
                'machine_deleted',
                'Equipo eliminado del inventario'
            );
    }
}
