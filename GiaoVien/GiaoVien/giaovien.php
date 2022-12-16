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
    <link rel="stylesheet" href="./CSS/styleGiaoVien.css">
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
                <li class="li1 test"><a href="./giaovien.php" class="taga"><i class="fas fa-home i_normal i_to" ></i><p class="to">Home</p></a></li> 
				<li class="li1"><a href="#GiaoVien" class="taga"><i class="fas fa-chalkboard-teacher i_normal"></i><p>Giáo viên</p></a></li>
				<li class="li1"><a href="#GiangDay" class="taga"><i class="fas fa-users i_normal"></i></i><p>Giảng dạy</p></a></li>
                <li class="li1"><a href="#HocSinh" class="taga"><i class="fas fa-user-graduate i_normal"></i><p>Học sinh</p></a></li>
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
                <div class="class content_home" id="GiaoVien">
					<div class="class content_home">
						<div class="content_tieude">
							<a href=""><h1>Giáo viên</h1></a>
						</div>
						<div class="class_infor">
							<a href="./view.php">
								<div class="giaoVien giaoVientunhien">
									<b>VIEW</b>
									<div class="giaoVien_infor">
										
										<h3><i class="far fa-address-card"></i>Thông tin cá nhân</h3>

									</div>
								</div>
							</a>
							<a href="./editInformation.php">
								<div class="giaoVien giaoVienxahoi">
									<b>EDIT</b>
									<div class="giaoVien_infor">
										<h3><i class="fas fa-user-edit"></i>Chỉnh sửa thông tin</h3>
									</div>
								</div>
							</a>
							<a href="./Pass.php">
								<div class="giaoVien giaoVienxahoi">
									<b>Pass</b>
									<div class="giaoVien_infor">
										<h3><i class="fas fa-user-edit"></i>Đổi mật khẩu</h3>
									</div>
								</div>
							</a>
						</div>
                	</div>
					<div class="class content_home" id="GiangDay">
                    <div class="content_tieude">
                        <a href=""><h1>Giảng dạy</h1></a>
                        <a href=""><p>Số lớp học: <?php echo $countTeacher?></p></a>
                    </div>
                    <div class="class_infor">
                        <a href="TKB.php">
                            <div class="giaoVien giaoViena">
                                <b>Plan</b>
                                <div class="giaoVien_infor">
                                    <h3><i class="far fa-list-alt"></i>Thông tin giảng dạy</h3>
									<p><i class="fas fa-users lop_icon" ></i> 
										<?php echo $countTeacher." Lớp"?>
                                    </p>
                                </div>
                            </div>
                        </a>
                        
                        <a href="NoiQuy.php">
                            <div class="giaoVien giaoViend">
                                <b>Rules</b>
                                <div class="giaoVien_infor">
                                    <h3><i class="fas fa-school"></i>Thông báo nhà trường</h3>    
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
			</div>
          <!-- Học sinh -->      
                <div class="class content_home" id="HocSinh">
                    <div class="content_tieude">
                        <a href=""><h1>Học sinh</h1></a>
                        <a href="#HocSinh"><p>Số học sinh: <?php echo $countStudent?></p></a>
                    </div>
                    <div class="class_infor">
                       			<?php
								$conn= mysqli_connect('localhost','root','','quanlyhocsinh5') or die('không thể kết nối tới database');
								mysqli_set_charset($conn,"utf8");
								$sql = "SELECT * FROM dayhoc WHERE MaGV ='".$_SESSION['user']."' ";
								$result = mysqli_query($conn, $sql);
								?>								
								<?php									
									while($row= mysqli_fetch_array($result))
									{									
								?>
											<div>	
												<a href='point.php?idMaLop=<?= $row['MaLop']?>&idMaMon=<?= $row['MaMon']?> ' >
												<div class="giaoVien giaoVien8">
													<b><?= $row['MaMon'] ?></b>
													<div class="giaoVien_infor">
														<h3><i class="fas fa-user-edit"></i>Lớp <?= $row['MaLop'] ?></h3>
													</div>
												</div>
												</a>
											</div>							
								<?php 
									}
								?>
							
                    </div>
					<div class="class_infor">
                       			<?php
								
								$sql2 = "SELECT * FROM lophoc WHERE MaGV ='".$_SESSION['user']."' ";
								$result2 = mysqli_query($conn, $sql2);
								?>
								<?php							
                                    if(mysqli_num_rows($result2) > 0){ 
									    while($row2= mysqli_fetch_array($result2))
									    {
								?>
								<div>	
									<a href='CN.php?idMaLopCN=<?= $row2['MaLop']?> ' >
									<div class="giaoVien giaoVien8">
										<b>Lớp CN</b>
										<div class="giaoVien_infor">
											<h3><i class="fas fa-user-edit"></i>Lớp chủ nhiệm:<?= $row2['MaLop']?></h3>
										</div>
									</div>
									</a>
								</div>
								<?php 
                                        }
                                    }
								?>						
                    </div>	
					
					<div class="class_infor">
								<div>	
									<a href='HeSo.php' >
									<div class="giaoVien giaoVien8">
										<b>Hệ số điểm</b>
									</div>
									</a>
								</div>
                    </div>
                </div>
            </div> 
        </div>
    </section>
    <script src="Js/main.js"></script>
</body>
</html>