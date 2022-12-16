<?php
    require_once "./LogIn/sql.php";
    $thongbao = "<h2 style=\"color: red;\">Sửa thất bại</h2>";
    if(isset($_GET['MaMonCu']) && isset($_GET['MaMon']) && isset($_GET['TenMon']) && isset($_GET['Khoi'])){
        $sql = new SQL();
        $data = $sql->getdata("SELECT * from monhoc where MaMon = '".$_GET['MaMonCu']."'");
        $mamon = '';
        $tenmon = '';
        $khoi = '';

        while($row = $data->fetch_assoc()){
            $mamon = $row['MaMon'];
            $tenmon = $row['TenMon'];
            $khoi = $row['Khoi'];
        }
        
        function setdata(&$a,$b){
            if($b != '')
                $a = $b;
        }

        setdata($mamon,$_GET['MaMon']);
        setdata($tenmon,$_GET['TenMon']);
        setdata($khoi,$_GET['Khoi']);

        $query = "UPDATE `monhoc` SET `MaMon`='".$mamon."',`TenMon`='".$tenmon."',`Khoi`='".$khoi."' WHERE MaMon = '".$_GET['MaMonCu']."'";
        
        if($sql->exe($query)){
            $thongbao = "<h2 style=\"color: rgb(1, 233, 1);\">Sửa thành công</h2>";
        }        
    }
    echo $thongbao;
?>