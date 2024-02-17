<?php
    include('./connection.php');
    session_start();
    error_reporting(0);
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

<style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        body {
            font-family: 'Poppins';
            background-color: #f0f0f0; /* Color de fondo */
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        #info {
            color: #176dcf; /* Color de texto azul oscuro */
            text-align: center;
            margin-bottom: 10px;
        }

        a {
            text-decoration: none;
        }

        button {
            background-color: #ffd700; /* Color de fondo amarillo */
            color: #1a1a1a; /* Color de texto azul oscuro */
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            font-weight: bold;
            transition: filter 0.3s;
        }

        button:hover {
            filter: opacity(75%);
        }

        .subir__noticias__container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
    </style>

<div class="subir__noticias__container">
  <h1 id="info">Se está subiendo la noticia</h1>
<a href="./noticias.php">
    <button>Noticias</button>
    <a>
</div>

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

                    echo "<script>
                          document.getElementById('info').textContent = 'Solo se permiten archivos jpeg, gif, webp, png'
                        </script>";

                    header('../index.php');
                } else {
                    $name = ($_SESSION['user_first_name'].' '.$_SESSION['user_last_name']);
                    $query = "INSERT INTO noticias(imagen,nombre,descripcion,autor) values('$imagen','$nombre','$descripcion','$name')";
                    
                    
                    
                    $resultado = mysqli_query($connection, $query);
                    if ($resultado) {
                        move_uploaded_file($imagen_temporal, $carpeta_destino . $imagen);
                        $_SESSION['mensaje'] = 'se ha subido correctamente';
                        $_SESSION['tipo'] = 'success';

                        echo "<script>
                          document.getElementById('info').textContent = 'La noticia se subió correctamente'
                        </script>";

                        header('../index.php');
                    } else {
                        $_SESSION['mensaje'] = 'ocurrio un error en el servidor';
                        $_SESSION['tipo'] = 'danger';

                        echo "<script>
                          document.getElementById('info').textContent = 'Ocurrió un error en el servidor'
                        </script>";
                    }
                }
            }
        }
        
        ?>
        <body>

        </body>

</html>