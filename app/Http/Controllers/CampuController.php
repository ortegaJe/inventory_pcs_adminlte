<?php

namespace App\Http\Controllers;

use App\Campu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class CampuController extends Controller
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
        if ($request->ajax()) {
            $campus = DB::table('campus')
                ->select(
                    'id',
                    'campu_name',
                    'label',
                    'created_at'
                );

            return DataTables::of($campus)
                ->addColumn('action', 'campus.actions')
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('campus.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $campus = Campu::all();
        return view('campus.index', ['campus' => $campus]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campus = new Campu();

        $campus->campu_name = request('campu-name');

        $campus->save();

        return redirect('/campus');
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
    public function destroy($id)
    {
        $campus = Campu::findOrFail($id);

        $campus->delete();

        return redirect('/campus');
    }
}
