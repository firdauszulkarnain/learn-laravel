<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $data['token'] =  auth()->user()->createToken('token')->plainTextToken;
        return view('home', $data);
    }

    public function admin()
    {
        $data['token'] =  auth()->user()->createToken('token')->plainTextToken;
        return view('admin', $data);
    }
}
