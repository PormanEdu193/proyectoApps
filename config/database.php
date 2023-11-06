<?php

    class DataBase{

        public function __construct(){
        }
        function connect(){
            $host="localhost";
            $user="root";
            $pass="calde0102";
            $db="bd_club_nautico";
            $url=mysqli_connect($host,$user,$pass) or die("No se pudo conectar a la base de datos" .mysqli_error($url));
            mysqli_select_db($url,$db) or die("No se pudo seleccionar a la base de datos" .mysqli_error($url));
    
            return $url;
        }
    }
?> 
