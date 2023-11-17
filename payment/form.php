<?php
include('../app/sesion.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Form</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>

<div class="login">
            <?php echo "Bienvenido," .$_SESSION['start']. "!" ; ?> 
           
        </div>
    <h2>Portal de Pago</h2>
    <form action="addPayment.php" method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" required>
        <br>

        <label for="cardNumber">Card Number (16 digits):</label>
        <input type="text" name="cardNumber" pattern="\d{16}" title="Ingresa 16 digitos" required>
        <br>

        <label for="cvv">CVV (3 digits):</label>
        <input type="text" name="cvv" pattern="\d{3}" title="Ingresa 3 digitos" required>
        <br>

        <label for="expirationDate">Expiration Date (MM/YY):</label>
        <input type="text" name="expirationDate" pattern="\d{2}/\d{2}" title="Ingresa fecha valida (MM/YY)" required>
        <br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
