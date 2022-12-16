<?php
    require_once "./LogIn/sql.php";
    require_once "./infor_general.php";
    $thongbao = "<h2 style=\"color: red;\">Sửa thất bại</h2>";
    $thongtinhs = '';
    $thongtinlophoc = '';
    $luuy = '';
    if(isset($_GET['MaHSCu']) && isset($_GET['MaHS']) && isset($_GET['TenHS']) && isset($_GET['MaLop']) && isset($_GET['NgaySinh']) & isset($_GET['GioiTinh']) && isset($_GET['DiaChi']) && isset($_GET['PhuHuynh']) && isset($_GET['SDT']) && isset($_GET['TinhTrang'])){
        $tinhtrang = $sql->getdata("SELECT * from hocsinh where MaHS = '".$_GET['MaHSCu']."'")->fetch_assoc()['TinhTrang'];
        if($tinhtrang != "tốt nghiệp"){
            $sql = new SQL();
           
    
            $mahs = '';
            $tenhs = '';
            $malop = '';
            $malopmoi = '';
            $ngaysinh = '';
            $gioitinh = '';
            $diachi = '';
            $phuhuynh = '';
            $sdt = '';
            $tinhtrang = '';
            
            $data = $sql->getdata("SELECT * from hocsinh where MaHS = '".$_GET['MaHSCu']."'");
            while($row = $data->fetch_assoc()){
                $mahs = $row['MaHS'];
                $tenhs = $row['TenHS'];
                $ngaysinh = $row['NgaySinh'];
                $gioitinh = $row['GioiTinh'];
                $diachi = $row['DiaChi'];
                $phuhuynh = $row['PhuHuynh'];
                $sdt = $row['SoDTPhuHuynh'];
                $tinhtrang = $row['TinhTrang'];
            }
    
            $data_lop = $sql->getdata("SELECT *from lophoc_hocsinh where MaLop");
            
            
            function setdata(&$a,$b){
                if($b != '')
                    $a = $b;
            }
            setdata($mahs, $_GET['MaHS']);
            setdata($tenhs, $_GET['TenHS']);
            setdata($malopmoi, $_GET['MaLop']);
            setdata($ngaysinh, $_GET['NgaySinh']);
            setdata($gioitinh, $_GET['GioiTinh']);
            setdata($diachi, $_GET['DiaChi']);
            setdata($phuhuynh, $_GET['PhuHuynh']);
            setdata($sdt, $_GET['SDT']);
            setdata($tinhtrang, $_GET['TinhTrang']);
    
            $query = "UPDATE `hocsinh` SET `MaHS`='".$mahs."',`TenHS`='".$tenhs."',`NgaySinh`='".$ngaysinh."',`GioiTinh`='".$gioitinh."',`DiaChi`='".$diachi."',`PhuHuynh`='".$phuhuynh."',`SoDTPhuHuynh`='".$sdt."',`TinhTrang`='".$tinhtrang."' WHERE MaHS = '".$_GET['MaHSCu']."'";
            if($sql->exe($query)){
                if($_GET['MaLop'] != ""){
                    $data_lophoc = $sql->getdata("SELECT * from lophoc_hocsinh inner join lophoc on lophoc.MaLop = lophoc_hocsinh.MaLop where MaHS = '".$mahs."' and NamHoc = '$namhoc_hientai'");
                    if($data_lophoc->num_rows > 0){
                        $today = strtotime(date('Y/m/d'));
                        $kthk2 = $sql->getdata("SELECT * from namhoc_hocky where NamHoc = '".$namhoc_hientai."' and HocKy = '2'")->fetch_assoc()['NgayKT'];

                        if($today > strtotime($kthk2) ){
                            $thongtinhs = "thành công";
                            $thongtinlophoc = "thất bại";
                        }
                        else{
                            $dulieu = $data_lophoc->fetch_assoc(); 
                            $malop = $dulieu['MaLop'];
                            $khoi = $dulieu['Khoi'];
                            $khoi_moi = $sql->getdata("SELECT Khoi from lophoc where MaLop = '".$malopmoi."'")->fetch_assoc()['Khoi'];
                            if($khoi == $khoi_moi){
                                $query1 = "UPDATE `lophoc_hocsinh` SET `MaHS`='".$mahs."',`MaLop`='".$malopmoi."' WHERE MaHS = '".$mahs."' and MaLop = '".$malop."'";
                                $sql->exe($query1);
                                $thongtinhs = "thành công";
                                $thongtinlophoc = "thành công";
                                $sohs = $sql->getdata("SELECT COUNT(MaHS) as SoHS from lophoc_hocsinh where MaLop = '".$malop."'")->fetch_assoc()['SoHS'];
                                $sql->exe("UPDATE `lophoc` SET SiSo = '".$sohs."' where MaLop = '".$malop."'");
                                $sohs = $sql->getdata("SELECT COUNT(MaHS) as SoHS from lophoc_hocsinh where MaLop = '".$malopmoi."'")->fetch_assoc()['SoHS'];
                                $sql->exe("UPDATE `lophoc` SET SiSo = '".$sohs."' where MaLop = '".$malopmoi."'");
                            }
                            else{
                                $thongtinhs = "thành công";
                                $thongtinlophoc = "thất bại";
                                $luuy = "<span>Không thể sửa lớp học khác khối</span><br>";
                            }
                        }
                        
                    }
                    else{
                        $today = strtotime(date('Y/m/d'));
                        $kthk2 = $sql->getdata("SELECT * from namhoc_hocky where NamHoc = '".$namhoc_hientai."' and HocKy = '2'")->fetch_assoc()['NgayKT'];
                        $bdhk1 = $sql->getdata("SELECT * from namhoc_hocky where NamHoc = '".$namhoc_hientai."' and HocKy = '1'")->fetch_assoc()['NgayBD'];

                        if($today >= strtotime($bdhk1) && $today <= strtotime($kthk2)){
                            $thongtinhs = "thành công";
                            $thongtinlophoc = "thất bại";
                            $luuy = "<span>Không thể thêm vào lớp học khi năm học đang diễn ra</span><br>";
                        }
                        else{
                            if($sql->exe("INSERT INTO lophoc_hocsinh(`MaHS`,`MaLop`) VALUES ('".$mahs."','".$malopmoi."')")){
                                $lophoc_hocsinh = "SELECT Khoi from lophoc where MaLop = '".$malopmoi."'";
                                $khoi = $sql->getdata($lophoc_hocsinh)->fetch_assoc()['Khoi'];
                                $data_monhoc = $sql->getdata("SELECT * from monhoc where Khoi = '".$khoi."'");
                                while($row = $data_monhoc->fetch_assoc()){
                                    $chendiem = "INSERT INTO `diem`(`MaHS`, `MaLop`, `MaMon`, `Diem15PhutHK1`, `Diem1TietHK1`, `DiemGiuaKyHK1`, `DiemCuoiKyHK1`, `DiemTbHK1`, `Diem15PhutHK2`, `Diem1TietHK2`, `DiemGiuaKyHK2`, `DiemCuoiKyHK2`, `DiemTbHK2`, `DiemTbMon`) VALUES ('".$mahs."','".$malopmoi."','".$row['MaMon']."','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1')";
                                    $sql->exe($chendiem);
                                }
                                $thongtinhs = "thành công";
                                $thongtinlophoc = "thất bại";                    
                            }
                        }
                        
                    }
                }
                else{
                    $thongtinhs = 'thành công';
                    $thongtinlophoc = 'không thực hiện';
                }
            }
            else{
                $thongtinhs = 'thất bại';
                $thongtinlophoc = 'không thực hiện';
            }
        }else{
            echo "<p style=\"color: #4979ff; font-weight: 600; font-size: 18px\">Học sinh đã tốt nghiệp không thể sửa</p>"; 
            die();
        }             
    }
    
    function color($a){
        if($a == "thành công")
            return "color: rgb(1, 233, 1);";
        else if($a == "thất bại")
            return "color: red;";
        else
            return "";
    }
    $colorhs = color($thongtinhs);
    $colorlh = color($thongtinlophoc);
    echo "<div style=\"display: flex; justify-content: space-between; width: 100%\"><p style=\" font-weight: bold; text-align: center; color: #000; font-size: 18px; min-width: 150px;\">Thông tin học sinh: </p><span style=\"".$colorhs."; min-width: 150px; font-weight: bold;\">".$thongtinhs."</span></div>";
    echo "<div style=\"display: flex; justify-content: space-between; width: 100%\"><p style=\" font-weight: bold; text-align: center; color: #000; font-size: 18px; min-width: 150px;\">Thông tin lớp học : </p><span style=\"".$colorlh."; min-width: 150px; font-weight: bold;\">".$thongtinlophoc."</span></div>";
    echo "<br><p style=\"text-align: center\">Lưu ý: ".$luuy."Không thể sửa lớp học khi năm học đã kết thúc</p>";
?>