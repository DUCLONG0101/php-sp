<?php
    session_start();
    require_once "./LogIn/checkloginadmin.php";    
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
</head>
<body>
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
                <li class="li1 test"><a href="./admin.php" class="taga"><i class="fas fa-home i_normal i_to" ></i><p class="to">Home</p></a></li>
                <li class="li1"><a href="./namhoc.php" class="taga"><i class="fas fa-vote-yea i_normal"></i><p>Năm học</p></a></li>
                <li class="li1"><a href="./lophoc.php" class="taga"><i class="fas fa-users i_normal"></i></i><p>Lớp học</p></a></li>
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
                            <?php
                                echo $solop;
                            ?>
                        </p>
                    </div>
                </div>
                <div class="infor_main infor_teacher">
                    <img src="Img/teacher.svg" alt="">
                    <div class="infor_content">
                        <h1>Giáo viên</h1>
                        <p>
                            <?php
                                echo $sogv;
                            ?>
                        </p>
                    </div>
                </div>
                <div class="infor_main infor_student">
                    <img src="Img/student.svg" alt="">
                    <div class="infor_content">
                        <h1>Học sinh</h1>
                        <p>
                            <?php
                                echo $sohs;
                            ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="content_home">
                    <div class="content_tieude">
                        <a href="./lophoc.php"><h1>Lớp học</h1></a>
                        <a href=""><p>Số lớp học: <?php echo $solop ?></p></a>
                    </div>
                    <div class="class_infor">
                        <a href="./lophoc.php?Khoi=A">
                            <div class="khoi khoia">
                                <b>A</b>
                                <div class="khoi_infor">
                                    <h3>Lớp học sinh khối A</h3>
                                    <p><i class="fas fa-users lop_icon"></i>
                                        <?php echo $solopA ?>
                                    </p>
                                </div>
                            </div>
                        </a>
                        <a href="./lophoc.php?Khoi=B">
                            <div class="khoi khoib">
                                <b>B</b>
                                <div class="khoi_infor">
                                    <h3>Lớp học sinh khối B</h3>
                                    <p><i class="fas fa-users lop_icon" ></i>
                                        <?php echo $solopB ?>
                                    </p>
                                </div>
                            </div>
                        </a>
                        <a href="./lophoc.php?Khoi=C">
                            <div class="khoi khoic">
                                <b>C</b>
                                <div class="khoi_infor">
                                    <h3>Lớp học sinh khối C</h3>
                                    <p><i class="fas fa-users lop_icon" ></i>  
                                        <?php echo $solopC ?>
                                    </p>
                                </div>
                            </div>
                        </a>
                        <a href="./lophoc.php?Khoi=D">
                            <div class="khoi khoid">
                                <b>D</b>
                                <div class="khoi_infor">
                                    <h3>Lớp học sinh khối D</h3>    
                                    <p><i class="fas fa-users lop_icon" ></i> 
                                        <?php echo $solopD ?>
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="content_home">
                    <div class="content_tieude">
                        <a href="./giaovien.php"><h1>Giáo viên</h1></a>
                        <a href="#"><p>Số giáo viên: <?php echo $sogv ?> </p></a>
                    </div>
                    <div class="class_infor">
                        <a href="./giaovien.php?BoMon=TuNhien">
                            <div class="khoi khoitunhien">
                                <b>T</b>
                                <div class="khoi_infor">
                                    <h3>Khoa học tự nhiên</h3>
                                    <p><i class="fas fa-chalkboard-teacher gv_icon"></i>
                                        <?php echo $sql->getdata("SELECT count(MaGV) as 'So' from giaovien where MaBoMon='TuNhien'")->fetch_assoc()['So'] ?>
                                    </p>
                                </div>
                            </div>
                        </a>
                        <a href="./giaovien.php?BoMon=XaHoi">
                            <div class="khoi khoixahoi">
                                <b>X</b>
                                <div class="khoi_infor">
                                    <h3>Giáo viên xã hội</h3>
                                    <p><i class="fas fa-chalkboard-teacher gv_icon"></i>
                                        <?php echo $sql->getdata("SELECT count(MaGV) as 'So' from giaovien where MaBoMon='XaHoi'")->fetch_assoc()['So'] ?>
                                    </p>
                                </div>
                            </div>
                        </a>
                        
                    </div>
                </div>
                <div class="content_home">
                    <div class="content_tieude">
                        <a href="./hocsinh.php"><h1>Học sinh</h1></a>
                        <a href=""><p>Số học sinh: <?php echo $sohs ?></p></a>
                    </div>
                    <div class="class_infor">
                        <a href="./hocsinh.php?Lop=6">
                            <div class="khoi khoi6">
                                <b>6</b>
                                <div class="khoi_infor">
                                    <h3>Khối lớp 6</h3>
                                    <p><i class="fas fa-users hs_icon" ></i>  
                                        <?php echo $sohs6 ?>
                                    </p>
                                </div>
                            </div>
                        </a>
                        <a href="./hocsinh.php?Lop=7">
                            <div class="khoi khoi7">
                                <b>7</b> 
                                <div class="khoi_infor">
                                    <h3>Khối lớp 7</h3>
                                    <p><i class="fas fa-users hs_icon" ></i>  
                                        <?php echo $sohs7 ?>    
                                    </p>
                                </div>
                            </div>
                        </a>
                        <a href="./hocsinh.php?Lop=8">
                            <div class="khoi khoi8">
                                <b>8</b>
                                <div class="khoi_infor">
                                    <h3>Khối lớp 8</h3>
                                    <p><i class="fas fa-users hs_icon" ></i>  
                                        <?php echo $sohs8 ?>
                                    </p>
                                </div>
                            </div>
                        </a>
                        <a href="./hocsinh.php?Lop=9">
                            <div class="khoi khoi9">
                                <b>9</b>
                                <div class="khoi_infor">
                                    <h3>Khối lớp 9</h3>
                                    <p><i class="fas fa-users hs_icon" ></i>  
                                        <?php echo $sohs8 ?>
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div> 
        </div>
    </section>
    <script src="./Js/main.js"></script>
</body>
</html>