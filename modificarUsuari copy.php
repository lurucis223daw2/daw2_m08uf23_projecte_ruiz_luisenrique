<html>
<head>
    <title>MODIFICAR D'ATRIBUTS D'USUARI - PROJECTE LDAP</title>
    <style>
    
        body {
            font-family: Arial, sans-serif;
            background-color: #428bca;
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
    background-color: #333424;
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
        <label for="uid">UID:</label>
        <input type="text" name="uid" id="uid">
        <label for="ou">Unitat organitzativa:</label>
        <input type="text" name="ou" id="ou">   
        <b><label for="atributs">Selecciona l'atribut que vols modificar:</label></b>
        <label for="atributs"><input type="radio" name="atribut" id="atributs" value="uidNumber">uidNumber<input type="radio" name="atribut" id="atributs" value="gidNumber">gidNumber</label>
        <label for="atributs"><input type="radio" name="atribut" id="atributs" value="homeDirectory">Directori Personal<input type="radio" name="atribut" id="atributs" value="loginShell">Shell</label>
        <label for="atributs"><input type="radio" name="atribut" id="atributs" value="cn">cn<input type="radio" name="atribut" id="atributs" value="sn">sn</label>
        <label for="atributs"><input type="radio" name="atribut" id="atributs" value="givenName">givenName<input type="radio" name="atribut" id="atributs" value="postalAddress">postalAddress</label>
        <label for="atributs"><input type="radio" name="atribut" id="atributs" value="mobile">mobile<input type="radio" name="atribut" id="atributs" value="telephoneNumber">telephoneNumber</label>
        <label for="atributs"><input type="radio" name="atribut" id="atributs" value="title">title<input type="radio" name="atribut" id="atributs" value="description">description</label>
        <br><br>
		<label>Introdueix el nou contingut: </label><br><br>
		<input type="text" name="nouAtribut" />
        <button type="submit">Modificar atribut</button>
        <button type="reset">Restaura</button><br><br>
		<br><a href="http://zend-luruci.fjeclot.net/app/menu.php">Tornar a al menú</a>
    </form>
    </div>
</body>
</html>