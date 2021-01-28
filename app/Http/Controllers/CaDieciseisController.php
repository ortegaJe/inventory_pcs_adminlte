<?php

namespace App\Http\Controllers;

use App\Exports\CarreraDieciseisExport;
use App\Helpers\UserSystemInfoHelper;
use App\Machine;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Maatwebsite\Excel\Excel;
use Barryvdh\DomPDF\Facade as PDF;

class CaDieciseisController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $name_campu_table_index = DB::table('campus')->get();

        //info_box//
        $atril_count = DB::table('machines')
            ->select('type_id', 'campus_id', 'status_deleted_at', 'deleted_at')
            ->where('status_deleted_at', '=', [1])
            ->where('deleted_at', '=', NULL)
            ->where('type_id', '=', [2]) //id en la tabla types
            ->where('campus_id', '=', [4]) //id en la tabla campus
            ->count();

        $type_atril = DB::table('types')->get(); //nombres de los tipos

        $pc_count = DB::table('machines')
            ->select('type_id', 'campus_id', 'status_deleted_at')
            ->where('status_deleted_at', '=', [1])
            ->where('deleted_at', '=', NULL)
            ->where('type_id', '=', [1])
            ->where('campus_id', '=', [4])
            ->count();

        $type_pc = DB::table('types')->get();

        $laptop_count = DB::table('machines')
            ->select('type_id', 'campus_id', 'status_deleted_at')
            ->where('status_deleted_at', '=', [1])
            ->where('deleted_at', '=', NULL)
            ->where('type_id', '=', [3])
            ->where('campus_id', '=', [4])
            ->count();

        $type_laptop = DB::table('types')->get();

        $berry_count = DB::table('machines')
            ->select('type_id', 'campus_id', 'status_deleted_at')
            ->where('status_deleted_at', '=', [1])
            ->where('deleted_at', '=', NULL)
            ->where('type_id', '=', [4])
            ->where('campus_id', '=', [4])
            ->count();

        $type_berry = DB::table('types')->get();
        //end info_box//

        if ($request->ajax()) {
            DB::statement(DB::raw('set @rownum=0'));
            $c16_machines = DB::table('machines AS m')
                ->join('types AS t', 't.id', '=', 'm.type_id')
                ->join('campus AS c', 'c.id', '=', 'm.campus_id')
                ->leftJoin('status_codes AS code_s', 'code_s.id_code', '=', 'm.id_statu')
                ->leftJoin('status AS statu_description', 'statu_description.id_statu', '=', 'code_s.id_statu')
                ->select(
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
                    'c.campu_name',
                    'statu_description.description'
                )->where('label', '=', 'C16')
                ->where('status_deleted_at', '=', 1)
                ->whereIn('m.id_statu', [1, 2, 3, 4])
                ->whereNull('m.deleted_at')
                ->orderByDesc('m.created_at', 'DESC');

            $datatables = DataTables::of($c16_machines);

            $datatables->addColumn('rownum', 'whereRaw', '@rownum  + 1');

            $datatables->editColumn('m.created_at', function ($c16_machines) {
                return $c16_machines->created_at ? with(new Carbon($c16_machines->created_at))
                    ->toDayDateTimeString() : '';
            });
            $datatables->blacklist(['m.deleted_at']);
            $datatables->addColumn('action', 'sedes.carrera_16.actions');
            $datatables->rawColumns(['action']);
            return $datatables->make(true);
        }

        return view(
            'sedes.carrera_16.index',
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
        return new CarreraDieciseisExport;
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
            ->where('campus.label', '=', 'C16')
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
        $status_code = DB::select('SELECT STATUS_CODE.id_code AS ID_CODE,STATUS.description AS DESCRIPTION,STATUS.ico AS BADGE,STATUS.created_at,STATUS.updated_at FROM status_codes AS STATUS_CODE 
                                    INNER JOIN status AS STATUS ON STATUS_CODE.id_statu = STATUS.id_statu
                                        WHERE ID_CODE IN (1,2,3,4)', [1]);

        $c16_campus = DB::table('campus')->select('id', 'campu_name')->where('label', '=', 'C16')->get();
        $mac_campus = DB::table('campus')->select('id', 'campu_name')->where('label', '=', 'MAC')->get();
        $name_campu_table_index = DB::table('campus')->get();


        //$getip = UserSystemInfoHelper::get_ip();
        $findmacaddress = exec('getmac');
        $getmacaddress = strtok($findmacaddress, ' ');
        $getos = UserSystemInfoHelper::get_os();

        return view('sedes.carrera_16.create', [
            'c16_campus' => $c16_campus,
            'status_code' => $status_code,
            'mac_campus' => $mac_campus,
            'name_campu_table_index' => $name_campu_table_index,
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

        $c16_machines = new Machine();

        //               [db]           [name] (db campos en la base de datos - name campus en el blade create)
        $c16_machines->type_id = request('type');
        $c16_machines->manufacturer = request('manufact');
        $c16_machines->model = request('model');
        $c16_machines->serial = request('serial');
        $c16_machines->serial_monitor = request('serial-monitor');
        $c16_machines->ram_slot_00_id = request('ramslot00');
        $c16_machines->ram_slot_01_id = request('ramslot01');
        $c16_machines->hard_drive_id = request('hard-drive');
        $c16_machines->cpu = request('cpu');
        $c16_machines->name_pc = request('name-pc');
        $c16_machines->ip_range = request('ip');
        $c16_machines->mac_address = request('mac');
        $c16_machines->anydesk = request('anydesk');
        $c16_machines->os = request('os');
        $c16_machines->created_by = Auth::user()->id;
        $c16_machines->rol_id = $roles;
        $c16_machines->status_deleted_at = request('status');
        $c16_machines->campus_id = request('campus-c16');
        $c16_machines->location = request('location');
        $c16_machines->comment = request('comment');
        $c16_machines->id_statu = request('status-code');
        //$c16_machines->created_at = $ts;

        $c16_machines->save();

        return redirect('/sedes/carrera_16')->with(
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
        $status_code = DB::select('SELECT STATUS_CODE.id_code AS ID_CODE,STATUS.description AS DESCRIPTION,STATUS.ico AS BADGE,STATUS.created_at,STATUS.updated_at FROM status_codes AS STATUS_CODE 
                                    INNER JOIN status AS STATUS ON STATUS_CODE.id_statu = STATUS.id_statu
                                        WHERE ID_CODE IN (1,2,3,4)', [1]);

        //$c16_campus = DB::table('campus')->select('id', 'campu_name')->where('label', '=', 'CTRY')->get();

        //$getos = UserSystemInfoHelper::get_os();

        return view('sedes.carrera_16.edit', [
            'machine' => Machine::findOrFail($machines),
            'status_code' => $status_code,
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

        $c16_machines = Machine::findOrFail($id);

        //        [db]                 [name] (db campos en la base de datos - name campus en el blade edit)
        $c16_machines->type_id = $request->get('type');
        $c16_machines->manufacturer = $request->get('manufact');
        $c16_machines->model = $request->get('model');
        $c16_machines->serial = $request->get('serial');
        $c16_machines->serial_monitor = $request->get('serial-monitor');
        $c16_machines->ram_slot_00_id = $request->get('ramslot00');
        $c16_machines->ram_slot_01_id = $request->get('ramslot01');
        $c16_machines->hard_drive_id = $request->get('hard-drive');
        $c16_machines->cpu = $request->get('cpu');
        $c16_machines->name_pc = request('name-pc');
        $c16_machines->ip_range = $request->get('ip');
        $c16_machines->mac_address = $request->get('mac');
        $c16_machines->anydesk = $request->get('anydesk');
        $c16_machines->os = $request->get('os');
        $c16_machines->campus_id = $request->get('campus_id');
        $c16_machines->location = $request->get('location');
        $c16_machines->comment = $request->get('comment');
        $c16_machines->id_statu = request('status-code');

        //$c16_machines->updated_at = $ts;
        $c16_machines->update();

        return redirect('/sedes/carrera_16')->with(
            'machine_update',
            'Equipo fue actualizado en el inventario'
        );
    }

    public function destroy($id)
    {
        $mac_machines = Machine::findOrFail($id);


        if ($mac_machines->delete()) { // If softdeleted

            $ts = now()->toDateTimeString();
            $data = array('deleted_at' => $ts, 'status_deleted_at' => 0, 'id_statu' => 5);
            DB::table('machines')->where('id', $id)->update($data);
        }

        return redirect('/sedes/carrera_16')->with(
            'machine_deleted',
            'Equipo eliminado del inventario'
        );
    }
}
