<?php
    session_start();
    require_once "./LogIn/checkloginadmin.php";
    require_once "./LogIn/sql.php";
    require_once "./infor_general.php";
    $sql = new SQL();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <link rel="stylesheet" href="./Css/style.css">
    <title>Document</title>
    <script>


    </script>
</head>
<body>
    <div class="hidden" id="thongbao_chucnang" style="z-index: 1000;">
        <div class="bk_mo ">
            <div class="box_fun">
                <span class="close"><i class="fas fa-times"></i></span>
                <div id="thongbao_chucnang_1">
                    
                </div>
            </div>
        </div>
    </div>
    <div class="hidden" id="update">
        <div class="bk_mo ">
            <div class="box_fun">
                <span class="close" ><i id="close_update" class="fas fa-times"></i></span>
                <h2>Sửa thông tin cá nhân</h2>
                <form class="" action="" method="post">
                    <div class="box_content">
                        
                        <div class="add_pass">
                            <label for="TenLop">Họ tên</label>
                            <input type="text" name="tenlopadd" id="TenHS_update">
                        </div>
                        <div class="add_pass">
                            <label for="TenLop">Ngày sinh</label>
                            <input type="date" name="tenlopadd" id="NgaySinh_update">
                        </div>
                        <div class="add_gt">
                            <label for="NamHoc">Giới tính</label>
                            <select name="namhoc" id="GioiTinh_update">
                                <option value=""></option>
                                <option value="nam">nam</option>
                                <option value="nữ">nữ</option>
                            </select>
                        </div>
                        
                        <div class="add_gv">
                            <label for="DiaChi">Địa chỉ</label>
                            <input type="text" name="magvadd" id="DiaChi_update">
                        </div>
                        <div class="add_pass">
                            <label for="PhuHuynh">Phụ huynh</label>
                            <input type="text" name="tenlopadd" id="PhuHuynh_update">
                        </div>
                        <div class="add_pass">
                            <label for="SDT">SDT PH</label>
                            <input type="text" name="tenlopadd" id="SDT_update">
                        </div>
                    </div>
                    <div class="button">
                        <button type="button" id="update_hocsinh">Sửa</button>
                    </div>
                    <p>Lưu ý: Nếu không nhập thông tin thì thông tin sẽ được giữ nguyên
                    </p>                
                </form>
            </div>
        </div>
    </div>
    <div class="hidden" id="update1">
        <div class="bk_mo ">
            <div class="box_fun">
                <span class="close"><i class="fas fa-times"></i></span>
                <h2>Đổi mật khẩu</h2>
                <form class="" action="" method="post">
                    <div class="box_content update_ttcn">
                        <div class="add_pass">
                            <label for="MKCu">Mật khẩu cũ</label>
                            <input type="password" name="tenlopadd" id="MKCu">
                        </div>
                        <div class="add_pass">
                            <label for="MKMoi">Mật khẩu mới</label>
                            <input type="password" name="tenlopadd" id="MKMoi">
                        </div>
                        <div class="add_pass">
                            <label for="XNMKMoi">Xác nhận mật khẩu</label>
                            <input type="password" name="tenlopadd" id="XNMKMoi">
                        </div>              
                        
                    </div>
                    
                    <div class="button">
                        <button type="button" id="update_thongtincanhan">Sửa</button>
                    </div>       
                    <p>Lưu ý: Nếu không nhập thông tin sẽ được giữ nguyên</p>       
                </form>
            </div>
        </div>
    </div>
    
    <div class="hidden" id="logout">
        <div class="bk_mo ">
            <div class="box_fun">
                <span class="close"><i class="fas fa-times"></i></span>
                <h2>Đăng xuất </h2>
                <form class="" action="./dangxuat.php" method="post">
                    
                    <div class="submit">
                        <button>Xác nhận đăng xuất</button>
                    </div>          
                </form>
            </div>
        </div>
    </div>
    <nav>
        <div class="menu_top">
            <i class="fas fa-bookmark"></i>
            <p>Education</p>
        </div>
        <div class="menu_mid">
            <ul class="menu_main">
                <li class="li1"><a href="./admin.php" class="taga"><i class="fas fa-home i_normal" ></i><p>Home</p></a></li>
                <li class="li1"><a href="./lophoc.php" class="taga"><i class="fas fa-users i_normal"></i></i><p>Lớp học</p></a></li>
                <li class="li1"><a href="./thoikhoabieu.php" class="taga"><i class="far fa-calendar-alt i_normal"></i><p>Thời khóa biểu</p></a></li>
                <li class="li1"><a href="./bangdiem.php" class="taga"><i class="fas fa-chalkboard-teacher i_normal"></i><p>Bảng điểm</p></a></li>
                <li class="li1 test"><a href="./canhan.php" class="taga"><i class="fas fa-user i_normal i_to"></i><p class="to">Cá nhân</p></a></li>
                <li class="li1"><a href="#" id="logout_btn" class="taga"><i class="fas fa-sign-out-alt i_normal"></i><p>Đăng xuất</p></a></li>
            </ul>
        </div>
        <!-- <div class="menu_img"></div> -->
    </nav>
    <section>
        <header>
            <div class="account">
                <p> 
                    <?php
                        echo $tenhs_hientai;
                    ?>
                </p>
                <i class="fas fa-user"></i>
            </div>
            <div>
                <h1>Quản lý học sinh</h1>
            </div>
        </header>
        <div class="con">
        <div class="menu">
                <div class="infor_main infor_class">
                    <img src="Img/class.svg" alt="">
                    <div class="infor_content">
                        <h1>Lớp học</h1>
                        <p>
                            <?php echo $solop ?>
                        </p>
                    </div>
                </div>
                <div class="infor_main infor_teacher">
                    <img src="Img/teacher.svg" alt="">
                    <div class="infor_content">
                        <h1>Giáo viên</h1>
                        <p>
                            <?php echo $sogv ?>
                        </p>
                    </div>
                </div>
                <div class="infor_main infor_student">
                    <img src="Img/student.svg" alt="">
                    <div class="infor_content">
                        <h1>Học sinh</h1>
                        <p>
                            <?php echo $sohs ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="content_content aaa">
                    <div class="thongtincanhan_hs">
                        <div class="thongtinhs_chinh">
                            <div class="icon_hs">
                                <i class="fas fa-user"></i>
                            </div>
                            <div class="thongtin_chinh_1">
                                <div>
                                    <p class="hoten_hs"><?php echo $tenhs_hientai?></p>
                                    <p id="chucvu_hs">học sinh</p>
                                </div>
                                <div>   
                                    <p class="lophoc_hientai_hs"><?php echo $namhoc_hientai?></p>
                                </div>
                            </div>
                        </div>
                        <div class="thongtin_hs_infor">
                            <div class="thongtin_hs_mahs">
                                <p>Mã HS</p>
                                <span><?php echo $_SESSION['userhs']?></span>
                            </div>
                            <div class="thongtin_hs_mahs">
                                <p>Lớp học</p>
                                <span><?php echo $solop?></span>
                            </div>
                            <div class="thongtin_hs_mahs">
                                <p>Tình trạng</p>
                                <span><?php echo $sql->getdata("SELECT TinhTrang from hocsinh where MaHS = '".$_SESSION['userhs']."'")->fetch_assoc()['TinhTrang']?></span>
                            </div>
                        </div>
                        <div class="thongtin_hs_coban">
                            <div class="ngaysinh">
                                <label>Ngày sinh:</label>
                                <p>
                                    <?php 
                                        $data_hs = $sql->getdata("SELECT * from hocsinh where MaHS = '".$_SESSION['userhs']."'");
                                        $ngaysinh_hs = '';    
                                        $gioitinh_hs = '';
                                        $diachi_hs = '';
                                        $phuhuynh_hs = '';
                                        $sdt_hs = '';
                                        while($a = $data_hs->fetch_assoc()){
                                            $ngaysinh_hs = $a['NgaySinh'];    
                                            $gioitinh_hs = $a['GioiTinh'];
                                            $diachi_hs = $a['DiaChi'];
                                            $phuhuynh_hs = $a['PhuHuynh'];
                                            $sdt_hs = $a['SoDTPhuHuynh'];
                                        }
                                        echo $ngaysinh_hs;
                                    ?>
                                </p>
                            </div>
                            <div class="gioitinh">
                                <label>Giới tính:</label>
                                <p>
                                    <?php 
                                        echo $gioitinh_hs;
                                    ?>
                                </p>
                            </div>
                            <div class="gioitinh">
                                <label>Giới tính:</label>
                                <p>
                                    <?php 
                                        echo $gioitinh_hs;
                                    ?>
                                </p>
                            </div>
                            <div class="gioitinh">
                                <label>Phụ huynh:</label>
                                <p>
                                    <?php 
                                        echo $phuhuynh_hs;
                                    ?>
                                </p>
                            </div>
                            <div class="gioitinh">
                                <label>SDT PH:</label>
                                <p>
                                    <?php 
                                        echo $sdt_hs;
                                    ?>
                                </p>
                            </div>
                            <div class="gioitinh">
                                <label>Địa chỉ:</label>
                                <p>
                                    <?php 
                                        echo $diachi_hs;
                                    ?>
                                </p>
                            </div>
                        </div>
                        <div class="chucnang_hs">
                            <input type="button" value="Sửa thông tin" id="thongtincanhan">
                        </div>
                    </div>
                    <div class="diemtk_hs">
                        <?php
                            $bang ="
            
                            <div class=\"thongtingiaovien infor_detail_table diem diemtk_hs\" style=\"width: 100%; margin:auto; display: flex; align-items: center\">
                                <table style=\"width: 90%; margin: auto;\">
                                    <thead>
                                        <tr>
                                            <th style=\"width: 16.66%\">Năm học</td>
                                            <th style=\"width: 16.66%\">Tên lớp</th>
                                            <th style=\"width: 16.66%\">Điểm TK</th>
                                            <th style=\"width: 16.66%\">Hạnh kiểm</th>
                                            <th style=\"width: 16.66%\">Học lực</th>
                                            <th style=\"width: 16.66%\">Xếp loại</th>
                                        </tr>
                                    </thead>
                                    <tbody id=\"infor_gvcn_table_add\" height=\"500px\">
                                ";
                            // $data = $sql->getdata("SELECT diemtbnam.NamHoc, lophoc_hocsinh.MaLop,TenLop,DiemTBNam, HanhKiem, HocLuc, XepLoai from diemtbnam inner join hocsinh on diemtbnam.MaHS = hocsinh.MaHS inner join lophoc_hocsinh on hocsinh.MaHS = lophoc_hocsinh.MaHS inner join lophoc on lophoc.MaLop = lophoc_hocsinh.MaLop inner join danhgia on danhgia.MaHS = lophoc_hocsinh.MaHS and danhgia.MaLop = lophoc_hocsinh.MaLop where hocsinh.MaHS = '".$_SESSION['userhs']."' group by MaLop");
                            $data = $sql->getdata("SELECT lophoc_hocsinh.MaLop, TenLop, NamHoc from lophoc_hocsinh inner join lophoc on lophoc.MaLop= lophoc_hocsinh.MaLop where lophoc_hocsinh.MaHS = '".$_SESSION['userhs']."'");
                            while($row = $data->fetch_assoc()){
                                $a = $sql->getdata("SELECT DiemTBNam from diemtbnam where MaHS = '".$_SESSION['userhs']."' and NamHoc = '".$row['NamHoc']."'")->fetch_assoc()['DiemTBNam'];
                                
                                $diemtb = ($a != '-1') ? $a : '';
                                
                                $danhgia = $sql->getdata("SELECT * from danhgia WHERE MaHS = '".$_SESSION['userhs']."' and MaLop = '".$row['MaLop']."'")->fetch_assoc();
                                
                                $bang .= "
                                <tr>
                                    <td style=\"width: 16.66%\">".$row['NamHoc']."</td>
                                    <td style=\"width: 16.66%\">".$row['TenLop']."</td>
                                    <td style=\"width: 16.66%\">".$diemtb."</td> 
                                    <td style=\"width: 16.66%\">".$danhgia['HanhKiem']."</td>
                                    <td style=\"width: 16.66%\">".$danhgia['HocLuc']."</td>
                                    <td style=\"width: 16.66%\">".$danhgia['XepLoai']."</td>
                                </tr>
                                ";  
                            }
                            $bang .="</tbody>
                                            </table>
                                        </div>
                                        
                                        ";
                            echo $bang;
                        ?>
                    </div>
                    <div class="doimatkhau_hs">
                        <input type="button" value="Đổi mật khẩu" id="doipass">
                    </div>
                </div>
            </div> 
        </div>
    </section>
    <script src="./Js/main.js"></script>
    <script>
        document.getElementById('doipass').onclick = function(){
            document.getElementById('update1').style.display = 'block';
            document.getElementById('update_thongtincanhan').onclick = function(){
                var mkcu = document.getElementById('MKCu');
                var mkmoi = document.getElementById('MKMoi');
                var xnmkmoi = document.getElementById('XNMKMoi');

                if(mkcu.value == "" && mkmoi.value == "" && xnmkmoi.value == ""){
                    document.getElementById('thongbao_chucnang_1').innerHTML = `
                        <h2 style=\"color: rgb(1, 82, 233);\">Thông báo</h2>
                        <p style=\"font-size: 15px; margin-top: 20px;\">Bạn chưa nhập thông tin</p>
                    `;
                    document.getElementById('thongbao_chucnang').style.display = 'block';
                }
                else{
                    if(mkcu.value != "" && mkmoi.value == "" && xnmkmoi.value == ""){
                        document.getElementById('thongbao_chucnang_1').innerHTML = `
                            <h2 style=\"color: rgb(1, 82, 233);\">Thông báo</h2>
                            <p style=\"font-size: 15px; margin-top: 20px;\">Bạn chưa nhập mật khẩu mới</p>
                        `;
                        document.getElementById('thongbao_chucnang').style.display = 'block';
                    }
                    else{
                        if(mkmoi.value != xnmkmoi.value){
                            document.getElementById('thongbao_chucnang_1').innerHTML = `
                                <h2 style=\"color: rgb(1, 82, 233);\">Thông báo</h2>
                                <p style=\"font-size: 15px; margin-top: 20px;\">Mật khẩu mới không trùng khớp</p>
                            `;
                            
                            document.getElementById('thongbao_chucnang').style.display = 'block';
                        }
                        else{
                            var get ="mkcu=" + mkcu.value +  "&mkmoi=" + mkmoi.value; 
                            update('update_canhan.php',get);
                            setTimeout(function(){
                                var thongbao_update = document.getElementById('thongbao_update1'); 
                                if(thongbao_update.innerText == "Đổi mật khẩu thành công"){
                                    mkcu.value = '';
                                    mkmoi.value = '';
                                    xnmkmoi.value = '';
                                }
                                    
                            },700);
                        }
                    }
                }
            }
        }

        document.getElementById('thongtincanhan').onclick = function(){
            document.getElementById('update').style.display = 'block';
            document.getElementById('update_hocsinh').onclick = function(){
                var tenhs = document.getElementById('TenHS_update');
                var ngaysinh = document.getElementById('NgaySinh_update');
                var gioitinh = document.getElementById('GioiTinh_update');
                var diachi = document.getElementById('DiaChi_update');
                var phuhuynh = document.getElementById('PhuHuynh_update');
                var sdt = document.getElementById('SDT_update');
            
                if( tenhs.value == "" && ngaysinh.value == "" && gioitinh.value == "" && diachi.value == "" && phuhuynh.value == "" && sdt.value == "") {
                    document.getElementById('thongbao_chucnang_1').innerHTML = `
                        <h2 style=\"color: rgb(1, 82, 233);\">Thông báo</h2>
                        <p style=\"font-size: 15px; margin-top: 20px;\">Bạn chưa nhập thông tin</p>
                    `;
                    document.getElementById('thongbao_chucnang').style.display = 'block';
                }
                else{
                    var get = "TenHS=" + tenhs.value + "&NgaySinh=" + ngaysinh.value + "&GioiTinh=" + gioitinh.value + "&DiaChi=" + diachi.value + "&PhuHuynh=" + phuhuynh.value + "&SDT=" + sdt.value; 
                    document.getElementById('update').style.display = 'none';
                    var request = new XMLHttpRequest();

                    request.open("get","update_hocsinh.php?" + get + "");
                    request.onreadystatechange = function(){
                        if(this.readyState === 4 && this.status === 200){
                            document.getElementById('thongbao_chucnang_1').innerHTML = this.responseText;
                        }
                    }
                    
                    request.send();
                    var thongbao = document.getElementById('thongbao_chucnang');
                    thongbao.style.display = 'block';  
                    
                    setTimeout(function(){
                        var thongbao_update = document.getElementById('thongbao_update'); 
                        if(thongbao_update.innerText == "Sửa thành công")
                            location.reload();
                    },1500);
                           
                }
            }
        }
    </script>

</body>
</html>