<?php
	require 'vendor/autoload.php';
	use Laminas\Ldap\Attribute;
	use Laminas\Ldap\Ldap;
	
	ini_set('display_errors', 0);
	#
	# Atribut a modificar --> Número d'idenficador d'usuari
	#
	if ($_POST['uid'] && $_POST['ou'] && isset($_POST['atribut']) && $_POST['nouAtribut']){

		$uid= $_POST['uid'];
		$ou = $_POST['ou'];
		$atribut = $_POST['atribut'];
		$nou_contingut = $_POST['nouAtribut'];
		// echo $atribut;
		// $atribut='uidNumber'; # El número identificador d'usuar té el nom d'atribut uidNumber
		// $nou_contingut=6000;
		#
		# Entrada a modificar
		#
		// $uid = 'usr2';
		// $unorg = 'usuaris';
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
		# Modificant l'entrada
		#
		$ldap = new Ldap($opcions);
		$ldap->bind();
		$entrada = $ldap->getEntry($dn);
		if ($entrada){
			Attribute::setAttribute($entrada,$atribut,$nou_contingut);
			$ldap->update($dn, $entrada);
			echo "Atribut modificat"; 
		} else echo "<b>Aquesta entrada no existeix</b><br><br>";	
	}

?>
<html>
<head>
<title>
	MODIFICAR D'ATRIBUTS D'USUARI - PROJECTE LDAP
</title>
<style>
    
    
    body {
            font-family: Arial, sans-serif;
			background-color: #717D7E ;
            margin: 0;
            padding: 0;
        }
        h2 {
            color: #333333;
            text-align: center;
            margin: 30px 0;
        }
    #form-container {
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #7FB3D5 ;
    padding: 20px;
    margin: auto; 
    width: 700px;
    position: absolute; 
    top: 15%; 
    left: 28%; 
}

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        label {
            margin: 10px 0;
            display: inline-flex;
            align-items: center;
        }
        label input[type='radio'] {
            margin-right: 10px;
        }
        input[type="text"] {
            margin: 10px 0;
            padding: 10px;
            width: 300px;
            border-radius: 5px;
            border: 1px solid #ccc;
            outline: none;
        }
        button {
            margin: 20px 0;
            padding: 10px;
            width: 200px;
            background-color: #428bca;
            color: #ffffff;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #3071a9;
        }
        .result {
            margin-top: 20px;
            font-weight: bold;
            color: green;
        }
        .error {
            margin-top: 20px;
            font-weight: bold;
            color: red;
        }
</style>
</head>
<body>
	<h2>Formulari de modificació d'atributs d'usuari</h2>
    <div id="form-container">
	<form action="modificarUsuari.php" method="POST">
		UID: <input type="text" name="uid"><br>
		Unitat organitzativa: <input type="text" name="ou"><br><br>
		<b><label for="atributs">Selecciona l'atribut que vols modificar: </label></b><br>
		
		<label for="atributs"><input type="radio" name="atribut" id="atributs" value="uidNumber" />uidNumber</label><br>
		
		<label for="atributs"><input type="radio" name="atribut" id="atributs" value="gidNumber" />gidNumber</label><br>
		
        <label for="atributs"><input type="radio" name="atribut" id="atributs" value="homeDirectory" />Directori Personal</label><br>

		<label for="atributs"><input type="radio" name="atribut" id="atributs" value="loginShell" />Shell</label><br>

        <label for="atributs"><input type="radio" name="atribut" id="atributs" value="cn" />cn</label><br>

        <label for="atributs"><input type="radio" name="atribut" id="atributs" value="sn" />sn</label><br>

		<label for="atributs"><input type="radio" name="atribut" id="atributs" value="givenName" />givenName</label><br>
		
        
        <label for="atributs"><input type="radio" name="atribut" id="atributs" value="postalAddress" />postalAddress</label><br>
		
		<label for="atributs"><input type="radio" name="atribut" id="atributs" value="mobile" />mobile</label><br>
		
        <label for="atributs"><input type="radio" name="atribut" id="atributs" value="telephoneNumber" />telephoneNumber</label><br>
		
        <label for="atributs"><input type="radio" name="atribut" id="atributs" value="title" />title</label><br>

        <label for="atributs"><input type="radio" name="atribut" id="atributs" value="description" />description</label>
		<br><br>
		<label>Introdueix el nou contingut: </label><br><br>
		<input type="text" name="nouAtribut" />
        <button type="submit">Modificar atribut</button>
        <button type="reset">Restaura</button><br><br>
		<br><a href="http://zend-luruci.fjeclot.net/app/menu.php">Tornar a al menú</a>
	</form>    </div>
</body>
</html>