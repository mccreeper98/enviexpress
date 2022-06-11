<?php
if(isset($_POST['numeros']) && isset($_POST['pesos']) && isset($_POST['altos']) && isset($_POST['largos']) && isset($_POST['descs']) && isset($_POST['anchos']) && isset($_POST['manejos']) && isset($_POST['especiales']) && isset($_POST['cpo']) && isset($_POST['cpd']) && isset($_POST['name']) && isset($_POST['last']) && isset($_POST['email']) && isset($_POST['tel']) && isset($_POST['ismoral']) && isset($_POST['razon']) && isset($_POST['declarado']) && isset($_POST['valor']) && isset($_POST['aux'])){

    require_once('console/connection.php');
    
    $codenum = $_POST['numeros'];
    $codepeso = $_POST['pesos'];
    $codealto = $_POST['altos'];
    $codelargo = $_POST['largos'];
    $codedes = $_POST['descs'];
    $codeancho = $_POST['anchos'];
    $codemanejo = $_POST['manejos'];
    $codeesp = $_POST['especiales'];
    
    $cpo = $_POST['cpo'];
    $cpd = $_POST['cpd'];
    $name = $_POST['name'];
    $ape = $_POST['last'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $ismmoral = $_POST['ismoral'];
    $razon = $_POST['razon'];
    $declarado = $_POST['declarado'];
    $valor = $_POST['valor'];
    $auxi = $_POST['aux'];

    $nums = json_decode(stripslashes($codenum));
    $pesos = json_decode(stripcslashes($codepeso));
    $altos = json_decode(stripcslashes($codealto));
    $largos = json_decode(stripcslashes($codelargo));
    $descs = json_decode(stripcslashes($codedes));
    $anchos = json_decode(stripcslashes($codeancho));
    $manejos = json_decode(stripcslashes($codemanejo));
    $especiales = json_decode(stripcslashes($codeesp));

    $response = '';

    $mensaje   = '<html> 
    <head> 
        <title>Prospecto cotizador</title> 
    </head><body>
    <center>
    <h1>Prospecto cotización</h1>
    <br>
    <h3>Nombre: '.$name.' '.$ape.'</h3>
    <br>
    <p>CP. Origen: '.$cpo.' CP. Destino: '.$cpd.'</p>
    <p>Correo: '.$email.'  Télefono: '.$tel.'</p>';

    if($ismmoral == "true"){
        $mensaje .= '<p>Razón Social: '.$razon.'</p>';
    }
    
    $mensaje .= ' <br>
    <h2>Descripción de paquete(s)</h2>';

    for($i=0; $i<=$auxi; $i++){

        $mensaje .= '<br>
        <p>Cantidad: '.$nums[$i].'</p>
        <p>Peso: '.$pesos[$i].'kg  Alto: '.$pesos[$i].'cm  Largo:  '.$largos[$i].'cm  Ancho: '.$anchos[$i].'cm</p>
        <p>Descripción: '.$descs[$i].'</p>';

        if($manejos[$i] == "true"){
            $mensaje .= '<p>Majeno Especial: '.$especiales[$i].'</p>';
        }
        
    }

    if($declarado == "true"){
        $mensaje .= '<br><p>Valor declarado: $'.$valor.'</p>';
    }

    $mensaje .= '<h2>Costos:</h2> <br>';

    $consultaCp = mysqli_query($connect, "SELECT disponibilidad.idDisponibilidad, disponibilidad.extendida, disponibilidad.terrestre, paqueterias.nombre, paqueterias.idPaqueteria FROM disponibilidad INNER JOIN paqueterias ON paqueterias.idPaqueteria = disponibilidad.idPaqueteria WHERE disponibilidad.idZona = '$cpd'");

    $num_disponible = mysqli_num_rows($consultaCp);

    $mostrarPaqu = true;

    if($num_disponible == 0){
        $message .= '<p>No hay disponibilidad en esa zona</p>';
        $response = '<div class="center"><h2>No hay disponibilidad en esa zona</h2></div>';
    }else{

        $pasa = true;
        $aux = 0;
        while($disponibilidad = mysqli_fetch_array($consultaCp)){
            
            if(strtolower($disponibilidad['terrestre']) != 'si'){
                $mensaje.='<p>'.$disponibilidad['nombre'].'   Servicio Terrestre: $'.$precio1;

                        $response .= '<div class="row hpan">
                        <div class="col s12 m6 l4 bl">
                        <div class="cuadro">
                        <br>
                        <h2>'.$disponibilidad['nombre'].'</h2>
                        <br>
                        </div>
                        </div>
                        
                        <div class="col s12 m6 l4 bl">
                            <div class="cuadro">
                            <br><br>
                            <h5>Servicio No Disponible</h5>
                            <br><br>
                            </div></div>';

                        $mensaje .= '<br>';
                            $response .= '<div class="col s12 m6 l4 bl">
                            <div class="cuadro">
                            <br><br>
                            <h5>Servicio No Disponible</h5>
                            <br><br>
                            </div></div></div>';
            }else{

                $aux++;
                $id = $disponibilidad["idPaqueteria"];
                $ex = $disponibilidad["extendida"];
                $precio1 = 0;
                $precio2 = 0;
                    
                // <div class="paq" id="paq'.$aux.'"><img src="img/paqueterias/'.$disponibilidad['imagen'].'" class="paqueteria"></div>

                if($id != 5){
                    for($i=0; $i<=$auxi; $i++){

                        $xona = 0;
                        $largo  = $largos[$i];    
                        $alto = $altos[$i];
                        $ancho = $anchos[$i];

                        $volumen = $largo * $alto * $ancho;
                        $volumen = $volumen/5000;

                        $peso = $pesos[$i];
                        if($volumen > $peso){
                            $peso = $volumen;
                        }
                        
                        if($id == 2){
                            if($peso <= 5 ){
                                $precio2 = $precio2 + (400.00 * $nums[$i]);
                            }else{
                                $base = $peso - 5;
                                $precio2 = $precio2 + ((400 + ($base * 55)) * $nums[$i]);
                            }
                            if($peso > 70){
                                $pasa = false;
                            }
                        }else if($id == 4){
                            if($peso <= 1 ){
                                $precio2 = $precio2 + (250.00 * $nums[$i]);
                            }else{
                                $base = $peso - 1;
                                $precio2 = $precio2 + ((250.00 + ($base * 60)) * $nums[$i]);
                            }
                            if($peso > 65){
                                $pasa = false;
                            }
                        }


                        $queryStatement = "SELECT * FROM tarifas WHERE idPaqueteria = $id AND de <= $peso AND hasta >= $peso LIMIT 1";
                        $result = mysqli_query($connect, $queryStatement);
                        
                        while($tarifa = mysqli_fetch_array($result)){
                            if(strtolower($ex) == 'si'){
                                if($id == 2){
                                    $precio1 = $precio1 + (floatval($tarifa['precio']) * $nums[$i]) + 170;
                                }else if($id == 4){
                                    if($peso <= 5 ){
                                        $precio1 = $precio1 + (floatval($tarifa['precio']) * $nums[$i]) + 198;
                                    }else{
                                        $base = $peso - 5;
                                        $precio1 = $precio1 + (floatval($tarifa['precio']) * $nums[$i]) + (198 + ($base * 6));
                                    }
                                    
                                }
                            }else{
                                $precio1 = $precio1 + (floatval($tarifa['precio']) * $nums[$i]);
                            }
                            
                        }
                    
                        if($id == 2){
                            if(floatval($pesos[$i]) > 30){
                                $precio1 += 175;
                                $precio2 += 175;
                            }
        
                            if($largo >= 122 || $alto >= 122 || $ancho >= 122){
                                $precio1 += 175;
                                $precio2 += 175;
                            }
                        }
                    }

                    if($declarado == "true"){
                        if($id == 2){
                            $seguro = 92 + (floatval($valor) * 0.01);
                            $precio1 = $precio1 + $seguro;
                            $precio2 = $precio2 + $seguro;
                        }else if($id == 4){
                            $seguro = 90 + (floatval($valor) * 0.0125);
                            $precio1 = $precio1 + $seguro;
                            $precio2 = $precio2 + $seguro;
                        }
                    }
                    '<div class="center"></div>';
                    
                    if($pasa){
                        $mensaje.='<p>'.$disponibilidad['nombre'].'   Servicio Terrestre: $'.$precio1;

                        $response .= '<div class="row hpan">
                        <div class="col s12 m6 l4 bl">
                        <div class="cuadro">
                        <br>
                        <h2>'.$disponibilidad['nombre'].'</h2>
                        <br>
                        </div>
                        </div>
                        
                        <div class="col s12 m6 l4 bl">
                        <div class="cuadro">
                        <p><b>Servicio Terrestre</b></p>
                        <h5>Costo envio: <br> $'.$precio1.'</h5>
                        <a class="waves-effect btn sol" onclick="solicitar(\''.$disponibilidad['nombre'].'\',\''.$precio1.'\',\'Servicio Terrestre\')">Solicitar Recolección</a>
                        </div>
                        </div>';
                        
                        if($id != 4 || $peso <= 1){
                            $response .= '<div class="col s12 m6 l4 bl">
                            <div class="cuadro">
                            <p><b>Servicio Aereo <br> (24-48 hrs)</b></p>
                            <h5>Costo envio: <br> $'.$precio2.'</h5>
                            <a class="waves-effect btn sol" onclick="solicitar(\''.$disponibilidad['nombre'].'\',\''.$precio2.'\',\'Servicio Aereo\')">Solicitar Recolección</a>
                            </div>
                            </div>
                            </div>';

                        $mensaje .= '   Servicio Aereo: $'.$precio2.'</p> <br>';
                        }else{
                            $mensaje .= '<br>';
                            $response .= '<div class="col s12 m6 l4 bl">
                            <div class="cuadro">
                            <br><br>
                            <h5>Servicio No Disponible</h5>
                            <br><br>
                            </div></div></div>';
                        }
                    }else{
                        $mensaje.='<p>'.$disponibilidad['nombre'].'   <h2>Exceso de peso</h2>';

                        $response .= '<div class="row hpan">
                        <div class="col s12 m6 l4 bl">
                        <div class="cuadro">
                        <br>
                        <h2>'.$disponibilidad['nombre'].'</h2>
                        <br>
                        </div>
                        </div>
                        
                        <div class="col s12 m6 l8 bl">
                        <div class="cuadro">
                        <br>
                        <p class="">Su paquete tiene exceso de peso, para solicitar una cotización comunicarse a los teléfonos 55 70455360 / 55 70309881</p>
                        <br>
                        </div>
                        </div>
                        </div>';
                    }

                }else{
                    $mensaje.='<p>'.$disponibilidad['nombre'].'   Servicio Terrestre: Por Definir </p> <br>';
            
                    $response .= '<div class="row hpan">
                    <div class="col s12 m6 l4 bl">
                    <div class="cuadro">
                    <br>
                    <h3>'.$disponibilidad['nombre'].'</h3>
                    <br>
                    </div>
                    </div>
                    
                    <div class="col s12 m6 l4 bl">
                    <div class="cuadro">
                    <br>
                    <div class="row valign-wrapper">
                    <form class="col s12">
                    <div class="row">
                        <div class="col s1"></div>
                        <div class="col s10">
                        <br>
                        <div class="input-field" id="coloniadiv">
                            <select id="colonia" name="colonia" onchange="cotizaPaq(this.value)">
                            <option value="" disabled selected>Selecciona la colonia</option>';

                            $querystatement = "SELECT * FROM colonias WHERE cp = '$cpd'";

                            $result = mysqli_query($connect, $querystatement);
                            while($colonia = mysqli_fetch_array($result)){
                                $response.= '<option value="'.$colonia['id'].','.$colonia['colonia'].'">'.$colonia['colonia'].'</option>';
                            }

                        $response .= '</select>
                            <label>Colonias</label>
                        </div>
                        </div>
                        </div>
                    </div>
                    </form>
                </div>
                    </div>'; 
                    
                    $response .= '<div class="col s12 m6 l4 bl" id="prepaq">
                    <div class="cuadro">
                    <div id="paqExp"></div>
                    </div>
                    </div></div>';
                }
            }
        }
    }

    $mensaje.='</center></body></html>';

$para      = 'informes@envi-express.mx, josemedellin@abal.mx';
$titulo    = 'Prospecto Cotizador';
$cabeceras = 'MIME-Version: 1.0' . "\r\n"."Content-type:text/html;charset=UTF-8" . "\r\n".'From: ENVI-express'.' <cotizador@envi-express.mx>' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($para, $titulo, $mensaje, $cabeceras);
    echo $response;
}else{
    echo 'Ha ocurrido un error!';
}
?>