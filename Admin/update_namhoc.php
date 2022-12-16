<?php
    session_start();
    require_once "./LogIn/sql.php";
    require_once "./infor_general.php";

    $sql = new SQL();
    $thongbao = "<h2 style=\"color: red;\">Sửa thất bại</h2> <p>Lưu ý: Ngày bắt đầu phải nhỏ hơn ngày kết thúc</p> <p>Không thể sửa đổi khi học kỳ hoặc năm học đã kết thúc</p>";

    if(isset($_GET['NamHoc']) && isset($_GET['BD1']) && isset($_GET['KT1']) && isset($_GET['BD2']) && isset($_GET['KT2'])){
        $bd1 = '';
        $kt1 = '';
        $bd2 = '';
        $kt2 = '';

        $query  = "SELECT * from namhoc_hocky where NamHoc = '".$_GET['NamHoc']."'";
        $data_namhoc = $sql->getdata($query);
        while($row = $data_namhoc->fetch_assoc()){
            if($row['HocKy'] == '1'){
                $bd1 = $row['NgayBD'];
                $kt1 = $row['NgayKT'];
            }
            if($row['HocKy'] == '2'){
                $bd2 = $row['NgayBD'];
                $kt2 = $row['NgayKT'];
            }
        }

        function doi($a,$b){
            if($a!=""){
                return $a;
            }
            else
                return $b;
        }

        $bd1 = doi($_GET['BD1'],$bd1);
        $kt1 = doi($_GET['KT1'],$kt1);
        $bd2 = doi($_GET['BD2'],$bd2);
        $kt2 = doi($_GET['KT2'],$kt2);
        
        if(strtotime($bd1) < strtotime($kt1) && strtotime($kt1) < strtotime($bd2) && strtotime($bd2) < strtotime($kt2) ){
            $update_2 = '';
            $update_1 = '';
            $tuan1 = (strtotime('2021/12/27')-strtotime('2021/9/13'))/15;
            $checkhk1 = (int)((strtotime($kt1) - strtotime($bd1))/$tuan1);
            $checkhk2 = (int)((strtotime($kt2) - strtotime($bd2))/$tuan1);
            if($checkhk1 >= 15 && $checkhk2 >= 15){
                $today = strtotime(date('Y/m/d'));
                if($today <= strtotime($bd1)){
                    $update_1 = "UPDATE `namhoc_hocky` SET `NamHoc`='".$_GET['NamHoc']."',`HocKy`='1',`NgayBD`='".$bd1."',`NgayKT`='".$kt1."' WHERE NamHoc = '".$_GET['NamHoc']."' and HocKy = '1'";
                    $update_2 = "UPDATE `namhoc_hocky` SET `NamHoc`='".$_GET['NamHoc']."',`HocKy`='2',`NgayBD`='".$bd2."',`NgayKT`='".$kt2."' WHERE NamHoc = '".$_GET['NamHoc']."' and HocKy = '2'";
                }
                else if($today <= strtotime($kt1)){
                    
                    if($_GET['KT1'] != "" || $_GET['BD2'] != "" || $_GET['KT2'] != "" && $_GET['BD1'] == ''){
                        $update_1 = "UPDATE `namhoc_hocky` SET `NamHoc`='".$_GET['NamHoc']."',`HocKy`='1',`NgayKT`='".$kt1."' WHERE NamHoc = '".$_GET['NamHoc']."' and HocKy = '1'";
                        $update_2 = "UPDATE `namhoc_hocky` SET `NamHoc`='".$_GET['NamHoc']."',`HocKy`='2',`NgayBD`='".$bd2."',`NgayKT`='".$kt2."' WHERE NamHoc = '".$_GET['NamHoc']."' and HocKy = '2'";
                    }
                }
                else if($today <= strtotime($bd2)){
                    if($_GET['BD2'] != "" || $_GET['KT2'] != "" && $_GET['BD1'] == '' && $_GET['KT1'] == ''){
                        $update_2 = "UPDATE `namhoc_hocky` SET `NamHoc`='".$_GET['NamHoc']."',`HocKy`='2',`NgayBD`='".$bd2."',`NgayKT`='".$kt2."' WHERE NamHoc = '".$_GET['NamHoc']."' and HocKy = '2'";
                    }
                }
                else if($today <= strtotime($kt2)){
                    if($_GET['KT2'] != "" && $_GET['BD1'] == '' && $_GET['KT1'] == '' && $_GET['BD2'] == ''){
                        $update_2 = "UPDATE `namhoc_hocky` SET `NamHoc`='".$_GET['NamHoc']."',`HocKy`='2',`NgayKT`='".$kt2."' WHERE NamHoc = '".$_GET['NamHoc']."' and HocKy = '2'";
                    }
                }
                else {
                    echo "Aaa";
                }
    
                if($update_1 != ""){
                    if($sql->exe($update_1) && $sql->exe($update_2)){
                        $thongbao = "<h2 style=\"color: rgb(1, 233, 1);\">Sửa thành công</h2> <p>Lưu ý: Ngày bắt đầu phải nhỏ hơn ngày kết thúc</p><p>Không thể sửa đổi khi học kỳ hoặc năm học đã kết thúc</p>";
                    }
                }
                else{
                    if($update_2 != ""){
                        if($sql->exe($update_2)){
                            $thongbao = "<h2 style=\"color: rgb(1, 233, 1);\">Sửa thành công</h2> <p>Lưu ý: Ngày bắt đầu phải nhỏ hơn ngày kết thúc</p><p>Không thể sửa đổi khi học kỳ hoặc năm học đã kết thúc</p>";
                        }
                    }
                }
            }
            else{
                $thongbao = "<h2 style=\"color: red;\">Mỗi học kỳ phải tối thiểu là 15 tuần</h2> <p>Lưu ý: Ngày bắt đầu phải nhỏ hơn ngày kết thúc</p> <p>Không thể sửa đổi khi học kỳ hoặc năm học đã kết thúc</p>";
            }
        }
    }

    echo $thongbao;
?>