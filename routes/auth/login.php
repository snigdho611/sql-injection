<?php
session_start();
include("../../config/db.php");
include("../../model/user.php");
include("../../controller/UserController.php");

$entityBody = json_decode(file_get_contents('php://input'));
// print_r($entityBody->email);
if ($entityBody->email && $entityBody->password) {
    // print_r("Successfully received email and password");
    $databaseObj = new Database();
    $conObj = $databaseObj->connect();
    $User = new UserController();

    $result = $User->Login($conObj, $entityBody->email, $entityBody->password);
    header('Content-Type: application/json; charset=utf-8');
    print_r($result);
} else {
    header('Content-Type: application/json; charset=utf-8');
    http_response_code(404);
    print_r(json_encode(["error" => "Failed to receive email and password"]));
}
