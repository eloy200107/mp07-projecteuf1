<?php
session_start()
?>





<form method="POST" action="login.php">
    
    
    username <input type="text" name="username">
     password <input type="password" name="password">
     <input type="submit" value="Login">
    
    
</form>


<?php

if (isset($_SESSION['missatge'])) {
    echo "<br>" .$_SESSION['missatge'];
    unset($_SESSION['missatge']);

}
?>
