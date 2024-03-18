<?php
    session_start();
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        include('./connection.php'); //Importa la conexion de la base de datos

        $nombre = ucwords(trim($_POST['nombre']));
        $apellido = ucwords(trim($_POST['apellido']));
        $cedula = trim($_POST['cedula']);  
        $correo = trim($_POST['correo']);  

        $numCed = intval(mysqli_fetch_assoc(mysqli_query($connection, 'SELECT count(registro.id_usuario) as num FROM registro WHERE registro.documento_identidad = "'.$cedula.'";'))['num']);
        $numCor = intval(mysqli_fetch_assoc(mysqli_query($connection, 'SELECT count(login.id_usuario) as num FROM login WHERE login.correo = "'.$correo.'";'))['num']);

        if ($numCed > 0) {
          $_SESSION['mensaje'] = '¡Ups! La cédula registrada ya existe, si ya tiene una cuenta inicie sesión';
          $_SESSION['tipo'] = 'danger';
        } else if ($numCor > 0) {
          $_SESSION['mensaje'] = '¡Ups! Ya existe un usuario con ese correo electrónico, si ya tiene una cuenta inicie sesión';
          $_SESSION['tipo'] = 'danger';
        }
        else {
          include "./reg.php";     
        }

    }
    if (isset($_SESSION['access_token'])) {
      header("location:" . "./login.php");
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PMG - Registro</title>
    <link rel="shortcut icon" href="../images/Logo.avif" type="image/x-icon">
    <link rel="stylesheet" href="../style/style-header.css">
    <link rel="stylesheet" href="../style/style-registro.css">
    <link rel="stylesheet" href="../style/style-Inputs.css">
    <link rel="stylesheet" href="../style/valid.css">
    <link rel="stylesheet" href="../style/alert.css">

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
                                        if (ISSET($_SESSION['user_image'])) {

                                          if ($_SESSION['user_image'] == '') {
                                              echo '<script>
                                                  document.write("Iniciar Sesión");
                                              </script>';
                                          }
                                          else{
                                              echo '<img src="' . $_SESSION['user_image'] . '" class="rounded-circle container" alt="">';
                                          }
                                        } else {
                                          echo '<script>
                                                  document.write("Iniciar Sesión");
                                              </script>';
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
                <li class="li li_icon-profile"><a href="../php/login.php"><div><span class="icon-profile"><?php if ($_SESSION['user_image']) { echo '<script> document.write("Iniciar Sesión"); </script>'; } else{ echo '<img src="' . $_SESSION['user_image'] . '" class="rounded-circle container" alt="">'; } ?> </span></div></a></li>
                <li><span class="material-icons-outlined"><img src="../images/home.png" alt=""></span><a href="../index.php">Inicio</a></li>
                <li><span><img src="../images/sobreNosotros.png" alt=""></span><a href="../php/about_us.php">Sobre Nosotros</a></li>
                <li><span><img src="../images/docentes.png" alt=""></span><a href="../php/Docentes.php">Docentes</a></li>
                <li><span><img src="../images/egresados.png" alt=""></span><a href="../php/graduates.php">Egresados</a></li>
                <li><span><img src="../images/Admision.png" alt=""></span><a href="../php/inf-admission.php">Admisión</a></li>
                <li><span><img src="../images/noticia.png" alt=""></span><a href="../php/noticias.php">Noticias</a></li>
            </ul>
        </div>


        <?php if (isset($_SESSION['mensaje'])) { if ($_SESSION['mensaje'] !== '')  {
            include "./alerta.php";

            $_SESSION['mensaje'] = '';
          } }?>
    <div class="all">
      
        <div class="container">
  
        <h2>Registro</h2>
        <form id="registroForm" action="" method="POST" enctype="multipart/form-data">
    
    <div class="input__container">
       <div class="flex">
            <div class="input__picture__box">
              <span for="picture" class="picture__label">Foto de perfil (Opcional)</span>
              <input type="file" name="picture" class="input" id="picture">
            </div>
            <div style="flex-grow: 1; width: 100%; max-width: 40px">
                <img class="preview" style="display: none"/>
            </div>
        </div>
      <span class="input__error" style="display:none"><svg aria-hidden="true" class="stUf5b qpSchb" fill="currentColor" focusable="false" width="16px" height="16px" viewBox="0 0 24 24" xmlns="https://www.w3.org/2000/svg"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"></path></svg> <p></p></span>
    </div>

    <div class="input__container">
      <div class="input__box">
        <input type="text" name="nombre" value="<?php if (isset($nombre)) echo $nombre; ?>" class="input" id="nombre" autocomplete="on" required>
        <label for="nombre" class="input__label <?php if (isset($nombre)) echo "input__label--active"; ?>">Nombre completo del tutor</label>
      </div>
      <span class="input__error" style="display:none"><svg aria-hidden="true" class="stUf5b qpSchb" fill="currentColor" focusable="false" width="16px" height="16px" viewBox="0 0 24 24" xmlns="https://www.w3.org/2000/svg"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"></path></svg> <p></p></span>
    </div>

    <div class="input__container">
      <div class="input__box">
        <input type="text" name="apellido" value="<?php if (isset($apellido)) echo $apellido; ?>" class="input" id="apellido" autocomplete="on" required>
        <label for="apellido" class="input__label <?php if (isset($apellido)) echo "input__label--active"; ?>">Apellido completo del tutor</label>
      </div>
      <span class="input__error" style="display:none"><svg aria-hidden="true" class="stUf5b qpSchb" fill="currentColor" focusable="false" width="16px" height="16px" viewBox="0 0 24 24" xmlns="https://www.w3.org/2000/svg"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"></path></svg> <p></p></span>
    </div>

    <div class="input__container">
      <div class="input__box">
        <input type="number" name="cedula" maxlength="11" value="<?php if (isset($cedula)) echo $cedula; ?>" class="input" id="cedula" autocomplete="off" required>
        <label for="documento" class="input__label <?php if (isset($cedula)) echo "input__label--active"; ?>">Número de cédula del tutor</label>
      </div>
      <span class="input__error" style="display:none"><svg aria-hidden="true" class="stUf5b qpSchb" fill="currentColor" focusable="false" width="16px" height="16px" viewBox="0 0 24 24" xmlns="https://www.w3.org/2000/svg"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"></path></svg> <p></p></span>
    </div>
    
    <div class="input__container">
      <div style="margin-bottom: 2px" class="input__box">
        <input type="email" name="correo" value="<?php if (isset($correo)) echo $correo; ?>" class="input" id="correo" autocomplete="email" required>
        <label for="correo" class="input__label <?php if (isset($correo)) echo "input__label--active"; ?>">Correo electrónico de Google</label>
      </div>
      <span class="input__error" style="display:none"><svg aria-hidden="true" class="stUf5b qpSchb" fill="currentColor" focusable="false" width="16px" height="16px" viewBox="0 0 24 24" xmlns="https://www.w3.org/2000/svg"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"></path></svg> <p></p></span>
      <p class="gmail__info">¿No tiene una cuenta de Gmail? <a target="_blank" href="https://www.google.com/intl/es/account/about/">Creela aquí</a></p>
    </div>
    
    <div class="input__container">
      <div class="input__box">
        <input type="password" name="contraseña" class="input" id="contraseña" autocomplete="new-password" required>
        <label for="contrasena" class="input__label">Contraseña</label>
          <img class="PassEyes" style="display: none" src="../images/iconos/i_eye.svg" alt="" srcset="" onClick="this.style.display = 'none'; this.nextElementSibling.style.display = 'block'; document.getElementById('contraseña').type = 'password'" />
          <img class="PassEyes" src="../images/iconos/v_eye.svg" alt="" srcset="" onCLick="this.style.display = 'none'; this.previousElementSibling.style.display = 'block'; document.getElementById('contraseña').type = 'text'" />
      </div>
      <span class="input__error" style="display:none"><svg aria-hidden="true" class="stUf5b qpSchb" fill="currentColor" focusable="false" width="16px" height="16px" viewBox="0 0 24 24" xmlns="https://www.w3.org/2000/svg"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"></path></svg> <p></p></span>
    </div>

    <!-- 1 -->
    <div class="input__container">
      <div class="input__box">
        <input type="password" name="confirmacion" class="input" id="confirmacion" autocomplete="new-password" required>
        <label for="contrasena" class="input__label">Confirme la contraseña</label>
          <img class="PassEyes" style="display: none" src="../images/iconos/i_eye.svg" alt="" srcset="" onClick="this.style.display = 'none'; this.nextElementSibling.style.display = 'block'; document.getElementById('confirmacion').type = 'password'" />
          <img class="PassEyes" src="../images/iconos/v_eye.svg" alt="" srcset="" onCLick="this.style.display = 'none'; this.previousElementSibling.style.display = 'block'; document.getElementById('confirmacion').type = 'text'" />
      </div>
      <span class="input__error" style="display:none"><svg aria-hidden="true" class="stUf5b qpSchb" fill="currentColor" focusable="false" width="16px" height="16px" viewBox="0 0 24 24" xmlns="https://www.w3.org/2000/svg"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"></path></svg> <p></p></span>
    </div>
    
    <div class="check__container">
      <div class="check">
        <input type="checkbox" name="confirm" id="confirm">
        <p>Acepto y he leído las <a href="./privacy_policies.php">Políticas de privacidad</a></p>
      </div>
      <span class="input__error" style="display:none"><svg aria-hidden="true" class="stUf5b qpSchb" fill="currentColor" focusable="false" width="16px" height="16px" viewBox="0 0 24 24" xmlns="https://www.w3.org/2000/svg"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"></path></svg> <p>Debe aceptar los términos y condiciones</p></span>
    </div>

    <button type="button" id="registro" class="btn submit_btn">Registrarse</button>
  </form>
</div>
    </div>


    <script src="../JS/label.js"></script>
    <script src="../JS/burger-bar.js"></script>
    <script src="../JS/validation.js"></script>
    <script>
        InitilizeValidate("registroForm", "registro",  {
            picture: ["picture","picture",['']],
            nombre: ["required|min:3|max:25","alfabetico",[' ']],
            apellido: ["required|min:3|max:25", "alfabetico",[' ']],
            cedula: ["required|cedula", "numerico",['']],
            correo: ["required|mail|login", 'alfanumerico', ['@','.','-']],
            contraseña: ["required|min:8|max:40|login", 'alfanumerico', 'none'],

            // 2
            confirmacion: ["required|conf", 'alfanumerico', 'none']
        }, true)
    </script>
</body>
</html>