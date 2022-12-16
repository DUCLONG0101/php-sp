<?php
    require_once "./LogIn/sql.php";

    $sql = new SQL();

    $data = $sql->getdata("SELECT * FROM lophoc_hocsinh inner join lophoc on lophoc_hocsinh.MaLop = lophoc.MaLop");
    while($row = $data->fetch_assoc()){
        $data_monhoc = $sql->getdata("SELECT * from monhoc where Khoi = '".$row['Khoi']."'");
        while($row_monhoc = $data_monhoc->fetch_assoc()){
            $query = "INSERT INTO `diem`(`MaHS`, `MaLop`, `MaMon`, `Diem15PhutHK1`, `Diem1TietHK1`, `DiemGiuaKyHK1`, `DiemCuoiKyHK1`, `DiemTbHK1`, `Diem15PhutHK2`, `Diem1TietHK2`, `DiemGiuaKyHK2`, `DiemCuoiKyHK2`, `DiemTbHK2`, `DiemTbMon`) VALUES ('".$row['MaHS']."','".$row['MaLop']."','".$row_monhoc['MaMon']."','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1')";
            $sql->exe($query);
        }
    }
?>