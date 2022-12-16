<?php
    require_once "./LogIn/sql.php";
    $sql = new SQL();
    $table = '';
    if(isset($_GET['col']) && isset($_GET['inf'])){
        
        if($_GET['inf'] != ''){
            $query = "SELECT MaLop, TenLop, TenGV, SiSo, NamHoc, lophoc.GhiChu from lophoc inner join giaovien on lophoc.MaGV = giaovien.MaGV where ".$_GET['col']." like '%".$_GET['inf']."%'  order by lophoc.GhiChu asc";
            $data = $sql->getdata($query);
            if($data->num_rows>0){
                $i = 1;
                while($row = $data->fetch_assoc()){
                    if($i%2 != 0){
                        $table .= "
                            <tr class=\"class noidungbang class_bold\" onclick=\"todam_hang(this)\">
                                <td align=\"center\" width=\"5%\" >".$i."</td>
                                <td align=\"center\" width=\"12%\">".$row['MaLop']."</td>
                                <td align=\"center\" width=\"15%\">".$row['TenLop']."</td>
                                <td align=\"center\" width=\"25%\">".$row['TenGV']."</td>
                                <td align=\"center\" width=\"7%\">".$row['SiSo']."</td>
                                <td align=\"center\" width=\"12%\">".$row['NamHoc']."</td>
                                <td align=\"center\" width=\"15%\">".$row['GhiChu']."</td>
                            </tr>
                        ";
                    }
                    else{
                        $table .= "
                            <tr class=\"class noidungbang\" onclick=\"todam_hang(this)\">
                                <td align=\"center\" width=\"5%\" >".$i."</td>
                                <td align=\"center\" width=\"12%\">".$row['MaLop']."</td>
                                <td align=\"center\" width=\"15%\">".$row['TenLop']."</td>
                                <td align=\"center\" width=\"25%\">".$row['TenGV']."</td>
                                <td align=\"center\" width=\"7%\">".$row['SiSo']."</td>
                                <td align=\"center\" width=\"12%\">".$row['NamHoc']."</td>
                                <td align=\"center\" width=\"15%\">".$row['GhiChu']."</td>
                            </tr>
                        ";
                    }
                    $i++;
                }
            }
            
        }
        else{
            $query = "SELECT MaLop, TenLop, TenGV, SiSo, NamHoc, lophoc.GhiChu from lophoc inner join giaovien on lophoc.MaGV = giaovien.MaGV  order by lophoc.GhiChu asc";
            $data_lophoc_bang = $sql->getdata($query);
            $i=1;
            
            while($row = $data_lophoc_bang->fetch_assoc()){
                if($i%2 != 0){
                    $table .= "
                        <tr class=\"class noidungbang class_bold\" onclick=\"todam_hang(this)\">
                            <td align=\"center\" width=\"5%\" >".$i."</td>
                            <td align=\"center\" width=\"12%\">".$row['MaLop']."</td>
                            <td align=\"center\" width=\"15%\">".$row['TenLop']."</td>
                            <td align=\"center\" width=\"25%\">".$row['TenGV']."</td>
                            <td align=\"center\" width=\"7%\">".$row['SiSo']."</td>
                            <td align=\"center\" width=\"12%\">".$row['NamHoc']."</td>
                            <td align=\"center\" width=\"15%\">".$row['GhiChu']."</td>
                        </tr>
                    ";
                }
                else{
                    $table .= "
                        <tr class=\"class noidungbang\" onclick=\"todam_hang(this)\">
                            <td align=\"center\" width=\"5%\" >".$i."</td>
                            <td align=\"center\" width=\"12%\">".$row['MaLop']."</td>
                            <td align=\"center\" width=\"15%\">".$row['TenLop']."</td>
                            <td align=\"center\" width=\"25%\">".$row['TenGV']."</td>
                            <td align=\"center\" width=\"7%\">".$row['SiSo']."</td>
                            <td align=\"center\" width=\"12%\">".$row['NamHoc']."</td>
                            <td align=\"center\" width=\"15%\">".$row['GhiChu']."</td>
                        </tr>
                    ";
                }
                $i++;
            }
        }
    }

    echo $table;
?>