<?php
    session_start();
    require_once "./LogIn/checkloginadmin.php";
    require_once "./infor_general.php";
    require_once "./LogIn/sql.php";
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
    <div class="hidden" id="delete">
        <div class="bk_mo ">
            <div class="box_fun">
                <span class="close"><i class="fas fa-times"></i></span>
                <h2>Thông báo </h2>
                <div id="delete_infor">
                    
                </div>
                <form class="" action="./dangxuat.php" method="post">
                    
                    <div class="submit">
                        <button type="button" id="delete_confirm">Xóa</button>
                    </div>          
                </form>
            </div>
        </div>
    </div>
    <div class="hidden" id="detail_hocsinh_box">
        <div class="bk_mo ">
            <div class="box_fun infor_detail" style="position: relative;">
                <span class="close"><i class="fas fa-times"></i></span>
                <h2>Thông tin học sinh</h2>
                <form class="" action="" id="detail_hocsinh_infor">                                                  
                </form>
                <p>Lưu ý: Nếu chọn nhiều hơn 1 sẽ thực hiện lấy thông tin hàng đầu tiên mà bạn chọn</p>  
            </div>
        </div>
    </div>
    <div class="hidden" id="resetpass">
        <div class="bk_mo ">
            <div class="box_fun">
                <span class="close"><i class="fas fa-times"></i></span>
                <h2>Thông báo </h2>
                <div id="resetpass_infor">
                    
                </div>
                <form class="" action="" method="post">
                    
                    <div class="submit">
                        <button type="button" id="resetpass_confirm">Xác nhận đặt lại mật khẩu</button>
                    </div>          
                </form>
            </div>
        </div>
    </div>
    <div class="hidden" id="add">
        <div class="bk_mo ">
            <div class="box_fun">
                <span class="close"><i class="fas fa-times"></i></span>
                <h2>Thêm mới học sinh</h2>
                <form class="" action="" method="post">
                    <div class="box_content">
                        <div class="add_ma">
                            <label for="MaHS">Mã HS <span>*</span></label>
                            <input type="text" name="malopadd" id="MaHS">
                        </div>
                        <div class="add_pass">
                            <label for="TenHS">Tên HS <span>*</span></label>
                            <input type="text" name="tenlopadd" id="TenHS">
                        </div>
                        
                        <div class="add_gv">
                            <label for="NgaySinh">Ngày sinh<span>*</span></label>
                            <input type="date" name="magvadd" id="NgaySinh">
                        </div>
                        <div class="add_pass">
                            <label for="GioiTinh">Giới tính <span>*</span></label>
                            <select name="" id="GioiTinh">
                                <option value="nam">Nam</option>
                                <option value="nữ">Nữ</option>
                            </select>
                        </div>
                        <div class="add_gv">
                            <label for="DiaChi">Địa chỉ <span>*</span></label>
                            <input type="text" name="magvadd" id="DiaChi">
                        </div>
                        <div class="add_gv">
                            <label for="PhuHuynh">Phụ huynh <span>*</span></label>
                            <input type="text" name="magvadd" id="PhuHuynh">
                        </div>
                        <div class="add_gv">
                            <label for="SDT">SDT PH <span>*</span></label>
                            <input type="text" name="magvadd" id="SDT">
                        </div>                       
                        
                    </div>
                    <div>
                        <h3 style="margin-bottom: 30px;">Vào lớp</h3>
                        <div class="add_gt">
                            <label for="MaLop">Mã lớp <span style="color: red;">*</span></label>
                            <select name="v" id="MaLop" style="height: 30px; background-color: white; width: 200px; border: 1px solid #777; border-radius: 5px;">
                                <?php
                                    $query_dslophoc = "SELECT * from lophoc";
                                    $data_dslophoc = $sql->getdata($query_dslophoc);
                                    while($row = $data_dslophoc->fetch_assoc()){
                                        echo "<option value=\"".$row['MaLop']."\">".$row['TenLop']."</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="button">
                        <button type="button" id="add_hocsinh">Thêm và vào lớp</button>
                    </div>
                    <p>Lưu ý: thông tin có chứa dấu (*) bắt buộc phải điền</p>                
                </form>
            </div>
        </div>
    </div>
    <div class="hidden" id="update">
        <div class="bk_mo ">
            <div class="box_fun">
                <span class="close"><i class="fas fa-times"></i></span>
                <h2>Sửa thông tin học sinh</h2>
                <form class="" action="" method="post">
                    <div class="box_content">
                        <div class="add_ma">
                            <label for="MaHS_update">Mã HS </label>
                            <input type="text" name="malopadd" id="MaHS_update">
                        </div>
                        <div class="add_pass">
                            <label for="TenHS_update">Tên HS </label>
                            <input type="text" name="tenlopadd" id="TenHS_update">
                        </div>
                        <div class="add_gt">
                            <label for="MaLop_update">Mã lớp </label>
                            <select name="namhoc" id="MaLop_update">
                                <option value=""></option>
                                <?php
                                    $query_dslophoc = "SELECT * from lophoc";
                                    $data_dslophoc = $sql->getdata($query_dslophoc);
                                    while($row = $data_dslophoc->fetch_assoc()){
                                        echo "<option value=\"".$row['MaLop']."\">".$row['MaLop']."</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="add_gv">
                            <label for="NgaySinh_update">Ngày sinh</label>
                            <input type="date" name="magvadd" id="NgaySinh_update">
                        </div>
                        <div class="add_pass">
                            <label for="GioiTinh_update">Giới tính </label>
                            <select name="" id="GioiTinh_update">
                                <option value=""></option>
                                <option value="nam">Nam</option>
                                <option value="nữ">Nữ</option>
                            </select>
                        </div>
                        <div class="add_gv">
                            <label for="DiaChi_update">Địa chỉ </label>
                            <input type="text" name="magvadd" id="DiaChi_update">
                        </div>
                        <div class="add_gv">
                            <label for="PhuHuynh_update">Phụ huynh </label>
                            <input type="text" name="magvadd" id="PhuHuynh_update">
                        </div>
                        <div class="add_gv">
                            <label for="SDT_update">SDT PH </label>
                            <input type="text" name="magvadd" id="SDT_update">
                        </div>  
                        <div class="add_gv">
                            <label for="TinhTrang_update">Tình trạng</label>
                            <select name="" id="TinhTrang_update">
                                <option value=""></option>
                                <option value="đang học">đang học</option>
                                <option value="lưu ban">lưu ban</option>
                                <option value="bỏ học">bỏ học</option>
                            </select>
                        </div>                       
                        
                    </div>
                    
                    <div class="button">
                        <button type="button" id="update_hocsinh">Sửa</button>
                    </div>
                    <p>Lưu ý: thông tin có chứa dấu (*) bắt buộc phải điền
                        <br> Nếu chọn nhiều hơn 1 sẽ thực hiện sửa cho hàng đầu tiên mà bạn chọn
                    </p>                    
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
                <li class="li1 "><a href="./admin.php" class="taga"><i class="fas fa-home i_normal " ></i><p >Home</p></a></li>
                <li class="li1 "><a href="./lophoc.php" class="taga"><i class="fas fa-users i_normal "></i></i><p>Lớp học</p></a></li>
                <li class="li1"><a href="./giaovien.php" class="taga"><i class="fas fa-chalkboard-teacher i_normal"></i><p>Giáo viên</p></a></li>
                <li class="li1 test"><a href="./hocsinh.php" class="taga"><i class="fas fa-user-graduate i_normal i_to"></i><p class="to">Học sinh</p></a></li>
                <li class="li1"><a href="./monhoc.php" class="taga"><i class="fas fa-tags i_normal"></i><p>Môn học</p></a></li>
                <li class="li1"><a href="./thoikhoabieu.php" class="taga"><i class="far fa-calendar-alt i_normal"></i><p>Thời khóa biểu</p></a></li>
                <li class="li1"><a href="./canhan.php" class="taga"><i class="fas fa-user i_normal"></i><p>Cá nhân</p></a></li>
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
            <div class="chucnang">
                    <div class="chucnangchinh">
                        <input type="button" value="Thêm" id="add_btn">
                        <input type="button" value="Sửa" id="update_btn">
                        <input type="button" value="Xóa" id="delete_btn"> 
                        <input type="button" value="Xem thông tin chi tiết" id="detail_btn">
                        <input type="button" value="Đặt lại mật khẩu" id="resetpass_btn"> 
                    </div>
                    <div class="timkiem">
                        <select name="luachontimkiem" class="luachon" id="sel_search">
                            <option value="MaHS">Mã học sinh</option>
                            <option value="TenHS">Tên học sinh</option>
                            <option value="TenLop">Tên lớp</option>
                            <option value="NgaySinh">Ngày sinh</option>
                            <option value="GioiTinh">Giới tính</option>
                            <option value="DiaChi">Địa chỉ</option>
                            <option value="TinhTrang">Tình trạng</option>
                        </select>
                        <input type="search" placeholder="Tìm kiếm" id="search">
                    </div>
                </div>
                <div class="content_content">
                    
                    <table class="tenbang" cellspacing="0" width="100%" style="margin-bottom: 5px; width: calc(100%-15px);">
                        <tr class="bangtieude">
                            <th width="5%" >Stt</th>
                            <th width="7%">Mã HS</th>
                            <th width="18%">Tên học sinh</th>
                            <th width="10%">Ngày sinh</th>
                            <th width="7%">Giới tính</th>
                            <th width="15%">Địa chỉ</th>
                            <th width="10%">Lớp hiện tại</th>
                            <th width="10%">Tình trạng</th>
                        </tr>
                    </table>
                    <div class="thongtinbang">
                        <table id="table_class" class="bangnd" border="1" cellspacing="0" width="100%">
                            
                            <?php
                                $query = "SELECT * from hocsinh inner join lophoc_hocsinh on hocsinh.MaHS = lophoc_hocsinh.MaHS inner join lophoc on lophoc.MaLop = lophoc_hocsinh.MaLop where NamHoc = '$namhoc_hientai'";
                                
                                $data_hocsinh_bang = $sql->getdata($query);
                                $i=1;
                                $query1 = "SELECT * from hocsinh where MaHS not in (SELECT MaHS from lophoc_hocsinh inner join lophoc on lophoc.MaLop = lophoc_hocsinh.MaLop where NamHoc = '$namhoc_hientai')";
                                $data_add = $sql->getdata($query1);
                                if($data_add->num_rows > 0){
                                    while($row = $data_add->fetch_assoc()){
                                        echo "
                                            <tr class=\"class noidungbang\">
                                                <td align=\"center\" width=\"5%\" >".$i."</td>
                                                <td align=\"center\" width=\"7%\">".$row['MaHS']."</td>
                                                <td align=\"center\" width=\"18%\">".$row['TenHS']."</td>
                                                <td align=\"center\" width=\"10%\">".$row['NgaySinh']."</td>
                                                <td align=\"center\" width=\"7%\">".$row['GioiTinh']."</td>                                            
                                                <td align=\"center\" width=\"15%\">".$row['DiaChi']."</td>
                                                <td align=\"center\" width=\"10%\"></td>
                                                <td align=\"center\" width=\"10%\">".$row['TinhTrang']."</td>
                                            </tr>
                                        ";
                                        $i++;
                                    }
                                }
                                while($row = $data_hocsinh_bang->fetch_assoc()){
                                    echo "
                                        <tr class=\"class noidungbang\">
                                            <td align=\"center\" width=\"5%\" >".$i."</td>
                                            <td align=\"center\" width=\"7%\">".$row['MaHS']."</td>
                                            <td align=\"center\" width=\"18%\">".$row['TenHS']."</td>
                                            <td align=\"center\" width=\"10%\">".$row['NgaySinh']."</td>
                                            <td align=\"center\" width=\"7%\">".$row['GioiTinh']."</td>                                            
                                            <td align=\"center\" width=\"15%\">".$row['DiaChi']."</td>
                                            <td align=\"center\" width=\"10%\">".$row['TenLop']."</td>
                                            <td align=\"center\" width=\"10%\">".$row['TinhTrang']."</td>
                                        </tr>
                                    ";
                                    $i++;
                                }

                                
                            ?>
                        </table>
                    </div>
                </div>
            </div> 
        </div>
    </section>
    <script src="./Js/main.js"></script>
    <?php
        if(isset($_GET['Lop'])){            
            echo "<script>search('timkiem_hocsinh.php','TenLop','".$_GET['Lop']."');</script>";
        }
        if(isset($_GET['VaoLop'])){
            echo $_GET['VaoLop'];
            echo "<script>search('vaolop.php','MaLop','".$_GET['VaoLop']."');</script>";
        }
    ?>
    <script>   
        
        
        
        document.getElementById('add_hocsinh').onclick = function(){
            var mahs = document.getElementById('MaHS');
            var tenhs = document.getElementById('TenHS');
            var malop = document.getElementById('MaLop');
            var ngaysinh = document.getElementById('NgaySinh');
            var gioitinh = document.getElementById('GioiTinh')
            var diachi = document.getElementById('DiaChi');
            var phuhuynh = document.getElementById('PhuHuynh');
            var sdt = document.getElementById('SDT');
            var get = "MaHS=" + mahs.value + "&TenHS=" + tenhs.value +  "&MaLop=" + malop.value + "&NgaySinh=" + ngaysinh.value + "&GioiTinh=" + gioitinh.value + "&DiaChi=" + diachi.value + "&PhuHuynh=" + phuhuynh.value + "&SDT=" + sdt.value; 
            
            document.getElementById('add').style.display = 'none';
            add('add_hocsinh.php',get);
            setTimeout(function(){ search('timkiem_hocsinh.php','MaHS',''); }, 300);  
        }

        document.getElementById('update_btn').onclick = function(){
            var hocsinh = [];
            get_ma(hocsinh,update_box,'sửa');
            document.getElementById('update_hocsinh').onclick = function(){
                var mahs = document.getElementById('MaHS_update');
                var tenhs = document.getElementById('TenHS_update');
                var malop = document.getElementById('MaLop_update');
                var ngaysinh = document.getElementById('NgaySinh_update');
                var gioitinh = document.getElementById('GioiTinh_update');
                var diachi = document.getElementById('DiaChi_update');
                var phuhuynh = document.getElementById('PhuHuynh_update');
                var sdt = document.getElementById('SDT_update');
                var tinhtrang = document.getElementById('TinhTrang_update');
            
                if(mahs.value == "" && tenhs.value == "" && malop.value == "" && ngaysinh.value == "" && gioitinh.value == "" && diachi.value == "" && phuhuynh.value == "" && sdt.value == "" && tinhtrang.value == "") {
                    document.getElementById('thongbao_chucnang_1').innerHTML = `
                        <h2 style=\"color: rgb(1, 82, 233);\">Thông báo</h2>
                        <p style=\"font-size: 15px; margin-top: 20px;\">Bạn chưa nhập thông tin</p>
                    `;
                    document.getElementById('thongbao_chucnang').style.display = 'block';
                }
                else{
                    var get = "MaHSCu=" + hocsinh[0] + "&MaHS=" + mahs.value + "&TenHS=" + tenhs.value +  "&MaLop=" + malop.value + "&NgaySinh=" + ngaysinh.value + "&GioiTinh=" + gioitinh.value + "&DiaChi=" + diachi.value + "&PhuHuynh=" + phuhuynh.value + "&SDT=" + sdt.value +  "&TinhTrang=" + tinhtrang.value; 
                    document.getElementById('update').style.display = 'none';
                    update('update_hocsinh.php',get);
                    setTimeout(function(){ search('timkiem_hocsinh.php','MaHS',''); }, 300);                    
                }
            }
        }

        document.getElementById('delete_btn').onclick = function(){
            var hocsinh = [];
            get_ma(hocsinh,'','xóa');

            if(hocsinh.length>0){
                var a = '';
                for(var i=0;i<hocsinh.length;i++){
                    a+=`
                        <p style="text-align: left ;font-size: 17px; font-weight: 500; color: #5C7AEA">Xác nhận xóa học sinh có mã là <span style="color: #FFB319; font-weight: 600; border-bottom: 1px solid #FFB319">${hocsinh[i]}</span></p>
                    `;
                }
                document.getElementById('delete_infor').innerHTML = a;
                document.getElementById('delete').style.display = 'block';
                document.getElementById('delete_confirm').onclick = function(){
                    var get = 'MaHS=';
                    for(var i=0;i<hocsinh.length;i++){
                        get+=hocsinh[i];
                        if(i<hocsinh.length-1)
                            get+="_";
                    }
                    del('delete_hocsinh.php',get);
                    document.getElementById('delete').style.display = 'none';
                    setTimeout(function(){ search('timkiem_hocsinh.php','MaHS',''); }, 300); 
                }
                
            }
             
        }

        document.getElementById('resetpass_btn').onclick = function(){
            var hocsinh = [];
            get_ma(hocsinh,'','đặt lại mật khẩu');

            if(hocsinh.length>0){
                var a = '';
                for(var i=0;i<hocsinh.length;i++){
                    a+=`
                        <p style="text-align: left ;font-size: 17px; font-weight: 500; color: #5C7AEA">Xác nhận đặt lại mật khẩu cho học sinh có mã là <span style="color: #FFB319; font-weight: 600; border-bottom: 1px solid #FFB319">${hocsinh[i]}</span></p>
                    `;
                }
                document.getElementById('resetpass_infor').innerHTML = a;
                document.getElementById('resetpass').style.display = 'block';
                document.getElementById('resetpass_confirm').onclick = function(){
                    var get = 'MaHS=';
                    for(var i=0;i<hocsinh.length;i++){
                        get+=hocsinh[i];
                        if(i<hocsinh.length-1)
                            get+="_";
                    }
                    del('resetpass_hocsinh.php',get);
                    document.getElementById('resetpass').style.display = 'none';
                    setTimeout(function(){ search('timkiem_hocsinh.php','MaGV',''); }, 300); 
                }
                
            }
             
        }
        
        document.getElementById('search').oninput = function(){
            var sel_search = document.getElementById('sel_search');
            search('timkiem_hocsinh.php',sel_search.value,this.value);
        }

        document.getElementById('detail_btn').onclick = function(){
            var hocsinh = [];
            get_ma(hocsinh,'','xem thông tin chi tiết');

            if(hocsinh.length>0){
                var request = new XMLHttpRequest();
                request.open("get","chitiet_hocsinh.php?MaHS=" + hocsinh[0]);
                request.onreadystatechange = function(){
                    if(this.readyState === 4 && this.status === 200){
                        document.getElementById('detail_hocsinh_infor').innerHTML = this.responseText;
                    }
                }
                
                request.send();
                document.getElementById('detail_hocsinh_box').style.display = 'block';
            }
        }

        
    </script>

</body>
</html>