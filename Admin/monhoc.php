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
                <h2>Thêm mới môn học</h2>
                <form class="" action="" method="post">
                    <div class="box_content">
                        <div class="add_ma">
                            <label for="MaMon">Mã môn <span>*</span></label>
                            <input type="text" name="malopadd" id="MaMon">
                        </div>
                        <div class="add_pass">
                            <label for="TenMon">Tên môn <span>*</span></label>
                            <input type="text" name="tenlopadd" id="TenMon">
                        </div>
                        <div class="add_gt">
                            <label for="Khoi">Khối <span>*</span></label>
                            <select name="Khoi" id="Khoi">
                                <?php
                                    $query_khoi = "select * from khoi";
                                    $data_khoi = $sql->getdata($query_khoi);
                                    while($row = $data_khoi->fetch_assoc()){
                                        echo "<option value=\"".$row['Khoi']."\">".$row['Khoi']."</option>";
                                    }
                                ?>
                            </select>
                        </div>  
                        <div class="add_gt">
                            <label for="BoMon">Bộ môn <span>*</span></label>
                            <select name="BoMon" id="BoMon">
                                <?php
                                    $query_bomon = "select * from bomon";
                                    $data_bomon = $sql->getdata($query_bomon);
                                    while($row = $data_bomon->fetch_assoc()){
                                        echo "<option value=\"".$row['MaBoMon']."\">".$row['TenBoMon']."</option>";
                                    }
                                ?>
                            </select>
                        </div>  

                        
                    </div>
                    
                    <div class="button">
                        <button type="button" id="add_monhoc">Thêm</button>
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
                <h2>Sửa thông tin môn học</h2>
                <form class="" action="" method="post">
                <div class="box_content">
                        <div class="add_ma">
                            <label for="MaMon_update">Mã môn</label>
                            <input type="text" name="malopadd" id="MaMon_update">
                        </div>
                        <div class="add_pass">
                            <label for="TenMon_update">Tên môn</label>
                            <input type="text" name="tenlopadd" id="TenMon_update">
                        </div>
                        <div class="add_gt">
                            <label for="Khoi_update">Khối</label>
                            <select name="Khoi_update" id="Khoi_update">
                                <option value=""></option>
                                <?php
                                    $query_khoi = "select * from khoi";
                                    $data_khoi = $sql->getdata($query_khoi);
                                    while($row = $data_khoi->fetch_assoc()){
                                        echo "<option value=\"".$row['Khoi']."\">".$row['Khoi']."</option>";
                                    }
                                ?>
                            </select>
                        </div>  
                        <div class="add_gt">
                            <label for="BoMon_update">Bộ môn <span>*</span></label>
                            <select name="BoMon_update" id="BoMon_update">
                                <option value=""></option>
                                <?php
                                    $query_bomon = "select * from bomon";
                                    $data_bomon = $sql->getdata($query_bomon);
                                    while($row = $data_bomon->fetch_assoc()){
                                        echo "<option value=\"".$row['MaBoMon']."\">".$row['TenBoMon']."</option>";
                                    }
                                ?>
                            </select>
                        </div>                     
                        
                    </div>  
                    <div class="button">
                        <button type="button" id="update_monhoc">Sửa</button>
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
                <li class="li1 "><a href="./giaovien.php" class="taga"><i class="fas fa-chalkboard-teacher i_normal"></i><p>Giáo viên</p></a></li>
                <li class="li1 "><a href="./hocsinh.php" class="taga"><i class="fas fa-user-graduate i_normal "></i><p >Học sinh</p></a></li>
                <li class="li1 test"><a href="./monhoc.php" class="taga"><i class="fas fa-tags i_normal i_to"></i><p class="to">Môn học</p></a></li>
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
                    </div>
                    <div class="timkiem">
                        <select name="luachontimkiem" class="luachon" id="sel_search">
                            <option value="MaMon">Mã môn</option>
                            <option value="TenMon">Tên môn</option>
                            <option value="Khoi">Khối</option>
                            <option value="TenBoMon">Tên bộ môn</option>
                        </select>
                        <input type="search" placeholder="Tìm kiếm" id="search">
                    </div>
                </div>
                <div class="content_content">
                    
                    <table class="tenbang" cellspacing="0" width="100%" style="margin-bottom: 5px; width: calc(100%-15px);">
                        <tr class="bangtieude">
                            <th width="8%" >Stt</th>
                            <th width="15%">Mã môn</th>
                            <th width="30%">Tên môn</th>
                            <th width="15%">Khối</th>
                            <th width="30%">Bộ môn</th>
                        </tr>
                    </table>
                    <div class="thongtinbang">
                        <table id="table_class" class="bangnd" border="1" cellspacing="0" width="100%">
                            
                            <?php
                                $query = "SELECT * from monhoc inner join bomon on monhoc.MaBoMon = bomon.MaBoMon";
                                $data_monhoc_bang = $sql->getdata($query);
                                $i=1;
                                while($row = $data_monhoc_bang->fetch_assoc()){
                                    echo "
                                        <tr class=\"class noidungbang\">
                                            <td align=\"center\" width=\"8%\" >".$i."</td>
                                            <td align=\"center\" width=\"15%\">".$row['MaMon']."</td>
                                            <td align=\"center\" width=\"30%\">".$row['TenMon']."</td>
                                            <td align=\"center\" width=\"15%\">".$row['Khoi']."</td>                                      
                                            <td align=\"center\" width=\"30%\">".$row['TenBoMon']."</td>                                      
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
        
        
        
        document.getElementById('add_monhoc').onclick = function(){
            var mamon = document.getElementById('MaMon');
            var tenmon = document.getElementById('TenMon');
            var khoi = document.getElementById('Khoi');
            var bomon = document.getElementById('BoMon');
            var get = "MaMon=" + mamon.value + "&TenMon=" + tenmon.value +  "&Khoi=" + khoi.value +  "&BoMon=" + bomon.value; 
            
            document.getElementById('add').style.display = 'none';
            add('add_monhoc.php',get);
            setTimeout(function(){ search('timkiem_monhoc.php','MaMon',''); }, 300);  
        }

        document.getElementById('update_btn').onclick = function(){
            var monhoc = [];
            get_ma(monhoc,update_box,'sửa');
            document.getElementById('update_monhoc').onclick = function(){
                var mamon = document.getElementById('MaMon_update');
                var tenmon = document.getElementById('TenMon_update');
                var khoi = document.getElementById('Khoi_update');
                var bomon = document.getElementById('BoMon_update');
            
                if(mamon.value == "" && tenmon.value == "" && khoi.value == "" && bomon.value == ""){
                    document.getElementById('thongbao_chucnang_1').innerHTML = `
                        <h2 style=\"color: rgb(1, 82, 233);\">Thông báo</h2>
                        <p style=\"font-size: 15px; margin-top: 20px;\">Bạn chưa nhập thông tin</p>
                    `;
                    document.getElementById('thongbao_chucnang').style.display = 'block';
                }
                else{
                    var get = "MaMonCu=" + monhoc[0] + "&MaMon=" + mamon.value + "&TenMon=" + tenmon.value +  "&Khoi=" + khoi.value + "&BoMon=" + bomon.value; 
                    document.getElementById('update').style.display = 'none';
                    update('update_monhoc.php',get);
                    setTimeout(function(){ search('timkiem_monhoc.php','MaMon',''); }, 300);                    
                }
            }
        }

        document.getElementById('delete_btn').onclick = function(){
            var monhoc = [];
            get_ma(monhoc,'','xóa');

            if(monhoc.length>0){
                var a = '';
                for(var i=0;i<monhoc.length;i++){
                    a+=`
                        <p style="text-align: left ;font-size: 17px; font-weight: 500; color: #5C7AEA">Xác nhận xóa học sinh có mã là <span style="color: #FFB319; font-weight: 600; border-bottom: 1px solid #FFB319">${monhoc[i]}</span></p>
                    `;
                }
                document.getElementById('delete_infor').innerHTML = a;
                document.getElementById('delete').style.display = 'block';
                document.getElementById('delete_confirm').onclick = function(){
                    var get = 'MaMon=';
                    for(var i=0;i<monhoc.length;i++){
                        get+=monhoc[i];
                        if(i<monhoc.length-1)
                            get+="_";
                    }
                    del('delete_monhoc.php',get);
                    document.getElementById('delete').style.display = 'none';
                    setTimeout(function(){ search('timkiem_monhoc.php','MaMon',''); }, 300); 
                }
                
            }
             
        }

        document.getElementById('search').oninput = function(){
            var sel_search = document.getElementById('sel_search');
            search('timkiem_monhoc.php',sel_search.value,this.value);
        }
    </script>

</body>
</html>