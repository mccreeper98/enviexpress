<?php
if(isset($_POST['numeros']) && isset($_POST['pesos']) && isset($_POST['altos']) && isset($_POST['largos']) && isset($_POST['descs']) && isset($_POST['anchos']) && isset($_POST['manejos']) && isset($_POST['especiales']) && isset($_POST['cpo']) && isset($_POST['cpd']) && isset($_POST['name']) && isset($_POST['last']) && isset($_POST['email']) && isset($_POST['tel']) && isset($_POST['ismoral']) && isset($_POST['razon']) && isset($_POST['declarado']) && isset($_POST['valor']) && isset($_POST['aux']) && isset($_POST['col'])){

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
    $col = explode(",",$_POST['col'])[0];

    $nums = json_decode(stripslashes($codenum));
    $pesos = json_decode(stripcslashes($codepeso));
    $altos = json_decode(stripcslashes($codealto));
    $largos = json_decode(stripcslashes($codelargo));
    $descs = json_decode(stripcslashes($codedes));
    $anchos = json_decode(stripcslashes($codeancho));
    $manejos = json_decode(stripcslashes($codemanejo));
    $especiales = json_decode(stripcslashes($codeesp));

    $precio = 0;
    $res = '';

    $statemenCol = "SELECT * FROM colonias WHERE id = '$col'";
    $queryCol = mysqli_query($connect, $statemenCol);
    $pasaa = true;
    while($colonia = mysqli_fetch_array($queryCol)){

        $tipo = $colonia['zona'];
        $suc = $colonia['sucursal'];
        for($i=0; $i<=$auxi; $i++){
            $xona = 0;
            $largo  = $largos[$i];    
            $alto = $altos[$i];
            $ancho = $anchos[$i];

            $cubicaje = $largo * $alto * $ancho;

            $cubicaje = $cubicaje / 1000000;
            if($cubicaje <= 0.01){  
                $xona = 5;
            }else if($cubicaje <= 0.023){
                $xona = 10;
            }else if($cubicaje <= 0.048){
                $xona = 20;
            }else if($cubicaje <= 0.075){
                $xona = 30;
            }else if($cubicaje <= 0.141){
                $xona = 40;
            }else if($cubicaje <= 0.245){
                $xona = 50;
            }else if($cubicaje <= 0.319){
                $xona = 60;
            }

            $peso = $pesos[$i];
            
            if($xona > $peso){
                $peso = $xona;
            }
            

            if($peso > 60){
                $pasaa = false;
            }

            $queryStatement = "SELECT * FROM tarifas WHERE idPaqueteria = 5 AND de <= $peso AND hasta >= $peso AND zona = $tipo";
            $result = mysqli_query($connect, $queryStatement);
            // $res = substr($suc,-2);
            while($tarifa = mysqli_fetch_array($result)){
                if(substr($suc,-2) != '01'){
                    $precio = $precio + ((floatval($tarifa['precio']) + 321) * $nums[$i]);
                }else{
                    $precio = $precio + ($tarifa['precio'] * $nums[$i]);
                }
            }
        }

        }

        if($declarado == "true"){
            $canax = $valor/1000;
            $seguro = 24 * $canax;
            $precio = $precio + $seguro;
        }

        if($pasaa){
            $res = '<p><b>Servicio terrestre</b></p>
        <h5>Costo envio: <br> $'.$precio.'</h5>
        <a class="waves-effect btn sol" onclick="solicitar(\'Paquete Express\',\''.$precio.'\',\'Servicio Terrestre\')">Solicitar Recolección</a>';
        }else{
            $res = '<br>
                    <p class="">Su paquete tiene exceso de peso, para solicitar una cotización comunicarse a los teléfonos 55 70455360 / 55 70309881</p>
                    <br>';
        }

    echo $res;
}else{
    echo 'Error';
}
?>

