<?php

namespace App\Http\Controllers;

use App\Hdd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HddController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hdds = DB::select('SELECT id,size,type FROM hdds', [1]);

        return view('hdd.index', [
            'hdds' => $hdds, 200
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $hdds = new Hdd();

        $hdds->size = request('hdd-size');
        $hdds->type = request('hdd-type');

        $hdds->save();

        return redirect('/hdd', 302);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hdds = Hdd::findOrFail($id);

        $hdds->delete();

        return redirect('/hdd', 302);
    }
}
