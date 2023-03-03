<?php

session_start();

$usuaris = ["marato" => "marato", 
            "marato1" =>"marato1",
            "marato2"=>"marato2"
        ];
if (!isset($_POST['username']) || !isset($_POST['password'])) {
    $missatge= "Variables formulari no existeixen";
    $_SESSION['missatge'] = $missatge;
    header("Location: index.php");
    exit;
}
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    if (!isset($usuaris[$username])) {
        $missatge= "L'usuari no existeix"; 
        $_SESSION['missatge'] = $missatge;
    header("Location: index.php");
        exit;
    }
    
    if ($usuaris[$username]!=$password) {
        $missatge= "El password és incorrecte";
         $_SESSION['missatge'] = $missatge;
         header("Location: index.php");
        exit;
        
    }
    
    $_SESSION['username'] = $username;
    echo "Usuari validat correctament";
    
        if ($usuaris[$username]==$password) {
            echo "tot ok";
             header("Location: index.php");
             exit;
            
        }
        
    
    
    


?>