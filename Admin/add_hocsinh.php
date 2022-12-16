<?php
    require_once "./LogIn/sql.php";
    require_once "./infor_general.php";
    $sql = new SQL();
    $query_namhoc_hocky = "SELECT * from namhoc_hocky where NamHoc = '".$namhoc_hientai."'";
    $ngaybd = '';
    $ngaykt = '';
    $data_namhoc_hocky = $sql->getdata($query_namhoc_hocky);
    while($row = $data_namhoc_hocky->fetch_assoc()){
        if($row['HocKy'] == '1')
            $ngaybd = $row['NgayBD'];
        if($row['HocKy'] == '2')
            $ngaykt = $row['NgayKT'];
            // $ngaykt = "2022/1/1";
    }
    $today = date("Y/m/d");


    if(strtotime($today) > strtotime($ngaybd) && strtotime($today) <= strtotime($ngaykt)){
        $thongbao = "<h2 style=\"color: blue;\">Thông báo</h2><p style=\"color: red; font-size: 15px\">Năm học đang được diễn ra không thể thêm</p>";
    }
    else{
        $thongbao = "<h2 style=\"color: red;\">Thêm thất bại</h2>";
        if(isset($_GET['MaHS']) && isset($_GET['TenHS']) && isset($_GET['MaLop']) && isset($_GET['NgaySinh']) & isset($_GET['GioiTinh']) && isset($_GET['DiaChi']) && isset($_GET['PhuHuynh']) && isset($_GET['SDT'])  ){
            if($_GET['MaLop']){
                $siso = "SELECT SiSo from lophoc where Malop = '".$_GET['MaLop']."'";
                $data = $sql->getdata($siso);
                if($data->fetch_assoc()['SiSo'] < $siso_max){
                    $query = "INSERT INTO `hocsinh`(`MaHS`, `Pass`, `TenHS`, `NgaySinh`, `GioiTinh`, `DiaChi`, `PhuHuynh`, `SoDTPhuHuynh`, `TinhTrang`) VALUES ('".$_GET['MaHS']."','12345','".$_GET['TenHS']."','".$_GET['NgaySinh']."','".$_GET['GioiTinh']."','".$_GET['DiaChi']."','".$_GET['PhuHuynh']."','".$_GET['SDT']."','đang học')";   
                    if($sql->exe($query)){
                        $query_lophoc_hocsinh = "INSERT INTO `lophoc_hocsinh`(`MaLop`,`MaHS`) VALUES ('".$_GET['MaLop']."','".$_GET['MaHS']."')";
                        $sql->exe($query_lophoc_hocsinh);
                        $lophoc_hocsinh = "SELECT Khoi from lophoc_hocsinh inner join lophoc on lophoc.MaLop = lophoc_hocsinh.MaLop where lophoc_hocsinh.MaLop = '".$_GET['MaLop']."' and MaHS = '".$_GET['MaHS']."'";
                        $khoi = $sql->getdata($lophoc_hocsinh)->fetch_assoc()['Khoi'];
                        $data_monhoc = $sql->getdata("SELECT * from monhoc where Khoi = '".$khoi."'");
                        while($row = $data_monhoc->fetch_assoc()){
                            $chendiem = "INSERT INTO `diem`(`MaHS`, `MaLop`, `MaMon`, `Diem15PhutHK1`, `Diem1TietHK1`, `DiemGiuaKyHK1`, `DiemCuoiKyHK1`, `DiemTbHK1`, `Diem15PhutHK2`, `Diem1TietHK2`, `DiemGiuaKyHK2`, `DiemCuoiKyHK2`, `DiemTbHK2`, `DiemTbMon`) VALUES ('".$_GET['MaHS']."','".$_GET['MaLop']."','".$row['MaMon']."','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1')";
                            $sql->exe($chendiem);
                        }
                        $thongbao = "<h2 style=\"color: rgb(1, 233, 1);\">Thêm thành công</h2>";
                    }
                    else{
                        $thongbao = "<h2 style=\"color: red;\">Thêm thất bại</h2>";
                    }
                }
                else{
                    $thongbao = "<h2 style=\"color: red;\">Thông báo</h2><p>Lớp đã đủ học sinh, không thể thêm</p>";
                }
                $sohs = $sql->getdata("SELECT COUNT(MaHS) as SoHS from lophoc_hocsinh where MaLop = '".$_GET['MaLop']."'")->fetch_assoc()['SoHS'];
                $sql->exe("UPDATE `lophoc` SET SiSo = '".$sohs."' where MaLop = '".$_GET['MaLop']."'");
            }
            else{
                $query = "INSERT INTO `hocsinh`(`MaHS`, `Pass`, `TenHS`, `NgaySinh`, `GioiTinh`, `DiaChi`, `PhuHuynh`, `SoDTPhuHuynh`, `TinhTrang`) VALUES ('".$_GET['MaHS']."','12345','".$_GET['TenHS']."','".$_GET['NgaySinh']."','".$_GET['GioiTinh']."','".$_GET['DiaChi']."','".$_GET['PhuHuynh']."','".$_GET['SDT']."','')";     
                if($sql->exe($query)){
                    $thongbao = "<h2 style=\"color: rgb(1, 233, 1);\">Thêm thành công</h2>";                    
                }
            }
        }
    }

    

    echo $thongbao;
?>