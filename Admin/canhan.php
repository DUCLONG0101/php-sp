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
    
    <div class="hidden" id="add">
        <div class="bk_mo ">
            <div class="box_fun">
                <span class="close"><i class="fas fa-times"></i></span>
                <h2>Sửa thông tin cá nhân</h2>
                <form class="" action="" method="post">
                    <div class="box_content update_ttcn">
                        <div class="add_ma">
                            <label for="TenDN">Tên đăng nhập</label>
                            <input type="text" name="malopadd" id="TenDN">
                        </div>
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
                <li class="li1 "><a href="./admin.php" class="taga"><i class="fas fa-home i_normal " ></i><p >Home</p></a></li>
                <li class="li1"><a href="./namhoc.php" class="taga"><i class="fas fa-vote-yea i_normal"></i><p>Năm học</p></a></li>
                <li class="li1 "><a href="./lophoc.php" class="taga"><i class="fas fa-users i_normal "></i></i><p>Lớp học</p></a></li>
                <li class="li1 "><a href="./giaovien.php" class="taga"><i class="fas fa-chalkboard-teacher i_normal"></i><p>Giáo viên</p></a></li>
                <li class="li1 "><a href="./hocsinh.php" class="taga"><i class="fas fa-user-graduate i_normal "></i><p >Học sinh</p></a></li>
                <li class="li1 "><a href="./monhoc.php" class="taga"><i class="fas fa-tags i_normal"></i><p>Môn học</p></a></li>
                <li class="li1"><a href="./thoikhoabieu.php" class="taga"><i class="far fa-calendar-alt i_normal"></i><p>Thời khóa biểu</p></a></li>
                <li class="li1"><a href="./hoc.php" class="taga"><i class="fas fa-book i_normal"></i><p>Học</p></a></li>
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
                <div class="canhan">
                    <h2>Thông tin cá nhân</h2>
                    <div class="thongtincanhan">
                        <label>Tên đăng nhập:</label>
                        <span id="userad">
                            <?php
                                echo $_SESSION['userad'];
                            ?>
                        </span>
                        <br>
                        <label>Mật khẩu:</label>
                        <span>********</span>
                        <button type="button" id="thongtincanhan">Sửa thông tin cá nhân</button>
                    </div>
                </div>
            </div> 
        </div>
    </section>
    <script src="./Js/main.js"></script>
    <script>
        document.getElementById('thongtincanhan').onclick = function(){
            document.getElementById('add').style.display = 'block';
            document.getElementById('update_thongtincanhan').onclick = function(){
                var tendn = document.getElementById('TenDN');
                var mkcu = document.getElementById('MKCu');
                var mkmoi = document.getElementById('MKMoi');
                var xnmkmoi = document.getElementById('XNMKMoi');
                var userad = document.getElementById('userad');

                if(tendn.value == "" && mkcu.value == "" && mkmoi.value == "" && xnmkmoi.value == ""){
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
                    }
                    if(mkmoi.value != xnmkmoi.value){
                        document.getElementById('thongbao_chucnang_1').innerHTML = `
                            <h2 style=\"color: rgb(1, 82, 233);\">Thông báo</h2>
                            <p style=\"font-size: 15px; margin-top: 20px;\">Mật khẩu mới không trùng khớp</p>
                        `;
                        
                        document.getElementById('thongbao_chucnang').style.display = 'block';
                    }
                    else{
                        var get ="usercu=" + userad.innerText + "&tendn=" + tendn.value + "&mkcu=" + mkcu.value +  "&mkmoi=" + mkmoi.value; 
                        function update(update_php, infor) {
                            var request = new XMLHttpRequest();
                            
                            request.open("post",update_php, true);
                            request.onreadystatechange = function () {
                                if (this.readyState === 4 && this.status === 200) {
                                    document.getElementById("thongbao_chucnang_1").innerHTML =
                                    this.responseText;
                                }
                            };
                            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                            request.send(infor);
                            document.getElementById("thongbao_chucnang").style.display = "block";
                        }
                        update('update_canhan.php',get);
                        // setTimeout(function(){location.reload()},1000)
                    }
                }
            }
        }
    </script>

</body>
</html>