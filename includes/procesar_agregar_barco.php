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

    $barcoAux = new Barco(null,$matricula,$nombre,$amarre,$cuota,$id_socio);
    $idBarco =substr($barcoAux->get_matricula(), 0, 3) . substr($barcoAux->get_nombre_barco(), -3);
    $barcoAux->set_id_barco($idBarco);
    if ($barco_crud->agregar_barco_bd($barcoAux)) {
        $add_msg="Barco agregado correctamente";
        header("location: ../views/Administrador/Administrador__Barcos.php?add_success=true&add_msg=$add_msg");
    } else {
        $error_msg="Error al agregar los datos.";
        header("location: ../views/Administrador/Administrador__Barcos.php?error=true&error_msg=$error_msg");
    }
}
?>