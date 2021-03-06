<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Element;
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
            $category_id = $request->category_id;
            $element_price = $request->element_price;
            $date = Carbon::now();
            $new_element = Element::create(array('element_name' => $element_name, 'element_quantity' => $element_quantity, 'element_unit_measurement' => $element_unit_measurement, 'element_price' => $element_price, 'category_id' => $category_id, 'user_id' => $user_id, 'created_at' => $date, 'updated_at' => $date));
            return $new_element;
        }
    }

    public function show_elements(Request $request){
        $user_id = Auth::user()->id;
        $category_id = $request->category_id;
        $elements = DB::table('elements')->where([
            ['user_id', '=', $user_id],
            ['category_id', '=', $category_id],
        ])->get();
        return $elements;
    }

    public function remove_element(Request $request){
        if($request->ajax()){
            if (Auth::user()){
                $element_id = $request->element_id;
                $user_id = Auth::user()->id;
                $result = DB::table('elements')->where('id', $element_id)->where('user_id',  $user_id)->delete();
                return $result;
            }
        }
    }

    public function edit_element(Request $request){
        if($request->ajax()){
            if (Auth::user()){
                $user_id = Auth::user()->id;
                $date = Carbon::now();
                $element_id = $request->element_id;
                $element_name = $request->element_name;
                $element_quantity = $request->element_quantity;
                $element_unit_measurement = $request->element_unit_measurement;
                $element_price = $request->element_price;
                $result = DB::table('elements')->where(['id' => $element_id , 'user_id' => $user_id ])->update(['element_name' => $element_name, 'element_quantity' => $element_quantity, 'element_unit_measurement' => $element_unit_measurement, 'element_price' => $element_price]);
            }
        } 

        return $request;
    }
}
