<?php
session_start();
include('../data/users.php');
//echo $_POST['Mail'];

    if(isset($_POST['Mail'], $_POST['password'], $_POST['g-recaptcha-response'])) {
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

$objeto = new usuarios();
$objeto->setEmail($_POST['Mail']);
$objeto->setPassword($_POST['password']);

// Verificar si es un administrador
$datasetAdmin = $objeto->getAdmin();
if ($datasetAdmin != 'Error' && mysqli_num_rows($datasetAdmin) == 1) {
    $tupla = mysqli_fetch_assoc($datasetAdmin);
    $_SESSION['start'] = $_POST['Mail']; // Guardar el correo electrónico en la sesión
    $_SESSION['type'] = 1; // 1 para administrador
    header('Location: ../iniciado.php');
    exit();
}

// Verificar si es un empleado
$datasetEmployee = $objeto->getEmployee();
if ($datasetEmployee != 'Error' && mysqli_num_rows($datasetEmployee) == 1) {
    $tupla = mysqli_fetch_assoc($datasetEmployee);

    $_SESSION['start'] = $_POST['Mail']; // Guardar el correo electrónico en la sesión
    $_SESSION['type'] = 2; // 2 para empleado

    include(__DIR__.'/../data/Empleado.php');;
    $empleado = new Empleado();
    $consulta = $empleado->getEmpleado();
    while($tupla = mysqli_fetch_assoc($consulta))
    {
    $_SESSION['code'] = $tupla['code'];
    $_SESSION['userCode'] = $tupla['user'];
    }
    echo $_SESSION['code'];

    header('Location: ../iniciado.php');
    exit();
}

// Verificar si es una empresa
$datasetEnterprise = $objeto->getEnterprise();
if ($datasetEnterprise != 'Error' && mysqli_num_rows($datasetEnterprise) == 1) {
    $tupla = mysqli_fetch_assoc($datasetEnterprise);
    echo $_POST['Mail'];
    $_SESSION['start'] = $_POST['Mail']; // Guardar el correo electrónico en la sesión
    $_SESSION['type'] = 3; // 3 para empresa
    include("../data/ingresosYConsultas+.php");
    $myobjecto = new ingresosYConsultas();
    $consulta = $myobjecto->getEnterprise();
    while($tupla = mysqli_fetch_assoc($consulta))
    {
    $_SESSION['code'] = $tupla['code'];
    }
    echo $_SESSION['code'];
    header('Location: ../iniciado.php');
    exit();
}


header('Location: ../view/login.php?error=1');
exit();
?>
