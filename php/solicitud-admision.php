<?php
include('./connection.php');
session_start();
error_reporting(0);

$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$edad = $_POST["edad"];
$numerotelefonico = $_POST["numero-telefonico"];
$email = $_POST["email"];
$centroeducativoprocedencia = $_POST["centroeducativo-procedencia"];
$provinciaresidencia = $_POST["provincia-residencia"];
$promedio = $_POST["promedio"];
$materiascmpextpen = $_POST["materias-cmp-ext-pen"];
$record = $_POST["record"];
$carreratecnica = $_POST["carrera-tecnica"];

$query = "INSERT INTO `admision`(`nombre`, `apellidos`, `edad`, `tel_estudiante`, `gmail_estudiante`, `centro_procedencia`, 
                                 `provincia_residencia`, `promedio`, `exam_materias`, `carrera_seleccionada`) 
          VALUES ('$nombre','$apellido','$edad','$numerotelefonico','$email','$centroeducativoprocedencia','$provinciaresidencia','$promedio','$materiascmpextpen','$carreratecnica')";
$resultado = mysqli_query($connection, $query);

if ($resultado) {
    echo "alert('Datos insertados correctamente.')";
    header('../index.php');
} else {
    echo "alert('Error al insertar datos.')";
}
