<?php
$origen = $_GET["city1"];
$destino = $_GET["city2"];
$fecha = $_GET["date"];
$dias = $_GET["dias"];
$adultos = $_GET["adultos"];
$ninos = $_GET["ninos"];
$date = $_GET["date"];

$arr = explode("-",$fecha);

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
    $origen = "Cusco";
} else{
    $origen = "Juliaca";
}

if($destino == 1){
    $destino = "Iquitos";
} elseif ($destino == 2){
    $destino = "Arequipa";
} else{
    $destino = "Trujillo";
}

// Query sent to database
$result = mysqli_query($conn, "SELECT idVuelo ,aerolinea , origen, destino, costo FROM vuelo WHERE origen = '$origen' AND destino = '$destino'");
$i = 0;
while ($row2 = mysqli_fetch_assoc($result)){
    $cont[$i] = $row2["idVuelo"]."-".$dias."-".$adultos."-".$ninos."-".$date;
    $var[$i][0] = $row2["aerolinea"];
    $var[$i][1] = $row2["origen"];
    $var[$i][2] = $row2["destino"];
    $var[$i][3] = $row2["costo"];
    $var[$i][4] = $row2["idVuelo"]."-".$dias."-".$adultos."-".$ninos."-".$date;
    $i = $i + 1;
    //echo "<p>"."aerolinea=".$row2["aerolinea"]." - origen=".$row2["origen"]." - destino=".$row2["destino"]." - costo=".$row2["costo"]."</p>";
    //echo "<button type=\"submit\" name=\"reg\" value=\"$cont\">Seleccionar</button>";
}

?>

<!DOCTYPE html>
<html class="wide wow-animation" lang="en">

<head>
  <!-- Site Title-->
  <title>Selecciona tu vuelo</title>
  <meta name="format-detection" content="telephone=no">
  <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta charset="utf-8">
  <link rel="icon" href="images/favicon.ico" type="image/x-icon">
  <!-- Stylesheets -->
  <link rel="stylesheet" type="text/css"
    href="//fonts.googleapis.com/css?family=Oswald:200,400%7CLato:300,400,300italic,700%7CMontserrat:900">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/fonts.css">
  <!-- VueJS -->
  <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vue"></script>
  <!--[if lt IE 10]>
    <div style="background: #212121; padding: 10px 0; box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3); clear: both; text-align:center; position: relative; z-index:1;"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img src="images/ie8-panel/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div>
    <script src="js/html5shiv.min.js"> </script>
		<![endif]-->
</head>

