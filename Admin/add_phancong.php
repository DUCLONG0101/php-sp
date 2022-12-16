<?php
    require_once "./LogIn/sql.php";
    require_once "./infor_general.php";
    
    $thongbao = "<h2 style=\"color: red;\">Thêm thất bại</h2>";
    if(isset($_GET['MaLop']) && isset($_GET['MaMon']) && isset($_GET['MaGV'])){
        $sql = new SQL();
        $today = strtotime(date('Y/m/d'));
        $kthk2 = $sql->getdata("SELECT * from namhoc_hocky where NamHoc = '".$namhoc_hientai."' and HocKy = '2'")->fetch_assoc()['NgayKT'];

        if($today > strtotime($kthk2) ){
        // if($today > 1){
            $bomon_gv = $sql->getdata("SELECT * from giaovien where MaGV = '".$_GET['MaGV']."'")->fetch_assoc()['MaBoMon'];
            $data = $sql->getdata("SELECT * from monhoc where MaMon = '".$_GET['MaMon']."'")->fetch_assoc();
            $bomon_monhoc = $data['MaBoMon'];
            $khoi_monhoc = $data['Khoi'];
            $khoi_lophoc = $sql->getdata("SELECT Khoi from lophoc where MaLop = '".$_GET['MaLop']."'")->fetch_assoc()['Khoi'];
            if($khoi_monhoc == $khoi_lophoc){
                if($bomon_gv == $bomon_monhoc){
                    $query = "INSERT INTO `dayhoc`(`MaMon`, `MaLop`, `MaGV`) VALUES ('".$_GET['MaMon']."','".$_GET['MaLop']."','".$_GET['MaGV']."')";
                    if($sql->exe($query)){
                        echo "<h2 style=\"color: rgb(1, 233, 1);\">Thêm thành công</h2>";
                        die();
                    }
                }else{
                    echo "<p style=\"color: #4979ff; font-weight: 600; font-size: 18px; text-align: center\">Giáo viên không thể dạy môn khác bộ môn</p>"; 
                    die();
                }
            }
        }
        else{
            echo "<p style=\"color: #4979ff; font-weight: 600; font-size: 18px; text-align: center\">Năm học đang diễn ra không thể phân công</p>"; 
            die();
        }

    }
    echo $thongbao;
?>