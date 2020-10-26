<?php

namespace App\Http\Controllers;

use App\Campu;
use App\Helpers\UserSystemInfoHelper;
use App\Machine;
use App\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class CampusController extends Controller
{
        public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
    }

    public function index(Request $request)
    {
            if ($request->ajax()) {
            $mac_machines = DB::table('machines')
            ->join('types', 'types.id', '=', 'machines.type_id')
            ->join('campus', 'campus.id', '=', 'machines.campus_id')
            ->select('machines.id','machines.ip_range', 'machines.mac_address',
                     'machines.anydesk','types.name', 'campus.campu_name')->where('campus_id', '=', [1]);

            return DataTables::of($mac_machines)
            ->addColumn('action', 'sedes.macarena.actions')
            ->rawColumns(['action'])
            ->make(true);
        }

        return view('sedes.macarena.index');

       /* $mac_machines = DB::select('SELECT `id`,`serial`, `lote`, `type_id`, `manufacturer`, 
                                       `model`, `ram_slot_00_id`, `ram_slot_01_id`, 
                                       `hard_drive`, `cpu`, `ip_range`, `mac_address`,
                                       `anydesk`, `campus_id`, `location`, `image`, 
                                       `comment`, `created_at`, `updated_at` 
                                        FROM 
                                       `machines` WHERE campus_id=1', [1]);
        $types = DB::select('SELECT id,name FROM types', [1]);
        $rams = DB::select('SELECT id,ram FROM rams', [1]);
        $options = DB::select('SELECT id,label FROM options', [1]);
        $hdds = DB::select('SELECT id,size,type FROM hdds', [1]);
        $campus = DB::select('SELECT id,campu_name FROM campus', [1]);

        return view('sedes.macarena.index', [
            'mac_machines' => $mac_machines,
            'types' => $types,
            'campus' => $campus,
            'rams' => $rams,
            'options' => $options,
            'hddss' => $hdds
        ]);*/
    }

        public function create()
    {
        $mac_machines = DB::select('SELECT `id`,`serial`, `lote`, `type_id`, `manufacturer`, 
                                       `model`, `ram_slot_00_id`, `ram_slot_01_id`, 
                                       `hard_drive`, `cpu`, `ip_range`, `mac_address`,
                                       `anydesk`, `campus_id`, `location`, `image`, 
                                       `comment`, `created_at`, `updated_at` 
                                        FROM 
                                       `machines` WHERE campus_id=1', [1]);

        $types = DB::select('SELECT id,name FROM types', [1]);
        $rams = DB::select('SELECT id,ram FROM rams', [1]);
        $hdds = DB::select('SELECT id,size,type FROM hdds', [1]);
        $campus = DB::select('SELECT id,campu_name FROM campus', [1]);

        $getip = UserSystemInfoHelper::get_ip();
        $findmacaddress = exec('getmac');
        $getmacaddress = strtok($findmacaddress, ' ');
        $getos = UserSystemInfoHelper::get_os();

        return view('sedes.macarena.create', [
            'mac_machines' => $mac_machines,
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

        $mac_machines = new Machine();

        //               [db]           [name] (db campos en la base de datos - name campus en el blade create)
        $mac_machines->type_id = request('type');
        $mac_machines->manufacturer = request('manufact');
        $mac_machines->model = request('model');
        $mac_machines->serial = request('serial');
        $mac_machines->ram_slot_00_id = request('ramslot00');
        $mac_machines->ram_slot_01_id = request('ramslot01');
        $mac_machines->hard_drive = request('hard-drive');
        $mac_machines->cpu = request('cpu');
        $mac_machines->ip_range = request('ip');
        $mac_machines->mac_address = request('mac');
        $mac_machines->anydesk = request('anydesk');
        $mac_machines->campus_id = request('campus');
        $mac_machines->location = request('location');
        $mac_machines->comment = request('comment');

        $mac_machines->save();

        return redirect('/sedes/macarena');
    }

        public function edit($machines)
    {
        $types = DB::select('SELECT id,name FROM types', [1]);
        $rams = DB::select('SELECT id,ram FROM rams', [1]);
        $hdds = DB::select('SELECT id,size,type FROM hdds', [1]);
        $campus = DB::select('SELECT id,campu_name FROM campus', [1]);

        $getos = UserSystemInfoHelper::get_os();

        return view('sedes.macarena.edit', [
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
        $machines->hard_drive = $request->get('hard-drive');
        $machines->cpu = $request->get('cpu');
        $machines->ip_range = $request->get('ip');
        $machines->mac_address = $request->get('mac');
        $machines->anydesk = $request->get('anydesk');
        $machines->os = $getos;
        $machines->campus_id = $request->get('campus_id');
        $machines->location = $request->get('location');
        $machines->comment = $request->get('comment');

        $machines->update();

        return redirect('/sedes/macarena');
    }
    
    public function destroy($id)
    {
        $machines = Machine::findOrFail($id);

        $machines->delete();

        return redirect('/sedes/macarena');
    }
}
