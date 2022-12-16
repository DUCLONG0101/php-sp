<?php
    require_once "./LogIn/sql.php";

    $sql = new SQL();

    $query_lop = "SELECT * from lophoc";
    $data_lop = $sql->getdata($query_lop);
    $gv_tunhien = array();
    $gv_xahoi = array();

    $query_gv_tunhien = "SELECT MaGV from giaovien where MaBoMon = 'TuNhien'";
    $data_tunhien = $sql->getdata($query_gv_tunhien);
    $i=0;
    while($row = $data_tunhien->fetch_assoc()){
        $gv_tunhien[$i] = $row['MaGV'];
        $i++;
    }
    $query_gv_xahoi = "SELECT MaGV from giaovien where MaBoMon = 'XaHoi'";
    $data_xahoi = $sql->getdata($query_gv_xahoi);
    $i=0;
    while($row = $data_xahoi->fetch_assoc()){
        $gv_xahoi[$i] = $row['MaGV'];
        $i++;
    }


    while($row = $data_lop->fetch_assoc()){
        $query_monhoc = "SELECT * from monhoc where Khoi = '".$row['Khoi']."'";
        $data_monhoc = $sql->getdata($query_monhoc);
        while($row_monhoc = $data_monhoc->fetch_assoc()){
            if($row_monhoc['MaBoMon'] == 'TuNhien'){
                $gv = $gv_tunhien[array_rand($gv_tunhien)];
                $sql->exe("INSERT INTO `dayhoc`(`MaMon`, `MaLop`, `MaGV`) VALUES ('".$row_monhoc['MaMon']."','".$row['MaLop']."','$gv')");
            }else{
                $gv = $gv_xahoi[array_rand($gv_xahoi)];
                $sql->exe("INSERT INTO `dayhoc`(`MaMon`, `MaLop`, `MaGV`) VALUES ('".$row_monhoc['MaMon']."','".$row['MaLop']."','$gv')");
            }
        }
    }
?>