<?php
include('app/sesion.php');
?>
<html>
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    
    
    <link rel="icon" type="image/x-icon" href="../img/img/logo.png">
    <link rel="stylesheet" href="css/gwen.css">
    <title>Iniciado</title>
</head>

<body>
    <nav class="navbar">
        <div class="navbarHeader">
            <div class="navbarTitulo">TFT</div>

            <div class="mensajeSesion">                 
              <?php echo "Bienvenido, " .$_SESSION['start']. "!" ; ?> 
            </div>
        </div>
        
        <div class="navbarCuerpo">            
            <?php
            include ('data/Empresa.php');
            $empresa = new Empresa();
            $consulta = $empresa->getEnterpriseFromUser();
            while ($tupla = mysqli_fetch_assoc($consulta))
            {
                
                if($userType == 1) 
                {
                echo '<a class="enlaceNavbar sombraTexto1" href="view/loginAdmin.php">Panel de Administrador <i class="fa fa-chevron-down"></i></a>';
                } 
                elseif($userType == 2) 
                {
                    echo '<a class="enlaceNavbar sombraTexto1" href="view/Empleado/loginEmpleado.php">Panel de Empleado<i class="fa fa-chevron-down"></i></a>';
                }
                elseif ($userType == 3 && is_null($tupla['enterprise']))
                {
                    header('location: view/Empresa/registrarEmpresas2.php');
                }
                elseif($userType == 3) 
                {
                    include_once('data/conexionDB.php');
                    $myobject = new ConexionDB();
                    $result = $myobject->connect();
                    if($result)
                    {
                        $consult = $myobject->execquery("select * from user where email ='".$_SESSION['start']."'");
                        $tupla = mysqli_fetch_assoc($consult);
                        if ($tupla['active'] == 1)
                        {                         
                            echo '<a class="enlaceNavbar sombraTexto1" href="view/Empresa/loginEmpresa.php">Panel de Empresa<i class="fa fa-chevron-down"></i></a>';
                        }
                        else
                        {
                            echo '<a class="enlaceNavbar sombraTexto1" href="view/index2.php">Contratar Servicio<i class="fa fa-chevron-down"></i></a>';
                        }
                    }
                }
            }
                ?>
        </div>

        <div class="navbarFooter">
            <form class="formNavbar" action="app/logout.php" method="post">
                <button class="btnNavbar" type="submit">Cerrar Sesión</button>
            </form>
        </div>
    </nav>

    <div class="bienvenida">
            <?php
                if($userType == 3){
                    include_once('data/conexionDB.php');
                    $myobject2 = new ConexionDB();
                    $result2 = $myobject2->connect();
                    if($result2)
                    {
                        $consult2 = $myobject2->execquery("SELECT * FROM user WHERE email ='".$_SESSION['start']."'");
                        $tupla2 = mysqli_fetch_assoc($consult2);
                        if ($tupla2['active'] == 1){
                            echo '
                            <br><br><br>
                            <h1 class="text-center font-weight-bold mt-4 titulo11">BIENVENIDO</h1>
                            <p class="text-center subtitulo22">¡Gracias por unirte a TFT!</p>
                            <h1 class="text-center font-weight-bold mt-4 titulo10">¿Qué hago ahora?</h>
                            <p class="text-center2">Empieza por ver estos sencillos videos para tu rápida capacitación con nuestra página!</p>
                        
                            <div class="contenedorCarrousel mx-auto mt-4">
                                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                                </ol>
                                <div class="carousel-inner sombra">
                                    <div class="carousel-item active">
                                        <a href="https://www.youtube.com/watch?v=RxphN4jn0Pc&t=3s"><img class="d-block w-100" src="img/img/AgregarEmpleados.gif" alt="First slide"></a>
                                        </div>
                                        <div class="carousel-item">
                                        <a href="https://youtu.be/k5omWcwAzWY?si=9v0aMLa_3aw8Cwig"><img class="d-block w-100" src="img/img/crearPerfiles.png" alt="First slide"></a>
                                        </div>
                                        <div class="carousel-item">
                                        <a href="https://www.youtube.com/watch?v=JWUGiSve0KA"><img class="d-block w-100" src="img/img/EntradaYSalida.gif" alt="First slide"></a>
                                        </div>
                                        <div class="carousel-item">
                                        <a href="https://www.youtube.com/watch?v=ulyo_UTYjxs"><img class="d-block w-100" src="img/img/prestaciones.png" alt="First slide"></a>
                                        </div>
                                        </div>
                                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <h1 class="text-center font-weight-bold mt-4 titulo10">¿Necesitas más información?</h>
                            <p class="text-center2a"><a href="view/Videos/videosHelp.php">¡Visita nuestra sección de videos acerca de nosotros para resolver tus dudas!</a></p>
                            ';
                        }
                        else{
                            echo '
                            <br><br><br>
                            <h1 class="text-center font-weight-bold mt-4 titulo11">BIENVENIDO</h1>
                            <p class="text-center subtitulo22">¿Qué hago ahora?</p>
                            <p class="text-center subtitulo22">Empieza por contratar nuestros servicios para que accedas a todas tus opciones empresariales!</p> 
                            ';
                        }
                    }
                }
                ?>
            </div>

            <div class="bienvenida2">
            <?php
                if($userType == 2){
                    echo '
                    <br><br><br>
                    <h1 class="text-center font-weight-bold mt-4 titulo11">BIENVENIDO</h1>
                    <p class="text-center subtitulo22">¡Ahora formas parte de TFT!</p>
                    <p class="text-center subtitulo22">¿Qué puedes hacer ahora?</p>
                    <p class="text-center subtitulo22">Empieza por visitar tu panel de empleado para consultar tus nóminas!.</p> ';
                    
                    // <div class="contenedorCarrousel mx-auto mt-4">
                    // <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    // <ol class="carousel-indicators">
                    // <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    // <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    // <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    // </ol>
                    // <div class="carousel-inner sombra">
                    //     <div class="carousel-item active">
                    //     <a href="Videos/perfiles.html"><img class="d-block w-100" src="Videos/img/crearPerfiles.png" alt="First slide"></a>
                    //     </div>
                    //     <div class="carousel-item">
                    //     <a href="Videos/empleados.html"><img class="d-block w-100" src="Videos/img/empleados.gif" alt="First slide"></a>
                    //     </div>
                    //     <div class="carousel-item">
                    //     <a href="Videos/registro.html"><img class="d-block w-100" src="Videos/img/registro.gif" alt="First slide"></a>
                    //     </div>
                    //     </div>
                    //     <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    //     <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    //     <span class="sr-only">Previous</span>
                    //     </a>
                    //     <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    //     <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    //     <span class="sr-only">Next</span>
                    //     </a>
                    // </div>
                    // </div>
                    // </div>';
                }
                ?>
            </div>
       
    
    
            <div class="cuerpo2">        
            <div class="hero1 sombra p-4">
            <h1 class="text-center font-weight-bold text-white mt-4 titulo11">TFT</h1>            
            <h1 class="text-center mb-4 subtitulo22">La nueva plataforma encargada de administrar tus nóminas.</h1>                   
        <div class="d-flex container-fluid mt-3 sombra2" lc-helper="background" style="height:50vh;background:url(img/img/busines3.jpg)  center / cover no-repeat;">
    </div>
    <div class="container p-5 bg1 sombra2" style="margin-top:-100px">
        <div class="row">
            <div class="col-md-4 text-center align-self-center">
                <div class="lc-block border-end border-2 ">
                    <div editable="rich">
                        <p class="display-4 font-weight-bold">¿Quiénes somos?</p>
                    </div>
                </div><!-- /lc-block -->
            </div><!-- /col -->
            <div class="col-md-8">
                <div class="lc-block ">
                    <div editable="rich">
                        <p class="display-4 subtitulo11"><br> Axis Development.</p>
                    </div>
                </div><!-- /lc-block -->
            </div><!-- /col -->
        </div>
        <div class="row">
            <div class="col-md-9 offset-md-1">
                <div class="lc-block mt-5">
                    <div editable="rich">
                        <p class="lead"> Una empresa apasionada por la innovación y el desarrollo de soluciones tecnológicas. En el corazón de nuestra misión se encuentra el compromiso con la excelencia en el diseño y la implementación de software de vanguardia.&nbsp;</p>
                        <p class="lead">En Axis Development, entendemos que cada proyecto es único. Nos destacamos por nuestro enfoque personalizado, colaborando estrechamente con nuestros clientes para comprender sus necesidades y ofrecer soluciones adaptadas. </p>
                    </div>
                </div><!-- /lc-block -->
            </div><!-- /col -->
        </div>
    </div>
