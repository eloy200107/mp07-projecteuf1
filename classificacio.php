<?php


include 'connectar.php';
// Consultes SQL sense cap paràmetre
$sql = "select posicio,Nom,cognoms,temps_total,ritme_km,nom_club,id_recorregut,edat from classificacio";
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
                <th scope="col">posicio</th> 
                 <th scope="col">Nom</th> 
                  <th scope="col">cognoms</th> 
                   <th scope="col">temps_total</th> 
                    <th scope="col">ritme_km</th> 
                    <th scope="col">nom_club</th> 
                    <th scope="col">edat</th> 
                     
            </tr>   
        </thead>
        <tbody>
        <?php
        while ($classificacio= mysqli_fetch_array($resultat)) {
            
            echo "<tr>";
        echo "<td>".$classificacio['posicio']. "</td>";
         echo "<td>".$classificacio['Nom']. "</td>";
          echo "<td>".$classificacio['cognoms']. "</td>";
           echo "<td>".$classificacio['temps_total']. "</td>";
            echo "<td>".$classificacio['ritme_km']. "</td>";
            echo "<td>".$classificacio['nom_club']. "</td>";
            echo "<td>".$classificacio['edat']. "</td>";
            echo "</tr>";    
            
        }
        ?>
 </tbody>
    </table>
</div>

<form action="prova.php" method="post">

    <p><input type="submit" value="Torna enrrere"></p>



</form>
<form action="compra_realitzada.php" method="post">

    <p><input type="submit" value="desconnecta"></p>



</form>

