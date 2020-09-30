<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserEditFormRequest;
use App\Http\Requests\UserFormRequest;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {

        //$users = DB::table('table_machines')->where('id_machine', $name)->first();
        $users = User::all();
        $roles = Role::all();

        return view('technicians.index', ['users' => $users, 'roles' => $roles]);
    }

    public function create()
    {
        $roles = Role::all();
        return view('technicians.create', ['roles' => $roles]);
    }

    public function store(UserFormRequest $request)
    {
        /*$this->validate($request, [
            'name' => 'required|max:120',
            'email' => 'required|email',
            'phone' => 'required|max:10|numeric'
        ]);*/

        $users = new User();
        $users->cc = request('cc');
        $users->name = request('name');
        $users->last_name = request('last-name');
        $users->nick_name = request('nick-name');
        $users->email = request('email');
        $users->phone = request('phone');
        $users->campus_id = request('campus');
        $users->work_function = request('work-function');
        $users->password = Hash::make(request('password'));
        if ($request->hasFile('avatar')) {
            $file = $request->avatar;
            $file->move(public_path() . '/upload', $file->getClientOriginalName());
            $users->image = $file->getClientOriginalName();
        }

        //dd($users);
        $users->save();

        $users->assignRole($request->get('rol'));


        return redirect('/technicians');
    }

    public function edit($id)
    {

        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('technicians.edit', ['user' => $user, 'roles' => $roles]);
    }

    public function update(UserEditFormRequest $request, $id)
    {
        $this->validate(
            request(),
            ['cc' => ['required', 'max:10', 'unique:users,cc,' . $id]],
            ['email' => ['required', 'email', 'max:255', 'unique:users,email,' . $id]]
        );

        $users = User::findOrFail($id);

        $users->name = $request->get('name');
        $users->last_name = $request->get('last-name');
        $users->nick_name = $request->get('nick-name');
        $users->phone = $request->get('phone');

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
        }
        User::find($id)->roles()->updateExistingPivot($role_id, ['role_id' => $request->get('rol')]);

        $users->update();

        return redirect('/technicians');
    }

    public function destroy($id)
    {
        $users = User::findOrFail($id);

        $users->delete();

        return redirect('/technicians');
    }
}
