<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Auth;


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
        return view('home');
    }

    public function create_element(Request $request){
        if (Auth::user()){
            $user_id = Auth::user()->id;
            $element_name = $request->element_name;
            $element_quantity = $request->element_quantity;
            $element_unit_measurement = $request->element_unit_measurement;
            $element_price = $request->element_price;
            //Section::create(array('name' => $section, 'user_id' => $user_id));
            return $element_name;
        }
    }
}
