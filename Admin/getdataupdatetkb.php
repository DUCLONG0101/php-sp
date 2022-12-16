<?php
    require_once "./LogIn/sql.php";
    $sql = new SQL();
    $bang ='';
    if(isset($_GET['NamHoc']) && isset($_GET['HocKy']) && isset($_GET['Tuan']) && isset($_GET['MaLop']) && isset($_GET['Tiet']) && isset($_GET['Thu'])){
        
        $query = "SELECT * from dayhoc inner join giaovien on dayhoc.MaGV = giaovien.MaGV inner join monhoc on monhoc.MaMon = dayhoc.MaMon where MaLop = '".$_GET['MaLop']."'";
        $data = $sql->getdata($query);
        while($row = $data->fetch_assoc()){
            $query1 = "SELECT MaGV from tkb inner join dayhoc on tkb.MaMon = dayhoc.MaMon and tkb.MaLop = dayhoc.MaLop where NamHoc = '".$_GET['NamHoc']."' and HocKy = '".$_GET['HocKy']."' and Tuan = '".$_GET['Tuan']."' and Tiet = '".$_GET['Tiet']."' and Thu = '".$_GET['Thu']."' and MaGV = '".$row['MaGV']."'";
            $data1 = $sql->getdata($query1);
            if($data1->num_rows == 0){
                $bang.="<option value=\"".$row['MaMon']."_".$row['MaGV']."\">".$row['TenMon']."_".$row['TenGV']."</option>";
            }
        }
    }
    echo $bang;
?>