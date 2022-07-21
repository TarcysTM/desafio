<?php
header('Access.Control-Allow-Origin:*');
require_once('config.php');

$id = $_POST['id'];
$name = $_POST['name'];
$valor = $_POST['valor'];

if(empty($name) || empty($valor)){
    echo json_encode(["message"=>"TODOS OS CAMPOS DEVEM SER PREENCHIDOS"]);
}else{
    $sql = "UPDATE ingredientes SET nome_ingr='$name', valor_ingr='$valor' WHERE id_ingr='$id'";

    $response = $connection->query($sql);

    if($response === TRUE){
        echo json_encode(["message"=>"INGREDIENTE ATUALIZADO COM SUCESSO!"]);
    }else{
        echo json_encode(["message"=>"ERRO AO ATUALIZAR"]);
    }
}

?>