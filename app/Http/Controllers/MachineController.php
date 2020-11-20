<?php

namespace App\Http\Controllers;

use App\Campu;
use App\Http\Requests\MachineFormRequest;
use Illuminate\Http\Request;
use App\Machine;
use App\Ram;
use App\Type;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Helpers\UserSystemInfoHelper;
use App\Http\Requests\StoreFormRequest;
use App\User;
use Yajra\DataTables\Facades\DataTables;

class MachineController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
        $this->middleware('verified');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
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
                    'm.ip_range',
                    'm.mac_address',
                    'm.anydesk',
                    'm.os',
                    'm.location',
                    'm.comment',
                    'm.created_at',
                    'c.campu_name'
                );

            return DataTables::of($machines)
                ->addColumn('action', 'machines.actions')
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('machines.index');
    }

    public function charts(Request $request)
    {
        return 'hello';
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
        $machines->ip_range = $request['ip'];
        $machines->mac_address = $request['mac'];
        $machines->anydesk = request('anydesk');
        $machines->os = request('os');
        $machines->created_by = Auth::user()->id;
        $machines->rol_id = $roles;
        $machines->campus_id = $request['campus'];
        $machines->location = $request['location'];
        $machines->comment = request('comment');

        $machines->save();

        return redirect('/machines')->with('machine_created', 
                                           'Nuevo equipo fué añadido al inventario');
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
        $machines->ip_range = $request->get('ip');
        $machines->mac_address = $request->get('mac');
        $machines->anydesk = $request->get('anydesk');
        $machines->os = $request->get('os');
        $machines->campus_id = $request->get('campus_id');
        $machines->location = $request->get('location');
        $machines->comment = $request->get('comment');

        $machines->update();

        return redirect('/machines')
               ->with('machine_update',
                      'Equipo fue actualizado en el inventario');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $machines = Machine::findOrFail($id);

        $machines->delete();

        return redirect('/machines')
               ->with('machine_deleted',
                      'Equipo eliminado del inventario');

    }
}
