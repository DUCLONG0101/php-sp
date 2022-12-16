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
                <li class="li1 test"><a href="./bangdiem.php" class="taga"><i class="fas fa-chalkboard-teacher i_normal i_to"></i><p class="to">Bảng điểm</p></a></li>
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
                        <p>Bảng điểm</p>
                    </div>
                    <div class="timkiem">
                        <label for="sel_search">Khối lớp</label>
                        <select name="luachontimkiem" class="luachon" id="sel_search">
                            
                            <?php
                                $query_khoi = "SELECT Khoi from lophoc_hocsinh inner join lophoc on lophoc.MaLop = lophoc_hocsinh.MaLop where lophoc_hocsinh.MaHS = '".$_SESSION['userhs']."' group by Khoi";
                                $data_khoi = $sql->getdata($query_khoi);
                                while($row = $data_khoi->fetch_assoc()){
                                    echo "<option value=\"".$row['Khoi']."\">".$row['Khoi']."</option>";
                                }
                            ?>
                        </select>
                        <input type="button" value="Lọc" id="loc_diem">
                    </div>
                </div>
                <div class="content_content" id="content_content">
                    <?php echo $khoi_hientai?>
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
        function bangdiem(khoi){            
            var request = new XMLHttpRequest();
            request.open("get","chitiet_hocsinh.php?Khoi=" + khoi);
            request.onreadystatechange = function(){
                if(this.readyState === 4 && this.status === 200){
                    document.getElementById('content_content').innerHTML = this.responseText;
                }
            }
            
            request.send();
        }
        bangdiem("<?php echo $khoi_hientai?>");
        document.getElementById('loc_diem').onclick = function(){
            var khoi = document.getElementById('sel_search');
            bangdiem(khoi.value);
        }

    </script>

</body>
</html>