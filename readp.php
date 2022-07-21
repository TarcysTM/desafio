<?php
    header('Access-Control-Allow-Origin: *');
    require_once('config.php');
    $sql = "SELECT * FROM pizzas ORDER BY id_pizza ASC";

    $resultado = $connection->query($sql);

    if($resultado->num_rows > 0){
        foreach($resultado as $row){
            echo"<tr>";
                echo"<td>".$row["nome_pizza"]."</td>";
                echo"<td>".$row["ingredientes_pizza"]."</td>";

                echo"<td>
                    <button type='button' class='btn btn-success' onclick=getId('".$row['id_pizza']."')>editar</button>
                    <button type='button' class='btn btn-danger' onclick=remove('".$row['id_pizza']."')>excluir</button>
                </td>";
            echo"</tr>";
        }
    }else{
        echo("");
    }
?>