<?php

namespace App\Http\Controllers;

use App\Exports\MacarenaExport;
use App\Helpers\UserSystemInfoHelper;
use App\Machine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Maatwebsite\Excel\Excel;
use Barryvdh\DomPDF\Facade as PDF;

class MacarenaController extends Controller
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
            ->where('campus_id', '=', [1]) //id en la tabla campus
            ->count();

        $type_atril = DB::table('types')->get(); //nombres de los tipos

        $pc_count = DB::table('machines')
            ->select('type_id', 'campus_id', 'status_deleted_at')
            ->where('status_deleted_at', '=', [1])
            ->where('deleted_at', '=', NULL)
            ->where('type_id', '=', [1])
            ->where('campus_id', '=', [1])
            ->count();

        $type_pc = DB::table('types')->get();

        $laptop_count = DB::table('machines')
            ->select('type_id', 'campus_id', 'status_deleted_at')
            ->where('status_deleted_at', '=', [1])
            ->where('deleted_at', '=', NULL)
            ->where('type_id', '=', [3])
            ->where('campus_id', '=', [1])
            ->count();

        $type_laptop = DB::table('types')->get();

        $berry_count = DB::table('machines')
            ->select('type_id', 'campus_id', 'status_deleted_at')
            ->where('status_deleted_at', '=', [1])
            ->where('deleted_at', '=', NULL)
            ->where('type_id', '=', [4])
            ->where('campus_id', '=', [1])
            ->count();

        $type_berry = DB::table('types')->get();
        //end info_box//

        if ($request->ajax()) {
            $mac_machines = DB::table('machines AS m')
                ->join('types AS t', 't.id', '=', 'm.type_id')
                ->join('campus AS c', 'c.id', '=', 'm.campus_id')
                ->select(
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
                )->where('label', '=', 'MAC')->whereNull('deleted_at');

            return DataTables::of($mac_machines)
                ->addColumn('action', 'sedes.macarena.actions')
                ->rawColumns(['action'])
                ->make(true);
        }

        return view(
            'sedes.macarena.index',
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
        return new MacarenaExport;
    }

    public function export_pdf()
    {
        //return new MachinesPdfExport;
        //return $this->excel->download(new MachinesPdfExport, 'invoices.pdf', Excel::DOMPDF);
        $machines = DB::table('machines')
            ->select(
                'types.name',
                'machines.serial',
                'machines.serial_monitor',
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
            ->where('campus.label', '=', 'MAC')
            ->orderBy('machines.id', 'ASC')
            ->get();

        $pdf = PDF::loadView(
            'machines.export_pdf_table',
            [
                'machines' => $machines
            ]
        )->setPaper('a4', 'landscape');

        return $pdf->stream('inventor_machines_mac.pdf');
    }

    public function create()
    {
        $types = DB::select('SELECT id,name FROM types', [1]);
        $rams = DB::select('SELECT id,ram FROM rams', [1]);
        $hdds = DB::select('SELECT id,size,type FROM hdds', [1]);
        $campus = DB::select('SELECT id,campu_name FROM campus', [1]);
        $name_campu_table_index = DB::table('campus')->get();
        $mac_campus = DB::table('campus')->select('id', 'campu_name')->where('label', '=', 'MAC')->get();
        $c16_campus = DB::table('campus')->select('id', 'campu_name')->where('label', '=', 'C16')->get();

        //$getip = UserSystemInfoHelper::get_ip();
        $findmacaddress = exec('getmac');
        $getmacaddress = strtok($findmacaddress, ' ');
        $getos = UserSystemInfoHelper::get_os();

        return view('sedes.macarena.create', [
            'c16_campus' => $c16_campus,
            'name_campu_table_index' => $name_campu_table_index,
            'mac_campus' => $mac_campus,
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

        $mac_machines = new Machine();

        //               [db]           [name] (db campos en la base de datos - name campus en el blade create)
        $mac_machines->type_id = request('type');
        $mac_machines->manufacturer = request('manufact');
        $mac_machines->model = request('model');
        $mac_machines->serial = request('serial');
        $mac_machines->serial_monitor = request('serial-monitor');
        $mac_machines->ram_slot_00_id = request('ramslot00');
        $mac_machines->ram_slot_01_id = request('ramslot01');
        $mac_machines->hard_drive_id = request('hard-drive');
        $mac_machines->cpu = request('cpu');
        $mac_machines->name_pc = request('name-pc');
        $mac_machines->ip_range = request('ip');
        $mac_machines->mac_address = request('mac');
        $mac_machines->anydesk = request('anydesk');
        $mac_machines->os = request('os');
        $mac_machines->created_by = Auth::user()->id;
        $mac_machines->rol_id = $roles;
        $mac_machines->status_deleted_at = request('status');
        $mac_machines->campus_id = request('campus');
        $mac_machines->location = request('location');
        $mac_machines->comment = request('comment');
        $mac_machines->created_at = $ts;

        //dd($mac_machines);
        $mac_machines->save();

        return redirect('/sedes/macarena')->with(
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
        $mac_campus = DB::table('campus')->select('id', 'campu_name')->where('label', '=', 'MAC')->get();

        //$getos = UserSystemInfoHelper::get_os();

        return view('sedes.macarena.edit', [
            'machine' => Machine::findOrFail($machines),
            'mac_campus' => $mac_campus,
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
        //$ts = now()->toDateTimeString();

        $mac_machines = Machine::findOrFail($id);

        //        [db]                 [name] (db campos en la base de datos - name campus en el blade edit)
        $mac_machines->type_id = $request->get('type');
        $mac_machines->manufacturer = $request->get('manufact');
        $mac_machines->model = $request->get('model');
        $mac_machines->serial = $request->get('serial');
        $mac_machines->serial_monitor = $request->get('serial-monitor');
        $mac_machines->ram_slot_00_id = $request->get('ramslot00');
        $mac_machines->ram_slot_01_id = $request->get('ramslot01');
        $mac_machines->hard_drive_id = $request->get('hard-drive');
        $mac_machines->cpu = $request->get('cpu');
        $mac_machines->name_pc = request('name-pc');
        $mac_machines->ip_range = $request->get('ip');
        $mac_machines->mac_address = $request->get('mac');
        $mac_machines->anydesk = $request->get('anydesk');
        $mac_machines->os = $request->get('os');
        $mac_machines->campus_id = $request->get('campus_id');
        $mac_machines->location = $request->get('location');
        $mac_machines->comment = $request->get('comment');
        //$mac_machines->updated_at = $ts;
        $mac_machines->update();

        return redirect('/sedes/macarena')->with(
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

        return redirect('/sedes/macarena')->with(
            'machine_deleted',
            'Equipo eliminado del inventario'
        );
    }
}
