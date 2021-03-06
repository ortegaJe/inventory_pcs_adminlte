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
        $name_campu_table_index = DB::table('campus')->get();

        //info_box//
        $atril_count = DB::table('machines')
            ->select('type_id', 'campus_id', 'status_deleted_at', 'deleted_at')
            ->where('status_deleted_at', '=', [1])
            ->where('deleted_at', '=', NULL)
            ->where('type_id', '=', [2]) //id en la tabla types
            ->where('campus_id', '=', [12]) //id en la tabla campus
            ->count();

        $type_atril = DB::table('types')->get(); //nombres de los tipos

        $pc_count = DB::table('machines')
            ->select('type_id', 'campus_id', 'status_deleted_at')
            ->where('status_deleted_at', '=', [1])
            ->where('deleted_at', '=', NULL)
            ->where('type_id', '=', [1])
            ->where('campus_id', '=', [12])
            ->count();

        $type_pc = DB::table('types')->get();

        $laptop_count = DB::table('machines')
            ->select('type_id', 'campus_id', 'status_deleted_at')
            ->where('status_deleted_at', '=', [1])
            ->where('deleted_at', '=', NULL)
            ->where('type_id', '=', [3])
            ->where('campus_id', '=', [12])
            ->count();

        $type_laptop = DB::table('types')->get();

        $berry_count = DB::table('machines')
            ->select('type_id', 'campus_id', 'status_deleted_at')
            ->where('status_deleted_at', '=', [1])
            ->where('deleted_at', '=', NULL)
            ->where('type_id', '=', [4])
            ->where('campus_id', '=', [12])
            ->count();

        $type_berry = DB::table('types')->get();
        //end info_box//

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
                    'm.name_pc',
                    'm.ip_range',
                    'm.mac_address',
                    'm.anydesk',
                    'm.os',
                    'm.location',
                    'm.comment',
                    'm.created_at',
                    'c.campu_name'
                )->where('label', '=', 'KNY')->whereNull('deleted_at');

            return DataTables::of($kny_machines)
                ->addColumn('action', 'sedes.kennedy.actions')
                ->rawColumns(['action'])
                ->make(true);
        }

        return view(
            'sedes.kennedy.index',
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
        $kny_campus = DB::table('campus')->select('id', 'campu_name')->where('label', '=', 'KNY')->get();
        $name_campu_table_index = DB::table('campus')->get();
        //$getip = UserSystemInfoHelper::get_ip();
        $findmacaddress = exec('getmac');
        $getmacaddress = strtok($findmacaddress, ' ');
        $getos = UserSystemInfoHelper::get_os();

        return view('sedes.kennedy.create', [
            'kny_machines' => $kny_machines,
            'name_campu_table_index' => $name_campu_table_index,
            'types' => $types,
            'campus' => $campus,
            'kny_campus' => $kny_campus,
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
        $kny_machines->name_pc = request('name-pc');
        $kny_machines->ip_range = request('ip');
        $kny_machines->mac_address = request('mac');
        $kny_machines->anydesk = request('anydesk');
        $kny_machines->os = request('os');
        $kny_machines->created_by = Auth::user()->id;
        $kny_machines->rol_id = $roles;
        $kny_machines->status_deleted_at = request('status');
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

        $kny_machines = Machine::findOrFail($id);

        //        [db]                 [name] (db campos en la base de datos - name campus en el blade edit)
        $kny_machines->type_id = $request->get('type');
        $kny_machines->manufacturer = $request->get('manufact');
        $kny_machines->model = $request->get('model');
        $kny_machines->serial = $request->get('serial');
        $kny_machines->ram_slot_00_id = $request->get('ramslot00');
        $kny_machines->ram_slot_01_id = $request->get('ramslot01');
        $kny_machines->hard_drive_id = $request->get('hard-drive');
        $kny_machines->cpu = $request->get('cpu');
        $kny_machines->name_pc = request('name-pc');
        $kny_machines->ip_range = $request->get('ip');
        $kny_machines->mac_address = $request->get('mac');
        $kny_machines->anydesk = $request->get('anydesk');
        $kny_machines->os = $request->get('os');
        $kny_machines->campus_id = $request->get('campus_id');
        $kny_machines->location = $request->get('location');
        $kny_machines->comment = $request->get('comment');

        $kny_machines->update();

        return redirect('/sedes/kennedy');
    }

    public function destroy($id)
    {
        $machines = Machine::findOrFail($id);


        if ($machines->delete()) { // If softdeleted

            $ts = now()->toDateTimeString();
            $data = array('deleted_at' => $ts, 'status_deleted_at' => 0);
            DB::table('machines')->where('id', $id)->update($data);
        }

        return redirect('/sedes/kennedy');
    }
}
