<?php
    session_start(); //Inicia o Reanuda una sesion
    error_reporting(0); //Poner (0) para eliminar los reportes de errores. Eliminar el 0 para aparecer los errores.
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PMG - Politicas de Privacidad</title>
    <link rel="stylesheet" href="../style/style-privacy_policies.css" />
    <link rel="stylesheet" href="../style/style-footer.css" />
    <link rel="stylesheet" href="../style/style-header.css" />
    <link rel="shortcut icon" href="../images/Logo.avif" type="image/x-icon" />
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
                    <a href="../php/login_google.php">
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
            <li class="li li_icon-profile"><a href="../php/login_google.php"><div><span class="icon-profile"> <?php if ($_SESSION['user_image'] == '') { echo '<script> document.write("Iniciar Sesión"); </script>';} else { echo '<img src="' . $_SESSION['user_image'] . '" class="rounded-circle container" alt="">';} ?></span></div></a></li>
            <li><span class="material-icons-outlined"><img src="../images/home.png" alt=""></span><a href="../index.php">Inicio</a></li>
            <li><span><img src="../images/sobreNosotros.png" alt=""></span><a href="../php/about_us.php">Sobre Nosotros</a></li>
            <li><span><img src="../images/docentes.png" alt=""></span><a href="../php/Docentes.php">Docentes</a></li>
            <li><span><img src="../images/egresados.png" alt=""></span><a href="../php/graduates.php">Egresados</a></li>
            <li><span><img src="../images/Admision.png" alt=""></span><a href="../php/inf-admission.php">Admisión</a></li>
            <li><span><img src="../images/noticia.png" alt=""></span><a href="../php/noticias.php">Noticias</a></li>
        </ul>
    </div>

    <main>
        <div class="all">
            <div class="containerCenter">
                <div class="containerCenter__title">
                    <h1>POLITICAS DE PRIVACIDAD</h1>
                </div>
                <div class="policiesRow">
                    <div class="policiesRow__text">
                        <h1>1. ¿Qué tipo de datos personales se recopilan?</h1>
                        <ul>
                            <li>- Nombres Completos</li>
                            <li>- Apellidos</li>
                            <li>- Edad</li>
                            <li>- Número Telefónico</li>
                            <li>- Correo electrónico (tomado automáticamente de la cuenta de Google al iniciar sesión)</li>
                            <li>- Centro Educativo Anterior</li>
                            <li>- Provincia de Residencia</li>
                            <li>- Record de Notas</li>
                        </ul>
                    </div>
                    <div class="policiesRow__text">
                        <h1>2. ¿Cómo se recopilan los datos?</h1>
                        <h4>Los datos personales se recopilan a través de un formulario de admisión. El estudiante o tutor llena el formulario de admisión con la información necesaria para realizar el registro de admisión, y proporciona sus datos personales, que incluyen el nombre completo, número telefónico, dirección y correo electrónico.</h4>
                    </div>
                    <div class="policiesRow__text">
                        <h1>3. ¿Con qué finalidad se recopilan los datos?</h1>
                        <h4>Los datos personales se recopilan con el propósito de procesar y evaluar las solicitudes de admisión, así como para realizar evaluaciones psicológicas con fines educativos.</h4>
                    </div>
                    <div class="policiesRow__text">
                        <h1>4. ¿En base a qué legitimidad se tratan los datos?</h1>
                        <h4>La legitimidad para el tratamiento de los datos personales se basa en el consentimiento del solicitante o estudiante. Al proporcionar sus datos, el cliente está dando su consentimiento para que el Politécnico Máximo Gómez utilice esos datos con los fines mencionados.</h4>
                    </div>
                    <div class="policiesRow__text">
                        <h1>5. ¿Cómo se almacenan y protegen los datos?</h1>
                        <h4>La información recopilada se almacena de manera segura en sistemas protegidos para evitar accesos no autorizados, pérdida o robo de los datos. La institución implementa medidas de seguridad para garantizar la confidencialidad e integridad de la información recopilada.</h4>
                    </div>
                    <div class="policiesRow__text">
                        <h1>6. ¿Se comparten los datos con terceros?</h1>
                        <h4>No, el Politécnico Máximo Gómez no comparte los datos de sus solicitantes o estudiantes con terceros. Los datos proporcionados son tratados internamente por la institución y no se divulgan a terceras personas o entidades externas a la organización.</h4>
                    </div>
                    <div class="policiesRow__text">
                        <h1>7. ¿Cuáles son los derechos del usuario respecto a sus datos?</h1>
                        <h4>Los derechos del usuario respecto a sus datos incluyen el derecho de acceso, rectificación, cancelación y oposición. Esto significa que el cliente puede solicitar acceder a sus datos personales, corregirlos si están incorrectos, cancelarlos si ya no desea que se conserven y oponerse al tratamiento de sus datos en determinadas circunstancias.</h4>
                    </div>
                    <div class="policiesRow__text">
                        <h1>8. ¿Cuánto tiempo se conservan los datos?</h1>
                        <h4>El Politécnico Máximo Gómez conserva los datos proporcionados de manera permanente o hasta que el cliente solicite explícitamente la eliminación de sus datos. Esto significa que los datos se mantendrán en los registros de la institución a menos que el cliente solicite su eliminación o ejercicio del derecho al olvido.</h4>
                    </div>
                    <div class="policiesRow__text">
                        <h1>9. ¿Cómo pueden los usuarios contactar al responsable de los datos?</h1>
                        <h4>Los usuarios pueden contactar al responsable de los datos (Politécnico Máximo Gómez) utilizando los medios de contacto proporcionados en el sitio web, como las redes sociales o el correo electrónico de la institución.</h4>
                    </div>
                    <div class="policiesRow__text">
                        <h1>10. ¿Utilizan cookies u otras tecnologías de seguimiento?</h1>
                        <h4>No, el Politécnico Máximo Gómez no utiliza ningún tipo de cookies u otras tecnologías de seguimiento en su sitio web o en la plataforma. Esto significa que no se realizan seguimientos de la actividad del usuario a través de cookies o tecnologías similares mientras navega o utiliza los servicios en línea de la institución.</h4>
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
                            <a id="logo-link" href="https://www.instagram.com/politecnico_maximo_gomez/" target="_blank">
                                <img src="../images/logo-ig.avif" alt="" />
                            </a>
                            <a target="_blank" href="https://www.instagram.com/politecnico_maximo_gomez/" id="text-link">Instagram</a>
                        </div>
                        <div>
                            <a id="logo-link" href="https://www.facebook.com/PolitecnicoMaximoGomezOficial/" target="_blank">
                                <img src="../images/logo-fb.png" alt="" />
                            </a>
                            <a target="_blank" id="text-link" href="https://www.facebook.com/PolitecnicoMaximoGomezOficial/">Facebook</a>
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
                            <h3>- Alexander Gómez Peña</h3>
                            <a target="_blank" href="https://www.instagram.com/aleexx._.g/"><img src="../images/logo-ig.avif" alt="" /></a>
                        </div>
                        <div>
                            <h3>- José Joelmy Guerrero</h3>
                            <a target="_blank" href="https://www.instagram.com/joelmy_15_/"><img src="../images/logo-ig.avif" alt="" /></a>
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
                    <h1>Politécnico Máximo Gómez - Fundada el 14 de Febrero del 2000 - Todos Los Derechos Reservados ©2023</h1>
                </div>
            </div>
        </footer>
    </div>
    <script type="text/javascript">
        //Este bloque permite eliminar un bug con la posición del menu cuando scrolleas hacia abajo, su función se describe de la siguiente manera: se guarda cada objecto HTML en una variable, entonces header.classList.toggle("header-secundary-active", window.scrollY >= 90) se traduce a: el elemento HTML header quiero q accedas a su atributo class y que intercambies una clase si el usuario scrollea 90 pixeles en el EJE-Y y le añade la clase o se la elimina dependiendo si cumple la condición.
        window.addEventListener("scroll", function () {
            var short_menu = document.querySelector(".container-short_menu");
            var header = document.querySelector(".header-secundary");
            var title = document.querySelector(".title-header-main");
            header.classList.toggle(
                "header-secundary-active",
                window.scrollY >= 90
            );
            title.classList.toggle("title-main-active", window.scrollY >= 90);
            short_menu.classList.toggle("short_menu-active", window.scrollY >= 90);
        });
    </script>
    <script src="../JS/burger-bar.js"></script>
</body>

</html>