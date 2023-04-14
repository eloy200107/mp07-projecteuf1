<?php
include 'connectar.php';
// Consultes SQL sense cap paràmetre
$sql = "select DNI,Nom,id_club,edat,id_recorregut,cognoms from inscripcio";
$resultat= mysqli_query($bd, $sql);
// fetchAll sense paràmetre retorna un array amb el conjunt de registres de la BD
// Cada registre serà un array amb indexos numèrics i indexos amb el nom de les columnes
// Retorna els resultats de forma duplicada!


echo "<br>inscrits<br>"; 
 echo "<br>";
 
?>
<div class="container">
    
   
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">DNI</th> 
                 <th scope="col">Nom</th> 
                  <th scope="col">id_club</th> 
                   <th scope="col">edat</th> 
                    <th scope="col">id_recorregut</th> 
                    <th scope="col">cognoms</th> 
                     
            </tr>   
        </thead>
        <tbody>
        <?php
        while ($inscripcio= mysqli_fetch_array($resultat)) {
            
            echo "<tr>";
        echo "<td>".$inscripcio['DNI']. "</td>";
         echo "<td>".$inscripcio['Nom']. "</td>";
          echo "<td>".$inscripcio['id_club']. "</td>";
           echo "<td>".$inscripcio['edat']. "</td>";
            echo "<td>".$inscripcio['id_recorregut']. "</td>";
            echo "<td>".$inscripcio['cognoms']. "</td>";
            echo "</tr>";    
            
        }
        ?>
 </tbody>
    </table>
</div>

<form action="prova.php" method="post">

    <p><input type="submit" value="Torna enrrere"></p>



</form>
<form action="pagament_incripció.php" method="post">

 <p><input type="submit" value="metode pagament"></p>



</form>
