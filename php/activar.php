<?php
  include('./connection.php'); 
  session_start();

  if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
      
      // Verificar datos
      $email = ($_GET['email']); // Asignar el correo electrónico a una variable
      $hash = ($_GET['hash']); // Asignar el hash a una variable
                  
      $query = "SELECT id_usuario,correo, hash_, activo FROM login WHERE correo='".$email."' AND hash_='".$hash."' AND activo='0'"; 
      $resultado = mysqli_query($connection, $query);
      $match  = mysqli_num_rows($resultado);

      $id_usuario = mysqli_fetch_assoc($resultado)['id_usuario'];
                  
      if($match > 0){
          // Hay una coincidencia, activar la cuenta
          mysqli_query($connection,"UPDATE login SET activo='1' WHERE correo='".$email."' AND hash_='".$hash."' AND activo='0'");
          $_SESSION['mensaje'] = 'Tu cuenta ha sido activada, ya puedes iniciar sesión.';
          $_SESSION['tipo'] = 'success';
          header("location:" . "./login.php?correo=".$email."");

        }else{
          // No hay coincidencias    
          $_SESSION['mensaje'] = 'La URL es inválida o ya has activado tu cuenta.';
          $_SESSION['tipo'] = 'danger';
          // mysqli_query($connection, "DELETE from login where id_usuario = '".$id_usuario."')");
          header("location:" . "./registro.php");
      }
   } // else{
  //     // Intento nó válido (ya sea porque se ingresa sin tener el hash o porque la cuenta ya ha sido registrada)
  //     $_SESSION['mensaje'] = 'Intento inválido, por favor revisa el mensaje que enviamos correo electrónico';
  //     $_SESSION['tipo'] = 'danger';
  //     header("location:" . "./registro.php");
  // }
?>