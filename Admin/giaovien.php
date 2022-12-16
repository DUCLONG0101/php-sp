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
                <form class="" action="" method="post">
                    
                    <div class="submit">
                        <button type="button" id="delete_confirm">Xác nhận xóa</button>
                    </div>          
                </form>
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
                <h2>Thêm mới giáo viên</h2>
                <form class="" action="" method="post">
                    <div class="box_content">
                        <div class="add_ma">
                            <label for="MaGV">Mã GV <span>*</span></label>
                            <input type="text" name="malopadd" id="MaGV">
                        </div>
                        <div class="add_pass">
                            <label for="TenGV">Tên GV <span>*</span></label>
                            <input type="text" name="tenlopadd" id="TenGV">
                        </div>
                        <div class="add_gv">
                            <label for="DiaChi">Địa chỉ <span>*</span></label>
                            <input type="text" name="magvadd" id="DiaChi">
                        </div>
                        <div class="add_gv">
                            <label for="DienThoai">Điện thoại<span>*</span></label>
                            <input type="text" name="magvadd" id="DienThoai">
                        </div>
                        <div>
                            <label for="MaBoMon">Bộ môn<span>*</span></label>
                            <select name="mabomon" id="MaBoMon">
                                <?php
                                    $bomon = "SELECT * from bomon ";
                                    $databomon = $sql->getdata($bomon);
                                    while($row = $databomon->fetch_assoc()){
                                        echo "<option value=\"".$row['MaBoMon']."\">".$row['TenBoMon']."</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="add_gv">
                            <label for="GhiChu">Ghi chú</label>
                            <input type="text" name="magvadd" id="GhiChu">
                        </div>                       
                        
                    </div>
                    
                    <div class="button">
                        <button type="button" id="add_giaovien">Thêm</button>
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
                            <label for="MaGV">Mã GV </label>
                            <input type="text" name="malopadd" id="MaGV_update">
                        </div>
                        <div class="add_pass">
                            <label for="TenGV">Tên GV </label>
                            <input type="text" name="tenlopadd" id="TenGV_update">
                        </div>
                        <div class="add_gv">
                            <label for="DiaChi">Địa chỉ </label>
                            <input type="text" name="magvadd" id="DiaChi_update">
                        </div>
                        <div class="add_gv">
                            <label for="DienThoai">Điện thoại</label>
                            <input type="text" name="magvadd" id="DienThoai_update">
                        </div>
                        <div class="add_gv">
                            <label for="GhiChu">Ghi chú</label>
                            <input type="text" name="magvadd" id="GhiChu_update">
                        </div>                       
                        
                    </div>  
                    <div class="button">
                        <button type="button" id="update_giaovien">Sửa</button>
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
                <li class="li1"><a href="./namhoc.php" class="taga"><i class="fas fa-vote-yea i_normal"></i><p>Năm học</p></a></li>
                <li class="li1 "><a href="./lophoc.php" class="taga"><i class="fas fa-users i_normal "></i></i><p>Lớp học</p></a></li>
                <li class="li1 test"><a href="./giaovien.php" class="taga"><i class="fas fa-chalkboard-teacher i_normal i_to"></i><p class="to">Giáo viên</p></a></li>
                <li class="li1 "><a href="./hocsinh.php" class="taga"><i class="fas fa-user-graduate i_normal "></i><p >Học sinh</p></a></li>
                <li class="li1"><a href="./monhoc.php" class="taga"><i class="fas fa-tags i_normal"></i><p>Môn học</p></a></li>
                <li class="li1"><a href="./thoikhoabieu.php" class="taga"><i class="far fa-calendar-alt i_normal"></i><p>Thời khóa biểu</p></a></li>
                <li class="li1"><a href="./hoc.php" class="taga"><i class="fas fa-book i_normal"></i><p>Học</p></a></li>
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
                        echo $_SESSION['userad'];
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
                        <input type="button" value="Đặt lại mật khẩu" id="resetpass_btn"> 
                    </div>
                    <div class="timkiem">
                        <select name="luachontimkiem" class="luachon" id="sel_search">
                            <option value="MaGV">Mã giáo viên</option>
                            <option value="TenGV">Tên giáo viên</option>
                            <option value="DienThoai">Số điện thoại</option>
                            <option value="DiaChi">Địa chỉ</option>
                            <option value="MaBoMon">Bộ môn</option>
                            <option value="GhiChu">Ghi chú</option>
                        </select>
                        <input type="search" placeholder="Tìm kiếm" id="search">
                    </div>
                </div>
                <div class="content_content">
                    
                    <table class="tenbang" cellspacing="0" width="100%" style="margin-bottom: 5px; width: calc(100%-15px);">
                        <tr class="bangtieude">
                            <th width="5%" >Stt</th>
                            <th width="10%">Mã GV</th>
                            <th width="18%">Tên GV</th>
                            <th width="10%">Điện thoại</th>
                            <th width="10%">Địa chỉ</th>
                            <th width="10%">Bộ môn</th>
                            <th width="7%">Ghi chú</th>
                        </tr>
                    </table>
                    <div class="thongtinbang">
                        <table id="table_class" class="bangnd" border="1" cellspacing="0" width="100%">
                            
                            <?php
                                $query = "SELECT * from giaovien inner join bomon on giaovien.MaBoMon = bomon.MaBoMon";
                                $data_giaovien_bang = $sql->getdata($query);
                                $i=1;
                                while($row = $data_giaovien_bang->fetch_assoc()){
                                    echo "
                                        <tr class=\"class noidungbang\">
                                            <td align=\"center\" width=\"5%\" >".$i."</td>
                                            <td align=\"center\" width=\"10%\">".$row['MaGV']."</td>
                                            <td align=\"center\" width=\"18%\">".$row['TenGV']."</td>
                                            <td align=\"center\" width=\"10%\">".$row['DienThoai']."</td>
                                            <td align=\"center\" width=\"10%\">".$row['DiaChi']."</td>
                                            <td align=\"center\" width=\"10%\">".$row['TenBoMon']."</td>
                                            <td align=\"center\" width=\"7%\">".$row['GhiChu']."</td>                                            
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
        if(isset($_GET['BoMon'])){
            $bomon = '';
            if($_GET['BoMon'] == 'TuNhien')
                $bomon = 'Tự nhiên';
            if($_GET['BoMon'] == 'XaHoi')
                $bomon = 'Xã hội';
            echo "<script>search('timkiem_giaovien.php','MaBoMon','".$bomon."'); console.log(1)</script>";
        }
    ?>
    <script>   
        
        
        
        document.getElementById('add_giaovien').onclick = function(){
            var magv = document.getElementById('MaGV');
            var tengv = document.getElementById('TenGV');
            var dienthoai = document.getElementById('DienThoai');
            var diachi = document.getElementById('DiaChi');
            var ghichu = document.getElementById('GhiChu');
            var mabomon = document.getElementById('MaBoMon');
            var get = "MaGV=" + magv.value + "&TenGV=" + tengv.value +  "&DienThoai=" + dienthoai.value + "&DiaChi=" + diachi.value + "&GhiChu=" + ghichu.value + "&mabomon=" + mabomon.value ; 
            
            document.getElementById('add').style.display = 'none';
            add('add_giaovien.php',get);
            setTimeout(function(){ search('timkiem_giaovien.php','MaGV',''); }, 300);  
        }

        document.getElementById('update_btn').onclick = function(){
            var giaovien = [];
            get_ma(giaovien,update_box,'sửa');
            document.getElementById('update_giaovien').onclick = function(){
                var magv = document.getElementById('MaGV_update');
                var tengv = document.getElementById('TenGV_update');
                var dienthoai = document.getElementById('DienThoai_update');
                var diachi = document.getElementById('DiaChi_update');
                var ghichu = document.getElementById('GhiChu_update');
            
                if(magv.value == "" && tengv.value == "" && dienthoai.value == "" && diachi.value == "" && ghichu.value == ""){
                    document.getElementById('thongbao_chucnang_1').innerHTML = `
                        <h2 style=\"color: rgb(1, 82, 233);\">Thông báo</h2>
                        <p style=\"font-size: 15px; margin-top: 20px;\">Bạn chưa nhập thông tin</p>
                    `;
                    document.getElementById('thongbao_chucnang').style.display = 'block';
                }
                else{
                    var get = "MaGVCu=" + giaovien[0] + "&MaGV=" + magv.value + "&TenGV=" + tengv.value +  "&DienThoai=" + dienthoai.value + "&DiaChi=" + diachi.value + "&GhiChu=" + ghichu.value; 
                    document.getElementById('update').style.display = 'none';
                    update('update_giaovien.php',get);
                    setTimeout(function(){ search('timkiem_giaovien.php','MaGV',''); }, 300);                    
                }
            }
        }

        document.getElementById('delete_btn').onclick = function(){
            var giaovien = [];
            get_ma(giaovien,'','xóa');

            if(giaovien.length>0){
                var a = '';
                for(var i=0;i<giaovien.length;i++){
                    a+=`
                        <p style="text-align: left ;font-size: 17px; font-weight: 500; color: #5C7AEA">Xác nhận xóa giáo viên có mã là <span style="color: #FFB319; font-weight: 600; border-bottom: 1px solid #FFB319">${giaovien[i]}</span></p>
                    `;
                }
                document.getElementById('delete_infor').innerHTML = a;
                document.getElementById('delete').style.display = 'block';
                document.getElementById('delete_confirm').onclick = function(){
                    var get = 'MaGV=';
                    for(var i=0;i<giaovien.length;i++){
                        get+=giaovien[i];
                        if(i<giaovien.length-1)
                            get+="_";
                    }
                    del('delete_giaovien.php',get);
                    document.getElementById('delete').style.display = 'none';
                    setTimeout(function(){ search('timkiem_giaovien.php','MaGV',''); }, 300); 
                }
                
            }
             
        }

        document.getElementById('resetpass_btn').onclick = function(){
            var giaovien = [];
            get_ma(giaovien,'','đặt lại mật khẩu');

            if(giaovien.length>0){
                var a = '';
                for(var i=0;i<giaovien.length;i++){
                    a+=`
                        <p style="text-align: left ;font-size: 17px; font-weight: 500; color: #5C7AEA">Xác nhận đặt lại mật khẩu cho giáo viên có mã là <span style="color: #FFB319; font-weight: 600; border-bottom: 1px solid #FFB319">${giaovien[i]}</span></p>
                    `;
                }
                document.getElementById('resetpass_infor').innerHTML = a;
                document.getElementById('resetpass').style.display = 'block';
                document.getElementById('resetpass_confirm').onclick = function(){
                    var get = 'MaGV=';
                    for(var i=0;i<giaovien.length;i++){
                        get+=giaovien[i];
                        if(i<giaovien.length-1)
                            get+="_";
                    }
                    del('resetpass_giaovien.php',get);
                    document.getElementById('resetpass').style.display = 'none';
                    setTimeout(function(){ search('timkiem_giaovien.php','MaGV',''); }, 300); 
                }
                
            }
             
        }

        document.getElementById('search').oninput = function(){
            var sel_search = document.getElementById('sel_search');
            search('timkiem_giaovien.php',sel_search.value,this.value);
        }
    </script>

</body>
</html>