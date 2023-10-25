<?php
class UserController
{
    function Login($conObj, $email, $password)
    {
        try {
            $SQL_QUERY = 'SELECT * FROM users WHERE email = \'' . $email . '\' AND password = \'' . $password . '\';';
            // $SQL_QUERY = $conObj->prepare('SELECT * FROM users WHERE email = ? AND password = ?');
            // $SQL_QUERY->bind_param("ss", $email, $password);
            // print_r($conObj);
            $result = $conObj->query($SQL_QUERY);
            // print_r($result);
            return $result;
        } catch (exception $e) {
            print_r($e);
            return ["error" => "Internal server error"];
        }
    }
}
