<?php
    require_once "./LogIn/sql.php";
    $thongbao = "";
    if(isset($_GET['MaLop'])){
        $sql = new SQL();
        $mang = explode('_',$_GET['MaLop']);
        for($i=0;$i<count($mang);$i++){
            $query1 = "SELECT SiSo from lophoc where MaLop = '".$mang[$i]."'";
            $check = $sql->getdata($query1)->fetch_assoc()['SiSo'];
            if($check == 0){
                $query = "DELETE from lophoc where MaLop = '".$mang[$i]."'";

                if($sql->exe($query)){
                    $thongbao .= "<h3 style=\"color: rgb(1, 233, 1);\">Xóa thành công lớp có mã lớp là ".$mang[$i]."</h3>";
                }
                else
                    $thongbao .= "<h3 style=\"color: red;\">Xóa thất bại lớp có mã lớp là ".$mang[$i]."</h3>";
            }
            else
                    $thongbao .= "<h3 style=\"color: red;\">Xóa thất bại lớp có mã lớp là ".$mang[$i]."</h3>";            
        }
    }
    echo $thongbao;
?>

