<?php 
    require '../PHPMailer/PHPMailer.php';
    require '../PHPMailer/Exception.php';
    require '../PHPMailer/SMTP.php';
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

  $contraseña = trim($_POST['contraseña']);
  $hashPass = hash("sha256",sha1($contraseña));
  $id_usu = bin2hex(random_bytes(16));
  
  $carpeta_destino = '/images/registro/';  
  $nombre_archivo = $_FILES['picture']['name'];

  if ($nombre_archivo == '') {
    $picture = "/images/registro/GenericProfile.jpg";
  } else {
    $picture = $carpeta_destino.$id_usu."/".basename($nombre_archivo);
    $imagen_temporal = $_FILES['picture']['tmp_name'];
  }
  $tipo = $_FILES['picture']['type'];

  if (($nombre_archivo !== '') && !((strpos($tipo, 'gif') || strpos($tipo, 'jpeg') || strpos($tipo, 'png') || strpos($tipo, 'webp') || strpos($tipo, 'pdf') || strpos($tipo, 'avif') ))) {
    $_SESSION['mensaje'] = 'Solo se permite archivos jpeg, gif, webp, png';
    $_SESSION['tipo'] = 'danger';

    header('../index.php');
  } else {

    $hash = md5(rand(0,1000));
    $protocolo = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
    $dominio = $_SERVER['HTTP_HOST'];

    $Project = "";
    if ($dominio == "localhost") {
      $Project = "/Politecnico%20Maximo%20Gomez%20Website";
    }

    $url = $protocolo . "://" . $dominio.$Project;

    $queryLogin =  "INSERT INTO login (id_usuario, correo, contraseña, hash_) VALUES ('".$id_usu."','".$correo."','".$hashPass."','".$hash."')";
    $queryRegistro =  "INSERT INTO registro VALUES ('".$id_usu."','".$picture."','".$nombre."','".$apellido."',".$cedula.")";
    
    //Crear un objeto PHPMailer para acceder a sus metodos y propiedades
    $mail = new PHPMailer(true);
    
    try {

            //Configurar el servidor SMTP
      $mail->isSMTP();
      $mail->SMTPDebug = 0;  // 0 para no mostrar mensajes de depuración, 2 para monstar
      $mail->Host = 'smtp.gmail.com';
      $mail->SMTPAuth = true;
      $mail->Username = 'analuisaarias33@gmail.com'; // la direccion de correo electrónico de Gmail
      $mail->Password = 'vgjy fbvp rvgm vcse'; // 'rnzocuypkiowfmgq'; // La contraseña de la cuenta Gmail
      $mail->SMTPSecure = "tls";
      $mail->Port = 587; // El puerto SMTP de Gmail

      //Configurar el remitente y el destinatario
      
      // $mail->setFrom('alexandergomez41005@gmail.com', 'Politécnico Máximo Gómez');
      $mail->setFrom('analuisaarias33@gmail.com', 'Politécnico Máximo Gómez');
      $mail->addAddress($correo, $nombre);

      //Configurar el asunto y el cuerpo del correo
      $mail->isHTML(true);
      $mail->CharSet = 'UTF-8';
      $mail->Subject = '¡Está a un paso de activar su cuenta!';
      $mail->Body = '
              <style>
                  body {
                      font-family: Arial, sans-serif;
                  }
                  .container {
                      
                  }
                  .header {
                      
                  }
                  .content {
                      padding: 20px;
                  }
                  .verification-code {
                      
                  }
                  p {
                      
                  }
              </style>
          </head>
          <body>
              <div class="container" style="width: 80%;
                      margin: 0 auto;
                      padding: 10px;
                      background-color: #f4f4f4;
                      border: 1px solid #ccc;">
                  <div class="header" style="background-color: #093d7e;
                      color: #fff;
                      padding: 10px;
                      text-align: center;">
                      <h1>Verificación de Correo Electrónico</h1>
                  </div>
                  <div class="content" style="color: #555; padding: 20px; font-size: 15px;">
                      <div>Estimado usuario, <b>'.$nombre.'</b></div>
                      <div>Gracias por registrarse en nuestro portal web, para verificar su correo electrónico, y activar su cuenta siga el siguiente enlace:</div>
                      <br>
                      <div><a href="'.$url.'/php/activar.php?hash='.$hash.'&email='.$correo.'" class="verification-code" style="background-color: #ffcc00;
                      color: #333;
                      padding: 5px 10px;
                      text-decoration: none;
                      font-size: 24px;
                      border-radius: 5px;
                      display: inline-block;">Activar cuenta</a></div>
                      <br>
                      <div>Si le ha llegado este correo de forma equivocada, por favor, desestimar, feliz resto del día</div>
                  </div>
              </div>
          </body>
          </html>
      ';
      
      $_SESSION['tipo'] = 'success';
      $mail->send();

      // Si se envio crear la cuenta inactiva para activarse al seguir el enlace

      $resultado2 = mysqli_query($connection, $queryLogin);
    $resultado1 = mysqli_query($connection, $queryRegistro);

    if ($resultado1 && $resultado2) {

      if ($nombre_archivo !== '') {
        $nombre_carpeta = "../images/registro/".$id_usu;

      // Verificar si la carpeta no existe antes de crearla
        if (!is_dir($nombre_carpeta)) {
            // Crear la carpeta con permisos 0777 (puedes ajustarlos según tus necesidades)
            if (mkdir($nombre_carpeta, 0777)) {

            } else {
                echo "Error al crear la carpeta $nombre_carpeta.";
            }
        } else {
            echo "La carpeta $nombre_carpeta ya existe.";
        }

        move_uploaded_file($imagen_temporal, "..".$carpeta_destino.$id_usu."/".$nombre_archivo);
      }

      $_SESSION['mensaje'] = 'Se ha enviado un correo de activación de cuenta a su correo electrónico.';
      $_SESSION['tipo'] = 'success';
    }

    } catch (Exception $e) {
      echo $e;
    }

  }

?>