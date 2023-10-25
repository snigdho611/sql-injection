<?php
class UserController
{
    function Login($conObj, $email, $password)
    {
        try {
            $SQL_QUERY = 'SELECT * FROM users WHERE email = \'' . $email . '\' AND password = \'' . $password . '\';';
            $result = $conObj->query($SQL_QUERY);
            return $result;
        } catch (exception $e) {
            print_r($e);
            return ["error" => "Internal server error"];
        }
    }
}
