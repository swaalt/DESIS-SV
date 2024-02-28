<?php
// Establece la conexión con la base de datos.
$config = parse_ini_file('.env');
$host = $config['DB_HOST'];
$user = $config['DB_USER'];
$password = $config['DB_PASSWORD'];
$dbName = $config['DB_NAME'];
$port = $config['DB_PORT'];

$conn = mysqli_connect($host, $user, $password, $dbName, $port) or die("Connection failed " . mysqli_error($conn));
