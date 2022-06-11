<?php

if(isset($_POST['cp'])){

    require_once('console/connection.php');

    $cep = $_POST['cp'];

    $resp='';

    $query = "SELECT * FROM zona WHERE cp = '$cep' LIMIT 1";
    $res = mysqli_query($connect, $query);
    while( $row = mysqli_fetch_array($res)){
        $resp = $row['estado'];
    }

    echo $resp;
}

?>