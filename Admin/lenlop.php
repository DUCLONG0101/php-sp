<?php
    session_start();
    require_once "./LogIn/sql.php";
    require_once "./infor_general.php";

    if(isset($_GET['MaLop']) && isset($_GET['MaLenLop'])  && isset($_GET['TenLenLop'])  && isset($_GET['MaGV']) ){
        $aaa = "SELECT * from namhoc_hocky inner join lophoc on lophoc.NamHoc = namhoc_hocky.NamHoc where namhoc_hocky.NamHoc = '".$namhoc_hientai."' and HocKy = '2' and MaLop = '".$_GET['MaLop']."'";
        $aaa1 = $sql->getdata($aaa);
        if($aaa1->num_rows == 0){
            echo "<p style=\"color: red; font-weight: 600\">Lớp học chưa diễn ra không thể xét lên lớp</p>";
            die();
        }
        $kthk2 = $aaa1->fetch_assoc()['NgayKT'];
        $i=0;
        $j=0;
        $namhoc_sau = date('Y',strtotime($kthk2))."-".(date('Y',strtotime($kthk2))+1);
        if(strtotime(date('Y/m/d')) > strtotime($kthk2)){
        // if(strtotime(date('Y/m/d')) > 1){
            
            $khoi = $sql->getdata("SELECT * from lophoc where MaLop = '".$_GET['MaLop']."'")->fetch_assoc()['Khoi'];
            $siso = $sql->getdata("SELECT * from lophoc where MaLop = '".$_GET['MaLop']."'")->fetch_assoc()['SiSo'];
            if($khoi != 9){
                $data = $sql->getdata("SELECT * from lophoc_hocsinh where MaLop = '".$_GET['MaLop']."'");
                $ghichu = $sql->getdata("SELECT * from lophoc where MaLop = '".$_GET['MaLop']."'")->fetch_assoc()['GhiChu'];
                if($ghichu != "đã kết thúc"){
                    if($sql->exe("INSERT INTO `lophoc`(`MaLop`, `TenLop`, `MaGV`, `SiSo`, `NamHoc`, `GhiChu`, `Khoi`) VALUES ('".$_GET['MaLenLop']."','".$_GET['TenLenLop']."','".$_GET['MaGV']."','0','".$namhoc_sau."','','".($khoi+1)."')")){
                        
                        //Tính điểm trung bình

                        //Xét hạnh kiểm
                        
                        $thongbao = '';
                        $khoi += 1;
                        while($a = $data->fetch_assoc()){
                            $checkdk = $sql->getdata("SELECT * from danhgia where MaLop = '".$_GET['MaLop']."' and MaHS = '".$a['MaHS']."'")->fetch_assoc()['XepLoai'];
                            if($checkdk == 'Kém'){
                                $sql->exe("UPDATE `hocsinh` SET `TinhTrang`='ở lại lớp' WHERE MaHS = '".$a['MaHS']."'");
                                
                                $j++;                            
                            }else{
                                $chenhs = "INSERT INTO `lophoc_hocsinh`(`MaLop`, `MaHS`) VALUES ('".$_GET['MaLenLop']."','".$a['MaHS']."')";
                                if($sql->exe($chenhs)){
                                    $data_monhoc = $sql->getdata("SELECT * from monhoc where Khoi = '".$khoi."'");
                                    while($row = $data_monhoc->fetch_assoc()){
                                        $chendiem = "INSERT INTO `diem`(`MaHS`, `MaLop`, `MaMon`, `Diem15PhutHK1`, `Diem1TietHK1`, `DiemGiuaKyHK1`, `DiemCuoiKyHK1`, `DiemTbHK1`, `Diem15PhutHK2`, `Diem1TietHK2`, `DiemGiuaKyHK2`, `DiemCuoiKyHK2`, `DiemTbHK2`, `DiemTbMon`) VALUES ('".$a['MaHS']."','".$_GET['MaLenLop']."','".$row['MaMon']."','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1')";
                                        $sql->exe($chendiem);
                                       
                                    }
                                    $i++;
                                }
                                $chendiemTbnam = "INSERT INTO `diemtbnam`(`MaHS`, `NamHoc`, `DiemTBNam`) VALUES ('".$a['MaHS']."','".$namhoc_sau."','-1')";
                                $sql->exe($chendiemTbnam);
                                $chendanhgia = "INSERT INTO `danhgia`(`MaHS`, `MaLop`, `HanhKiem`, `HocLuc`, `XepLoai`) VALUES ('".$a['MaHS']."','".$_GET['MaLenLop']."','','','')";
                                $sql->exe($chendanhgia);
                            }
                        }

                        $sql->exe("UPDATE `lophoc` SET `GhiChu`='đã kết thúc' WHERE MaLop = '".$_GET['MaLop']."'");
                        
                        $thongbao .= "
                            <div style=\"display: flex; align-items: center;\">
                                <label style=\"min-width: 170px; font-weight: 600; color: #4979ff\" for=\"\">Lên lớp thành công:</label>
                                <p style=\"color: rgb(20, 238, 0); font-weight: 600;\">".$i."/".$siso."</p>
                            </div>
                            <div style=\"display: flex; align-items: center;\">
                                <label style=\"min-width: 170px; font-weight: 600; color: #4979ff\" for=\"\">Lên lớp thành công:</label>
                                <p style=\"color: red; font-weight: 600;\">".$j."/".$siso."</p>
                            </div>
                        ";
                        $sohs = $sql->getdata("SELECT COUNT(MaHS) as SoHS from lophoc_hocsinh where MaLop = '".$_GET['MaLenLop']."'")->fetch_assoc()['SoHS'];
                        $sql->exe("UPDATE `lophoc` SET SiSo = '".$sohs."' where MaLop = '".$_GET['MaLenLop']."'");
                        echo $thongbao;
                    }
                    else echo "<p style=\"color: red; font-weight: 600\">Năm học mới chưa tồn tại</p>";
                }
                else{
                    echo "<p style=\"color: red; font-weight: 600\">Lớp học đã được xét lên lớp</p>";
                }
                
                
            }
            else{
                echo "<p style=\"color: red; font-weight: 600\">Vui lòng chọn chức năng xét tốt nghiệp để tiếp tục</p>";
            }
        }
        else{
            echo "<p style=\"color: red; font-weight: 600\">Năm học chưa kết thúc không thể xét lên lớp</p>";
        }
    }

?>