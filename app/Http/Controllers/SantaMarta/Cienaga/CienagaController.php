<?php

namespace App\Http\Controllers\SantaMarta\Cienaga;

use App\Helpers\UserSystemInfoHelper;
use App\Http\Controllers\Controller;
use App\Machine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class CienagaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
    }

    public function index(Request $request)
    {
        $name_cng_campu = DB::select('SELECT id,campu_name FROM campus WHERE id=14', [1]);

        if ($request->ajax()) {
            $cng_machines = DB::table('machines AS m')
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
                    'c.campu_name')->where('label', '=', 'CNG')->whereNull('deleted_at');

            return DataTables::of($cng_machines)
                ->addColumn('action', 'sedes.cienaga.actions')
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('sedes.cienaga.index',['name_cng_campu' => $name_cng_campu]);
    }

    public function create(Request $request)
    {
        $cng_machines = DB::select('SELECT `id`,`serial`, `lote`, `type_id`, `manufacturer`, 
                                       `model`, `ram_slot_00_id`, `ram_slot_01_id`, 
                                       `hard_drive_id`, `cpu`, `ip_range`, `mac_address`,
                                       `anydesk`, `campus_id`, `location`, `image`, 
                                       `comment`, `created_at`, `updated_at` 
                                        FROM 
                                       `machines` WHERE campus_id=14', [1]);

        $types = DB::select('SELECT id,name FROM types', [1]);
        $rams = DB::select('SELECT id,ram FROM rams', [1]);
        $hdds = DB::select('SELECT id,size,type FROM hdds', [1]);
        $campus = DB::select('SELECT id,campu_name FROM campus', [1]);
        $name_cng_campu = DB::table('campus')->get();
        $cng_campus = DB::table('campus')->select('id','campu_name')->where('label', '=', 'CNG')->get();
        $mar_campus = DB::table('campus')->select('id','campu_name')->where('label', '=', 'MAR')->get();
        $rio_campus = DB::table('campus')->select('id','campu_name')->where('label', '=', 'RIO')->get();
        $c12_campus = DB::table('campus')->select('id','campu_name')->where('label', '=', 'C12')->get();
        $vdp_campus = DB::table('campus')->select('id','campu_name')->where('label', '=', 'VDP')->get();

        //$getip = UserSystemInfoHelper::get_ip();
        $findmacaddress = exec('getmac');
        $getmacaddress = strtok($findmacaddress, ' ');
        $getos = UserSystemInfoHelper::get_os();

        return view('sedes.cienaga.create', [
            'cng_machines' => $cng_machines,
            'name_cng_campu' => $name_cng_campu,
            'mar_campus' => $mar_campus,
            'cng_campus' => $cng_campus,
            'rio_campus' => $rio_campus,
            'c12_campus' => $c12_campus,
            'vdp_campus' => $vdp_campus,
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
        $cng_machines = new Machine();

        //               [db]           [name] (db campos en la base de datos - name campus en el blade create)
        $cng_machines->type_id = request('type');
        $cng_machines->manufacturer = request('manufact');
        $cng_machines->model = request('model');
        $cng_machines->serial = request('serial');
        $cng_machines->ram_slot_00_id = request('ramslot00');
        $cng_machines->ram_slot_01_id = request('ramslot01');
        $cng_machines->hard_drive_id = request('hard-drive');
        $cng_machines->cpu = request('cpu');
        $cng_machines->name_pc = request('name-pc');
        $cng_machines->ip_range = request('ip');
        $cng_machines->mac_address = request('mac');
        $cng_machines->anydesk = request('anydesk');
        $cng_machines->os = request('os');
        $cng_machines->created_by = Auth::user()->id;
        $cng_machines->rol_id = $roles;
        $cng_machines->status = request('status');
        $cng_machines->campus_id = request('campus');
        $cng_machines->location = request('location');
        $cng_machines->comment = request('comment');
        //dd($cng_machines);
        $cng_machines->save();

        return redirect('/santa_marta/sedes/cienaga');
    }

    public function edit($machines)
    {
        $types = DB::select('SELECT id,name FROM types', [1]);
        $rams = DB::select('SELECT id,ram FROM rams', [1]);
        $hdds = DB::select('SELECT id,size,type FROM hdds', [1]);
        $campus = DB::select('SELECT id,campu_name FROM campus', [1]);
        $cng_campus = DB::table('campus')->select('id','campu_name')->where('label', '=', 'CNG')->get();

        //$getos = UserSystemInfoHelper::get_os();

        return view('sedes.cienaga.edit', [
            'machine' => Machine::findOrFail($machines),
            'cng_campus' => $cng_campus,
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

        $cng_machines = Machine::findOrFail($id);

        //        [db]                 [name] (db campos en la base de datos - name campus en el blade edit)
        $cng_machines->type_id = $request->get('type');
        $cng_machines->manufacturer = $request->get('manufact');
        $cng_machines->model = $request->get('model');
        $cng_machines->serial = $request->get('serial');
        $cng_machines->ram_slot_00_id = $request->get('ramslot00');
        $cng_machines->ram_slot_01_id = $request->get('ramslot01');
        $cng_machines->hard_drive_id = $request->get('hard-drive');
        $cng_machines->cpu = $request->get('cpu');
        $cng_machines->name_pc = request('name-pc');
        $cng_machines->ip_range = $request->get('ip');
        $cng_machines->mac_address = $request->get('mac');
        $cng_machines->anydesk = $request->get('anydesk');
        $cng_machines->os = $request->get('os');
        $cng_machines->campus_id = $request->get('campus_id');
        $cng_machines->location = $request->get('location');
        $cng_machines->comment = $request->get('comment');

        $cng_machines->update();

        return redirect('/santa_marta/sedes/cienaga');
    }

    public function destroy($id)
    {
        $machines = Machine::findOrFail($id);

        
        if($machines->delete()) { // If softdeleted

        $ts = now()->toDateTimeString();
        $data = array('deleted_at' => $ts, 'status' => 0);
        DB::table('machines')->where('id', $id)->update($data);

        }

        return redirect('/santa_marta/sedes/cienaga');
    }
}
