<!DOCTYPE html>
<html lang="es">
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
    <title>Registro de Empresas</title>    
    <link rel="stylesheet" href="../../css/gwen.css">
</head>
<body>    
    <?php
    session_start();
    ?>
    <nav class="navbar">
        <div class="navbarHeader">
            <div class="navbarTitulo">GESTION DE NOMINA</div>
        </div>
        
        <div class="navbarCuerpo">                              
            <a class="enlaceNavbar sombraTexto1" href="../../index.php"> &nbsp;Inicio<i class="fa fa-chevron-down"></i></a>
            
        </div>
    </nav>

<div class="cuerpo">

    <div class="login-container4">
        <div class="loginHeader">
            <h2>Registro de Informacion de las Empresas</h2>
        </div> 

        <div class="loginBody">
            <form class="login-form" method="post" action="../../data/addEmpresa2.php">
                <div class="formRow">
                    <label class="lblinput" for="nombre">Nombre de la Empresa:</label>
                    <i class="fa fa-industry"></i>
                    <input class="input" type="text" id="nombre" name="nombre" maxlength="50"
                        placeholder="Ingrese el nombre de la empresa" required>
                </div>                       

                <div class="formRow">
                    <label class="lblinput" for="nombre_fiscal">Nombre Fiscal:</label>
                    <input class="input" type="text" id="nombre_fiscal" name="nombre_fiscal" maxlength="50"
                        placeholder="Ingrese el nombre fiscal" required>
                </div>

                <div class="formRow">
                    <label class="lblinput" for="rfc">RFC:</label>
                    <input class="input" type="text" id="rfc" name="rfc" maxlength="14"
                        placeholder="Ingrese el RFC" required>
                </div>                          
                
                <div class="formRow">
                    <label class="lblinput" for="rfc">Dirección:</label>
                    <input class="input" type="text" id="direccion" name="direccion" maxlength="100"
                        placeholder="Ingrese Direccion" required>
                </div>              

                <div class="formRow">
                    <label class="lblinput" for="codigo_postal">Código Postal:</label>
                    <input class="input" type="text" id="codigo_postal" name="codigo_postal" maxlength="9"
                        placeholder="Ingrese CP" required>
                </div>              

                <div class="formRow">
                    <label class="lblinput" for="rfc">Ciudad:</label>
                    <input class="input" type="text" id="ciudad" name="ciudad" maxlength="40"
                        placeholder="Ingrese Ciudad" required>
                </div>              

                <div class="formRow">
                    <label class="lblinput" for="estado">Estado:</label>
                    <input class="input" type="text" id="estado" name="estado" maxlength="40"
                        placeholder="Ingrese Estado" required>
                </div>                                                           
                <div class="formRow">
                    <button class="boton2" type="Submit" name="registrarEmpresa">Registrar Empresa</button>
                </div>                    
            </form>
            
        </div>
    </div>

    
     
</div>
<br>
<br>
<br>
<br>
<div class="footer">
    <div class="mensajeFooter">            
        No nos hacemos responsables por el mal uso de la información aquí presentada.
        <br>
        2023 &copy; GESTION DE NOMINA            
    </div>
</div>
</body>
</html>