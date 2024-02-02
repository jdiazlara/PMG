<?php
    include "./connection.php";
    $id = $_GET['id'];

    $id = mysqli_real_escape_string($connection, $id);

    $query = "DELETE FROM slider1 WHERE ID = '$id'";

    // Paso 5: Ejecutar la consulta
    $resultado = mysqli_query($connection, $query);

    // Paso 6: Verificar el resultado y mostrar un mensaje al usuario
    if ($resultado) {
        echo "Registro eliminado correctamente.";
        header('Location: ./addSlide1.php');
    } else {
        echo "Error al eliminar el registro.";
    }

    // Paso 7: Cerrar la conexión
    mysqli_close($connection);
?>
