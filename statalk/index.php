<!DOCTYPE HTML>
<!--
        Big Picture by HTML5 UP
        html5up.net | @n33co
        Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>


<script language="JavaScript" type="text/javascript">

function validateForm() {
    var nome = document.forms["myForm"]["nome"].value;
    var cognome = document.forms["myForm"]["cognome"].value;
    var affiliazione = document.forms["myForm"]["affiliazione"].value;
    var email = document.forms["myForm"]["email"].value;
    var nome = nome.replace(/^\s+|\s+$/gm,'');
    var cognome = cognome.replace(/^\s+|\s+$/gm,'');
    var affiliazione = azienda.replace(/^\s+|\s+$/gm,'');
    var email = email.replace(/^\s+|\s+$/gm,'');
    if (nome==null || nome=="") {
        alert("Campo Nome obbligatorio");
        return false;
    }
    if (cognome==null || cognome=="") {
        alert("Campo Cognome obbligatorio");
        return false;
    }
    if (affiliazione==null || affiliazione=="") {
        alert("Campo affiliazione obbligatorio");
        return false;
    }
    if (email==null || email=="") {
        alert("Campo email obbligatorio");
        return false;
    }
    var atpos = email.indexOf("@");
    var dotpos = email.lastIndexOf(".");
    if (atpos< 1 || dotpos<atpos+2 || dotpos+2>=x.length) {
        alert("Not a valid e-mail address");
        return false;
    }
}
</script>



		<title>Statalk</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
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
</map>
				<!-- Logo -->
					<h1 id="logo"></h1>
                                
				
	
			<!-- Nav -->
					<nav id="nav">

                                             <ul>
                                                <li><a href="#iscrizione">Iscrizione</a></li>
                                                <li><a href="#contatti">Contatti</a></li>
                                            </ul>  
						
					</nav>



			</header>
<?php
 $servername = "agda";
 $username = "statalk";
 $password = "st4t4lk";
 $dbname = "statalk";

  $link=mysql_pconnect($servername, $username, $password)  or die ("Connection error");
     mysql_select_db($dbname,$link) or die ("Can't connect to database ".$dbname);

$result = mysql_query("SELECT COUNT(*) FROM iscrizioni");
$row = mysql_fetch_assoc($result);
$size = $row['COUNT(*)'];
 
 ?>			

 <section id="iscrizione" class="main style3 secondary">
                        <div class="content container">
                                <header><h2>Statalk</h2>
                                        <h2>Iscrizione</h2>
             
                                        <p>Completa i campi sottostanti per procedere all'iscrizione (*=obbligatori)</p>
                                        <p></p>


 <!-- Contact Form -->
              <form name ="myForm" method="post" action="iscrivi.php" onsubmit="return validateForm()" >
               <div class="row 50%">
               <div class="6u"><input type="text" name="nome" placeholder="(*)Nome" onkeypress="return restrictCharacters(this, event, alphaOnly);" /></div>
               <div class="6u"><input type="text" name="cognome" placeholder="(*)Cognome" onkeypress="return restrictCharacters(this, event, alphaOnly);" /></div>
               <div class="6u"><input type="text" name="affiliazione" placeholder="(*)Affiliazione" onkeypress="return restrictCharacters(this, event, alphaOnly);" /></div>
               <div class="6u"><input type="email" name="email" placeholder="(*)Email" /></div>
               <div class="6u"><input type="text" name="web" placeholder="Web" onkeypress="return restrictCharacters(this, event, webOnly);" /></div>
<div class="6U"> </div><br>
               <div class="6U">Consenso alla pubblicazione del nome come partecipante <input type="radio" name="pub" value="1" checked>Si&nbsp;<input type="radio" name="pub" value="0">No</div><br>
               <div class="6U">Consenso a ricevere comunicazioni relative ad iniziative analoghe<input type="radio" name="new" value="1" checked>Si&nbsp;<input type="radio" name="new" value="0">No</div><br>
                                                        </div>
                                                        <div class="row">
                                                                <div class="12u">
                                                                        <ul class="actions">
                                                                                <li><input type="submit" name="submit" value="Send" /></li>
                                                                        </ul>
<div class="6U"><p style="font-size: small"></div>

                                                                </div>
                                                        </div>
                                                </form>

                        </section>

<section id="contatti" class="main style2 right dark fullscreen">
                                <div class="content box style2">
                                        <header>
                                        <h2>Contatti</h2>
                                                                                </header>
<p align="left">Per informazioni: <a href="mailto: "></a>
                                </div>
                        </section>


		<!-- Footer -->
			<footer id="footer">

				<!-- Icons -->
				 <!--       <ul class="actions">
						<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
				 		<li><a href="#" class="icon fa-google-plus"><span class="label">Google+</span></a></li>
						<li><a href="#" class="icon fa-dribbble"><span class="label">Dribbble</span></a></li>
						<li><a href="#" class="icon fa-pinterest"><span class="label">Pinterest</span></a></li>
						<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
					</ul>   -->

				<!-- Menu -->
					<ul class="menu">
						<li>&copy; Dipartimento di Scienze Statistiche</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
					</ul>
			
			</footer>

	</body>
</html>
