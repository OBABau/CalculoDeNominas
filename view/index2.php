<?php
include('../app/sesion.php');
?>
<html>
    <head>
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/contrato.css" type = "text/css">
        <link rel="stylesheet" href="../css/contrato2.css">
        
    </head>
    <header>
    <div class="login">
            <?php echo "Bienvenido," .$_SESSION['start']. "!" ; ?> 
           
        </div>
        <div class= "logo">GESTION NOMINA</div>
        <div class="bars">
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
        </div>
        <nav class="nav-bar">
            <ul>
                <li>
                    <a href = "../index.php">Inicio</a>
                </li>
                <li>
                    <a href = "index2.php">Contratar Servicio</a>
                </li>
                <li>
              <form action="../app/logout.php" method="post">
                <button type="submit">Logout</button>
            </form>
                </li>
            </ul>
        </nav>
    </header>
    <div class="textoInfo">
        <h1>PAGINA DONDE SE MOSTRARAN LOS PLANES PARA CONTRATAR EL SERVICIO</h1>
    </div>
    <div class = "container">
        <div class  = "card">
            <figure>
                <img src="../img/paquete1.jpg">
            </figure>
            <div class = "contenido">
                <h1>Plan 1</h1>
                <p>PAQUETE EN DESAROLLO (ESTE PAQUETE HARA QUE TU CUENTA CUENTE CON UN CONTRATO POR 1 MES)</p>
                <br><br><br><br>
                <a href="../app/contratarServicio.php" class = "c"> Contratar Servicio</a>
            </div>
        </div>
        <div class  = "card">
            <figure>
                <img src="../img/paquete2.jpg">
            </figure>
            <div class = "contenido">
                <h1>Plan 2</h1>
                <p>PROXIMAMENTE, PAQUETE EN DESAROLLO (AQUI PODRAS SELECCIONAR EL PLAN DEPENDIENDO, CADA PLAN TENDRA TIEMPOS DE CONTRATO DIFERENTES
                    EN ESTE CASO EL PAQUETE 2 SERA POR 1 AÑO).</p>
                <br>
              
            </div>
        </div>
    </div>
</html>