<body>
  <!-- Page preloader-->
  <div class="page-loader">
    <div class="page-loader-body">
      <div class="preloader-wrapper big active">
        <div class="spinner-layer spinner-blue">
          <div class="circle-clipper left">
            <div class="circle"> </div>
          </div>
          <div class="gap-patch">
            <div class="circle"> </div>
          </div>
          <div class="circle-clipper right">
            <div class="circle"></div>
          </div>
        </div>
        <div class="spinner-layer spinner-red">
          <div class="circle-clipper left">
            <div class="circle"></div>
          </div>
          <div class="gap-patch">
            <div class="circle"> </div>
          </div>
          <div class="circle-clipper right">
            <div class="circle"></div>
          </div>
        </div>
        <div class="spinner-layer spinner-yellow">
          <div class="circle-clipper left">
            <div class="circle"></div>
          </div>
          <div class="gap-patch">
            <div class="circle"></div>
          </div>
          <div class="circle-clipper right">
            <div class="circle"> </div>
          </div>
        </div>
        <div class="spinner-layer spinner-green">
          <div class="circle-clipper left">
            <div class="circle"></div>
          </div>
          <div class="gap-patch">
            <div class="circle"></div>
          </div>
          <div class="circle-clipper right">
            <div class="circle"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Page-->

  <!-- Page Header-->
  <div id="app">
      <form action="registrar.php" method="get">
    <header class="section page-header">
      <!-- RD Navbar-->
      <div class="rd-navbar-wrap rd-navbar-corporate">
        <nav class="rd-navbar" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed"
          data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-fullwidth"
          data-xl-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-fixed"
          data-xl-device-layout="rd-navbar-static" data-md-stick-up-offset="130px" data-lg-stick-up-offset="100px"
          data-stick-up="true" data-sm-stick-up="true" data-md-stick-up="true" data-lg-stick-up="true"
          data-xl-stick-up="true">

          <div class="rd-navbar-inner">
            <!-- RD Navbar Panel-->
            <div class="rd-navbar-panel">
              <!-- RD Navbar Toggle-->
              <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
              <!-- RD Navbar Brand-->
              <div class="rd-navbar-brand"><a class="brand-name" href="index.html"><img class="logo-default"
                    src="images/logo-default-208x46.png" alt="" width="208" height="46" /><img class="logo-inverse"
                    src="images/logo-inverse-208x46.png" alt="" width="208" height="46" /></a></div>
            </div>
            <div class="rd-navbar-aside-center">
              <div class="rd-navbar-nav-wrap">
                <!-- RD Navbar Nav-->
                <ul class="rd-navbar-nav">
                  <li class="active"><a href="index.html">Inicio</a>
                  </li>
                  <li><a href="about-us.html">Sobre nosotros</a>
                  </li>

                </ul>
              </div>
            </div>
          </div>
      </div>
    </nav>
  </div>
  <section class="breadcrumbs-custom1" style="background: #FFA800; background-size: cover;">
    <div class="container">
      <div class="row">
         <div class="col-sm" style="display: flex;    justify-content: center;    align-content: center;    flex-direction: column; margin:10px;">
           <p style="color:#FFFFFF; font-size:38px; text-align: left; margin-top:10px;"><b><?php echo $var[1][1]; ?> a <?php echo $var[1][2]; ?><b></p>
           <p style="color:#FFFFFF; font-size:22px; text-align: left"><?php echo $arr[1]; ?>    de Setiembre de 2019 &nbsp;&nbsp; <?php echo $adultos; ?> Adulto &nbsp;&nbsp; <?php echo $ninos; ?> Niños</p>
         </div>
         <div class="col-sm" style="margin:10px; padding-left:68px">
           <!-- inicio form -->
             <div class="form-group">
               <label style="color:#FFFFFF;" for="exampleFormControlInput1">Nombre</label>
               <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Ingresar nombre" name="nombre" required>
             </div>
             <div class="form-group">
               <label style="color:#FFFFFF;" for="exampleFormControlInput2">Teléfono</label>
               <input type="text" class="form-control" id="exampleFormControlInput2" placeholder="Ingresar número telefónico" name="contacto" required>
             </div>
           <!-- fin form -->
         </div>
       </div>
       <div class="" style="margin:10px; margin-top:20px;">
          <a class="button button-default-outline" href="index.html">Cambiar búsqueda</a>
       </div>
    </div>
  </section>
  </header>

  <section class="section" style="margin-top:5%; margin-bottom:5%;">
      <div class="container container-bigger form-request-wrap form-request-wrap-modern">
        <div class="row row-fix justify-content-center">
          <div class="container bg-gray-lighter novi-background" style="padding:30px 20px 10px;">
              <div class="container" style="background: #FFFFFF; margin-bottom: 30px; padding: 25px; border:1px solid #D8D5D5;">
                <div class="row">
                   <div class="col-3" style="vertical-align:middle; display:inline-block;">
                     <img src="images/AV.png" alt="">
                   </div>
                   <div class="col-3" style="vertical-align:middle; display:inline-block;">
                     <b>10:32 - 13:03</b><p style="color:#CCCCCC;">Avianca</p>
                   </div>
                   <div class="col-3" style="vertical-align:middle; display:inline-block;">
                     <p>4h 30min - Directo</p>
                   </div>
                   <div class="col-3" style="vertical-align:middle; display:inline-block;">
                       <p>Desde</p>
                       <p>PEN <?php echo $var[0][3];?></p>
                   </div>
                   <button class="button button-block button-secondary" type="submit" name="reg" value="<?php echo $cont[0]."-"."1"; ?>"> Reservar</button>
                 </div>
              </div>

              <div class="container" style="background: #FFFFFF; margin-bottom: 30px; padding: 25px; border:1px solid #D8D5D5;">
                <div class="row">
                   <div class="col-3" style="vertical-align:middle; display:inline-block;">
                     <img src="images/LA.png" alt="">
                   </div>
                   <div class="col-3" style="vertical-align:middle; display:inline-block;">
                     <b>10:32 - 13:03</b><p style="color:#CCCCCC;">Latam</p>
                   </div>
                   <div class="col-3" style="vertical-align:middle; display:inline-block;">
                     <p>4h 30min - Directo</p>
                   </div>
                   <div class="col-3" style="vertical-align:middle; display:inline-block;">
                       <p>Desde</p>
                       <p>PEN <?php echo $var[1][3];?></p>
                   </div>
                   <button class="button button-block button-secondary" type="submit" name="reg" value=" <?php echo $cont[1]."-"."2"; ?> "> Reservar</button>
                 </div>
              </div>

              <div class="container" style="background: #FFFFFF; margin-bottom: 30px; padding: 25px; border:1px solid #D8D5D5;">
                <div class="row">
                   <div class="col-3" style="vertical-align:middle; display:inline-block;">
                     <img src="images/PA.png" alt="">
                   </div>
                   <div class="col-3" style="vertical-align:middle; display:inline-block;">
                     <b>10:32 - 13:03</b><p style="color:#CCCCCC;">Peruvian Airlines</p>
                   </div>
                   <div class="col-3" style="vertical-align:middle; display:inline-block;">
                     <p>4h 30min - Directo</p>
                   </div>
                   <div class="col-3" style="vertical-align:middle; display:inline-block;">
                       <p>Desde</p>
                       <p>PEN <?php echo $var[2][3];?></p>
                   </div>
                   <button class="button button-block button-secondary" type="submit" name="reg" value=" <?php echo $cont[2]; ?> "> Reservar</button>
                 </div>
              </div>


          </div>
        </div>
      </div>
  </section>
  </form>
