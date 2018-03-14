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
                                                        <li><a href="index.php">Home</a></li>
                                                        <!--li><a href="#lista">Lista dei partecipanti</a></li-->
                                                </ul>
                                        </nav>

                        </header>
<!-- Intro -->
                        <section id="conferma" class="main conferma white fullscreen">
                                <div class="content container 75%">
                                        <header>
                                                <h2><b>Conferma Iscrizione</b></h2>
                                        </header>

<?php
$email=$_GET["email"];
$token=$_GET["token"];

if (!preg_match("/^[a-zA-Z0-9@.]*$/",$email)) {
echo "email ERROR";
exit;
}
if (!preg_match("/^[-0-9_a-zA-Z.]*$/",$token)) {
echo "token ERROR";
exit;
}
$servername = "agda";
$username = "statalk";
$password = "st4t4lk";
$dbname = "statalk";

$link=mysql_pconnect($servername, $username, $password)  or die ("Connection error");
$sql="SELECT count(*) FROM iscrizioni_temp where email='$email' and token='$token'";
mysql_select_db($dbname,$link) or die ("Can't connect to database ".$dbname);
$query=mysql_query($sql,$link);
$row = mysql_fetch_array($query);
if($row[0]>0) {
   $sql="UPDATE iscrizioni set confermato=1 where email='$email'";
   $link=mysql_pconnect($servername, $username, $password)  or die ("Connection error");
   mysql_select_db($dbname,$link) or die ("Can't connect to database ".$dbname);
   $query=mysql_query($sql,$link)
      or die ("Impossibile eseguire la richiesta $query<br>");
   $sql="DELETE from iscrizioni_temp where email='$email'";
   $link=mysql_pconnect($servername, $username, $password)  or die ("Connection error");
   mysql_select_db($dbname,$link) or die ("Can't connect to database ".$dbname);
   $query=mysql_query($sql,$link)
      or die ("Impossibile eseguire la richiesta $query<br>");

} else {
  echo "ERROR (2) Token Error or Email already confirmed";
  exit;
}

echo "Grazie per esserti iscritto a Statalk";
?>

