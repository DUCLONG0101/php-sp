<?php
    require_once "./LogIn/sql.php";
    $sql = new SQL();
    $table = '';
    if(isset($_GET['col']) && isset($_GET['inf'])){
        
        if($_GET['inf'] != ''){
            $query = "SELECT MaGV, TenGV, TenBoMon from giaovien inner join bomon on giaovien.MaBoMon = bomon.MaBoMon where ".$_GET['col']." like '%".$_GET['inf']."%'";
            $data = $sql->getdata($query);
            if($data->num_rows>0){
                $i = 1;
                while($row = $data->fetch_assoc()){
                    if($i%2 != 0){
                        $table .= "
                            <tr class=\"class noidungbang \">
                                <td align=\"center\" width=\"15%\">".$row['MaGV']."</td>
                                <td align=\"center\" width=\"35%\">".$row['TenGV']."</td>
                                <td align=\"center\" width=\"35%\">".$row['TenBoMon']."</td>
                                <td align=\"center\" width=\"15%\"><input type=\"radio\" name=\"MaGV\" class=\"add_magv_lophoc\" value=\"".$row['MaGV']."\"></td>
                            </tr>
                        ";
                    }
                    else{
                        $table .= "
                            <tr class=\"class noidungbang\">
                                <td align=\"center\" width=\"15%\">".$row['MaGV']."</td>
                                <td align=\"center\" width=\"35%\">".$row['TenGV']."</td>
                                <td align=\"center\" width=\"35%\">".$row['TenBoMon']."</td>
                                <td align=\"center\" width=\"15%\"><input type=\"radio\" name=\"MaGV\" class=\"add_magv_lophoc\" value=\"".$row['MaGV']."\"></td>
                            </tr>
                        ";
                    }
                    $i++;
                }
            }
            
        }
        else{
            $query = "SELECT MaGV, TenGV, TenBoMon from giaovien inner join bomon on giaovien.MaBoMon = bomon.MaBoMon ";
            $data_monhoc_bang = $sql->getdata($query);
            $i=1;
            
            while($row = $data_monhoc_bang->fetch_assoc()){
                if($i%2 != 0){
                    $table .= "
                        <tr class=\"class noidungbang \">
                            <td align=\"center\" width=\"15%\">".$row['MaGV']."</td>
                            <td align=\"center\" width=\"35%\">".$row['TenGV']."</td>
                            <td align=\"center\" width=\"35%\">".$row['TenBoMon']."</td>
                            <td align=\"center\" width=\"15%\"><input type=\"radio\" name=\"MaGV\" class=\"add_magv_lophoc\" value=\"".$row['MaGV']."\"></td>
                        </tr>
                    ";
                }
                else{
                    $table .= "
                        <tr class=\"class noidungbang\">
                            <td align=\"center\" width=\"15%\">".$row['MaGV']."</td>
                            <td align=\"center\" width=\"35%\">".$row['TenGV']."</td>
                            <td align=\"center\" width=\"35%\">".$row['TenBoMon']."</td>
                            <td align=\"center\" width=\"15%\"><input type=\"radio\" name=\"MaGV\" class=\"add_magv_lophoc\" value=\"".$row['MaGV']."\"></td>
                        </tr>
                    ";
                }
                $i++;
            }
        }
    }

    echo $table;
?>