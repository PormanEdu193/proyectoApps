<?php
session_start();
if (empty($_SESSION['nombre_usuario'])) {
    header("location: ./.././../index.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include("./.././../config/database.php");
    $db = new Database();
    $connection = $db->connect();

    $id = $_SESSION['id_usuario'];
    $identificacion = $_POST['identificacion'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $direccion = $_POST['direccion'];
    $nombre = $_POST['nombre'];

    $consulta = "UPDATE Socios SET nombre = '$nombre', identificacion = '$identificacion', telefono = '$telefono', email = '$email', direccion = '$direccion' WHERE id_socio = '$id'";

    $result = mysqli_query($connection, $consulta);

    if ($result) {
        header("location: Usuario__Perfil.php");
    } else {
        echo "Error al actualizar los datos.";
    }
}
?>
