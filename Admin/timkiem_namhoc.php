<?php
    require_once "./LogIn/sql.php";
    $sql = new SQL();
    $table = '';
    if(isset($_GET['col']) && isset($_GET['inf'])){
        
        if($_GET['inf'] != ''){
            $query = "SELECT * from namhoc_hocky inner join NamHoc on namhoc.NamHoc = namhoc_hocky.NamHoc where namhoc_hocky.NamHoc like '%".$_GET['inf']."%'";
            $data_lophoc_bang = $sql->getdata($query);
            $i=1;
            $namhoc_namhoc = $sql->getdata($query)->fetch_assoc()['NamHoc'];
            $chuoi_namhoc = "";
            while($row = $data_lophoc_bang->fetch_assoc()){
                if($i%2!=0){
                    if($namhoc_namhoc == $row['NamHoc']){
                        if($row['HocKy'] == '1'){
                            $chuoi_namhoc = "
                            <tr class=\"class noidungbang class_bold \"  onclick=\"todam_hang(this)\">
                                <td align=\"center\" width=\"5%\" >".$i."</td>
                                <td align=\"center\" width=\"12%\">".$row['NamHoc']."</td>
                                <td align=\"center\" width=\"15%\">".$row['NgayBD']."</td>
                                <td align=\"center\" width=\"15%\">".$row['NgayKT']."</td>
                            ";
                            // echo $chuoi_namhoc;
                        }
                        if($row['HocKy'] == '2'){
                            $chuoi_namhoc .= "
                                <td align=\"center\" width=\"15%\">".$row['NgayBD']."</td>
                                <td align=\"center\" width=\"15%\">".$row['NgayKT']."</td>
                                </tr>
                            ";
                            echo $chuoi_namhoc;
                            $i++;
                        }
                    }
                    else{
                        $namhoc_namhoc = $row['NamHoc'];
                        if($row['HocKy'] == '1'){
                            $chuoi_namhoc = "
                            <tr class=\"class noidungbang \"  onclick=\"todam_hang(this)\">
                                <td align=\"center\" width=\"5%\" >".$i."</td>
                                <td align=\"center\" width=\"12%\">".$row['NamHoc']."</td>
                                <td align=\"center\" width=\"15%\">".$row['NgayBD']."</td>
                                <td align=\"center\" width=\"15%\">".$row['NgayKT']."</td>
                            ";
                            // echo $chuoi_namhoc;
                        }
                    }
                }
                else{
                    if($namhoc_namhoc == $row['NamHoc']){
                        if($row['HocKy'] == '1'){
                            $chuoi_namhoc = "
                            <tr class=\"class noidungbang\"  onclick=\"todam_hang(this)\">
                                <td align=\"center\" width=\"5%\" >".$i."</td>
                                <td align=\"center\" width=\"12%\">".$row['NamHoc']."</td>
                                <td align=\"center\" width=\"15%\">".$row['NgayBD']."</td>
                                <td align=\"center\" width=\"15%\">".$row['NgayKT']."</td>
                            ";
                            // echo $chuoi_namhoc;
                        }
                        if($row['HocKy'] == '2'){
                            $chuoi_namhoc .= "
                                <td align=\"center\" width=\"15%\">".$row['NgayBD']."</td>
                                <td align=\"center\" width=\"15%\">".$row['NgayKT']."</td>
                                </tr>
                            ";
                            echo $chuoi_namhoc;
                            $i++;
                        }
                    }
                    else{
                        $namhoc_namhoc = $row['NamHoc'];
                        if($row['HocKy'] == '1'){
                            $chuoi_namhoc = "
                            <tr class=\"class noidungbang\" onclick=\"todam_hang(this)\">
                                <td align=\"center\" width=\"5%\" >".$i."</td>
                                <td align=\"center\" width=\"12%\">".$row['NamHoc']."</td>
                                <td align=\"center\" width=\"15%\">".$row['NgayBD']."</td>
                                <td align=\"center\" width=\"15%\">".$row['NgayKT']."</td>
                            ";
                            // echo $chuoi_namhoc;
                        }
                    }
                }
                
            }

        }
        else{
            $query = "SELECT * from namhoc_hocky inner join NamHoc on namhoc.NamHoc = namhoc_hocky.NamHoc";
            $data_lophoc_bang = $sql->getdata($query);
            $i=1;
            $namhoc_namhoc = $sql->getdata($query)->fetch_assoc()['NamHoc'];
            $chuoi_namhoc = "";
            while($row = $data_lophoc_bang->fetch_assoc()){
                if($i%2!=0){
                    if($namhoc_namhoc == $row['NamHoc']){
                        if($row['HocKy'] == '1'){
                            $chuoi_namhoc = "
                            <tr class=\"class noidungbang class_bold\" onclick=\"todam_hang(this)\">
                                <td align=\"center\" width=\"5%\" >".$i."</td>
                                <td align=\"center\" width=\"12%\">".$row['NamHoc']."</td>
                                <td align=\"center\" width=\"15%\">".$row['NgayBD']."</td>
                                <td align=\"center\" width=\"15%\">".$row['NgayKT']."</td>
                            ";
                            // echo $chuoi_namhoc;
                        }
                        if($row['HocKy'] == '2'){
                            $chuoi_namhoc .= "
                                <td align=\"center\" width=\"15%\">".$row['NgayBD']."</td>
                                <td align=\"center\" width=\"15%\">".$row['NgayKT']."</td>
                                </tr>
                            ";
                            echo $chuoi_namhoc;
                            $i++;
                        }
                    }
                    else{
                        $namhoc_namhoc = $row['NamHoc'];
                        if($row['HocKy'] == '1'){
                            $chuoi_namhoc = "
                            <tr class=\"class noidungbang \" onclick=\"todam_hang(this)\">
                                <td align=\"center\" width=\"5%\" >".$i."</td>
                                <td align=\"center\" width=\"12%\">".$row['NamHoc']."</td>
                                <td align=\"center\" width=\"15%\">".$row['NgayBD']."</td>
                                <td align=\"center\" width=\"15%\">".$row['NgayKT']."</td>
                            ";
                            // echo $chuoi_namhoc;
                        }
                    }
                }
                else{
                    if($namhoc_namhoc == $row['NamHoc']){
                        if($row['HocKy'] == '1'){
                            $chuoi_namhoc = "
                            <tr class=\"class noidungbang class_bold\" onclick=\"todam_hang(this)\">
                                <td align=\"center\" width=\"5%\" >".$i."</td>
                                <td align=\"center\" width=\"12%\">".$row['NamHoc']."</td>
                                <td align=\"center\" width=\"15%\">".$row['NgayBD']."</td>
                                <td align=\"center\" width=\"15%\">".$row['NgayKT']."</td>
                            ";
                            // echo $chuoi_namhoc;
                        }
                        if($row['HocKy'] == '2'){
                            $chuoi_namhoc .= "
                                <td align=\"center\" width=\"15%\">".$row['NgayBD']."</td>
                                <td align=\"center\" width=\"15%\">".$row['NgayKT']."</td>
                                </tr>
                            ";
                            echo $chuoi_namhoc;
                            $i++;
                        }
                    }
                    else{
                        $namhoc_namhoc = $row['NamHoc'];
                        if($row['HocKy'] == '1'){
                            $chuoi_namhoc = "
                            <tr class=\"class noidungbang\" onclick=\"todam_hang(this)\">
                                <td align=\"center\" width=\"5%\" >".$i."</td>
                                <td align=\"center\" width=\"12%\">".$row['NamHoc']."</td>
                                <td align=\"center\" width=\"15%\">".$row['NgayBD']."</td>
                                <td align=\"center\" width=\"15%\">".$row['NgayKT']."</td>
                            ";
                            // echo $chuoi_namhoc;
                        }
                    }
                }
                
            }
        }
    }

    echo $table;
?>