<?php
session_start();
//Conexión a la base de datos
$nombreServidor = "localhost";
$usuario = "perico";
$password = "123";

try {
    $conexion = new PDO("mysql:host=$nombreServidor;dbname=EjerciciosIAW",$usuario,$password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexión satisfactoria";
    $conexion->query();

//Vamos a añadir algún alumno

    $codigo = $_SESSION["codigo"];
    $nombre = $_SESSION["nombre"];
    $apellidos = $_SESSION["apellidos"];
    $telefono = $_SESSION["tlf"];
    $correo = $_SESSION["correo"];
    $rutaImagen = $_SESSION["rutaImagen"];

    
    $sentenciaSQL = $conexion->prepare("INSERT INTO alumnos (CODIGO, NOMBRE, APELLIDOS, TELEFONO, CORREO, IMAGEN)
    VALUES (:codigo, :nombre, :apellidos, :telefono, :correo , :imagen)");

    $sentenciaSQL->bindParam(':codigo', $codigo);
    $sentenciaSQL->bindParam(':nombre', $nombre);
    $sentenciaSQL->bindParam(':apellidos', $apellidos);
    $sentenciaSQL->bindParam(':telefono', $telefono);
    $sentenciaSQL->bindParam(':correo', $correo);
    $sentenciaSQL->bindParam(':imagen', $rutaImagen);

    $sentenciaSQL->execute();
    echo "Insertado satisfactoriamente";
}

catch (PDOException $e){
    echo "Conexión fallida: ".$e->getMessage();
}



?>