<?php

include("../../data/Empresa.php");

 $miEmpresa = new Empresa();

 $miEmpresa->setCorreo($_POST['correo']);
// Verificar si el correo electrónico ya está en uso
if(isset($_POST['correo'], $_POST['contrasena'], $_POST['g-recaptcha-response'])) {
    $secret = '6LcKoLMpAAAAAGJSa-pSFr9qtI43qjUpv6GDaaHF';
    $captcha_response = $_POST['g-recaptcha-response'];

    // Verificar el captcha como se muestra en el ejemplo anterior
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
        'secret' => $secret,
        'response' => $captcha_response
    ]));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $captcha_result = json_decode(curl_exec($ch), true);
    curl_close($ch);

    if ($captcha_result['success']) {
        $_SESSION['login_attempts'] = 0;
    } else {
        header('Location: ../view/login.php');
        exit();
    }
} else {
    header('Location: ../view/login.php');
    exit();
}


$consulta = $miEmpresa->checkCuenta();
 $tupla = mysqli_fetch_assoc($consulta);

if ($tupla['total'] > 0) {
    // El correo electrónico ya está en uso, redirigir de vuelta al formulario con un mensaje de error
    header("Location: ../../view/Empresa/registrarEmpresas.php?error=email_en_uso");
    exit();
}

// Verificar si las contraseñas coinciden
if ($_POST['contrasena'] === $_POST['confirmar_contrasena']) {
    // Las contraseñas son iguales, puedes proceder con el registro
    $miEmpresa->setContrasena($_POST['contrasena']);
    $miEmpresa->registrarCuenta();
    session_start();
    $_SESSION['start'] = $_POST['correo']; // Guardar el correo electrónico en la sesión
    $_SESSION['type'] = 3; // 3 para empresa
    header("Location: ../../view/Empresa/registrarEmpresas2.php");
    exit();
} else {
    // Las contraseñas no coinciden, redirigir al usuario de vuelta al formulario con un mensaje de error
    header("Location: ../../view/Empresa/registrarEmpresas.php?error=contrasena");
    exit();
}

?>