<!-- formulario fin -->

  <!-- our advantages-->
  <section class="section section-lg bg-gray-lighter novi-background bg-cover text-center">
    <div class="container container-wide">
      <h3>nuestros servicios</h3>
      <div class="divider divider-decorate"></div>
      <div class="row row-50 justify-content-sm-center text-left">
        <div class="col-sm-10 col-md-6 col-xl-3">
          <article class="box-minimal box-minimal-border">
            <div class="box-minimal-icon novi-icon mdi mdi-airplane"></div>
            <p class="big box-minimal-title">Boletos aéreos</p>
            <hr>
            <div class="box-minimal-text text-spacing-sm">
              En nuestra agencia de viajes, puede reservar boletos aéreos a cualquier mundo
              destino. También proporcionamos reserva de boletos en línea a través de nuestro sitio web en solo un par
              de pasos.</div>
          </article>
        </div>
        <div class="col-sm-10 col-md-6 col-xl-3">
          <article class="box-minimal box-minimal-border">
            <div class="box-minimal-icon novi-icon mdi mdi-map"></div>
            <p class="big box-minimal-title">
              Viajes y cruceros</p>
            <hr>
            <div class="box-minimal-text text-spacing-sm">
              Además de los tours y excursiones regulares, también ofrecemos una variedad
              de cruceros y viajes por mar para diferentes clientes que buscan experiencias increíbles.</div>
          </article>
        </div>
        <div class="col-sm-10 col-md-6 col-xl-3">
          <article class="box-minimal box-minimal-border">
            <div class="box-minimal-icon novi-icon mdi mdi-city"></div>
            <p class="big box-minimal-title">
              Reservas de hotel</p>
            <hr>
            <div class="box-minimal-text text-spacing-sm">
              Ofrecemos una amplia selección de hoteles que van desde los de 5 estrellas hasta
              pequeñas propiedades ubicadas en todo el mundo para que pueda reservar un hotel que le guste.</div>
          </article>
        </div>
        <div class="col-sm-10 col-md-6 col-xl-3">
          <article class="box-minimal box-minimal-border">
            <div class="box-minimal-icon novi-icon mdi mdi-beach"></div>
            <p class="big box-minimal-title">
              Tours de verano a medida</p>
            <hr>
            <div class="box-minimal-text text-spacing-sm">Nuestra agencia ofrece recorridos variados que incluyen
              verano
              a medida tours para clientes que buscan unas vacaciones exclusivas y memorables.</div>
          </article>
        </div>
      </div>
    </div>
  </section>


  <section class="section section-md text-center text-md-left bg-gray-700 novi-background bg-cover">
    <div class="container container-wide">
      <div class="row row-fix row-50 justify-content-sm-center">
        <div class="col-xxl-8">
          <div class="box-cta box-cta-inline">
            <div class="box-cta-inner">
              <h3 class="box-cta-title">Adquiere un paquete de vuelo desde la comodidad de tu casa</h3>
              <p>Con tan solo un par de clics elige el destino que más desees.</p>
            </div>
            <div class="box-cta-inner"><a class="button button-secondary button-nina" href="#">Ver más</a></div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- Footer Minimal-->
  <footer class="section page-footer page-footer-minimal novi-background bg-cover text-center bg-gray-darker">
    <div class="container container-wide">
      <div class="row row-fix justify-content-sm-center align-items-md-center row-30">
        <div class="col-md-10 col-lg-7 col-xl-4 text-xl-left"><a href="index.html"><img class="inverse-logo"
              src="images/logo-inverse-208x46.png" alt="" width="208" height="46" /></a></div>
        <div class="col-md-10 col-lg-7 col-xl-4">
          <p class="right">&#169;&nbsp;<span class="copyright-year"></span> All Rights Reserved.
            Design&nbsp;by&nbsp;<a href="#">Bicon Ink</a></p>
        </div>
        <div class="col-md-10 col-lg-7 col-xl-4 text-xl-right">
          <ul class="group-xs group-middle">
            <li><a class="icon novi-icon icon-md-middle icon-circle icon-secondary-5-filled mdi mdi-facebook"
                href="#"></a></li>
            <li><a class="icon novi-icon icon-md-middle icon-circle icon-secondary-5-filled mdi mdi-twitter"
                href="#"></a></li>
            <li><a class="icon novi-icon icon-md-middle icon-circle icon-secondary-5-filled mdi mdi-instagram"
                href="#"></a></li>
            <li><a class="icon novi-icon icon-md-middle icon-circle icon-secondary-5-filled mdi mdi-google"
                href="#"></a></li>
            <li><a class="icon novi-icon icon-md-middle icon-circle icon-secondary-5-filled mdi mdi-linkedin"
                href="#"></a></li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
  </div>
  </div>

  <!-- Global Mailform Output-->
  <div class="snackbars" id="form-output-global"> </div>
  <!-- Javascript-->
  <script src="js/core.min.js"></script>
  <script src="js/script.js"></script>
  <!-- coded by barber-->
</body>

</html>
