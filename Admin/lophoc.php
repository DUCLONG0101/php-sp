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
                <form class="" action="./dangxuat.php" method="post">
                    
                    <div class="submit">
                        <button type="button" id="delete_confirm">Xóa</button>
                    </div>          
                </form>
            </div>
        </div>
    </div>
    <div class="hidden" id="totnghiep_box">
        <div class="bk_mo ">
            <div class="box_fun">
                <span class="close"><i class="fas fa-times"></i></span>
                <h2>Thông báo </h2>
                <div id="totnghiep_infor">
                    
                </div>
                <form class="" action="./dangxuat.php" method="post">
                    
                    <div class="submit">
                        <button type="button" id="totnghiep_confirm">Xác nhận</button>
                    </div>          
                </form>
            </div>
        </div>
    </div>
  
    <div class="hidden" id="add">
        <div class="bk_mo ">
            <div class="box_fun">
                <span class="close"><i class="fas fa-times"></i></span>
                <h2>Thêm mới lớp học</h2>
                <form class="" action="" method="post">
                    <div class="box_content">
                        <div class="add_ma">
                            <label for="MaLop">Mã Lớp <span>*</span></label>
                            <input type="text" name="malopadd" id="MaLop">
                        </div>
                        <div class="add_pass">
                            <label for="TenLop">Tên lớp <span>*</span></label>
                            <input type="text" name="tenlopadd" id="TenLop">
                        </div>
                        
                        <div class="add_gv">
                            <label for="GhiChu">Khối </label>
                            <select name="namhoc" id="Khoi">
                                <?php
                                    $query_namhoc = "select * from khoi";
                                    $data_namhoc = $sql->getdata($query_namhoc);
                                    while($row = $data_namhoc->fetch_assoc()){
                                        echo "<option value=\"".$row['Khoi']."\">".$row['Khoi']."</option>";
                                    }
                                ?>
                            </select>
                        </div>
                       
                        
                    </div>
                    <div class="thongtingiaovien">
                        <div class="giaovienchunhiem">
                            <label for="">Giáo viên chủ nhiệm<span style="color: red;"> *</span></label>
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
                                    <th width="35%">Số điện thoại</th>
                                    <th width="15%">Lựa chọn</th>
                                </tr>
                            </thead>
                            <tbody id="infor_gvcn_table_add">
                                
                                <?php
                                    $query_giaovien = "SELECT MaGV, TenGV, DienThoai from giaovien";
                                    $data_giaovien = $sql->getdata($query_giaovien);
                                    while($row = $data_giaovien->fetch_assoc()){
                                        echo "
                                            <tr>
                                                <td width=\"15%\">".$row['MaGV']."</td>
                                                <td width=\"35%\">".$row['TenGV']."</td>
                                                <td width=\"35%\">".$row['DienThoai']."</td>
                                                <td width=\"15%\"><input type=\"radio\" name=\"MaGV\" class=\"add_magv_lophoc\" value=\"".$row['MaGV']."\"></td>
                                            </tr>
                                        ";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="button">
                        <button type="button" id="add_lophoc">Thêm</button>
                    </div>
                    <p>Lưu ý: thông tin có chứa dấu (*) bắt buộc phải điền</p>                
                </form>
            </div>
        </div>
    </div>
    <div class="hidden" id="lenlop_box">
        <div class="bk_mo ">
            <div class="box_fun">
                <span class="close"><i class="fas fa-times"></i></span>
                <h2 id="xetlenlop1"></h2>
                <form class="" action="" method="post">
                    <div class="box_content">
                        <div class="add_ma">
                            <label for="MaLop">Mã lớp <span>*</span></label>
                            <input type="text" name="malopadd" id="MaLenLop">
                        </div>
                        <br>
                        <div class="add_ma">
                            <label for="MaLop">Tên lớp<span>*</span></label>
                            <input type="text" name="malopadd" id="TenLenLop">
                        </div>
                    </div>
                    <div class="thongtingiaovien">
                        <div class="giaovienchunhiem">
                            <label for="">Giáo viên chủ nhiệm</label>
                            <div class="search_gvcn">
                                <select name="" id="search_gvcn_lenlop">
                                    <option value="MaGV">Mã giáo viên</option>
                                    <option value="TenGV">Họ tên</option>
                                    <option value="DienThoai">Số ĐT</option>
                                </select>
                                <input type="text" placeholder="Tìm kiếm "  id="search_gvcn_btn_lenlop">
                            </div>
                        </div>
                        
                        <table >
                            <thead>
                                <tr>
                                    <th width="15%">Mã GV</th>
                                    <th width="35%">Họ tên</th>
                                    <th width="35%">Số điện thoại</th>
                                    <th width="15%">Lựa chọn</th>
                                </tr>
                            </thead>
                            <tbody  id="infor_gvcn_table_lenlop">
                                
                                <?php
                                    $query_giaovien = "SELECT MaGV, TenGV, DienThoai from giaovien";
                                    $data_giaovien = $sql->getdata($query_giaovien);
                                    while($row = $data_giaovien->fetch_assoc()){
                                        echo "
                                            <tr>
                                                <td width=\"15%\">".$row['MaGV']."</td>
                                                <td width=\"35%\">".$row['TenGV']."</td>
                                                <td width=\"35%\">".$row['DienThoai']."</td>
                                                <td width=\"15%\"><input type=\"radio\" name=\"MaGV\" class=\"add_magv_lophoc\" value=\"".$row['MaGV']."\"></td>
                                            </tr>
                                        ";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="button">
                        <button type="button" id="lenlop_lophoc">Xác nhận</button>
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
                <h2>Sửa thông tin lớp học</h2>
                <form class="" action="" method="post">
                    <div class="box_content">
                        <div class="add_ma">
                            <label for="MaLop">Mã Lớp</label>
                            <input type="text" name="malopadd" id="MaLop_update">
                        </div>
                        
                        <div class="add_pass">
                            <label for="TenLop">Tên lớp</label>
                            <input type="text" name="tenlopadd" id="TenLop_update">
                        </div>
                        
                    </div>
                    <div class="thongtingiaovien">
                        <div class="giaovienchunhiem">
                            <label for="">Giáo viên chủ nhiệm</label>
                            <div class="search_gvcn">
                                <select name="" id="search_gvcn_update">
                                    <option value="MaGV">Mã giáo viên</option>
                                    <option value="TenGV">Họ tên</option>
                                    <option value="DienThoai">Số ĐT</option>
                                </select>
                                <input type="text" placeholder="Tìm kiếm "  id="search_gvcn_btn_update">
                            </div>
                        </div>
                        
                        <table >
                            <thead>
                                <tr>
                                    <th width="15%">Mã GV</th>
                                    <th width="35%">Họ tên</th>
                                    <th width="35%">Số điện thoại</th>
                                    <th width="15%">Lựa chọn</th>
                                </tr>
                            </thead>
                            <tbody  id="infor_gvcn_table_update">
                                
                                <?php
                                    $query_giaovien = "SELECT MaGV, TenGV, DienThoai from giaovien";
                                    $data_giaovien = $sql->getdata($query_giaovien);
                                    while($row = $data_giaovien->fetch_assoc()){
                                        echo "
                                            <tr>
                                                <td width=\"15%\">".$row['MaGV']."</td>
                                                <td width=\"35%\">".$row['TenGV']."</td>
                                                <td width=\"35%\">".$row['DienThoai']."</td>
                                                <td width=\"15%\"><input type=\"radio\" name=\"MaGV\" class=\"update_magv_lophoc\" value=\"".$row['MaGV']."\"></td>
                                            </tr>
                                        ";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="button">
                        <button type="button" id="update_lophoc">Sửa</button>
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
                <li class="li1 test"><a href="./lophoc.php" class="taga"><i class="fas fa-users i_normal i_to"></i></i><p class="to">Lớp học</p></a></li>
                <li class="li1"><a href="./giaovien.php" class="taga"><i class="fas fa-chalkboard-teacher i_normal"></i><p>Giáo viên</p></a></li>
                <li class="li1"><a href="./hocsinh.php" class="taga"><i class="fas fa-user-graduate i_normal"></i><p>Học sinh</p></a></li>
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
                        <input type="button" value="Vào lớp" id="vaolop">
                        <input type="button" value="Xét lên lớp" id="lenlop">
                        <input type="button" value="Xét tốt nghiệp" id="totnghiep">
                    </div>
                    <div class="timkiem">
                        <select name="luachontimkiem" class="luachon" id="sel_search">
                            <option value="MaLop">Mã lớp</option>
                            <option value="TenLop">Tên lớp</option>
                            <option value="TenGV">Giáo viên</option>
                            <option value="SiSo">Sĩ số</option>
                            <option value="NamHoc">Năm học</option>
                            <option value="GhiChu">Ghi chú</option>
                        </select>
                        <input type="search" placeholder="Tìm kiếm" id="search">
                    </div>
                </div>
                <div class="content_content">
                <table class="tenbang" cellspacing="0" width="100%" style="margin-bottom: 5px; width: calc(100%-15px);">
                        <tr class="bangtieude">
                            <th width="5%" >Stt</th>
                            <th width="12%">Mã lớp</th>
                            <th width="15%">Tên lớp</th>
                            <th width="25%">Giáo viên</th>
                            <th width="7%">Sĩ số</th>
                            <th width="12%">Năm học</th>
                            <th width="15%">Ghi chú</th>                            
                        </tr>
                    </table>
                    <div class="thongtinbang">
                        <table id="table_class" class="bangnd" border="1" cellspacing="0" width="100%">
                            
                            <?php
                                $query = "SELECT MaLop, TenLop, TenGV, SiSo, NamHoc, lophoc.GhiChu from lophoc inner join giaovien on lophoc.MaGV = giaovien.MaGV order by lophoc.GhiChu asc";
                                $data_lophoc_bang = $sql->getdata($query);
                                $i=1;
                                while($row = $data_lophoc_bang->fetch_assoc()){
                                    echo "
                                        <tr class=\"class noidungbang\">
                                            <td align=\"center\" width=\"5%\" >".$i."</td>
                                            <td align=\"center\" width=\"12%\">".$row['MaLop']."</td>
                                            <td align=\"center\" width=\"15%\">".$row['TenLop']."</td>
                                            <td align=\"center\" width=\"25%\">".$row['TenGV']."</td>
                                            <td align=\"center\" width=\"7%\">".$row['SiSo']."</td>
                                            <td align=\"center\" width=\"12%\">".$row['NamHoc']."</td>
                                            <td align=\"center\" width=\"15%\">".$row['GhiChu']."</td>
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
        if(isset($_GET['Khoi'])){
            echo "<script>search('timkiem_lophoc.php','TenLop','".$_GET['Khoi']."');</script>";
        }
    ?>
    <script>   
          
        
        
        document.getElementById('add_lophoc').onclick = function(){
            var malop = document.getElementById('MaLop');
            var tenlop = document.getElementById('TenLop');
            var khoi = document.getElementById('Khoi');
            var infor = document.getElementsByClassName('add_magv_lophoc');
            var magv = radioCheck(infor);
            var get = "MaLop=" + malop.value + "&TenLop=" + tenlop.value + "&Khoi=" + khoi.value + "&MaGV=" + magv; 
            document.getElementById('add').style.display = 'none';
            add('add_lophoc.php',get);
            setTimeout(function(){ search('timkiem_lophoc.php','MaLop',''); }, 300);  
        }

        document.getElementById('update_btn').onclick = function(){
            var lophoc = [];
            get_ma(lophoc,update_box,'sửa');
            document.getElementById('update_lophoc').onclick = function(){
                var malop = document.getElementById('MaLop_update');
                var tenlop = document.getElementById('TenLop_update');
                var ghichu = document.getElementById('GhiChu_update');
                var infor = document.getElementsByClassName('update_magv_lophoc');
                var magv = radioCheck(infor);
                
                if(malop.value == "" && tenlop.value == "" && magv == ""){
                    document.getElementById('thongbao_chucnang_1').innerHTML = `
                        <h2 style=\"color: rgb(1, 82, 233);\">Thông báo</h2>
                        <p style=\"font-size: 15px; margin-top: 20px;\">Bạn chưa nhập thông tin</p>
                    `;
                    document.getElementById('thongbao_chucnang').style.display = 'block';
                }
                else{
                    var get = "MaLopCu=" + lophoc[0] + "&MaLop=" + malop.value + "&TenLop=" + tenlop.value + "&MaGV=" + magv; 
                    document.getElementById('update').style.display = 'none';
                    update('update_lophoc.php',get);
                    setTimeout(function(){ search('timkiem_lophoc.php','MaLop',''); }, 300);                    
                }
            }
        }

        document.getElementById('delete_btn').onclick = function(){
            var lophoc = [];
            get_ma(lophoc,'','xóa');

            if(lophoc.length>0){
                var a = '';
                for(var i=0;i<lophoc.length;i++){
                    a+=`
                        <p style="text-align: left ;font-size: 17px; font-weight: 500; color: #5C7AEA">Xác nhận xóa lớp học có mã là <span style="color: #FFB319; font-weight: 600; border-bottom: 1px solid #FFB319">${lophoc[i]}</span></p>
                    `;
                }
                document.getElementById('delete_infor').innerHTML = a;
                document.getElementById('delete').style.display = 'block';
                document.getElementById('delete_confirm').onclick = function(){
                    var get = 'MaLop=';
                    for(var i=0;i<lophoc.length;i++){
                        get+=lophoc[i];
                        if(i<lophoc.length-1)
                            get+="_";
                    }
                    del('delete_lophoc.php',get);
                    document.getElementById('delete').style.display = 'none';
                    setTimeout(function(){ search('timkiem_lophoc.php','MaLop',''); }, 300); 
                }
                
            }
             
        }

        document.getElementById('search').oninput = function(){
            var sel_search = document.getElementById('sel_search');
            search('timkiem_lophoc.php',sel_search.value,this.value);
        }
        console.log(localhost);

        document.getElementById('vaolop').onclick = function(){
            var vaolop = [];
            get_ma(vaolop,'','vào lớp');
            if(vaolop.length>0){
                window.location.href = `http://${localhost}/QuanLyHocSinh_Admin/hocsinh.php?VaoLop=`+vaolop[0]+"";
            }
        }

        var search_gvcn = document.getElementById('search_gvcn_btn_add');
        search_gvcn.oninput = function(){
            var search_column = document.getElementById('search_gvcn').value;
            var request = new XMLHttpRequest();

            request.open("get","search_gvcn.php?col=" + search_column + "&inf=" + this.value);
            request.onreadystatechange = function(){
                if(this.readyState === 4 && this.status === 200){
                    document.getElementById('infor_gvcn_table_add').innerHTML = this.responseText;
                }
            }
            
            request.send();
        }

        var search_gvcn = document.getElementById('search_gvcn_btn_update');
        search_gvcn.oninput = function(){
            var search_column = document.getElementById('search_gvcn_update').value;
            var request = new XMLHttpRequest();

            request.open("get","search_gvcn.php?col=" + search_column + "&inf=" + this.value);
            request.onreadystatechange = function(){
                if(this.readyState === 4 && this.status === 200){
                    document.getElementById('infor_gvcn_table_update').innerHTML = this.responseText;
                }
            }
            
            request.send();
        }
        
        var search_gvcn_lenlop = document.getElementById('search_gvcn_btn_lenlop');
        search_gvcn_lenlop.oninput = function(){
            var search_column = document.getElementById('search_gvcn_lenlop').value;
            var request = new XMLHttpRequest();

            request.open("get","search_gvcn.php?col=" + search_column + "&inf=" + this.value);
            request.onreadystatechange = function(){
                if(this.readyState === 4 && this.status === 200){
                    document.getElementById('infor_gvcn_table_lenlop').innerHTML = this.responseText;
                }
            }
            
            request.send();
        }

        document.getElementById('lenlop').onclick = function(){
            var lophoc = [];
            get_ma(lophoc,'','xét lên lớp');

            if(lophoc.length>0){
                var a = '';
                document.getElementById('xetlenlop1').innerHTML = "Xét lên lớp cho lớp học có mã là " + lophoc[0];
                
                document.getElementById('lenlop_box').style.display = 'block';
                document.getElementById('lenlop_lophoc').onclick = function(){
                    var infor = document.getElementsByClassName('add_magv_lophoc');
                    var magv = radioCheck(infor);
                    var malenlop = document.getElementById('MaLenLop');
                    var tenlenlop = document.getElementById('TenLenLop');
                    var get = 'MaLop=' + lophoc[0] + '&MaLenLop=' + malenlop.value + '&TenLenLop=' + tenlenlop.value + '&MaGV=' + magv;
                    
                    del('lenlop.php',get);
                    document.getElementById('lenlop_box').style.display = 'none';
                    setTimeout(function(){ search('timkiem_lophoc.php','MaLop',''); }, 1000); 
                }
                
            }
             
        }

        document.getElementById('totnghiep').onclick = function(){
                document.getElementById('totnghiep_box').style.display = 'block';
                document.getElementById('totnghiep_infor').innerHTML = "<p style=\"color: #4979ff; font-weight: 600; font-size: 18px\">Xét lên lớp cho học sinh khối 9</p>";
                document.getElementById('totnghiep_box').style.display = 'block';
                document.getElementById('totnghiep_confirm').onclick = function(){
                    var get = '';
                    del('totnghiep.php',get);
                    document.getElementById('totnghiep_box').style.display = 'none';
                    setTimeout(function(){ search('timkiem_lophoc.php','MaLop',''); }, 1000); 
                }
                
            
             
        }
    </script>

</body>
</html>