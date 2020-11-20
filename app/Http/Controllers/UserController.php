<?php

namespace App\Http\Controllers;

use App\Campu;
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

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
    }

    public function index()
    {

        //$users = DB::table('users')->select('users.*')->orderBy('id', 'DESC')->get(); consulta todos los registros de la tabla;
        //$users = DB::table('users')->select('name', 'age' etc)->orderBy('id', 'DESC')->get(); selecciona solos los campos a consultar;
        $users = User::all();
        $roles = Role::all();
        $campus = Campu::all();

        return view(
            'technicians.index',
            [
                'users' => $users,
                'roles' => $roles,
                'campus' => $campus
            ]
        );
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
            'cc' => 'required|min:10|unique:users,cc',
            'name' => 'required|unique:users,name',
            'last-name' => 'required',
            'nick-name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'campu-name' => 'required',
            'work-function' => 'required',
            'password' => 'required|min:8|confirmed',
            'rol' => 'required'

        ];

        $message = [
            'cc.required' => 'Numero de identificacion es requerido.',
            'cc.min' => 'Numero de identificacion deber tener al menos 8 caracteres.',
            'cc.unique' => 'Ya existe este numero de identificacion ingresado, por favor ingrese otro diferente.',
            'last-name.required' => 'Sus apellido es requerido.',
            'lastname.required' => 'Su alias es requerido.',
            'email.required' => 'Su correo electrónico es requerido.',
            'email.email' => 'Correo electrónico invalido.',
            'email.unique' => 'Ya existe un correo electrónico registrado con este correo electrónico.',
            'password.required' => 'Por favor escriba una contraseña.',
            'password.min' => 'Debe contener al menos 8 caracteres la contraseña.',
            'cpassword.required' => 'Es necesario confirmar la contraseña',
            'cpassword.min' => 'La confirmación de la contraseña debe tener al menos 8 caracteres.',
            'cpassword.same' => 'Las contraseñas no coinciden.'
        ];

        $validator = Validator::make($request->all(), [

        ]);

        if($validator->fails()){
            return back()
            ->withInput()
            ->with('user_with_errors', 'Diligenciar todos los campos requeridos')
            ->withErrors($validator);
        }else{
        $users = new User();

        $users->cc = $request['cc'];
        $users->name = $request['name'];
        $users->last_name = $request['last-name'];
        $users->nick_name = $request['nick-name'];
        $users->email = $request['email'];
        $users->phone = $request['phone'];
        $users->campus_id = $request['campu-name'];
        //$users->role_id = $request['rol'];
        //$users->assignRole($request->get('rol'));
        $users->work_function = $request['work-function'];
        $users->password = Hash::make($request['password']);
        if ($request->hasFile('avatar')) {
            $file = $request->avatar;
            $file->move(public_path() . '/upload', $file->getClientOriginalName());
            $users->image = $file->getClientOriginalName();
        }

        $users->save();

    }
            return back()->with('user_created', 'Usuario fue agregado al inventario!');

    }

    public function edit($id)
    {

        $user = User::findOrFail($id);
        $roles = Role::all();
        $campus = Campu::all();
        return view('technicians.edit', ['user' => $user, 'roles' => $roles, 'campus' => $campus]);
    }

    public function update(UserEditFormRequest $request, $id)
    {
        $this->validate(
            request(),
            ['cc' => ['required', 'numeric', 'min:11', 'unique:users,cc,' . $id]],
            ['email' => ['required', 'email', 'max:255', 'unique:users,email,' . $id]]
        );

        $users = User::findOrFail($id);

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

        $users->update();

        return redirect('/technicians');
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

        $users->delete();

        return redirect('/technicians');
    }
}
