<?php
session_start();
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PMG - Creditos</title>
    <link rel="stylesheet" href="../style/style-credits.css">
    <link rel="stylesheet" href="../style/style-header.css">
    <link rel="shortcut icon" href="../images/Logo.avif" type="image/x-icon">
    <link rel="stylesheet" href="../style/style-footer.css">
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
                <?php 
                    //Determina si en la variable $_SESSION el correo de tu cuenta de google es el que esta establecido en el if. Si lo esta te aparece un apartado nuevo de administración, sino es el caso de no coincidir los correos no le aparecera al usuario el apartado de administración.
                    if  ($_SESSION['user_email_address'] == "alexandergomez41005@gmail.com" || $_SESSION['user_email_address'] == "pmaximogomez2000@gmail.com"){
                        echo '
                        <li class="li admin">
                            <a href="./chooseAdmin.php">
                            <div>
                                <span>
                                    <img src="../images/admin_panel.png" alt="" />
                                </span>
                                <h1>Admin</h1>
                            </div>
                            </a>
                        </li>
                        ';
                    }
                ?>
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
                                } else {
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
            <li class="li li_icon-profile"><a href="../php/login.php">
                    <div><span class="icon-profile">
                            <?php if ($_SESSION['user_image'] == '') {
                                echo '<script> document.write("Iniciar Sesión"); </script>';
                            } else {
                                echo '<img src="' . $_SESSION['user_image'] . '" class="rounded-circle container" alt="">';
                            } ?>
                        </span></div>
                </a></li>
            <li><span class="material-icons-outlined"><img src="../images/home.png" alt=""></span><a
                    href="../index.php">Inicio</a></li>
            <li><span><img src="../images/sobreNosotros.png" alt=""></span><a href="../php/about_us.php">Sobre
                    Nosotros</a></li>
            <li><span><img src="../images/docentes.png" alt=""></span><a href="../php/Docentes.php">Docentes</a></li>
            <li><span><img src="../images/egresados.png" alt=""></span><a href="../php/graduates.php">Egresados</a></li>
            <li><span><img src="../images/Admision.png" alt=""></span><a href="../php/inf-admission.php">Admisión</a>
            </li>
            <li><span><img src="../images/noticia.png" alt=""></span><a href="../php/noticias.php">Noticias</a></li>
        </ul>
    </div>
    <div class="all">

        <main>
            <div class="container-main">
                <div class="main-page">
                    <div class="title-header title-header-main">
                        <h1>Project Manager</h1>
                        <div class="line"></div>
                    </div>
                    <div class="creators">
                        <div class="id-creators">
                            <div class="name-creador">
                                <h1>Prof. Jonathan Díaz</h1>
                            </div>
                        </div>
                    </div>
                    <div class="title-header title-header-main">
                        <h1>Desarrolladores de la Página Web</h1>
                        <div class="line"></div>
                    </div>
                    <div class="creators">
                        <div class="id-creators">
                            <div class="name-creador">
                                <h1>Alexander Gómez Peña</h1>
                                <h5>6toC (Informática) 2022-2023</h5>
                            </div>
                            <div class="name-creador">
                                <h1>Jwarly Vargas Percel</h1>
                                <h5>6toC (Informática) 2022-2023</h5>
                            </div>
                            <div class="name-creador">
                                <h1>José Joelmy Guerrero</h1>
                                <h5>6toC (Informática) 2022-2023</h5>
                            </div>
                            <div class="name-creador">
                                <h1>Rober Mejía Samboy</h1>
                                <h5>6toC (Informática) 2022-2023</h5>
                            </div>
                        </div>
                    </div>
                    <div class="collaborators">
                        <div class="title-header title-header-main title-collab">
                            <h1>Matenimiento de la Página</h1>
                            <div class="line"></div>
                        </div>
                        <div class="id-collab">
                            <ul>
                                <li>
                                    <h4>Roybert Elías Baez Del Jesús</h4>
                                    <h5>6toC (Informática) 2022-2023</h5>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <footer>
            <div class="footer">
                <div class="top-footer">
                    <img src="../images/Logo.avif" alt="" />
                    <div class="title-pmg">
                        <h1>POLITECNICO MAXIMO GOMEZ</h1>
                    </div>
                    <div class="address-pmg">
                        <h3>Carretera Máximo Gómez El Llano, Baní, República Dominicana</h3>
                    </div>
                    <div class="contacts-pmg">
                        <div class="container-contacts">
                            <span class="material-symbols-outlined"><img src="../images/call.png" alt=""></span>
                            <h3>(809) 380-1718</h3>
                        </div>
                        <div class="container-contacts">
                            <span class="material-symbols-outlined"><img src="../images/email.png" alt=""></span>
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
                            <a id="logo-link" href="https://www.instagram.com/politecnico_maximo_gomez/"
                                target="_blank"><img src="../images/logo-ig.avif" alt="" /></a>
                            <a target="_blank" href="https://www.instagram.com/politecnico_maximo_gomez/"
                                id="text-link">Instagram</a>
                        </div>
                        <div>
                            <a id="logo-link" href="https://www.facebook.com/PolitecnicoMaximoGomezOficial/"
                                target="_blank"><img src="../images/logo-fb.png" alt="" /></a>
                            <a target="_blank" id="text-link"
                                href="https://www.facebook.com/PolitecnicoMaximoGomezOficial/">Facebook</a>
                        </div>
                        <div>
                            <a id="text-link" class="link_privacy_policies" href="./privacy_policies.php">Politicas de Privacidad</a>
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
                            <h3>- Alexánder Gómez Peña</h3>
                            <a target="_blank" href="https://www.instagram.com/aleexx._.g/"><img
                                    src="../images/logo-ig.avif" alt="" /></a>
                        </div>
                        <div>
                            <h3>- José Joelmy Guerrero</h3>
                            <a target="_blank" href="https://www.instagram.com/joelmy_15_/"><img
                                    src="../images/logo-ig.avif" alt="" /></a>
                        </div>
                        <div>
                            <h3>- Jwarly Vargas Percel</h3>
                            <a href=""><img src="../images/logo-ig.avif" alt="" /></a>
                        </div>
                        <div>
                            <h3>- Rober Mejia Samboy</h3>
                            <a href="https://www.instagram.com/mees_roberz/" target="_blank">
                                <img src="../images/logo-ig.avif" alt="" />
                            </a>
                        </div>
                        <a href="../php/collaborators.php">Ver detalles y colaboradores</a>
                    </div>
                </div>
                <div class="copyright">
                    <h1>
                        Politécnico Máximo Gómez - Fundada el 14 de Febrero del 2000 - Todos Los Derechos Reservados ©2023
                    </h1>
                </div>
            </div>
        </footer>
    </div>
    <script type="text/javascript">
        //Este bloque permite eliminar un bug con la posición del menu cuando scrolleas hacia abajo, su función se describe de la siguiente manera: se guarda cada objecto HTML en una variable, entonces header.classList.toggle("header-secundary-active", window.scrollY >= 90) se traduce a: el elemento HTML header quiero q accedas a su atributo class y que intercambies una clase si el usuario scrollea 90 pixeles en el EJE-Y y le añade la clase o se la elimina dependiendo si cumple la condición.
        window.addEventListener("scroll", function () {
            var short_menu = document.querySelector(".container-short_menu")
            var header = document.querySelector(".header-secundary")
            var title = document.querySelector(".title-header-main")
            header.classList.toggle("header-secundary-active", window.scrollY >= 90)
            title.classList.toggle("title-main-active", window.scrollY >= 90)
            short_menu.classList.toggle("short_menu-active", window.scrollY >= 90)
        })
    </script>
    <script src="../JS/burger-bar.js"></script>
</body>

</html>