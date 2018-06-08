<?php

class Connection
{

    var $db;

    function __construct()
    {
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "new-app";

        $conn = new mysqli($servername, $username, $password, $dbname);

        $this->db = $conn;

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } else {

            if (! mysqli_set_charset($conn, "utf8")) {
                echo "error";
                die();
            }
        }
    }
}
