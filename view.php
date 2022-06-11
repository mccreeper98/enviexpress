<?php
    if(!isset($_GET['pdf'])){
        header("location: cotizador.html");
    }else{
        $pdf = $_GET['pdf'];
    }

?>

<!DOCTYPE html>
  <html>
    <head>
      <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Envi-Express &#8211; Cotizador</title>
        <meta name='robots' content='noindex, nofollow' />
        <link rel="shortcut icon" href="https://www.envi-express.mx/wp-content/uploads/2020/10/Favicom.jpg" type="image/x-icon" />
        <meta property="og:title" content="Cotizador"/>
        <meta property="og:type" content="article"/>
        <meta property="og:url" content="https://www.envi-express.mx/"/>
        <meta property="og:site_name" content="Envi-Express"/>
        <meta property="og:description" content="Somos una empresa joven 100% mexicana dedicada a dar soluciones integrales para la distribución de mercancía con alcance local, nacional e internacional fusionando nuestra infraestructura junto con la de nuestros aliados"/>
        <meta property="og:image" content="https://www.envi-express.mx/wp-content/uploads/2020/06/avatar2.png"/>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="css/main.css" media="screen,projection"/>
      <link rel="stylesheet" type="text/css" href="dist/sweetalert.css">
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>

        <main>
            <div class="nav center">
              <a href="#"><img src="img/logo.png" class="logop"></a>
            </div>
            <br>
            <div class="bott" style="width:80%;">
                <a href="cotizador.html" class="waves-effect btn botona botones">Volver a Cotizar</a>
                <a class="waves-effect btn boton botones" href="<?php echo $pdf;?>" download="cotizacion.pdf">Descargar</a>
            </div>

            <br>

            <div class="center"><iframe src="https://docs.google.com/gview?url=https://www.envi-express.mx/cotizador/<?php echo $pdf;?>&embedded=true" style="width:80%; height:700px; " frameborder="0" ></iframe></div>
        
        </main>

        <!-- Loader Structure -->
  <div id="modal1" class="modal">
    <div class="modal-content center">
      <br><br>
      <br><br>
      <div class="loader"></div>
    </div>
  </div>

      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
      <script type="text/javascript" src="js/main.js"></script>
      <script type="text/javascript" src="dist/sweetalert-dev.js"></script>

    </body>
  </html>