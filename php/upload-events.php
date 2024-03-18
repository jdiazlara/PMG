<?php
include('../php/connection.php');
$query = "SELECT * FROM noticias";
$resultado = mysqli_query($connection, $query);
session_start();
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PMG - Noticias</title>
  <link rel="stylesheet" href="../style/style-manage_events.css">
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
              <a href="../index.php">
                <img src="../images/Logo.avif" alt="" srcset="" />
              </a>
            </div>
          </div>
        </li>
        <li class="li">
          <a href="../index.php">
            <div>
              <span class="material-icons-outlined">
                <img src="../images/home.png" alt="" />
              </span>
              <h1>Inicio</h1>
            </div>
          </a>
        </li>
        <li class="li">
          <a href="../php/about_us.php">
            <div>
              <span>
                <img src="../images/sobreNosotros.png" alt="" />
              </span>
              <h1>Sobre Nosotros</h1>
            </div>
          </a>
        </li>
        <li class="li">
          <a href="../php/Docentes.php">
            <div>
              <span>
                <img src="../images/docentes.png" alt="" />
              </span>
              <h1>Docentes</h1>
            </div>
          </a>
        </li>
        <li class="li">
          <a href="../php/graduates.php">
            <div>
              <span>
                <img src="../images/egresados.png" alt="" />
              </span>
              <h1>Egresados</h1>
            </div>
          </a>
        </li>
        <li class="li">
          <a href="../php/inf-admission.php">
            <div>
              <span>
                <img src="../images/Admision.png" alt="" />
              </span>
              <h1>Admisión</h1>
            </div>
          </a>
        </li>
        <li class="li">
          <a href="../php/noticias.php">
            <div>
              <span>
                <img src="../images/noticia.png" alt="" />
              </span>
              <h1>Noticias</h1>
            </div>
          </a>
        </li>
        <li class="li">
          <a href="../php/login.php">
            <div>
              <span class="icon-profile">
                <?php

                if ($_SESSION['user_image'] == '') {
                  echo '<script>
                                    document.write("Iniciar Sesión");
                                </script>';
                } else {
                  echo '<img src="' . $_SESSION['user_image'] . '" class="rounded-circle container" alt="">';
                }
                ?>
                <!--<img src="<d?php echo $_SESSION['user_image']?>" class="rounded-circle container" alt="">-->
              </span>
            </div>
          </a>
        </li>
        <li class="bar">
          <div>
            <img src="../images/burger-bar.png" alt="" />
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
      <li><span><img src="../images/sobreNosotros.png" alt=""></span><a href="../php/about_us.php">Sobre Nosotros</a>
      </li>
      <li><span><img src="../images/docentes.png" alt=""></span><a href="../php/Docentes.php">Docentes</a></li>
      <li><span><img src="../images/egresados.png" alt=""></span><a href="../php/graduates.php">Egresados</a></li>
      <li><span><img src="../images/Admision.png" alt=""></span><a href="../php/inf-admission.php">Admisión</a></li>
      <li><span><img src="../images/noticia.png" alt=""></span><a href="../php/noticias.php">Noticias</a></li>
    </ul>
  </div>
  <?php

  if (!isset($_SESSION['access_token'])) {
    echo '<div class="no_session"><script>document.write("POR FAVOR INICIE SESIÓN PARA CONTINUAR");</script></div>';
    echo '<a id="init_session" href="./changeAccount.php">HAGA CLICK AQUI PARA INICIAR SESIÓN</a>';
    die();
  } else {
    if (isset($_SESSION['user_email_address'])) {
      if ($_SESSION['user_email_address'] == "alexandergomez41005@gmail.com" || $_SESSION['user_email_address'] == "pmaximogomez2000@gmail.com" || $_SESSION['user_email_address'] == "RATAk1@gmail.com") {

      } else {
        echo '<div class="no_access">
              <script>
                document.write("¡USTED NO TIENE ACCESO A ESTE PANEL!");
              </script>
            <div>
            ';
        die();
      }
    }
  }
  ?>
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <div class="title-events">
          <h1 class="text-primary">Subir Imagen</h1>
        </div>
        <form action="subir.php" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label id="form-group__label-file" for="my-input">Seleccione una Imagen</label>
            <input id="my-input" type="file" name="imagen" class="select-file">
          </div>
          <div class="form-group">
            <label for="my-input">Titulo de la Imagen</label>
            <input id="my-input" class="form-control" type="text" name="titulo">
            <label id="form-group__label-desc" for="my-input">Descripción</label>
            <textarea id="my-input" class="form-control" type="text" name="texto"></textarea>
          </div>
          <!-- alertas de botones ya sea de error o de subida !-->
          <?php if (isset($_SESSION['mensaje'])) { ?>
            <div class="alert alert-<?php echo $_SESSION['tipo'] ?> alert-dismissible fade show" role="alert">
              <strong>
                <?php echo $_SESSION['mensaje']; ?>
              </strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?php 
          } ?>
          <input type="submit" value="Guardar" class="btn btn-primary" name="Guardar">
        </form>
      </div>
      <div class="main">
        <table>
          <thead class="thead">
            <th>ID</th>
            <th>Nombre_Imagen</th>
            <th>Titulo</th>
            <th>Descripción</th>
            <th>Acción</th>
          </thead>
          <tbody>
            <?php
            //Verifica cuantos registros hay en la tabla, si es mayor a 0 quiere decir que hay registros.
            if ($resultado->num_rows > 0) {
              while ($row = $resultado->fetch_assoc()) //Devuelve un array con todos los registros asociados a la tabla.
                echo '<tr>
                    <td id="id">' . $row["cod_imagen"] . '</td>
                    <td>' . $row["imagen"] . '</td>
                    <td>' . $row["nombre"] . '</td>
                    <td>' . $row["descripcion"] . '</td>
                    <td>
                      <a href="../php/delete_notice.php?id=' . $row['cod_imagen'] . '&path=' . $row['imagen'] . '">Eliminar</a>
                    </td>
                  </tr>';
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <script src="../JS/burger-bar.js"></script>
  <script src="../JS/scroll-menu.js"></script>
  <script type="text/javascript">
    //Este bloque permite eliminar un bug con la posición del menu cuando scrolleas hacia abajo, su función se describe de la siguiente manera: se guarda cada objecto HTML en una variable, entonces header.classList.toggle("header-secundary-active", window.scrollY >= 90) se traduce a: el elemento HTML header quiero q accedas a su atributo class y que intercambies una clase si el usuario scrollea 90 pixeles en el EJE-Y y le añade la clase o se la elimina dependiendo si cumple la condición.
    window.addEventListener("scroll", function () {
      var short_menu = document.querySelector(".container-short_menu");
      var header = document.querySelector(".header-secundary");
      var title = document.querySelector(".title-header-main");
      header.classList.toggle("header-secundary-active", window.scrollY >= 90);
      title.classList.toggle("title-main-active", window.scrollY >= 90);
      short_menu.classList.toggle("short_menu-active", window.scrollY >= 90);
    });
  </script>
</body>

</html>