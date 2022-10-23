<?php
// Conecta a la BD y devuelve la conexion
function init():mysqli{
    $servername = "localhost";
         $username = "root";
         $password = "C.Insaurralde";

         // Create connection
         $conn = new mysqli($servername, $username, $password,'loginapp');

         // Check connection
         if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
         }
         return $conn;
}

// Funciones CRUD 
function insertInto(String $user,String $pass, mysqli $conn):String{
    $success="Estoy";
    $query="INSERT INTO users(username,password) VALUES ('$user','$pass')";
    if($conn->query($query)==true){
        $success="Exito";
    }else{
        $success="Error";
    }
    return $success;
}  

?>