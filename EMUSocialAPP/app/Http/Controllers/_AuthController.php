<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Http;

class _AuthController extends Controller{

    function register(Request $request){
        if ($request->isMethod('post')) {
            $firstname = $request->input("firstname");
            $lastname = $request->input("lastname");
            $email = $request->input("email");
            $country = $request->input("country");
            $dob = $request->input("dob");
            $gender = $request->input("gender");
            $password = $request->input("password");
            $profileimg = $request->file('profileimage');
    
            $userType = $request->input("academiccareer");
            if($userType == "student"){
                $stdNo = $request->input("academicstatus");
                $stdNo = $request->input("graduationdate");
                $stdNo = $request->input("studentnumber");
                $stdNo = $request->input("academicdegree");
            }
            if($userType == "instructor" || $userType == "servant"){
                $stdNo = $request->input("academicstatus");
                $stdNo = $request->input("retirementdate");
                $stdNo = $request->input("stafftype");
            }
          
        return response()->json([
            'success' => true,
        ]);
        }
     
       
    }

    function login(Request $request){

    }
}