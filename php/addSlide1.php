<?php
    session_start();//Inicia o Reanuda una sesion
    error_reporting();//Poner (0) para eliminar los reportes de errores. Eliminar el 0 para aparecer los errores.
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PMG - Agregar Slide</title>
        <link rel="stylesheet" href="../style/style-addSlider.css">
        <link rel="stylesheet" href="../style/style-header.css">
        <link rel="shortcut icon" href="../images/Logo.avif" type="image/x-icon">
    </head>
    <body>
        <header class="header-primary">
            <nav>
                <ul>
                    <li>
                        <div class="img-container">
                            <img src="../images/Logo.avif" alt="">
                        </div>
                    </li>
                    <li class="title-header">
                        <h2 class="title">POLITECNICO MAXIMO GOMEZ</h2>
                        <h2 class="subTitle">Formando Jóvenes Para Un Futuro Mejor</h2>
                    </li>
                </ul>
            </nav>
        </header>

        <header class="header-secundary">
            <nav class="navbar">
                <ul class="ul-bar">
                    <li class="list-brand">
                        <div class="container-brand">
                            <div class="navbar-brand">
                                <a href="../index.php"> <img src="../images/Logo.avif" alt="" srcset=""> </a>
                            </div>
                        </div>
                    </li>
                    <li class="li">
                        <a href="../index.php">
                            <div>
                                <span class="material-icons-outlined">
                                    <img src="../images/home.png" alt="">
                                </span>
                                <h1>Inicio</h1>
                            </div>
                        </a>
                    </li>
                    <li class="li">
                        <a href="../php/about_us.php">
                            <div>
                                <span>
                                    <img src="../images/sobreNosotros.png" alt="">
                                </span>
                                <h1>Sobre Nosotros</h1>
                            </div>
                        </a>
                    </li>
                    <li class="li">
                        <a href="../php/Docentes.php">
                            <div>
                                <span>
                                    <img src="../images/docentes.png" alt="">
                                </span>
                                <h1>Docentes</h1>
                            </div>
                        </a>
                    </li>
                    <li class="li">
                        <a href="../php/graduates.php">
                            <div>
                                <span>
                                    <img src="../images/egresados.png" alt="">
                                </span>
                                <h1>Egresados</h1>
                            </div>
                        </a>
                    </li>
                    <li class="li">
                        <a href="../php/inf-admission.php">
                            <div>
                                <span>
                                    <img src="../images/Admision.png" alt="">
                                </span>
                                <h1>Admisión</h1>
                            </div>
                        </a>
                    </li>
                    <li class="li">
                        <a href="../php/noticias.php">
                            <div>
                                <span>
                                    <img src="../images/noticia.png" alt="">
                                </span>
                                <h1>Noticias</h1>
                            </div>
                        </a>
                    </li>
                    <li class="li li_icon-profile">
                        <a href="../php/login.php">
                            <div>
                                <span class="icon-profile">
                                    <?php
                                        //Verifica si en la variable de sesion hay algun string, si hay imprime la url de la imagen de perfil, de lo contrario te pide iniciar sesión.
                                        if ($_SESSION['user_image'] == '') {
                                            echo '<script>
                                                document.write("Iniciar Sesión");
                                            </script>';
                                        }
                                        else{
                                            echo '<img src="' . $_SESSION['user_image'] . '" class="rounded-circle container" alt="">';
                                        }
                                    ?>
                                </span>
                                <h1></h1>
                            </div>
                        </a>
                    </li>
                    <li class="bar">
                        <div>
                            <img src="../images/burger-bar.png" alt="">
                        </div>
                    </li>
                </ul>
            </nav>
        </header>
        <div class="container-short_menu">
            <ul>
                <li class="li li_icon-profile"><a href="../php/login.php"><div><span class="icon-profile"><?php if ($_SESSION['user_image'] == '') { echo '<script> document.write("Iniciar Sesión"); </script>'; } else{ echo '<img src="' . $_SESSION['user_image'] . '" class="rounded-circle container" alt="">'; } ?> </span></div></a></li>
                <li><span class="material-icons-outlined"><img src="../images/home.png" alt=""></span><a href="../index.php">Inicio</a></li>
                <li><span><img src="../images/sobreNosotros.png" alt=""></span><a href="../php/about_us.php">Sobre Nosotros</a></li>
                <li><span><img src="../images/docentes.png" alt=""></span><a href="../php/Docentes.php">Docentes</a></li>
                <li><span><img src="../images/egresados.png" alt=""></span><a href="../php/graduates.php">Egresados</a></li>
                <li><span><img src="../images/Admision.png" alt=""></span><a href="../php/inf-admission.php">Admisión</a></li>
                <li><span><img src="../images/noticia.png" alt=""></span><a href="../php/noticias.php">Noticias</a></li>
            </ul>
        </div>
        <div class="all">
            <div class="title-header title-header-main">
            <?php 

            //Verifica si haz iniciado sesion mediante un token de acceso que te brinda google cuando inicias sesion, si esta vacio, no has iniciado sesion. De paso verifica si la persona tiene acceso a la pagina mediante el gmail. 
            if(!isset($_SESSION['access_token'])){
                echo '<div class="no_session">
                <h1>POR FAVOR INICIAR SESIÓN PARA CONTINUAR</h1>
                </div>
                ';
                echo '<a id="btn-init-session" href="./changeAccount.php"><img src="../img/Google Icon.avif" alt="Google Icon">
                Sign in with Google</a>';
                die();
            }else if($_SESSION['user_email_address'] == "alexandergomez41005@gmail.com"){
                echo '<div class="welcome">
                    <img src="'. $_SESSION['user_image'] .'">
                    <h1>Bienvenido: '. $_SESSION['user_first_name'] .'</h1>
                </div>';
            }else{
                echo"<div class='no_access'><h1>¡USTED NO TIENE ACCESO A ESTE PANEL!</h1></div>";
                die();
            }
        ?>
            </div>
            <div class="ctnAddSlider">
                <form method="post" enctype="multipart/form-data">
                    <div class="col-left">
                        <div class="addTitle">
                            <h1>Título</h1>
                            <input type="text" name="titulo" placeholder="Título del Slide">
                        </div>
                        <button type="submit">SUBIR</button>
                    </div>
                    <div class="col-right">
                        <div class="addImage">
                            <h1>Agregar Imagen</h1>
                            <input type="file" name="imagen" id="inputFile" required>
                            <div id="vista-previa"></div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="editSlides">
                <table>
                    <thead>
                        <th id="th_ID">ID</th>
                        <th id="th_tittle">Titulo</th>
                        <th id="th_img">Imagen</th>
                        <th id="th_actions">Acciones</th>
                    </thead>
                    <tbody>

                        <?php
                            include "./connection.php"; //Importa la Base de Datos
                            $query = "SELECT * FROM slider1";
                            $resultado = mysqli_query($connection, $query);

                            $rows = mysqli_fetch_all($resultado, MYSQLI_ASSOC); //Realiza un fetch de datos de toda la tabla. En español, se importa toda la tabla en una variable

                            foreach ($rows as $row){
                                echo '
                                    <tr>
                                        <td id="ID">'.$row['ID'].'</td>
                                        <td id="tittle">'.$row['tittle'].'</td>
                                        <td id="img"> <img src="../images/img_sliders/'.$row['img_name'].'" alt=""> </td>
                                        <td id="actions"><a href="./deleteSlide.php?id='.$row['ID'].'" id="Delete"><span class="material-symbols-outlined">delete</span></a></td>
                                    </tr>
                                ';
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>                                      
        <?php

        include "./connection.php"; // Se importa la base de datos por si acaso
        $query = "SELECT * FROM slider1";
        $resultado = mysqli_query($connection, $query);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') { // Verifica que el metodo de envio es POST.
            if(mysqli_num_rows($resultado) <= 9){ // Solo se pueden subir un maximo de 10 slide por slider, si se alcanza al cifra no te permite publicar otro
                $titulo = $_POST['titulo']; //Se obtiene el titulo
                if (isset($_FILES['imagen'])) { //Verifica que exista una imagen
                    //Se obtiene los metadatos de la imagen
                    $imagen = $_FILES['imagen']['name'];
                    $imagen_temporal = $_FILES['imagen']['tmp_name'];
                    $carpeta_destino = '../images/img_sliders/';
                    
                    move_uploaded_file($imagen_temporal, $carpeta_destino . $imagen); //Cuando se publique la imagen se guardara en esa ruta relativa
                    
                    if(mysqli_num_rows($resultado) == 0){ //Si no hay datos en la tabla la trunquea para eliminar cualquier bug q surga 
                        $truncateTable = "truncate table slider1";
                        mysqli_query($connection, $truncateTable);
                    }
                    $query = "INSERT INTO slider1 (tittle, img_name) VALUES ('$titulo','$imagen')"; // Se insertan los datos en la tabla y se redirige al index.php
                    mysqli_query($connection, $query);
                    mysqli_close($connection);
                    echo '<script>window.location.href = "../index.php";</script>';
                }
            }else{
                echo '¡SE HA ALCANZADO EL MÁXIMO DE SLIDER ACUMULABLES!';
            }
        }
    ?>

    <script>
        // Explicacion resumida: Obtiene los datos de la imagen al subirse en el input, lee los metadatos y los imprime de modo que dibuje una imagen.
        function mostrarVistaPrevia(event) {
            var archivo = event.target.files[0];
            var vistaPrevia = document.getElementById("vista-previa");
            vistaPrevia.innerHTML = "";

            var reader = new FileReader();

            reader.onload = function (e) {
                var imagen = document.createElement("img");
                imagen.src = e.target.result;
                vistaPrevia.appendChild(imagen);
            };

            reader.readAsDataURL(archivo);
        }

        var input = document.getElementById("inputFile");
        input.addEventListener("change", mostrarVistaPrevia);
    </script>
        <script src="../JS/burger-bar.js"></script>
    </body>
</html>