<?php
require 'vendor/autoload.php';
use Laminas\Ldap\Attribute;
use Laminas\Ldap\Ldap;

ini_set('display_errors', 0);
#
# Entrada a esborrar: usuari 3 creat amb el projecte zendldap2
#
if ($_POST['uid']&& $_POST['ou']){
    $uid= $_POST['uid'];
    $ou = $_POST['ou'];
    // $uid = 'usr3';
    // $ou = 'usuaris';
    $dn = 'uid='.$uid.',ou='.$ou.',dc=fjeclot,dc=net';
    #
    #Opcions de la connexió al servidor i base de dades LDAP
    $opcions = [
        'host' => 'zend-luruci.fjeclot.net',
        'username' => 'cn=admin,dc=fjeclot,dc=net',
        'password' => 'fjeclot',
        'bindRequiresDn' => true,
        'accountDomainName' => 'fjeclot.net',
        'baseDn' => 'dc=fjeclot,dc=net',
    ];
    #
    # Esborrant l'entrada
    #
    $ldap = new Ldap($opcions);
    $ldap->bind();
    try{
        $ldap->delete($dn);
        echo "<b>Entrada esborrada</b><br>";
    } catch (Exception $e){
        echo "<b>Aquesta entrada no existeix</b><br>";
    }
}
?>
    <html>
    <html>
<head>
	<title>ELIMINAR USUARI - PROJECTE LDAP</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f2f2f2;
		}
		h2 {
			color: #333333;
			text-align: center;
			margin-top: 50px;
		}
		form {
			margin: 0 auto;
			max-width: 400px;
			background-color: #ffffff;
			padding: 20px;
			border-radius: 5px;
			box-shadow: 0px 2px 4px rgba(0,0,0,0.3);
		}
		label {
			display: block;
			margin-bottom: 10px;
			color: #333333;
		}
		input[type="text"], input[type="submit"], input[type="reset"] {
			display: block;
			margin-bottom: 20px;
			width: 100%;
			padding: 10px;
			border-radius: 5px;
			border: 1px solid #cccccc;
			box-sizing: border-box;
		}
		input[type="submit"], input[type="reset"] {
			background-color: #428bca;
			color: #ffffff;
			border: none;
			cursor: pointer;
		}
		input[type="submit"]:hover, input[type="reset"]:hover {
			background-color: #3071a9;
		}
		a {
			display: block;
			margin-top: 20px;
			text-align: center;
			color: #428bca;
			text-decoration: none;
            font-weight: bold;

		}
		a:hover {
			text-decoration: underline;
		}
	</style>
</head>
<body>
	<h2>Formulari de eliminació d'usuari</h2>
	<form action="eliminarUsuari.php" method="POST">
		<label for="uid">UID:</label>
		<input type="text" name="uid" id="uid">
		<label for="ou">Unitat organitzativa:</label>
		<input type="text" name="ou" id="ou">
		<input type="submit" value="Eliminar usuari">
		<input type="reset">
		<a href="http://zend-luruci.fjeclot.net/app/menu.php">Tornar al menú</a>
	</form>
</body>
</html>

