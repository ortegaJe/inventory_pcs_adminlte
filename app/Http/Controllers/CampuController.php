<?php

namespace App\Http\Controllers;

use App\Campu;
use App\Exports\CampusExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class CampuController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
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

    public function export()
    {
        return Excel::download(new CampusExport, 'inventor.xlsx');
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
        $rules = [
            'name' => 'required|unique:campus,campu_name',
            'label' => 'required|max:4|unique:campus,label'
        ];

        $message =[
            'name.required' => 'Nombre de la sede es requerido',
            'name.unique' => 'Ya existe una sede con este nombre, por favor registra otro diferente',
            'label.required' => 'Es requirida una abreviacíon para la sede a registrar',
            'label.max' => 'Solo se puede abreviar el nombre de la sede con minimo 4 palabras',
            'label.unique' => 'Ya existe una abreviacíon como este, por favor ingresa una diferente'
        ];

        $validator = Validator::make($request->all(), $rules, $message);
        if($validator->fails()) :
            return back()->withErrors($validator)->with(
                'message',
                'Se ha producido un error:')->with(
                'typealert',
                'danger');
        else :
        $campus = new Campu();
        $campus->campu_name = e($request->input('name'));
        $campus->label = e($request->input('label'));

                if($campus->save()):
                return redirect('/campus')->withErrors($validator)->with('campus_created', 'Sede fue agregada al inventario!');
            endif;
        endif;
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

        return redirect('/campus')
               ->with('campus_deleted',
                      'Equipo eliminado del inventario');
    }
}
