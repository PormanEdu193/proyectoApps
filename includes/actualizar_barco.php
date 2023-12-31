<?php
include("barco.php");
include("barco_crud.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include(".././config/database.php");
    $db = new Database();
    $connection = $db->connect();
    $barco_crud = new BarcoCrud($connection);

    $id = $_POST['id_barco'];
    $id_socio = $_POST['id_usuario'];
    $matricula = $_POST['numero_matricula'];
    $nombre = $_POST['nombre'];
    $amarre = $_POST['numero_amarre']; 
    $cuota = $_POST['couta_pagar'];

    $barcoAux = new Barco($id,$matricula,$nombre,$amarre,$cuota,$id_socio);
    if ($barco_crud->actualizar_barco_bd($barcoAux)) {
        $add_msg="Patron actualizado correctamente";
        header("location: ../views/Administrador/Administrador__Barcos.php?add_success=true&add_msg=$add_msg");
    } else {
        $error_msg="Error al actualizar los datos.";
        header("location: ../views/Administrador/Administrador__Barcos.php?error=true&error_msg=$error_msg");
    }
}
?>