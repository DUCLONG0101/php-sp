<?php
    require_once "./LogIn/sql.php";
    $thongbao = "<h2 style=\"color: red;\">Thêm thất bại</h2>";
    if(isset($_GET['MaGV']) && isset($_GET['TenGV']) && isset($_GET['DienThoai']) && isset($_GET['DiaChi']) && isset($_GET['GhiChu']) && isset($_GET['mabomon'])){
        $sql = new SQL();
        $query = "INSERT INTO `giaovien`(`MaGV`, `Pass`, `TenGV`, `DienThoai`, `DiaChi`, `GhiChu`, `MaBoMon`) VALUES ('".$_GET['MaGV']."','12345','".$_GET['TenGV']."','".$_GET['DienThoai']."','".$_GET['DiaChi']."','".$_GET['GhiChu']."','".$_GET['mabomon']."')";
        
        if($sql->exe($query)){
            $thongbao = "<h2 style=\"color: rgb(1, 233, 1);\">Thêm thành công</h2>";
        }

        
    }
    echo $thongbao;
?>