<!DOCTYPE html>
<html>
<head>
	<title>Projecte LDAP</title>
	<style>
		body {
			font-family: 'Arial', sans-serif;
			margin: 40px;
			background-color: #717D7E ;

		}
		button {
			background-color: #1E90FF;
			color: #fff;
			border: none;
			border-radius: 4px;
			padding: 10px 20px;
			font-size: 16px;
			cursor: pointer;
			display: block;
			margin: 0 auto;
		}
		button:hover {
			background-color: #0066CC;
		}
	</style>
</head>
<body>
	<header>
		<h1>Aplicació d'accés a bases de dades LDAP</h1>
	</header>
	<main>
		<p>Per accedir a la base de dades LDAP, cal que iniciïs sessió amb un usuari vàlid.</p>
		<p>Si no tens un usuari vàlid, contacta amb l'administrador per obtenir-ne un.</p>
		<form action="login.php">
		<button>Inicia sessió</button>
	</main>
</body>
</html>
