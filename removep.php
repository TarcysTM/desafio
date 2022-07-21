<?php

header('Access-Control-Allow-Origin: *');

    require_once('config.php');

    $id=$_POST['id_pizza'];

    if(empty($id)){
        echo json_encode(["message"=>"NAO FOI PASSADOS NENHUM ID"]);
    }else{
        $sql="DELETE FROM pizzas WHERE id_pizza='$id'";

        $response = $connection->query($sql);

        if($response === TRUE){
            echo json_encode(["message"=>"PIZZA DELETADA COM SUCESSO"]);
        }else{
            echo json_encode(["message"=>"ERRO AO EXCLUIR PIZZA"]);
        }
    }
    
?>