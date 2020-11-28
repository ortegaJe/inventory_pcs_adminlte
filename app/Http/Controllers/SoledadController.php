<?php

namespace App\Http\Controllers;

use App\Helpers\UserSystemInfoHelper;
use App\Machine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class SoledadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $sol_machines = DB::table('machines AS m')
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
                )->where('label', '=', 'SOL')->whereNull('deleted_at');

            return DataTables::of($sol_machines)
                ->addColumn('action', 'sedes.soledad.actions')
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('sedes.soledad.index');
    }

    public function create()
    {
        $sol_machines = DB::select('SELECT `id`,`serial`, `lote`, `type_id`, `manufacturer`, 
                                       `model`, `ram_slot_00_id`, `ram_slot_01_id`, 
                                       `hard_drive_id`, `cpu`, `ip_range`, `mac_address`,
                                       `anydesk`, `campus_id`, `location`, `image`, 
                                       `comment`, `created_at`, `updated_at` 
                                        FROM 
                                       `machines` WHERE campus_id=5', [1]);

        $types = DB::select('SELECT id,name FROM types', [1]);
        $rams = DB::select('SELECT id,ram FROM rams', [1]);
        $hdds = DB::select('SELECT id,size,type FROM hdds', [1]);
        $campus = DB::select('SELECT id,campu_name FROM campus', [1]);

        //$getip = UserSystemInfoHelper::get_ip();
        $findmacaddress = exec('getmac');
        $getmacaddress = strtok($findmacaddress, ' ');
        $getos = UserSystemInfoHelper::get_os();

        return view('sedes.soledad.create', [
            'sol_machines' => $sol_machines,
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

        $sol_machines = new Machine();

        //               [db]           [name] (db campos en la base de datos - name campus en el blade create)
        $sol_machines->type_id = request('type');
        $sol_machines->manufacturer = request('manufact');
        $sol_machines->model = request('model');
        $sol_machines->serial = request('serial');
        $sol_machines->ram_slot_00_id = request('ramslot00');
        $sol_machines->ram_slot_01_id = request('ramslot01');
        $sol_machines->hard_drive_id = request('hard-drive');
        $sol_machines->cpu = request('cpu');
        $sol_machines->name_pc = request('name-pc');
        $sol_machines->ip_range = request('ip');
        $sol_machines->mac_address = request('mac');
        $sol_machines->anydesk = request('anydesk');
        $sol_machines->os = request('os');
        $sol_machines->created_by = Auth::user()->id;
        $sol_machines->rol_id = $roles;
        $sol_machines->status = request('status');
        $sol_machines->campus_id = request('campus');
        $sol_machines->location = request('location');
        $sol_machines->comment = request('comment');

        $sol_machines->save();

        return redirect('/sedes/soledad');
    }

    public function edit($machines)
    {
        $types = DB::select('SELECT id,name FROM types', [1]);
        $rams = DB::select('SELECT id,ram FROM rams', [1]);
        $hdds = DB::select('SELECT id,size,type FROM hdds', [1]);
        $campus = DB::select('SELECT id,campu_name FROM campus', [1]);

        //$getos = UserSystemInfoHelper::get_os();

        return view('sedes.soledad.edit', [
            'machine' => Machine::findOrFail($machines),
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

        $sol_machines = Machine::findOrFail($id);

        //        [db]                 [name] (db campos en la base de datos - name campus en el blade edit)
        $sol_machines->type_id = $request->get('type');
        $sol_machines->manufacturer = $request->get('manufact');
        $sol_machines->model = $request->get('model');
        $sol_machines->serial = $request->get('serial');
        $sol_machines->ram_slot_00_id = $request->get('ramslot00');
        $sol_machines->ram_slot_01_id = $request->get('ramslot01');
        $sol_machines->hard_drive_id = $request->get('hard-drive');
        $sol_machines->cpu = $request->get('cpu');
        $sol_machines->name_pc = request('name-pc');
        $sol_machines->ip_range = $request->get('ip');
        $sol_machines->mac_address = $request->get('mac');
        $sol_machines->anydesk = $request->get('anydesk');
        $sol_machines->os = $request->get('os');
        $sol_machines->campus_id = $request->get('campus_id');
        $sol_machines->location = $request->get('location');
        $sol_machines->comment = $request->get('comment');

        $sol_machines->update();

        return redirect('/sedes/soledad');
    }

    public function destroy($id)
    {
        $sol_machines = Machine::findOrFail($id);


        if($sol_machines->delete()) { // If softdeleted

        $ts = now()->toDateTimeString();
        $data = array('deleted_at' => $ts, 'status' => 0);
        DB::table('machines')->where('id', $id)->update($data);

        }

        return redirect('/sedes/soledad');
    }
}
