<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proyecto;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function index(){        
        $nroProyectos = Proyecto::all()->count();        
        return view('welcome', compact('nroProyectos'));
    }

    /*public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){
        $request->user()->authorizeRoles(['user','admin','cr']);
    }*/

    /*
    public function someAdminStuff(Request $request)
    {
        $request->user()->authorizeRoles(‘admin’);

        return view(‘some.view’);
    }
    */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    
}
