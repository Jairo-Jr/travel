<?php
$nombre = $_GET["nombre"];
$contacto = $_GET["contacto"];

$cad = $_GET["reg"];
$arr = explode("-",$cad);
$reg = $arr[0];
$dias = $arr[1];
$adultos = $arr[2];
$ninos = $arr[3];
$fecha = $arr[4]."-".$arr[5]."-".$arr[6];
$aero = $arr[7];


$db_host	= "localhost";	   // localhost or IP
$db_user	= "admin";		  // database username
$db_pass	= "admin";		     // database password
$db_name	= "travel";    // database name

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
// verificar conexion
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$result1 = mysqli_query($conn, "SELECT aerolinea , origen, destino, costo FROM vuelo WHERE idVuelo = '$reg'");
$row1 = mysqli_fetch_assoc($result1);
$aerolinea = $row1["aerolinea"];
$origen = $row1["origen"];
$destino = $row1["destino"];
$costo = $row1["costo"];

// Query sent to database
$result = mysqli_query($conn, "INSERT INTO `viajes` (`idViaje`, `aero`,`nombre`, `origen`, `destino`, `fSalida`, `nDias`, `nAdultos`, `nNinos`, `contacto`) VALUES (NULL, '$aero','$nombre', '$origen', '$destino', '$fecha', '$dias', '$adultos', '$ninos', '$contacto')");



header('location: index.html');