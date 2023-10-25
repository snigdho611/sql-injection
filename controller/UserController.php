<?php
class UserController
{
    function Login($conObj, $email, $password)
    {
        $SQL_QUERY = 'SELECT * FROM users WHERE email = \'' . $email . '\' AND password = \'' . $password . '\';';
        if ($result = $conObj->query($SQL_QUERY)) {
            return $result;
        } else {
            return ["error" => "Internal server error"];
        }
    }
}
