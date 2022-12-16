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
    <div class="hidden" id="add">
        <div class="bk_mo ">
            <div class="box_fun">
                <span class="close"><i class="fas fa-times"></i></span>
                <h2>Thêm mới năm học</h2>
                <form class="" action="" method="post">
                    <div class="box_content">
                        <?php
                            $kthk2 = $sql->getdata("SELECT * from namhoc_hocky where NamHoc = '$namhoc_hientai' and HocKy = '2'")->fetch_assoc()['NgayKT'];
                            $a = strtotime($kthk2);
                            $nam1 = (int)date("Y",$a);
                            $namhoc_sau = $nam1."-".($nam1 +1);
                        ?>
                        <div class="add_ma" style="width: 100%">
                            <label for="MaLop">Năm học </label>
                            <input type="text" name="malopadd" id="NamHoc" disabled value="<?php echo $namhoc_sau?>" style="border: none;">
                        </div>
                        <div class="add_pass">
                            <label for="TenLop">Bắt đầu HK1 <span>*</span></label>
                            <input type="date" name="tenlopadd" id="BDHK1">
                        </div>
                        <div class="add_pass">
                            <label for="TenLop">Kết thúc HK1 <span>*</span></label>
                            <input type="date" name="tenlopadd" id="KTHK1">
                        </div>
                        <div class="add_pass">
                            <label for="TenLop">Bắt đầu HK2 <span>*</span></label>
                            <input type="date" name="tenlopadd" id="BDHK2">
                        </div>
                        <div class="add_pass">
                            <label for="TenLop">kết thuc HK2 <span>*</span></label>
                            <input type="date" name="tenlopadd" id="KTHK2">
                        </div>
                    </div>
                    <div class="button">
                        <button type="button" id="add_namhoc">Thêm</button>
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
                <h2>Sửa thông tin năm học</h2>
                <form class="" action="" method="post">
                    <div class="box_content">
                        <div class="add_ma">
                            <label for="MaLop">Bắt đầu HK1</label>
                            <input type="date" name="malopadd" id="BDHK1_update">
                        </div>
                        <div class="add_pass">
                            <label for="TenLop">Kết thúc HK1</label>
                            <input type="date" name="tenlopadd" id="KTHK1_update">
                        </div>
                        <div class="add_pass">
                            <label for="TenLop">Bắt đâu HK2</label>
                            <input type="date" name="tenlopadd" id="BDHK2_update">
                        </div>
                        <div class="add_pass">
                            <label for="TenLop">Kết thúc HK2</label>
                            <input type="date" name="tenlopadd" id="KTHK2_update">
                        </div>
                    </div>
                    
                    <div class="button">
                        <button type="button" id="update_namhoc">Sửa</button>
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
                <li class="li1 test"><a href="./namhoc.php" class="taga"><i class="fas fa-vote-yea i_normal i_to"></i><p class="to">Năm học</p></a></li>
                <li class="li1t"><a href="./lophoc.php" class="taga"><i class="fas fa-users i_normal"></i><p>Lớp học</p></a></li>
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
                    </div>
                    <div class="timkiem">
                        <select name="luachontimkiem" class="luachon" id="sel_search">
                            <option value="MaLop">Năm học</option>
                        </select>
                        <input type="search" placeholder="Tìm kiếm" id="search">
                    </div>
                </div>
                <div class="content_content">
                    <table class="tenbang" cellspacing="0" width="100%" style="margin-bottom: 5px; width: calc(100%-15px);">
                        <tr class="bangtieude">
                            <th width="5%" >Stt</th>
                            <th width="12%">Năm học</th>
                            <th width="15%">Bắt đầu HK1</th>
                            <th width="15%">Kết thúc HK1</th>
                            <th width="15%">Bắt đầu HK2</th>
                            <th width="15%">Kết thúc HK2</th>                 
                        </tr>
                    </table>
                    <div class="thongtinbang">
                        <table id="table_class" class="bangnd" border="1" cellspacing="0" width="100%">
                            
                            <?php
                                $query = "SELECT * from namhoc_hocky inner join NamHoc on namhoc.NamHoc = namhoc_hocky.NamHoc";
                                $data_lophoc_bang = $sql->getdata($query);
                                $i=1;
                                $namhoc_namhoc = $sql->getdata($query)->fetch_assoc()['NamHoc'];
                                $chuoi_namhoc = "";
                                while($row = $data_lophoc_bang->fetch_assoc()){
                                    if($namhoc_namhoc == $row['NamHoc']){
                                        
                                        if($row['HocKy'] == '1'){
                                            $chuoi_namhoc = "
                                            <tr class=\"class noidungbang\">
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
                                            <tr class=\"class noidungbang\">
                                                <td align=\"center\" width=\"5%\" >".$i."</td>
                                                <td align=\"center\" width=\"12%\">".$row['NamHoc']."</td>
                                                <td align=\"center\" width=\"15%\">".$row['NgayBD']."</td>
                                                <td align=\"center\" width=\"15%\">".$row['NgayKT']."</td>
                                            ";
                                            // echo $chuoi_namhoc;
                                        }
                                    }
                                    
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
        document.getElementById('add_namhoc').onclick = function(){
            var BD1 = document.getElementById('BDHK1');
            var KT1 = document.getElementById('KTHK1');
            var BD2 = document.getElementById('BDHK2');
            var KT2 = document.getElementById('KTHK2');
            var namhoc = document.getElementById('NamHoc');
            if(BD1.value == "" || KT1.value == "" || BD2.value == "" || KT2.value == ""){
                document.getElementById('thongbao_chucnang_1').innerHTML = `
                    <h2 style=\"color: rgb(1, 82, 233);\">Thông báo</h2>
                    <p style=\"font-size: 15px; margin-top: 20px;\">Bạn chưa nhập thông tin</p>
                `;
                document.getElementById('thongbao_chucnang').style.display = 'block';
            }
            else{
                var get = "NamHoc=" + namhoc.value + "&BD1=" + BD1.value +  "&KT1=" + KT1.value + "&BD2=" + BD2.value + "&KT2=" + KT2.value; 
                document.getElementById('add').style.display = 'none';
                add('add_namhoc.php',get);
                setTimeout(function(){ search('timkiem_namhoc.php','NamHoc',''); }, 300); 
            }
             
        }

        document.getElementById('update_btn').onclick = function(){
            var lophoc = [];
            get_ma(lophoc,update_box,'sửa');
            document.getElementById('update_namhoc').onclick = function(){
                var BD1 = document.getElementById('BDHK1_update');
                var KT1 = document.getElementById('KTHK1_update');
                var BD2 = document.getElementById('BDHK2_update');
                var KT2 = document.getElementById('KTHK2_update');
                
                if(BD1.value == "" && KT1.value == "" && BD2.value == "" && KT2.value == "" ){
                    document.getElementById('thongbao_chucnang_1').innerHTML = `
                        <h2 style=\"color: rgb(1, 82, 233);\">Thông báo</h2>
                        <p style=\"font-size: 15px; margin-top: 20px;\">Bạn chưa nhập thông tin</p>
                    `;
                    document.getElementById('thongbao_chucnang').style.display = 'block';
                }
                else{
                    var get = "NamHoc=" + lophoc[0] + "&BD1=" + BD1.value + "&KT1=" + KT1.value +  "&BD2=" + BD2.value + "&KT2=" + KT2.value; 
                    document.getElementById('update').style.display = 'none';
                    update('update_namhoc.php',get);
                    setTimeout(function(){ search('timkiem_namhoc.php','NamHoc',''); }, 300);                    
                }
            }
        }

        

        document.getElementById('search').oninput = function(){
            var sel_search = document.getElementById('sel_search');
            search('timkiem_namhoc.php',sel_search.value,this.value);
        }
    </script>

</body>
</html>