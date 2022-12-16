<?php
    session_start();
    require_once "../LogIn/checklogin.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <link rel="stylesheet" href="./CSS/styleGiaoVien_edit_infor.css">
    <title>Document</title>
</head>
<body>
    <nav>
        <div class="menu_top">
            <i class="fas fa-bookmark"></i>
            <p>Education</p>
        </div>
        <div class="menu_mid">
            <ul class="menu_main">
                <li class="li1 test"><a href="giaovien.php" class="taga"><i class="fas fa-home i_normal i_to" ></i><p class="to">Home</p></a></li> 
				<li class="li1"><a href="./giaovien.php" class="taga"><i class="fas fa-chalkboard-teacher i_normal"></i><p>Giáo viên</p></a></li>
				<li class="li1"><a href="./giaovien.php" class="taga"><i class="fas fa-users i_normal"></i></i><p>Giảng dạy</p></a></li>
                <li class="li1"><a href="./giaovien.php" class="taga"><i class="fas fa-user-graduate i_normal"></i><p>Học sinh</p></a></li>
                <li class="li1"><a href="../GiaoVien/index.php" class="taga"><i class="fas fa-sign-out-alt i_normal"></i><p>Đăng xuất</p></a></li>
            </ul>
        </div>
        <div class="menu_img"></div>
    </nav>
    <section>
        <header>
            <div class="account">
                <p> 
                    <?php 
                        require_once "../Execute/get_item.php";
                        $hoten = new Exe();
                        echo $hoten->get_item('giaovien','TenGV',$_SESSION['user'],$_SESSION['pass'],'MaGV');                   
                    ?>                
                </p>
                <i class="fas fa-user"></i>
            </div>
            <div>
                <h1>Giáo Viên</h1>
            </div>
        </header>
        <div class="con">
            <div class="menu">
                <div class="infor_main infor_class">
                    <img src="Img/teacher.svg" alt="">
                    <div class="infor_content">
                        <h1>Giáo viên</h1>
                        <p>
                            <?php
                                $lop = new Exe();
                                $countClass = $lop->get_item('giaovien','MaGV',$_SESSION['user'],$_SESSION['pass'],'MaGV');     
                                echo $countClass."";
                            ?>
                        </p>
                    </div>
                </div>
                <div class="infor_main infor_teacher">
                    <img src="Img/class.svg" alt="">
                    <div class="infor_content">
                        <h1>Giảng dạy</h1>
                        <p>
                            <?php
                                $countTeacher = $lop->get_item_countLike('dayhoc','MaGV',$_SESSION['user']);
                                echo $countTeacher."_lớp";
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
                                $countStudent = $lop->count_hs_cua_giaovien($_SESSION['user']);
                                echo $countStudent."_hs";
                            ?>
                        </p>
                    </div>
                </div>
            </div>
			
            <div class="content">
                <div class="class content_home">
					
					<div class="class content_home">
						<div class="content_tieude">
							<a href="#"><h1>Giáo viên</h1></a>
								<a href="#"><?php
										if(isset($_SESSION['loiP']) && $_SESSION['loiP']==1)
											{
												echo "<br><b><i>Mật khẩu cũ sai!</i></b>";
												$_SESSION['loiP']=0;
											}

										if(isset($_SESSION['loiP']) && $_SESSION['loiP']==2)
											{
												echo "<br><b><i>Xác nhận mật khẩu sai!</i></b>";
												$_SESSION['loiP']=0;
											}
										if(isset($_SESSION['loiP']) && $_SESSION['loiP']==3)
											{
												echo "<br><b><i>Thông tin không được bỏ trống!</i></b>";
												$_SESSION['loiP']=0;
											}

									?></a>
							<div>
								<form action="./updatePass.php" method="POST">

									<p>Mã giáo viên: 
										<?php
										$thongTin = new Exe();
										echo $thongTin->get_item('giaovien','MaGV',$_SESSION['user'],$_SESSION['pass'],'MaGV');      
										?>
									</p>
									
									<p>Mật khẩu cũ : 
										<input type="text" name="PassOld" class="box"></imput>
									</p>

									<p>Mật khẩu mới: 
										<input type="text" name="PassNew" class="box"></imput>
									</p>

									<p>Xác nhận mật khẩu: 
										<input type="text" name="RePassNew" class="box"></imput>
									</p>

										<div class="box_submit">
										<button type="submit" name="submit" >CẬP NHẬT</button>	
										<button type="reset" name="reset" >HỦY BỎ</button> 
										</div>
								</form>
							</div>
						</div>              
            		</div> 
                </div>
			</div>
		</div>	
    </section>
    <script src="Js/main.js"></script>
</body>
</html>