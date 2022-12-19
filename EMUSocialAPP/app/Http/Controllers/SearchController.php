<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

class SearchController extends Controller{

    function getsearchDetails(Request $request){      

        #Search User Card 
        $searchusercard = array(
            array(
                'profileimage' => "https://t4.ftcdn.net/jpg/03/64/21/11/360_F_364211147_1qgLVxv1Tcq0Ohz3FawUfrtONzz8nq3e.jpg",
                'fullname'=> "Ahmet Atlayan",
                'username' => "@ahmetatlayan",
                'usertype' => "Assistant",
                'connects' => "435"
            )
        );

        #Search Club Card 
        $searchclubcard = array(
            array(
                'profileimage' => "https://st.depositphotos.com/1605004/3293/v/950/depositphotos_32939581-stock-illustration-icon-or-logo-photography-club.jpg",
                'clubname'=> "Photography Club",
                'members' => "6563",
                'status' => "Public"
            )
        );

        return view('app/search', ["searchusercard"=>$searchusercard, "searchclubcard"=>$searchclubcard]);
    }
}