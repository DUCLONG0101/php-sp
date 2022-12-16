<?php
    require_once "./LogIn/sql.php";
    require_once "./infor_general.php";
    $sql = new SQL();
    $table = '';
    if(isset($_GET['col']) && isset($_GET['inf'])){
        // $query = "SELECT * from dayhoc inner join lophoc on lophoc.MaLop = dayhoc.MaLop inner join monhoc on dayhoc.MaMon = monhoc.MaMon inner join giaovien on giaovien.MaGV = dayhoc.MaGV";
        // $data_bang = $sql->getdata($query);
        // $i=1;
        // while($row = $data_bang->fetch_assoc()){
        //     echo "
        //         <tr class=\"class noidungbang\">
        //             <td align=\"center\" width=\"5%\" >".$i."</td>
        //             <td align=\"center\" width=\"10%\">".$row['TenMon']."</td>
        //             <td align=\"center\" width=\"10%\">".$row['TenLop']."</td>
        //             <td align=\"center\" width=\"18%\">".$row['TenGV']."</td>
        //             <td align=\"center\" width=\"10%\">".$row['NamHoc']."</td>                                        
        //         </tr>
        //     ";
        //     $i++;
        // }
        
        if($_GET['inf'] != ''){
            $query = "SELECT * from dayhoc inner join lophoc on lophoc.MaLop = dayhoc.MaLop inner join monhoc on dayhoc.MaMon = monhoc.MaMon inner join giaovien on giaovien.MaGV = dayhoc.MaGV where ".$_GET['col']." like '%".$_GET['inf']."%' order by NamHoc,TenLop desc";
            $data = $sql->getdata($query);
            if($data->num_rows>0){
                $i = 1;
                while($row = $data->fetch_assoc()){
                    if($i%2 != 0){
                        $table .= "
                            <tr class=\"class noidungbang  class_bold\" onclick=\"todam_hang(this)\">
                                <td align=\"center\" width=\"5%\" >".$i."</td>
                                <td align=\"center\" width=\"10%\">".$row['TenLop']."</td>
                                <td align=\"center\" width=\"10%\">".$row['TenMon']."</td>
                                <td align=\"center\" width=\"18%\">".$row['TenGV']."</td>
                                <td align=\"center\" width=\"10%\">".$row['NamHoc']."</td>                                        
                            </tr>
                        ";
                    }
                    else{
                        $table .= "
                            <tr class=\"class noidungbang\" onclick=\"todam_hang(this)\">
                                <td align=\"center\" width=\"5%\" >".$i."</td>
                                <td align=\"center\" width=\"10%\">".$row['TenLop']."</td>
                                <td align=\"center\" width=\"10%\">".$row['TenMon']."</td>
                                <td align=\"center\" width=\"18%\">".$row['TenGV']."</td>
                                <td align=\"center\" width=\"10%\">".$row['NamHoc']."</td>                                        
                            </tr>
                        ";
                    }
                    $i++;
                }
            }
            
        }
        else{
            $query = "SELECT * from dayhoc inner join lophoc on lophoc.MaLop = dayhoc.MaLop inner join monhoc on dayhoc.MaMon = monhoc.MaMon inner join giaovien on giaovien.MaGV = dayhoc.MaGV order by NamHoc,TenLop desc";
            $data = $sql->getdata($query);
            if($data->num_rows>0){
                $i = 1;
                while($row = $data->fetch_assoc()){
                    if($i%2 != 0){
                        $table .= "
                            <tr class=\"class noidungbang  class_bold\" onclick=\"todam_hang(this)\">
                                <td align=\"center\" width=\"5%\" >".$i."</td>
                                <td align=\"center\" width=\"10%\">".$row['TenLop']."</td>
                                <td align=\"center\" width=\"10%\">".$row['TenMon']."</td>
                                <td align=\"center\" width=\"18%\">".$row['TenGV']."</td>
                                <td align=\"center\" width=\"10%\">".$row['NamHoc']."</td>                                        
                            </tr>
                        ";
                    }
                    else{
                        $table .= "
                            <tr class=\"class noidungbang\" onclick=\"todam_hang(this)\">
                                <td align=\"center\" width=\"5%\" >".$i."</td>
                                <td align=\"center\" width=\"10%\">".$row['TenLop']."</td>
                                <td align=\"center\" width=\"10%\">".$row['TenMon']."</td>
                                <td align=\"center\" width=\"18%\">".$row['TenGV']."</td>
                                <td align=\"center\" width=\"10%\">".$row['NamHoc']."</td>                                        
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