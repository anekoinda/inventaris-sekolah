<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Barang;
use App\Kategori;
use App\PinjamBarang;
use DB;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function database(){
        return view('pro');
    }

}
