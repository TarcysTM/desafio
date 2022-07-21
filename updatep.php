<?php
header('Access.Control-Allow-Origin:*');
require_once('config.php');

$id = $_POST['id'];
$namep = $_POST['namep'];
$ingredientesp = $_POST['ingredientesp-1'];

if(empty($namep) || empty($ingredientesp)){
    echo json_encode(["message"=>"TODOS OS CAMPOS DEVEM SER PREENCHIDOS"]);
}else{
    $sql = "UPDATE pizzas SET nome_pizza='$namep', ingredientes_pizza='$ingredientesp' WHERE id_pizza='$id'";

    $response = $connection->query($sql);

    if($response === TRUE){
        echo json_encode(["message"=>"PIZZA ATUALIZADA COM SUCESSO!"]);
    }else{
        echo json_encode(["message"=>"ERRO AO ATUALIZAR"]);
    }
}

?>