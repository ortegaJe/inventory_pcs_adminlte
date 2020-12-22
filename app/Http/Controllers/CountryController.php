<?php

namespace App\Http\Controllers;

use App\Exports\CountryExport;
use App\Helpers\UserSystemInfoHelper;
use App\Machine;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class CountryController extends Controller
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
            ->where('campus_id', '=', [18]) //id en la tabla campus
            ->count();

        $type_atril = DB::table('types')->get(); //nombres de los tipos

        $pc_count = DB::table('machines')
            ->select('type_id', 'campus_id', 'status_deleted_at')
            ->where('status_deleted_at', '=', [1])
            ->where('deleted_at', '=', NULL)
            ->where('type_id', '=', [1])
            ->where('campus_id', '=', [18])
            ->count();

        $type_pc = DB::table('types')->get();

        $laptop_count = DB::table('machines')
            ->select('type_id', 'campus_id', 'status_deleted_at')
            ->where('status_deleted_at', '=', [1])
            ->where('deleted_at', '=', NULL)
            ->where('type_id', '=', [3])
            ->where('campus_id', '=', [18])
            ->count();

        $type_laptop = DB::table('types')->get();

        $berry_count = DB::table('machines')
            ->select('type_id', 'campus_id', 'status_deleted_at')
            ->where('status_deleted_at', '=', [1])
            ->where('deleted_at', '=', NULL)
            ->where('type_id', '=', [4])
            ->where('campus_id', '=', [18])
            ->count();

        $type_berry = DB::table('types')->get();
        //end info_box//

        if ($request->ajax()) {
            DB::statement(DB::raw('set @rownum=0'));
            $ctry_machines = DB::table('machines AS m')
                ->join('types AS t', 't.id', '=', 'm.type_id')
                ->join('campus AS c', 'c.id', '=', 'm.campus_id')
                ->select([
                    DB::raw('@rownum  := @rownum  + 1 AS rownum'),
                    'm.id',
                    't.name',
                    'm.serial',
                    'm.serial_monitor',
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
                ])
                ->where('c.label', '=', 'CTRY')
                ->where('m.status_deleted_at', '=', 1)
                ->orderByDesc('m.created_at', 'DESC')
                ->whereNull('deleted_at');

            $datatables = DataTables::of($ctry_machines);

            $datatables->addColumn('rownum', 'whereRaw', '@rownum  + 1');

            $datatables->editColumn('m.created_at', function ($ctry_machines) {
                return $ctry_machines->created_at ? with(new Carbon($ctry_machines->created_at))
                    ->toDayDateTimeString() : '';
            });
            $datatables->addColumn('action', 'sedes.country.actions');
            $datatables->rawColumns(['action']);
            return $datatables->make(true);
        }

        return view(
            'sedes.country.index',
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
        return new CountryExport;
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
            ->where('campus.label', '=', 'CTRY')
            ->orderBy('machines.id', 'ASC')
            ->get();

        $pdf = PDF::loadView(
            'machines.export_pdf_table',
            [
                'machines' => $machines
            ]
        )->setPaper('a4', 'landscape');

        return $pdf->stream('inventor_export_ctry.pdf');
    }

    public function create()
    {
        $types = DB::select('SELECT id,name FROM types', [1]);
        $rams = DB::select('SELECT id,ram FROM rams', [1]);
        $hdds = DB::select('SELECT id,size,type FROM hdds', [1]);
        $campus = DB::select('SELECT id,campu_name FROM campus', [1]);
        $name_campu_table_index = DB::table('campus')->get();
        $mtrz_campus = DB::table('campus')->select('id', 'campu_name')->where('label', '=', 'MTRZ')->get();
        $ctry_campus = DB::table('campus')->select('id', 'campu_name')->where('label', '=', 'CTRY')->get();
        $ctii_campus = DB::table('campus')->select('id', 'campu_name')->where('label', '=', 'CTII')->get();

        //$getip = UserSystemInfoHelper::get_ip();
        $findmacaddress = exec('getmac');
        $getmacaddress = strtok($findmacaddress, ' ');
        $getos = UserSystemInfoHelper::get_os();

        return view('sedes.country.create', [
            'ctry_campus' => $ctry_campus,
            'ctii_campus' => $ctii_campus,            'name_campu_table_index' => $name_campu_table_index,
            'mtrz_campus' => $mtrz_campus,
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
        $ts = now()->toDateTimeString();

        $machines = new Machine();

        //               [db]           [name] (db campos en la base de datos - name campus en el blade create)
        $machines->type_id = request('type');
        $machines->manufacturer = request('manufact');
        $machines->model = request('model');
        $machines->serial = request('serial');
        $machines->serial_monitor = request('serial-monitor');
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
        $machines->campus_id = request('campu-ctry');
        $machines->location = request('location');
        $machines->comment = request('comment');
        $machines->created_at = $ts;
        //dd($machines);
        $machines->save();

        return redirect('/sedes/country')->with(
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
        //$ctry_campus = DB::table('campus')->select('id', 'campu_name')->where('label', '=', 'CTRY')->get();

        //$getos = UserSystemInfoHelper::get_os();

        return view('sedes.country.edit', [
            'machine' => Machine::findOrFail($machines),
            //'ctry_campus' => $ctry_campus,
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
        $machines->serial_monitor = $request->get('serial-monitor');
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

        return redirect('/sedes/country')
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

        return redirect('/sedes/country')
            ->with(
                'machine_deleted',
                'Equipo eliminado del inventario'
            );
    }
}
