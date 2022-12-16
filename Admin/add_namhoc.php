<?php
    session_start();
    require_once "./LogIn/sql.php";
    require_once "./infor_general.php";
    
    $thongbao = "<h2 style=\"color: red;\">Thêm thất bại</h2>";

    if(isset($_GET['NamHoc']) && isset($_GET['BD1']) && isset($_GET['BD2']) && isset($_GET['KT1']) && isset($_GET['KT2'])){
        $kthk2 = $sql->getdata("SELECT * from namhoc_hocky where NamHoc = '$namhoc_hientai' and HocKy = '2'")->fetch_assoc()['NgayKT'];
        if(strtotime(date('Y/m/d')) > strtotime($kthk2)){
        // if(strtotime(date('Y/m/d')) > 1){
            $a = strtotime($kthk2);
            $nam1 = (int)date("Y",$a);
            $b = strtotime($_GET['BD1']);
            $nam2 = (int)date("Y",$b);
            if($nam1 == $nam2){
                if(strtotime($_GET['BD1']) < strtotime($_GET['KT1']) &&  strtotime($_GET['KT1']) < strtotime($_GET['BD2']) && strtotime($_GET['BD2']) < strtotime($_GET['KT2'])){
                    $tuan15 = strtotime('2021/12/27')-strtotime('2021/9/13');
                    $time_hk1 = strtotime($_GET['KT1'])-strtotime($_GET['BD1']);
                    $time_hk2 = strtotime($_GET['KT2'])-strtotime($_GET['BD2']);

                    if($time_hk1 > $tuan15 && $time_hk2 > $tuan15){
                        $query = "INSERT INTO `namhoc`(`NamHoc`) VALUES ('".$_GET['NamHoc']."')";
                        
                        if($sql->exe($query)){
                            $query_nhhk1 = "INSERT INTO `namhoc_hocky`(`NamHoc`, `HocKy`, `NgayBD`, `NgayKT`) VALUES ('".$_GET['NamHoc']."','1','".$_GET['BD1']."','".$_GET['KT1']."')";
                            $query_nhhk2 = "INSERT INTO `namhoc_hocky`(`NamHoc`, `HocKy`, `NgayBD`, `NgayKT`) VALUES ('".$_GET['NamHoc']."','2','".$_GET['BD2']."','".$_GET['KT2']."')";
                            if($sql->exe($query_nhhk1)){
                                if($sql->exe($query_nhhk2)){
                                    $thongbao = "<h2 style=\"color: rgb(1, 233, 1);\">Thêm thành công</h2>";
                                }else{
                                    $sql->exe("DELETE from namhoc where NamHoc = '".$_GET['NamHoc']."'");
                                }
                            }
                            else{
                                $sql->exe("DELETE from namhoc where NamHoc = '".$_GET['NamHoc']."'");
                            }
                        }
                    }else{
                        $thongbao .= "<h3 style=\"color: red;\">Mỗi kỳ học phải nhiều hơn 15 tuần</h3>";
                    }
                    
                } else{
                    $thongbao .= "<h3 style=\"color: red;\">Ngày bắt đầu phải nhở hơn ngày kết thúc</h3>";
                } 
            }
        }
        else{
            $thongbao .= "<h3 style=\"color: red;\">Học kỳ hiện tại chưa kết thúc không thể thêm</h3>";
        }
    }

    echo $thongbao;

?>