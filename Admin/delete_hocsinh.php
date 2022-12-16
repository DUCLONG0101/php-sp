<?php
    require_once "./LogIn/sql.php";
    $thongbao = "";
    if(isset($_GET['MaHS'])){
        $sql = new SQL();
        $mang = explode('_',$_GET['MaHS']);
        for($i=0;$i<count($mang);$i++){
            $query_lophoc_hocsinh = "SELECT * From lophoc_hocsinh where MaHS = '".$mang[$i]."'";
            if($sql->getdata($query_lophoc_hocsinh)->num_rows == 0){
                $query = "DELETE from hocsinh where MaHS = '".$mang[$i]."'";
                if($sql->exe($query)){
                    $thongbao .= "<h3 style=\"color: rgb(1, 233, 1);\">Xóa thành công học sinh có mã lớp là ".$mang[$i]."</h3>";
                }
                else
                    $thongbao .= "<h3 style=\"color: red;\">Xóa thất bại học sinh có mã lớp là ".$mang[$i]."</h3>";
            }
            else{
                $thongbao .= "<h3 style=\"color: red;\">Xóa thất bại học sinh có mã lớp là ".$mang[$i]."</h3>";   
            }
                        
        }
    }
    echo $thongbao."<p>Lưu ý: Học sinh đã, đang tham gia học sẽ không thể xóa</p>";
?>