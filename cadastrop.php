<?php

    header('Access-Control-Allow-Origin: *');

    require_once('config.php');
    session_start();    

    $namep=$_POST['namep'];
    $ingredientesp=$_POST['ingredientesp'];    

    if(empty($namep) || empty($ingredientesp)){
        echo json_encode(["message" => "PREENCHER TODOS OS CAMPOS"]);
    }else{

        $str = "SELECT * FROM pizzas WHERE nome_pizza = '$namep'";

        $response = $connection->query($str);

        if($response->num_rows > 0){
            echo json_encode(["message"=>"PIZZA JA ESTA CADASTRADA"]);

        }else{

            $sql = "INSERT INTO pizzas (nome_pizza, ingredientes_pizza) VALUES ('".$namep."', '".$ingredientesp."')";

            $result = $connection->query($sql);

            if(!$result){
                http_response_code(500);
                echo json_encode(["message" => "ERRO AO INSERIR NO BANCO DE DADOS"]);
            }else{
                http_response_code(200);
                echo json_encode(["message" => "PIZZA CADASTRADA"]);
            }   
    }

    

}

?>