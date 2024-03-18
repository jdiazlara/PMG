<?php
    session_start();
    if($_SERVER["REQUEST_METHOD"] == "POST") {
      $correo = trim($_POST['correo']);
      include "./log.php";
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <?php
      if (isset($_SESSION['access_token'])) {
        echo '<title>PMG - Perfil</title>';
      } else {
        echo '<title>PMG - Inicio de sesión</title>';
      }
    ?>


    <link rel="shortcut icon" href="../images/Logo.avif" type="image/x-icon">
    <link rel="stylesheet" href="../style/style-header.css">
    <link rel="stylesheet" href="../style/style-login.css">
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


            <!-- alertas de botones ya sea de error o de subida !-->
          <?php if (isset($_SESSION['mensaje'])) { if ($_SESSION['mensaje'] !== '')  {
            include "./alerta.php";

            $_SESSION['mensaje'] = '';
          } }?>


    <div class="all">

                  <?php
                    if (isset($_SESSION['access_token'])) {
                      ?>

                          <div class="profile">
                              <h1 class="profile-title">Tu perfil</h1>
                            <div class="profile-section">
                                <div class="profile-image">
                                    <img src="<?php echo $_SESSION["user_image"]; ?>" alt="Perfil del usuario">
                                </div>
                                <div class="profile-details">
                                    <div class="profile-info">
                                        
                                        <p><label>Nombre:</label><?php echo $_SESSION['user_first_name']; ?></p>
                                    </div>
                                    <div class="profile-info">
                                        
                                        <p><label>Correo:</label><?php echo $_SESSION['user_email_address']; ?></p>
                                    </div>
                                    <a href="logout.php" class="logout-link">Cerrar Sesión</a>
                                  </div>
                            </div>
                          </div>



                    <?php
                          } else {
                            ?> 
                            
                            <div class="login-container">
                      <h2>Inicio de sesión</h2>
                      <p>Inicie sesión para continuar descubriendo</p>
                      
                      <form id="login__form" action="" method="POST">
                          <div class="input__container">
                              <div class="input__box">
                                <input type="text" name="correo" class="input" value="<?php if (isset($correo)) echo $correo; else if (isset($_GET['correo'])) echo $_GET['correo'] ?>" id="correo" autocomplete="email">
                                <label for="correo" class="<?php if (isset($correo) or isset($_GET['correo'])) echo "input__label--active"; ?>">Correo electrónico</label>
                              </div>
                            <span class="input__error" style="display:none"><svg aria-hidden="true" class="stUf5b qpSchb" fill="currentColor" focusable="false" width="16px" height="16px" viewBox="0 0 24 24" xmlns="https://www.w3.org/2000/svg"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"></path></svg> <p>asasa</p></span>
                          </div>      

                          <div class="input__container">
                            <div class="input__box">
                              <input type="password" name="contraseña" id="contraseña" class="input" autocomplete="current-password">
                              <label for="password">Contraseña</label>
                                <img class="PassEyes" style="display: none" src="../images/iconos/i_eye.svg" alt="" srcset="" onClick="this.style.display = 'none'; this.nextElementSibling.style.display = 'block'; document.getElementById('contraseña').type = 'password'" />
                                <img class="PassEyes" src="../images/iconos/v_eye.svg" alt="" srcset="" onCLick="this.style.display = 'none'; this.previousElementSibling.style.display = 'block'; document.getElementById('contraseña').type = 'text'" />
                            </div>
                            <span class="input__error" style="display:none"><svg aria-hidden="true" class="stUf5b qpSchb" fill="currentColor" focusable="false" width="16px" height="16px" viewBox="0 0 24 24" xmlns="https://www.w3.org/2000/svg"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"></path></svg> <p>asasa</p></span>
                          </div>
                          
                          <button type="button" id="subir" class="submit_btn">
                            Iniciar sesión
                          </button>
                      </form>

                      <div class="register-link">
                          <p>¿No tiene una cuenta? <a href="./registro.php"><b>Regístrese</b></a></p>
                      </div>
                  </div>
                            
                            <?php
                        }
                        ?>


                </div>
                <!-- <script>
                    const userInfoData = JSON.parse(localStorage.getItem('userInfo'));
                    const userImg = document.getElementById('userImg');
                    userImg.src = userInfoData[2];
                </script> -->

    </div>

    <script src="../JS/label.js"></script>
    <script src="../JS/burger-bar.js"></script>
    <script src="../JS/validation.js"></script>
    <script>
            if (document.querySelector('.login-container')) {
              InitilizeValidate("login__form", "subir",  {
                 correo: ["required|mail", 'alfanumerico', ['@','.','-']],
                 contraseña: ["required", 'alfanumerico', ['all']]
             }, false)
            }
    </script>
</body>
</html>