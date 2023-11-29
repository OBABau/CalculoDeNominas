<?php
include('../app/sesion.php');
include('../data/conexionDB.php');
include('Payment.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $cardNumber = $_POST["cardNumber"];
    $cvv = $_POST["cvv"];
    $expirationDate = $_POST["expirationDate"];

    $email = $_SESSION['start'];
    $payment = new Payment();
    $userId = $payment->getUserByEmail(); 

    if ($userId !== false) {
        $payment->setName($name);
        $payment->setCardNumber($cardNumber);
        $payment->setCvv($cvv);
        $payment->setExpirationDate($expirationDate);
        $payment->setUserId($userId);

        // Realizar la inserción en la base de datos
        $payment->insertPayment2();

        header("Location: ../iniciado.php");
    } else {
        echo "Error: No se pudo obtener el ID del usuario.";
    }
}
?>

?>
