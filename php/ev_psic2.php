<?php

    error_reporting(0);
    session_start();
    include "./config.php";
    require_once "../vendor/autoload.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PMG - Examen Psicológico</title>
    <link rel="stylesheet" href="../style/style-ev_psic.css">
    <link rel="stylesheet" href="../style/style-header.css">
    <link rel="stylesheet" href="../style/style-footer.css">
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
                    <a href="../php/login_google.php">
                        <div>
                            <span class="icon-profile">
                                <?php
                                    //Verifica si en la variable de sesion hay algun string, si hay imprime la url de la imagen de perfil, de lo contrario te pide iniciar sesión.
                                    if ($_SESSION['user_image'] == '') {
                                        echo '<script>
                                            document.write("Iniciar Sesión");
                                        </script>';
                                    }
                                    else{
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
            <li class="li li_icon-profile"><a href="../php/login_google.php"><div><span class="icon-profile"><?php if ($_SESSION['user_image'] == '') { echo '<script> document.write("Iniciar Sesión"); </script>'; } else { echo '<img src="' . $_SESSION['user_image'] . '" class="rounded-circle container" alt="">';} ?> </span></div></a></li>
            <li><span class="material-icons-outlined"><img src="../images/home.png" alt=""></span><a href="../index.php">Inicio</a></li>
            <li><span><img src="../images/sobreNosotros.png" alt=""></span><a href="../php/about_us.php">Sobre Nosotros</a></li>
            <li><span><img src="../images/docentes.png" alt=""></span><a href="../php/Docentes.php">Docentes</a></li>
            <li><span><img src="../images/egresados.png" alt=""></span><a href="../php/graduates.php">Egresados</a></li>
            <li><span><img src="../images/Admision.png" alt=""></span><a href="../php/inf-admission.php">Admisión</a>
            </li>
            <li><span><img src="../images/noticia.png" alt=""></span><a href="../php/noticias.php">Noticias</a></li>
            <li class="li"><a href="../php/ev_psic.php"><div><span><img src="../images/Admision.png" alt=""></span><h1>Ex. Psicológico</h1></div></a></li>
        </ul>
    </div>
    <main>
        <div class="alerts">
            <?php
            include "../php/connection.php";
            require_once '../vendor/autoload.php';
            include('../php/config.php');
            require '../PHPMailer/PHPMailer.php';
            require '../PHPMailer/Exception.php';
            require '../PHPMailer/SMTP.php';
            use PHPMailer\PHPMailer\PHPMailer;
            use PHPMailer\PHPMailer\Exception;

            //Si en la variable $_SESSION no hay un token de acceso quiere decir que no tiene iniciado la sesión con google, Por lo tanto pide un inicio de sesión para continuar. 
            if(!isset($_SESSION['access_token'])){
                echo '<div class="no_session"><script>document.write("POR FAVOR INICIE SESION PARA CONTINUAR");</script></div>';
                echo '<a id="init_session" href="./changeAccount.php">HAGA CLICK AQUI PARA INICIAR SESIÓN</a>';
                die();
            }else{
                if (isset($_SESSION['user_email_address'])){
                    if ( 
                    $_SESSION['user_email_address'] == "pmaximogomez2000@gmail.com" 
                    || $_SESSION['user_email_address'] == "alexandergomez41005@gmail.com" 
                    || $_SESSION['user_email_address'] == "Pm9535865@gmail.com"  //Adancel.Sanz
                    || $_SESSION['user_email_address'] == "alainisvillalona@gmail.com"  //Alainis29
                    || $_SESSION['user_email_address'] == "marisolballana045@gmail.com"  //Albert_01
                    || $_SESSION['user_email_address'] == "canarioalexa4@gmail.com"  //Alexa_canario03
                    || $_SESSION['user_email_address'] == "alexandergomez41005@gmail.com"  //Al3xander
                    || $_SESSION['user_email_address'] == "ambar.lara1@icloud.com"  //Ambar_1
                    || $_SESSION['user_email_address'] == "amerfisanchez1@gmail.com"  //amerfisanchez
                    || $_SESSION['user_email_address'] == "amnerguerrerod03@icloud.com"  //Amnerpyex1234
                    || $_SESSION['user_email_address'] == "anabelabreu237@gmail.com"  //anabelabreu111
                    || $_SESSION['user_email_address'] == "anahimejia2710@gmail.com"  //anahim_27
                    || $_SESSION['user_email_address'] == "Angelfricasreyes"  //angelfrankelyfricasreyes@gmail.com
                    || $_SESSION['user_email_address'] == "Angelicasantana0807@gmail.com"  //Angelica_12_Sanchez10
                    || $_SESSION['user_email_address'] == "unknow.armybts@gmail.com"  //AngelyDume94
                    || $_SESSION['user_email_address'] == "anisel0325l@gmail.com"  //Anisellora
                    || $_SESSION['user_email_address'] == "anyelinamassenat@gmail.com"  //anyelina10
                    || $_SESSION['user_email_address'] == "almandocastillo5@gmail.com"  //Armando_2206
                    || $_SESSION['user_email_address'] == "achaymicastillo1729@gmail.com"  //Ashaimy-castillo
                    || $_SESSION['user_email_address'] == "ashantiozoria10@gmail.com"  //
                    || $_SESSION['user_email_address'] == "Ashleybaez.11@hotmail.com"  //Baez_ash28
                    || $_SESSION['user_email_address'] == "ashlyamador5020@icloud.com"  //ashleyamador
                    || $_SESSION['user_email_address'] == "aylin.tejeda23@gmail.com"  //YARILET23
                    || $_SESSION['user_email_address'] == "gabriellabernabel707@gmail.com"  //Gabrielabernabel
                    || $_SESSION['user_email_address'] == "aguasvivasbraili@gmail.com"  //Braily24
                    || $_SESSION['user_email_address'] == "camilatejeda789@gmail.com"  //Cami130713
                    || $_SESSION['user_email_address'] == "rodriguezcamily4@gmail.com"  //Camilyrodriguez24
                    || $_SESSION['user_email_address'] == "carlenisbaez@gmail.com"  //Carleni_14_Baez._14
                    || $_SESSION['user_email_address'] == "carlosmcmc2008@gmail.com"  //carlosmejiac
                    || $_SESSION['user_email_address'] == "chelsynicolcastillosoto@gmail.com"  //Chelsy_Castillo22
                    || $_SESSION['user_email_address'] == "baezyeuniel@gmail.com"  //Yeoowp
                    || $_SESSION['user_email_address'] == "crisdayli7@gmail.com"  //CrisdalyValdez2008
                    || $_SESSION['user_email_address'] == "juneilyarias2@gmail.com"  //juneily_32
                    || $_SESSION['user_email_address'] == "daliannylucianoguerrero13@gmail.com"  //Daliannyluciano11
                    || $_SESSION['user_email_address'] == "kaidotrack@gmail.com"  //danieltrack
                    || $_SESSION['user_email_address'] == "danilzadelcarmen2@gmail.com"  //danilza0230
                    || $_SESSION['user_email_address'] == "mairobismordan@gmail.com"  //DariannyMordan08
                    || $_SESSION['user_email_address'] == "darielcruzroa@gmail.com"  //1Dariel_Cruz
                    || $_SESSION['user_email_address'] == "Daury12017@gmail.com"  //DauryDiaz
                    || $_SESSION['user_email_address'] == "Laradayana447@gmail.com"  //Mariana1011
                    || $_SESSION['user_email_address'] == "monterodayana973@gmail.com"  //Dayana0205
                    || $_SESSION['user_email_address'] == "daybelis.pmg@gmail.com"  //daybelis.guzman
                    || $_SESSION['user_email_address'] == "Daysarismateo1910@gmail.com"  //DaysarisM1910
                    || $_SESSION['user_email_address'] == "denis19"  //denispena1111@gmail.com
                    || $_SESSION['user_email_address'] == "Diliannyrodriguez0407@gmail.com"  //Dilianny_rodriguez77
                    || $_SESSION['user_email_address'] == "dileynipena2008@gmail.com"  //dileyni2519y
                    || $_SESSION['user_email_address'] == "dionishelenaml179@gmail.com"  //Dionis_1101
                    || $_SESSION['user_email_address'] == "eduermartines2023@gmail.com"  //Eduar-martines-2033
                    || $_SESSION['user_email_address'] == "edwanyromero@gmail.com"  //Edwanyi26
                    || $_SESSION['user_email_address'] == "eimyluna43@gmail.com"  //luna9073
                    || $_SESSION['user_email_address'] == "eliancanario7@gmail.com"  //Elian09_5
                    || $_SESSION['user_email_address'] == "melisart019@gmail.com"  //melisart019
                    || $_SESSION['user_email_address'] == "Abreuelianny0@gmail.com"  //eli_yori8
                    || $_SESSION['user_email_address'] == "beltred331@gmail.com"  //Elsa_beltre
                    || $_SESSION['user_email_address'] == "encarnacionemelis181@gmail.com"  //emelis_ce
                    || $_SESSION['user_email_address'] == "emeliluna26@gmail.com"  //Emelyluna26
                    || $_SESSION['user_email_address'] == "emelypujols10@gmail.com"  //Emelypujols11_pmg
                    || $_SESSION['user_email_address'] == "lucianoenisha@gmail.com"  //Enisha_11
                    || $_SESSION['user_email_address'] == "Analayvipe23@gmail.com"  //Ana2315
                    || $_SESSION['user_email_address'] == "santoaquinoguerreromojica@gmail.com"  //Erick@._56
                    || $_SESSION['user_email_address'] == "erikaaria998@gmail.com"  //Mariaarias1234
                    || $_SESSION['user_email_address'] == "steisyrochez2325@gmail.com"  //Herminia_Roche
                    || $_SESSION['user_email_address'] == "estrellalara311080@gmail.com"  //Estrella02
                    || $_SESSION['user_email_address'] == "fernyarieslugo@gmail.com"  //ferny_-
                    || $_SESSION['user_email_address'] == "calderon160116@icloud.com"  //Franchesca_pimentel
                    || $_SESSION['user_email_address'] == "franlymiguelDiaz@gmail.com"  //Franly07
                    || $_SESSION['user_email_address'] == "pgelmayni@gmail.com"  //gelmayni15
                    || $_SESSION['user_email_address'] == "thamenor10@icloud.com"  //genesis_st
                    || $_SESSION['user_email_address'] == "genesis25melo@gmail.com"  //Mabel_arias25
                    || $_SESSION['user_email_address'] == "georginavalverde40@gmail.com"  //GeorginaValverde_07
                    || $_SESSION['user_email_address'] == "geralybaez928@gmail.com"  //Gera12
                    || $_SESSION['user_email_address'] == "Ghermayuniechavarria@gmail.com"  //Ghermayuni_30
                    || $_SESSION['user_email_address'] == "Grilesy_Romero08"  //grileisyr@gmail.com
                    || $_SESSION['user_email_address'] == "Hemabaru09@gmail.com"  //Heyllen_Baez
                    || $_SESSION['user_email_address'] == "larajaison87@gmail.com"  //Jaison8787
                    || $_SESSION['user_email_address'] == "jasycaceres3@gmail.com"  //jasycarolin
                    || $_SESSION['user_email_address'] == "javieryork77@gmail.com"  //Javier997
                    || $_SESSION['user_email_address'] == "jhonnairiariasdelarosa27@gmail.com"  //jhonnairi_arias
                    || $_SESSION['user_email_address'] == "yonathandiaz1515@gmail.com"  //Jonathan_Diaz15
                    || $_SESSION['user_email_address'] == "yorfisfranco27@icloud.com"  //Jorfis_franco0127
                    || $_SESSION['user_email_address'] == "yarismelvizcaino@gmail.com"  //Yarismel01
                    || $_SESSION['user_email_address'] == "jencarnacionmontano@gmail.com"  //Josenny07-09
                    || $_SESSION['user_email_address'] == "josielidelacruz3@gmail.com"  //Josielisdelacruz080323_
                    || $_SESSION['user_email_address'] == "yosmelsanchez13@gmail.com"  //josmel
                    || $_SESSION['user_email_address'] == "joslazala15@gmail.com"  //josneilylazala1515
                    || $_SESSION['user_email_address'] == "juansydaurielm@gmail.com"  //Juansy_14
                    || $_SESSION['user_email_address'] == "gjuleinni@gmail.com"  //Castillo_28
                    || $_SESSION['user_email_address'] == "nahomilove073@gmail.com"  //nahomimelo073
                    || $_SESSION['user_email_address'] == "Juliannamejia0909@gmail.com"  //Julianna.ml8
                    || $_SESSION['user_email_address'] == "julialara2024@gmail.com"  //@juliannimelo.0
                    || $_SESSION['user_email_address'] == "julianni18g@gmail.com"  //Nicolitaa02
                    || $_SESSION['user_email_address'] == "julihamdys030303@gmail.com"  //julyarias
                    || $_SESSION['user_email_address'] == "KarennnCastilloooo@gmail.com"  //KarenChala00
                    || $_SESSION['user_email_address'] == "keiragonzalezd@gmail.com"  //KeiraGonzalez05
                    || $_SESSION['user_email_address'] == "kensysantana65@gmail.com"  //Kensy01Alexander
                    || $_SESSION['user_email_address'] == "lugokerianny@gmail.com"  //Kerianny829
                    || $_SESSION['user_email_address'] == "laubautista0524@gmail.com"  //lau_0524
                    || $_SESSION['user_email_address'] == "Paypalprueba1999@gmail.com"  //Leslie_388
                    || $_SESSION['user_email_address'] == "liriac693@gmail.com"  //liriannyvizcaino_8
                    || $_SESSION['user_email_address'] == "lissaurymejiagonzalez@gmail.com"  //Lissaury14_15
                    || $_SESSION['user_email_address'] == "Lizmarieburgos1108@gmail.com"  //Lizmarieburgos11
                    || $_SESSION['user_email_address'] == "Loenny09@outlook.com"  //Loenny09
                    || $_SESSION['user_email_address'] == "laisaysuhija@gmail.com"  //lorena_919
                    || $_SESSION['user_email_address'] == "chory.snaider@icloud.com"  //Loswels_14
                    || $_SESSION['user_email_address'] == "pujolslucero@gmail.com"  //Lucero_pujols26
                    || $_SESSION['user_email_address'] == "luzantuna2@gmail.com"  //Luz08
                    || $_SESSION['user_email_address'] == "axelibrenyie@gmail.com"  //Malfoy
                    || $_SESSION['user_email_address'] == "yeily_lara@hotmail.com"  //MarcosEnc15
                    || $_SESSION['user_email_address'] == "marcossebastianbaezarias@gmail.com"  //MarcosBaez06
                    || $_SESSION['user_email_address'] == "cami34laguz56@gmail.com"  //MariaC34
                    || $_SESSION['user_email_address'] == "mariaaltagraciamejiaaybar07@gmail.com"  //Maria2222
                    || $_SESSION['user_email_address'] == "mariadarlenyperez08@gmail.com"  //Mariaperez08
                    || $_SESSION['user_email_address'] == "leidianafiguereo36@gmail.com"  //MariadelosAngeles02
                    || $_SESSION['user_email_address'] == "elizatejeda23@gmail.com"  //elis20
                    || $_SESSION['user_email_address'] == "mariatejedaza21@gmail.com"  //Emileirys13
                    || $_SESSION['user_email_address'] == "mariaisabelveraaristy@gmail.com"  //MARIAIVA
                    || $_SESSION['user_email_address'] == "marializguerrerotejeda82@gmail.com"  //Maria-liz
                    || $_SESSION['user_email_address'] == "nicolepola589@gmail.com"  //Marielis-Polanco
                    || $_SESSION['user_email_address'] == "mairenitejeda100@gmail.com"  //Bodega
                    || $_SESSION['user_email_address'] == "marlepenamelo@gmail.com"  //marlenis_140509
                    || $_SESSION['user_email_address'] == "nayelinoveli@gmail.com"  //nayelimartinez
                    || $_SESSION['user_email_address'] == "Dinellytapia91@gmail.com"  //__Maryori09
                    || $_SESSION['user_email_address'] == "meivelismotavizcaino@gmail.com"  //Meivelis0214_.-
                    || $_SESSION['user_email_address'] == "Melaniepresinal1807@gmail.com"  //mpresinal1807
                    || $_SESSION['user_email_address'] == "Lasalia2323@icloud.com"  //Melodyalcantara23
                    || $_SESSION['user_email_address'] == "mariatejedacastillo@gmail.com"  //Merolin07
                    || $_SESSION['user_email_address'] == "Miaestherramirez795@gmail.com"  //Esther2006
                    || $_SESSION['user_email_address'] == "michelcarolina1882@gmail.com"  //Michelcasado24
                    || $_SESSION['user_email_address'] == "analisalcantara1508@gmail.com"  //analis12
                    || $_SESSION['user_email_address'] == "miguelinaespinalbrea3@gmail.com"  //miguelinabrea24
                    || $_SESSION['user_email_address'] == "cmaximo830@gmail.com"  //Ortizmiguelina29
                    || $_SESSION['user_email_address'] == "mila.bloopers@gmail.com"  //mila_xiii
                    || $_SESSION['user_email_address'] == "lucycarmenmotamendez@gmail.com"  //lucymotamendez
                    || $_SESSION['user_email_address'] == "nahiavargas754@gmail.com"  //Nahia01
                    || $_SESSION['user_email_address'] == "naiderinpimente0414@gmail.com"  //Pimentel-Naiderin
                    || $_SESSION['user_email_address'] == "nailimejia04@icloud.com"  //Nailimejia04
                    || $_SESSION['user_email_address'] == "aliahpeguero24@gmail.com"  //Nashary_2442p
                    || $_SESSION['user_email_address'] == "Lanegra01d@gmail.com"  //Nashly_01
                    || $_SESSION['user_email_address'] == "florianpegueronicole@gmail.com"  //Nicole_Mg
                    || $_SESSION['user_email_address'] == "nohelydeabreu6@gmail.com"  //nohelydeabreu10
                    || $_SESSION['user_email_address'] == "mateopablianny@gmail.com"  //Antoniamateo@gmail_.-
                    || $_SESSION['user_email_address'] == "patriajuliannygonzalezjimenez@gmail.com"  //PatriaGonzalez
                    || $_SESSION['user_email_address'] == "rafelinasantana08@gmail.com"  //Rafelina_11
                    || $_SESSION['user_email_address'] == "raulmejai308@gmail.com"  //Mejia_2009
                    || $_SESSION['user_email_address'] == "ortizricary953@gmail.com"  //Ricaryyy467
                    || $_SESSION['user_email_address'] == "Arisleyda.rivera@icloud.com"  //Arisleyda_07_Vizcaino._
                    || $_SESSION['user_email_address'] == "romymendezcabrera@gmail.com"  //Romy12233-
                    || $_SESSION['user_email_address'] == "gronny152@gmail.com"  //Ronny0813
                    || $_SESSION['user_email_address'] == "rosaliluna91@gmail.com"  //RosaliLuna_19
                    || $_SESSION['user_email_address'] == "ariasbrearosanny@gmail.com"  //AriasRosanny
                    || $_SESSION['user_email_address'] == "rosbeilismendez@gmail.com"  //rosbeilis_24
                    || $_SESSION['user_email_address'] == "francelisguerrero031@gmail.com"  //Rosberly12345
                    || $_SESSION['user_email_address'] == "roselisamodor@gmail.com"  //Roselis2008
                    || $_SESSION['user_email_address'] == "sotoroshairy@gmail.com"  //Roshairy_Soto18
                    || $_SESSION['user_email_address'] == "victoriamarteb0408@gmail.com"  //Victoria04
                    || $_SESSION['user_email_address'] == "sotopegueror@gmail.com"  //Rossysoto
                    || $_SESSION['user_email_address'] == "roynessoto@gmail.com"  //Roynes
                    || $_SESSION['user_email_address'] == "rubymontero651@gmail.com"  //Rubymontero
                    || $_SESSION['user_email_address'] == "sandyelsuper189@gmail.com"  //Sandry_feliz27
                    || $_SESSION['user_email_address'] == "sanyirimelo61@gmail.com"  //Sanyiri_Melo25
                    || $_SESSION['user_email_address'] == "santamilquellys@gmail.com"  //saramilchel15
                    || $_SESSION['user_email_address'] == "saularias231721@gmail.com"  //Saul17
                    || $_SESSION['user_email_address'] == "Saurysmarielissierraarias26@gmail.com"  //SaurysSierra26
                    || $_SESSION['user_email_address'] == "Scarletrodrz009@icloud.com"  //Scarlet_rodriguez09
                    || $_SESSION['user_email_address'] == "sexyarias159@gmail.com"  //sexyarias
                    || $_SESSION['user_email_address'] == "gonzalezsherina168@gmail.com"  //Sherina3
                    || $_SESSION['user_email_address'] == "sherlynfilpo2311@gmail.com"  //sherlynfilpo13
                    || $_SESSION['user_email_address'] == "sherlisortizmedrano@gmail.com"  //SherlysOrtiz_pmg
                    || $_SESSION['user_email_address'] == "soldelunamoreno01@gmail.com"  //Soldelunamoreno15
                    || $_SESSION['user_email_address'] == "suazosoraimy@gmail.com"  //Soraimy2008-_.
                    || $_SESSION['user_email_address'] == "tecitadiaz2015@gmail.com"  //stephanie_
                    || $_SESSION['user_email_address'] == "carlasuarez0890@gmail.com"  //Carlasuarez08
                    || $_SESSION['user_email_address'] == "suleimyprecinal@gmail.com"  //Suleimy
                    || $_SESSION['user_email_address'] == "viannyfalcon2@gmail.com"  //v_falcon.23
                    || $_SESSION['user_email_address'] == "Larawilkeisy812@gmail.com"  //Wilkeisylara
                    || $_SESSION['user_email_address'] == "williampepen91@gmail.com"  //William31
                    || $_SESSION['user_email_address'] == "wilmarysmatosarias@gmail.com"  //wilmarys.pmg
                    || $_SESSION['user_email_address'] == "wilmerylara589@gmail.com"  //Wilmery__Lara
                    || $_SESSION['user_email_address'] == "w1n4ur1t0rr3s@gmail.com"  //w1n4ur1t0rr3s
                    || $_SESSION['user_email_address'] == "Yanluispenaarias@gmail.com"  //YanLuispena.a24
                    || $_SESSION['user_email_address'] == "8099068417ym@gmail.com"  //Yanely_M.Pujols
                    || $_SESSION['user_email_address'] == "yanneirisrodriguez15@gmail.com"  //Yanenetube
                    || $_SESSION['user_email_address'] == "Yannysantos"  //yannyelizabethsantosramirez@gmail.com
                    || $_SESSION['user_email_address'] == "yelibetrobles58@gmail.com"  //YelibetLeomairisRoblesCruz
                    || $_SESSION['user_email_address'] == "yelisnelg2117@gmail.com"  //Yelisnel_Guerrero
                    || $_SESSION['user_email_address'] == "yericoiasaias@gmail.com"  //Yerico_24
                    || $_SESSION['user_email_address'] == "yeslygomezyg@gmail.com"  //yesli.gomez
                    || $_SESSION['user_email_address'] == "yiraldynicolrosario@gmail.com"  //Yiraldyrosario
                    || $_SESSION['user_email_address'] == "yocairifranjul06@gmail.com"  //Yoca_06
                    || $_SESSION['user_email_address'] == "YORIELISCARMONATEJADA@GMAIL.COM"  //yorielis1128
                    || $_SESSION['user_email_address'] == "yulinivar15@gmail.com"  //Yulianna155
                    || $_SESSION['user_email_address'] == "yureibysjimenezestepan@gmail.com"  //Yureibys.Jimenez
                    || $_SESSION['user_email_address'] == "zailar.soto@gmail.com"
                    ){}
                }
            }
            // echo '<div class="no_access">
            //         <script>
            //             document.write("¡EL EXAMEN HA FINALIZADO!");
            //             </script>
            //         <div>
            //     ';
            // die();




            if (isset($_POST['submit'])) {

                //Se recolecta la respuesta de cada pregunta.
                $quest_1 = $_POST['1'];
                $quest_2 = $_POST['2'];
                $quest_3 = $_POST['3'];
                $quest_4 = $_POST['4'];
                $quest_5 = $_POST['5'];
                $quest_6 = $_POST['6'];
                $quest_7 = $_POST['7'];
                $quest_8 = $_POST['8'];
                $quest_9 = $_POST['9'];
                $quest_10 = $_POST['10'];
                $quest_11 = $_POST['11'];
                $quest_12 = $_POST['12'];
                $quest_13 = $_POST['13'];
                $quest_14 = $_POST['14'];
                $quest_15 = $_POST['15'];
                $quest_16 = $_POST['16'];
                $quest_17 = $_POST['17'];
                $quest_18 = $_POST['18'];
                $quest_19 = $_POST['19'];
                $quest_20 = $_POST['20'];
                $quest_21 = $_POST['21'];
                $quest_22 = $_POST['22'];
                $quest_23 = $_POST['23'];
                $quest_24 = $_POST['24'];
                $quest_25 = $_POST['25'];
                $quest_26 = $_POST['26'];
                $quest_27 = $_POST['27'];
                $quest_28 = $_POST['28'];
                $quest_29 = $_POST['29'];
                $quest_30 = $_POST['30'];
                $quest_31 = $_POST['31'];
                $quest_32 = $_POST['32'];
                $quest_33 = $_POST['33'];
                $quest_34 = $_POST['34'];
                $quest_35 = $_POST['35'];
                $quest_36 = $_POST['36'];
                $quest_37 = $_POST['37'];
                $quest_38 = $_POST['38'];
                $quest_39 = $_POST['39'];
                $quest_40 = $_POST['40'];
                $quest_41 = $_POST['41'];
                $quest_42 = $_POST['42'];
                $quest_43 = $_POST['43'];
                $quest_44 = $_POST['44'];
                $quest_45 = $_POST['45'];
                $quest_46 = $_POST['46'];
                $quest_47 = $_POST['47'];
                $quest_48 = $_POST['48'];
                $quest_49 = $_POST['49'];
                $quest_50 = $_POST['50'];
                $quest_51 = $_POST['51'];
                $quest_52 = $_POST['52'];
                $quest_53 = $_POST['53'];
                $quest_54 = $_POST['54'];
                $quest_55 = $_POST['55'];
                $quest_56 = $_POST['56'];
                $quest_57 = $_POST['57'];
                $quest_58 = $_POST['58'];
                $quest_59 = $_POST['59'];
                $quest_60 = $_POST['60'];
                $quest_61 = $_POST['61'];
                $quest_62 = $_POST['62'];
                $quest_63 = $_POST['63'];
                $quest_64 = $_POST['64'];
                $quest_65 = $_POST['65'];
                $quest_66 = $_POST['66'];
                $quest_67 = $_POST['67'];
                $quest_68 = $_POST['68'];
                $quest_69 = $_POST['69'];
                $quest_70 = $_POST['70'];
                $quest_71 = $_POST['71'];
                $quest_72 = $_POST['72'];
                $quest_73 = $_POST['73'];
                $quest_74 = $_POST['74'];
                $quest_75 = $_POST['75'];
                $quest_76 = $_POST['76'];
                $quest_77 = $_POST['77'];
                $quest_78 = $_POST['78'];
                $quest_79 = $_POST['79'];
                $quest_80 = $_POST['80'];

                //todas las respuestas se guardan en un array.
                $questions_numbers = array($quest_1, $quest_2, $quest_3, $quest_4, $quest_5, $quest_6, $quest_7, $quest_8, $quest_9, $quest_10, $quest_11, $quest_12, $quest_13, $quest_14, $quest_15, $quest_16, $quest_17, $quest_18, $quest_19, $quest_20, $quest_21, $quest_22, $quest_23, $quest_24, $quest_25, $quest_26, $quest_27, $quest_28, $quest_29, $quest_30, $quest_31, $quest_32, $quest_33, $quest_34, $quest_35, $quest_36, $quest_37, $quest_38, $quest_39, $quest_40, $quest_41, $quest_42, $quest_43, $quest_44, $quest_45, $quest_46, $quest_47, $quest_48, $quest_49, $quest_50, $quest_51, $quest_52, $quest_53, $quest_54, $quest_55, $quest_56, $quest_57, $quest_58, $quest_59, $quest_60, $quest_61, $quest_62, $quest_63, $quest_64, $quest_65, $quest_66, $quest_67, $quest_68, $quest_69, $quest_70, $quest_71, $quest_72, $quest_73, $quest_74, $quest_75, $quest_76, $quest_77, $quest_78, $quest_79, $quest_80);
                $quest_area1 = 0;
                $quest_area2 = 0;
                $quest_area3 = 0;
                $quest_area4 = 0;
                $quest_area5 = 0;
                $name = $_POST['name'];
                $lastName = $_POST['last_name'];
                $email = $_POST['email'];


                //Si hay un valor igual al de los establecidos en los if, se le suma un 1 a cada variable $quest_area#.
                foreach ($questions_numbers as $element) {
                    if ($element == "10") {
                        $quest_area1++;
                    }
                    if ($element == "20") {
                        $quest_area2++;
                    }
                    if ($element == "30") {
                        $quest_area3++;
                    }
                    if ($element == "40") {
                        $quest_area4++;
                    }
                    if ($element == "50") {
                        $quest_area5++;
                    }

                }

                $total_points = max($quest_area1, $quest_area2, $quest_area3, $quest_area4, $quest_area5); //Determina cual es el area con la mayor puntuación
            
                if ($total_points == $quest_area1) {
                    $area_mayor = "Comercio y Mercadeo-1";
                } elseif ($total_points == $quest_area2) {
                    $area_mayor = "Comercio y Mercadeo-2";
                } elseif ($total_points == $quest_area3) {
                    $area_mayor = "Contabilidad";
                } elseif ($total_points == $quest_area4) {
                    $area_mayor = "Informatica";
                } else {
                    $area_mayor = "Industrias Alimentarias";
                }

                // $string_questions = implode(" ", $questions_numbers);//Todos los elementos de un array los convierte a un string
            
                $query2 = "SELECT * FROM test_ex_psic WHERE email='$email'";
                $validacion = mysqli_query($connection, $query2);

                if (mysqli_num_rows($validacion) > 0) {
                    echo '
                        <script>

                            alerta = document.querySelector(".alerts");
                            alerta.classList.add("alert-failure");

                            if(alerta.className = "alert-failure"){
                                alerta.style.transition = "all 600ms";
                                alerta.style.top = "0px"
                                document.write("Ya existe esta solicitud. Cambie de cuenta de Google para hacer otra solicitud");
                                setInterval(() => {
                                    alerta.style.transition = "all 600ms";
                                    alerta.style.top = "-50px"
                                    alerta.style.visibility = "hidden";
                                }, 9000);
                            }
                        </script>
                        ';
                } else {

                    $mail = new PHPMailer(true);
    
                    try {
                        //Configurar el servidor SMTP
                        $mail->isSMTP();
                        $mail->SMTPDebug = 0;  // 0 para no mostrar mensajes de depuración, 2 para monstar
                        $mail->Host = 'smtp.gmail.com';
                        $mail->SMTPAuth = true;
                        $mail->Username = 'alexandergomez41005@gmail.com'; // la direccion de correo electrónico de Gmail
                        $mail->Password = 'mttx okhr kosi trbb'; // La contraseña de la cuenta Gmail
                        $mail->SMTPSecure = "tls";
                        $mail->Port = 587; // El puerto SMTP de Gmail
    
                        //Configurar el remitente y el destinatario
                        $mail->setFrom('alexandergomez41005@gmail.com', 'Politécnico Máximo Gómez');
                        $mail->addAddress('alexandergomez41005@gmail.com', $Name);
    
                        //Configurar el asunto y el cuerpo del correo
                        $mail->isHTML(true);
                        $mail->CharSet = 'UTF-8';
                        $mail->Subject = 'Nueva Solicitud de Admision de '.$Name." ".$lastName;
                        $mail->Body = "
                        <div style=' font-family: sans-serif; color: rgb(59, 59, 59); box-sizing: border-box; padding: 20px; border-radius: 5px; background-color: rgb(245, 245, 245); '>
                            <div style='display: flex; flex-flow: column;'>
                                <h3 style='font-weight: 600;' >Nombre(s):</h3><h3 style='font-weight: 100;'> $name</h3>
                            </div>    
                            <div style='display: flex;'>
                                <h3 style='font-weight: 600;' >Apellido(s):</h3><h3 style='font-weight: 100;'> $lastName</h3>
                            </div> 
                            <div style='display: flex;'>
                                <h3 style='font-weight: 600;' >Email:</h3><h3 style='font-weight: 100;'> $email</h3>
                            </div>
                            <div style='display: flex;'>
                                <h3 style='font-weight: 600;' >Comercio y Mercadeo 1:</h3><h3 style='font-weight: 100;'> $quest_area1</h3>
                            </div>
                            <div style='display: flex;'>
                                <h3 style='font-weight: 600;' >Comercio y Mercadeo 2:</h3><h3 style='font-weight: 100;'> $quest_area2</h3>
                            </div>
                            <div style='display: flex;'>
                                <h3 style='font-weight: 600;' >Contabilidad:</h3><h3 style='font-weight: 100;'> $quest_area3</h3>
                            </div>
                            <div style='display: flex;'>
                                <h3 style='font-weight: 600;' >Informatica:</h3><h3 style='font-weight: 100;'> $quest_area4</h3>
                            </div>
                            <div style='display: flex;'>
                                <h3 style='font-weight: 600;' >Industrias Alimentarias:</h3><h3 style='font-weight: 100;'> $quest_area5</h3>
                            </div>
                            <div style='display: flex;'>
                                <h3 style='font-weight: 600;' >Carrera con mayor puntuacion:</h3><h3 style='font-weight: 100;'> $area_mayor</h3>
                            </div>
                        </div>";
    
                        $query2 = "SELECT * FROM test_ex_psic WHERE email='$gmail'";
                        $validacion = mysqli_query($connection, $query2);
                        // Verifica si existe una solicitud de admisión con el mismo correo electronico. Si hay rechaza la solicitud actual y se lo informa al usuario. De lo contrario envia la solicitud
                        if (mysqli_num_rows($validacion) > 0) {
                            echo '
                            <script>
    
                                alerta = document.querySelector(".alerts");
                                alerta.classList.add("alert-failure");
    
                                if(alerta.className = "alert-failure"){
                                    alerta.style.transition = "all 600ms";
                                    alerta.style.top = "0px"
                                    document.write("Ya existe esta solicitud. Cambie de cuenta de Google para hacer otra solicitud");
                                    setInterval(() => {
                                        alerta.style.transition = "all 300ms";
                                        alerta.style.top = "-50px"
                                        alerta.style.visibility = "hidden";
                                    }, 9000);
                                }
                            </script>
                            ';
                        }else{
                            echo '
                            <script>
    
                                alerta = document.querySelector(".alerts");
                                alerta.classList.add("alert-success");
    
                                if(alerta.className = "alert-success"){
                                    alerta.style.transition = "all 600ms";
                                    alerta.style.top = "0px"
                                    document.write("La Solicitud Se Ha Enviado Correctamente");
                                    setInterval(() => {
                                        alerta.style.transition = "all 300ms";
                                        alerta.style.top = "-50px"
                                        alerta.style.visibility = "hidden";
                                    }, 3000);
                                }
                            </script>
                            ';
                            $mail->send();//Envia el correo al gmail del centro
    
                            $query = "INSERT INTO test_ex_psic(nombre_completo, apellido_completo, email, Comercio_Mercadeo1, Comercio_Mercadeo2, Contabilidad, Informatica, Industrias_Alimentarias, carrera)
                            values('$name','$lastName','$email','$quest_area1', '$quest_area2', '$quest_area3', '$quest_area4', '$quest_area5' , '$area_mayor')";
                            $resultado = mysqli_query($connection, $query);
                        }
                    } catch (Exception $e) {
                        echo 
                        '
                            <script>
                                alerta = document.querySelector(".alerts");
                                alerta.classList.add("alert-failure");
    
                                if(alerta.className = "alert-failure"){
                                    alerta.style.transition = "all 600ms";
                                    alerta.style.top = "0px" 
                                    document.write("Ha Ocurrido Un Error");
                                    setInterval(() => {
                                        alerta.style.transition = "all 300ms";
                                        alerta.style.top = "-50px"
                                        alerta.style.visibility = "hidden";
                                    }, 3000);
                                }
                            </script>
                        ';
                        echo " ".$mail->ErrorInfo;//Si da un error, Imprime el error
                        die();
                    }
                }
            }
            ?>

        </div>
        <div class="all">
            <div class="all__title-main-header">
                <h2>test</h2>
                <h1>Vocacional</h1>
            </div>
            <div class="inf">
                <div class="subtitle-main">
                    <h1>Test para la identificación de intereses vocacionales y profesionales</h1>
                </div>
                <div class="Instructions">
                    <h1><strong>Instrucciones</strong></h1>
                    <h3>1. Lee atentamente cada una de las actividades.</h3>
                    <h3>2. Marca en las columnas “Me Interesa” o “No me interesa” según tu propia decisión. <strong>Recuerda:</strong> Debes marcar en una sola de las columnas.</h3>
                    <h3>3. En general no existen respuestas correctas o incorrectas; lo importante es que contestes con sinceridad y confianza para que puedas conocer mejor tus intereses vocacionales</h3>
                </div>
            </div>
            <form method="POST">
                <label for="">NOMBRE COMPLETO:</label>
                <input type="text" id="user_email" name="name">
                <br>
                <label for="">APELLIDO COMPLETO:</label>
                <input type="text" id="user_email" name="last_name">
                <br>
                <label for="">TU CORREO ELECTRONICO: </label>
                <input type="text" name="email" value="<?php echo $_SESSION['user_email_address'] ?>" id="user_email" readonly>
                <a id="changeAccount" href='./changeAccount.php'>Cambiar de Cuenta</a>
                <br>
                <div>
                    <label for="">1-Diseñar programas de computación y explorar nuevas aplicaciones tecnológicas para uso del Internet
                    </label>
                    <div>
                        <input class="" type="radio" value="40" name="1" id="1"  >
                        <label for="1">Me interesa</label>
                        <input type="radio" name="1" value="0" id="2">
                        <label for="2">No me interesa</label>
                    </div>
                </div>

                <div>
                    <label for="">2-Criar, cuidar y tratar animales domésticos y de campo</label>
                    <div>
                        <input class="" type="radio" value="50" name="2" id="3"  >
                        <label for="3">Me Interesa</label>
                        <input type="radio" name="2" value="0" id="4">
                        <label for="4">No me interesa</label>
                    </div>
                </div>

                <div>
                    <label for="">3-Investigar sobre areas verdes, medio ambiente y cambios climáticos</label>
                    <div>
                        <input class="" type="radio" value="50" name="3" id="5"  >
                        <label for="5">Me interesa</label>
                        <input type="radio" name="3" value="0" id="6">
                        <label for="6">No me interesa</label>
                    </div>
                </div>

                <div>
                    <label for="">4-Ilustrar, dibujar y animar digitalmente</label>
                    <div>
                        <input class="" type="radio" value="10" name="4" id="7"  >
                        <label for="7">Me interesa</label>
                        <input type="radio" name="4" value="0" id="8">
                        <label for="8">No me interesa</label>
                    </div>
                </div>

                <div>
                    <label for="">5-Seleccionar, capacitar y motivar al personal de una organización/empresa</label>
                    <div>
                        <input class="" type="radio" value="30" name="5" id="9"  >
                        <label for="9">Me interesa</label>
                        <input type="radio" name="5" value="0" id="10">
                        <label for="10">No me interesa</label>
                    </div>
                </div>
                <div>
                    <label for="">6-Realizar excavaciones para descubrir restos del pasado</label>
                    <div>
                        <input class="" type="radio" value="20" name="6" id="11"  >
                        <label for="11">Me interesa</label>
                        <input type="radio" name="6" value="0" id="12">
                        <label for="12">No me interesa</label>
                    </div>
                </div>
                <div>
                    <label for="">7-Resolver problemas de cálculo para construir un puente</label>
                    <div>
                        <input class="" type="radio" value="40" name="7" id="13"  >
                        <label for="13">Me interesa</label>
                        <input type="radio" name="7" value="0" id="14">
                        <label for="14">No me interesa</label>
                    </div>
                </div>
                <div>
                    <label for="">8-Diseñar cursos para enseñar a la gente sobre temas de salud e higiene</label>
                    <div>
                        <input class="" type="radio" value="50" name="8" id="15"  >
                        <label for="15">Me interesa</label>
                        <input type="radio" name="8" value="0" id="16">
                        <label for="16">No me interesa</label>
                    </div>
                </div>
                <div>
                    <label for="">9-Tocar un instrumento y componer musica</label>
                    <div>
                        <input class="" type="radio" value="10" name="9" id="17"  >
                        <label for="17">Me interesa</label>
                        <input type="radio" name="9" value="0" id="18">
                        <label for="18">No me interesa</label>
                    </div>
                </div>
                <div>
                    <label for="">10-Planificar cuáles son las metas de una organización pública o privada a mediano y
                        largo plazo</label>
                    <div>
                        <input class="" type="radio" value="30" name="10" id="19"  >
                        <label for="19">Me interesa</label>
                        <input type="radio" name="10" value="0" id="20">
                        <label for="20">No me interesa</label>
                    </div>
                </div>
                <div>
                    <label for="">11-Diseñar y planificar la producción masiva de articulos como muebles, autos, equipos
                        de oficina, empaques y envases para alimentos y otros.</label>
                    <div>
                        <input class="" type="radio" value="40" name="11" id="21"  >
                        <label for="21">Me interesa</label>
                        <input type="radio" name="11" value="0" id="22">
                        <label for="22">No me interesa</label>
                    </div>
                </div>
                <div>
                    <label for="">12-Diseñar logotipos y portadas de una revista</label>
                    <div>
                        <input class="" type="radio" value="10" name="12" id="23"  >
                        <label for="23">Me Interesa</label>
                        <input type="radio" name="12" value="0" id="24">
                        <label for="24">No me interesa</label>
                    </div>
                </div>
                <div>
                    <label for="">13-Organizar eventos y atender a sus asistence</label>
                    <div>
                        <input class="" type="radio" value="20" name="13" id="25"  >
                        <label for="25">Me interesa</label>
                        <input type="radio" name="13" value="0" id="26">
                        <label for="26">No me interesa</label>
                    </div>
                </div>
                <div>
                    <label for="">14-Atender la salud de personas enfermas</label>
                    <div>
                        <input class="" type="radio" value="50" name="14" id="27"  >
                        <label for="27">Me interesa</label>
                        <input type="radio" name="14" value="0" id="28">
                        <label for="28">No me interesa</label>
                    </div>
                </div>
                <div>
                    <label for="">15-Controlar ingresos y egresos de fondos y presentar el balance final de una
                        institución</label>
                    <div>
                        <input class="" type="radio" value="30" name="15" id="29"  >
                        <label for="29">Me interesa</label>
                        <input type="radio" name="15" value="0" id="30">
                        <label for="30">No me interesa</label>
                    </div>
                </div>
                <div>
                    <label for="">16-Hacer experimentos con plantas(frutas, arboles, flores)</label>
                    <div>
                        <input class="" type="radio" value="50" name="16" id="31"  >
                        <label for="31">Me interesa</label>
                        <input type="radio" name="16" value="0" id="32">
                        <label for="32">No me interesa</label>
                    </div>
                </div>
                <div>
                    <label for="">17-Concebir planos para viviendas, edificios y ciudadelas.
                    </label>
                    <div>
                        <input class="" type="radio" value="40" name="17" id="33"  >
                        <label for="33">Me interesa</label>
                        <input type="radio" name="17" value="0" id="34">
                        <label for="34">No me interesa</label>
                    </div>
                </div>
                <div>
                    <label for="">18-Investigar y probar nuevos productos farmacéuticos</label>
                    <div>
                        <input class="" type="radio" value="40" name="18" id="35"  >
                        <label for="35">Me interesa</label>
                        <input type="radio" name="18" value="0" id="36">
                        <label for="36">No me interesa</label>
                    </div>
                </div>
                <div>
                    <label for="">19-Hacer propuestas y formular estrategias para aprovechar las relaciones económicas
                        entre dos países.</label>
                    <div>
                        <input class="" type="radio" value="30" name="19" id="37"  >
                        <label for="37">Me interesa</label>
                        <input type="radio" name="19" value="0" id="38">
                        <label for="38">No me interesa</label>
                    </div>
                </div>
                <div>
                    <label for="">20-Pintar, hacer esculturas, ilustrar libros de arte, etcétera.</label>
                    <div>
                        <input class="" type="radio" value="10" name="20" id="39"  >
                        <label for="39">Me interesa</label>
                        <input type="radio" name="20" value="0" id="40">
                        <label for="40">No me interesa</label>
                    </div>
                </div>
                <div>
                    <label for="">21-Elaborar campañas para introducir un nuevo producto al mercado.
                    </label>
                    <div>
                        <input class="" type="radio" value="30" name="21" id="41"  >
                        <label for="41">Me interesa</label>
                        <input type="radio" name="21" value="0" id="42">
                        <label for="42">No me interesa</label>
                    </div>
                </div>
                <div>
                    <label for="">22-Examinar y tratar los problemas visuales</label>
                    <div>
                        <input class="" type="radio" value="50" name="22" id="43"  >
                        <label for="43">Me interesa</label>
                        <input type="radio" name="22" value="0" id="44">
                        <label for="44">No me interesa</label>
                    </div>
                </div>
                <div>
                    <label for="">23-Defender a clientes individuales o empresas en juicios de diferente
                        naturaleza</label>
                    <div>
                        <input class="" type="radio" value="20" name="23" id="45"  >
                        <label for="45">Me interesa</label>
                        <input type="radio" name="23" value="0" id="46">
                        <label for="46">No me interesa</label>
                    </div>
                </div>
                <div>
                    <label for="">24-Diseñar máquinas que puedan simular actividades humanas</label>
                    <div>
                        <input class="" type="radio" value="40" name="24" id="47"  >
                        <label for="47">Me interesa</label>
                        <input type="radio" name="24" value="0" id="48">
                        <label for="48">No me interesa</label>
                    </div>
                </div>
                <div>
                    <label for="">25-Investigar las causas y efectos de los trastornos emocionales
                    </label>
                    <div>
                        <input class="" type="radio" value="20" name="25" id="49"  >
                        <label for="49">Me interesa</label>
                        <input type="radio" name="25" value="0" id="50">
                        <label for="50">No me interesa</label>
                    </div>
                </div>
                <div>
                    <label for="">26-Supervisar las ventas de un centro comercial
                    </label>
                    <div>
                        <input class="" type="radio" value="30" name="26" id="51"  >
                        <label for="51">Me interesa</label>
                        <input type="radio" name="26" value="0" id="52">
                        <label for="52">No me interesa</label>
                    </div>
                </div>
                <div>
                    <label for="">27-Atender y realizar ejercicios a personas que tienen limitaciones físicas, problemas
                        de lenguaje, etcétera</label>
                    <div>
                        <input class="" type="radio" value="50" name="27" id="53"  >
                        <label for="53">Me interesa</label>
                        <input type="radio" name="27" value="0" id="54">
                        <label for="54">No me interesa</label>
                    </div>
                </div>
                <div>
                    <label for="">28-Prepararse para ser modelo profesional.
                    </label>
                    <div>
                        <input class="" type="radio" value="10" name="28" id="55"  >
                        <label for="55">Me interesa</label>
                        <input type="radio" name="28" value="0" id="56">
                        <label for="56">No me interesa</label>
                    </div>
                </div>
                <div>
                    <label for="">29-Aconsejar a las personas sobre planes de ahorro e inversiones.
                    </label>
                    <div>
                        <input class="" type="radio" value="30" name="29" id="57"  >
                        <label for="57">Me interesa</label>
                        <input type="radio" name="29" value="0" id="58">
                        <label for="58">No me interesa</label>
                    </div>
                </div>
                <div>
                    <label for="">30-Elaborar mapas, planos e imágenes para el estudio y análisis de datos
                        geográficos.
                    </label>
                    <div>
                        <input class="" type="radio" value="40" name="30" id="59"  >
                        <label for="59">Me interesa</label>
                        <input type="radio" name="30" value="0" id="60">
                        <label for="60">No me interesa</label>
                    </div>
                </div>
                <div>
                    <label for="">31-Diseñar juegos interactivos electrónicos para computadora.

                    </label>
                    <div>
                        <input class="" type="radio" value="10" name="31" id="61"  >
                        <label for="61">Me interesa</label>
                        <input type="radio" name="31" value="0" id="62">
                        <label for="62">No me interesa</label>
                    </div>
                </div>
                <div>
                    <label for="">32-Realizar el control de calidad de los alimentos

                    </label>
                    <div>
                        <input class="" type="radio" value="50" name="32" id="63"  >
                        <label for="63">Me interesa</label>
                        <input type="radio" name="32" value="0" id="64">
                        <label for="64">No me interesa</label>
                    </div>
                </div>
                <div>
                    <label for="">33-Tener un negocio propio de tipo comercial.

                    </label>
                    <div>
                        <input class="" type="radio" value="30" name="33" id="65"  >
                        <label for="65">Me interesa</label>
                        <input type="radio" name="33" value="0" id="67">
                        <label for="67">No me interesa</label>
                    </div>
                </div>
                <div>
                    <label for="">34-Escribir artículos periodísticos, cuentos, novelas y otros.

                    </label>
                    <div>
                        <input class="" type="radio" value="20" name="34" id="68"  >
                        <label for="68">Me interesa</label>
                        <input type="radio" name="34" value="0" id="69">
                        <label for="69">No me interesa</label>
                    </div>
                </div>
                <div>
                    <label for="">35-Redactar guiones y libretos para un programa de televisión

                    </label>
                    <div>
                        <input class="" type="radio" value="10" name="35" id="70"  >
                        <label for="70">Me interesa</label>
                        <input type="radio" name="35" value="0" id="71">
                        <label for="71">No me interesa</label>
                    </div>
                </div>
                <div>
                    <label for="">36-Organizar un plan de distribución y venta de un gran almacén.

                    </label>
                    <div>
                        <input class="" type="radio" value="30" name="36" id="72"  >
                        <label for="72">Me interesa</label>
                        <input type="radio" name="36" value="0" id="73">
                        <label for="73">No me interesa</label>
                    </div>
                </div>
                <div>
                    <label for="">37-Estudiar la diversidad cultural en el ámbito rural y urbano

                    </label>
                    <div>
                        <input class="" type="radio" value="20" name="37" id="74"  >
                        <label for="74">Me interesa</label>
                        <input type="radio" name="37" value="0" id="75">
                        <label for="75">No me interesa</label>
                    </div>
                </div>
                <div>
                    <label for="">38-Gestionar y evaluar convenios internacionales de cooperación para el
                        desarrollo social.
                    </label>
                    <div>
                        <input class="" type="radio" value="20" name="38" id="76"  >
                        <label for="76">Me interesa</label>
                        <input type="radio" name="38" value="0" id="77">
                        <label for="77">No me interesa</label>
                    </div>
                </div>
                <div>
                    <label for="">39-Crear campañas publicitarias
                    </label>
                    <div>
                        <input class="" type="radio" value="10" name="39" id="78"  >
                        <label for="78">Me interesa</label>
                        <input type="radio" name="39" value="0" id="79">
                        <label for="79">No me interesa</label>
                    </div>
                </div>
                <div>
                    <label for="">40-Trabajar investigando la reproducción de peces, camarones y otros
                        animales marinos.
                    </label>
                    <div>
                        <input class="" type="radio" value="50" name="40" id="80"  >
                        <label for="80">Me interesa</label>
                        <input type="radio" name="40" value="0" id="81">
                        <label for="81">No me interesa</label>
                    </div>
                </div>
                <div>
                    <label for="">41-Dedicarse a fabricar productos alimenticios de consumo masivo

                    </label>
                    <div>
                        <input class="" type="radio" value="40" name="41" id="82"  >
                        <label for="82">Me interesa</label>
                        <input type="radio" name="41" value="0" id="83">
                        <label for="83">No me interesa</label>
                    </div>
                </div>
                <div>
                    <label for="">42-Gestionar y evaluar proyectos de desarrollo en una institución educativa y/o
                        fundación
                    </label>
                    <div>
                        <input class="" type="radio" value="20" name="42" id="84"  >
                        <label for="84">Me interesa</label>
                        <input type="radio" name="42" value="0" id="85">
                        <label for="85">No me interesa</label>
                    </div>
                </div>
                <div>
                    <label for="">43-Rediseñar y decorar espacios físicos en viviendas, oficinas y locales comerciales.

                    </label>
                    <div>
                        <input class="" type="radio" value="10" name="43" id="86"  >
                        <label for="86">Me interesa</label>
                        <input type="radio" name="43" value="0" id="87">
                        <label for="87">No me interesa</label>
                    </div>
                </div>
                <div>
                    <label for="">44-Administrar una empresa de turismo y/o agencias de viaje.

                    </label>
                    <div>
                        <input class="" type="radio" value="30" name="44" id="88"  >
                        <label for="88">Me interesa</label>
                        <input type="radio" name="44" value="0" id="89">
                        <label for="89">No me interesa</label>
                    </div>
                </div>
                <div>
                    <label for="">45-Aplicar métodos alternativos a la medicina tradicional para atender personas
                        con dolencias de diversa índole.
                    </label>
                    <div>
                        <input class="" type="radio" value="50" name="45" id="90"  >
                        <label for="90">Me interesa</label>
                        <input type="radio" name="45" value="0" id="91">
                        <label for="91">No me interesa</label>
                    </div>
                </div>
                <div>
                    <label for="">46-Diseñar ropa para niños, jóvenes y adultos.
                    </label>
                    <div>
                        <input class="" type="radio" value="10" name="46" id="92"  >
                        <label for="92">Me interesa</label>
                        <input type="radio" name="46" value="0" id="93">
                        <label for="93">No me interesa</label>
                    </div>
                </div>
                <div>
                    <label for="">47-Investigar organismos vivos para elaborar vacunas.

                    </label>
                    <div>
                        <input class="" type="radio" value="50" name="47" id="94"  >
                        <label for="94">Me interesa</label>
                        <input type="radio" name="47" value="0" id="95">
                        <label for="95">No me interesa</label>
                    </div>
                </div>
                <div>
                    <label for="">48-Manejar y/o dar mantenimiento a dispositivos/aparatos tecnológicos
                        en aviones, barcos, radares, etcétera.
                    </label>
                    <div>
                        <input class="" type="radio" value="40" name="48" id="96"  >
                        <label for="96">Me interesa</label>
                        <input type="radio" name="48" value="0" id="97">
                        <label for="97">No me interesa</label>
                    </div>
                </div>
                <div>
                    <label for="">49-Estudiar idiomas extranjeros – actuales y antiguos- para hacer traducción.

                    </label>
                    <div>
                        <input class="" type="radio" value="20" name="49" id="98"  >
                        <label for="98">Me interesa</label>
                        <input type="radio" name="49" value="0" id="99">
                        <label for="99">No me interesa</label>
                    </div>
                </div>
                <div>
                    <label for="">50-Restaurar piezas y obras de arte

                    </label>
                    <div>
                        <input class="" type="radio" value="10" name="50" id="100"  >
                        <label for="100">Me interesa</label>
                        <input type="radio" name="50" value="0" id="101">
                        <label for="101">No me interesa</label>
                    </div>
                </div>
                <div>
                    <label for="">51-Revisar y dar mantenimiento a artefactos eléctricos, electrónicos y
                        computadoras.

                    </label>
                    <div>
                        <input class="" type="radio" value="40" name="51" id="102"  >
                        <label for="102">Me interesa</label>
                        <input type="radio" name="51" value="0" id="103">
                        <label for="103">No me interesa</label>
                    </div>
                </div>

                <div>
                    <label for="">52-Enseñar a niños de 0 a 5 años
                    </label>
                    <div>
                        <input class="" type="radio" value="20" name="52" id="104"  >
                        <label for="104">Me interesa</label>
                        <input type="radio" name="52" value="0" id="105">
                        <label for="105">No me interesa</label>
                    </div>
                </div>

                <div>
                    <label for="">53-Investigar y/o sondear nuevos mercados.
                    </label>
                    <div>
                        <input class="" type="radio" value="30" name="53" id="106"  >
                        <label for="106">Me interesa</label>
                        <input type="radio" name="53" value="0" id="107">
                        <label for="107">No me interesa</label>
                    </div>
                </div>

                <div>
                    <label for="">54-Atender la salud dental de las personas
                    </label>
                    <div>
                        <input class="" type="radio" value="50" name="54" id="108"  >
                        <label for="108">Me interesa</label>
                        <input type="radio" name="54" value="0" id="109">
                        <label for="109">No me interesa</label>
                    </div>
                </div>

                <div>
                    <label for="">55-Tratar a niños, jóvenes y adultos con problemas psicológicos.
                    </label>
                    <div>
                        <input class="" type="radio" value="20" name="55" id="110"  >
                        <label for="110">Me interesa</label>
                        <input type="radio" name="55" value="0" id="111">
                        <label for="111">No me interesa</label>
                    </div>
                </div>
                <div>
                    <label for="">56-Crear estrategias de promoción y venta de nuevos productos ecuatorianos en el
                        mercado internacional.</label>
                    <div>
                        <input class="" type="radio" value="30" name="56" id="112"  >
                        <label for="112">Me interesa</label>
                        <input type="radio" name="56" value="0" id="113">
                        <label for="113">No me interesa</label>
                    </div>
                </div>
                <div>
                    <label for="">57-Planificar y recomendar dietas para personas diabéticas y/o con sobrepeso.
                    </label>
                    <div>
                        <input class="" type="radio" value="50" name="57" id="114"  >
                        <label for="114">Me interesa</label>
                        <input type="radio" name="57" value="0" id="115">
                        <label for="115">No me interesa</label>
                    </div>
                </div>
                <div>
                    <label for="">58-Trabajar en una empresa petrolera en un cargo técnico como control de la
                        producción.</label>
                    <div>
                        <input class="" type="radio" value="40" name="58" id="116"  >
                        <label for="116">Me interesa</label>
                        <input type="radio" name="58" value="0" id="117">
                        <label for="117">No me interesa</label>
                    </div>
                </div>
                <div>
                    <label for="">59-Administrar una empresa (familiar, privada o pública)
                    </label>
                    <div>
                        <input class="" type="radio" value="30" name="59" id="118"  >
                        <label for="118">Me interesa</label>
                        <input type="radio" name="59" value="0" id="119">
                        <label for="119">No me interesa</label>
                    </div>
                </div>
                <div>
                    <label for="">60-Tener un taller de reparación y mantenimiento de carros, tractores,
                        etcétera.</label>
                    <div>
                        <input class="" type="radio" value="40" name="60" id="120"  >
                        <label for="120">Me interesa</label>
                        <input type="radio" name="60" value="0" id="121">
                        <label for="121">No me interesa</label>
                    </div>
                </div>
                <div>
                    <label for="">61-Ejecutar proyectos de extracción minera y metalúrgica.
                    </label>
                    <div>
                        <input class="" type="radio" value="40" name="61" id="122"  >
                        <label for="122">Me interesa</label>
                        <input type="radio" name="61" value="0" id="123">
                        <label for="123">No me interesa</label>
                    </div>
                </div>
                <div>
                    <label for="">62-Asistir a directivos de multinacionales con manejo de varios idiomas.
                    </label>
                    <div>
                        <input class="" type="radio" value="30" name="62" id="124"  >
                        <label for="124">Me interesa</label>
                        <input type="radio" name="62" value="0" id="125">
                        <label for="125">No me interesa</label>
                    </div>
                </div>
                <div>
                    <label for="">63-Diseñar programas educativos para niños con discapacidad.
                    </label>
                    <div>
                        <input class="" type="radio" value="20" name="63" id="126"  >
                        <label for="126">Me interesa</label>
                        <input type="radio" name="63" value="0" id="127">
                        <label for="127">No me interesa</label>
                    </div>
                </div>
                <div>
                    <label for="">64-Aplicar conocimientos de estadística en investigaciones en diversas áreas (social,
                        administrativa, salud, etcétera.)</label>
                    <div>
                        <input class="" type="radio" value="40" name="64" id="128"  >
                        <label for="128">Me interesa</label>
                        <input type="radio" name="64" value="0" id="129">
                        <label for="129">No me interesa</label>
                    </div>
                </div>
                <div>
                    <label for="">65-Fotografiar hechos históricos, lugares significativos, rostros, paisajes para el
                        área publicitaria, artística, periodística y social</label>
                    <div>
                        <input class="" type="radio" value="10" name="65" id="130"  >
                        <label for="130">Me interesa</label>
                        <input type="radio" name="65" value="0" id="131">
                        <label for="131">No me interesa</label>
                    </div>
                </div>
                <div>
                    <label for="">66-Trabajar en museos y bibliotecas nacionales e internacionales.
                    </label>
                    <div>
                        <input class="" type="radio" value="20" name="66" id="132"  >
                        <label for="132">Me interesa</label>
                        <input type="radio" name="66" value="0" id="133">
                        <label for="133">No me interesa</label>
                    </div>
                </div>
                <div>
                    <label for="">67-Ser parte de un grupo de teatro.
                    </label>
                    <div>
                        <input class="" type="radio" value="10" name="67" id="134"  >
                        <label for="134">Me interesa</label>
                        <input type="radio" name="67" value="0" id="135">
                        <label for="135">No me interesa</label>
                    </div>
                </div>
                <div>
                    <label for="">68-Producir cortometrajes, spots publicitarios, programas educativos, de ficción,
                        etcétera.
                    </label>
                    <div>
                        <input class="" type="radio" value="10" name="68" id="136"  >
                        <label for="136">Me interesa</label>
                        <input type="radio" name="68" value="0" id="137">
                        <label for="137">No me interesa</label>
                    </div>
                </div>
                <div>
                    <label for="">69-Estudiar la influencia entre las corrientes marinas y el clima y sus consecuencias
                        ecológicas.</label>
                    <div>
                        <input class="" type="radio" value="50" name="69" id="138"  >
                        <label for="138">Me interesa</label>
                        <input type="radio" name="69" value="0" id="139">
                        <label for="139">No me interesa</label>
                    </div>
                </div>
                <div>
                    <label for="">70-Conocer las distintas religiones, su filosofía y transmitirlas a la comunidad en
                        general
                    </label>
                    <div>
                        <input class="" type="radio" value="20" name="70" id="140"  >
                        <label for="140">Me interesa</label>
                        <input type="radio" name="70" value="0" id="141">
                        <label for="141">No me interesa</label>
                    </div>
                </div>
                <div>
                    <label for="">71-Asesorar a inversionistas en la compra de bienes/acciones en mercados nacionales e
                        internacionales.
                    </label>
                    <div>
                        <input class="" type="radio" value="30" name="71" id="142"  >
                        <label for="142">Me interesa</label>
                        <input type="radio" name="71" value="0" id="143">
                        <label for="143">No me interesa</label>
                    </div>
                </div>
                <div>
                    <label for="">72-Estudiar grupos étnicos, sus costumbres, tradiciones, cultura y compartir sus
                        vivencias.</label>
                    <div>
                        <input class="" type="radio" value="20" name="72" id="144"  >
                        <label for="144">Me interesa</label>
                        <input type="radio" name="72" value="0" id="145">
                        <label for="145">No me interesa</label>
                    </div>
                </div>
                <div>
                    <label for="">73-Explorar el espacio sideral, los planetas , características y componentes.
                    </label>
                    <div>
                        <input class="" type="radio" value="40" name="73" id="146"  >
                        <label for="146">Me interesa</label>
                        <input type="radio" name="73" value="0" id="147">
                        <label for="147">No me interesa</label>
                    </div>
                </div>
                <div>
                    <label for="">74-Mejorar la imagen facial y corporal de las personas aplicando diferentes técnicas.
                    </label>
                    <div>
                        <input class="" type="radio" value="50" name="74" id="148"  >
                        <label for="148">Me interesa</label>
                        <input type="radio" name="74" value="0" id="149">
                        <label for="149">No me interesa</label>
                    </div>
                </div>
                <div>
                    <label for="">75-Decorar jardines de casas y parques públicos.

                    </label>
                    <div>
                        <input class="" type="radio" value="10" name="75" id="150"  >
                        <label for="150">Me interesa</label>
                        <input type="radio" name="75" value="0" id="151">
                        <label for="151">No me interesa</label>
                    </div>
                </div>
                <div>
                    <label for="">76-Administrar y renovar menúes de comidas en un hotel o restaurante.
                    </label>
                    <div>
                        <input class="" type="radio" value="50" name="76" id="152"  >
                        <label for="152">Me interesa</label>
                        <input type="radio" name="76" value="0" id="153">
                        <label for="153">No me interesa</label>
                    </div>
                </div>
                <div>
                    <label for="">77-Trabajar como presentador de televisión, locutor de radio y televisión, animador de
                        programas culturales y concursos. </label>
                    <div>
                        <input class="" type="radio" value="10" name="77" id="154"  >
                        <label for="154">Me interesa</label>
                        <input type="radio" name="77" value="0" id="155">
                        <label for="155">No me interesa</label>
                    </div>
                </div>
                <div>
                    <label for="">78-Diseñar y ejecutar programas de turismo.
                    </label>
                    <div>
                        <input class="" type="radio" value="20" name="78" id="156"  >
                        <label for="156">Me interesa</label>
                        <input type="radio" name="78" value="0" id="157">
                        <label for="157">No me interesa</label>
                    </div>
                </div>
                <div>
                    <label for="">79-Administrar y ordenar (planificar) adecuadamente la ocupación del espacio
                        físico de ciudades, países etc., utilizando imágenes de satélite, mapas.
                    </label>
                    <div>
                        <input class="" type="radio" value="40" name="79" id="158"  >
                        <label for="158">Me interesa</label>
                        <input type="radio" name="79" value="0" id="159">
                        <label for="159">No me interesa</label>
                    </div>
                </div>
                <div>
                    <label for="">80-Organizar, planificar y administrar centros educativos

                    </label>
                    <div>
                        <input class="" type="radio" value="30" name="80" id="160"  >
                        <label for="160">Me interesa</label>
                        <input type="radio" name="80" value="0" id="161">
                        <label for="161">No me interesa</label>
                    </div>
                </div>

                <button type="submit" name="submit">Enviar</button>



            </form>
        </div>
    </main>
    <footer>
        <div class="footer">
            <div class="top-footer">
                <img src="../images/Logo.avif" alt="" />
                <div class="title-pmg">
                    <h1>POLITECNICO MAXIMO GOMEZ</h1>
                </div>
                <div class="address-pmg">
                    <h3>Carretera Máximo Gómez El Llano, Baní, República Dominicana</h3>
                </div>
                <div class="contacts-pmg">
                    <div class="container-contacts">
                        <span class="material-symbols-outlined"><img src="../images/call.png" alt=""></span>
                        <h3>(809) 380-1718</h3>
                    </div>
                    <div class="container-contacts">
                        <span class="material-symbols-outlined"><img src="../images/email.png" alt=""></span>
                        <h3>pmaximogomez2000@gmail.com</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom-footer">
            <div class="social-media-pmg">
                <div class="title-bottom">
                    <h1>Redes Sociales - PMG</h1>
                </div>
                <div>
                    <a id="logo-link" href="https://www.instagram.com/politecnico_maximo_gomez/" target="_blank"><img
                            src="../images/logo-ig.avif" alt="" /></a>
                    <a target="_blank" href="https://www.instagram.com/politecnico_maximo_gomez/"
                        id="text-link">Instagram</a>
                </div>
                <div>
                    <a id="logo-link" href="https://www.facebook.com/PolitecnicoMaximoGomezOficial/"
                        target="_blank"><img src="../images/logo-fb.png" alt="" /></a>
                    <a target="_blank" id="text-link"
                        href="https://www.facebook.com/PolitecnicoMaximoGomezOficial/">Facebook</a>
                </div>
                <div>
                    <a id="text-link" class="link_privacy_policies" href="./privacy_policies.php">Politicas de Privacidad</a>
                </div>
            </div>
            <div class="founders-page">
                <div class="title-founders">
                    <h1>Creadores de la Página</h1>
                </div>
                <div class="second-title-founders">
                    <h1>6toC (Informática) - 2022-2023</h1>
                </div>
                <div>
                    <h3>- Alexander Gómez Peña</h3>
                    <a target="_blank" href="https://www.instagram.com/aleexx._.g/"><img src="../images/logo-ig.avif"
                            alt="" /></a>
                </div>
                <div>
                    <h3>- José Joelmy Guerrero</h3>
                    <a target="_blank" href="https://www.instagram.com/joelmy_15_/"><img src="../images/logo-ig.avif"
                            alt="" /></a>
                </div>
                <div>
                    <h3>- Jwarly Vargas Percel</h3>
                    <a href=""><img src="../images/logo-ig.avif" alt="" /></a>
                </div>
                <div>
                    <h3>- Rober Mejia Samboy</h3>
                    <a href="https://www.instagram.com/mees_roberz/" target="_blank">
                        <img src="../images/logo-ig.avif" alt="" />
                    </a>
                </div>
                <a href="../php/collaborators.php">Ver detalles y colaboradores</a>
            </div>
        </div>
        <div class="copyright">
            <h1>Politécnico Máximo Gómez-Fundada el 14 de Febrero del 2000 - Todos Los Derechos Reservados ©2023</h1>
        </div>
        </div>
    </footer>
    <script type="text/javascript">
        //Este bloque permite eliminar un bug con la posición del menu cuando scrolleas hacia abajo, su función se describe de la siguiente manera: se guarda cada objecto HTML en una variable, entonces header.classList.toggle("header-secundary-active", window.scrollY >= 90) se traduce a: el elemento HTML header quiero q accedas a su atributo class y que intercambies una clase si el usuario scrollea 90 pixeles en el EJE-Y y le añade la clase o se la elimina dependiendo si cumple la condición.
        window.addEventListener("scroll", function () {
            var short_menu = document.querySelector(".container-short_menu")
            var header = document.querySelector(".header-secundary")
            var title = document.querySelector(".all__title-main-header")
            header.classList.toggle("header-secundary-active", window.scrollY >= 90)
            title.classList.toggle("title-main-active", window.scrollY >= 90)
            short_menu.classList.toggle("short_menu-active", window.scrollY >= 90)
        })
    </script>
    <script src="../JS/burger-bar.js"></script>
</body>

</html>