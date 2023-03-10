<?php
// newPDO: connectem amb la BD
$usuari="root";
$password="";    
$database ="Marato";
$host = "localhost";

try {
			
	$bd = new PDO('mysql:host='.$host.';dbname='.$database, 
                    
                $usuari, $password); 
             echo 'Benvingut!!!';

} catch (PDOException $e) {
	echo "No s'ha pogut connectar amb la Base de dades";
	die();
}
?>


