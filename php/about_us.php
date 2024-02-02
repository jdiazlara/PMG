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
    <title>PMG - Sobre Nosotros</title>
    <link rel="stylesheet" href="../style/style-about_us.css" />
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
            <li class="li li_icon-profile"><a href="../php/login_google.php"><div><span class="icon-profile"><?php if ($_SESSION['user_image'] == '') {echo '<script> document.write("Iniciar Sesión"); </script>';} else {echo '<img src="' . $_SESSION['user_image'] . '" class="rounded-circle container" alt="">';} ?></span></div></a></li>
            <li><span class="material-icons-outlined"><img src="../images/home.png" alt=""></span><ahref="../index.php">Inicio</ahref=></li>
            <li><span><img src="../images/sobreNosotros.png" alt=""></span><a href="../php/about_us.php">Sobre Nosotros</a></li>
            <li><span><img src="../images/docentes.png" alt=""></span><a href="../php/Docentes.php">Docentes</a></li>
            <li><span><img src="../images/egresados.png" alt=""></span><a href="../php/graduates.php">Egresados</a></li>
            <li><span><img src="../images/Admision.png" alt=""></span><a href="../php/inf-admission.php">Admisión</a></li>
            <li><span><img src="../images/noticia.png" alt=""></span><a href="../php/noticias.php">Noticias</a></li>
        </ul>
    </div>

    <div class="all">
        <main>
            <div class="container-main">
                <div class="main-page">
                    <div class="history-pmg">
                        <div class="title-header title-header-main">
                            <h1>HISTORIA</h1>
                            <div class="line"></div>
                        </div>
                        <div class="contents-history">
                            <img src="../images/ImagenPoli2.avif" alt="" />
                            <p>
                                A raíz del año 1905, en que ocurre en la ciudad de la
                                <strong>Habana</strong>, Cuba la muerte del
                                <strong>Generalísimo Máximo Gómez</strong>, hurgando en su
                                diario de campaña, el cual fue escrito en los momentos que le
                                permitía el fragor de la batalla y en sus horas de descanso;
                                se encuentra impreso uno de sus más caros deseos, el de que se
                                construyera en la casa donde él nació, un centro educativo
                                para la educación y el adiestramiento de los jóvenes de la
                                época. Ese deseo tomaría más auge, cuando en el Año 1996
                                visita oficialmente nuestro país el
                                <strong>Licdo. Vecino Alegret</strong>, Ministro de Educación
                                de la hermana República de Cuba, encomendado por el Primer
                                Ministro del Gobierno Cubano
                                <strong>Dr. Fidel Castro Ruz</strong>, quien nos trajo la
                                grata noticia de la materialización del deseo del Generalísimo
                                Máximo Gómez, ratificando que dicha obra constituía un
                                merecido homenaje del pueblo y gobierno cubano, al pueblo de
                            </p>
                            <p>
                                Baní y al gobierno dominicano.
                                Un acontecimiento que marca un hito en la historia de las
                                relaciones entre el pueblo cubano y el dominicano, lo
                                constituye la visita el día 23 de agosto del 1998 realizada al
                                pueblo de Baní el presidente cubano Dr. Fidel Castro Ruz,
                                quien anunció la grata noticia de la conversión en realidad
                                del anhelado deseo manifestado por el Generalísimo Máximo
                                Gómez en su diario, lo cual se haría posible, gracias a la
                                donación de <strong>$ 250,000.00 dólares</strong>, hecha por
                                el presidente cubano y quien ponía a disposición del gobierno
                                dominicano, para dicha obra. Oferta aceptada por el entonces
                                presidente <strong>Dr. Leonel Fernández Reyna</strong>, quien
                                inmediatamente dispuso la búsqueda de los terrenos para la
                                construcción de lo que sería el
                                <strong>Politécnico Máximo Gómez</strong>, encomendado para
                                tal gestión a algunas autoridades y a los miembros del comité
                                “Amigo de Cuba”, filial Baní.
                            </p>
                            <p>
                                Al año siguiente y con la presencia del Ministro de Educación
                                de Cuba Licdo. Vecino Alegret (segunda visita) y acompañado de
                                la <strong>Licda. Ligia Amada Melo Vda. Cardona</strong>,
                                quien fungía como Secretaria de Estado de Educación, se da el
                                primer picazo, el día 10 de febrero del 1999, convirtiéndose
                                aquel acontecimiento en un acto multitudinario, y que servía
                                para dejar iniciados los trabajos de construcción del
                                Politécnico. El total de inversión ascendió
                                aproximadamente a <strong>$ 50, 000,000.00</strong> de pesos,
                                en un tiempo récord de apenas 8 meses. En la actualidad, el
                                Politécnico se encuentra funcionando a plena capacidad dotado
                                de modernos equipos donados por las autoridades del gobierno
                                cubano, para el funcionamiento de los talleres y laboratorios
                                que sirven como centro de entrenamiento teórico-práctico para
                                los estudiantes que cursan carreras técnicas en el mismo.
                            </p>
                        </div>
                    </div>

                    <div class="maximo_gomez-pmg contents">
                        <div class="title-header title-header-maximo_gomez">
                            <h1>MAXIMO GOMEZ</h1>
                            <div class="line"></div>
                        </div>
                        <div class="contents-maximo_gomez contents">
                            <img src="../images/maximo_gomez.avif" alt="" />
                            <p>
                                Nació en Baní, provincia Peravia, el 18 de noviembre de 1836.
                                A los 16 años Máximo Gómez se unió al ejército dominicano en
                                la lucha contra las invasiones haitianas de
                                <strong>Faustine Soulouque</strong> logrando obtener el grado
                                de alférez. Luchó con las tropas anexionistas en la Guerra de
                                la <strong>Restauración Dominicana.</strong> Máximo Gómez es
                                el militar cuyo nombre está unido a la historia de la epopeya
                                libertadora cubana desde que
                                <strong>Carlos Manuel de Céspedes</strong> se levantó en La
                                Demajagua hasta que la bandera española, como signo de
                                soberanía, fue arriada en 1898. Máximo Gómez Báez, ese gran
                                dominicano que fue Mayor General del Ejército Libertador
                                cubano en la Guerra de los Diez Años y su General en Jefe en
                                la Guerra del 95, nació pobre y murió humilde, fue ejemplo de
                                internacionalismo, genio militar y un fiel defensor de las
                                ideas y principios de <strong>José Martí.</strong>
                            </p>
                            <p>
                                El 17 de junio de 1905 fallecía en La Habana el Generalísimo
                                <strong>Máximo Gómez</strong> a la edad de 69 años, en su casa
                                habanera, con su familia y sin fortuna personal, lo cual es la
                                mejor muestra de su probidad absoluta al manejar todos los
                                fondos recaudados para liberar a Cuba del dominio colonial
                                español. Gómez nació en el pequeño poblado de Baní, provincia
                                de Peravia, a 65 kilómetros al oeste de Santo Domingo, capital
                                de República Dominicana, donde aún se conservan los horcones
                                de la modesta casa donde vivió su infancia y adolescencia y
                                todo el pueblo dominicano lo considera un héroe. "Muy pronto
                                me sentí yo unido al ser que más sufría en Cuba y sobre el
                                cual pesaba tan gran desgracia, el negro esclavo. Entonces fue
                                que realmente supe que era yo capaz de amar a los hombres".
                            </p>
                        </div>
                    </div>

                    <div class="objectives">
                        <div class="title-header-objectives-internationales">
                            <div>
                                <h1>OBJETIVOS INSTITUCIONALES</h1>
                                <div class="line"></div>
                            </div>
                        </div>
                        <div class="box-objectives">
                            <div class="box-text mission">
                                <h1>MISIÓN</h1>
                                <p>
                                    Formar y capacitar jóvenes y adultos de ambos sexos, con un
                                    alto nivel competitivo, en el desempeño técnico profesional
                                    con alta calidad, capacidad y eficiencia para integrarse con
                                    las competencias humanas, éticas y académicas a las tareas
                                    de producción de bienes y servicios acordes con las
                                    exigencias del mercado.
                                </p>
                            </div>
                            <div class="box-text view">
                                <h1>VISIÓN</h1>
                                <p>
                                    Ser una institución que ofrezca una formación técnico
                                    profesional e integral, basada en valores, con la finalidad
                                    de mejorar el desempeño de los egresados, para ser personas
                                    competentes acorde con las exigencias del mercado laboral a
                                    nivel nacional e internacional.
                                </p>
                            </div>
                            <div class="box-text objectives-international">
                                <h1 id="box-text__h1">OBJETIVOS INSTITUCIONALES</h1>
                                <p>
                                    Articular los esfuerzos del Estado, y de los
                                    Maestros, trabajando conjuntamente con las tareas del
                                    (MINERD). Quienes tienen la obligación de formar a los y las
                                    jóvenes, con un criterio universal y sin ningún tipo de
                                    discriminación, con el propósito de desarrollar recursos
                                    humanos de calidad, que puedan emprender e innovar, para
                                    asi producir y desarrollar empresas como empleadores o
                                    empleados eficientes y eficaces.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="container-all-values">
                        <div class="values">
                            <div class="title-header title-header-main">
                                <h1>NUESTROS VALORES</h1>
                                <div class="line"></div>
                            </div>
                            <ul>
                                <li>• Respeto</li>
                                <li>• Honestidad</li>
                                <li>• Solidaridad</li>
                                <li>• Responsabilidad</li>
                                <li>• Diciplina</li>
                                <li>• Patriotismo</li>
                                <li>• Equidad</li>
                                <li>• Pro Actividad</li>
                            </ul>
                        </div>

                        <div class="specific-objectives">
                            <div class="title-header title-header-main">
                                <h1>OBJETIVOS ESPECIFICOS</h1>
                                <div class="line"></div>
                            </div>
                            <ul>
                                <li>
                                    - Proporcionales aprendizajes calificados mediante la
                                    adquisición y el desarrollo de competencias propias en una
                                    especialidad determinada y la concepción de competencias
                                    básicas que son fundamentales para relacionarse en el mundo
                                    laboral y social.
                                </li>
                                <li>
                                    - Formar técnicos que suplan gran parte de las empresas de
                                    nuestra región y el país.
                                </li>
                                <li>
                                    - Inducir nuestros graduandos en el mundo del emprendimiento
                                    y la innovación.
                                </li>
                                <li>
                                    - Lograr altos méritos de competencia en nuestros Maestros
                                    (as) y nuestros egresados que nos coloquen a la vanguardia
                                    de la educación técnica en la región y el país.
                                </li>
                                <li>
                                    - Abarcar la mayoría de los pueblos de nuestra región en
                                    cuento a nuestro alcance formativo. Convertirnos en el
                                    referente educativo de toda la provincia Peravia.
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
                            <a href="https://www.instagram.com/mees_roberz/" target="_blank"><img src="../images/logo-ig.avif" alt="" /></a>
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