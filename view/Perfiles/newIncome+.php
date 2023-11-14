<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../../css/newIncome+.css">
</head>
<body>
    <header>
        <h1>Registro de un nuevo tipo de ingreso</h1>
        <a href="creacionPerfiles.php" class="regresar-button">Regresar</a>
    </header>
    <div class="option"></div>

    <form method="POST" action="../../app/addIncome+.php">
        <label for="incomeName">Nombre:</label>
        <input type="text" name="incomeName" id="incomeName" maxlength="30">
        <br>
        <label for="incomeDescription">Descripción:</label>
        <input type="text" name="incomeDescription" id="incomeDescription" maxlength="100">
        <input type="submit" value="Enviar">
    </form>
</body>
</html>
