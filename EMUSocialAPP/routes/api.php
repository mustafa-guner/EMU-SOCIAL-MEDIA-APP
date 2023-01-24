<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get("/admin/accounts/{id}",function (Request $request){
    $accessToken = $_COOKIE["accessToken"];
    $sessionToken = $_COOKIE["sessionToken"];
    $curlHandler = curl_init();
    curl_setopt_array($curlHandler, [
    CURLOPT_URL => 'http://localhost:4200/api/v1/admin/users/'.$request->id,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_COOKIE => "accessToken={$accessToken};sessionToken={$sessionToken}",
     ]);
    $response = curl_exec($curlHandler);
    curl_close($curlHandler);
    $result = json_decode($response);
    return $result;
});

Route::get("/admin/students/{userId}",function (Request $request){
    $accessToken = $_COOKIE["accessToken"];
    $sessionToken = $_COOKIE["sessionToken"];
    $curlHandler = curl_init();
    curl_setopt_array($curlHandler, [
    CURLOPT_URL => 'http://localhost:4200/api/v1/admin/students/'.$request->userId,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_COOKIE => "accessToken={$accessToken};sessionToken={$sessionToken}",
     ]);
    $response = curl_exec($curlHandler);
    curl_close($curlHandler);
    $result = json_decode($response);
    return $result;
});

Route::get("/admin/staffs/{staffId}",function (Request $request){
    $accessToken = $_COOKIE["accessToken"];
    $sessionToken = $_COOKIE["sessionToken"];
    $curlHandler = curl_init();
    curl_setopt_array($curlHandler, [
    CURLOPT_URL => 'http://localhost:4200/api/v1/admin/staffs/'.$request->staffId,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_COOKIE => "accessToken={$accessToken};sessionToken={$sessionToken}",
     ]);
    $response = curl_exec($curlHandler);
    curl_close($curlHandler);
    $result = json_decode($response);
    return $result;
});

Route::post("/admin/update-user/{userId}",function (Request $request){
    $accessToken = $_COOKIE["accessToken"];
    $sessionToken = $_COOKIE["sessionToken"];

    $curlHandler = curl_init();
    curl_setopt($curlHandler, CURLOPT_POST, true);
    curl_setopt_array($curlHandler, [
    CURLOPT_URL => 'http://localhost:4200/api/v1/admin/update-user/'.$request->userId,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_COOKIE => "accessToken={$accessToken};sessionToken={$sessionToken}",
     ]);
     curl_setopt($curlHandler, CURLOPT_POSTFIELDS, $request->all());
    $response = curl_exec($curlHandler);
    curl_close($curlHandler);
    $result = json_decode($response);
    return $result;
});

Route::post("/admin/toggle-activation-user/{userId}",function (Request $request){
    $accessToken = $_COOKIE["accessToken"];
    $sessionToken = $_COOKIE["sessionToken"];

    $curlHandler = curl_init();
    curl_setopt($curlHandler, CURLOPT_POST, true);
    curl_setopt_array($curlHandler, [
    CURLOPT_URL => 'http://localhost:4200/api/v1/admin/toggle-activation-user/'.$request->userId,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_COOKIE => "accessToken={$accessToken};sessionToken={$sessionToken}",
     ]);
     curl_setopt($curlHandler, CURLOPT_POSTFIELDS, $request->all());
    $response = curl_exec($curlHandler);
    curl_close($curlHandler);
    $result = json_decode($response);
    return $result;
});

Route::delete("/admin/remove-user/{userId}",function (Request $request){
    $accessToken = $_COOKIE["accessToken"];
    $sessionToken = $_COOKIE["sessionToken"];

    $curlHandler = curl_init();
    curl_setopt($curlHandler, CURLOPT_CUSTOMREQUEST, "DELETE");
    curl_setopt_array($curlHandler, [
    CURLOPT_URL => 'http://localhost:4200/api/v1/admin/remove-user/'.$request->userId,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_COOKIE => "accessToken={$accessToken};sessionToken={$sessionToken}",
     ]);
     curl_setopt($curlHandler, CURLOPT_POSTFIELDS, $request->all());
    $response = curl_exec($curlHandler);
    curl_close($curlHandler);
    $result = json_decode($response);
    return $result;
});