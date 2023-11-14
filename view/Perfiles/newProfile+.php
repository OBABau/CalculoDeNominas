<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../../css/newIncome+.css">
</head>
<body>
    <header>
        <h1>Registro de un nuevo tipo de perfil</h1>
        <a href="creacionPerfiles.php" class="regresar-button">Regresar</a>
    </header>
    <div class="option"></div>

    <form method="POST" action="../../app/addProfile.php">
        <label for="profileName">Nombre:</label>
        <input type="text" name="profileName" id="profileName" maxlength="30">
        <br>
        <label for="profileDescription">Descripción:</label>
        <input type="text" name="profileDescription" id="profileDescription" maxlength="100">
        <input type="submit" value="Enviar">
    </form>
</body>
</html>
