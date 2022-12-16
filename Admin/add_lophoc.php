<?php
    require_once "./LogIn/sql.php";
    require_once "./infor_general.php";
    
    $thongbao = "<h2 style=\"color: red;\">Thêm thất bại</h2>";
    if(isset($_GET['MaLop']) && isset($_GET['TenLop']) && isset($_GET['MaGV']) && isset($_GET['Khoi'])){
        $sql = new SQL();
        $namhoc_sau_1 = $sql->getdata("SELECT * from namhoc_hocky where NamHoc = '".$namhoc_sau."'");

        if($namhoc_sau_1->num_rows >0){
            $tenlop = $sql->getdata("SELECT TenLop from lophoc where NamHoc = '".$namhoc_sau."'");
            while($a = $tenlop->fetch_assoc()){
                if($_GET['TenLop'] == $a['TenLop']){
                    echo "<p style=\"color: #4979ff; font-weight: 600; font-size: 18px; text-align: center\">Tên lớp đã tồn tại. Vui lòng nhập tên khác</p>"; 
                    die();
                }
            }
            $query = "INSERT INTO `lophoc`(`MaLop`, `TenLop`, `MaGV`, `SiSo`, `NamHoc`, `GhiChu`, `Khoi`) VALUES ('".$_GET['MaLop']."','".$_GET['TenLop']."','".$_GET['MaGV']."','0','".$namhoc_sau."','','".$_GET['Khoi']."')";     
            if($sql->exe($query)){
                $thongbao = "<h2 style=\"color: rgb(1, 233, 1);\">Thêm thành công</h2>";
            }
            

        }
        else{
            echo "<p style=\"color: #4979ff; font-weight: 600; font-size: 18px; text-align: center\">Năm học đang diễn ra hoặc năm học mới <br>chưa được tạo sẽ không thể thêm mới lớp học</p>"; 
            die();
        }
        
    }
    
    echo $thongbao;
?>