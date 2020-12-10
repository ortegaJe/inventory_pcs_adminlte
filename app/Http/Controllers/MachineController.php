<?php

namespace App\Http\Controllers;

use App\Campu;
use App\Exports\MachinesCsvExport;
use App\Exports\MachinesExport;
use App\Exports\MachinesPdfExport;
use App\Exports\MachinesViewExport;
use App\Http\Requests\MachineFormRequest;
use Illuminate\Http\Request;
use App\Machine;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Helpers\UserSystemInfoHelper;
use App\Http\Requests\StoreFormRequest;
//use Maatwebsite\Excel\Facades\Excel as Excel;
use Maatwebsite\Excel\Excel;
use Yajra\DataTables\Facades\DataTables;
use Barryvdh\DomPDF\Facade as PDF;

class MachineController extends Controller
{
    private $excel;

    public function __construct(Excel $excel)
    {
        $this->middleware('admin');
        $this->middleware('verified');
        $this->excel = $excel;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //info_box//
        $global_atril_count = DB::table('machines')
            ->select('type_id', 'campus_id', 'status_deleted_at', 'deleted_at')
            ->where('status_deleted_at', '=', [1])
            ->where('deleted_at', '=', NULL)
            ->where('type_id', '=', [2])
            ->count();

        $type_atril = DB::table('types')->get(); //nombres de los tipos

        $global_pc_count = DB::table('machines')
            ->select('type_id', 'campus_id', 'status_deleted_at')
            ->where('status_deleted_at', '=', [1])
            ->where('deleted_at', '=', NULL)
            ->where('type_id', '=', [1])
            ->count();

        $type_pc = DB::table('types')->get();

        $global_laptop_count = DB::table('machines')
            ->select('type_id', 'campus_id', 'status_deleted_at')
            ->where('status_deleted_at', '=', [1])
            ->where('deleted_at', '=', NULL)
            ->where('type_id', '=', [3])
            ->count();

        $type_laptop = DB::table('types')->get();

        $global_berry_count = DB::table('machines')
            ->select('type_id', 'campus_id', 'status_deleted_at')
            ->where('status_deleted_at', '=', [1])
            ->where('deleted_at', '=', NULL)
            ->where('type_id', '=', [4])
            ->count();

        $type_berry = DB::table('types')->get();
        //end info_box//

        if ($request->ajax()) {
            $machines = DB::table('machines AS m')
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
                )->whereNull('deleted_at');

            return DataTables::of($machines)
                ->addColumn('action', 'machines.actions')
                ->rawColumns(['action'])
                ->make(true);
        }

