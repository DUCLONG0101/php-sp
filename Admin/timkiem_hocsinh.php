<?php
    require_once "./LogIn/sql.php";
    require_once "./infor_general.php";
    $sql = new SQL();
    $table = '';
    if(isset($_GET['col']) && isset($_GET['inf'])){
        
        if($_GET['inf'] != ''){
            if($_GET['col'] == "TenLop"){
                $query = "SELECT * from hocsinh inner join lophoc_hocsinh on hocsinh.MaHS = lophoc_hocsinh.MaHS inner join lophoc on lophoc.MaLop = lophoc_hocsinh.MaLop where ".$_GET['col']." like '%".$_GET['inf']."%' and NamHoc = '$namhoc_hientai' order by TinhTrang asc";
            }
            else{
                $query = "SELECT * from hocsinh inner join lophoc_hocsinh on hocsinh.MaHS = lophoc_hocsinh.MaHS inner join lophoc on lophoc.MaLop = lophoc_hocsinh.MaLop where hocsinh.".$_GET['col']." like '%".$_GET['inf']."%' and NamHoc = '$namhoc_hientai' order by TinhTrang asc";
            }
            // $data = $sql->getdata($query);
            $i = 1;
            // $query1 = "SELECT * from hocsinh where ".$_GET['col']." like '%".$_GET['inf']."%' and MaHS not in (SELECT MaHS from lophoc_hocsinh inner join lophoc on lophoc.MaLop = lophoc_hocsinh.MaLop where NamHoc = '$namhoc_hientai')";
            $data = $sql->getdata($query);
            // if($data1->num_rows > 0){
            //     while($row = $data1->fetch_assoc()){
            //         if($i%2 != 0){
            //             $table .= "
            //                 <tr class=\"class noidungbang class_bold\" onclick=\"todam_hang(this)\">
            //                     <td align=\"center\" width=\"5%\" >".$i."</td>
            //                     <td align=\"center\" width=\"7%\">".$row['MaHS']."</td>
            //                     <td align=\"center\" width=\"18%\">".$row['TenHS']."</td>
            //                     <td align=\"center\" width=\"10%\">".$row['NgaySinh']."</td>
            //                     <td align=\"center\" width=\"7%\">".$row['GioiTinh']."</td>                                            
            //                     <td align=\"center\" width=\"15%\">".$row['DiaChi']."</td>
            //                     <td align=\"center\" width=\"10%\"></td>
            //                     <td align=\"center\" width=\"10%\">".$row['TinhTrang']."</td>
            //                 </tr>
            //             ";
            //         }
            //         else{
            //             $table .= "
            //                 <tr class=\"class noidungbang\" onclick=\"todam_hang(this)\">
            //                     <td align=\"center\" width=\"5%\" >".$i."</td>
            //                     <td align=\"center\" width=\"7%\">".$row['MaHS']."</td>
            //                     <td align=\"center\" width=\"18%\">".$row['TenHS']."</td>
            //                     <td align=\"center\" width=\"10%\">".$row['NgaySinh']."</td>
            //                     <td align=\"center\" width=\"7%\">".$row['GioiTinh']."</td>                                            
            //                     <td align=\"center\" width=\"15%\">".$row['DiaChi']."</td>
            //                     <td align=\"center\" width=\"10%\"></td>
            //                     <td align=\"center\" width=\"10%\">".$row['TinhTrang']."</td>
            //                 </tr>
            //             ";
            //         }
            //         $i++;
            //     }
            // }
            if($data->num_rows>0){
                while($row = $data->fetch_assoc()){
                    if($i%2 != 0){
                        $table .= "
                            <tr class=\"class noidungbang class_bold\" onclick=\"todam_hang(this)\">
                                <td align=\"center\" width=\"5%\" >".$i."</td>
                                <td align=\"center\" width=\"7%\">".$row['MaHS']."</td>
                                <td align=\"center\" width=\"18%\">".$row['TenHS']."</td>
                                <td align=\"center\" width=\"10%\">".$row['NgaySinh']."</td>
                                <td align=\"center\" width=\"7%\">".$row['GioiTinh']."</td>                                            
                                <td align=\"center\" width=\"15%\">".$row['DiaChi']."</td>
                                <td align=\"center\" width=\"10%\">".$row['TenLop']."</td>
                                <td align=\"center\" width=\"10%\">".$row['TinhTrang']."</td>
                            </tr>
                        ";
                    }
                    else{
                        $table .= "
                            <tr class=\"class noidungbang\" onclick=\"todam_hang(this)\">
                                <td align=\"center\" width=\"5%\" >".$i."</td>
                                <td align=\"center\" width=\"7%\">".$row['MaHS']."</td>
                                <td align=\"center\" width=\"18%\">".$row['TenHS']."</td>
                                <td align=\"center\" width=\"10%\">".$row['NgaySinh']."</td>
                                <td align=\"center\" width=\"7%\">".$row['GioiTinh']."</td>                                            
                                <td align=\"center\" width=\"15%\">".$row['DiaChi']."</td>
                                <td align=\"center\" width=\"10%\">".$row['TenLop']."</td>
                                <td align=\"center\" width=\"10%\">".$row['TinhTrang']."</td>
                            </tr>
                        ";
                    }
                    $i++;
                }
            }
            

        }
        else{

            $query = "SELECT * from hocsinh inner join lophoc_hocsinh on hocsinh.MaHS = lophoc_hocsinh.MaHS inner join lophoc on lophoc.MaLop = lophoc_hocsinh.MaLop where NamHoc = '$namhoc_hientai' order by TinhTrang asc";
            $data_lophoc_bang = $sql->getdata($query);
            $i=1;

            $query1 = "SELECT * from hocsinh where MaHS not in (SELECT MaHS from lophoc_hocsinh inner join lophoc on lophoc.MaLop = lophoc_hocsinh.MaLop where NamHoc = '$namhoc_hientai') order by TinhTrang asc";
            $data1 = $sql->getdata($query1);
            if($data1->num_rows >0){
                while($row = $data1->fetch_assoc()){
                    if($i%2 != 0){
                        $table .= "
                            <tr class=\"class noidungbang class_bold\" onclick=\"todam_hang(this)\">
                                <td align=\"center\" width=\"5%\" >".$i."</td>
                                <td align=\"center\" width=\"7%\">".$row['MaHS']."</td>
                                <td align=\"center\" width=\"18%\">".$row['TenHS']."</td>
                                <td align=\"center\" width=\"10%\">".$row['NgaySinh']."</td>
                                <td align=\"center\" width=\"7%\">".$row['GioiTinh']."</td>                                            
                                <td align=\"center\" width=\"15%\">".$row['DiaChi']."</td>
                                <td align=\"center\" width=\"10%\"></td>
                                <td align=\"center\" width=\"10%\">".$row['TinhTrang']."</td>
                            </tr>
                        ";
                    }
                    else{
                        $table .= "
                            <tr class=\"class noidungbang\" onclick=\"todam_hang(this)\">
                                <td align=\"center\" width=\"5%\" >".$i."</td>
                                <td align=\"center\" width=\"7%\">".$row['MaHS']."</td>
                                <td align=\"center\" width=\"18%\">".$row['TenHS']."</td>
                                <td align=\"center\" width=\"10%\">".$row['NgaySinh']."</td>
                                <td align=\"center\" width=\"7%\">".$row['GioiTinh']."</td>                                            
                                <td align=\"center\" width=\"15%\">".$row['DiaChi']."</td>
                                <td align=\"center\" width=\"10%\"></td>
                                <td align=\"center\" width=\"10%\">".$row['TinhTrang']."</td>
                            </tr>
                        ";
                    }
                    $i++;
                }
            }
            
            while($row = $data_lophoc_bang->fetch_assoc()){
                if($i%2 != 0){
                    $table .= "
                        <tr class=\"class noidungbang class_bold\" onclick=\"todam_hang(this)\">
                            <td align=\"center\" width=\"5%\" >".$i."</td>
                            <td align=\"center\" width=\"7%\">".$row['MaHS']."</td>
                            <td align=\"center\" width=\"18%\">".$row['TenHS']."</td>
                            <td align=\"center\" width=\"10%\">".$row['NgaySinh']."</td>
                            <td align=\"center\" width=\"7%\">".$row['GioiTinh']."</td>                                            
                            <td align=\"center\" width=\"15%\">".$row['DiaChi']."</td>
                            <td align=\"center\" width=\"10%\">".$row['TenLop']."</td>
                            <td align=\"center\" width=\"10%\">".$row['TinhTrang']."</td>
                        </tr>
                    ";
                }
                else{
                    $table .= "
                        <tr class=\"class noidungbang\" onclick=\"todam_hang(this)\">
                            <td align=\"center\" width=\"5%\" >".$i."</td>
                            <td align=\"center\" width=\"7%\">".$row['MaHS']."</td>
                            <td align=\"center\" width=\"18%\">".$row['TenHS']."</td>
                            <td align=\"center\" width=\"10%\">".$row['NgaySinh']."</td>
                            <td align=\"center\" width=\"7%\">".$row['GioiTinh']."</td>                                            
                            <td align=\"center\" width=\"15%\">".$row['DiaChi']."</td>
                            <td align=\"center\" width=\"10%\">".$row['TenLop']."</td>
                            <td align=\"center\" width=\"10%\">".$row['TinhTrang']."</td>
                        </tr>
                    ";
                }
                $i++;
            }
            
        }
    }

    echo $table;
?>