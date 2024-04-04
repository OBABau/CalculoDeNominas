<?php
session_start();

if(!isset($_SESSION['cantidad'])){
    $_SESSION['cantidad'] = '4';
}

if ($_SERVER["REQUEST_METHOD"] == "POST") { // Verificar si se ha enviado el formulario
    $_SESSION['cantidad'] = $_POST['num']; // Asignar el valor de $_POST['num'] a $_SESSION['cantidad']
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    
    <link rel="icon" type="image/x-icon" href="../../img/img/logo.png">
    <title>Axis-Videos</title>
    <link rel="stylesheet" href="../../css/gwen.css">
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            list-style: none;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <header class="nav-bar">
        <div class="navbarTitulo"><a href="../../iniciado.php" class="active">TFT</a></div>
        <input type="checkbox" id="nav_check" hidden>
            <nav class="barra-vid">
                <ul>
                    <li>
                        <a href="videosHelp.php">Volver</a>
                    </li>
                    <li>
                        <a href="Axis.php">Axis</a>
                    </li>
                    <li>
                        <a href="Nominas.php">Canal de nóminas</a>
                    </li>
                    <li>
                        <a href="NominasO.php">Otro canal de nóminas</a>
                    </li>
                </ul>
            </nav>
            <label for="nav_check" class="hamburger">
                <div></div>
                <div></div>
                <div></div>
            </label>
    </header>


    <div class="buscar">
        <form action="Nominas.php" method="POST">
            <label>Ampliar el contenido: </label>
            <input type="number" name="num" placeholder ="Ingrese un número" min="0" max="60" step="1" required>
            <input type="submit" value = "Buscar...">
        </form>
    </div>


    <div class="Videos">
        <?php
        $contenido = $_SESSION['cantidad'];
        $key   = "AIzaSyChb7MYA9o1gU9ngF0f-Vs4L-Uz4wtXFGI";
        $link  = "https://www.googleapis.com/youtube/v3/search?key=".$key."&channelId=UCU7cs6EF6VAUKCrgnxCUzVg&part=snippet,id&order=date&maxResults=".$contenido."";
        $json  = file_get_contents($link); 
        $array = json_decode($json, true);
        foreach($array['items'] as $element){
            echo '<div class="box">';
            $videoId = $element['id']['videoId'];
            $videoUrl = "https://www.youtube.com/watch?v=" . $videoId;
            $embedUrl = "https://www.youtube.com/embed/" . $videoId;
            
            echo "<a class='video-link' href='" . $videoUrl . "' target='_blank'>";
            echo "<iframe width='560' height='315' src='" . $embedUrl . "' frameborder='0' allowfullscreen></iframe>";
            echo "</a> <br>";
            
            $titulo = $element['snippet']['title'];
            echo "<a id='tit' href='" . $videoUrl . "' target='_blank'>" . $titulo . "</a> <br>";
            echo substr($element['snippet']['description'], 0, 100) . "... <br>";
            echo "<br> Publicado " . substr($element['snippet']['publishedAt'], 0, 10);
            echo '</div>';
        }
        ?>
    </div>
</body>
</html>