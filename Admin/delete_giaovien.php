<?php
    require_once "./LogIn/sql.php";
    $thongbao = "";
    if(isset($_GET['MaGV'])){
        $sql = new SQL();
        $mang = explode('_',$_GET['MaGV']);
        for($i=0;$i<count($mang);$i++){

            $query = "SELECT * from dayhoc where MaGV = '".$mang[$i]."'";
            $data = $sql->getdata($query);
            $query1 = "SELECT * from lophoc where MaGV = '".$mang[$i]."'";
            $data1 = $sql->getdata($query1);
            if($data->num_rows > 0 || $data1->num_rows > 0)
                $thongbao .= "<h3 style=\"color: red;\">Xóa thất bại giáo viên có mã gv là ".$mang[$i]."</h3> ";
            else {
                $query = "DELETE from giaovien where MaGV = '".$mang[$i]."'";
                if($sql->exe($query)){
                    $thongbao .= "<h3 style=\"color: rgb(1, 233, 1);\">Xóa thành công giáo viên có mã gv là ".$mang[$i]."</h3> ";
                }
                else
                    $thongbao .= "<h3 style=\"color: red;\">Xóa thất bại giáo viên có mã gv là ".$mang[$i]."</h3> ";  
            }          
        }
    }
    echo $thongbao."<p>Lưu ý: Giáo viên đã và đang giảng dạy sẽ không thể xóa</p>";
?>