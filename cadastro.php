<?php

    header('Access-Control-Allow-Origin: *');

    require_once('config.php');
    session_start();

    $name=$_POST['name'];
    $valor=$_POST['valor'];

    if(empty($name) || empty($valor)){
        echo json_encode(["message" => "PREENCHER TODOS OS CAMPOS"]);
    }else{

        $str = "SELECT * FROM ingredientes WHERE nome_ingr = '$name'";

        $response = $connection->query($str);

        if($response->num_rows > 0){
            echo json_encode(["message"=>"INGREDIENTE JA ESTA CADASTRADO"]);

        }else{

            $sql = "INSERT INTO ingredientes (nome_ingr, valor_ingr) VALUES ('".$name."', '".$valor."')";

            $result = $connection->query($sql);

            if(!$result){
                http_response_code(500);
                echo json_encode(["message" => "ERRO AO INSERIR NO BANCO DE DADOS"]);
            }else{
                http_response_code(200);
                echo json_encode(["message" => "INGREDIENTE CADASTRADO"]);
            }   
    }

    

}

?>