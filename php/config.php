<?php

//inicia la sesion en la pagina web
session_start();
//Incluye las librerias de Google Client
require_once '../vendor/autoload.php';
//Crea un objecto Google_Client para llamar a los metodos del cliente
$google_client = new Google_Client();
//Establece el ID del Cliente de Oauth 2.0
$google_client->setClientId('186492244995-egar419lcsfnmkvi8geast0b6fg0b2t6.apps.googleusercontent.com');
//Establece el Codigo del Cliente Secreto de Oauth 2.0
$google_client->setClientSecret('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');
//Establece la URI de Redireccionamiento Autorizadas en Google Cloud
$google_client->setRedirectUri('http://localhost/Politecnico%20Maximo%20Gomez%20Website/php/login_google.php');
//Establece los alcanzes de la aplicacion. En este caso se requiere acceso al perfil y al correo del usuario
$google_client->addScope('email');
$google_client->addScope('profile');

?>