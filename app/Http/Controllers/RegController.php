<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reg;
use App\Models\Department;
use App\Models\Faculty;

class RegController extends Controller
{
    public function studentReg(){
        $get = Reg::get();
        $getcount = Reg::count();
        $dep = Department::get();
        $fac = Faculty::get();
        $depDetails = Department::get();
        $facDetails = Faculty::get();

        return view("Registration.studentReg",["get"=>$get,"dep"=>$dep,"fac"=>$fac,"getcount"=>$getcount, "facDetails"=>$facDetails, "depDetails"=>$depDetails]);
    }

    function student_Reg(){
        $input = request()->validate([
            "name"=>"required",
            "lev"=>"required",
            "email"=>"required",
            "fac"=>"required",
            "dept"=>"required",

        ]);
       $input["sid"]=rand(111111,000000);
        Reg:: create($input);
        return back();
    }

    function department_store(){
        $input = request()->validate([
            "department"=>"required",
        ]);

        Department::create($input);
        return back ();
    }

    function faculty_class(){
        $input = request()->validate([
            "faculty" =>"required",
        ]);
        Faculty::create($input);
        return back();
    }

    public function update($id){
        $upload = request()->validate([
            "name"=>"required",
            "lev"=>"required",
            "email"=>"required",
             "fac"=>"required",
            "dept"=>"required",


        ]);
        // dd($upload);
        Reg:: whereId($id)->update($upload);
        return back();
    }



    public function delete($id){
        $remove = Reg::find($id);
        $remove->delete();
        return back();
    }

    public function Smanagement(){
        $facs = Faculty::get();

        $dept = Department::get();

        return view("Registration.Smanagement", [ "facs"=>$facs,"dept"=>$dept]);
    }

    public function update4($id){
        $upload = request()->validate([
            "faculty"=>"required",

        ]);

        Faculty:: whereId($id)->update($upload);
        return back();
     }

     public function delete2($id){
        $remove = Faculty::find($id);
        $remove->delete();
        return back();
     }

     public function update5($id){
        $upload = request()->validate([
            "department"=>"required",
        ]);

        Department:: whereId($id)->update($upload);
        return back();
     }

     public function delete3($id){
        $remove = Department::find($id);
        $remove->delete();
        return back();
     }

}


