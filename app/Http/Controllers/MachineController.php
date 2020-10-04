<?php

namespace App\Http\Controllers;

use App\Campu;
use App\Http\Requests\MachineFormRequest;
use Illuminate\Http\Request;
use App\Machine;
use App\Type;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MachineController extends Controller
{
        public function __construct()
        {
        $this->middleware('auth');
        }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //$users = DB::table('table_machines')->where('id_machine', $name)->first();
        $machines = Machine::all();
        $types = Type::all();
        $campus = Campu::all();

        //$types = DB::table('types')
        //->join('machines', 'types.id', '=', 'machines.type_id')
        //->select('types.*', 'types.name')
        //->get();

        //dd($types);

        return view('machines.index', ['machines' => $machines, 'types' => $types, 'campus' => $campus]);

        //print_r(['machines' => $machines, 'types' => $types]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        $campus = Campu::all();

        return view('machines.create', ['types' => $types, 'campus' => $campus]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $machines = new Machine();

        //        [db]           [name] (db campos en la base de datos - name campus en el blade create)
        $machines->type_id = request('type');
        $machines->manufacturer = request('manufact');
        $machines->model = request('model');
        $machines->serial = request('serial');
        $machines->ram_slot_00 = request('ramslot00');
        $machines->ram_slot_01 = request('ramslot01');
        $machines->hard_drive = request('hard-drive');
        $machines->cpu = request('cpu');
        $machines->ip_range = request('ip');
        $machines->mac_address = request('mac');
        $machines->anydesk = request('anydesk');
        $machines->campus_id = request('campus');
        $machines->location = request('location');
        $machines->comment = request('comment');

        $machines->save();

        return redirect('/machines');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('machines.show', ['machine' => Machine::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($machines)
    {
        $types = Type::all();
        $campus = Campu::all();

        return view('machines.edit', ['machine' => Machine::findOrFail($machines), 'types' => $types, 'campus' => $campus]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MachineFormRequest $request, $id)
    {
        $machine = Machine::findOrFail($id);

        //        [db]                 [name] (db campos en la base de datos - name campus en el blade edit)
        $machine->type_id = $request->get('type');
        $machine->manufacturer = $request->get('manufact');
        $machine->model = $request->get('model');
        $machine->serial = $request->get('serial');
        $machine->ram_slot_00 = $request->get('ramslot00');
        $machine->ram_slot_01 = $request->get('ramslot01');
        $machine->hard_drive = $request->get('hard-drive');
        $machine->cpu = $request->get('cpu');
        $machine->ip_range = $request->get('ip');
        $machine->mac_address = $request->get('mac');
        $machine->anydesk = $request->get('anydesk');
        $machine->campus_id = $request->get('campus_id');
        $machine->location = $request->get('location');
        $machine->comment = $request->get('comment');

        $machine->update();

        return redirect('/machines');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $machine = Machine::findOrFail($id);

        $machine->delete();

        return redirect('/machines');
    }
}
