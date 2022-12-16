<?php
    require_once "./LogIn/sql.php";
    $thongbao = "<h2 style=\"color: red;\">Sửa thất bại</h2>";
    if(isset($_GET['MaGVCu']) && isset($_GET['MaGV']) && isset($_GET['TenGV']) && isset($_GET['DienThoai']) && isset($_GET['DiaChi']) & isset($_GET['GhiChu'])){
        
        $sql = new SQL();
        $data = $sql->getdata("SELECT * from giaovien where MaGV = '".$_GET['MaGVCu']."'");
        $magv = '';
        $tengv = '';
        $dienthoai = '';
        $diachi = '';
        $ghichu = '';

        while($row = $data->fetch_assoc()){
            $magv = $row['MaGV'];
            $tengv = $row['TenGV'];
            $dienthoai = $row['DienThoai'];
            $diachi = $row['DiaChi'];
            $ghichu = $row['GhiChu'];
        }
        
        function setdata(&$a,$b){
            if($b != '')
                $a = $b;
        }
        setdata($magv, $_GET['MaGV']);
        setdata($tengv, $_GET['TenGV']);
        setdata($dienthoai, $_GET['DienThoai']);
        setdata($diachi, $_GET['DiaChi']);
        setdata($ghichu, $_GET['GhiChu']);

        $query = "UPDATE `giaovien` SET `MaGV`='".$magv."',`TenGV`='".$tengv."',`DienThoai`='".$dienthoai."',`DiaChi`='".$diachi."',`GhiChu`='".$ghichu."' WHERE MaGV = '".$_GET['MaGVCu']."'";
        
        if($sql->exe($query)){
            $thongbao = "<h2 style=\"color: rgb(1, 233, 1);\">Sửa thành công</h2>";
        }        
    }
    echo $thongbao;
?>