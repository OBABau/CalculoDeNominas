<?php
include('../../app/sesion.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/gwen.css">

    <link rel="icon" type="image/x-icon" href="../../img/img/logo.png">
    
    <title>Creacion de Empleado</title>
</head>

<body>

    <div class="sidebar">
        <div class="headerSidebar">
            <img class="logoImg" src="../../img/img/logo.png" alt="Imagen Logo">
            <div class="tituloSidebar">NÓMINAS</div>
        </div>
        <div class="userSidebar">
            <?php echo "Bienvenido," .$_SESSION['start']. "!" ; ?> 
          
        </div>
        <div class="sidebarContent">
            <a href="../../iniciado.php"><i class="fa fa-home"></i> &nbsp;Inicio</a>
            <a href="../Empleado/listaEmpleados.php"><i class="fa fa-arrow-left"></i> &nbsp;Regresar</a>
            <a href="../ayuda.php">&nbsp;<i class="fa fa-info"></i> &nbsp;Ayuda</a>
        </div>

        <form class="sidebarFooter" action="../../app/logout.php" method="post">
            <button class="btnSalir" type="submit">Cerrar Sesion</button>
        </form>
    </div>

    <div class="contenido">  
    <?php
            // Verificar si hay un error de correo en uso
            if (isset($_GET['error']) && $_GET['error'] === 'email_en_uso') {
                $error_message = '<p class="error">Este correo electrónico ya está en uso.</p>';
            } 
        ?>       
        <div class="login-container2">
            <div class="loginHeader">
                <h2>Registrar Nuevo Empleado</h2>
            </div>

            <div class="loginBody">                
                <form class="login-form" method="POST" action="../../app/add/addEmpleado.php">      
                    
                    <div class="formRow">
                        <label class="lblinput" for="nombre">Nombre:</label>
                        <input class="input" type="text" id="nombre" name="nombre" maxlength="50"
                            placeholder="Ingrese el Nombre" required>
                    </div>        
                    <div class="formRow">
                        <label class="lblinput" for="apPat">Apellido Paterno:</label>
                        <input class="input" type="text" id="apPat" name="apPat" maxlength="30"
                            placeholder="Ingrese Apellido Paterno" required>
                    </div>                              
            
            <div class="formRow">
                <label class="lblinput" for="apMat">Apellido Materno:</label>
                <input class="input" type="text" id="apMat" name="apMat" maxlength="30"
                    placeholder="Ingrese Apellido Materno" required>
            </div>          

                    <div class="formRow">                        
                        <label class="lblinput" for="rfc">RFC:</label>                        
                        <input class="input" type="text" name="rfc" id="rfc" 
                        title="Debe ingresar exactamente 13 caracteres alfanuméricos"  maxlength="13" required>
                    </div>
                    

                    <div class="formRow">
                        <label class="lblinput" for="nss">NSS:</label>
                        <input class="input" type="text" id="nss" name="nss"
                         pattern="\d{11}" title="Debe ingresar exactamente 11 dígitos" minlength="11" maxlength="11" required>
                    </div>        

                    <div class="formRow">
                        <label class="lblinput" for="curp">CURP:</label>
                        <input class="input" type="text" id="curp" name="curp" pattern="[(A-Za-z)0-9]{18}"
                        title="Debe ingresar un CURP válido" minlength="18" maxlength="18" required>
                    </div>        
                    
                <div class="formRow">
                    <label class="lblinput" for="phone">Número de Teléfono:</label>
                    <input class="input" type="text" id="phone" name="phone"  pattern="\d{10}"
                    title="Debe ingresar exactamente 12 dígitos" minlength="10" maxlength="10"required>
                </div>        

        
            <div class="formRow">
                <label class="lblinput" for="mail">Email:</label>
                <input class="input" type="email" id="mail" name="mail" placeholder="ejemplo@dominio.com" required pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.(com)">
            </div>        
            
            <div class="formRow">
                <label class="lblinput" for="pass">Contrasena:</label>
                <input class="input" type="password" id="pass" name="pass" required>
            </div>        
  
                    <div class="formRow">
                        <label class="lblinput" for="perfiles">Perfiles</label>
                        <select class="form-select" name="perfiles">
                            <?php
                          include ('../../data/perfiles.php');
                          $perfil = new perfiles();
                          $consulta = $perfil->showProfiles();
                          
                          while ($tupla = mysqli_fetch_assoc($consulta))
                          {
                          echo $tupla['name'];
                
                          echo "<option name = '".$tupla['name']."' value  = ".$tupla['code']."> ".$tupla['name']."</option>";
                          }
                        ?>
                        </select>
                    </div>                                           
                    <div class="formRow">
                    <?php if (!empty($error_message)) { ?>
                            <div class="error"><?php echo $error_message; ?></div>
                        <?php } ?>
                        <br>
                        <br>
                        <button class="boton1" type="Submit" value="Enviar">Registrar</button>
                    </div>                
                </form>
            </div>

        </div>
        </form>
    </div>
</body>

</html>