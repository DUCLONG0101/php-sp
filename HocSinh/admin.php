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
                <li class="li1"><a href="./lophoc.php" class="taga"><i class="fas fa-users i_normal"></i></i><p>Lớp học</p></a></li>
                <li class="li1"><a href="./thoikhoabieu.php" class="taga"><i class="far fa-calendar-alt i_normal"></i><p>Thời khóa biểu</p></a></li>
                <li class="li1"><a href="./bangdiem.php" class="taga"><i class="fas fa-chalkboard-teacher i_normal"></i><p>Bảng điểm</p></a></li>
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
                <h1 style="padding: 0 40px; box-sizing: border-box;"><?php
                        echo $namhoc_hientai;
                    ?></h1>
                
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
                        <a href=""><p>Lớp học hiện tại: <?php echo $solop ?></p></a>
                    </div>
                    <div class="class_infor">
                        <a href="./lophoc.php?Khoi=A">
                            <div class="khoi khoia">
                                <b>6</b>
                                <div class="khoi_infor">
                                    <h3>Khối lớp 6</h3>
                                </div>
                            </div>
                        </a>
                        <a href="./lophoc.php?Khoi=B">
                            <div class="khoi khoib">
                                <b>7</b>
                                <div class="khoi_infor">
                                    <h3>Khối lớp 7</h3>
                                </div>
                            </div>
                        </a>
                        <a href="./lophoc.php?Khoi=C">
                            <div class="khoi khoic">
                                <b>8</b>
                                <div class="khoi_infor">
                                    <h3>Khối lớp 8</h3>
                                </div>
                            </div>
                        </a>
                        <a href="./lophoc.php?Khoi=D">
                            <div class="khoi khoid">
                                <b>9</b>
                                <div class="khoi_infor">
                                    <h3>Khối lớp 9</h3> 
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="content_home">
                    <div class="content_tieude">
                        <a href="./giaovien.php"><h1>Giáo viên</h1></a>
                        <a href="#"><p>Giáo viên chủ nhiệm: <?php echo $solop ?> </p></a>
                    </div>
                    <div class="class_infor">
                        <!-- <a href="">
                            <div class="khoi khoitunhien">
                                <b>T</b>
                                <div class="khoi_infor">
                                    <h3>Khoa học tự nhiên</h3>
                                    <p><i class="fas fa-chalkboard-teacher gv_icon"></i>
                                        
                                    </p>
                                </div>
                            </div>
                        </a> -->
                        <a href="#">
                            <div class="khoi khoixahoi">
                                <b>G</b>
                                <div class="khoi_infor">
                                    <h3>Chủ nhiệm</h3>
                                    <p><i class="fas fa-chalkboard-teacher gv_icon"></i>
                                        <?php echo $sogv ?>
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