<html>
	<head>
		<title>LOGIN - PROJECTE LDAP</title>
		<style>
			body {
				font-family: Arial, sans-serif;
				background-color: #717D7E ;
			}
			form {
				margin: 50px auto;
				padding: 20px;
				width: 300px;
				border: 1px solid #ccc;
				background-color: #BDC3C7;
			}
			label {
				display: block;
				margin-bottom: 10px;
				
			}
			input[type="text"], input[type="password"] {
				padding: 5px;
				width: 100%;
				border: 1px solid #ccc;
				border-radius: 4px;
				box-sizing: border-box;
			}
			input[type="submit"], input[type="reset"] {
				background-color: #3498DB ;
				color: #fff;
				padding: 10px 20px;
				border: none;
				border-radius: 4px;
				cursor: pointer;
			}
			input[type="submit"]:hover, input[type="reset"]:hover {
				background-color: #45a049;
			}
		</style>
	</head>
	<body>
		<form action="http://zend-luruci.fjeclot.net/app/auth.php" method="POST">
			<label for="adm">Usuari amb permisos d'administració LDAP:</label>
			<input type="text" name="adm" id="adm"><br>
			<label for="cts">Contrasenya de l'usuari:</label>
			<input type="password" name="cts" id="cts"><br>
			<input type="submit" value="Envia" />
			<input type="reset" value="Neteja" />
		</form>
		<p style="text-align:center;">Data i hora: <?php echo date("d/m/Y H:i:s"); ?></p>
	</body>
</html> 