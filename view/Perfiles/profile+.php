<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="icon" type="image/x-icon" href="../img/img/logo.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="../../css/gwen.css">
    <title>Perfiles</title>
</head>

<body>
    <header>
        <div class="sidebar">
            <div class="headerSidebar">
                <img class="logoImg" src="../../img/img/logo.png" alt="Imagen Logo">
                <div class="tituloSidebar">NÓMINAS</div>
            </div>
            <hr>
            <div class="bienvenidoSideBar">
        <?php
                    session_start();
                    echo "Bienvenido: ";
                    echo $_SESSION['start'];
                ?> 
                  </div>
            <div class="sidebarContent">                
                <a href="../Empresa/loginEmpresa.php"><i class="fa fa-home"></i> &nbsp;Panel Empresa</a>
                <a href="creacionPerfiles.php"><i class="fa fa-arrow-left"></i> &nbsp;Regresar</a>
                <a href="../ayuda.php">&nbsp;<i class="fa fa-info"></i> &nbsp;Ayuda</a>
            </div>
            <form class="sidebarFooter" action="../../app/logout.php" method="post">
                <button class="btnSalir" type="submit">Cerrar Sesion</button>
            </form>
        </div>
    </header>

    <div class="contenido2">
        <h1>Perfiles</h1>       
        <table class="table table-striped table-hover">
        <?php
           include("../../data/ingresosYConsultas+.php");
           $myobject = new ingresosYConsultas();
           $consulta = $myobject->getProfiles();
           $perfil = new ingresosYConsultas();
           if($consulta != 'error')
           {       
               while($tupla = mysqli_fetch_assoc($consulta))
               {   
                   $consulta2 = $myobject->getIncomes();
                   echo "<table class=\"table table-striped table-hover\">";
                   echo "<tr class='font-weight-bold primary table-primary'>";
                   echo "<th>Codigo</th>";
                   echo "<th>Nombre</th>";
                   echo "<th>Descripcion</th>";
                   echo "<th>Sueldo</th>";
                   echo "</tr>";
                   
                   echo "<td>".$tupla['code']."</td>";
                   echo "<td>".$tupla['name']."</td>";
                   echo "<td>".$tupla['description']."</td>";
                   echo "<td>".$tupla['income']."</td>";
                   echo '</tr>';
                   echo "</table>";
           ?>
           <form method = "POST" action = "pruebasPerfiles.php">
           
               <?php
                   echo "<label class=\"font-weight-bold primary table-primary\" >Prestaciones</label>";
                   echo "<br> ";
           
                   $consulta2 = $myobject->getBenefits();
                   while ($tupla2 = mysqli_fetch_assoc($consulta2)){
                       $checked = $perfil->setCheckboxes($tupla2['code'],$tupla['code'], "benefits");
                       if($checked)
                       {
                       echo '<label>  
                       <input type= "checkbox" id = "ingresos" name = '.$tupla['code'].'[] value = "'.$tupla2['name'].'" checked > '.$tupla2['name'].'
                       </label>';
                       }
                       else
                       {
                           echo '<label>
                       <input type= "checkbox" id = "ingresos" name = '.$tupla['code'].'[] value = "'.$tupla2['name'].'" > '.$tupla2['name'].'
                       </label>'; 
                       }
                       echo '<span style="margin-right: 30px;"></span>';
                       
                   }
                   echo "<br>";
                   echo "<br>";
                   }
               }
           
               
                       ?>
                <br>
                <br>
                <br>
               <button class = "btnPerfiles" type = "submit" name  = "Enviar">Enviar</button>
           </body>
        </div>   
        </form>

    </div>
</body>

</html>