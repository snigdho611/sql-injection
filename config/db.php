<?php
class Database
{
    private $host = '127.0.0.1';
    // private $port = 3306;
    private $username = 'root';
    private $password = '';
    private $database = 'test';

    function connect()
    {
        try {
            $conObj = new mysqli($this->host, $this->username, $this->password, $this->database);
            if (!$conObj) {
                print_r("OK");
                die("Failed to connect to database!\n" . mysqli_connect_error());
            }
            return $conObj;
        } catch (exception $e) {
            print_r("Failed to connect to database!\n" . $e);
            return null;
        }
    }

    function disconnect($conn)
    {
        $conn->close();
    }
}
// $Database = new Database();
// $connection = $Database->connect();
// $Database->disconnect($connection);
