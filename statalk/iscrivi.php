<!DOCTYPE HTML>
<!--
        Big Picture by HTML5 UP
        html5up.net | @n33co
        Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
        <head>        
                <script src="js/jquery.min.js"></script>
                <script src="js/jquery.poptrox.min.js"></script>
                <script src="js/jquery.scrolly.min.js"></script>
                <script src="js/jquery.scrollgress.min.js"></script>
                <script src="js/skel.min.js"></script>
                <script src="js/init.js"></script>
                <noscript>
                        <link rel="stylesheet" href="css/skel.css" />
                        <link rel="stylesheet" href="css/style.css" />
                        <link rel="stylesheet" href="css/style-wide.css" />
                        <link rel="stylesheet" href="css/style-normal.css" />
                </noscript>
                <!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->

</head>
<body>

                <!-- Header -->
<header id="header">

                                 <h1 id="logo"><img src="images/logo.gif" align="left" alt="" usemap="#Map">
                                 <map name="Map" id="Map">
    <area alt="Universit&agrave; degli Studi di Padova" title="Universit&agrave; degli Studi di Padova" href="http://www.unipd.it" target="_blank" shape="rect" coords="0,0,231,105" />
    <area alt="Dipartimento di Scienze Statistiche" title="Dipartimento di Scienze Statistiche" href="http://www.stat.unipd.it" target="_blank" shape="rect" coords="233,0,349,105" />

                                <!-- Nav -->
                                        <nav id="nav">
                                                <ul>
                                                        <li><p align="right"><a href="index.php">Home</a></li>
                                                        <!--li><a href="#lista">Lista dei partecipanti</a></li-->
                                                </ul>
                                        </nav>

                        </header>
<!-- Intro -->
                        <section id="email" class="main email white fullscreen">
                                <div class="content container 75%">
                                        <header>
                                                <h2><b>Conferma Iscrizione</b></h2>
                                        </header>

<?php
function generateToken($length = 24) {
        if(function_exists('openssl_random_pseudo_bytes')) {
            $token = base64_encode(openssl_random_pseudo_bytes($length, $strong));
            if($strong == TRUE)
                return strtr(substr($token, 0, $length), '+/=', '-_,'); //base64 is about 33% longer, so we need to truncate the result
        }

        //fallback to mt_rand if php < 5.3 or no openssl available
        $characters = '0123456789';
        $characters .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        $charactersLength = strlen($characters)-1;
        $token = '';

        //select some random characters
        for ($i = 0; $i < $length; $i++) {
            $token .= $characters[mt_rand(0, $charactersLength)];
        }

        return $token;
}
function insertData($nome,$cognome,$email,$affiliazione,$web,$pub,$new,$token,$token_md5) {
     $servername = "agda";
     $username = "statalk";
     $password = "st4t4lk";
     $dbname = "statalk";

     $link=mysql_pconnect($servername, $username, $password)  or die ("Connection error");
     mysql_select_db($dbname,$link) or die ("Can't connect to database ".$dbname);

    // $query=mysql_query($query,$link)
    //     or die ("Impossibile eseguire la richiesta $query<br>");

     //while ($valori=mysql_fetch_array($query)) {
     //   $email=$valori["email"];
     //   echo $email;
    // }

$query = mysql_query("SELECT count(*) FROM iscrizioni where email='$email'",$link);
$row = mysql_fetch_array($query);
    if($row[0]>0)
    {
     $query2 = mysql_query("SELECT * FROM iscrizioni where email='$email'",$link);
     while ($valori=mysql_fetch_array($query2)) {
        $confermato=$valori["confermato"];
        if ($confermato==1) {
          echo"L'indirizzo email indicato risulta gi&agrave; correttamente iscritto";
          exit;
          } else {
             echo "Non hai ancora confermato la tua iscrizione.";
          exit;
          }
     } }
 else {
    $sql = "INSERT INTO iscrizioni
            (email,nome,cognome,affiliazione,web,pubblicazione,comunicazioni,confermato)
            VALUES ( '$email', '$nome','$cognome','$affiliazione','$web','$pub','$new','0')";

    if (!mysql_query($sql,$link)) {
      echo "Error: " . $sql . "<br>" . mysql_error($link);
    }

    $sql2 = "INSERT INTO iscrizioni_temp
            (id,email,token,md5url)
            VALUES ( NULL, '$email', '$token','$token_md5')";

    if (!mysql_query($sql2,$link)) {
      echo "Error: " . $sql2 . "<br>" . mysql_error($link);
    }
  }

     mysql_close($link);
 }
    $nome = $_POST['nome'];
    $cognome = $_POST['cognome'];
    $affiliazione = $_POST['affiliazione'];
    $email = $_POST['email'];
    $pub = $_POST['pub'];
    $new = $_POST['new'];
    $web = $_POST['web'];
    $token=generateToken();
    $link="http://statalk.stat.unipd.it/confirm.php?token=$token&email=$email";
    $token_md5=md5($link);
    $oggetto="Conferma iscrizione a Statalk";
    $intestazione = "From: Statalk - NOREPLY - <noreply@stat.unipd.it>\r\n";
    $messaggio="Gentile $nome $cognome abbiamo ricevuto la richiesta di iscrizione al seminario Statalk.\n\r
Per confermare l'iscrizione cliccare sul seguente link: $link \n\r
Se hai ricevuto questa email per errore puoi ignorarla o segnalarla all'indirizzo \n\r
Se vuoi cancellare la tua iscrizione manda un'email a \n\r
";
    insertData($nome,$cognome,$email,$affiliazione,$web,$pub,$new,$token,$token_md5);
    mail($email, $oggetto, $messaggio, $intestazione);
    echo "<b>Grazie $nome $cognome per esserti iscritto.<br>
   Per perfezionare la tua iscrizione controlla l'email e segui le istruzioni</b>";
?>

