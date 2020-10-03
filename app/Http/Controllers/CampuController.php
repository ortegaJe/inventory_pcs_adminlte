<?php

namespace App\Http\Controllers;

use App\Campu;
use Illuminate\Http\Request;

class CampuController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Campu  $campu
     * @return \Illuminate\Http\Response
     */
    public function show(Campu $campu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Campu  $campu
     * @return \Illuminate\Http\Response
     */
    public function edit(Campu $campu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Campu  $campu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Campu $campu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Campu  $campu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Campu $campu)
    {
        //
    }
}
