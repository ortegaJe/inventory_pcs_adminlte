<?php

namespace App\Http\Controllers;

use App\Http\Requests\MachineFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Machine;

class MachineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //$users = DB::table('table_machines')->where('id_machine', $name)->first();
        $machines = Machine::all();
        return view('machines.index', ['machines' => $machines]);


        //if (!$users) {
        // abort(404);
        //}
        //dd($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('machines.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $machine = new Machine();

        //        [db]           [name] (db campos en la base de datos - name campus en el blade create)
        $machine->type = request('type');
        $machine->manufacturer = request('manufact');
        $machine->model = request('model');
        $machine->serial = request('serial');
        $machine->ram_slot_00 = request('ramslot00');
        $machine->ram_slot_01 = request('ramslot01');
        $machine->hard_drive = request('hard-drive');
        $machine->cpu = request('cpu');
        $machine->ip_range = request('ip');
        $machine->mac_address = request('mac');
        $machine->anydesk = request('anydesk');
        $machine->campus = request('campus');
        $machine->location = request('location');
        $machine->comment = request('comment');

        $machine->save();

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
    public function edit($id)
    {
        return view('machines.edit', ['machine' => Machine::findOrFail($id)]);
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
        $machine->type = $request->get('type');
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
        $machine->campus = $request->get('campus');
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
