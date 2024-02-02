<?php
    include('./connection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir Noticias</title>
    <link rel="shortcut icon" href="../images/Logo.avif" type="image/x-icon">
</head>


<h1>Se esta subiendo la noticia</h1>
<a href="./noticias.php">
    <button> noticias</button>
    <a>
        <?php
            /*
            */
        if (isset($_POST['Guardar'])) {
            $imagen = $_FILES['imagen']['name'];
            $imagen_temporal = $_FILES['imagen']['tmp_name'];
            $carpeta_destino = '../images/notice_img/';
                
            $nombre = $_POST['titulo'];
            
            if (isset($imagen) && $imagen != "")
            {
                $tipo = $_FILES['imagen']['type'];
                $temp = $_FILES['imagen']['tmp_name'];
                $descripcion = $_POST['texto'];

                if (!((strpos($tipo, 'gif') || strpos($tipo, 'jpeg') || strpos($tipo, 'png') || strpos($tipo, 'webp') || strpos($tipo, 'pdf') || strpos($tipo, 'avif') ))) {
                    $_SESSION['mensaje'] = 'Solo se permite archivos jpeg, gif, webp, png';
                    $_SESSION['tipo'] = 'danger';
                    header('index.php');
                } else {
                    $query = "INSERT INTO noticias(imagen,nombre,descripcion) values('$imagen','$nombre','$descripcion')";
                    $resultado = mysqli_query($connection, $query);
                    if ($resultado) {
                        move_uploaded_file($imagen_temporal, $carpeta_destino . $imagen);
                        $_SESSION['mensaje'] = 'se ha subido correctamente';
                        $_SESSION['tipo'] = 'success';
                        header('index.php');
                    } else {
                        $_SESSION['mensaje'] = 'ocurrio un error en el servidor';
                        $_SESSION['tipo'] = 'danger';
                    }
                }
            }
        }
        
        ?>
        <body>

        </body>

</html>