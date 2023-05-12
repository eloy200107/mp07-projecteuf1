<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Comprobar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener la lista de usuarios y contraseñas desde la tabla de usuarios
$usuaris = array();
$sql = "SELECT user, password FROM usuaris";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $usuaris[$row["user"]] = $row["password"];
    }
}

// Cerrar la conexión a la base de datos
$conn->close();

if (!isset($_POST['username']) || !isset($_POST['password'])) {
    $missatge= "Variables formulari no existeixen";
    $_SESSION['missatge'] = $missatge;
    header("Location: autoritzacio.php");
    exit;
}
$username = $_POST['username'];
$password = $_POST['password'];

if (!isset($usuaris[$username])) {
    $missatge= "L'usuari no existeix";
    $_SESSION['missatge'] = $missatge;
    header("Location: autoritzacio.php");
    exit;
}

if ($usuaris[$username] != $password) {
    $missatge= "El password és incorrecte";
    $_SESSION['missatge'] = $missatge;
    header("Location: autoritzacio.php");
    exit;
}

$_SESSION['username'] = $username;
echo "Usuari validat correctament";

if ($usuaris[$username] == $password) {
    echo "tot ok";
    header("Location: prova.php");
    exit;
}
?> 