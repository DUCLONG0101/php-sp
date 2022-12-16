<?php
    require_once "./LogIn/sql.php";
    require_once "./infor_general.php";

    $thongbao = "<h2 style=\"color: red;\">Sửa thất bại</h2>";
    if(isset($_GET['TenLop']) && isset($_GET['TenMon']) && isset($_GET['NamHoc']) && isset($_GET['MaGV'])){
        $ngbd = '';
        $ngkt = '';
        $today = strtotime(date('Y/m/d'));
        $query = "SELECT * from namhoc_hocky where NamHoc = '".$_GET['NamHoc']."'";
        $data = $sql->getdata($query);
        while($a = $data->fetch_assoc()){
            if($a['HocKy'] == '1')
                $ngbd = $a['NgayBD'];
            if($a['HocKy'] == '2')
                $ngkt = $a['NgayKT'];
        }

        if($today <= strtotime($ngkt) && $today >= strtotime($ngbd)){
            $malop = $sql->getdata("SELECT MaLop from lophoc where TenLop = '".$_GET['TenLop']."' and NamHoc = '".$_GET['NamHoc']."'")->fetch_assoc()['MaLop'];
            $mamon = $sql->getdata("SELECT MaMon from monhoc where TenMon = '".$_GET['TenMon']."'")->fetch_assoc()['MaMon'];
            $query = "UPDATE `dayhoc` SET `MaGV`='".$_GET['MaGV']."' WHERE MaLop = '".$malop."' and MaMon = '".$mamon."'";
            if($sql->exe($query)){
                echo "<h2 style=\"color: rgb(1, 233, 1);\">Sửa thành công</h2>";
                die();
            }
            else{
                echo "<h2 style=\"color: red;\">Sửa thất bại</h2>";
                die();
            }
        }else{
            echo "<h2 style=\"color: rgb(1, 233, 1);\">Sửa thất bại</h2>";
        }

        if($_GET['NamHoc'] == $namhoc_sau){
            $query = "UPDATE `dayhoc` SET `MaGV`='[value-3]' WHERE MaLop = '".$malop."' and MaMon = '".$mamon."'";
            if($sql->exe($query)){
                echo "<h2 style=\"color: rgb(1, 233, 1);\">Sửa thành công</h2>";
                die();
            }
            else{
                echo "<h2 style=\"color: rgb(1, 233, 1);\">Sửa thất bại</h2>";
                die();
            }
        }
              
    }
    echo $thongbao." <p>Lưu ý: Năm học đã qua không thể sửa</p>";
?>