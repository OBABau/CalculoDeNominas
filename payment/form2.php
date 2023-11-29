<?php
include('../app/sesion.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/gwen.css">
    
    <link rel="icon" type="image/x-icon" href="../img/img/logo.png">
    <title>Forma de pago</title>
</head>
<body>
    <nav class="navbar">
        <div class="navbarHeader">
            <div class="navbarTitulo">TFT</div>
            <div class="login">
            <?php echo "Bienvenido," .$_SESSION['start']. "!" ; ?>            
        </div>
        </div>
        
        <div class="navbarCuerpo">            
            <a class="enlaceNavbar sombraTexto1" href="../iniciado.php">Inicio <i class="fa fa-chevron-down"></i></a>
           
        </div>

        <div class="navbarFooter">
            <form class="formNavbar" action="../app/logout.php" method="post">
                <button class="btnNavbar" type="submit">Logout</button>
            </form>
        </div>
    </nav>

    <div class="cuerpo">
        <div class="login">
                      
        </div>

        <div class="login-container4">
            <div class="loginHeader">
                <h2>Datos de pago</h2>
                <br>   
                <h4>Datos personales</h4>
            </div> 

            <div class="loginBody">
                <form class="login-form" method="post" action="addPayment2.php">
                    <div class="formRow">
                        <label class="lblinput" for="name">Nombre del titular:</label>
                        <i class="fa fa-user"></i>
                        <input class="input" type="text" id="name" name="name" maxlength="50"
                            placeholder="Ingrese nombre" required>
                    </div>
                    <div class="formRow">
                        <label class="lblinput" for="cardNumber">Numero de la tarjeta (16 digitos):</label>
                        <i class="fa fa-key"></i>
                        <input class="input" type="text" id="cardNumber" name="cardNumber" pattern="\d{16}" title="Ingresa 16 digitos" minlength="16" maxlength="16" required>
                    </div>
                    <div class="formRow">
                        <label class="lblinput" for="cvv">CVV (3 digitos):</label>
                        <i class="fa fa-key"></i>
                        <input class="input" type="text" id="cvv" name="cvv"pattern="\d{3}" title="Ingresa 3 digitos" minlength="3" maxlength="3" required>
                    </div>          
                    <div class="formRow">
                        <label class="lblinput" for="expirationDate">Fecha de expiración(MM/YY):</label>
                        <i class="fa fa-key"></i>
                        <input class="input" type="text" id="expirationDate" name="expirationDate" pattern="\d{2}/\d{2}" title="Ingresa fecha valida (MM/YY)" minlength="5"  maxlength="5" required>
                    </div> 
                    <div class="formRow">
                        <button class="boton2" type="Submit" value="submit" name="registrarEmpresa">Pagar</button>
                    </div>                    
                </form>
                
            </div>
        </div>
    </div>        
</body>
</html>