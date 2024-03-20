<?php
session_start();
ob_start();
?>
<html>
<body>
    <?php
        include('../data/Empresa.php');
        include ('../data/Empleado.php');
        include ('../data/ingresosYConsultas+.php');
        $empresa = new Empresa();
        $empleado = new Empleado();
        $IYC = new ingresosYConsultas();
        function calcularIMSS($salarioBase, $tasaDescuentoIMSS) {
            $imss = $salarioBase * $tasaDescuentoIMSS;
            return $imss;
        }
        $consulta = $empleado->getEmpleadoData($_SESSION['code']);
        while ($tupla = mysqli_fetch_assoc($consulta))
        {
            $consulta2 = $empleado->getEnterpriseData($tupla['enterprise']);
            while ($tupla2 = mysqli_fetch_assoc($consulta2))
            {
                $consulta3 = $empleado->getEmpleadoSalary($_SESSION['code']);
                while ($tupla3 = mysqli_fetch_assoc($consulta3))
                {
                $consulta4 = $empleado->getEmpleadoProfile($tupla3['profile']);
                while ($tupla4 = mysqli_fetch_assoc($consulta4))
                {
                echo ' <div class="contenido">
                    <h3>RECIBO DE NOMINA</h3>
                    <?PHP';
                echo "<br>";
                echo "<h4>".$tupla2['fiscalName']."</h4>";
                echo "<br>";
                echo "RFC Empresa:". $tupla2['RFC'];
                echo "<br>";
                echo "_________________________________________________________________";
                echo "<br>";
                echo "Nombre: ".$tupla['name']." ".$tupla["lastName"]." ".$tupla['lastName2'];
                echo "<br>";
                echo "CURP: ".$tupla['CURP'];
                echo "<br>";
                echo "RFC: ".$tupla['RFC'];
                echo "<br>";
                echo "NSS: ".$tupla['NSS'];
                echo "<br>";
                echo "Numero: ".$tupla['number'];
                echo "<br>";
                echo "Fecha de entrada: ".$tupla['entryDate'];
                echo "<br>";
                echo "Dias trabajados: ".$tupla3['days']/2;
                echo "<br>";
                echo "Salario: $".$tupla4['income'];
                echo "<br>";
                echo "_________________________________________________________________";
                echo "<br>";
                echo "<h5>Percepciones</h5>";
                $totalP = 0;
                echo "Sueldo ordinario: $".$tupla3['total'];
                $totalP += $tupla3['total'];
                echo "<br>";
                $septimoDia = number_format($tupla3['total']/6, 3);
                echo "Septimo dia: $".$septimoDia;
                $totalP += $septimoDia;
                echo "<br>";
                $consulta5 = $empleado->getBenefits($tupla3['code']);
                $totalBenefits = 0;
                while ($tupla5 = mysqli_fetch_assoc($consulta5))
                {
                    echo $tupla5['name'].": $".$tupla5['total'];
                    $totalBenefits += $tupla5['total'];
                    $totalP += $tupla5['total'];
                    echo "<br>";
                }
                $totalGravable = 0;
                $totalGravable += $totalBenefits;
                $totalGravable += $tupla3['total'];
                $totalGravable += $septimoDia;
                if($totalGravable <= 0)
                {
                    $subsidio = 0;
                } else if ($totalGravable <= 407.33)
                {
                    $subsidio = 93.73;

                }else if ($totalGravable <= 610.96)
                {
                    $subsidio = 93.66;

                }else if ($totalGravable <= 799.68)
                {
                    $subsidio = 93.66;

                }else if ($totalGravable <= 814.66)
                {
                    $subsidio = 90.44;

                }else if ($totalGravable <= 1023.75)
                {
                    $subsidio = 88.06;

                }else if ($totalGravable <= 1086.19)
                {
                   $subsidio = 81.55;

                }else if ($totalGravable <= 1228.57)
                {
                    $subsidio = 74.83;

                }else if ($totalGravable <= 1433.32)
                {
                    $subsidio = 67.83;
                }else if ($totalGravable <= 1638.07)
                {
                    $subsidio = 58.38;

                }else if ($totalGravable <= 1699.88)
                {
                   $subsidio = 50.12;
                }else
                {
                    $subsidio = 0;
                }
                echo "Subsidio para el empleo: $".$subsidio;
                $totalP += $subsidio;
                $totalGravable += $subsidio;
                echo "<br>";

                if ($tupla3['sunday'] == 1)
                {
                    echo "Prima dominical: ".$tupla4['income']/2;
                    $totalP += $tupla4['income']/2;
                    $totalGravable += $tupla4['income']/2;
                    echo "<br>";
                }
                echo "_________________________________________________________________";
                echo "<h5>Deducciones</h5>";
                $totalD = 0; 
                if ($totalGravable <= 0)
                {
                    
                    $ISR = 0;
                }else if ($totalGravable <= 171.78)
                {
                    $diferencia = $totalGravable - 0.01;
                    $impuestoMarginal = $diferencia*0.0192;
                    $ISR = $impuestoMarginal + 0;

                }else if ($totalGravable <= 1458.03)
                {
                    $diferencia = $totalGravable - 171.79;
                    $impuestoMarginal = $diferencia*0.064;
                    $ISR = $impuestoMarginal + 3.29;

                }else if ($totalGravable <= 2562.35)
                {
                    $diferencia = $totalGravable - 1458.04;
                    $impuestoMarginal = $diferencia*0.1088;
                    $ISR = $impuestoMarginal + 85.61;

                }else if ($totalGravable <= 2978.64)
                {
                    $diferencia = $totalGravable - 2562.36;
                    $impuestoMarginal = $diferencia*0.16;
                    $ISR = $impuestoMarginal + 105.80;

                }else if ($totalGravable <= 3566.22)
                {
                    $diferencia = $totalGravable - 2978.65;
                    $impuestoMarginal = $diferencia*0.1792;
                    $ISR = $impuestoMarginal + 272.37;

                }else if ($totalGravable <= 7192.64)
                {
                    $diferencia = $totalGravable - 3566.23;
                    $impuestoMarginal = $diferencia*0.2136;
                    $ISR = $impuestoMarginal + 377.65;

                }else if ($totalGravable <= 11336.57)
                {
                    $diferencia = $totalGravable - 7192.65;
                    $impuestoMarginal = $diferencia*0.2352;
                    $ISR = $impuestoMarginal + 1152.27;

                }else if ($totalGravable <= 21643.30)
                {
                    $diferencia = $totalGravable - 11336.58;
                    $impuestoMarginal = $diferencia*0.30;
                    $ISR = $impuestoMarginal + 2126.95;

                }else if ($totalGravable <= 28857.78)
                {
                    $diferencia = $totalGravable - 21643.31;
                    $impuestoMarginal = $diferencia*0.32;
                    $ISR = $impuestoMarginal + 5218.92;

                }else if ($totalGravable <= 86573.34)
                {
                    $diferencia = $totalGravable - 28857.79;
                    $impuestoMarginal = $diferencia*0.34;
                    $ISR = $impuestoMarginal + 7527.59;

                }else
                {
                    $diferencia = $totalGravable - 86573.35;
                    $impuestoMarginal = $diferencia*0.35;
                    $ISR = $impuestoMarginal + 27150.83;
                }

                $ISR2 = number_format($ISR, 2);
                echo "ISR: $".$ISR2;
                $totalD += $ISR2;
                //IMSS
                
                
                $salarioBase = $tupla3['total']; // monto en pesos mexicanos
                $salarioTotal = $tupla3['total']+$tupla3['total']/6+$subsidio;
            
                $rangoSalarial = $salarioTotal - $salarioBase; // suponiendo que $salarioTotal ya contiene el salario base
                
                if ($rangoSalarial <= 22500) {
                    $tasaDescuentoIMSS = 0.03;
                } elseif ($rangoSalarial <= 45000) {
                    $tasaDescuentoIMSS = 0.05;
                } else {
                    $tasaDescuentoIMSS = 0.07;
                }
                
                $imss = calcularIMSS($salarioBase, $tasaDescuentoIMSS);
                echo "<br>";
                echo "IMSS: $" . $imss;
                $totalD += $imss;
                echo "<br>";
                echo "_________________________________________________________________";
                echo "<br>";

                echo "<h5>Total de percepciones: $".$totalGravable."</h5>";
                echo "<br>";
                echo "<h5>Total de deducciones: $".$totalD."</h5>";
                echo "<br>";
                echo "<h5>Neto a recibir: $".$totalP-$totalD."</h5>";
                echo "</div>";
            }
        }}
        }
        
        
        ?>
    
    
</body>
</html>

<?php
$html = ob_get_clean();
//echo $html;

require_once '../libreria/dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf = new Dompdf();

$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled'=> true));
$dompdf->setOptions($options);

$dompdf->loadhtml($html);

//$dompdf->setPaper('letter');
$dompdf->setPaper('A4', 'landscape');

$dompdf->render();

$dompdf->stream("nomina.pdf", array("Attachment" => true));
?>
