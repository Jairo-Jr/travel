<?php
$origen = $_GET["city1"];
$destino = $_GET["city2"];
$fecha = $_GET["date"];
$dias = $_GET["dias"];
$adultos = $_GET["adultos"];
$ninos = $_GET["ninos"];
$date = $_GET["date"];

$db_host	= "localhost";	   // localhost or IP
$db_user	= "admin";		  // database username
$db_pass	= "admin";		     // database password
$db_name	= "travel";    // database name

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
// verificar conexion
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if($origen == 1){
    $origen = "Lima";
} elseif ($origen == 2){
    $origen = "Caracas";
} else{
    $origen = "Montevideo";
}

if($destino == 1){
    $destino = "Madrid";
} elseif ($destino == 2){
    $destino = "Nueva York";
} else{
    $destino = "Moscu";
}

// Query sent to database
$result = mysqli_query($conn, "SELECT idVuelo ,aerolinea , origen, destino, costo FROM vuelo WHERE origen = '$origen' AND destino = '$destino'");

// Variable $row hold the result of the query
//$row2 = mysqli_fetch_assoc($result);
echo "<form action=\"registrar.php\" method=\"get\">";
echo "<div class=\"col-sm-12\">
                        <label class=\"form-label-outside\">Nombre</label>
                        <div class=\"form-wrap form-wrap-inline\">
                          <input class=\"form-input input-append\" id=\"form-element-stepper\" type=\"text\" name=\"nombre\">
                        </div>
                      </div>";

echo "<div class=\"col-sm-12\">
                        <label class=\"form-label-outside\">Contacto</label>
                        <div class=\"form-wrap form-wrap-inline\">
                          <input class=\"form-input input-append\" id=\"form-element-stepper\" type=\"text\" name=\"contacto\">
                        </div>
                      </div>";

while ($row2 = mysqli_fetch_assoc($result)){
    $cont = $row2["idVuelo"]."-".$dias."-".$adultos."-".$ninos."-".$date;
    echo "<p>"."aerolinea=".$row2["aerolinea"]." - origen=".$row2["origen"]." - destino=".$row2["destino"]." - costo=".$row2["costo"]."</p>";
    echo "<button type=\"submit\" name=\"reg\" value=\"$cont\">Seleccionar</button>";
}
echo "<form/>";
