<?php

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

    $codigo = 50;
    $nombre = "pepito";
    $apellidos = "fernández martínez";
    $telefono = 123123123;
    $correo = "pepito@gmail.com";

    $sentenciaSQL = $conexion->prepare("INSERT INTO alumnos (CODIGO, NOMBRE, APELLIDOS, TELEFONO, CORREO)
    VALUES (:codigo, :nombre, :apellidos, :telefono, :correo)");

    $sentenciaSQL->bindParam(':codigo', $codigo);
    $sentenciaSQL->bindParam(':nombre', $nombre);
    $sentenciaSQL->bindParam(':apellidos', $apellidos);
    $sentenciaSQL->bindParam(':telefono', $telefono);
    $sentenciaSQL->bindParam(':correo', $correo);
    
    $sentenciaSQL->execute();
   
}

catch (PDOException $e){
    echo "Conexión fallida: ".$e->getMessage();
}

//Listado de alumnos


?>