<?php

//Conexión a la base de datos
$nombreServidor = "localhost";
$usuario = "perico";
$password = "123";

try {
    $conexion = new PDO("mysql:host=$nombreServidor;dbname=EjerciciosIAW",$usuario,$password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexión satisfactoria";
}

catch (PDOException $e){
    echo "Conexión fallida: ".$e->getMessage();
}

//Vamos a borrar a algún alumno
    
    $codigo = intval($_REQUEST["codigo"]);
    $telefono = intval($_REQUEST["telefono"]);
    $nombre = $_REQUEST["nombre"];
    $telefono = $_REQUEST["telefono"];
    $correo = $_REQUEST["correo"];
    $sentenciaSQL = $conexion->prepare("UPDATE alumnos SET NOMBRE=:nombre, APELLIDOS=:apellidos, TELEFONO=:telefono, CORREO=:correo WHERE CODIGO=:codiguito");

    $sentenciaSQL->bindParam(':codiguito', $codigo);
    $sentenciaSQL->bindParam(':nombre', $nombre);
    $sentenciaSQL->bindParam(':apellidos', $apellidos);
    $sentenciaSQL->bindParam(':telefono', $telefono);
    $sentenciaSQL->bindParam(':correo', $correo);
    $sentenciaSQL->execute();
    header("Location: listar.php");


?>