        return view(
            'machines.index',
            [
                'global_atril_count' => $global_atril_count,
                'type_atril' => $type_atril,
                'global_pc_count' => $global_pc_count,
                'type_pc' => $type_pc,
                'global_laptop_count' => $global_laptop_count,
                'type_laptop' => $type_laptop,
                'global_berry_count' => $global_berry_count,
                'type_berry' => $type_berry
            ]
        );
    }

    /*return Datatables::of(User::withTrashed())
                ->withTrashed()
                ->make(true);*/

    public function charts(Request $request)
    {
        return 'hello';
    }

    public function export_excel()
    {
        return new MachinesExport;
    }

    public function export_csv()
    {
        return new MachinesCsvExport;
    }

    public function exportPdf()
    {
        //return new MachinesPdfExport;
        //return $this->excel->download(new MachinesPdfExport, 'invoices.pdf', Excel::DOMPDF);
        $machines = Machine::all();
        $types = DB::select('SELECT id,name FROM types', [1]);
        $rams = DB::select('SELECT id,ram FROM rams', [1]);
        $hdds = DB::select('SELECT id,size,type FROM hdds', [1]);
        $campus = DB::select('SELECT id,campu_name FROM campus', [1]);

        $pdf = PDF::loadView('machines.table_machines', 
        [
            'machines' => $machines,
            'types' => $types,
            'campus' => $campus,
            'rams' => $rams,
            'hdds' => $hdds,
        ])->setPaper('a4', 'landscape');

        return $pdf->stream('export-machines.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $types = DB::select('SELECT id,name FROM types', [1]);
        $rams = DB::select('SELECT id,ram FROM rams', [1]);
        $hdds = DB::select('SELECT id,size,type FROM hdds', [1]);
        $campus = DB::select('SELECT id,campu_name FROM campus', [1]);
        //$mac_campus = DB::table('campus')->select('id','campu_name')->where('label', '=', 'MAC')->get();
        $roles = DB::select('SELECT id FROM roles', [1]);

        //$getip = UserSystemInfoHelper::get_ip();
        $findmacaddress = exec('getmac');
        $getmacaddress = strtok($findmacaddress, ' ');
        $getos = UserSystemInfoHelper::get_os();


        return view('machines.create', [
            'getmacaddress' => $getmacaddress,
            'getos' => $getos,
            //'getip' => $getip,
            'types' => $types,
            'campus' => $campus,
            //'mac_campus' => $mac_campus,
            'rams' => $rams,
            'hdds' => $hdds,
            'roles' => $roles
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFormRequest $request)
    {
        //$getip = UserSystemInfoHelper::get_ip();
        //$findmacaddress = exec('getmac');
        //$getmacaddress = strtok($findmacaddress, ' ');
        //$getos = UserSystemInfoHelper::get_os();
        $roles = Auth::user()->rol_id;

        $machines = new Machine();

        //        [db]           [name] (db campos en la base de datos - name campus en el blade create)
        $machines->type_id = $request['type'];
        $machines->manufacturer = request('manufact');
        $machines->model = request('model');
        $machines->serial = $request['serial'];
        $machines->ram_slot_00_id = $request['ramslot00'];
        $machines->ram_slot_01_id = $request['ramslot01'];
        $machines->hard_drive_id = $request['hard-drive'];
        $machines->cpu = request('cpu');
        $machines->name_pc = request('name-pc');
        $machines->ip_range = $request['ip'];
        $machines->mac_address = $request['mac'];
        $machines->anydesk = request('anydesk');
        $machines->os = request('os');
        $machines->created_by = Auth::user()->id;
        $machines->rol_id = $roles;
        $machines->status_deleted_at = request('status');
        $machines->campus_id = $request['campus'];
        $machines->location = $request['location'];
        $machines->comment = request('comment');

        $machines->save();

        return redirect('/machines')->with(
            'machine_created',
            'Nuevo equipo fué añadido al inventario'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('machines.show', ['machine' => Machine::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($machines)
    {
        $types = DB::select('SELECT id,name FROM types', [1]);
        $rams = DB::select('SELECT id,ram FROM rams', [1]);
        $hdds = DB::select('SELECT id,size,type FROM hdds', [1]);
        $campus = DB::select('SELECT id,campu_name FROM campus', [1]);
        //$getos = UserSystemInfoHelper::get_os();

        return view('machines.edit', [
            'machine' => Machine::findOrFail($machines),
            //'getos' => $getos,
            'types' => $types,
            'campus' => $campus,
            'rams' => $rams,
            'hdds' => $hdds
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MachineFormRequest $request, $id)
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
        $machines->name_pc = $request->get('name-pc');
        $machines->ip_range = $request->get('ip');
        $machines->mac_address = $request->get('mac');
        $machines->anydesk = $request->get('anydesk');
        $machines->os = $request->get('os');
        $machines->campus_id = $request->get('campus_id');
        $machines->location = $request->get('location');
        $machines->comment = $request->get('comment');

        $machines->save();

        return redirect('/machines')
            ->with(
                'machine_update',
                'Equipo fue actualizado en el inventario'
            );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //$status = DB::select('UPDATE machines SET status=0 WHERE deleted_at!= NOW()');
        //SELECT status,deleted_at FROM machines WHERE deleted_at != "" AND status=1
        //SELECT id,status,deleted_at FROM machines WHERE deleted_at != ''  AND status=0
        //SELECT id,status,deleted_at FROM machines WHERE deleted_at IS NULL  AND status=0
        //UPDATE machines SET status=0 WHERE deleted_at!= NOW()
        $machines = Machine::findOrFail($id);

        if ($machines->delete()) { // If softdeleted

            $ts = now()->toDateTimeString();
            $data = array('deleted_at' => $ts, 'status_deleted_at' => 0);
            DB::table('machines')->where('id', $id)->update($data);
        }

        return redirect('/machines')
            ->with(
                'machine_deleted',
                'Equipo eliminado del inventario'
            );
    }
}
