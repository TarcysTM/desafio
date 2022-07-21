<?php
    header('Access-Control-Allow-Origin: *');
    require_once('config.php');
    $sql = "SELECT * FROM ingredientes ORDER BY id_ingr ASC";

    $resultado = $connection->query($sql);

    if($resultado->num_rows > 0){
        foreach($resultado as $row){
            echo"<tr>";
                echo"<td>".$row["nome_ingr"]."</td>";
                echo"<td>".$row["valor_ingr"]."</td>";

                echo"<td>
                    <button type='button' class='btn btn-success' onclick=getId('".$row['id_ingr']."')>Incluir</button>
                </td>";
            echo"</tr>";
        }
    }else{
        echo("");
    }
?>