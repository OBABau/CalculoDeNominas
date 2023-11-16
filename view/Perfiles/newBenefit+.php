<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../../css/newIncome+.css">
</head>
<body>
    <header>
        <h1>Registro de un nuevo tipo de prestacion</h1>
        <a href="creacionPerfiles.php" class="regresar-button">Regresar</a>
    </header>
    <div class="option"></div>

    <form method="POST" action="../../app/addBenefits.php">
        <label for="incomeName">Nombre:</label>
        <input type="text" name="benefitName" id="benefitName" maxlength="30">
        <br>
        <label for="incomeDescription">Descripción:</label>
        <input type="text" name="benefitDescription" id="benefitDescription" maxlength="100">
        <input type="submit" value="Enviar">
    </form>
</body>
</html>
