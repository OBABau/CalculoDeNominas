<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="../css/gwen.css">

    <link rel="icon" type="image/x-icon" href="../img/img/logo.png">
    <title>Ayuda</title>    
</head>

<body>
    <div class="sidebar">
        <div class="headerSidebar">
            <img class="logoImg" src="../img/img/logo.png" alt="Imagen Logo">
            <div class="tituloSidebar">NÓMINAS</div>
        </div>

        <div class="userSidebar">
        </div>

        <div class="sidebarContent">
            <a href="../iniciado.php"><i class="fa fa-home"></i> &nbsp;Inicio</a>            
        </div>
    </div>

    <div class="contenido">
        <html lang="en">
        <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formulario de Ayuda</title>
        </head>
        <body>

        <h2>Formulario de Ayuda</h2>

        <form action="../app/addAyuda.php" method="post">
            <label for="titulo">Título del Problema:</label>
            <input type="text" id="titulo" name="tit-prob" required>
            <br><br><br>
            <label for="descripcion">Descripción del Problema:</label>
            <br><br>
            <textarea id="descripcion" name="descripcion" rows="4" required></textarea>
            <br>

            <input type="submit" value="Enviar">
        </form>
    </div>

</body>

</html>