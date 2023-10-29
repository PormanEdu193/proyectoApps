<?php 
    include("socio_crud.php");
    include("socio.php");
    class Verify{
        private $connection;
        private $socio;
        public function __construct($connection){
            $this->connection=$connection;
        }
        function verify_login_socio($username, $password){
            $SQL = "SELECT * FROM Usuarios WHERE rol='Socio'AND email = ? ";
            $stmt = $this->connection->prepare($SQL) ;
            $stmt->bind_param("s",$username);
            $stmt->execute() or die("Error en la consulta".mysqli_error($stmt));
            $result= $stmt-> get_result();
            if($result->num_rows==1){
                $row = $result->fetch_assoc();
                if($password == $row['contraseña']){
                    $id_user = $row['id_usuario'];
                    $SQL = "SELECT * FROM Socios_Usuarios WHERE id_usuario = ?";
                    $stmt = $this->connection->prepare($SQL);
                    $stmt->bind_param("i", $id_user);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    if($result->num_rows==1){
                        $row = $result->fetch_assoc();
                        $id_socio = $row['id_socio'];
                        $socio_crud = new SocioCrud($this->connection);
                        $socio_info = $socio_crud->get_socio($id_socio);
                        $this->socio = new Socio($socio_info['id_socio'], $socio_info['nombre'], $socio_info['identificacion'], $socio_info['direccion'], $socio_info['email'], $socio_info['telefono']); 
                        return true;
                    }
                }
            }
            return false;
       }

       public function get_socio_instance(){
            return $this->socio;
       }
    }
   

?>