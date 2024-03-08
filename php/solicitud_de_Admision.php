<?php

error_reporting(0);
session_start();
require_once '../vendor/autoload.php';
include('../php/config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PMG - Solicitud de Admisión</title>
    <link rel="shortcut icon" href="../images/Logo.avif" type="image/x-icon">
    <link rel="stylesheet" href="../style/style-request_inlet.css">
    <link rel="stylesheet" href="../style/style-header.css">
    <link rel="stylesheet" href="../style/style-solicitud-admision.css">
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
                if ($_SESSION['user_email_address'] == "alexandergomez41005@gmail.com" || $_SESSION['user_email_address'] == "pmaximogomez2000@gmail.com") {
                    echo '
                          <li class="li admin">
                            <a href="../php/admin_admision.php">
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
            <li class="li li_icon-profile"><a href="../php/login_google.php">
                    <div><span class="icon-profile"><?php if ($_SESSION['user_image'] == '') {
                                                        echo '<script> document.write("Iniciar Sesión"); </script>';
                                                    } else {
                                                        echo '<img src="' . $_SESSION['user_image'] . '" class="rounded-circle container" alt="">';
                                                    } ?> </span></div>
                </a></li>
            <li><span class="material-icons-outlined"><img src="../images/home.png" alt=""></span><a href="../index.php">Inicio</a></li>
            <li><span><img src="../images/sobreNosotros.png" alt=""></span><a href="../php/about_us.php">Sobre Nosotros</a></li>
            <li><span><img src="../images/docentes.png" alt=""></span><a href="../php/Docentes.php">Docentes</a></li>
            <li><span><img src="../images/egresados.png" alt=""></span><a href="../php/graduates.php">Egresados</a></li>
            <li><span><img src="../images/Admision.png" alt=""></span><a href="../php/inf-admission.php">Admisión</a></li>
            <li><span><img src="../images/noticia.png" alt=""></span><a href="../php/noticias.php">Noticias</a></li>
        </ul>
    </div>
    <script src="../JS/burger-bar.js"></script>

    <div class="alerts">
        <?php
        //Importanción de las librerias de PHPMailer.  
        require('../php/connection.php');
        require '../PHPMailer/PHPMailer.php';
        require '../PHPMailer/Exception.php';
        require '../PHPMailer/SMTP.php';

        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;

        //Si en la variable $_SESSION no hay un token de acceso quiere decir que no tiene iniciado la sesión con google, Por lo tanto pide un inicio de sesión para continuar.
        /* if(!isset($_SESSION['access_token'])){
                echo '<div class="no_session"><script>document.write("POR FAVOR INICIE SESIÓN PARA CONTINUAR");</script></div>';
                echo '<a id="init_session" href="./changeAccount.php">HAGA CLICK AQUI PARA INICIAR SESIÓN</a>';
                die();
            }else{

                echo '<div class="no_access">
                    <script>
                        document.write("¡LAS INSCRIPCIONES ESTAN CERRADAS!");
                    </script>
                <div>
                ';
                die();//Despues de imprimir las advertencias con esta función no se ejecutara nada de lo que este debajo de esta función.
                //Aqui es donde s ecorta la pagina web. Esta función no permite la ejecucion del codigo que este debajo de esta.
                
            } */

        //Determina si se ha pronado el boton de enviar.
        if (isset($_POST['submit'])) {

            //Recoleción de datos de los inputs
            $Name = $_POST['name'];
            $lastName = $_POST['last-name'];
            $age = $_POST['age'];
            $tel = $_POST['tel'];
            $gmail = $_POST['email'];
            $centro_procedencia = $_POST['centro_procedencia'];
            $provincia_residencia = $_POST['provincia_residencia'];
            $count_matter = $_POST['count-matter'];
            $test_matter = $_POST['test-matter'];
            $career = $_POST['career'];
            //Verifica si la edad introducida es igual a dos digitos. (Esta función no esta del todo completa)
            if (strlen($_POST['age']) < 3 and strlen($_POST['age']) > 1) {
                $age = $_POST['age'];
            } else {
                echo
                '
                        <script>
                    
                            alerta = document.querySelector(".alerts");
                            alerta.classList.add("alert-failure");
                        
                            if(alerta.className = "alert-failure"){
                                alerta.style.transition = "all 600ms";
                                alerta.style.top = "0px"
                                document.write("La Edad Esta Incorrecta");
                                setInverval(() => {
                                    alerta.style.transition = "all 300ms";
                                    alerta.style.top = "-50px"
                                    alerta.style.visibility = "hidden";
                                }, 6000);
                            }   
                        
                        </script>
                    ';
            }

            //Crear un objeto PHPMailer para acceder a sus metodos y propiedades
            $mail = new PHPMailer(true);

            try {
                //Configurar el servidor SMTP
                $mail->isSMTP();
                $mail->SMTPDebug = 0;  // 0 para no mostrar mensajes de depuración, 2 para monstar
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'alexandergomez41005@gmail.com'; // la direccion de correo electrónico de Gmail
                $mail->Password = 'rnzocuypkiowfmgq'; // La contraseña de la cuenta Gmail
                $mail->SMTPSecure = "tls";
                $mail->Port = 587; // El puerto SMTP de Gmail

                //Configurar el remitente y el destinatario
                $mail->setFrom('alexandergomez41005@gmail.com', 'Politécnico Máximo Gómez');
                $mail->addAddress('alexandergomez41005@gmail.com', $Name);

                //Configurar el asunto y el cuerpo del correo
                $mail->isHTML(true);
                $mail->CharSet = 'UTF-8';
                $mail->Subject = 'Nueva Solicitud de Admision de ' . $Name . " " . $lastName;
                $mail->Body = "
                    <div style=' font-family: sans-serif; color: rgb(59, 59, 59); box-sizing: border-box; padding: 20px; border-radius: 5px; background-color: rgb(245, 245, 245); '>
                        <div style='display: flex; flex-flow: column;'>
                            <h3 style='font-weight: 600;' >Nombre(s) :</h3><h3 style='font-weight: 100;'> $Name</h3>
                        </div>    
                        <div style='display: flex;'>
                            <h3 style='font-weight: 600;' >Apellido(s) :</h3><h3 style='font-weight: 100;'> $lastName</h3>
                        </div> 
                        <div style='display: flex;'>
                            <h3 style='font-weight: 600;' >Edad :</h3><h3 style='font-weight: 100;'> $age</h3>
                        </div>
                        <div style='display: flex;'>
                            <h3 style='font-weight: 600;' >Numero Telefonico del Estudiante :</h3><h3 style='font-weight: 100;'> $tel</h3>
                        </div>
                        <div style='display: flex;'>
                            <h3 style='font-weight: 600;' >Correo Electronico del Estudiante :</h3><h3 style='font-weight: 100;'> $gmail</h3>
                        </div>
                        <div style='display: flex;'>
                            <h3 style='font-weight: 600;' >Centro Procediente :</h3><h3 style='font-weight: 100;'> $centro_procedencia</h3>
                        </div>
                        <div style='display: flex;'>
                            <h3 style='font-weight: 600;' >Provincia de Residencia del Estudiante :</h3><h3 style='font-weight: 100;'> $provincia_residencia</h3>
                        </div>
                        <div style='display: flex;'>
                            <h3 style='font-weight: 600;' >Promedio de la suma de las calificaciones de primero y segundo de secundaria (de 80 hasta 100) :</h3>
                            <h3 style='font-weight: 100;'> $count_matter</h3>
                        </div>
                        <div style='display: flex;'>
                            // <h  3 style='font-weight: 600;' >¿Has examinado materias en completivo, extraordinario o pendiente? :</h3><h3 style='font-weight: 100;'> $test_matter</h3>
                        </div>
                        <div style='display: flex;'>
                            <h3 style='font-weight: 600;' >Carrera Seleccionada :</h3><h3 style='font-weight: 100;'> $career</h3>
                        </div>

                    </div>";

                //Adjuntar la imagen
                $name_imagen = $_FILES['imagen']['name'];
                $tipo_imagen = $_FILES['imagen']['type'];
                $imagen = $_FILES['imagen']['tmp_name'];
                if (!((strpos($tipo_imagen, 'jpg') || strpos($tipo_imagen, 'jpeg') || strpos($tipo_imagen,      'png') || strpos($tipo_imagen, 'webp') || strpos($tipo_imagen, 'pdf')))) { //Define las extenciones  de archivos compatibles para el envio
                    echo '
                            <script>

                                alerta = document.querySelector(".alerts");
                                alerta.classList.add("alert-failure");

                                if(alerta.className = "alert-failure"){
                                    alerta.style.transition = "all 600ms";
                                    alerta.style.top = "0px"
                                    document.write("La extención de la imágen no es valida, por favor suba una imágen compatible con (.JPG), (.JPEG), (.PNG), (.WEBP).");
                                    setInterval(() => {
                                        alerta.style.transition = "all 300ms";
                                        alerta.style.top = "-50px"
                                        alerta.style.visibility = "hidden";
                                    }, 6000);
                                }
                            </script>
                            ';
                    die();
                } else {
                    $mail->addAttachment($imagen, $name_imagen); //Agrega la imagen al objecto

                    $query2 = "SELECT * FROM admision WHERE gmail_estudiante='$gmail'";
                    $validacion = mysqli_query($connection, $query2);
                    // Verifica si existe una solicitud de admisión con el mismo correo electronico. Si hay rechaza la solicitud actual y se lo informa al usuario. De lo contrario envia la solicitud
                    if (mysqli_num_rows($validacion) > 0) {
                        echo '
                            <script>

                                alerta = document.querySelector(".alerts");
                                alerta.classList.add("alert-failure");

                                if(alerta.className = "alert-failure"){
                                    alerta.style.transition = "all 600ms";
                                    alerta.style.top = "0px"
                                    document.write("Ya existe esta solicitud. Cambie de cuenta de Google para hacer otra solicitud");
                                    setInterval(() => {
                                        alerta.style.transition = "all 300ms";
                                        alerta.style.top = "-50px"
                                        alerta.style.visibility = "hidden";
                                    }, 9000);
                                }
                            </script>
                            ';
                    } else {
                        echo '
                            <script>
    
                                alerta = document.querySelector(".alerts");
                                alerta.classList.add("alert-success");
    
                                if(alerta.className = "alert-success"){
                                    alerta.style.transition = "all 600ms";
                                    alerta.style.top = "0px"
                                    document.write("La Solicitud Se Ha Enviado Correctamente");
                                    setInterval(() => {
                                        alerta.style.transition = "all 300ms";
                                        alerta.style.top = "-50px"
                                        alerta.style.visibility = "hidden";
                                    }, 3000);
                                }
                            </script>
                            ';
                        $mail->send(); //Envia el correo al gmail del centro

                        $query = "INSERT INTO admision(nombre, apellidos, edad, tel_estudiante, gmail_estudiante, centro_procedencia, provincia_residencia, promedio, exam_materias, carrera_seleccionada) VALUES('$Name','$lastName','$age','$tel','$gmail','$centro_procedencia','$provincia_residencia','$count_matter','$test_matter','$career')";

                        $resultado = mysqli_query($connection, $query);
                    }
                }
            } catch (Exception $e) {
                echo
                '
                        <script>
                            alerta = document.querySelector(".alerts");
                            alerta.classList.add("alert-failure");

                            if(alerta.className = "alert-failure"){
                                alerta.style.transition = "all 600ms";
                                alerta.style.top = "0px" 
                                document.write("Ha Ocurrido Un Error");
                                setInterval(() => {
                                    alerta.style.transition = "all 300ms";
                                    alerta.style.top = "-50px"
                                    alerta.style.visibility = "hidden";
                                }, 3000);
                            }
                        </script>
                    ';
                echo " " . $mail->ErrorInfo; //Si da un error, Imprime el error
                die();
            }
        }

        ?>
    </div>

    <div class="all">
        <main>
            <div class="container-main">
                <div class="title-header title-header-main">
                    <h1>Solicitud de Admisión</h1>
                    <div class="line"></div>
                </div>
            </div>

            <form method="post" enctype="multipart/form-data">
                <div class="personal-date">
                    <div class="title-header">
                        <h1>Datos Personales del Estudiante</h1>
                        <div class="line"></div>
                    </div>
                    <div class="form-personal_date forms">
                        <h1 id="titulo"></h1>
                        <p id="nota"></p>
                        <form id="formulario">
                            <div id="contenedor-input"></div>
                            <div id="contenedor-radio" style="display: none;"></div>
                            <div id="contenedor-file" style="display: none;"></div>
                            <div id="contenedor-radio-carrera" style="display: none;"></div>
                        </form>
                        <div>
                            <button type="button" id="atras" style="display: none;">Atrás</button>
                            <button type="button" id="continuar">Continuar</button>
                        </div>
                    </div>
                    <!-- <div class="form-personal_date forms">
                        <div class="container-colleft">
                            <label id="label" for="Name">Nombre(s)</label>
                            <input type="text" name="name" id="Name" placeholder="Nombre(s) del estudiante" required>

                            <label id="label" for="last-name">Apellido(s)</label>
                            <input type="text" name="last-name" id="last-name" placeholder="Apellidos(s) del estudiante" required>

                            <label id="label" for="age">Edad</label>
                            <input type="number" name="age" id="age" placeholder="Edad del estudiante" required>

                            <label id="label" for="tel">Numero Teléfonico</label>
                            <input type="text" name="tel" id="tel" placeholder="Numero Teléfonico del estudiante" required>

                            <label id="label" for="email">Correo electrónico</label>
                            <input type="gmail" value="<?php echo $_SESSION['user_email_address'] ?>" name="email" id="email" placeholder="Correo electrónico del estudiante" readonly required>
                            <a id="changeAccount" href='./changeAccount.php'>Cambiar de Cuenta</a>


                            <label id="label" for="centro_procedencia">Centro Educativo</label>
                            <input type="text" name="centro_procedencia" id="centro_procedencia" placeholder="Centro educativo de procedencia" required>

                            <label id="label" for="provincia_residencia">Provincia de Residencia</label>
                            <input type="text" name="provincia_residencia" id="provincia_residencia" placeholder="Provincia de residencia del estudiante" required>

                            <label id="label" for="count-matter">Promedio de la suma de las calificaciones de primero y segundo <br> de secundaria (de 80 hasta 100)</label>
                            <input type="number" name="count-matter" id="count-matter" placeholder="Promedio" required>

                            <label id="label" for="test-matter">¿Has examinado materias en completivo, extraordinario o pendiente?</label>
                            <div>
                                <input type="radio" name="test-matter" value="Si" id="yes-test">
                                <label id="label" for="yes-test">Si</label>
                            </div>
                            <div class="not-test">
                                <input type="radio" name="test-matter" value="No" id="not-test" required>
                                <label id="label" for="not-test">No<label>
                            </div>
                            <br>
                            <label for="record-notes">Carga aquí tu récord de calificaciones de 1ro, 2do y las acumuladas <br> de 3ro de secundaria (P1 y P2) firmado y sellado
                                por el distrito <br> y el centro educativo.</label>
                            <input type="file" name="imagen" id="record-notes" required>
                        </div>
                    </div> -->
                </div>

                <!-- <div class="technical-careers forms">
                    <div class="title-header title-career">
                        <h1>Carrera Técnica</h1>
                        <div class="line"></div>
                    </div>
                    <div class="form-career">
                        <div>
                            <input type="radio" name="career" value="Industrias Alimentarias" id="food-industries">
                            <label id="label" for="food-industries">Industrias Alimentarias</label><br>
                        </div>
                        <div>
                            <input type="radio" name="career" value="Informatica" id="software-career" required>
                            <label id="label" for="software-career">Desarrollo y Administración de Sistemas Informáticos</label><br>
                        </div>
                        <div>
                            <input type="radio" name="career" value="Comercio y Mercadeo" id="marketing-career">
                            <label id="label" for="marketing-career">Comercio y Mercadeo</label>
                        </div>
                        <div>
                            <input type="radio" name="career" value="Contabilidad" id="tax-management">
                            <label id="label" for="tax-management">Gestión Administrativa y Tributaria</label><br>
                        </div>
                    </div>
                </div>

                <div class="btn-upload">
                    <button onclick="alert('Estas seguros de los datos proporcionados?')" name="submit" id="btn">Enviar Solicitud</button>
                </div> -->
            </form>
        </main>
    </div>

    <script type="text/javascript">
        //Este bloque permite eliminar un bug con la posición del menu cuando scrolleas hacia abajo, su función se describe de la siguiente manera: se guarda cada objecto HTML en una variable, entonces header.classList.toggle("header-secundary-active", window.scrollY >= 90) se traduce a: el elemento HTML header quiero q accedas a su atributo class y que intercambies una clase si el usuario scrollea 90 pixeles en el EJE-Y y le añade la clase o se la elimina dependiendo si cumple la condición.
        window.addEventListener("scroll", function() {
            var short_menu = document.querySelector(".container-short_menu")
            var header = document.querySelector(".header-secundary")
            var title = document.querySelector(".title-header-main")
            header.classList.toggle("header-secundary-active", window.scrollY >= 90)
            title.classList.toggle("title-main-active", window.scrollY >= 90)
            short_menu.classList.toggle("short_menu-active", window.scrollY >= 90)
        })
    </script>
    <script src="../JS/Questions.js"></script>
</body>

</html>