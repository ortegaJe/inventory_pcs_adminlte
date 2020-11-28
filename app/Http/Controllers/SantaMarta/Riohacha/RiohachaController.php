<?php

namespace App\Http\Controllers\SantaMarta\Riohacha;

use App\Helpers\UserSystemInfoHelper;
use App\Http\Controllers\Controller;
use App\Machine;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class RiohachaController extends Controller
{
        public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
    }

    public function index(Request $request)
    {
        $name_mar_campu = DB::select('SELECT id,campu_name FROM campus WHERE id=12', [1]);

        if ($request->ajax()) {
            $rio_machines = DB::table('machines AS m')
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
                    'c.campu_name')->where('label', '=', 'RIO')->whereNull('deleted_at');

            return DataTables::of($rio_machines)
                ->addColumn('action', 'sedes.riohacha.actions')
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('sedes.riohacha.index',['name_mar_campu' => $name_mar_campu]);
    }

    public function create(Request $request)
    {
        $mar_machines = DB::select('SELECT `id`,`serial`, `lote`, `type_id`, `manufacturer`, 
                                       `model`, `ram_slot_00_id`, `ram_slot_01_id`, 
                                       `hard_drive_id`, `cpu`, `ip_range`, `mac_address`,
                                       `anydesk`, `campus_id`, `location`, `image`, 
                                       `comment`, `created_at`, `updated_at` 
                                        FROM 
                                       `machines` WHERE campus_id=13', [1]);

        $types = DB::select('SELECT id,name FROM types', [1]);
        $rams = DB::select('SELECT id,ram FROM rams', [1]);
        $hdds = DB::select('SELECT id,size,type FROM hdds', [1]);
        $campus = DB::select('SELECT id,campu_name FROM campus', [1]);
        $name_mar_campu = DB::table('campus')->get();
        $mar_campus = DB::table('campus')->select('id','campu_name')->where('label', '=', 'MAR')->get();
        $cng_campus = DB::table('campus')->select('id','campu_name')->where('label', '=', 'CNG')->get();
        $rio_campus = DB::table('campus')->select('id','campu_name')->where('label', '=', 'RIO')->get();

        //$getip = UserSystemInfoHelper::get_ip();
        $findmacaddress = exec('getmac');
        $getmacaddress = strtok($findmacaddress, ' ');
        $getos = UserSystemInfoHelper::get_os();

        return view('sedes.marinelo.create', [
            'mar_machines' => $mar_machines,
            'name_mar_campu' => $name_mar_campu,
            'cng_campus' => $cng_campus,
            'mar_campus' => $mar_campus,
            'rio_campus' => $rio_campus,
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
        $mar_machines = new Machine();

        //               [db]           [name] (db campos en la base de datos - name campus en el blade create)
        $mar_machines->type_id = request('type');
        $mar_machines->manufacturer = request('manufact');
        $mar_machines->model = request('model');
        $mar_machines->serial = request('serial');
        $mar_machines->ram_slot_00_id = request('ramslot00');
        $mar_machines->ram_slot_01_id = request('ramslot01');
        $mar_machines->hard_drive_id = request('hard-drive');
        $mar_machines->cpu = request('cpu');
        $mar_machines->name_pc = request('name-pc');
        $mar_machines->ip_range = request('ip');
        $mar_machines->mac_address = request('mac');
        $mar_machines->anydesk = request('anydesk');
        $mar_machines->os = request('os');
        $mar_machines->created_by = Auth::user()->id;
        $mar_machines->rol_id = $roles;
        $mar_machines->status = request('status');
        $mar_machines->campus_id = request('campus');
        $mar_machines->location = request('location');
        $mar_machines->comment = request('comment');
        //dd($mar_machines);
        $mar_machines->save();

        return redirect('/santa_marta/sedes/marinelo');
    }

    public function edit($machines)
    {
        $types = DB::select('SELECT id,name FROM types', [1]);
        $rams = DB::select('SELECT id,ram FROM rams', [1]);
        $hdds = DB::select('SELECT id,size,type FROM hdds', [1]);
        $campus = DB::select('SELECT id,campu_name FROM campus', [1]);
        $mar_campus = DB::table('campus')->select('id','campu_name')->where('label', '=', 'MAR')->get();

        //$getos = UserSystemInfoHelper::get_os();

        return view('sedes.marinelo.edit', [
            'machine' => Machine::findOrFail($machines),
            'mar_campus' => $mar_campus,
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

        $mar_machines = Machine::findOrFail($id);

        //        [db]                 [name] (db campos en la base de datos - name campus en el blade edit)
        $mar_machines->type_id = $request->get('type');
        $mar_machines->manufacturer = $request->get('manufact');
        $mar_machines->model = $request->get('model');
        $mar_machines->serial = $request->get('serial');
        $mar_machines->ram_slot_00_id = $request->get('ramslot00');
        $mar_machines->ram_slot_01_id = $request->get('ramslot01');
        $mar_machines->hard_drive_id = $request->get('hard-drive');
        $mar_machines->cpu = $request->get('cpu');
        $mar_machines->name_pc = request('name-pc');
        $mar_machines->ip_range = $request->get('ip');
        $mar_machines->mac_address = $request->get('mac');
        $mar_machines->anydesk = $request->get('anydesk');
        $mar_machines->os = $request->get('os');
        $mar_machines->campus_id = $request->get('campus_id');
        $mar_machines->location = $request->get('location');
        $mar_machines->comment = $request->get('comment');

        $mar_machines->update();

        return redirect('/santa_marta/sedes/marinelo');
    }

    public function destroy($id)
    {
        $machines = Machine::findOrFail($id);

        
        if($machines->delete()) { // If softdeleted

        $ts = now()->toDateTimeString();
        $data = array('deleted_at' => $ts, 'status' => 0);
        DB::table('machines')->where('id', $id)->update($data);

        }

        return redirect('/santa_marta/sedes/marinelo');
    }
}
