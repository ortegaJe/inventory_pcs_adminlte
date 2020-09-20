<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {

        //$users = DB::table('table_machines')->where('id_machine', $name)->first();
        $users = User::all();
        return view('technicians', ['users' => $users]);


        //if (!$users) {
        // abort(404);
        //}
        //dd($users);
    }
}
