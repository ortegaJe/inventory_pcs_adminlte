<?php

namespace App\Http\Controllers\SantaMarta\CarreraDoce;

use App\Http\Controllers\Controller;
use App\Helpers\UserSystemInfoHelper;
use App\Machine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class CarreraDoceController extends Controller
{
            public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
    }

    public function index(Request $request)
    {
        $name_campu_table_index = DB::table('campus')->get();

        //info_box//
        $atril_count = DB::table('machines')
                         ->select('type_id', 'campus_id', 'status', 'deleted_at')
                         ->where('status', '=', [1])
                         ->where('deleted_at', '=', NULL)
                         ->where('type_id', '=', [2]) //id en la tabla types
                         ->where('campus_id', '=', [15]) //id en la tabla campus
                         ->count();

        $type_atril = DB::table('types')->get();//nombres de los tipos

        $pc_count = DB::table('machines')
                     ->select('type_id', 'campus_id', 'status')
                     ->where('status', '=', [1])
                     ->where('deleted_at', '=', NULL)
                     ->where('type_id', '=', [1])
                     ->where('campus_id', '=', [15])
                     ->count();

        $type_pc = DB::table('types')->get();

        $laptop_count = DB::table('machines')
                                ->select('type_id', 'campus_id', 'status')
                                ->where('status', '=', [1])
                                ->where('deleted_at', '=', NULL)
                                ->where('type_id', '=', [3])
                                ->where('campus_id', '=', [15])
                                ->count();

        $type_laptop = DB::table('types')->get();

        $berry_count = DB::table('machines')
                                ->select('type_id', 'campus_id', 'status')
                                ->where('status', '=', [1])
                                ->where('deleted_at', '=', NULL)
                                ->where('type_id', '=', [4])
                                ->where('campus_id', '=', [15])
                                ->count();

        $type_berry = DB::table('types')->get();
        //end info_box//

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
                    'c.campu_name')
                ->where('label', '=', 'C12')
                ->whereNull('deleted_at');

            return DataTables::of($rio_machines)
                ->addColumn('action', 'sedes.carrera_12.actions')
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('sedes.carrera_12.index',
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

        ]);
    }

    public function create(Request $request)
    {
        $machines = DB::select('SELECT `id`,`serial`, `lote`, `type_id`, `manufacturer`, 
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
        $name_campu_form_create = DB::table('campus')->select('campu_name')->get();
        $mar_campus = DB::table('campus')->select('id','campu_name')->where('label', '=', 'MAR')->get();
        $cng_campus = DB::table('campus')->select('id','campu_name')->where('label', '=', 'CNG')->get();
        $rio_campus = DB::table('campus')->select('id','campu_name')->where('label', '=', 'RIO')->get();
        $c12_campus = DB::table('campus')->select('id','campu_name')->where('label', '=', 'C12')->get();
        $vdp_campus = DB::table('campus')->select('id','campu_name')->where('label', '=', 'VDP')->get();

        //$getip = UserSystemInfoHelper::get_ip();
        $findmacaddress = exec('getmac');
        $getmacaddress = strtok($findmacaddress, ' ');
        $getos = UserSystemInfoHelper::get_os();

        return view('sedes.carrera_12.create', [
            'machines' => $machines,
            'name_campu_form_create' => $name_campu_form_create,
            'cng_campus' => $cng_campus,
            'mar_campus' => $mar_campus,
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
        $machines = new Machine();

        //               [db]           [name] (db campos en la base de datos - name campus en el blade create)
        $machines->type_id = request('type');
        $machines->manufacturer = request('manufact');
        $machines->model = request('model');
        $machines->serial = request('serial');
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
        $machines->status = request('status');
        $machines->campus_id = request('campus');
        $machines->location = request('location');
        $machines->comment = request('comment');
        //dd($machines);
        $machines->save();

        return redirect('/santa_marta/sedes/carrera_12');
    }

    public function edit($machines)
    {
        $types = DB::select('SELECT id,name FROM types', [1]);
        $rams = DB::select('SELECT id,ram FROM rams', [1]);
        $hdds = DB::select('SELECT id,size,type FROM hdds', [1]);
        $campus = DB::select('SELECT id,campu_name FROM campus', [1]);
        $c12_campus = DB::table('campus')->select('id','campu_name')->where('label', '=', 'C12')->get();

        //$getos = UserSystemInfoHelper::get_os();

        return view('sedes.carrera_12.edit', [
            'machine' => Machine::findOrFail($machines),
            'c12_campus' => $c12_campus,
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
        $machines->name_pc = request('name-pc');
        $machines->ip_range = $request->get('ip');
        $machines->mac_address = $request->get('mac');
        $machines->anydesk = $request->get('anydesk');
        $machines->os = $request->get('os');
        $machines->campus_id = $request->get('campus_id');
        $machines->location = $request->get('location');
        $machines->comment = $request->get('comment');

        $machines->update();

        return redirect('/santa_marta/sedes/carrera_12');
    }

    public function destroy($id)
    {
        $machines = Machine::findOrFail($id);

        
        if($machines->delete()) { // If softdeleted

        $ts = now()->toDateTimeString();
        $data = array('deleted_at' => $ts, 'status' => 0);
        DB::table('machines')->where('id', $id)->update($data);

        }

        return redirect('/santa_marta/sedes/carrera_12');
    }

}
