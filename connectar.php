<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "Marato";

try {
			
	$bd = new PDO('mysql:host='.$host.';dbname='.$dbname, 
                     $username, $password); 	   

} catch (PDOException $e) {
	echo "No s'ha pogut connectar amb la Base de dades";
	die();
}

?>
<?php
// Consultes SQL sense cap paràmetre
$sql = "select id_corredor,posicio,nom,cognoms,club,nacionalitat,temps_total,ritme_km from classificacio";
$query = $bd->query($sql);
// fetchAll sense paràmetre retorna un array amb el conjunt de registres de la BD
// Cada registre serà un array amb indexos numèrics i indexos amb el nom de les columnes
// Retorna els resultats de forma duplicada!
$resultat = $query->fetchAll(PDO::FETCH_ASSOC);

echo "<br>Classificacio<br>"; 
 echo "<br>";
 foreach ($resultat as $value) {
 	// mostrarem de forma duplicada el nom real dels superherois
 	echo $value['nom']." ".$value['club']."<br>";
 }
?>






