<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,700&display=swap"
      rel="stylesheet">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
  <link rel="stylesheet" href="../css/gwen.css">
  <link rel="icon" type="image/x-icon" href="../../img/img/logo.png">

  <title>Login Administrador</title>
</head>

<body>
<nav>
  <div class="sidebar">
      <div class="headerSidebar">
          <img class="logoImg" src="../../img/img/logo.png" alt="Imagen Logo">
          <div class="tituloSidebar">NÓMINAS</div>
      </div>
      <div class="userSidebar">
      </div>
      <div class="sidebarContent">
          <a href="../iniciado.php"><i class="fa fa-user"></i> &nbsp;Inicio</a>
      </div>
      <form class="sidebarFooter" action="../app/logout.php" method="post">
                <button class="btnSalir" type="submit">Cerrar Sesion</button>
            </form>
  </div>
  
<div class="contenido">
  <h1>Panel de administrador</h1>
    <div class="contenidoBody">
      <a class="enlaceCard" href="Admin/desactivarCuentas.php">
        <div class="card">
        <div class="circle-img2">
          <img src="../img/iconosfinales/desactivarEmpresa.png" alt="Imagen Grafica">
        </div>
        <div class="card-text">
          <p>Desactivar Cuentas</p>
        </div>        
    </div>
    </a>
    <a class="enlaceCard" href="Admin/reactivarUsuarios.php">
        <div class="card">
        <div class="circle-img2">
          <img src="../img/iconosfinales/reactivarUser.png" alt="Imagen Grafica">
        </div>
          <div class="card-text">
            <p>Reactivar cuentas</p>
          </div>        
        </div>
    </a>
    <a class="enlaceCard" href="Admin/verFAQs.php">
        <div class="card">
        <div class="circle-img2">
          <img src="../img/iconosfinales/FAQ.png" alt="Imagen Grafica">
        </div>
          <div class="card-text">
            <p>FAQ Usuarios</p>
          </div>        
        </div>
    </a>

    <a class="enlaceCard" href="Admin/actualizarEmpresas.php">
        <div class="card">
        <div class="circle-img2">
          <img src="../img/iconosfinales/actualizarEmpresa.png" alt="Imagen Grafica">
        </div>
          <div class="card-text">
            <p>Desactivar contrato Empresas</p>
          </div>        
        </div>
    </a>
    <a class="enlaceCard" href="Admin/reactivarEmpresas.php">
        <div class="card">
        <div class="circle-img2">
          <img src="../img/iconosfinales/actualizarEmpresa.png" alt="Imagen Grafica">
        </div>
          <div class="card-text">
            <p>Reactivar contrato Empresa</p>
          </div>        
        </div>
    </a>
</div>
</body>

</html>
