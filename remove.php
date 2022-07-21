<?php

header('Access-Control-Allow-Origin: *');

    require_once('config.php');

    $id=$_POST['id_ingr'];

    if(empty($id)){
        echo json_encode(["message"=>"NAO FOI PASSADOS NENHUM ID"]);
    }else{
        $sql="DELETE FROM ingredientes WHERE id_ingr='$id'";

        $response = $connection->query($sql);

        if($response === TRUE){
            echo json_encode(["message"=>"INGREDIENTE DELETADO COM SUCESSO"]);
        }else{
            echo json_encode(["message"=>"ERRO AO EXCLUIR INGREDIENTE"]);
        }
    }
    
?>