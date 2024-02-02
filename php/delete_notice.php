<?php

include "../php/connection.php";
//Obtener el ID del registro a eliminar
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $path = $_GET['path'];


    //Conectarse a la base de datos y ejecutar la consulta de eliminacion
    $query = "DELETE FROM noticias WHERE cod_imagen = '$id'";
    mysqli_query($connection, $query);
    unlink('../php/' . $path);

    //Redireccionar al usuario nuevamente a la pagina anterior
    header("Location: ../php/upload-events.php");
    exit();
}
?>
