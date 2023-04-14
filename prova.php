<?php
include 'connectar.php';
?>
<?php

if (isset($_POST['DNI']) && isset($_POST['nom']) && isset($_POST['id_club']) && isset($_POST['edat']) && isset($_POST['recorregut']) && isset($_POST['cognoms'])) {
    $DNI = $_POST['DNI'];
    $Nom = $_POST['nom'];
    $id_club = $_POST['id_club'];
    $edat = $_POST['edat'];
    $id_recorregut = $_POST['recorregut'];
    $cognoms = $_POST['cognoms'];
    
    $sql = "insert into inscripcio(DNI,Nom,id_club,edat,id_recorregut,cognoms)"
           . "values ('$DNI', '$Nom', '$id_club', '$edat', '$id_recorregut', '$cognoms')";
   if (mysqli_query($bd, $sql)) {
       echo 'Dades insertades ';
   }
 else {
       echo 'ERROR dades incorrectes'. mysqli_error($bd);
   }
    
}


?>
<form action="prova.php" method="post">
 <p>DNI: <input type="text" name="DNI" /></p>   
 <p>Nom: <input type="text" name="nom" /></p>
 <p>Cognoms: <input type="text" name="cognoms" /></p>
 <p>club:<input type="text" name="id_club" /></p>
 <p>edat:<input type="text" name="edat" /></p>
  <p>Recorregut:<input type="text" name="recorregut" /></p>
  <p><input type="submit" value="Realitzar Inscripció"></p>


</form>

<form action="inscrits.php" method="post">

    <p><input type="submit" value="Llista d'inscrits."></p>



</form>
