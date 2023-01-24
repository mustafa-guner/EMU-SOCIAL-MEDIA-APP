<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Cookie\CookieJar;


class AdminController extends Controller{

    function getAllUserAccounts(Request $request){
        
    
        if(!isset($_COOKIE["accessToken"]) ||!isset($_COOKIE["sessionToken"]) )  return redirect("login")->with("errors",["Your session is expired. Please login."]);
         
        $accessToken = $_COOKIE["accessToken"];
        $sessionToken = $_COOKIE["sessionToken"];
        $curlHandler = curl_init();
        curl_setopt_array($curlHandler, [
        CURLOPT_URL => 'http://localhost:4200/api/v1/admin/users',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_COOKIE => "accessToken={$accessToken};sessionToken={$sessionToken}",
        /**
         * Or set header
         * CURLOPT_HTTPHEADER => [
               'Cookie: foo=bar;baz=foo',
           ]
         */
        ]);
        
        $response = curl_exec($curlHandler);
        curl_close($curlHandler);
        $result = json_decode($response);
        if(!$result->success) return redirect("login");
       
        return view("admin/accounts",["users"=>$result->users]);
    }

    function getOverviewDetails(){
        return view("admin/overview");
    }
    
}

