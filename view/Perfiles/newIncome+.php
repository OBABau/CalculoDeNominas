<!DOCTYPE html>
<html>

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="../../css/gwen.css">
    <link rel="icon" type="image/x-icon" href="../../img/img/logo.png">

    <title>Registro Tipo Ingreso</title>
</head>

<body>

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
        <form class="sidebarFooter" action="app/logout.php" method="post">
            <button class="btnSalir" type="submit">Cerrar Sesion</button>
        </form>
    </div>           

    <div class="contenido">            
        <div class="login-container">
            <div class="loginHeader">
                <h1>Registro de un Nuevo Tipo de Ingreso</h1>                
            </div>

            <div class="loginBody">                
                <form class="login-form" method="POST" action="../../app/addIncome+.php">                    
                    <div class="formRow">
                        <label class="lblinput" for="incomeName">Nombre:</label>
                        <i class="fa fa-envelope"></i>
                        <input class="input" type="text" id="incomeName" name="incomeName" maxlength="30"
                            placeholder="Ingrese el Nombre del Ingreso">
                    </div>
                    <div class="formRow">
                        <label class="lblinput" for="profileDescription">Descripción:</label>
                        <i class="fa fa-user"></i>
                        <input class="input" type="text" id="profileDescription" name="profileDescription" maxlength="100"
                            placeholder="Descripcion del Ingreso">
                    </div>          
                    <div class="formRow">                        
                        <label class="lblinput" for="incomeAmount">Cantidad:</label>                        
                        <input class="inputNumber" type="number" name="incomeAmount" id="incomeAmount" maxlength="100"
                        placeholder="0">
                    </div>
                    <div class="formRow">
                        <label class="lblinput" for="operacion">Operacion:</label>            
                        <select class="form-select" name="operacion">
                            <option name="null" selected>Ninguna</option>
                            <option name="addition">+</option>
                            <option name="multiplication">*</option>
                            <option name="division">/</option>
                            <option name="substraction">-</option>
                          </select>                    
                    </div>          
                    <div class="formRow">
                        <button class="boton1" type="Submit" value="Enviar">Registrar</button>
                    </div>                
                </form>
            </div>

        </div>
    
       
    </div>
</body>

</html>