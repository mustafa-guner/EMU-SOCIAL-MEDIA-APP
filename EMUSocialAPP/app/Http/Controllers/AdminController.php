<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class AdminController extends Controller{

    function getAllUserAccounts(Request $request){
        $client = new \GuzzleHttp\Client([
            'verify' => false,
        ]);
        $url = "http://localhost:4200/api/v1/admin/users";
        $response = $client->request("GET",$url);
        $result = json_decode($response->getBody());
        //  dd($result);
        return view("admin/accounts",["users"=>$result->users]);
    }

    function getOverviewDetails(){
        return view("admin/overview");
    }
    
}

