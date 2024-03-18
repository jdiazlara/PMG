<?php 
$contraseña = trim($_POST['contraseña']);
$hash = hash("sha256",sha1($contraseña));

include('./connection.php'); 
$query = "SELECT * FROM login where correo = '".$correo."' and contraseña = '".$hash."' and activo = 1";
$resultado = mysqli_query($connection, $query);
$login = mysqli_fetch_assoc($resultado);


if (mysqli_num_rows($resultado) == 0) {
  $_SESSION['mensaje'] = 'Correo o contraseña incorrecto/s';
  $_SESSION['tipo'] = 'danger';
} else {
  
  $id_usuario = $login['id_usuario'];
  $query2 = "SELECT * FROM registro where id_usuario = '".$id_usuario."'";
  $resultado2 = mysqli_query($connection, $query2);
  $registro = mysqli_fetch_assoc($resultado2);

  $_SESSION['user_first_name'] = $registro['nombre_tutor'];
  $_SESSION['user_last_name'] = $registro['apellido_tutor'];
  $_SESSION['user_email_address'] = $login['correo'];
  $_SESSION['user_image'] = "..".$registro['user_image'];
  $_SESSION['access_token'] = bin2hex(random_bytes(16));

  echo "<script>
    const userInfoPHP = ['". $registro['nombre_tutor'] ."','". $login['correo'] ."', '". $registro['user_image'] ."'];
    localStorage.setItem('userInfo', JSON.stringify(userInfoPHP));
  </script>";

  $_SESSION['mensaje'] = 'Inicio de sesión efectuado correctamente';
  $_SESSION['tipo'] = 'success';
}

?>