<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Http;

class _AuthController extends Controller{

    function register(Request $request){
        if ($request->isMethod('post')) {

            //Overall information
            $firstname = $request->get("firstname");
            $lastname = $request->get("lastname");
            $email = $request->get("email");
            $country = $request->get("country");
            $dob = $request->get("dob");
            $gender = $request->get("gender");
            $password = $request->get("password");
            $profileimg = $request->file('profileimage');
            $userType = $request->get("academiccareer");
            $academicstatus = $request->get("academicstatus");
            
          
            $errors = (array) null; 
            
            if(!$request.filled("firstname"))   
            if(!$request.filled("lastname")) array_push($errors,"Lastname field is required.");
            if(!$request.filled("email")) array_push($errors,"Email field is required.");
            if(!$request.filled("country")) array_push($errors,"Country field is required.");
            if(!$request.filled("dob")) array_push($errors,"Dob field is required.");
            if(!$request.filled("gender")) array_push($errors,"Gender field is required.");
            if(!$request.filled("password")) array_push($errors,"Password field is required.");
            if(!$request.filled("userType")) array_push($errors,"UserType field is required.");
            if(!$request.filled("academicstatus")) array_push($errors,"Academicstatus field is required.");

         
            // $Hash::make($password);
            //GET ALL THE REQUIRED FIELDS WITH REQUEST->ALL
     

            //If is there any erorr send error response the client
            if(count($errors) > 0) response()->json([
                'success' => false,
                "errors"=>$errors,
              
            ]);

       
            
        return response()->json([
            'success' => true,      
            // "user"=>$userDetails,
            "all"=>$request->all()
        ]);
        }
     
       
    }

    function login(Request $request){

    }
}