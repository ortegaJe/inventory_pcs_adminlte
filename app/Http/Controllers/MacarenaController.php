<?php

namespace App\Http\Controllers;

use App\Helpers\UserSystemInfoHelper;
use App\Machine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class MacarenaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
    }

    public function index(Request $request)
    {
        $name_mac_campu = DB::select('SELECT id,campu_name FROM campus WHERE id=1', [1]);

        if ($request->ajax()) {
            $mac_machines = DB::table('machines AS m')
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
                )->where('label', '=', 'MAC')->whereNull('status_deleted_at');

            return DataTables::of($mac_machines)
                ->addColumn('action', 'sedes.macarena.actions')
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('sedes.macarena.index', ['name_mac_campu' => $name_mac_campu]);
    }

    public function create()
    {
        $mac_machines = DB::select('SELECT `id`,`serial`, `lote`, `type_id`, `manufacturer`, 
                                       `model`, `ram_slot_00_id`, `ram_slot_01_id`, 
                                       `hard_drive_id`, `cpu`, `ip_range`, `mac_address`,
                                       `anydesk`, `campus_id`, `location`, `image`, 
                                       `comment`, `created_at`, `updated_at` 
                                        FROM 
                                       `machines` WHERE campus_id=1', [1]);

        $types = DB::select('SELECT id,name FROM types', [1]);
        $rams = DB::select('SELECT id,ram FROM rams', [1]);
        $hdds = DB::select('SELECT id,size,type FROM hdds', [1]);
        $campus = DB::select('SELECT id,campu_name FROM campus', [1]);
        $name_mac_campu = DB::table('campus')->get();
        $mac_campus = DB::table('campus')->select('id', 'campu_name')->where('label', '=', 'MAC')->get();

        //$getip = UserSystemInfoHelper::get_ip();
        $findmacaddress = exec('getmac');
        $getmacaddress = strtok($findmacaddress, ' ');
        $getos = UserSystemInfoHelper::get_os();

        return view('sedes.macarena.create', [
            'mac_machines' => $mac_machines,
            'name_mac_campu' => $name_mac_campu,
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

        $mac_machines = new Machine();

        //               [db]           [name] (db campos en la base de datos - name campus en el blade create)
        $mac_machines->type_id = request('type');
        $mac_machines->manufacturer = request('manufact');
        $mac_machines->model = request('model');
        $mac_machines->serial = request('serial');
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
        //dd($mac_machines);
        $mac_machines->save();

        return redirect('/sedes/macarena');
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

        $mac_machines = Machine::findOrFail($id);

        //        [db]                 [name] (db campos en la base de datos - name campus en el blade edit)
        $mac_machines->type_id = $request->get('type');
        $mac_machines->manufacturer = $request->get('manufact');
        $mac_machines->model = $request->get('model');
        $mac_machines->serial = $request->get('serial');
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

        $mac_machines->update();

        return redirect('/sedes/macarena');
    }

    public function destroy($id)
    {
        $mac_machines = Machine::findOrFail($id);


        if ($mac_machines->delete()) { // If softdeleted

            $ts = now()->toDateTimeString();
            $data = array('deleted_at' => $ts, 'status' => 0);
            DB::table('machines')->where('id', $id)->update($data);
        }

        return redirect('/sedes/macarena');
    }
}
