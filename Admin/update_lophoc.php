<?php
    require_once "./LogIn/sql.php";
    require_once "./infor_general.php";

    $thongbao = "<h2 style=\"color: red;\">Sửa thất bại</h2>";
    if(isset($_GET['MaLopCu']) && isset($_GET['MaLop']) && isset($_GET['TenLop']) && isset($_GET['MaGV'])){
        $sql = new SQL();
        $data = $sql->getdata("SELECT * from lophoc where MaLop = '".$_GET['MaLopCu']."'");
        $malop = '';
        $tenlop = '';
        $namhoc = '';
        $magv = '';
        $ghichu = '';

        while($row = $data->fetch_assoc()){
            $malop = $row['MaLop'];
            $tenlop = $row['TenLop'];
            $namhoc = $row['NamHoc'];
            $magv = $row['MaGV'];
            $ghichu = $row['GhiChu'];
        }
        
        function setdata(&$a,$b){
            if($b != '')
                $a = $b;
        }

        setdata($malop,$_GET['MaLop']);
        setdata($tenlop,$_GET['TenLop']);
        setdata($magv,$_GET['MaGV']);

        $data_ngay_bd = $sql->getdata("SELECT * from namhoc_hocky where NamHoc = '".$namhoc_hientai."' and HocKy = '1'")->fetch_assoc()['NgayBD'];
        $data_ngay_kt = $sql->getdata("SELECT * from namhoc_hocky where NamHoc = '".$namhoc_hientai."' and HocKy = '2'")->fetch_assoc()['NgayKT'];

        if(strtotime(date('Y/m/d')) >= strtotime($data_ngay_bd) && strtotime(date('Y/m/d')) <= strtotime($data_ngay_kt) && $ghichu != "đã kết thúc"){
            $check_tenlop = "SELECT * from lophoc where NamHoc = '".$namhoc_hientai."'";
            $data_tenlop_1 = $sql->getdata($check_tenlop);
            while($a = $data_tenlop_1->fetch_assoc()){
               
                if($a['TenLop'] == $_GET['TenLop']){
                    echo "<p style=\"color: #4979ff; font-weight: 600; font-size: 18px\">Tên lớp đã tồn tại. Vui lòng nhập tên khác</p>"; 
                    die();
                }
            }
            $query = "UPDATE `lophoc` SET `MaLop`='".$malop."',`TenLop`='".$tenlop."',`MaGV`='".$magv."',`NamHoc`='".$namhoc."',`GhiChu`='".$ghichu."' WHERE MaLop = '".$_GET['MaLopCu']."'";
            
            if($sql->exe($query)){
                $thongbao = "<h2 style=\"color: rgb(1, 233, 1);\">Sửa thành công</h2>";
            }  
        }
              
    }
    echo $thongbao."<p>Lưu ý không thể sửa lớp học đã kết thúc</p>";
?>