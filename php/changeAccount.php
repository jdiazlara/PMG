<?php 
    error_reporting(0);//Poner (0) para eliminar los reportes de errores. Eliminar el 0 para aparecer los errores.
    require_once("../vendor/autoload.php"); //Se importa el iniciador de la biblioteca composer
    include("./config.php");


    //Verifica si la variable token esta vacia, si lo esta quiere decir que tiene iniciada la sesión con google.
    if (!isset($token['error'])) {
        $google_client->revokeToken();//Destruye la sesion actual con google.
        session_destroy();//Destruye la sesion actual de las variables $_SESSION[].
        $google_client->createAuthUrl();//Crea un inicio de sesion nuevo.
        header("location:" . $google_client->createAuthUrl());//Te lleva al tipico menu de inicio de sesión de google para selecciona la cuenta con la cual iniciaras sesión
    }


?>