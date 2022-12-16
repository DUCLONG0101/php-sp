<?php
    session_start();
    require_once "./LogIn/sql.php";
    require_once "./infor_general.php";
    $thongbao = "<h2 style=\"color: red;\">Sửa thất bại</h2>";
    if(isset($_GET['TenHS']) && isset($_GET['NgaySinh']) & isset($_GET['GioiTinh']) && isset($_GET['DiaChi']) && isset($_GET['PhuHuynh']) && isset($_GET['SDT'])){
        $sql = new SQL();
        $data = $sql->getdata("SELECT * from hocsinh where MaHS = '".$_SESSION['userhs']."'");

        $mahs = '';
        $tenhs = '';
        $malop = '';
        $malopmoi = '';
        $ngaysinh = '';
        $gioitinh = '';
        $diachi = '';
        $phuhuynh = '';
        $sdt = '';
        $tinhtrang = '';

        while($row = $data->fetch_assoc()){
            $tenhs = $row['TenHS'];
            $ngaysinh = $row['NgaySinh'];
            $gioitinh = $row['GioiTinh'];
            $diachi = $row['DiaChi'];
            $phuhuynh = $row['PhuHuynh'];
            $sdt = $row['SoDTPhuHuynh'];
        }

        
        
        function setdata(&$a,$b){
            if($b != '')
                $a = $b;
        }
        setdata($tenhs, $_GET['TenHS']);
        setdata($ngaysinh, $_GET['NgaySinh']);
        setdata($gioitinh, $_GET['GioiTinh']);
        setdata($diachi, $_GET['DiaChi']);
        setdata($phuhuynh, $_GET['PhuHuynh']);
        setdata($sdt, $_GET['SDT']);

        $query = "UPDATE `hocsinh` SET`TenHS`='".$tenhs."',`NgaySinh`='".$ngaysinh."',`GioiTinh`='".$gioitinh."',`DiaChi`='".$diachi."',`PhuHuynh`='".$phuhuynh."',`SoDTPhuHuynh`='".$sdt."' WHERE MaHS = '".$_SESSION['userhs']."'";
        
        if($sql->exe($query)){
            $thongbao = "<h2 id=\"thongbao_update\" style=\"color: rgb(1, 233, 1);\">Sửa thành công</h2>";
        }        
        else
            echo 1;
    }
    echo $thongbao;
?>