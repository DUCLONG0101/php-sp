<?php
    require_once "./LogIn/sql.php";
    require_once "./infor_general.php";

    $sql = new SQL();
    if(isset($_GET['TenMon']) && isset($_GET['TenLop']) && isset($_GET['NamHoc'])){
        $query  = "SELECT dayhoc.MaGV, monhoc.MaBoMon from dayhoc inner join lophoc on dayhoc.MaLop = lophoc.MaLop inner join monhoc on monhoc.MaMon = dayhoc.MaMon where TenMon = '".$_GET['TenMon']."' and TenLop = '".$_GET['TenLop']."' and NamHoc = '".$_GET['NamHoc']."'";
        $data = $sql->getdata($query);
        $a = $data->fetch_assoc();
        $bomon = $a['MaBoMon'];
        $magv = $a['MaGV'];
        $table = "";
        $query_giaovien = "SELECT MaGV, TenGV, TenBoMon from giaovien inner join bomon on giaovien.MaBoMon = bomon.MaBoMon where giaovien.MaBoMon = '".$bomon."'";
        $data_giaovien = $sql->getdata($query_giaovien);
        while($row = $data_giaovien->fetch_assoc()){
            if($magv != $row['MaGV'])
                $table .= "
                    <tr>
                        <td width=\"15%\">".$row['MaGV']."</td>
                        <td width=\"35%\">".$row['TenGV']."</td>
                        <td width=\"35%\">".$row['TenBoMon']."</td>
                        <td width=\"15%\"><input type=\"radio\" name=\"MaGV\" class=\"add_magv_lophoc\" value=\"".$row['MaGV']."\"></td>
                    </tr>
                ";
        }
        echo $table;
    }
?>