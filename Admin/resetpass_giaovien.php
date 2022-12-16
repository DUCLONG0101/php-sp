<?php
    require_once "./LogIn/sql.php";
    $thongbao = "";
    if(isset($_GET['MaGV'])){
        $sql = new SQL();
        $mang = explode('_',$_GET['MaGV']);
        for($i=0;$i<count($mang);$i++){

            $query = "UPDATE giaovien Set Pass = '12345' where MaGV = '".$mang[$i]."'";
            if($sql->exe($query)){
                $thongbao .= "<h3 style=\"color: rgb(1, 233, 1);\">Đặt lại mật khẩu thành công cho giáo viên có mã gv là ".$mang[$i]."</h3>";
            }
            else
                $thongbao .= "<h3 style=\"color: red;\">Đặt lại mật khẩu thất bại cho giáo viên có mã gv là ".$mang[$i]."</h3>";  
                      
        }
    }
    echo $thongbao;
?>