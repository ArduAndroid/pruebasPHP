<?php
//Conexión a la base de datos
$nombreServidor = "localhost";
$usuario = "perico";
$password = "123";

try {
    $conexion = new PDO("mysql:host=$nombreServidor;dbname=EjerciciosIAW",$usuario,$password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexión satisfactoria";
    
//Vamos a borrar a algún alumno
    //$_REQUEST devuelve un String, por ello debemos convertirlo a int
    $codigo = intval($_REQUEST["codigo"]);
    $sentenciaSQL = $conexion->prepare("DELETE FROM alumnos WHERE CODIGO=:codiguito");
    $sentenciaSQL->bindParam(':codiguito', $codigo);
    $sentenciaSQL->execute();
    header("Location: listar.php");
}

catch (PDOException $e){
    echo "Conexión fallida: ".$e->getMessage();
}
?>