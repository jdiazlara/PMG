<?php
    include('../php/connection.php');
    $query = "SELECT * FROM admision";
    $resultado = mysqli_query($connection, $query);
    session_start(); //Inicia o Reanuda una sesion
    error_reporting(0); //Poner (0) para eliminar los reportes de errores. Eliminar el 0 para aparecer los errores.
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PMG - Admin. Admisión</title>
    <link rel="stylesheet" href="../style/style_admin_admision.css">
    <link rel="stylesheet" href="../style/style-header.css">
    <link rel="shortcut icon" href="../images/Logo.avif" type="image/x-icon">
</head>

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
        <li class="li li_icon-profile"><a href="../php/login.php"><div><span class="icon-profile"><?php if ($_SESSION['user_image'] == '') {echo '<script> document.write("Iniciar Sesión"); </script>';} else {echo '<img src="' . $_SESSION['user_image'] . '" class="rounded-circle container" alt="">';} ?></span></div></a></li>
        <li><span class="material-icons-outlined"><img src="../images/home.png" alt=""></span><a href="../index.php">Inicio</a></li>
        <li><span><img src="../images/sobreNosotros.png" alt=""></span><a href="../php/about_us.php">Sobre Nosotros</a></li>
        <li><span><img src="../images/docentes.png" alt=""></span><a href="../php/Docentes.php">Docentes</a></li>
        <li><span><img src="../images/egresados.png" alt=""></span><a href="../php/graduates.php">Egresados</a></li>
        <li><span><img src="../images/Admision.png" alt=""></span><a href="../php/inf-admission.php">Admisión</a></li>
        <li><span><img src="../images/noticia.png" alt=""></span><a href="../php/noticias.php">Noticias</a></li>
    </ul>
</div>
<?php

//Verifica si haz iniciado sesion mediante un token de acceso que te brinda google cuando inicias sesion, si esta vacio, no has iniciado sesion. De paso verifica si la persona tiene acceso a la pagina mediante el gmail. 
if (!isset($_SESSION['access_token'])) {
    echo '<div class="no_session"><script>document.write("POR FAVOR INICIE SESIÓN PARA CONTINUAR");</script></div>';
    echo '<a id="init_session" href="./changeAccount.php">HAGA CLICK AQUI PARA INICIAR SESIÓN</a>';
    die();
} else {
    if (isset($_SESSION['user_email_address'])) {
        if ($_SESSION['user_email_address'] == "alexandergomez41005@gmail.com" || $_SESSION['user_email_address'] == "pmaximogomez2000@gmail.com") {

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
<div class="all">
    <div class="title-header title-header-main">
        <h1>Bienvenido
            <?php echo $_SESSION['user_first_name'] ?>
        </h1>
    </div>
    <div class="main">
        <table>
            <thead class="thead">
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Edad</th>
                <th>Telefono</th>
                <th>Gmail</th>
                <th>Centro Procedencia</th>
                <th>Provincia Residencia</th>
                <th>Promedio</th>
                <th>Materias Completivo</th>
                <th>Carrera Seleccionada</th>
            </thead>
            <tbody>
                <?php
                //Verifica cuantos registros hay en la tabla, si es mayor a 0 quiere decir que hay registros.
                if ($resultado->num_rows > 0) {
                    while ($row = $resultado->fetch_assoc()) //Devuelve un array con todos los registros asociados a la tabla.
                    echo '<tr>
                        <td id="id">' . $row["id"] . '</td>
                        <td>' . $row["nombre"] . '</td>
                        <td>' . $row["apellidos"] . '</td>
                        <td>' . $row["edad"] . '</td>
                        <td>' . $row["tel_estudiante"] . '</td>
                        <td id="email">' . $row["gmail_estudiante"] . '</td>
                        <td>' . $row["centro_procedencia"] . '</td>
                        <td>' . $row["provincia_residencia"] . '</td>
                        <td>' . $row["promedio"] . '</td>
                        <td>' . $row["exam_materia"] . '</td>
                        <td>' . $row["carrera_seleccionada"] . '</td>
                    </tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<script src="../JS/burger-bar.js"></script>
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