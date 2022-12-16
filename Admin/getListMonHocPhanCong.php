<?php
    require_once "./LogIn/sql.php";
    require_once "./infor_general.php";
    $sql = new SQL();

    if(isset($_GET['MaLop'])){
        $khoi = $sql->getdata("SELECT Khoi from lophoc where MaLop = '".$_GET['MaLop']."'")->fetch_assoc()['Khoi'];
        $query_namhoc = "SELECT * from monhoc where Khoi = '".$khoi."' and MaMon not in (SELECT MaMon from dayhoc where MaLop = '".$_GET['MaLop']."')";
        $data_namhoc = $sql->getdata($query_namhoc);
        while($row = $data_namhoc->fetch_assoc()){
            echo "<option value=\"".$row['MaMon']."\">".$row['TenMon']."</option>";
        }
    }

?>