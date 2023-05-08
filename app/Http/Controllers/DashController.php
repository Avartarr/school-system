<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dash;
use App\Models\Reg;
//use App\Http\Controllers\Auth;
use Auth;

class DashController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashBoard(){


            $get = Dash::get();
             $name = Reg::get();
        return view("Dashboard.dashBoard",["get" =>$get, "name" =>$name]);
    }


    function dash_Board(){
        $input = request()->validate([
            "name"=>"required",
            "mat"=>"required",
            "eng"=>"required",
            "che"=>"required",
            "phy"=>"required",
            "bio"=>"required",

        ]);

        Dash::create($input);
        return back();
    }

    public function update($id){
        $upload = request()->validate([
            "name"=>"required",
            "mat"=>"required",
            "eng"=>"required",
            "che"=>"required",
            "phy"=>"required",
            "bio"=>"required",

        ]);

        dd($upload);
        Dash:: whereId($id)->update($upload);
        return back();
    }


    public function chisom($id){
        $upload = request()->validate([
            "name"=>"required",
            "mat"=>"required",
            "eng"=>"required",
            "che"=>"required",
            "phy"=>"required",
            "bio"=>"required",

        ]);


        Dash:: whereId($id)->update($upload);
        return back();
    }




    public function result(){
        $get = Dash::get();
        return view("Dashboard.result",["get"=>$get]);
    }

    function result_a(){
        $input = request()->validate([
            "name"=>"required",
            "mat"=>"required",
            "eng"=>"required",
            "che"=>"required",
            "phy"=>"required",
            "bio"=>"required",

        ]);

        Dash::create($input);
        return back();
    }

    // public function updated($id){
    //     $upload = request()->validate([
    //         "name"=>"required",
    //         "mat"=>"required",
    //         "eng"=>"required",
    //         "che"=>"required",
    //         "phy"=>"required",
    //         "bio"=>"required",

    //     ]);
    //     Dash:: whereId($id)->updated($upload);
    //     return back();
    // }

    public function delete($id){
        $remove = Dash::find($id);
        $remove ->delete();
        return back();
    }

    public function deleted($id){
        $remove = Dash::find($id);
        $remove ->delete();
        return back();
    }

    public function resultb(){
        $get = Dash:: get();
        return view ("Dashboard.resultb", ["get" =>$get]);
    }

    function result_b(){
    $input = request()->validate([
        "name"=>"required",
        "mat"=>"required",
        "eng"=>"required",
        "che"=>"required",
        "phy"=>"required",
        "bio"=>"required",

    ]);
    Dash:: create($input);
    return back();
}
}
