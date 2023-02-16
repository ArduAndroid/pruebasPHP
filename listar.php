<?php

//Conexión a la base de datos
$nombreServidor = "localhost";
$usuario = "perico";
$password = "123";

try {
    $conexion = new PDO("mysql:host=$nombreServidor;dbname=EjerciciosIAW",$usuario,$password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexión satisfactoria";

//Vamos a listar los alumnos
    $sentenciaSQL = "SELECT * FROM alumnos";
    echo "<h2>Listado de alumnos</h2>";
   
    echo "<table>";
    echo  "<tr><th>CODIGO</th> ".
     "<th>NOMBRE</th> ".
     "<th>APELLIDOS</th> ".
     "<th>CORREO</th>".
     "<th>TELEFONO</th>".
     "<th>IMAGEN</th></tr>"
     ;
        foreach($conexion->query($sentenciaSQL) as $fila){
        echo "<tr>
        <td>". $fila["CODIGO"]. "</td>".
        "<td>". $fila["NOMBRE"]. "</td>".
        "<td>". $fila["APELLIDOS"]. "</td>.".
        "<td>". $fila["CORREO"]. "</td>".
        "<td>". $fila["TELEFONO"]. "</td>".
        "<td><img src='". $fila["IMAGEN"]. "'></img></td>".
        "</tr>";
        }
    echo "</table>";
}

catch (PDOException $e){
    echo "Conexión fallida: ".$e->getMessage();
}

//Listado de alumnos


?>