<?php
    require_once "./LogIn/sql.php";
    $thongbao = "<h2 style=\"color: red;\">Sửa thất bại</h2>";
    if(isset($_GET['Diem15']) && isset($_GET['Diem1Tiet']) && isset($_GET['DiemGK']) && isset($_GET['DiemCK']) ){
        
        $sql = new SQL();
        $data = $sql->getdata("SELECT * from hesotinhdiem");
        $diem15 = '';
        $diem1tiet = '';
        $diemgk = '';
        $diemck = '';

        while($row = $data->fetch_assoc()){
            $diem15 = $row['Diem15'];
            $diem1tiet = $row['Diem1Tiet'];
            $diemgk = $row['DiemGK'];
            $diemck = $row['DiemCK'];
        }
        
        function setdata(&$a,$b){
            if($b != '')
                $a = $b;
        }
        setdata($diem15, $_GET['Diem15']);
        setdata($diem1tiet, $_GET['Diem1Tiet']);
        setdata($diemgk, $_GET['DiemGK']);
        setdata($diemck, $_GET['DiemCK']);

        $query = "UPDATE `hesotinhdiem` SET `Diem15`='".$diem15."',`Diem1Tiet`='".$diem1tiet."',`DiemGk`='".$diemgk."',`DiemCK`='".$diemck."' where 1";
        
        if($sql->exe($query)){
            $thongbao = "<h2 style=\"color: rgb(1, 233, 1);\">Sửa thành công</h2>";
        } 
    }
    echo $thongbao;
?>