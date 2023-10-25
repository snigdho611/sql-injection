<?php
class UserController
{
    function Login($conObj, $email, $password)
    {
        try {
            $SQL_QUERY = 'SELECT * FROM users WHERE email = \'' . $email . '\' AND password = \'' . $password . '\';';
            // print_r($conObj);
            $result = $conObj->query($SQL_QUERY);
            // print_r();
            return json_encode($result->fetch_assoc());
        } catch (exception $e) {
            print_r($e);
        }
    }
}
