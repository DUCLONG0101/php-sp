<?php
    require_once "./LogIn/sql.php";
    require_once "./infor_general.php";
    $thongbao = "";
    if(isset($_GET['Info'])){
        $sql = new SQL();
        $mang = explode(',',$_GET['Info']);
        for($i=0;$i<count($mang);$i++){
            // $today = strtotime(date('Y/m/d'));
            // $kthk2 = $sql->getdata("SELECT * from namhoc_hocky where NamHoc = '".$namhoc_hientai."' and HocKy = '2'")->fetch_assoc()['NgayKT'];

            // if($today > strtotime($kthk2) ){

            // }
            $mang1 = explode('_',$mang[$i]);
            if($mang1[2] == $namhoc_sau){
                $malop = $sql->getdata("SELECT MaLop from lophoc where TenLop = '".$mang1[1]."' and NamHoc = '".$mang1[2]."'")->fetch_assoc()['MaLop'];
                $mamon = $sql->getdata("SELECT MaMon from monhoc where TenMon = '".$mang1[0]."'")->fetch_assoc()['MaMon'];
                
                $query = "DELETE from dayhoc where MaLop = '".$malop."' and MaMon = '".$mamon."'";
                if($sql->exe($query)){
                    $thongbao .= "<h3 style=\"color: rgb(1, 233, 1);\">Xóa thành công phân công giảng dạy cho giáo viên day: ".$mang[$i]."</h3>";
                }
                else
                    $thongbao .= "<h3 style=\"color: red;\">Xóa thất bại phân công giảng dạy cho giáo viên day: ".$mang[$i]."</h3>";
            }
            else{
                $thongbao .= "<h3 style=\"color: red;\">Xóa thất bại phân công giảng dạy cho giáo viên day: ".$mang[$i]."</h3>"; 
                
            }

        }
    }
    echo $thongbao."<p>Năm học đã, đang diễn ra sẽ không thể xóa</p>";
?>

