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
        $client = new \GuzzleHttp\Client([
            'verify' => false,
        ]);
        $url = "http://localhost:4200/api/v1/auth/register";
        try{ 
     
            $image_path = $request->file('profileImage')->getPathname();
            $image_mime = $request->file('profileImage')->getmimeType();
            $image_org  = $request->file('profileImage')->getClientOriginalName();
          
             $response = $client->request('POST', $url, [
                'multipart'=>[
                    [ "name"=>"profileImage",
                            "filename"=>$image_org,
                            'Mime-Type'=> $image_mime,
                            'contents' => fopen( $image_path, 'r' ),
                    ],
                    [
                    'name'=>'firstname',
                    'contents'=>$request->input("firstname"),
                    ],
                    [
                    'name'=>'lastname',
                    'contents'=>$request->input("lastname"),
                    ],
                    [
                    'name'=>'country',
                    'contents'=>$request->input("country"),
                    ],
                
                    [
                    'name'=>'gender',
                    'contents'=>$request->input("gender"),
                    ],
                    [
                    'name'=>'email',
                    'contents'=>$request->input("email"),
                    ],
                    [
                    'name'=>'dob',
                    'contents'=>$request->input("dob"),
                    ],
                    [
                    'name'=>'password',
                    'contents'=>$request->input("password"),
                    ],
                    [
                    'name'=>'userType',
                    'contents'=>$request->input("userType"),
                    ],
                    [
                    'name'=>'studentNumber',
                    'contents'=>$request->input("studentNumber"),
                    ],
                    [
                    'name'=>'degreeType',
                    'contents'=>$request->input("degreeType"),
                    ],
                    [
                    'name'=>'isGraduated',
                    'contents'=>$request->input("isGraduated"),
                    ],
                    [
                    'name'=>'graduationDate',
                    'contents'=>$request->input("graduationDate"),
                    ],
                    [
                    'name'=>'staffType',
                    'contents'=>$request->input("staffType"),
                    ],
                    [
                    'name'=>'isRetired',
                    'contents'=>$request->input("isRetired"),
                    ],
                    [
                    'name'=>'retirementDate',
                    'contents'=>$request->input("retirementDate"),
                    ],
                ]
            ]);
            return \Response::json(["success"=>true,"response"=>\json_decode($response->getBody()->getContents())], 201);
        }catch(\Exception $e){
            return \Response::json(["success"=>false,"errors"=>json_decode($e->getResponse()->getBody()->getContents())], 400);
        }
       
    }

    function login(Request $request){
        $url = "http://localhost:4200/api/v1/auth/login";
        $client = new \GuzzleHttp\Client();
           try{
            $response = $client->request('POST', $url, [
                'form_params' => [
                    'email' => $request->get('email'),
                    'password' => $request->get('password'),
                ]
            ]);
            $cookie = $response->getHeaders()["Set-Cookie"];
            $accessToken = explode(";", explode("=",$cookie[0])[1])[0];
            $sessionToken = explode(";", explode("=",$cookie[1])[1])[0];
            
            return redirect("profile")->withCookie(\Cookie::forever('accessToken', $accessToken))->withCookie(\Cookie::forever('sessionToken', $sessionToken));  
           }
           catch(\Exception $ex) {
            $response = $ex->getResponse();
            $jsonBody =  $response->getBody();
            $errors = \json_decode($jsonBody)->error;
            return view("auth/login",["errors"=>$errors]);
        }
        
    }
}