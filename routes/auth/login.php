<?php
// header('Access-Control-Allow-Origin: *');
// header('Access-Control-Allow-Headers:  Content-Type, X-Auth-Token, Authorization, Origin');
// header('Access-Control-Allow-Methods:  POST, PUT, GET');
session_start();
include("../../config/db.php");
include("../../controller/UserController.php");

$entityBody = json_decode(file_get_contents('php://input'));

if ($entityBody->email && $entityBody->password) {
    try {
        $databaseObj = new Database();
        $conObj = $databaseObj->connect();
        $User = new UserController();
        $result = $User->Login($conObj, $entityBody->email, $entityBody->password);
        header('Content-Type: application/json; charset=utf-8');
        if (mysqli_num_rows($result) == 0) {
            http_response_code(404);
            print_r(json_encode(["error" => "Invalid credentials"]));
        } else {
            http_response_code(200);
            print_r(json_encode($result->fetch_assoc()));
        }
    }
    // catch(mysqli_sql_exception $e){
    //     return print_r(json_encode(["error" => "Internal server error", "source"=> "$e" ]));
    // }
    catch (exception $e) {
        // print_r($e);
        http_response_code(500);
        return print_r(json_encode(["error" => "$e"]));
    }
} else {
    header('Content-Type: application/json; charset=utf-8');
    http_response_code(404);
    print_r(json_encode(["error" => "Failed to receive email and password"]));
}
