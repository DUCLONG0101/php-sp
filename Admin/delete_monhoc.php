<?php
    require_once "./LogIn/sql.php";
    $thongbao = "";
    if(isset($_GET['MaMon'])){
        $sql = new SQL();
        $mang = explode('_',$_GET['MaMon']);
        for($i=0;$i<count($mang);$i++){

            $query = "SELECT * from dayhoc where MaMon = '".$mang[$i]."'";
            $data = $sql->getdata($query);
            if($data->num_rows > 0)
                $thongbao .= "<h3 style=\"color: red;\">Xóa thất bại môn học có mã môn học là ".$mang[$i]."</h3>";
            else {
                $query = "DELETE from monhoc where MaMon = '".$mang[$i]."'";
                if($sql->exe($query)){
                    $thongbao .= "<h3 style=\"color: rgb(1, 233, 1);\">Xóa thành công môn học có mã môn học là ".$mang[$i]."</h3>";
                }
                else
                    $thongbao .= "<h3 style=\"color: red;\">Xóa thất bại môn học có mã môn học là ".$mang[$i]."</h3>";  
            }          
        }
    }
    echo $thongbao;
?>