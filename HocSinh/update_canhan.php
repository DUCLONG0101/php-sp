<?php
    session_start();
    require_once "./LogIn/sql.php";
    $sql = new SQL();
    if(isset($_GET['mkcu']) && isset($_GET['mkmoi'])){
        $mkcu = $_GET['mkcu'];
        $mkmoi = $_GET['mkmoi'];

        $query0 = "SELECT * from hocsinh where MaHS = '".$_SESSION['userhs']."'";
        $data0 = $sql->getdata($query0);
        if($data0->num_rows>0){
            $row = $data0->fetch_assoc();
            $mk = $row['Pass'];
            if($mkcu == $mk){
                $query = "UPDATE hocsinh SET `Pass` = '$mkmoi' where MaHS = '".$_SESSION['userhs']."'";
                if($sql->exe($query)){
                    echo "<h2 style=\"color: rgb(1, 82, 233);\">Thông báo</h2><p id=\"thongbao_update1\" style=\"font-size: 15px; color: rgb(1, 233, 1);; margin-top: 20px;\">Đổi mật khẩu thành công</p>";
                    $mk = $mkmoi;
                }
                else
                    echo "<h2 style=\"color: rgb(1, 82, 233);\">Thông báo</h2><p id=\"thongbao_update1\" style=\"font-size: 15px; color: red; margin-top: 20px;\">Đổi mật khẩu thất bại</p>";
                
            }else{
                echo "<h2 style=\"color: rgb(1, 82, 233);\">Thông báo</h2><p id=\"thongbao_update1\" style=\"font-size: 15px; color: red; margin-top: 20px;\">Nhập sai mật khẩu</p>";
            }
            $_SESSION['passhs'] = $mk;
        }

        

    }
?>