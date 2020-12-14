<?php

namespace App\Http\Controllers;

use App\Campu;
use App\Exports\UsersExport;
use App\Http\Requests\UserEditFormRequest;
use App\Http\Requests\UserFormRequest;
use App\Role;
use App\Type;
use App\TypeMachine;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
        $this->middleware('verified');
    }

    public function export()
    {
        return Excel::download(new UsersExport, 'inventor.xlsx');
    }

    public function hi()
    {
        return 'hello';
    }

    public function index()
    {

        //$users = DB::table('users')->select('users.*')->orderBy('id', 'DESC')->get(); consulta todos los registros de la tabla;
        //$users = DB::table('users')->select('name', 'age' etc)->orderBy('id', 'DESC')->get(); selecciona solos los campos a consultar;
        $users = User::select('users.*')->orderBy('id', 'ASC')->paginate(4, ['*'], 'users');
        $roles = Role::all();
        $campus = Campu::all();

        //if(Auth::user()->role_id != 'admin'){ return redirect('/home'); }

        return view(
            'technicians.index',
            [
                'users' => $users,
                'roles' => $roles,
                'campus' => $campus
            ]
        );
    }

    public function script()
    {
        $users = DB::table('users')
            ->select('users.*')
            ->orderBy('id', 'DESC')
            ->get();

        return response(json_encode($users), 200)->header('Content-type', 'text/plain');
    }

    public function create()
    {
        $roles = Role::all();
        $campus = Campu::all();

        return view('technicians.create', ['roles' => $roles, 'campus' => $campus]);
    }

    public function store(Request $request)
    {
        $rules = [
            'cc' => 'required|max:10|min:8|unique:users,cc',
            'name' => 'required|unique:users,name',
            'last-name' => 'required',
            'nick-name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required',
            'campu-name' => 'required',
            'work-function' => 'required',
            'password' => 'required|min:8|confirmed'
            //'rol' => 'required'

        ];

        $message = [
            'cc.required' => 'Numero de identificacion es requerido.',
            'cc.min' => 'Numero de identificacion deber tener al menos 8 caracteres.',
            'cc.max' => 'Numero de identificacion deber tener maximo 10 caracteres.',
            'cc.unique' => 'Ya existe este numero de identificacion registrado, por favor registre otro diferente.',
            'name.required' => 'Nombre del usuario es requerido',
            'name.unique' => 'Ya exite un usuario con este nombre, por favor registre otro diferente.',
            'last-name.required' => 'Apellidos del usuario es requerido',
            'nick-name.required' => 'Su nickname es requerido.',
            'email.required' => 'Su correo electrónico es requerido.',
            'email.email' => 'Correo electrónico invalido.',
            'email.unique' => 'Ya existe este correo electrónico registrado, por favor registre otro diferente.',
            'phone.unique' => 'Numero de telefono es requerido',
            'campu-name.required' => 'Debe escoger la sede del técnico',
            'work-fuction.unique' => 'Debe escoger el cargo del usuario',
            'password.required' => 'Por favor escriba una contraseña.',
            'password.min' => 'Debe contener al menos 8 caracteres la contraseña.',
            'password.confirmed' => 'Las contraseñas no coinciden.'
        ];

        $validator = Validator::make($request->all(), $rules, $message);
        if ($validator->fails()) :
            return back()->withErrors($validator)->with(
                'message',
                'Se ha producido un error:'
            )->with(
                'typealert',
                'danger'
            );
        else :
            $users = new User();
            $users->cc = e($request->input('cc'));
            $users->name = e($request->input('name'));
            $users->last_name = e($request->input('last-name'));
            $users->nick_name = e($request->input('nick-name'));
            $users->email = e($request->input('email'));
            $users->phone = e($request->input('phone'));
            $users->campus_id = e($request->input('campu-name'));
            $users->role_id = e($request->input('rol'));
            //$users->assignRole($request->get('rol'));
            $users->work_function = e($request->input('work-function'));
            $users->password = Hash::make($request['password']);
            if ($request->hasFile('avatar')) {
                $file = $request->avatar;
                $file->move(public_path() . '/upload', $file->getClientOriginalName());
                $users->image = $file->getClientOriginalName();
            }

            if ($users->save()) :
                return redirect('/technicians')->withErrors($validator)->with('user_created', 'Usuario fue agregado al inventario!');
            endif;
        endif;
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        $campus = Campu::all();
        return view('technicians.edit', ['user' => $user, 'roles' => $roles, 'campus' => $campus]);
    }

    public function update(Request $request, $id)
    {
        $this->validate(
            request(),
            ['cc' => ['required', 'numeric', 'min:11', 'unique:users,cc,' . $id]],
            ['email' => ['required', 'email', 'max:255', 'unique:users,email,' . $id]]
        );

        $users = User::findOrFail($id);

        $users->cc = $request->get('cc');
        $users->email = $request->get('email');
        $users->name = $request->get('name');
        $users->last_name = $request->get('last-name');
        $users->nick_name = $request->get('nick-name');
        $users->phone = $request->get('phone');
        $users->campus_id = request('campus');

        if ($request->hasFile('avatar')) {
            $file = $request->avatar;
            $file->move(public_path() . '/upload', $file->getClientOriginalName());
            $users->image = $file->getClientOriginalName();
        }

        $pass = $request->get('password');
        if ($pass != null) {
            $users->password = Hash::make($request->get('password'));
        } else {
            unset($users->password);
        }

        $role = $users->roles;
        if (count($role) > 0) {
            $role_id = $role[0]->id;
            User::find($id)->roles()->updateExistingPivot($role_id, ['role_id' => $request->get('rol')]);
        } else {
            $users->assignRole($request->get('rol'));
        }

        $users->save();
        return back()->with('user_update', 'Usuario fue actualizado en el inventario!');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();

        $campus = DB::table('campus')
            ->join('users', 'campus.id', '=', 'users.campus_id')
            ->select('campus.id', 'campus.campu_name')
            ->get();

        return view('technicians.show', ['user' => $user, 'roles' => $roles, 'campus' => $campus]);
    }

    public function destroy($id)
    {
        $users = User::findOrFail($id);

        if ($users->delete()) { // If softdeleted

            $ts = now()->toDateTimeString();
            $data = array('deleted_at' => $ts, 'status_deleted_at' => 0);
            DB::table('users')->where('id', $id)->update($data);
        }

        return redirect('/technicians')
            ->with(
                'user_deleted',
                'Usuario ha sido eliminado del inventario!'
            );
    }
}
