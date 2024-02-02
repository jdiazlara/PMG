<?php
    include('../php/config.php'); // Se importa el archivo de configuracion con las credenciales para conectarse a https://console.cloud.google.com
    error_reporting(0);

    $login_button = ''; 

    if (isset($_GET["code"])) { // Verifica si hay un codigo de Acceso de OAuth.

        $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]); // Se recolecta este token de acceso.
        if (!isset($token['error'])) {

            $google_client->setAccessToken($token['access_token']);

            $_SESSION['access_token'] = $token['access_token']; // Se crea una variable de sesion para acceder al token desde cualquier parte del portal web PMG

            $google_service = new Google_Service_Oauth2($google_client);// Crea el servicio de OAuth con las credenciales del Cliente.

            $data = $google_service->userinfo->get();//Se obtiene las informaciones personales de las cuentas de google.
            
            
            // Se recolecta cada dato relevante y se guarda en una variable de sesion para poder utilizada en todo el portal web PMG
            if (!empty($data['given_name'])) {
                $_SESSION['user_first_name'] = $data['given_name'];
            }

            if (!empty($data['family_name'])) {
                $_SESSION['user_last_name'] = $data['family_name'];
            }

            if (!empty($data['email'])) {
                $_SESSION['user_email_address'] = $data['email'];
            }

            if (!empty($data['gender'])) {
                $_SESSION['user_gender'] = $data['gender'];
            }

            if (!empty($data['picture'])) {
                $_SESSION['user_image'] = $data['picture'];
            }
            
            echo "<script>
                const userInfoPHP = ['". $data['given_name'] ."','". $data['email'] ."', '". $data['picture'] ."'];
                localStorage.setItem('userInfo', JSON.stringify(userInfoPHP));
            </script>";

        }
    }   

    //Ancla para iniciar sesión
    if (!isset($_SESSION['access_token'])) {
        $login_button = '<a href="' . $google_client->createAuthUrl() . '" style=" background: #dd4b39; border-radius: 5px; color: white; display: block; font-weight: bold; padding: 20px; text-align: center; text-decoration: none; width: 300px;">Iniciar Sesión con Google</a>';
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PMG - Iniciar Sesión</title>
    <link rel="shortcut icon" href="../images/Logo.avif" type="image/x-icon">
    <link rel="stylesheet" href="../style/style-header.css">
    <link rel="stylesheet" href="../style/style-login.css">

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
                <li class="li li_icon-profile"><a href="../php/login_google.php"><div><span class="icon-profile"><?php if ($_SESSION['user_image'] == '') { echo '<script> document.write("Iniciar Sesión"); </script>'; } else{ echo '<img src="' . $_SESSION['user_image'] . '" class="rounded-circle container" alt="">'; } ?> </span></div></a></li>
                <li><span class="material-icons-outlined"><img src="../images/home.png" alt=""></span><a href="../index.php">Inicio</a></li>
                <li><span><img src="../images/sobreNosotros.png" alt=""></span><a href="../php/about_us.php">Sobre Nosotros</a></li>
                <li><span><img src="../images/docentes.png" alt=""></span><a href="../php/Docentes.php">Docentes</a></li>
                <li><span><img src="../images/egresados.png" alt=""></span><a href="../php/graduates.php">Egresados</a></li>
                <li><span><img src="../images/Admision.png" alt=""></span><a href="../php/inf-admission.php">Admisión</a></li>
                <li><span><img src="../images/noticia.png" alt=""></span><a href="../php/noticias.php">Noticias</a></li>
            </ul>
        </div>
    <div class="all">
        <div class="container-session">
            <div class="profile">
            <div class="g_id_signin" data-type="standard" data-size="large" data-theme="outline" data-text="sign_in_with" data-shape="rectangular" data-logo_alignment="left"></div>
                <?php
                    if ($login_button == '') {
                            echo '<div class="card-header">Tu Perfil</div><div class="card-body"> <hr>';
                            echo '<img src="'.$_SESSION["user_image"].'" class="rounded-circle container" id="userImg"/>';                        
                            echo '<h3>Nombre: ' . $_SESSION['user_first_name'] . '</h3>';
                            echo '<h3>Email: ' . $_SESSION['user_email_address'] . '</h3>';
                            echo '<h3><a id="logout" href="logout.php">Cerrar Sessión</h3></div>';
                        } else {
                            echo '<div class="btn-login" align="center">' . $login_button . '</div>';
                        }
                    ?>
                </div>
                <script>
                    const userInfoData = JSON.parse(localStorage.getItem('userInfo'));
                    const userImg = document.getElementById('userImg');
                    userImg.src = userInfoData[2];
                </script>
            </div>
        </div>
    </div>
    <script src="../JS/burger-bar.js"></script>
</body>
</html>