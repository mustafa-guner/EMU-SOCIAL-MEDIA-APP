<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use DateTime;
use DatePeriod;
use DateInterval;



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
            if(!$request.filled("lastname")) array_push($errors,array("message"=>"Lastname field is required."));
            if(!$request.filled("email")) array_push($errors,array("message"=>"Email field is required."));
            if(!$request.filled("country")) array_push($errors,array("message"=>"Country field is required."));
            if(!$request.filled("dob")) array_push($errors,array("message"=>"Dob field is required."));
            if(!$request.filled("gender")) array_push($errors,array("message"=>"Gender field is required."));
            if(!$request.filled("password")) array_push($errors,array("message"=>"Password field is required."));
            if(!$request.filled("userType")) array_push($errors,array("message"=>"UserType field is required."));
            if(!$request.filled("academicstatus")) array_push($errors,array("message"=>"Academicstatus field is required."));

            // $Hash::make($password);
            //GET ALL THE REQUIRED FIELDS WITH REQUEST->ALL
    
            //If is there any erorr send error response the client
            if(count($errors) > 0) response()->json([
                'success' => false,
                "errors"=>$errors,
              
            ]);

            $client = new \GuzzleHttp\Client([
                'verify' => false,
            ]);
    
           
            $url = "http://localhost:5219/auth/register";

            // $fakeRequestBody = array(
            //     "firstname"=> "Test12332211",
            //     "lastname"=> "Test1422213",
            //     "email"=> "teas11s@outlook.com",
            //     "profileImage"=> "profile.jpeg",
            //     "password"=> "asdf1234",
            //     "dob"=> "1999-12-22",
            //     "gender"=> "Female",
            //     "country"=> "Russia",
            //     "userTypeID"=> 2,
            //     "graduationDate"=>"1999-12-22",
            //     "isGraduated"=>false,
            //     "isAssistant"=>false,
            //     "studentNumber"=>6330167,
            //     "degreeType"=>"Graduate"
            // );
     
        try{
            $response = $client->request("POST",$url,["json"=>$request->all()]);
            $result = json_decode($response->getBody());
            dd($result);
        }catch(Exception $e){
            $error = json_decode($e->getResponse()->getBody()->getContents());
            $errorMessage = $error->message;
        }
    }
       
    }

    function login(Request $request){

    }
}