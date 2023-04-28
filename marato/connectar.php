<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "test";

$bd= mysqli_connect($host, $username, $password, $dbname);
if (!$bd) {
    die('connexion fallida'. mysqli_connect_error());
    
}

?>






