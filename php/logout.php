
<?php
    //Destruye la session actual
    session_start();
    session_destroy();

    echo "<script>
        if(localStorage.getItem('userInfo')){
            console.log('Esta el item')
        }
        localStorage.removeItem('userInfo')
        window.location.href = '../index.php';
    </script>";
    // Te redirige a la pagina principal
    header('location:../index.php');

?>
