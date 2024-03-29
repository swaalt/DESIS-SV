<?php

/** HELPER 
 *  Helper encargada de validar según: nombre !==null , nickname >5 && a-zA-Z && 0-9 , rut en formato 
 * tradicional chileno, inputs y checkbox.
 * return: success si no hay errores, error si hay error en alguna validación.
 */
$errors = array();

$fullName = $_POST['voter-full-name'];
if (empty($fullName)) {
    $errors['voter-full-name'] = 'El campo Nombre y Apellido no puede estar en blanco.';
}

$alias = $_POST['voter-nickname'];
if (empty($alias)) {
    $errors['voter-nickname'] = 'El campo Alias no puede estar en blanco.';
} elseif (strlen($alias) < 6) {
    $errors['voter-nickname'] = 'El alias debe contener más de 5 dígitos.';
} elseif (!preg_match('/[a-zA-Z]/', $alias) || !preg_match('/[0-9]/', $alias)) {
    $errors['voter-nickname'] = 'El alias debe contener letras y números.';
}

$rut = $_POST['voter-rut'];
if (!preg_match('/^\d{7,8}-[0-9Kk]$/', $rut)) {
    $errors['voter-rut'] = 'El RUT debe estar escrito en el siguiente formato "xxxxxxxx-x".';
} else {
    // Validar RUT
    $rutValido = validarRut($rut);
    if (!$rutValido) {
        $errors['voter-rut'] = 'El RUT no es válido.';
    }
}

$email = $_POST['voter-email'];
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['voter-email'] = 'El correo electrónico no es válido.';
}

$checkedSources = isset($_POST['voter-referral-source']) ? count($_POST['voter-referral-source']) : 0;
if ($checkedSources < 2) {
    $errors['voter-referral-source'] = 'Seleccione al menos dos opciones.';
}

$regionId = $_POST['voter-region'] ?? "";
if (empty($regionId)) {
    $errors['voter-region'] = 'Seleccione una región.';
}

$communeId = $_POST['voter-commune'] ?? "";
if (empty($communeId)) {
    $errors['voter-commune'] = 'Seleccione una comuna.';
}

$candidateId = $_POST['voter-candidate'] ?? "";
if (empty($candidateId)) {
    $errors['voter-candidate'] = 'Seleccione un candidato.';
}

// Función para validar RUT. 
function validarRut($rut) {
    $rut = preg_replace('/[^0-9kK]/', '', $rut);
    if (strlen($rut) != 9) {
        return false;
    }

    $parteNumerica = substr($rut, 0, -1);
    $verificador = strtoupper(substr($rut, -1));

    $factor = 2;
    $suma = 0;

    for ($i = strlen($parteNumerica) - 1; $i >= 0; $i--) {
        $suma += intval($parteNumerica[$i]) * $factor;
        $factor = $factor == 7 ? 2 : $factor + 1;
    }

    $resto = $suma % 11;
    $dvEsperado = $resto == 0 ? 0 : 11 - $resto;

    if ($dvEsperado == 10) {
        return ($verificador == 'K');
    } else {
        return ($verificador == $dvEsperado);
    }
}

// Comprobar si hay errores en caso de haber, devuelve el error en AJAX, de lo contrario, entra al success.
if (!empty($errors)) {
    $response = array('success' => false, 'errors' => $errors);
} else {
    $response = array('success' => true);
}

// Devolver la respuesta como JSON
header('Content-Type: application/json');
echo json_encode($response);
