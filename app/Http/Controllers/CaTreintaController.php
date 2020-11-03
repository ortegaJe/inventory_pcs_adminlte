<?php

namespace App\Http\Controllers;

use App\Helpers\UserSystemInfoHelper;
use App\Machine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class CaTreintaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $c30_machines = DB::table('machines')
                ->join('types', 'types.id', '=', 'machines.type_id')
                ->join('campus', 'campus.id', '=', 'machines.campus_id')
                ->select(
                    'machines.id',
                    'types.name',
                    'serial',
                    'manufacturer',
                    'model',
                    'cpu',
                    'machines.ip_range',
                    'machines.mac_address',
                    'machines.anydesk',
                    'os',
                    'location',
                    'comment',
                    'campus.campu_name'
                )->where('label', '=', 'C30');

            return DataTables::of($c30_machines)
                ->addColumn('action', 'sedes.calle_30.actions')
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('sedes.calle_30.index');
    }

    public function create()
    {
        $c30_machines = DB::select('SELECT `id`,`serial`, `lote`, `type_id`, `manufacturer`, 
                                       `model`, `ram_slot_00_id`, `ram_slot_01_id`, 
                                       `hard_drive_id`, `cpu`, `ip_range`, `mac_address`,
                                       `anydesk`, `campus_id`, `location`, `image`, 
                                       `comment`, `created_at`, `updated_at` 
                                        FROM 
                                       `machines` WHERE campus_id=4', [1]);

        $types = DB::select('SELECT id,name FROM types', [1]);
        $rams = DB::select('SELECT id,ram FROM rams', [1]);
        $hdds = DB::select('SELECT id,size,type FROM hdds', [1]);
        $campus = DB::select('SELECT id,campu_name FROM campus', [1]);

        $getip = UserSystemInfoHelper::get_ip();
        $findmacaddress = exec('getmac');
        $getmacaddress = strtok($findmacaddress, ' ');
        $getos = UserSystemInfoHelper::get_os();

        return view('sedes.calle_30.create', [
            'c30_machines' => $c30_machines,
            'types' => $types,
            'campus' => $campus,
            'rams' => $rams,
            'hdds' => $hdds,
            'getmacaddress' => $getmacaddress,
            'getos' => $getos,
            'getip' => $getip,
        ]);
    }

    public function store(Request $request)
    {
        $getip = UserSystemInfoHelper::get_ip();
        $findmacaddress = exec('getmac');
        $getmacaddress = strtok($findmacaddress, ' ');

        $c30_machines = new Machine();

        //               [db]           [name] (db campos en la base de datos - name campus en el blade create)
        $c30_machines->type_id = request('type');
        $c30_machines->manufacturer = request('manufact');
        $c30_machines->model = request('model');
        $c30_machines->serial = request('serial');
        $c30_machines->ram_slot_00_id = request('ramslot00');
        $c30_machines->ram_slot_01_id = request('ramslot01');
        $c30_machines->hard_drive_id = request('hard-drive');
        $c30_machines->cpu = request('cpu');
        $c30_machines->ip_range = request('ip');
        $c30_machines->mac_address = request('mac');
        $c30_machines->anydesk = request('anydesk');
        $c30_machines->campus_id = request('campus');
        $c30_machines->location = request('location');
        $c30_machines->comment = request('comment');

        $c30_machines->save();

        return redirect('/sedes/calle_30');
    }

    public function edit($machines)
    {
        $types = DB::select('SELECT id,name FROM types', [1]);
        $rams = DB::select('SELECT id,ram FROM rams', [1]);
        $hdds = DB::select('SELECT id,size,type FROM hdds', [1]);
        $campus = DB::select('SELECT id,campu_name FROM campus', [1]);

        $getos = UserSystemInfoHelper::get_os();

        return view('sedes.calle_30.edit', [
            'machine' => Machine::findOrFail($machines),
            'getos' => $getos,
            'types' => $types,
            'campus' => $campus,
            'rams' => $rams,
            'hdds' => $hdds
        ]);
    }

    public function update(Request $request, $id)
    {
        $getos = UserSystemInfoHelper::get_os();

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
        $machines->os = $getos;
        $machines->campus_id = $request->get('campus_id');
        $machines->location = $request->get('location');
        $machines->comment = $request->get('comment');

        $machines->update();

        return redirect('/sedes/calle_30');
    }

    public function destroy($id)
    {
        $machines = Machine::findOrFail($id);

        $machines->delete();

        return redirect('/sedes/calle_30');
    }
}
