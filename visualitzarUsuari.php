<?php
require 'vendor/autoload.php';
use Laminas\Ldap\Ldap;
ini_set('display_errors',0);
if ($_GET['usr'] && $_GET['ou']){
    $domini = 'dc=fjeclot,dc=net';
    $opcions = [
        'host' => 'zend-luruci.fjeclot.net',
        'username' => "cn=admin,$domini",
        'password' => 'fjeclot',
        'bindRequiresDn' => true,
        'accountDomainName' => 'fjeclot.net',
        'baseDn' => 'dc=fjeclot,dc=net',
    ];
    $ldap = new Ldap($opcions);
    $ldap->bind();
    $entrada='uid='.$_GET['usr'].',ou='.$_GET['ou'].',dc=fjeclot,dc=net';
    $usuari=$ldap->getEntry($entrada);
    echo "<b><u>".$usuari["dn"]."</b></u><br>";
    foreach ($usuari as $atribut => $dada) {
        if ($atribut != "dn") echo $atribut.": ".$dada[0].'<br>';
    }
}
?>
<html>
<head>
<title>
MOSTRANT DADES D'USUARIS DE LA BASE DE DADES LDAP
</title>
</head>
<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #717D7E ;
		}
		h2 {
			color: #333333;
			text-align: center;
			margin-top: 50px;
		}
		form {
			margin: 20px auto;
			width: 50%;
			padding: 20px;
			background-color: #ffffff;
			border-radius: 5px;
			box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.5);
		}
		label {
			display: block;
			margin-bottom: 10px;
			font-weight: bold;
			color: #333333;
		}
		input[type="text"] {
			width: 100%;
			padding: 10px;
			border: 10px;
			border-radius: 5px;
			background-color: #BDC3C7;
		}
		input[type="submit"],
		input[type="reset"] {
			display: inline-block;
			margin-top: 20px;
			padding: 10px;
			background-color: #428bca;
			color: #ffffff;
			text-align: center;
			text-decoration: none;
			border: none;
			border-radius: 5px;
			cursor: pointer;
		}
		input[type="submit"]:hover,
		input[type="reset"]:hover {
			background-color: #3071a9;
		}
		a {
			display: block;
			margin-top: 20px;
			padding: 10px;
			width: 100%;
			background-color: #428bca;
			color: #ffffff;
			text-align: center;
			text-decoration: none;
			border-radius: 5px;
		}
		a:hover {
			background-color: #3071a9;
		}
	</style>
<body>
<h2>Formulari de selecció d'usuari</h2>
<form action="visualitzarUsuari.php" method="GET">
Unitat organitzativa: <input type="text" name="ou"><br>
Usuari: <input type="text" name="usr"><br>
<input type="submit"/>
<input type="reset"/><br>
<a href="http://zend-luruci.fjeclot.net/app/menu.php">Tornar a al menú</a>
</form>
</body>
</html>
