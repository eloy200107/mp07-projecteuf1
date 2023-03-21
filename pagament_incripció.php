<?php
echo 'Efectuar pagament';
?>
<form action="pagament_incripció.php" method="post">
    <br>
    <br>
    <br>
    <label>
      Metodes de pagament: 
    <input type="radio" name="Transferéncia" value="Transferéncia Bancaria"> Transferéncia Bancaria
    <input type="radio" name="Bizum" value="Bizum"> Bizum
    <input type="radio" name="Paypal" value="paypal"> paypal
    <input type="radio" name="Tarja" value="Tarjeta de crédit o débit"> Tarjeta de Crédit o Débit
</label>
    <p><input type="submit" value="Realitzar Inscripció"></p>



</form>

