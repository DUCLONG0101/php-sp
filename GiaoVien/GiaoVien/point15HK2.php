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
    <link rel="stylesheet" href="./CSS/style_Point.css">
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
              <div class="content_home">
				  <?php
						$conn= mysqli_connect('localhost','root','','quanlyhocsinh5') or die('không thể kết nối tới database');

						mysqli_set_charset($conn,"utf8");
						$sql = "SELECT * FROM hocsinh, diem WHERE  hocsinh.MaHS = diem.MaHS
						AND MaLop= '".$_SESSION['MaLop']."' AND MaMon= '".$_SESSION['MaMon']."' ORDER BY TenHS ";
						$result = mysqli_query($conn, $sql);
//				  		----
						$sql1 = "SELECT * FROM hesotinhdiem ";
						$resultD = mysqli_query($conn, $sql1);
						$rowD= mysqli_fetch_array($resultD);
					?>
				
				  
							<a href="#"><h1>Bảng điểm 15 phút học kì 2 (mã lớp: <?php echo $_GET['idMaLop'].")"?></h1></a><br>
							<a href="#"><h1>Mã môn: <?php echo $_GET['idMaMon']?></h1></a><br>
					<form action="UpdatePoint15HK2.php" method="POST">
								<table>
									<tr>
										<td>STT</td>
										<td >MaHS</td>
										<td >Tên HS</td>
										<td >15 phút (hk1)</td>			
									</tr>
									
									<?php
										$stt=0;
										while($row= mysqli_fetch_array($result))
										{
											$stt++;

											?>
										<tr>
										<td><?=$stt?></td>
										<td class="MaHS"><?= $row['MaHS'] ?></td>
										<td class="TenHS"><?= $row['TenHS'] ?></td>
										<?php $_SESSION['MaMon']= $row['MaMon'] ?>
										
										<td><input class="focusPoint" type="number" name="point15_HK2<?php echo $stt; ?>" step="0.25" min="0" max="10" ></td>			</tr>
									<?php 

										}?>
								</table>
							 <div style=" text-align: center; margin-top: 10px ">
								 <input type="submit" name="submit" style="border: 1px solid gray; padding: 4px; background-color:aliceblue"  value="Cập nhật">
									
							</div>
						</form>
				  <a style="font-weight: bold" href="./point.php?idMaLop=<?= $_SESSION['MaLop']?>&idMaMon=<?= $_SESSION['MaMon']?>"> Trở về</a>
	           </div>
			</div>
		</div>		
    </section>
    <script src="Js/main.js"></script>
    <script>
        document.getElementsByClassName('focusPoint')[0].focus();
    </script>
</body>
</html>