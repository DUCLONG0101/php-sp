<?php
    $sql = new mysqli('localhost','root','','quanlyhocsinh5');

    $data = $sql->query("Select * from hocsinh");

    while($row = $data->fetch_assoc()){
        echo $row['MaHS'];
    }

    echo 1;
?>