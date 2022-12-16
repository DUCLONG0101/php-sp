<?php
    require_once "./LogIn/sql.php";
    $thongbao = "";
    if(isset($_GET['MaHS'])){
        $sql = new SQL();
        $mang = explode('_',$_GET['MaHS']);
        for($i=0;$i<count($mang);$i++){

            $query = "UPDATE hocsinh Set Pass = '12345' where MaHS = '".$mang[$i]."'";
            if($sql->exe($query)){
                $thongbao .= "<h3 style=\"color: rgb(1, 233, 1);\">Đặt lại mật khẩu thành công cho học sinh có mã hs là ".$mang[$i]."</h3>";
            }
            else
                $thongbao .= "<h3 style=\"color: red;\">Đặt lại mật khẩu thất bại cho học sinh có mã hs là ".$mang[$i]."</h3>";  
                      
        }
    }
    echo $thongbao;
?>