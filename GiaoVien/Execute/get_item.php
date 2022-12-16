<?php
require_once "../LogIn/sql.php";
    class Exe{        
        var $sql;

        function __construct()
        {
            $this->sql = new SQL('quanlyhocsinh5');
        }

        // Lấy ra 1 thành phần trong bảng trả về 1 hàng duy nhất
        function get_item($bang,$item,$user,$pass,$id)
        {
            $data = $this->sql->getdata("select * from ".$bang." where ".$id." = '$user' and Pass = '$pass'");
            return $data->fetch_assoc()[$item];
        }

        // Đếm số phần tử trong bảng
        function get_item_count($bang)
        {
            $data = $this->sql->getdata("select count(*) as 'dem' from ".$bang."");
            return $data->fetch_assoc()['dem'];
        }

        //Đếm số phần tử trong bảng có điều kiện Like
        function get_item_countLike($bang,$tencot,$dieukiemlike)
        {
            $data = $this->sql->getdata("select count(*) as 'dem' from ".$bang." where ".$tencot." like '".$dieukiemlike."'");
            return $data->fetch_assoc()['dem'];
        }
		
		//Đếm số học sinh mà giáo vien x quản lí
        function count_hs_cua_giaovien($MaGV)
        {
            $data = $this->sql->getdata("select count(*) as 'dem' from giaovien, dayhoc, lophoc_hocsinh where giaovien.MaGV=dayhoc.MaGV 
            and lophoc_hocsinh.MaLop= dayhoc.MaLop and giaovien.MaGV ='".$MaGV."' ");
            return $data->fetch_assoc()['dem'];
        }
		
		
    }
?>