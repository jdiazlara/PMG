<?php
include('./php/connection.php'); //Importa la conexion de la base de datos
$query = "SELECT * FROM noticias order by fecha desc limit 6";
$resultado = mysqli_query($connection, $query);
session_start(); //Inicia o Reanuda una sesion
error_reporting(0); //Poner (0) para eliminar los reportes de errores. Eliminar el 0 para aparecer los errores.
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Pagina Oficial del Politécnico Máximo Gómez">
    <meta name="robots" content="index, follow">
    <meta name="keywords" content="PMG, Politecnico Maximo Gomez, Politecnico">
    <meta name="author" content="https://politecnicomaximogomez.net">
    <meta http-equiv="expires" content="43200" />
    <title>PMG - Inicio</title>
    <link rel="stylesheet" href="./style/slide.css">
    <link rel="stylesheet" href="./style/style-header.css">
    <link rel="stylesheet" href="./style/style-footer.css">
    <link rel="stylesheet" href="./splide-4.1.3/dist/css/splide.min.css" />
    <script src="./splide-4.1.3/dist/js/splide.min.js"></script>
    <link rel="shortcut icon" href="./images/Logo.avif" type="image/x-icon">
</head>

<body>
    <!-- Menu de Navegacion -->
    <header class="header-primary">
        <nav>
            <ul>
                <li>
                    <div class="img-container">
                        <img src="./images/Logo.avif" alt="">
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
                            <a href="./index.php"> <img src="./images/Logo.avif" alt="" srcset=""> </a>
                        </div>
                    </div>
                </li>
                <li class="li">
                    <a href="./index.php">
                        <div>
                            <span class="material-icons-outlined">
                                <img src="./images/home.png" alt="">
                            </span>
                            <h1>Inicio</h1>
                        </div>
                    </a>
                </li>
                <li class="li">
                    <a href="./php/about_us.php">
                        <div>
                            <span>
                                <img src="./images/sobreNosotros.png" alt="">
                            </span>
                            <h1>Sobre Nosotros</h1>
                        </div>
                    </a>
                </li>
                <li class="li">
                    <a href="./php/Docentes.php">
                        <div>
                            <span>
                                <img src="./images/docentes.png" alt="">
                            </span>
                            <h1>Docentes</h1>
                        </div>
                    </a>
                </li>
                <li class="li">
                    <a href="./php/graduates.php">
                        <div>
                            <span>
                                <img src="./images/egresados.png" alt="">
                            </span>
                            <h1>Egresados</h1>
                        </div>
                    </a>
                </li>
                <li class="li">
                    <a href="./php/inf-admission.php">
                        <div>
                            <span>
                                <img src="./images/Admision.png" alt="">
                            </span>
                            <h1>Admisión</h1>
                        </div>
                    </a>
                </li>
                <li class="li">
                    <a href="./php/noticias.php">
                        <div>
                            <span>
                                <img src="./images/noticia.png" alt="">
                            </span>
                            <h1>Noticias</h1>
                        </div>
                    </a>
                </li>
                <!-- <li class="li">
                        <a href="./php/ev_psic.php">
                            <div>
                                <span>
                                    <img src="./images/Admision.png" alt="">
                                </span>
                                <h1>Ex. Psicologico</h1>
                            </div>
                        </a>
                    </li> -->
                <?php
                //Determina si en la variable $_SESSION el correo de tu cuenta de google es el que esta establecido en el if. Si lo esta te aparece un panel nuevo de administración, sino es el caso de no coincidir los correos no le aparecera al usuario el panel de administración.
                if ($_SESSION['user_email_address'] == "alexandergomez41005@gmail.com" || $_SESSION['user_email_address'] == "pmaximogomez2000@gmail.com") {
                    echo '
                            <li class="li admin">
                                <a href="./php/chooseAdmin.php">
                                <div>
                                    <span>
                                        <img src="./images/admin_panel.png" alt="" />
                                    </span>
                                    <h1>Admin</h1>
                                </div>
                                </a>
                            </li>
                            ';
                }
                ?>
                <li class="li li_icon-profile">
                    <a href="./php/login_google.php">
                        <div>
                            <span class="icon-profile">
                                <?php
                                //Verifica si en la variable de sesion hay algun string, si hay imprime la url de la imagen de perfil, de lo contrario te pide iniciar sesión.
                                if ($_SESSION['user_image'] == '') {
                                    echo '<script>
                                                document.write("Iniciar Sesión");
                                            </script>';
                                } else {
                                    echo '<img src="" class="rounded-circle container userImg" loading="lazy" alt="">';
                                }
                                ?>
                            </span>
                            <h1></h1>
                        </div>
                    </a>
                </li>
                <li class="bar">
                    <div>
                        <img src="./images/burger-bar.png" alt="">
                    </div>
                </li>
            </ul>
        </nav>
    </header>
    <div class="container-short_menu">
        <ul>
            <li class="li li_icon-profile">
                <a href="./php/login_google.php">
                    <div>
                        <span class="icon-profile">
                            <?php
                            if ($_SESSION['user_image'] == '') {
                                echo '<script> document.write("Iniciar Sesión"); </script>';
                            } else {
                                echo '<img src="" class="rounded-circle container userImg" loading="lazy" alt="">';
                            }
                            ?>
                        </span>
                    </div>
                </a>
            </li>
            <li><span class="material-icons-outlined"><img src="./images/home.png" alt=""></span><a href="./index.php">Inicio</a></li>
            <li><span><img src="./images/sobreNosotros.png" alt=""></span><a href="./php/about_us.php">Sobre Nosotros</a></li>
            <li><span><img src="./images/docentes.png" alt=""></span><a href="./php/Docentes.php">Docentes</a></li>
            <li><span><img src="./images/egresados.png" alt=""></span><a href="./php/graduates.php">Egresados</a></li>
            <li><span><img src="./images/Admision.png" alt=""></span><a href="./php/inf-admission.php">Admisión</a></li>
            <li><span><img src="./images/noticia.png" alt=""></span><a href="./php/noticias.php">Noticias</a></li>
            <!-- <li><span><img src="./images/Admision.png" alt=""></span><a href="./php/ev_psic.php">Ex. Psicologico</a> -->
            </li>
        </ul>
    </div>

    <!-- Cierre Menu de Navegacion -->

    <script>
        const userInfoData = JSON.parse(localStorage.getItem('userInfo'));
        const userImgs = document.querySelectorAll('.userImg');
        userImgs.forEach((userImg) => {
            userImg.src = userInfoData[2];
        })
    </script>



    <!--Descomentar este menu solo cuando se vayan a realizar para mantenimientos y comentar el menu entero de arriba-->
    <!-- <header class="header-primary">-->
    <!--    <nav>-->
    <!--        <ul>-->
    <!--            <li>-->
    <!--                <div class="img-container">-->
    <!--                    <img src="./images/Logo.png" alt="">-->
    <!--                </div>-->
    <!--            </li>-->
    <!--            <li class="title-header">-->
    <!--                <h2 class="title">POLITECNICO MAXIMO GOMEZ</h2>-->
    <!--                <h2 class="subTitle">Formando Jóvenes Para Un Futuro Mejor</h2>-->
    <!--            </li>-->
    <!--        </ul>-->
    <!--    </nav>-->
    <!--</header>-->

    <!--<header class="header-secundary">-->
    <!--    <nav class="navbar">-->
    <!--        <ul class="ul-bar">-->
    <!--            <li class="list-brand">-->
    <!--                <div class="container-brand">-->
    <!--                    <div class="navbar-brand">-->
    <!--                        <a href=""> <img src="./images/Logo.png" alt="" srcset=""> </a>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </li>-->
    <!--            <li class="li">-->
    <!--                <a href="">-->
    <!--                    <div>-->
    <!--                        <span class="material-icons-outlined">-->
    <!--                            <img src="./images/home.png" alt="">-->
    <!--                        </span>-->
    <!--                        <h1>Inicio</h1>-->
    <!--                    </div>-->
    <!--                </a>-->
    <!--            </li>-->
    <!--            <li class="li">-->
    <!--                <a href="">-->
    <!--                    <div>-->
    <!--                        <span>-->
    <!--                            <img src="./images/sobreNosotros.png" alt="">-->
    <!--                        </span>-->
    <!--                        <h1>Sobre Nosotros</h1>-->
    <!--                    </div>-->
    <!--                </a>-->
    <!--            </li>-->
    <!--            <li class="li">-->
    <!--                <a href="">-->
    <!--                    <div>-->
    <!--                        <span>-->
    <!--                            <img src="./images/docentes.png" alt="">-->
    <!--                        </span>-->
    <!--                        <h1>Docentes</h1>-->
    <!--                    </div>-->
    <!--                </a>-->
    <!--            </li>-->
    <!--            <li class="li">-->
    <!--                <a href="">-->
    <!--                    <div>-->
    <!--                        <span>-->
    <!--                            <img src="./HTML/images/egresados.png" alt="">-->
    <!--                        </span>-->
    <!--                        <h1>Egresados</h1>-->
    <!--                    </div>-->
    <!--                </a>-->
    <!--            </li>-->
    <!--            <li class="li">-->
    <!--                <a href="">-->
    <!--                    <div>-->
    <!--                        <span>-->
    <!--                            <img src="./images/Admision.png" alt="">-->
    <!--                        </span>-->
    <!--                        <h1>Admisión</h1>-->
    <!--                    </div>-->
    <!--                </a>-->
    <!--            </li>-->
    <!--            <li class="li">-->
    <!--                <a href="">-->
    <!--                    <div>-->
    <!--                        <span>-->
    <!--                            <img src="./images/noticia.png" alt="">-->
    <!--                        </span>-->
    <!--                        <h1>Noticias</h1>-->
    <!--                    </div>-->
    <!--                </a>-->
    <!--            </li>-->
    <!--            <li class="li">-->
    <!--                <a href="">-->
    <!--                    <div>-->
    <!--                        <span>-->
    <!--                            <img src="./images/Admision.png" alt="">-->
    <!--                        </span>-->
    <!--                        <h1>Ex. Psicologico</h1>-->
    <!--                    </div>-->
    <!--                </a>-->
    <!--            </li>-->
    <!--            <li class="li li_icon-profile">-->
    <!--                <a href="">-->
    <!--                    <div>-->
    <!--                        <span class="icon-profile">-->
    <?php
    //Verifica si en la variable de sesion hay algun string, si hay imprime la url de la imagen de perfil, de lo contrario te pide iniciar sesión.
    // if ($_SESSION['user_image'] == '') {
    //     echo '<script>
    //         document.write("Iniciar Sesión");
    //     </script>';
    // }
    // else{
    //     echo '<img src="' . $_SESSION['user_image'] . '" class="rounded-circle container" alt="">';
    // }
    ?>
    <!--                        </span>-->
    <!--                        <h1></h1>-->
    <!--                    </div>-->
    <!--                </a>-->
    <!--            </li>-->
    <!--            <li class="bar">-->
    <!--                <div>-->
    <!--                    <img src="./images/burger-bar.png" alt="">-->
    <!--                </div>-->
    <!--            </li>-->
    <!--        </ul>-->
    <!--    </nav>-->
    <!--</header>-->
    <!--<div class="container-short_menu">-->
    <!--    <ul>-->
    <!--        <li class="li li_icon-profile"><a href=""><div><span class="icon-profile"><?php if ($_SESSION['user_image'] == '') {
                                                                                                echo '<script> document.write("Iniciar Sesión"); </script>';
                                                                                            } else {
                                                                                                echo '<img src="' . $_SESSION['user_image'] . '" class="rounded-circle container" alt="">';
                                                                                            } ?> </span></div></a></li>-->
    <!--        <li><span class="material-icons-outlined"><img src="./images/home.png" alt=""></span><a href="">Inicio</a></li>-->
    <!--        <li><span><img src="./images/sobreNosotros.png" alt=""></span><a href="">Sobre Nosotros</a></li>-->
    <!--        <li><span><img src="./images/docentes.png" alt=""></span><a href="">Docentes</a></li>-->
    <!--        <li><span><img src="./images/egresados.png" alt=""></span><a href="">Egresados</a></li>-->
    <!--        <li><span><img src="./images/Admision.png" alt=""></span><a href="">Admisión</a></li>-->
    <!--        <li><span><img src="./images/noticia.png" alt=""></span><a href="">Noticias</a></li>-->
    <!--    </ul>-->
    <!--</div> -->
    <?php
    // echo '<div class="no_access">
    //     <script>
    //         document.write("LA PAGINA WEB ESTA EN MANTENIMIENTO");
    //     </script>
    // <div>
    // ';
    // die();
    ?>

    <div class="all">
        <?php
        include "./php/connection.php"; //Importar la BDD
        $query = "SELECT * FROM slider1";
        $result_slide = mysqli_query($connection, $query); //Ejecuta la consulta SQL


        if ($result_slide) { // Verifica si se ha ejecutado la consulta correctamente.
            if (mysqli_num_rows($result_slide) <= 0) { //Verifica si hay menor o iguales a 0 filas. Quiere decir, verifica si no hay ninguna fila en la tabla

            } else { // Quiere decir, que si hay filas en la tabla.
                for ($i = 1; $i == mysqli_num_rows($result_slide); $i++) { //Itera otras las filas y por cada fila encontrada crea un input para despues relacionarse con los botones de paginacion para navegar entre los slide.
                    echo '<input type="radio" name="image-slide" id="' . $i . '" hidden>';
                }
        ?>
                <div class="slide">
                    <div class="splide">
                        <div class="splide__track">
                            <ul class="splide__list">
                                <?php // Itera todas las filas y crea un slide por cada fila encontrada con la informacion de la misma fila iterada.
                                $firstSlide = true;
                                $rows = mysqli_fetch_all($result_slide, MYSQLI_ASSOC);
                                foreach ($rows as $row) {
                                    $activeClass = ($firstSlide) ? 'active' : '';
                                    echo '
                                        <li class="splide__slide">
                                        <div class="item-slide1 ' . $activeClass . '">
                                        <div class="img_slide">
                                        <img src="./images/img_sliders/' . $row['img_name'] . '" alt="' . $row['tittle'] . '" loading="lazy">
                                        </div>
                                        </div>
                                        </li>
                                ';
                                    $firstSlide = false;
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
                
        <?php
            }
            mysqli_free_result($result_slide);
        } else {
            echo 'Error en la consulta: ' . mysqli_error($conexion);
        }
        ?>
        <main>
            <div class="container-main">
                <div class="main-page">
                    <div class="container-all">
                            <div class="events">
                                <div class="title-header--change title-header title-header-main">
                                    <h1 id="Noticia">Noticias</h1>
                                    <div class="line"></div>
                                    <?php
                                    //Verifica si hay 1 o mas de un registro en la tabla. Si hay filas en la tabla, si hay imprime la informacion en forma de card de noticias. De lo contrario oculta el apartado de noticia en el index.html
                                    if (mysqli_num_rows($resultado) >= 1) {
                                        echo '
                                        <script>
                                            try {
                                                let title_noticia = document.querySelector("#Noticia");
                                                let no_noticia = document.querySelector("#no-Noticia");
                                                title_noticia.style.display = "block";
                                                no_noticia.style.display = "";
                                            } catch (error) {
                                                
                                            }
                                        </script>
                                    ';
                                    } else {
                                        echo '
                                        <script>
                                            try {
                                                const title = document.querySelector("#Noticia");
                                                const noticia = document.querySelector("#no-Noticia");
                                                title.style.display = "none";
                                                noticia.style.display = "block"
                                            } catch (error) {
                                                
                                            }
                                        </script>
                                    ';
                                    }
                                    ?>
                                </div>
                            </div>

                              <div class="noticias__link">
                                <div>
                                    <button class="sgl__btn" style="transform: rotate(180deg)" onClick="slide('left')" class="noticias__slider__arrow arrowLeft">
                                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 40" width="40" height="40" focusable="false"><path d="m15.5 0.932-4.3 4.38 14.5 14.6-14.5 14.5 4.3 4.4 14.6-14.6 4.4-4.3-4.4-4.4-14.6-14.6z"></path></svg>
                                    </button>
                                    <button class="sgl__btn" onClick="slide('right')" class="noticias__slider__arrow arrowLeft">
                                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 40" width="40" height="40" focusable="false"><path d="m15.5 0.932-4.3 4.38 14.5 14.6-14.5 14.5 4.3 4.4 14.6-14.6 4.4-4.3-4.4-4.4-14.6-14.6z"></path></svg>
                                    </button>
                                </div>
                                  <a id="notAccess" href="php/noticias.php">Ver todas</a>
                                </div>
                                
                              
                                <div class="content__container">
                                    <div class="sgl__arrow arrowsContainer">
                                      <button class="sgl__btn" style="transform: rotate(180deg)" onClick="slide('left')" class="noticias__slider__arrow arrowLeft">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 40" width="40" height="40" focusable="false"><path d="m15.5 0.932-4.3 4.38 14.5 14.6-14.5 14.5 4.3 4.4 14.6-14.6 4.4-4.3-4.4-4.4-14.6-14.6z"></path></svg>
                                      </button>
                                    </div>
                                <div class="sld_btn_container">
                                  <div class="noticias__slider grid">
                                    <div class="card__container">
                                        <?php foreach ($resultado as $row) { ?>
                                            <div class="singleCard">
                                      
                                              <div class="card__img">
                                                <embed draggable="false" src="./images/notice_img/<?php echo $row['imagen']; ?>" />
                                              </div>
                                    
                                              <div class="inf-card">
                                                <div class="card__title">
                                                    <h1>
                                                        <?php echo $row['nombre']; ?>
                                                    </h1>
                                                </div>
                                                <div class="card__description">
                                                    <p readonly><?php echo $row['descripcion']; ?></p>
                                                </div>
                                              </div>
                                  
                                              <div class="card__subtitle">
                                                <p>Publicada por <?php echo $row['autor']; ?> - <?php echo date("d/m/Y", strtotime($row['fecha'])); ?></p>
                                              </div>

                                          </div>
                                        <?php } ?>
                                    </div>
                                  </div>

                                  <div class="slider-buttons">

                                  </div>
                                </div>
                                    <div class="sgl__arrow arrowsContainer">
                                      <button class="sgl__btn" onClick="slide('right')" class="noticias__slider__arrow arrowRight">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 40" width="40" height="40" focusable="false"><path d="m15.5 0.932-4.3 4.38 14.5 14.6-14.5 14.5 4.3 4.4 14.6-14.6 4.4-4.3-4.4-4.4-14.6-14.6z"></path></svg>
                                      </button>                                      
                                    </div>
                              </div>

                        </div>
                </div>
            </div>
        </main>
        <footer>

            <!-- Footer -->
            <div class="footer">
                <div class="top-footer">
                    <img src="./images/Logo.avif" alt="" />
                    <div class="title-pmg">
                        <h1>POLITECNICO MAXIMO GOMEZ</h1>
                    </div>
                    <div class="address-pmg">
                        <h3>Carretera Máximo Gómez El Llano, Baní, República Dominicana</h3>
                    </div>
                    <div class="contacts-pmg">
                        <div class="container-contacts">
                            <span class="material-symbols-outlined"><img src="./images/call.png" alt=""></span>
                            <h3>(809) 380-1718</h3>
                        </div>
                        <div class="container-contacts">
                            <span class="material-symbols-outlined"><img src="./images/email.png" alt=""></span>
                            <h3>pmaximogomez2000@gmail.com</h3>
                        </div>
                    </div>
                </div>
                <div class="bottom-footer">
                    <div class="social-media-pmg">
                        <div class="title-bottom">
                            <h1>Redes Sociales - PMG</h1>
                        </div>
                        <div>
                            <a id="logo-link" href="https://www.instagram.com/politecnico_maximo_gomez/" target="_blank"><img src="./images/logo-ig.avif" alt="" /></a>
                            <a id="text-link">Instagram</a>
                        </div>
                        <div>
                            <a id="logo-link" href="https://www.facebook.com/PolitecnicoMaximoGomezOficial/" target="_blank">
                                <img src="./images/logo-fb.png" alt="" />
                            </a>
                            <a id="text-link" href="https://www.facebook.com/PolitecnicoMaximoGomezOficial/">Facebook</a>
                        </div>
                        <div>
                            <a id="text-link" class="link_privacy_policies" href="./php/privacy_policies.php">Politicas de Privacidad</a>
                        </div>
                    </div>
                    <div class="founders-page">
                        <div class="title-founders">
                            <h1>Creadores de la Página</h1>
                        </div>
                        <div class="second-title-founders">
                            <h1>6toC (Informática) - 2022-2023</h1>
                        </div>
                        <div>
                            <h3>- Alexander Gómez Peña</h3>
                            <a href="https://www.instagram.com/aleexx._.g/" target="_blank">
                                <img src="./images/logo-ig.avif" alt="" />
                            </a>
                        </div>
                        <div>
                            <h3>- José Joelmy Guerrero</h3>
                            <a href="https://www.instagram.com/joelmy_15_/" target="_blank">
                                <img src="./images/logo-ig.avif" alt="" />
                            </a>
                        </div>
                        <div>
                            <h3>- Jwarly Vargas Percel</h3>
                            <a href="#"> <!-- No tiene -->
                                <img src="./images/logo-ig.avif" alt="" />
                            </a>
                        </div>
                        <div>
                            <h3>- Rober Mejia Samboy</h3>
                            <a href="https://www.instagram.com/mees_roberz/" target="_blank">
                                <img src="./images/logo-ig.avif" alt="" />
                            </a>
                        </div>
                        <a href="./php/collaborators.php">Ver detalles y colaboradores</a>
                    </div>
                </div>
                <div class="copyright">
                    <h1>Politécnico Máximo Gómez - Fundada el 14 de Febrero del 2000 - Todos Los Derechos Reservados ©2023 - Pagina Principal</h1>
                </div>
            </div>
        </footer>
        <!-- Cierre Footer -->
    </div>
    <script type="text/javascript">
        //Este bloque permite eliminar un bug con la posición del menu cuando scrolleas hacia abajo, su función se describe de la siguiente manera: se guarda cada objecto HTML en una variable, entonces header.classList.toggle("header-secundary-active", window.scrollY >= 90) se traduce a: el elemento HTML header quiero q accedas a su atributo class y que intercambies una clase si el usuario scrollea 90 pixeles en el EJE-Y y le añade la clase o se la elimina dependiendo si cumple la condición.
        window.addEventListener("scroll", function() {
            var short_menu = document.querySelector(".container-short_menu")
            var header = document.querySelector(".header-secundary")
            var title = document.querySelector(".all")
            header.classList.toggle("header-secundary-active", window.scrollY >= 90)
            title.classList.toggle("title-main-active", window.scrollY >= 90)
            short_menu.classList.toggle("short_menu-active", window.scrollY >= 90)
        })
        var splide = new Splide(".splide", {
            type: 'loop',
            autoplay:true,
            speed:'2000'
        });
        splide.mount();
    </script>
    <script src="./JS/burger-bar.js"></script>
    <script src="./JS/sliderMovement.js"></script>
    <script src="./JS/events-slider.js"></script>
</body>

</html>