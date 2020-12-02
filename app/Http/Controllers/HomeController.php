<?php

namespace App\Http\Controllers;

use App\Campu;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::all();
        $campus = Campu::all();
            /*$users = DB::table('users AS u')
                ->join('campus AS c', 'c.id', '=', 'u.campus_id')
                ->select(
                    'u.id',
                    'u.name',
                    'u.last_name',
                    'u.image',
                    'u.campus_id',
                    'c.id',
                    'c.campu_name',
                )->get();*/
                
        return view('home', ['users' => $users, 'campus' => $campus]);
    }
    
}
