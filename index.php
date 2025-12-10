<?php
// Datos de conexión
$host = "localhost";
$usuario = "root";
$contrasena = ""; // Cambia esto si tienes contraseña
$baseDeDatos = "ejemplo";

// Crear conexión
$conn = new mysqli($host, $usuario, $contrasena, $baseDeDatos);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Datos a insertar
$id =$_POST["id"];
$nombre =$_POST["n"];
$apellidP =$_POST["ap"];
$apellidoM =$_POST["am"];
$edad = $_POST["e"];

// Preparar y ejecutar la consulta
$sql = "INSERT INTO alumnos (id, nombre, apellidoP, apellidoM, edad) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("isssi", $id, $nombre, $apellidP, $apellidoM, $edad);

if ($stmt->execute()) {
    echo "Alumno insertado correctamente.";
} else {
    echo "Error al insertar: " . $stmt->error;
}

// Cerrar conexión
$stmt->close();
$conn->close();
?>