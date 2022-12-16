<?php
    require_once "./LogIn/sql.php";
    require_once "./infor_general.php";
    $sql = new SQL();
    $bang = '';
    if(isset($_GET['MaHS']) ){
        $query = "SELECT * from hocsinh where MaHS = '".$_GET['MaHS']."'";
        $data = $sql->getdata($query);
        $common = $data->fetch_assoc();
        $bang .="
            <div class=\"box_content box_content1\">
            <div class=\"add_ma\">
                <label >Mã HS: </label>
                <h4>".$_GET['MaHS']."</h4>
            </div>
            <div class=\"add_ma\">
                <label >Họ tên: </label>
                <h4>".$common['TenHS']."</h4>
            </div>
            <div class=\"add_ma\">
                <label >Ngày sinh: </label>
                <h4>".$common['NgaySinh']."</h4>
            </div>
            <div class=\"add_ma\">
                <label >Giới tính: </label>
                <h4>".$common['GioiTinh']."</h4>
            </div>
            <div class=\"add_ma\">
                <label >Địa chỉ</label>
                <h4>".$common['DiaChi']."</h4>
            </div>
            <div class=\"add_ma\">
                <label >Phụ huynh:</label>
                <h4>".$common['PhuHuynh']."</h4>
            </div>
            <div class=\"add_ma\">
                <label >SDT PH:</label>
                <h4>".$common['SoDTPhuHuynh']."</h4>
            </div>
            <div class=\"add_ma\">
                <label >SDT PH:</label>
                <h4>".$common['TinhTrang']."</h4>
            </div>
        
            
        </div>
        <div class=\"thongtingiaovien infor_detail_table\">
            <div class=\"giaovienchunhiem\">
                <label for=\"\">Bảng điểm</label>
                
            </div>
            <table >
                <thead>
                    <tr>
                        <th width=\"8%\">Tên lớp</td>
                        <th width=\"8%\">Môn học</th>
                        <th>Điểm 15P HK1</th>
                        <th>Điểm 1T HK1</th>
                        <th>Điểm GK HK1</th>
                        <th>Điểm CK HK1</th>
                        <th>Điểm TK HK1</th>
                        <th>Điểm 15P HK2</th>
                        <th>Điểm 1T HK2</th>
                        <th>Điểm GK HK2</th>
                        <th>Điểm CK HK2</th>
                        <th>Điểm TK HK2</th>
                        <th>Điểm TB Môn</th>

                    </tr>
                </thead>
                <tbody id=\"infor_gvcn_table_add\" height=\"500px\">
            ";
        $data = $sql->getdata("SELECT * from diem inner join monhoc on diem.MaMon = monhoc.MaMon inner join lophoc on lophoc.MaLop = diem.MaLop where MaHS = '".$_GET['MaHS']."' order by TenLop");
        while($row = $data->fetch_assoc()){
            $diem151 = $row['Diem15PhutHK1'] > -1 ? $row['Diem15PhutHK1'] : '';
            $diem1t1 = $row['Diem1TietHK1'] > -1 ? $row['Diem1TietHK1'] : '';
            $diemgk1 = $row['DiemGiuaKyHK1'] > -1 ? $row['DiemGiuaKyHK1'] : '';
            $diemck1 = $row['DiemCuoiKyHK1'] > -1 ? $row['DiemCuoiKyHK1'] : '';
            $diemtb1 = $row['DiemTbHK1'] > -1 ? $row['DiemTbHK1'] : '';
            $diem152 = $row['Diem15PhutHK2'] > -1 ? $row['Diem15PhutHK2'] : '';
            $diem1t2 = $row['Diem1TietHK2'] > -1 ? $row['Diem1TietHK2'] : '';
            $diemgk2 = $row['DiemGiuaKyHK2'] > -1 ? $row['DiemGiuaKyHK2'] : '';
            $diemck2 = $row['DiemCuoiKyHK2'] > -1 ? $row['DiemCuoiKyHK2'] : '';
            $diemtb2 = $row['DiemTbHK2'] > -1 ? $row['DiemTbHK2'] : '';
            $diemtb = $row['DiemTbMon'] > -1 ? $row['DiemTbMon'] : '';
            $bang .= "
            <tr>
                <td width=\"8%\">".$row['TenLop']."1</td>
                <td width=\"8%\">".$row['TenMon']."</td>
                <td>".$diem151."</td>
                <td>".$diem1t1."</td>
                <td>".$diemgk1."</td>
                <td>".$diemck1."</td>                    
                <td>".$diemtb1."</td>
                <td>".$diem152."</td>
                <td>".$diem1t2."</td>
                <td>".$diemgk2."</td>
                <td>".$diemck2."</td>                    
                <td>".$diemtb2."</td>
                <td>".$diemtb."</td>
            </tr>
            ";  
        }
        $bang .="</tbody>
                        </table>
                    </div>
                    
                    ";
        echo $bang;
    }

?>