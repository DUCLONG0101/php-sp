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
            <div class="box_fun" style="width: 800px">
                <span class="close"><i class="fas fa-times"></i></span>
                <h2>Sửa hệ số điểm</h2>
                <form class="" action="" method="post">
                <div class="box_content" style="width: 100%">
                        <div class="add_ma">
                            <label for="Diem15">Điểm 15 phút</label>
                            <input style="margin-left: 10px; padding-left: 20px;" type="number" name="malopadd" id="Diem15">
                        </div>
                        <div class="add_pass">
                            <label for="Diem1Tiet">Điểm 1 tiết</label>
                            <input style="margin-left: 10px; padding-left: 20px;" type="number" name="tenlopadd" id="Diem1Tiet">
                        </div>
                        <div class="add_gv">
                            <label for="DiemGK">Điểm giữa kỳ</label>
                            <input style="margin-left: 10px; padding-left: 20px;" type="number" name="magvadd" id="DiemGK">
                        </div>
                        <div class="add_gv">
                            <label for="DiemCK">Điểm cuối kỳ</label>
                            <input style="margin-left: 10px; padding-left: 20px;" type="number" name="magvadd" id="DiemCK">
                        </div>                
                        
                    </div>  
                    <div class="button">
                        <button type="button" id="update_heso">Sửa</button>
                    </div>
                                       
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
                    <p style="font-size: 18px; height: 25px ;font-weight: 600; margin-right: 30px;"><a href="./hoc.php" >Phân công giảng dạy</a></p>
                        <p style="font-size: 18px; height: 25px ;border-bottom: 2px solid #4c4bfe; font-weight: 600; "><a href="./hoc_heso.php" style="color: #4c4bfe;">Hệ số tính điểm</a></p>
                    </div>
                    <div class="button">
                        <input type="button" id="update_btn" value="Sửa">
                    </div>
                </div>
                <div class="content_content">
                    
                    <table class="tenbang" cellspacing="0" width="100%" style="margin-bottom: 5px; width: calc(100%-15px);">
                        <tr class="bangtieude">
                            <th width="5%" >Điểm 15 phút</th>
                            <th width="10%">Điểm 1 tiết</th>
                            <th width="10%">Điểm giữa kỳ</th>
                            <th width="18%">Điểm cuối kỳ</th>
                        </tr>
                    </table>
                    <div class="thongtinbang">
                        <table id="table_class" class="bangnd" border="1" cellspacing="0" width="100%">
                            
                            <?php
                                $query = "SELECT * from hesotinhdiem";
                                $data_bang = $sql->getdata($query);
                                $i=1;
                                while($row = $data_bang->fetch_assoc()){
                                    echo "
                                        <tr class=\"class noidungbang\">
                                            <td align=\"center\" width=\"5%\" >".$row['Diem15']."</td>
                                            <td align=\"center\" width=\"10%\">".$row['Diem1Tiet']."</td>
                                            <td align=\"center\" width=\"10%\">".$row['DiemGK']."</td>
                                            <td align=\"center\" width=\"18%\">".$row['DiemCK']."</td>                                         
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
        document.getElementById('update_btn').onclick = function(){
            document.getElementById('update').style.display = 'block';
            document.getElementById('update_heso').onclick = function(){
                var diem15 = document.getElementById('Diem15');
                var diem1tiet = document.getElementById('Diem1Tiet');
                var diemgk = document.getElementById('DiemGK');
                var diemck = document.getElementById('DiemCK');
            
                if(diem15.value == "" && diem1tiet.value == "" && diemgk.value == "" && diemck.value == ""){
                    document.getElementById('thongbao_chucnang_1').innerHTML = `
                        <h2 style=\"color: rgb(1, 82, 233);\">Thông báo</h2>
                        <p style=\"font-size: 15px; margin-top: 20px;\">Bạn chưa nhập thông tin</p>
                    `;
                    document.getElementById('thongbao_chucnang').style.display = 'block';
                }
                else{
                    if(diem15.value <= 0  || diem1tiet.value <= 0  || diemgk.value <= 0  || diemck.value <= 0 ){
                        document.getElementById('thongbao_chucnang_1').innerHTML = `
                            <h2 style=\"color: rgb(1, 82, 233);\">Thông báo</h2>
                            <p style=\"font-size: 15px; margin-top: 20px;\">Hệ số điểm phải lớn hơn 0</p>
                        `;
                        document.getElementById('thongbao_chucnang').style.display = 'block';
                    }
                    else{
                        var get = "Diem15=" + diem15.value + "&Diem1Tiet=" + diem1tiet.value + "&DiemGK=" + diemgk.value +  "&DiemCK=" + diemck.value ; 
                        document.getElementById('update').style.display = 'none';
                        update('update_heso.php',get);
                        setTimeout(function(){ search('loc_hoso.php','',''); }, 300); 
                    }
                                       
                }
            }
        }
    </script>

</body>
</html>