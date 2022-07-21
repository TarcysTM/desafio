<?php

    header('Access-Control-Allow-Origin: *');

    require_once('config.php');

    $id = $_POST['id_ingr'];

    if(empty($id)){
        echo json_encode(["message"=>"SEM ID VALIDO"]);
    }else{
        $sql = "SELECT * FROM ingredientes WHERE id_ingr = '$id'" ;

        $response = $connection-> query($sql);
        $rows = array();

        if($response->num_rows > 0){
            foreach($response as $r){
                $rows[] = $r;
            }
            echo json_encode($rows);
            
        }else{
            echo json_encode(["messange"=>"NAO POSSUI INGREDIENTE COM ESSE ID"]);
        }
    }

?>