<?php
include("../data/Empleado.php");
session_start();
$empleadoFunction = new Empleado();
/*
Subir archivo a servidor con PHP
@author parzibyte
 */

# La carpeta en donde guardaremos los archivos, en este caso es "subidas" pero podría ser

# cualqueir otro, incluso podría ser aquí mismo sin subcarpetas
$rutaDeSubidas = __DIR__ . "/subidas";
# Crear si no existe

if (!is_dir($rutaDeSubidas)) {
    mkdir($rutaDeSubidas, 0777, true);
}

# Tomar el archivo. Recordemos que "archivo" es el atributo "name" de nuestro input
$informacionDelArchivo = $_FILES["archivo"];
# La ubicación en donde PHP lo puso
$ubicacionTemporal = $informacionDelArchivo["tmp_name"];

#Nota: aquí tomamos el nombre que trae, pero recomiendo renombrarlo a otra cosa usando, por ejemplo, uniqid
$nombreArchivo = $_SESSION['code'].".xlsx";
$nuevaUbicacion = $rutaDeSubidas . "/" . $nombreArchivo;

# Mover
$resultado = move_uploaded_file($ubicacionTemporal, $nuevaUbicacion);


if ($resultado === true) {
    echo "Archivo subido correctamente";
} else {
    echo "Error al subir archivo";
}

/**
 * Demostrar lectura de hoja de cálculo o archivo
 * de Excel con PHPSpreadSheet: leer determinada fila
 * y columna por coordenadas
 *
 * @author parzibyte
 */
# Cargar librerias y cosas necesarias
require_once "../vendor/autoload.php";

# Indicar que usaremos el IOFactory
use PhpOffice\PhpSpreadsheet\IOFactory;

# Recomiendo poner la ruta absoluta si no está junto al script
# Nota: no necesariamente tiene que tener la extensión XLSX
$rutaArchivo = "subidas/".$_SESSION['code'].".xlsx";
$documento = IOFactory::load($rutaArchivo);

# Recuerda que un documento puede tener múltiples hojas
# obtener conteo e iterar
$totalDeHojas = $documento->getSheetCount();

$hojaActual = $documento->getSheet(0);
$hoja4 = $documento->getSheet(3); # Obtiene la 4ta

$condicion = $hojaActual->getCell("A5");
$domingoCelda = 14;
for($i = 1; $i = $condicion->getValue(); $i++)
{
$condicion = $hojaActual->getCell("A".($i+5));
$empleado = $hojaActual->getCell("B".(4+$i))->getValue();
$diasTrabajados = $hojaActual->getCell("L".(4+$i))->getValue();
$retardos = $hojaActual->getCell("F".(4+$i))->getValue();
$domingo = $hoja4 ->getCell("B".($domingoCelda))->getValue();
$empleadoID = $hojaActual->getCell('A'.($i+4))->getValue();
if( $domingo == null)
{
    $domingo = "null";
}else {
    $domingo = 1;
}
$domingoCelda += 22;
echo "<br> Empleado: ".$empleado;
echo "<br> EmpleadoID: ".$empleadoID;
echo "<br> Dias Trabajados: ".substr($diasTrabajados, 2);
echo "<br> Retardos: ".$retardos;
echo "<br> Trabajo domingo:" .$domingo."<br>" ;

$datasetEmpleado = $empleadoFunction->checkerInsert(substr($diasTrabajados, 2),$domingo,$empleado,$empleadoID,$_SESSION['code'], $retardos);

echo $datasetEmpleado;

if( $datasetEmpleado >= 1)
{

    header("location: lectorHuellas.php?mensaje=Se regisro correctamente la asistencia");
}else
{
    header("location: lectorHuellas.php?mensaje=hubo un error con el archivo");
}
}