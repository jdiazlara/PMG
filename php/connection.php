<?php
    $host = "localhost";
    $user = "root";
    $password = "123456";
    $database = "db_pmg";
    
    $connection = mysqli_connect($host, $user, $password, $database);
    $connection->set_charset("utf8")
?>

<!-- Descomentar el bloque de abajo cuando se vaya a desplegar a Hostinger y comentar el de arriba y viceversa para los casos de uso-->

<?php

   /*  $host = "localhost";
    $user = "u417353178_root";
    $password = "PolitecnicoM2000";
    $database = "u417353178_Politecnico";
    
    $connection = mysqli_connect($host, $user, $password, $database);
    $connection->set_charset("utf8") */

?>