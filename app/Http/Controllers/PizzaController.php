<?php

namespace App\Http\Controllers;

use App\Models\Pizza;
use Illuminate\Http\Request;

class PizzaController extends Controller
{
    function index(){
        return view("index"); 
     }
    function pizzas() {
        // fake data (data from database)

        // array format
        // $pizzas=[
        //     ["id"=>1,"username"=>"Aung","pizza_name"=>"chicken tikka"        , "topping"=>"salad","sauce"=>"tomato sauce","price"=>8.99], //index 0
        //     ["id"=>2,"username"=>"Kyaw","pizza_name"=>"chessy chickent pizza", "topping"=>"salad","sauce"=>"tomato sauce","price"=>7.99],//index 1
        //     ["id"=>3,"username"=>"Zaww","pizza_name"=>"hot pizza"            , "topping"=>"salad","sauce"=>"tomato sauce","price"=>5.99],//index 2
        //     ["id"=>4,"username"=>"mgmg","pizza_name"=>"hot chessy pizza"            , "topping"=>"salad","sauce"=>"tomato sauce","price"=>11.99]//index 3
        // ];
      
        // object format // collection
       $pizzas=Pizza::all();
        // dd($pizzas);
        // send data to blade file
        return view('pizzas',['pizzas'=>$pizzas]);
    }
    // user order
    function insert(Request $req){
        // return $req->toArray();
        // valiadation
        $validation=$req->validate([
            'username'=>"required",
            'pizza_name'=>"required",
            'topping'=>"required",
            'sauce'=>"required",
            'price'=>"required"
        ]);

        if($validation){
            // insert data to database
            $pizza=new Pizza();
            $pizza->username=$req->username;
            $pizza->pizza_name=$req->pizza_name;
            $pizza->topping=$req->topping;
            $pizza->sauce=$req->sauce;
            $pizza->price=$req->price;
            $pizza->save();
            // return $pizza;
            return back()->with("success","Thank You For Your Order");
        }else{
            return back()->withErrors($validation);
        }
    }
    // delete data
    function delete($id){
        // return $id;
        // find data by id
        $delete_pizza_data=Pizza::find($id);
        // return $delete_pizza_data;

        //delete that data
        $delete_pizza_data->delete();
        return  back()->with("delete","$delete_pizza_data->username 's Order is deleted");
    }
    // edit form blade method
    function edit($id){
        // return $id;
        $pizza=Pizza::find($id);
        return view("edit",['pizza'=>$pizza]);
        // return $pizza;
    }
    function update($id,Request $req){
        // return $id;
        $pizza=Pizza::find($id);
        // return $pizza;
        $pizza->username=$req->username;
        $pizza->pizza_name=$req->pizza_name;
        $pizza->topping=$req->topping;
        $pizza->sauce=$req->sauce;
        $pizza->price=$req->price;
        // return $pizza;
        $pizza->update();
        return redirect()->route("pizzas");
    }
}
