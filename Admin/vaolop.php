<?php
    require_once "./LogIn/sql.php";
    $sql = new SQL();
    $table = '';
    $i=1;
    if(isset($_GET['col']) && isset($_GET['inf'])){
        
        if($_GET['inf'] != ''){
            $query = "SELECT * from hocsinh inner join lophoc_hocsinh on hocsinh.MaHS = lophoc_hocsinh.MaHS inner join lophoc on lophoc.MaLop = lophoc_hocsinh.MaLop where lophoc_hocsinh.MaLop = '".$_GET['inf']."'";
            $data = $sql->getdata($query);
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
    }

    echo $table;
?>