<?php
include('../../app/sesion.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CreacionEmpleado</title>
</head>
<body>
<h2>Registrar Nuevo Empleado</h2>
  <form action="../../data/addEmpleado.php" method="post">
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="name" required><br><br>


    <label for="nombre">Apellido Paterno:</label>
    <input type="text" id="nombre" name="apPat" required><br><br>


    <label for="nombre">Apellido Materno:</label>
    <input type="text" id="nombre" name="apMat" required><br><br>

    <label for="nombre">RFC:</label>
    <input type="text" id="nombre" name="rfc" pattern="[A-Z0-9]{13}" title="Debe ingresar exactamente 13 caracteres alfanuméricos" required><br><br>


    <label for="nombre">NSS:</label>
    <input type="text" id="nombre" name="nss" pattern="\d{11}" title="Debe ingresar exactamente 11 dígitos" required><br><br>


    <label for="nombre">CURP:</label>
    <input type="text" id="nombre" name="curp" pattern="[A-Z0-9]{13}" title="Debe ingresar un CURP válido" required><br><br>


    <label for="nombre">Número de teléfono:</label>
    <input type="text" id="nombre" name="phone" pattern="\d{10}" title="Debe ingresar exactamente 12 dígitos" required><br><br>

    <label for="nombre">Email:</label>
    <input type="email" id="nombre" name="mail" required><br><br>

    <label for="nombre">Contrasena:</label>
    <input type="password" id="nombre" name="pass" required><br><br>

    <label for = "perfiles">Perfiles</label>
        <select name = "perfiles">
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
    <input type="submit" value="Registrar Usuario">
    <br><br>
    <a href="listaEmpleados.php"> <img src="../../img/back.svg" alt=""></a>
  </form>
    
</body>
</html>