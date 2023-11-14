<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../../css/income+.css">
    <style>
        .dropdown-menu {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            border: 1px solid #ccc;
            padding: 5px;
        }

        .dropdown-menu label {
            display: block;
            margin: 3px 0;
        }
    </style>
</head>
<body>
<header>
    <h1>Perfiles registrados</h1>
</header>
<a href="creacionPerfiles.php" class="regresar-button">Regresar</a>

<br>

<table border="1">
<?php
    include("../../data/ingresosYConsultas+.php");
    session_start();
    $myobject = new ingresosYConsultas;
    $consulta = $myobject->getProfiles();
    if($consulta != 'error')
    {       
        while($tupla = mysqli_fetch_assoc($consulta))
        {   
            $consulta2 = $myobject->getIncomes();
            echo "<tr>";
            echo "<td>".$tupla['code']."</td>";
            echo "<td>".$tupla['name']."</td>";
            echo "<td>".$tupla['description']."</td>";
            echo '</tr>';
            
            echo '<td>Ingresos<button class="toggle-dropdown-button">Mostrar</button></td>';

            echo '<tr class="dropdown-menu-row">
            <td colspan="4">
            <div class="dropdown-menu">'
            ;
            $cont =1;
            while ($tupla2 = mysqli_fetch_assoc($consulta2)){
            echo '<label>
            <input type= "checkbox" id ='.$cont.'> '.$tupla2['name'].'
            </label>';
            $cont++;
            }
            echo '
            </div>
            </td>
            </tr>';

            echo '<td>Ingresos<button class="toggle-dropdown-button">Mostrar Prestaciones</button></td>';

            $consulta2 = $myobject->getBenefits();
            echo '<tr class="dropdown-menu-row">
            <td colspan="4">
            <div class="dropdown-menu">'
            ;
            while ($tupla2 = mysqli_fetch_assoc($consulta2)){
            echo '<label>
            <input type="checkbox"> '.$tupla2['name'].'
            </label>';
            }
            echo '
            </div>
            </td>
            </tr>';
            
            echo '<td>Ingresos<button class="toggle-dropdown-button">Mostrar Deducciones</button></td>';
            echo "</tr>";
           
            
            $consulta2 = $myobject->getBenefits();
            echo '<tr class="dropdown-menu-row">
            <td colspan="4">
            <div class="dropdown-menu">'
            ;
            while ($tupla2 = mysqli_fetch_assoc($consulta2)){
            echo '<label>
            <input type="checkbox"> '.$tupla2['name'].'
            </label>';
            }
            echo '
            </div>
            </td>
            </tr>';
            }

        }

    
?>
</table>



<script>
    const toggleButtons = document.querySelectorAll('.toggle-dropdown-button');
    toggleButtons.forEach(button => {
        button.addEventListener('click', () => {
            const dropdownRow = button.parentNode.parentNode.nextElementSibling;
            if (dropdownRow) {
                const dropdownMenu = dropdownRow.querySelector('.dropdown-menu');
                if (dropdownMenu.style.display === 'block') {
                    dropdownMenu.style.display = 'none';
                } else {
                    dropdownMenu.style.display = 'block';
                }
            }
        });
    });
</script>

</body>
</html>
