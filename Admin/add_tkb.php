
<?php
    require_once "./LogIn/sql.php";
    require_once "./infor_general.php";
    $sql = new SQL();
    $bang ='';
    if(isset($_GET['NamHoc']) && isset($_GET['HocKy']) && isset($_GET['Tuan']) && isset($_GET['MaLop']) && isset($_GET['Tiet']) && isset($_GET['Thu']) && isset($_GET['MaMon'])){
        $today = strtotime(date('Y/m/d'));
        $kthk2 = $sql->getdata("SELECT * from namhoc_hocky where NamHoc = '".$_GET['NamHoc']."' and HocKy = '2'")->fetch_assoc()['NgayKT'];

        if($today > strtotime($kthk2)){
            echo "<h2 style=\"color: red;\">Năm học đã kết thúc không thể thêm</h2>";
            die();
        }
        else{
            if($_GET['Tuan'] <= $tuan_hientai){
                echo "<h2 style=\"color: red;\">Các tuần đã, đang học không thể thêm</h2>";
                die();
            }
            else{
                $query = "INSERT INTO `tkb`(`NamHoc`, `HocKy`, `Tuan`, `Thu`, `Tiet`, `MaLop`, `MaMon`) VALUES ('".$_GET['NamHoc']."','".$_GET['HocKy']."','".$_GET['Tuan']."','".$_GET['Thu']."','".$_GET['Tiet']."','".$_GET['MaLop']."','".$_GET['MaMon']."') ";
                if($sql->exe($query)){
                    $bang = "<h2 style=\"color: rgb(1, 233, 1);\">Thêm thành công</h2>";
                }
                else
                    $bang = "<h2 style=\"color: red;\">Thêm thất bại</h2>";  
            }
        }


        
    }   
    echo $bang;
?>