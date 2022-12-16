<?php
    require_once "./LogIn/sql.php";
    $thongbao = "<h2 style=\"color: red;\">Thêm thất bại</h2>";
    if(isset($_GET['MaMon']) && isset($_GET['TenMon']) && isset($_GET['Khoi']) && isset($_GET['BoMon'])){
        $sql = new SQL();
        $query = "INSERT INTO `monhoc`(`MaMon`, `TenMon`, `Khoi`,`MaBoMon`) VALUES ('".$_GET['MaMon']."','".$_GET['TenMon']."','".$_GET['Khoi']."','".$_GET['BoMon']."')";
        
        if($sql->exe($query)){
            $thongbao = "<h2 style=\"color: rgb(1, 233, 1);\">Thêm thành công</h2>";
        }
    }
    echo $thongbao;
?>