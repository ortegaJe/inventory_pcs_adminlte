<?php

namespace App\Http\Controllers;

use App\Helpers\UserSystemInfoHelper;
use App\Machine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class KennedyController extends Controller
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
        if ($request->ajax()) {
            $kny_machines = DB::table('machines AS m')
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
                )->where('label', '=', 'KNY');

            return DataTables::of($kny_machines)
                ->addColumn('action', 'sedes.kennedy.actions')
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('sedes.kennedy.index');
    }

    public function create()
    {
        $kny_machines = DB::select('SELECT `id`,`serial`, `lote`, `type_id`, `manufacturer`, 
                                       `model`, `ram_slot_00_id`, `ram_slot_01_id`, 
                                       `hard_drive_id`, `cpu`, `ip_range`, `mac_address`,
                                       `anydesk`, `campus_id`, `location`, `image`, 
                                       `comment`, `created_at`, `updated_at` 
                                        FROM 
                                       `machines` WHERE campus_id=12', [1]);

        $types = DB::select('SELECT id,name FROM types', [1]);
        $rams = DB::select('SELECT id,ram FROM rams', [1]);
        $hdds = DB::select('SELECT id,size,type FROM hdds', [1]);
        $campus = DB::select('SELECT id,campu_name FROM campus', [1]);

        //$getip = UserSystemInfoHelper::get_ip();
        $findmacaddress = exec('getmac');
        $getmacaddress = strtok($findmacaddress, ' ');
        $getos = UserSystemInfoHelper::get_os();

        return view('sedes.kennedy.create', [
            'kny_machines' => $kny_machines,
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

        $kny_machines = new Machine();

        //               [db]           [name] (db campos en la base de datos - name campus en el blade create)
        $kny_machines->type_id = request('type');
        $kny_machines->manufacturer = request('manufact');
        $kny_machines->model = request('model');
        $kny_machines->serial = request('serial');
        $kny_machines->ram_slot_00_id = request('ramslot00');
        $kny_machines->ram_slot_01_id = request('ramslot01');
        $kny_machines->hard_drive_id = request('hard-drive');
        $kny_machines->cpu = request('cpu');
        $kny_machines->ip_range = request('ip');
        $kny_machines->mac_address = request('mac');
        $kny_machines->anydesk = request('anydesk');
        $kny_machines->os = request('os');
        $kny_machines->created_by = Auth::user()->id;
        $kny_machines->rol_id = $roles;
        $kny_machines->campus_id = request('campus');
        $kny_machines->location = request('location');
        $kny_machines->comment = request('comment');

        $kny_machines->save();

        return redirect('/sedes/kennedy');
    }

    public function edit($machines)
    {
        $types = DB::select('SELECT id,name FROM types', [1]);
        $rams = DB::select('SELECT id,ram FROM rams', [1]);
        $hdds = DB::select('SELECT id,size,type FROM hdds', [1]);
        $campus = DB::select('SELECT id,campu_name FROM campus', [1]);

        //$getos = UserSystemInfoHelper::get_os();

        return view('sedes.kennedy.edit', [
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

        return redirect('/sedes/kennedy');
    }

    public function destroy($id)
    {
        $machines = Machine::findOrFail($id);

        $machines->delete();

        return redirect('/sedes/kennedy');
    }
}
