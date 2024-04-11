<?php
include('../data/ConexionDB.php');
$conexionDB = new ConexionDB();
$response = array();

if ($conexionDB->connect()) {
    $query = "SELECT * FROM worker"; // Reemplaza 'tu_tabla' con el nombre de tu tabla
    $result = $conexionDB->execquery($query); // Ejecutamos la consulta usando el método execquery de la clase ConexionDB

    if ($result) {
        $i = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $response[$i]['code'] = $row['code'];
            $response[$i]['name'] = $row['name'];
            $response[$i]['lastName'] = $row['lastName'];
            $response[$i]['lastName2'] = $row['lastName2'];
            $response[$i]['RFC'] = $row['RFC'];
            $response[$i]['NSS'] = $row['NSS'];
            $response[$i]['CURP'] = $row['CURP'];
            $response[$i]['number'] = $row['number'];
            $response[$i]['entryDate'] = $row['entryDate'];
            $response[$i]['enterprise'] = $row['enterprise'];
            $response[$i]['user'] = $row['user'];
            $response[$i]['profile'] = $row['profile'];
            $response[$i]['active'] = $row['active'];
            $response[$i]['checkerName'] = $row['checkerName'];
            $response[$i]['checkerID'] = $row['checkerID'];
            $i++;
        }
        header("Content-type: application/json");
        echo json_encode($response, JSON_PRETTY_PRINT);
    } else {
        echo "Error en la consulta SQL: " . mysqli_error($db);
    }
} else {
    echo "No se pudo conectar a la base de datos.";
}
?>



