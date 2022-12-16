<?php
    require_once "./LogIn/sql.php";
    $sql = new SQL();
    $table = '';
    if(isset($_GET['col']) && isset($_GET['inf'])){
        
        if($_GET['inf'] != ''){
            $query = "";
            if($_GET['col'] == "MaBoMon"){
                $query = "SELECT * from giaovien inner join bomon on giaovien.MaBoMon = bomon.MaBoMon where TenBoMon like '%".$_GET['inf']."%'";
            }
            else
                $query = "SELECT * from giaovien inner join bomon on giaovien.MaBoMon = bomon.MaBoMon where ".$_GET['col']." like '%".$_GET['inf']."%' ";
            $data = $sql->getdata($query);
            if($data->num_rows>0){
                $i = 1;
                while($row = $data->fetch_assoc()){
                    if($i%2 != 0){
                        $table .= "
                            <tr class=\"class noidungbang class_bold\" onclick=\"todam_hang(this)\">
                                <td align=\"center\" width=\"5%\" >".$i."</td>
                                <td align=\"center\" width=\"10%\">".$row['MaGV']."</td>
                                <td align=\"center\" width=\"18%\">".$row['TenGV']."</td>
                                <td align=\"center\" width=\"10%\">".$row['DienThoai']."</td>
                                <td align=\"center\" width=\"10%\">".$row['DiaChi']."</td>
                                <td align=\"center\" width=\"10%\">".$row['TenBoMon']."</td>
                                <td align=\"center\" width=\"7%\">".$row['GhiChu']."</td>   
                            </tr>
                        ";
                    }
                    else{
                        $table .= "
                            <tr class=\"class noidungbang\" onclick=\"todam_hang(this)\">
                                <td align=\"center\" width=\"5%\" >".$i."</td>
                                <td align=\"center\" width=\"10%\">".$row['MaGV']."</td>
                                <td align=\"center\" width=\"18%\">".$row['TenGV']."</td>
                                <td align=\"center\" width=\"10%\">".$row['DienThoai']."</td>
                                <td align=\"center\" width=\"10%\">".$row['DiaChi']."</td>
                                <td align=\"center\" width=\"10%\">".$row['TenBoMon']."</td>
                                <td align=\"center\" width=\"7%\">".$row['GhiChu']."</td>   
                            </tr>
                        ";
                    }
                    $i++;
                }
            }
            
        }
        else{
            $query = "SELECT * from giaovien inner join bomon on giaovien.MaBoMon = bomon.MaBoMon";
            $data_giaovien_bang = $sql->getdata($query);
            $i=1;
            
            while($row = $data_giaovien_bang->fetch_assoc()){
                if($i%2 != 0){
                    $table .= "
                        <tr class=\"class noidungbang class_bold\" onclick=\"todam_hang(this)\">
                            <td align=\"center\" width=\"5%\" >".$i."</td>
                            <td align=\"center\" width=\"10%\">".$row['MaGV']."</td>
                            <td align=\"center\" width=\"18%\">".$row['TenGV']."</td>
                            <td align=\"center\" width=\"10%\">".$row['DienThoai']."</td>
                            <td align=\"center\" width=\"10%\">".$row['DiaChi']."</td>
                            <td align=\"center\" width=\"10%\">".$row['TenBoMon']."</td>
                            <td align=\"center\" width=\"7%\">".$row['GhiChu']."</td>   
                        </tr>
                    ";
                }
                else{
                    $table .= "
                        <tr class=\"class noidungbang\" onclick=\"todam_hang(this)\">
                            <td align=\"center\" width=\"5%\" >".$i."</td>
                            <td align=\"center\" width=\"10%\">".$row['MaGV']."</td>
                            <td align=\"center\" width=\"18%\">".$row['TenGV']."</td>
                            <td align=\"center\" width=\"10%\">".$row['DienThoai']."</td>
                            <td align=\"center\" width=\"10%\">".$row['DiaChi']."</td>
                            <td align=\"center\" width=\"10%\">".$row['TenBoMon']."</td>
                            <td align=\"center\" width=\"7%\">".$row['GhiChu']."</td>   
                        </tr>
                    ";
                }
                $i++;
            }
        }
    }

    echo $table;
?>