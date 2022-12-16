<?php
    session_start();
    require_once "./LogIn/sql.php";
    $sql = new SQL();
    if(isset($_POST['usercu']) && isset($_POST['tendn']) && isset($_POST['mkcu']) && isset($_POST['mkmoi'])){
        $tdn = '';
        $mk = '';

        $query0 = "SELECT * from admin where username = '".$_POST['usercu']."'";
        $data0 = $sql->getdata($query0);
        if($data0->num_rows>0){
            $row = $data0->fetch_assoc();
            $tdn = $row['username'];
            $mk = $row['pass'];
            $query = "SELECT * from admin where username = '".$_POST['usercu']."' and pass = '".$_POST['mkcu']."'";
            $data = $sql->getdata($query);
            if($data->num_rows>0){
                if($_POST['mkmoi']==''){
                    if($_POST['tendn']!=''){
                        $query1 = "UPDATE `admin` SET `username`='".$_POST['tendn']."' WHERE username='".$_POST['usercu']."'";
                        if($sql->exe($query1)){
                            $tdn = $_POST['tendn'];
                            echo "<h2 style=\"color: rgb(1, 82, 233);\">Thông báo</h2><p style=\"font-size: 15px; color: #333; margin-top: 20px;\">Sửa thành công tên đăng nhập</p>";
                        }
                    }
                }
                else{
                    if($_POST['tendn']==''){
                        $query2 = "UPDATE `admin` SET `pass`='".$_POST['mkmoi']."' WHERE username='".$_POST['usercu']."'";
                        if($sql->exe($query2)){
                            $mk = $_POST['mkmoi'];
                            echo "<h2 style=\"color: rgb(1, 82, 233);\">Thông báo</h2><p style=\"font-size: 15px; color: #333; margin-top: 20px;\">Sửa thành công mật khẩu</p>";
                        }
                    }
                    else{
                        $query3 = "UPDATE `admin` SET `username`='".$_POST['tendn']."', `pass`='".$_POST['mkmoi']."' WHERE username='".$_POST['usercu']."'";
                        if($sql->exe($query3)){
                            $tdn = $_POST['tendn'];
                            $mk = $_POST['mkmoi'];
                            echo "<h2 style=\"color: rgb(1, 82, 233);\">Thông báo</h2><p style=\"font-size: 15px; color: #333; margin-top: 20px;\">Sửa thành công tên đăng nhập và mật khẩu</p>";
                        }
                    }
                }
            }
            else{
                if($_POST['tendn']!=''){
                    if($_POST['mkcu']==''){
                        $query4 = "UPDATE `admin` SET `username`='".$_POST['tendn']."' WHERE username='".$_POST['usercu']."'";
                        if($sql->exe($query4)){
                            $tdn = $_POST['tendn'];
                            echo "<h2 style=\"color: rgb(1, 82, 233);\">Thông báo</h2><p style=\"font-size: 15px; color: #333; margin-top: 20px;\">Sửa thành công tên đăng nhập</p>";
                        }
                        else{
                            echo "<h2 style=\"color: rgb(1, 82, 233);\">Thông báo</h2><p style=\"font-size: 15px; color: red; margin-top: 20px;\">Sửa thất bại</p>";
                        }
                    }else{
                        echo "<h2 style=\"color: rgb(1, 82, 233);\">Thông báo</h2><p style=\"font-size: 15px; color: #333; margin-top: 20px;\">Nhập sai mật khẩu</p>";   
                    }
                }
                else{
                    echo "<h2 style=\"color: rgb(1, 82, 233);\">Thông báo</h2><p style=\"font-size: 15px; color: #333; margin-top: 20px;\">Nhập sai mật khẩu</p>";
                }
            }
            $_SESSION['userad'] = $tdn;
            $_SESSION['passad'] = $mk;
        }

        

    }
?>