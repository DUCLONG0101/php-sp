<?php
    session_start();
    require_once "./LogIn/sql.php";
    require_once "./infor_general.php";

    $today = strtotime(date('Y/m/d'));
    $kthk2 = $sql->getdata("SELECT * from namhoc_hocky where NamHoc = '".$namhoc_hientai."' and HocKy = '2'")->fetch_assoc()['NgayKT'];

    if($today > strtotime($kthk2) ){
    // if($today > 1 ){
        $data_ktnh = $sql->getdata("SELECT * from lophoc where Khoi = '9' and NamHoc = '".$namhoc_hientai."'");
        $check = true;
        while($b = $data_ktnh->fetch_assoc()){
            if($b['GhiChu'] != 'đã kết thúc'){
                $check = false;
                break;
            }
        }
        if(!$check){
            $query = "SELECT * from lophoc_hocsinh inner join lophoc on lophoc.Malop = lophoc_hocsinh.MaLop where Khoi = '9' and NamHoc = '".$namhoc_hientai."'";
            $data = $sql->getdata($query);
            $i=0;
            $j= 0;
            $k = 0;
            while($a = $data->fetch_assoc()){
                $k++;
                $danhgia = $sql->getdata("SELECT * from danhgia where MaHS = '".$a['MaHS']."' and MaLop = '".$a['MaLop']."'")->fetch_assoc()['XepLoai'];
                if($danhgia  != "Kém"){
                    $update_hs = "UPDATE `hocsinh` SET `TinhTrang`='tốt nghiệp' WHERE MaHS = '".$a['MaHS']."'";
                    if($sql->exe($update_hs)){
                        $i++;
                    }
                }
                else{
                    $update_hs = "UPDATE `hocsinh` SET `TinhTrang`='trượt tốt nghiệp' WHERE MaHS = '".$a['MaHS']."'";
                    $sql->exe($update_hs);
                    $j++;
                }
                $sql->exe("UPDATE `lophoc` SET `GhiChu`='đã kết thúc' WHERE MaLop = '".$a['MaLop']."'");
                
            }
            $thongbao = "
                <div style=\"display: flex; align-items: center;\">
                    <label style=\"min-width: 170px; font-weight: 600; color: #4979ff\" for=\"\">Tốt nghiệp:</label>
                    <p style=\"color: rgb(20, 238, 0); font-weight: 600;\">".$i."/".$k."</p>
                </div>
                <div style=\"display: flex; align-items: center;\">
                    <label style=\"min-width: 170px; font-weight: 600; color: #4979ff\" for=\"\">Trượt tốt nghiệp:</label>
                    <p style=\"color: red; font-weight: 600;\">".$j."/".$k."</p>
                </div>
            ";
            echo $thongbao;
        }
        else{
            echo "<p style=\"color: #4979ff; font-weight: 600; font-size: 18px\">Đã xét tốt nghiệp cho học sinh lớp 9</p>"; 
        }
        
    }
    else{
        echo "<p style=\"color: #4979ff; font-weight: 600; font-size: 18px\">Năm học chưa kết thúc không thể xét tốt nghiệp</p>";
    }

?>