<?php
    require_once "./LogIn/sql.php";
    $thongbao = "";
    if(isset($_GET['NamHoc']) && isset($_GET['HocKy']) && isset($_GET['Tuan']) && isset($_GET['MaLop'])){
        $sql = new SQL();
        for($i=1;$i<=10;$i++){
            $hang =  "<tr height=\"9%\"><th width=\"5%\" class=\"".$i."\">$i</th>";

            for($j=2;$j<=7;$j++){
                $query_tkb_hocsinh = "SELECT * from tkb inner join dayhoc on tkb.MaLop = dayhoc.MaLop and tkb.MaMon = dayhoc.MaMon inner join giaovien on giaovien.MaGV = dayhoc.MaGV inner join monhoc on dayhoc.MaMon = monhoc.MaMon where NamHoc = '".$_GET['NamHoc']."' and HocKy = '".$_GET['HocKy']."' and Tuan = '".$_GET['Tuan']."' and tkb.MaLop = '".$_GET['MaLop']."' and Tiet = '$i' and Thu = '$j'";
                $data_tkb_hocsinh = $sql->getdata($query_tkb_hocsinh);
                if($data_tkb_hocsinh->num_rows>0){
                    while($row = $data_tkb_hocsinh->fetch_assoc()){
                        $hang.= "<td id=\"".$j."_".$i."\" align=\"center\" width=\"11.875%\" onclick=\"todam_tkb(this)\">".$row['TenMon']."<br><span>".$row['TenGV']."</span></td>";
                    }
                }
                else
                    $hang.= "<td id=\"".$j."_".$i."\" align=\"center\" width=\"11.875%\" onclick=\"todam_tkb(this)\"></td>";
            }
            $hang .= "</tr>";
            echo $hang;
            
        }
    }
?>