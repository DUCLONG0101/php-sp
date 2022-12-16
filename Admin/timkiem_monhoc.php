<?php
    require_once "./LogIn/sql.php";
    $sql = new SQL();
    $table = '';
    if(isset($_GET['col']) && isset($_GET['inf'])){
        
        if($_GET['inf'] != ''){
            $query = "SELECT * from monhoc inner join bomon on monhoc.MaBoMon = bomon.MaBoMon where ".$_GET['col']." like '%".$_GET['inf']."%'";
            $data = $sql->getdata($query);
            if($data->num_rows>0){
                $i = 1;
                while($row = $data->fetch_assoc()){
                    if($i%2 != 0){
                        $table .= "
                            <tr class=\"class noidungbang class_bold\" onclick=\"todam_hang(this)\">
                                <td align=\"center\" width=\"8%\" >".$i."</td>
                                <td align=\"center\" width=\"15%\">".$row['MaMon']."</td>
                                <td align=\"center\" width=\"30%\">".$row['TenMon']."</td>
                                <td align=\"center\" width=\"15%\">".$row['Khoi']."</td> 
                                <td align=\"center\" width=\"30%\">".$row['TenBoMon']."</td> 
                            </tr>
                        ";
                    }
                    else{
                        $table .= "
                            <tr class=\"class noidungbang\" onclick=\"todam_hang(this)\">
                                <td align=\"center\" width=\"8%\" >".$i."</td>
                                <td align=\"center\" width=\"15%\">".$row['MaMon']."</td>
                                <td align=\"center\" width=\"30%\">".$row['TenMon']."</td>
                                <td align=\"center\" width=\"15%\">".$row['Khoi']."</td> 
                                <td align=\"center\" width=\"30%\">".$row['TenBoMon']."</td> 
                            </tr>
                        ";
                    }
                    $i++;
                }
            }
            
        }
        else{
            $query = "SELECT * from monhoc inner join bomon on monhoc.MaBoMon = bomon.MaBoMon";
            $data_monhoc_bang = $sql->getdata($query);
            $i=1;
            
            while($row = $data_monhoc_bang->fetch_assoc()){
                if($i%2 != 0){
                    $table .= "
                        <tr class=\"class noidungbang class_bold\" onclick=\"todam_hang(this)\">
                            <td align=\"center\" width=\"8%\" >".$i."</td>
                            <td align=\"center\" width=\"15%\">".$row['MaMon']."</td>
                            <td align=\"center\" width=\"30%\">".$row['TenMon']."</td>
                            <td align=\"center\" width=\"15%\">".$row['Khoi']."</td> 
                            <td align=\"center\" width=\"30%\">".$row['TenBoMon']."</td> 
                        </tr>
                    ";
                }
                else{
                    $table .= "
                        <tr class=\"class noidungbang\" onclick=\"todam_hang(this)\">
                            <td align=\"center\" width=\"8%\" >".$i."</td>
                            <td align=\"center\" width=\"15%\">".$row['MaMon']."</td>
                            <td align=\"center\" width=\"30%\">".$row['TenMon']."</td>
                            <td align=\"center\" width=\"15%\">".$row['Khoi']."</td> 
                            <td align=\"center\" width=\"30%\">".$row['TenBoMon']."</td> 
                        </tr>
                    ";
                }
                $i++;
            }
        }
    }

    echo $table;
?>