</div>

<div class="contenedorCarrousel mx-auto mt-4">
    <h1 class="text-center font-weight-bold mt-4 titulo11">GESTOR DE NÓMINAS</h1>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner sombra">
            <div class="carousel-item active">
                <img class="d-block w-100" src="img/img/business.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="img/img/busines3.jpg" alt="Second slide">
            </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="img/img/busines4.jpg" alt="Third slide">
                </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    </div>
</div>
        
       
<div class="hero1 mt-3 sombra2">               
<div class="container py-5">
	<div class="row mb-4 align-items-center flex-lg-row-reverse">
		<div class="col-md-6 col-xl-7 mb-4 mb-lg-0 " style="">
			<!-- requires glightbox, please flag the option in the picostrap customizer panel-->


			<div class="lc-block position-relative"><img class="img-fluid rounded shadow" src="img/ind1.jpg">
					<svg xmlns="http://www.w3.org/2000/svg" width="5em" height="5em" fill="currentColor" class="text-white" viewBox="0 0 16 16" lc-helper="svg-icon">
						
					</svg>
				</a>
			</div>
		</div><!-- /col -->
		<div class="col-md-6 col-xl-5">
			<div class="lc-block mb-3">
				<div editable="rich">
					<h1 class="fw-bolder display-2 subtitulo11">¿Problemas con las nóminas?</h1>
				</div>
			</div><!-- /lc-block -->
			<!-- /lc-block -->


			<div class="lc-block mb-4">
				<div editable="rich">

					<p class="lead text-white">No te preocupes más. Con nuestra plataforma tu empresa tendrá la facilidad de administrar y contabilizar las nóminas de tus empleados de manera sencilla</p>

				</div>
			</div>
		</div><!-- /col -->
	</div>
</div>
 
 
       
    </div>            
 
  

      <br>
    <div class="footer">
        <div class="mensajeFooter">            
            No nos hacemos responsables por el mal uso de la información aquí presentada.
            <br>
            2023 &copy; TFT            
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    
</body>
</html>