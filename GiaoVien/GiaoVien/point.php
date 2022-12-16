<?php
    session_start();
    require_once "../LogIn/checklogin.php";
	$_SESSION['MaLop']=$_GET['idMaLop'];
	$_SESSION['MaMon']=$_GET['idMaMon'];
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
				
				  
							<a href="#"><h1>Bảng điểm (mã lớp: <?php echo $_GET['idMaLop'].")"?></h1></a><br>
							<a href="#"><h1>Mã môn: <?php echo $_GET['idMaMon']?></h1></a><br>
				  <div class="sb_conten">
				  	<div style="width: 50%">
						<a href="point15HK1.php?idMaLop=<?php echo $_SESSION['MaLop'];?>&idMaMon=<?php echo $_SESSION['MaMon'];?>">
							<h1 style="font-size: 13px; border: 1px solid aliceblue; width:200px ; height: 35px; border-radius:5px; 
									   background-color: aliceblue">Nhập điểm 15 phút (HK1)</h1></a><br>
						<a href="point45HK1.php?idMaLop=<?php echo $_SESSION['MaLop'];?>&idMaMon=<?php echo $_SESSION['MaMon'];?>"><h1 style="font-size: 13px; border: 1px solid aliceblue; width: 200px; height: 35px; border-radius:5px; background-color: aliceblue">Nhập điểm 1 tiết (HK1)</h1></a><br>
						<a href="pointGK_HK1.php?idMaLop=<?php echo $_SESSION['MaLop'];?>&idMaMon=<?php echo $_SESSION['MaMon'];?>"><h1 style="font-size: 13px; border: 1px solid aliceblue; width: 200px; height: 35px; border-radius:5px; background-color: aliceblue">Nhập điểm giữa kì (HK1)</h1></a><br>
						<a href="pointCK_HK1.php?idMaLop=<?php echo $_SESSION['MaLop'];?>&idMaMon=<?php echo $_SESSION['MaMon'];?>"><h1 style="font-size: 13px; border: 1px solid aliceblue; width: 220px; height: 35px; border-radius:5px;
						background-color: aliceblue">Nhập điểm cuối kỳ phút (HK1)</h1></a><br>  
					</div>
				  	<div style="width: 50%">
						<a href="point15HK2.php?idMaLop=<?php echo $_SESSION['MaLop'];?>&idMaMon=<?php echo $_SESSION['MaMon'];?>"><h1 style="font-size: 13px; border: 1px solid aliceblue; width:200px;height: 35px; border-radius:5px; background-color: aliceblue">Nhập điểm 15 phút (HK2)</h1></a><br>
						<a href="point45HK2.php?idMaLop=<?php echo $_SESSION['MaLop'];?>&idMaMon=<?php echo $_SESSION['MaMon'];?>"><h1 style="font-size: 13px; border: 1px solid aliceblue; width:200px; height: 35px; border-radius:5px; background-color: aliceblue">Nhập điểm 1 tiết (HK2)</h1></a><br>
						<a href="pointGK_HK2.php?idMaLop=<?php echo $_SESSION['MaLop'];?>&idMaMon=<?php echo $_SESSION['MaMon'];?>"><h1 style="font-size: 13px; border: 1px solid aliceblue; width:200px;height: 35px; border-radius:5px; background-color: aliceblue">Nhập điểm giữa kì (HK2)</h1></a><br>
						<a href="pointCK_HK2.php?idMaLop=<?php echo $_SESSION['MaLop'];?>&idMaMon=<?php echo $_SESSION['MaMon'];?>"><h1 style="font-size: 13px; border: 1px solid aliceblue; width:220px; height: 35px; border-radius:5px; background-color: aliceblue">Nhập điểm cuối kỳ phút (HK2)</h1></a><br>   
					</div>
				  </div>
					<form action="">
								<table>
									<tr>
										<td>STT</td>
										<td >MaHS</td>
										<td >Tên HS</td>
										<td >15 phút (hk1)</td>
										<td >45 phút (hk1)</td>
										<td >Giữa kỳ (hk1)</td>
										<td >Điểm cuối kỳ (hk1)</td>
										<td >TB (hk1)</td>
										<td >15 phút (hk2)</td>
										<td >45 phút (hk2)</td>
										<td >Giữa kỳ (hk2)</td>
										<td >Điểm cuối kỳ (hk2)</td>
										<td >TB (hk2)</td>
										<td >TB môn</td>
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
										<!-- <td><?= $row['NamHoc'] ?></td> -->
										
										<td>
											<?php 
												if($row['Diem15PhutHK1']== -1)
													echo '';
												else
													echo $row['Diem15PhutHK1'];
											?>	
										</td>
											
										<td>
											<?php 
												if($row['Diem1TietHK1']== -1)
													echo '';
												else
													echo $row['Diem1TietHK1'];
											?>	
										</td>
											
										<td>
											<?php 
												if($row['DiemGiuaKyHK1']== -1)
													echo '';
												else
													echo $row['DiemGiuaKyHK1'];
											?>	
										</td>
											
										<td>
											<?php 
												if($row['DiemCuoiKyHK1']== -1)
													echo '';
												else
													echo $row['DiemCuoiKyHK1'];
											?>	
										</td>
											
										<td>
											<?php 
												if($row['Diem15PhutHK1']== -1||$row['Diem1TietHK1']== -1||$row['DiemGiuaKyHK1']== -1||$row['DiemCuoiKyHK1']== -1)
													echo '';
													else 
													{
														$TB_HK1= ($row['Diem15PhutHK1']*$rowD['Diem15'] + $row['Diem1TietHK1']*$rowD['Diem1Tiet'] + $row['DiemGiuaKyHK1']*$rowD['DiemGK'] + $row['DiemCuoiKyHK1'] *$rowD['DiemCK'] )/($rowD['Diem15'] +$rowD['Diem1Tiet'] +$rowD['DiemGK'] +$rowD['DiemCK'] );
														
														$sqlU= "UPDATE diem SET DiemTbHK1= '".$TB_HK1."'WHERE MaHS ='".$row['MaHS']."' 
														AND MaMon='".$_SESSION['MaMon']."' ";
														mysqli_query($conn, $sqlU);
														echo $TB_HK1;
													}
											?>	
										</td>
										
										<td>
											<?php 
												if($row['Diem15PhutHK2']== -1)
													echo '';
												else
													echo $row['Diem15PhutHK2'];
											?>	
										</td>
											
										<td>
											<?php 
												if($row['Diem1TietHK2']== -1)
													echo '';
												else
													echo $row['Diem1TietHK2'];
											?>	
										</td>
											
										<td>
											<?php 
												if($row['DiemGiuaKyHK2']== -1)
													echo '';
												else
													echo $row['DiemGiuaKyHK2'];
											?>	
										</td>
											
										<td>
											<?php 
												if($row['DiemCuoiKyHK2']== -1)
													echo '';
												else
													echo $row['DiemCuoiKyHK2'];
											?>	
										</td>
											
										<td>
											<?php 
												if($row['Diem15PhutHK2']== -1||$row['Diem1TietHK2']== -1||$row['DiemGiuaKyHK2']== -1||$row['DiemCuoiKyHK2']== -1)
													echo '';
												else 
												{
														$TB_HK2= ($row['Diem15PhutHK2']*$rowD['Diem15'] + $row['Diem1TietHK2']*$rowD['Diem1Tiet'] + $row['DiemGiuaKyHK2']*$rowD['DiemGK'] + $row['DiemCuoiKyHK2'] *$rowD['DiemCK'] )/($rowD['Diem15'] +$rowD['Diem1Tiet'] +$rowD['DiemGK'] +$rowD['DiemCK'] );
														
														$sql= "UPDATE diem SET DiemTbHK2= '".$TB_HK2."'WHERE MaHS ='".$row['MaHS']."' 
														AND MaMon='".$_SESSION['MaMon']."' ";
														mysqli_query($conn, $sql);
														echo $TB_HK2;
														$_SESSION['tempDiemTbHK2']=$TB_HK2;
												}
													
											?>	
										</td>
											
										<td>
											<?php 
												if($row['Diem15PhutHK1']== -1||$row['Diem1TietHK1']== -1||$row['DiemGiuaKyHK1']== -1||
												   $row['DiemCuoiKyHK1']== -1||$row['Diem15PhutHK2']== -1||$row['Diem1TietHK2']== -1||
												   $row['DiemGiuaKyHK2']== -1||$row['DiemCuoiKyHK2']== -1 )
													echo '';
												else
												{
													$TBMon= ($row['DiemTbHK1'] + $_SESSION['tempDiemTbHK2'])/ 2;
													$sql= "UPDATE diem
														   SET DiemTbMon= '".$TBMon."'
														   
														   WHERE MaHS ='".$row['MaHS']."' AND MaMon='".$_SESSION['MaMon']."'";
													mysqli_query($conn, $sql);
													echo $TBMon;
												}
											?>	
										</td>
									</tr>
									<?php 

										}?>
								</table>
						</form>
							
						
	           </div>
			</div>
		</div>		
    </section>
    <script src="Js/main.js"></script>
</body>
</html>