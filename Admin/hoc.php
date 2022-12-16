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
    
    <div class="hidden" id="add">
        <div class="bk_mo ">
            <div class="box_fun">
                <span class="close"><i class="fas fa-times"></i></span>
                <h2>Phân công</h2>
                <form class="" action="" method="post">
                    <div class="box_content">                        
                        <div class="add_pass">
                            <label for="TenLop">Tên lớp <span>*</span></label>
                            <select name="namhoc" id="MaLop">
                                <?php
                                    $query_namhoc = "select * from lophoc where NamHoc = '".$namhoc_sau."'";
                                    $data_namhoc = $sql->getdata($query_namhoc);
                                    if($data_namhoc->num_rows > 0){
                                        while($row = $data_namhoc->fetch_assoc()){
                                            echo "<option value=\"".$row['MaLop']."\">".$row['TenLop']."</option>";
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                        
                        <div class="add_gv">
                            <label for="GhiChu">Môn học </label>
                            <select name="namhoc" id="MonHoc">
                                <?php
                                    // $query_namhoc = "select * from monhoc";
                                    // $data_namhoc = $sql->getdata($query_namhoc);
                                    // while($row = $data_namhoc->fetch_assoc()){
                                    //     echo "<option value=\"".$row['MaMon']."\">".$row['TenMon']."</option>";
                                    // }
                                ?>
                            </select>
                        </div>
                       
                        
                    </div>
                    <div class="thongtingiaovien">
                        <div class="giaovienchunhiem">
                            <label for="">Giáo viên dạy<span style="color: red;"> *</span></label>
                            <div class="search_gvcn">
                                <select name="" id="search_gvcn">
                                    <option value="MaGV">Mã giáo viên</option>
                                    <option value="TenGV">Họ tên</option>
                                    <option value="DienThoai">Số ĐT</option>
                                </select>
                                <input type="text" placeholder="Tìm kiếm " id="search_gvcn_btn_add">
                            </div>
                        </div>
                        <table >
                            <thead>
                                <tr>
                                    <th width="15%">Mã GV</th>
                                    <th width="35%">Họ tên</th>
                                    <th width="35%">Bộ môn</th>
                                    <th width="15%">Lựa chọn</th>
                                </tr>
                            </thead>
                            <tbody id="infor_gvcn_table_add">
                                
                                <?php
                                    $query_giaovien = "SELECT MaGV, TenGV, TenBoMon from giaovien inner join bomon on giaovien.MaBoMon = bomon.MaBoMon";
                                    $data_giaovien = $sql->getdata($query_giaovien);
                                    while($row = $data_giaovien->fetch_assoc()){
                                        echo "
                                            <tr>
                                                <td width=\"15%\">".$row['MaGV']."</td>
                                                <td width=\"35%\">".$row['TenGV']."</td>
                                                <td width=\"35%\">".$row['TenBoMon']."</td>
                                                <td width=\"15%\"><input type=\"radio\" name=\"MaGV\" class=\"add_magv_lophoc\" value=\"".$row['MaGV']."\"></td>
                                            </tr>
                                        ";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="button">
                        <button type="button" id="add_phancong">Thêm</button>
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
                <h2>Sửa phân công</h2>
                <form class="" action="" method="post">
                    <div class="thongtingiaovien">
                        <div class="giaovienchunhiem" style="flex-direction: column;">
                            <label for="">Giáo viên dạy<span style="color: red;"> *</span></label>
                            <div class="search_gvcn" style="margin: 10px 0;">
                                <select name="" id="search_gvcn_update">
                                    <option value="MaGV">Mã giáo viên</option>
                                    <option value="TenGV">Họ tên</option>
                                    <option value="DienThoai">Số ĐT</option>
                                </select>
                                <input type="text" placeholder="Tìm kiếm " id="search_gvcn_btn_update">
                            </div>
                        </div>
                        <table >
                            <thead>
                                <tr>
                                    <th width="15%">Mã GV</th>
                                    <th width="35%">Họ tên</th>
                                    <th width="35%">Bộ môn</th>
                                    <th width="15%">Lựa chọn</th>
                                </tr>
                            </thead>
                            <tbody id="infor_gvcn_table_update">
                                
                                <?php
                                    // $query_giaovien = "SELECT MaGV, TenGV, TenBoMon from giaovien inner join bomon on giaovien.MaBoMon = bomon.MaBoMon";
                                    // $data_giaovien = $sql->getdata($query_giaovien);
                                    // while($row = $data_giaovien->fetch_assoc()){
                                    //     echo "
                                    //         <tr>
                                    //             <td width=\"15%\">".$row['MaGV']."</td>
                                    //             <td width=\"35%\">".$row['TenGV']."</td>
                                    //             <td width=\"35%\">".$row['TenBoMon']."</td>
                                    //             <td width=\"15%\"><input type=\"radio\" name=\"MaGV\" class=\"add_magv_lophoc\" value=\"".$row['MaGV']."\"></td>
                                    //         </tr>
                                    //     ";
                                    // }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="button">
                        <button type="button" id="update_phancong">Sửa</button>
                    </div>
                    <p>Lưu ý: thông tin có chứa dấu (*) bắt buộc phải điền</p>                
                </form>
            </div>
        </div>
    </div>
    <!-- <div class="hidden" id="update">
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
    </div> -->
    
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
                <li class="li1"><a href="./giaovien.php" class="taga"><i class="fas fa-chalkboard-teacher i_normal"></i><p>Giáo viên</p></a></li>
                <li class="li1 "><a href="./hocsinh.php" class="taga"><i class="fas fa-user-graduate i_normal "></i><p >Học sinh</p></a></li>
                <li class="li1"><a href="./monhoc.php" class="taga"><i class="fas fa-tags i_normal"></i><p>Môn học</p></a></li>
                <li class="li1"><a href="./thoikhoabieu.php" class="taga"><i class="far fa-calendar-alt i_normal"></i><p>Thời khóa biểu</p></a></li>
                <li class="li1 test"><a href="./hoc.php" class="taga"><i class="fas fa-book i_normal i_to"></i><p class="to">Học</p></a></li>
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
                    <div style="display: flex;">
                        <p style="font-size: 18px; height: 25px ; border-bottom: 2px solid #4c4bfe;  font-weight: 600; margin-right: 30px;"><a href="./hoc.php" style="color: #4c4bfe;">Phân công giảng dạy</a></p>
                        <p style="font-size: 18px; height: 25px ; font-weight: 600; "><a href="./hoc_heso.php">Hệ số tính điểm</a></p>
                    </div>
                    <div class="chucnangchinh">
                        <input type="button" value="Thêm" id="add_btn">
                        <input type="button" value="Sửa" id="update_btn">
                        <input type="button" value="Xóa" id="delete_btn"> 
                        <select name="luachontimkiem" class="luachon" id="sel_search">
                            <option value="TenMon">Môn học</option>
                            <option value="TenLop">Lớp học</option>
                            <option value="TenGV">Giáo viên</option>
                            <option value="NamHoc">Năm học</option>
                        </select>
                        <input type="search" placeholder="Tìm kiếm" id="search">
                    </div>
                </div>
                <div class="content_content">
                    
                    <table class="tenbang" cellspacing="0" width="100%" style="margin-bottom: 5px; width: calc(100%-15px);">
                        <tr class="bangtieude">
                            <th width="5%" >Stt</th>
                            <th width="10%">Lớp học</th>
                            <th width="10%">Môn học</th>
                            <th width="18%">Tên GV</th>
                            <th width="10%">Năm học</th>
                        </tr>
                    </table>
                    <div class="thongtinbang">
                        <table id="table_class" class="bangnd" border="1" cellspacing="0" width="100%">
                            
                            <?php
                                $query = "SELECT * from dayhoc inner join lophoc on lophoc.MaLop = dayhoc.MaLop inner join monhoc on dayhoc.MaMon = monhoc.MaMon inner join giaovien on giaovien.MaGV = dayhoc.MaGV order by NamHoc,TenLop desc";
                                $data_bang = $sql->getdata($query);
                                $i=1;
                                while($row = $data_bang->fetch_assoc()){
                                    echo "
                                        <tr class=\"class noidungbang\">
                                            <td align=\"center\" width=\"5%\" >".$i."</td>
                                            <td align=\"center\" width=\"10%\">".$row['TenLop']."</td>
                                            <td align=\"center\" width=\"10%\">".$row['TenMon']."</td>
                                            <td align=\"center\" width=\"18%\">".$row['TenGV']."</td>
                                            <td align=\"center\" width=\"10%\">".$row['NamHoc']."</td>                                        
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
    <script>   

        document.getElementById('add_btn').onclick = function(){
            document.getElementById('add').style.display = 'block';
            var malop = document.getElementById('MaLop');
            getListMonHoc(malop.value);
        }
        
        document.getElementById('MaLop').onchange = function(){ 
            getListMonHoc(this.value);
        }
        
        
        document.getElementById('add_phancong').onclick = function(){
            var malop = document.getElementById('MaLop');
            var mamon = document.getElementById('MonHoc');
            var infor = document.getElementsByClassName('add_magv_lophoc');
            var magv = radioCheck(infor);
            if(malop.value != ""){
                if(mamon.value == "" || malop.value == "" || magv == ""){
                    document.getElementById('thongbao_chucnang_1').innerHTML = `
                        <h2 style=\"color: rgb(1, 82, 233);\">Thông báo</h2>
                        <p style=\"font-size: 15px; margin-top: 20px;\">Vui lòng nhập đầy đủ thông tin</p>
                    `;
                    document.getElementById('thongbao_chucnang').style.display = 'block';
                }
                else{
                    var get = "MaLop=" + malop.value + "&MaMon=" + mamon.value + "&MaGV=" + magv; 
                    add('add_phancong.php',get);
                    setTimeout(function(){document.getElementById("thongbao_chucnang").style.display = 'none';},1000)
                    setTimeout(function(){ search('timkiem_phancong.php','TenGV',''); }, 300);
                    setTimeout(function(){getListMonHoc(malop.value);},500) 
                }
            }
            else{
                document.getElementById('thongbao_chucnang_1').innerHTML = `
                    <h2 style=\"color: rgb(1, 82, 233);\">Thông báo</h2>
                    <p style=\"font-size: 15px; margin-top: 20px;\">Năm học mới chưa tồn tại lớp học nào <br> Không thể phân công</p>
                `;
                document.getElementById('thongbao_chucnang').style.display = 'block';
            }
        }

        document.getElementById('update_btn').onclick = function(){
            var phancong_monhoc = [];
            var phancong_lop = [];
            var phancong_namhoc = [];
            get_ma(phancong_lop,'update','phân công');
            get_ma1(phancong_monhoc,2);
            get_ma1(phancong_namhoc,4);

            var request = new XMLHttpRequest();

            request.open("get","data_giaovien_phancong.php?TenLop=" + phancong_lop[0] + "&TenMon=" + phancong_monhoc[0] + "&NamHoc=" + phancong_namhoc[0]);
            request.onreadystatechange = function(){
                if(this.readyState === 4 && this.status === 200){
                    document.getElementById('infor_gvcn_table_update').innerHTML = this.responseText;
                }
            }
            
            request.send();                                                             
            
            document.getElementById('update_phancong').onclick = function(){
                
                var infor = document.getElementsByClassName('add_magv_lophoc');
                var magv = radioCheck(infor);
                
                if(magv == ""){
                    document.getElementById('thongbao_chucnang_1').innerHTML = `
                        <h2 style=\"color: rgb(1, 82, 233);\">Thông báo</h2>
                        <p style=\"font-size: 15px; margin-top: 20px;\">Bạn chưa nhập thông tin</p>
                    `;
                    document.getElementById('thongbao_chucnang').style.display = 'block';
                }
                else{
                    var get = "TenLop=" + phancong_lop[0] + "&TenMon=" + phancong_monhoc[0] + "&NamHoc=" + phancong_namhoc + "&MaGV=" + magv; 
                    document.getElementById('update').style.display = 'none';
                    update('update_phancong.php',get);
                    setTimeout(function(){ search('timkiem_phancong.php','TenMon',''); }, 300);                    
                }
            }
        }

        document.getElementById('delete_btn').onclick = function(){
            var phancong_monhoc = [];
            var phancong_lop = [];
            var phancong_namhoc = [];
            get_ma(phancong_lop,'','xóa');
            get_ma1(phancong_monhoc,2);
            get_ma1(phancong_namhoc,4);

            var phancong = [];
            for(var i=0; i<phancong_lop.length;i++){
                phancong[i] = phancong_monhoc[i]+"_"+phancong_lop[i]+"_"+phancong_namhoc[i];
            }

            if(phancong.length>0){
                var a = '';
                for(var i=0;i<phancong.length;i++){
                    a+=`
                        <p style="text-align: left ;font-size: 17px; font-weight: 500; color: #5C7AEA">Xác nhận xóa phân công giảng dạy cho giáo viên <span style="color: #FFB319; font-weight: 600; border-bottom: 1px solid #FFB319">${phancong[i]}</span></p>
                    `;
                }
                document.getElementById('delete_infor').innerHTML = a;
                document.getElementById('delete').style.display = 'block';
                document.getElementById('delete_confirm').onclick = function(){
                    var get = 'Info=';
                    for(var i=0;i<phancong.length;i++){
                        get+=phancong[i];
                        if(i<phancong.length-1)
                            get+=",";
                    }
                    del('delete_phancong.php',get);
                    document.getElementById('delete').style.display = 'none';
                    setTimeout(function(){ search('timkiem_phancong.php','NamHoc',''); }, 300); 
                }
                
            }
             
        }

        

        document.getElementById('search').oninput = function(){
            var sel_search = document.getElementById('sel_search');
            search('timkiem_phancong.php',sel_search.value,this.value);
        }

        document.getElementById('search_gvcn_btn_update').oninput = function(){
            var request = new XMLHttpRequest();
            search_column = document.getElementById('search_gvcn_update').value

            request.open(
                "get", "search_phancong_gv.php?col=" + search_column + "&inf=" + this.value
            );
            request.onreadystatechange = function () {
                if (this.readyState === 4 && this.status === 200) {
                document.getElementById("infor_gvcn_table_update").innerHTML = this.responseText;
                }
            };

            request.send();
        }
        document.getElementById('search_gvcn_btn_add').oninput = function(){
            var request = new XMLHttpRequest();
            search_column = document.getElementById('search_gvcn').value

            request.open(
                "get", "search_phancong_gv.php?col=" + search_column + "&inf=" + this.value
            );
            request.onreadystatechange = function () {
                if (this.readyState === 4 && this.status === 200) {
                document.getElementById("infor_gvcn_table_add").innerHTML = this.responseText;
                }
            };

            request.send();
        }
    </script>

</body>
</html>