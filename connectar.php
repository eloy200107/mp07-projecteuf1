<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "marato2.0";

$bd= mysqli_connect($host, $username, $password, $dbname);
if (!$bd) {
    die('connexion fallida'. mysqli_connect_error());
    
}

?>






