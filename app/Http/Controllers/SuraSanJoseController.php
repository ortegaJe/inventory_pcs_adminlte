<?php

namespace App\Http\Controllers;

use App\Helpers\UserSystemInfoHelper;
use App\Machine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class SuraSanJoseController extends Controller
{
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
            ->where('campus_id', '=', [6]) //id en la tabla campus
            ->count();

        $type_atril = DB::table('types')->get(); //nombres de los tipos

        $pc_count = DB::table('machines')
            ->select('type_id', 'campus_id', 'status_deleted_at')
            ->where('status_deleted_at', '=', [1])
            ->where('deleted_at', '=', NULL)
            ->where('type_id', '=', [1])
            ->where('campus_id', '=', [6])
            ->count();

        $type_pc = DB::table('types')->get();

        $laptop_count = DB::table('machines')
            ->select('type_id', 'campus_id', 'status_deleted_at')
            ->where('status_deleted_at', '=', [1])
            ->where('deleted_at', '=', NULL)
            ->where('type_id', '=', [3])
            ->where('campus_id', '=', [6])
            ->count();

        $type_laptop = DB::table('types')->get();

        $berry_count = DB::table('machines')
            ->select('type_id', 'campus_id', 'status_deleted_at')
            ->where('status_deleted_at', '=', [1])
            ->where('deleted_at', '=', NULL)
            ->where('type_id', '=', [4])
            ->where('campus_id', '=', [6])
            ->count();

        $type_berry = DB::table('types')->get();
        //end info_box//

        if ($request->ajax()) {
            $ssj_machines = DB::table('machines AS m')
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
                )->where('label', '=', 'SSJ')->whereNull('deleted_at');

            return DataTables::of($ssj_machines)
                ->addColumn('action', 'sedes.sura_san_jose.actions')
                ->rawColumns(['action'])
                ->make(true);
        }

        return view(
            'sedes.sura_san_jose.index',
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
        $ssj_machines = DB::select('SELECT `id`,`serial`, `lote`, `type_id`, `manufacturer`, 
                                       `model`, `ram_slot_00_id`, `ram_slot_01_id`, 
                                       `hard_drive_id`, `cpu`, `ip_range`, `mac_address`,
                                       `anydesk`, `campus_id`, `location`, `image`, 
                                       `comment`, `created_at`, `updated_at` 
                                        FROM 
                                       `machines` WHERE campus_id=8', [1]);

        $types = DB::select('SELECT id,name FROM types', [1]);
        $rams = DB::select('SELECT id,ram FROM rams', [1]);
        $hdds = DB::select('SELECT id,size,type FROM hdds', [1]);
        $campus = DB::select('SELECT id,campu_name FROM campus', [1]);
        $name_campu_table_index = DB::table('campus')->get();
        $ssj_campus = DB::table('campus')->select('id', 'campu_name')->where('label', '=', 'SSJ')->get();

        //$getip = UserSystemInfoHelper::get_ip();
        $findmacaddress = exec('getmac');
        $getmacaddress = strtok($findmacaddress, ' ');
        $getos = UserSystemInfoHelper::get_os();

        return view('sedes.sura_san_jose.create', [
            'ssj_machines' => $ssj_machines,
            'name_campu_table_index' => $name_campu_table_index,
            'ssj_campus' => $ssj_campus,
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

        $ssj_machines = new Machine();

        //               [db]           [name] (db campos en la base de datos - name campus en el blade create)
        $ssj_machines->type_id = request('type');
        $ssj_machines->manufacturer = request('manufact');
        $ssj_machines->model = request('model');
        $ssj_machines->serial = request('serial');
        $ssj_machines->ram_slot_00_id = request('ramslot00');
        $ssj_machines->ram_slot_01_id = request('ramslot01');
        $ssj_machines->hard_drive_id = request('hard-drive');
        $ssj_machines->cpu = request('cpu');
        $ssj_machines->name_pc = request('name-pc');
        $ssj_machines->ip_range = request('ip');
        $ssj_machines->mac_address = request('mac');
        $ssj_machines->anydesk = request('anydesk');
        $ssj_machines->os = request('os');
        $ssj_machines->created_by = Auth::user()->id;
        $ssj_machines->rol_id = $roles;
        $ssj_machines->status_deleted_at = request('status');
        $ssj_machines->campus_id = request('campus');
        $ssj_machines->location = request('location');
        $ssj_machines->comment = request('comment');

        $ssj_machines->save();

        return redirect('/sedes/sura_san_jose');
    }

    public function edit($machines)
    {
        $types = DB::select('SELECT id,name FROM types', [1]);
        $rams = DB::select('SELECT id,ram FROM rams', [1]);
        $hdds = DB::select('SELECT id,size,type FROM hdds', [1]);
        $campus = DB::select('SELECT id,campu_name FROM campus', [1]);

        //$getos = UserSystemInfoHelper::get_os();

        return view('sedes.sura_san_jose.edit', [
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

        $ssj_machines = Machine::findOrFail($id);

        //        [db]                 [name] (db campos en la base de datos - name campus en el blade edit)
        $ssj_machines->type_id = $request->get('type');
        $ssj_machines->manufacturer = $request->get('manufact');
        $ssj_machines->model = $request->get('model');
        $ssj_machines->serial = $request->get('serial');
        $ssj_machines->ram_slot_00_id = $request->get('ramslot00');
        $ssj_machines->ram_slot_01_id = $request->get('ramslot01');
        $ssj_machines->hard_drive_id = $request->get('hard-drive');
        $ssj_machines->cpu = $request->get('cpu');
        $ssj_machines->name_pc = request('name-pc');
        $ssj_machines->ip_range = $request->get('ip');
        $ssj_machines->mac_address = $request->get('mac');
        $ssj_machines->anydesk = $request->get('anydesk');
        $ssj_machines->os = $request->get('os');
        $ssj_machines->campus_id = $request->get('campus_id');
        $ssj_machines->location = $request->get('location');
        $ssj_machines->comment = $request->get('comment');

        $ssj_machines->update();

        return redirect('/sedes/sura_san_jose');
    }

    public function destroy($id)
    {
        $ssj_machines = Machine::findOrFail($id);


        if ($ssj_machines->delete()) { // If softdeleted

            $ts = now()->toDateTimeString();
            $data = array('deleted_at' => $ts, 'status_deleted_at' => 0);
            DB::table('machines')->where('id', $id)->update($data);
        }

        return redirect('/sedes/sura_san_jose');
    }
}
