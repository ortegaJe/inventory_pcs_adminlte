<?php

namespace App\Http\Controllers;

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
        return view('technicians.index', ['users' => $users]);


        //if (!$users) {
        // abort(404);
        //}
        //dd($users);
    }

    public function create()
    {
        return view('technicians.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:120',
            'email' => 'required|email|unique:users',
            'phone' => 'required|min:11|numeric'
        ]);

        $users = new User();
        $users->name = request('name');
        $users->last_name = request('last-name');
        $users->nick_name = request('nick-name');
        $users->email = request('email');
        $users->phone = request('phone');
        $users->campus = request('campus');
        $users->pos_job = request('pos-job');
        $users->password = Hash::make(request('password'));

        $users->save();

        return redirect('/technicians');
    }

    public function destroy($id)
    {
        $users = User::findOrFail($id);

        $users->delete();

        return redirect('/technicians');
    }
}
