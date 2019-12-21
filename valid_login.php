<?php
$usuario = $_GET["usuario"];
$clave = $_GET["clave"];

$db_host	= "localhost";	   // localhost or IP
$db_user	= "admin";		  // database username
$db_pass	= "admin";		     // database password
$db_name	= "travel";    // database name

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
// verificar conexion
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$result = mysqli_query($conn, "SELECT nombre, pswd FROM usuario WHERE nombre = '$usuario' ");

// Variable $row hold the result of the query
$row = mysqli_fetch_assoc($result);

if ($row['pswd'] == $clave){
    $result2 = mysqli_query($conn, "SELECT nombre, origen, destino, fSalida, nDias, nAdultos, nNinos, contacto FROM viajes");
    while ($row2 = mysqli_fetch_assoc($result2)){
        echo "<p>"."Nombre=".$row2["nombre"]." - origen=".$row2["origen"]." - destino=".$row2["destino"]." - FSalida=".$row2["fSalida"]." - NDias=".$row2["nDias"]." - NAdultos=".$row2["nAdultos"]." - NNinos=".$row2["nNinos"]." - Contacto=".$row2["contacto"]."</p>";
    }
    $result3 = mysqli_query($conn, "DELETE FROM viajes WHERE idViaje > 0");
    echo "<button type=\"submit\" name=\"reg\" ><a href=\"index.html\">Salir</a></button>";
}else{
    header('location: login.html');
}