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
    <link rel="stylesheet" href="./CSS/viewtkb.css">
    <title>Document</title>
	<style>
		td{
			width: 60px;
			height: 60px;
		}
	</style>
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
                                $countTeacher = $lop->get_item_countLike('lophoc','MaGV',$_SESSION['user']);
                                echo $countTeacher." lớp";
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
                                echo $countStudent." hs";
                            ?>
                        </p>
                    </div>
                </div>
            </div>
			
			<div class="content">
              <div class="content_home" >
				  <h1 style="text-align: center">THỜI KHÓA BIỂU</h1><br>
				  <div style="display: flex">
					 
							  <?php
										$conn= mysqli_connect('localhost','root','','quanlyhocsinh5') or die('không thể kết nối tới database');
										mysqli_set_charset($conn,"utf8");
										$sql1 = "SELECT DISTINCT Tuan FROM tkb, dayhoc WHERE tkb.MaLop= dayhoc.MaLop AND  tkb.MaMon= dayhoc.MaMon AND  MaGV= '".$_SESSION['user']."' ";
										$result1 = mysqli_query($conn, $sql1);

										$Tiet = new Exe();
										$countTiet = $Tiet->get_item_count('tiet');     
										// echo date("d/m/Y");
							?>
							<h1>Tuần</h1>
							  <form action="./search.php" method="POST">
								<select name="Tuan" style="background-color: aliceblue; border-radius:5px; margin-left: 33px ">
									<option value=""></option>
										<?php		
												$_SESSION['check']="";							
												while($row1= mysqli_fetch_array($result1))
												{
													$_SESSION['check']=$row1;
														?>
														<option value="<?= $row1['Tuan'] ?>"><?= $row1['Tuan'] ?></option>
														<?php 
															// if(!isset($_SESSION['loiTKB']))
															// {
															// 	$_SESSION['Tuan']= $row1['Tuan'];
															// }

															// else
															// 	$_SESSION['check']="";
															$_SESSION['Tuan']= $row1['Tuan'];
													}
												?>
								</select>
								<br>
						  </div>
						  <div style="display: flex">
							  <?php
								$conn= mysqli_connect('localhost','root','','quanlyhocsinh5') or die('không thể kết nối tới database');
										mysqli_set_charset($conn,"utf8");
										$sql1 = "SELECT DISTINCT NamHoc FROM tkb, dayhoc WHERE tkb.MaLop= dayhoc.MaLop AND  tkb.MaMon= dayhoc.MaMon AND MaGV= '".$_SESSION['user']."' ";
										$result1 = mysqli_query($conn, $sql1);
							?>
							<h1>Năm</h1>
								<select name="Nam" style="height: 20px ;background-color: aliceblue; border-radius:5px; margin:5px 36px ">
									<option value=""></option>
									<?php									
												while($row1= mysqli_fetch_array($result1))
												{
														?>
														<option value="<?= $row1['NamHoc'] ?>"><?= $row1['NamHoc'] ?></option>
														
														<?php 
															// if(!isset($_SESSION['loiTKB']))
															// {
															// 	$_SESSION['Nam']= $row1['NamHoc'];
															// }
															// else
															// 	$_SESSION['check']="";
															$_SESSION['Nam']= $row1['NamHoc'];
													}?>
								</select>
								  <br>
						  </div>
				<!--học kì-->
						  <div style="display: flex">
							  <?php
								$conn= mysqli_connect('localhost','root','','quanlyhocsinh5') or die('không thể kết nối tới database');
										mysqli_set_charset($conn,"utf8");
										$sql1 = "SELECT DISTINCT HocKy FROM tkb, dayhoc WHERE tkb.MaLop= dayhoc.MaLop AND  tkb.MaMon= dayhoc.MaMon AND MaGV= '".$_SESSION['user']."' ";
										$result1 = mysqli_query($conn, $sql1);
							?>
							<h1>Học kỳ</h1>
								<select name="HocKy" style="height: 20px ;background-color: aliceblue; border-radius:5px; margin:5px 10px ">
									<option value=""></option>
									<?php									
												while($row1= mysqli_fetch_array($result1))
												{
														?>
														<option value="<?= $row1['HocKy'] ?>"><?= $row1['HocKy'] ?></option>
														<?php 
															// if(!isset($_SESSION['loiTKB']))
															// {
															// 	$_SESSION['HocKy']= $row1['HocKy'];

															// }
															$_SESSION['HocKy']= $row1['HocKy'];
															
															// else
															// 	$_SESSION['check']="";
															
													}?>


								</select>
								<input style="width: 50px; height: 30px; border: 1px solid white; border-radius: 10px" type="submit" name="submit" value="Tìm">
								  <br>
							  </form>
						  </div>
				  
	<!--------->			  
				  <a href="#"><?php
										if(isset($_SESSION['loiTKB']) && $_SESSION['loiTKB']==1)
											{
												echo "<br><b><i>Tìm kiếm thành công!</i></b>";
												$_SESSION['loiTKB']=0;
											}

										if(isset($_SESSION['loiTKB']) && $_SESSION['loiTKB']==2)
											{
												echo "<br><b><i>Tìm kiếm thất bại (thông tin không được bỏ trống)!</i></b>";
												$_SESSION['loiTKB']=0;
											}
										
									?></a>
				  <br>
					<form action="">
								<table>
									<tr>
										<td></td>
										<td >Thứ 2</td>
										<td >Thứ 3</td>
										<td >Thứ 4</td>
										<td >Thứ 5</td>
										<td >Thứ 6</td>
										<td >Thứ 7</td>
										<td >Chủ Nhật</td>	
									</tr>
										<?php
										$stt=0;
										do
										{
											$stt++;
												?>
												<tr class="">
													<td>Tiết <?=$stt?></td>
													<td><?php 
													
													if($_SESSION['check']!="")
													{

														$sql = " SELECT * FROM tkb, dayhoc WHERE tkb.MaLop= dayhoc.MaLop AND  tkb.MaMon= dayhoc.MaMon AND MaGV= '".$_SESSION['user']."' AND Tuan= '".$_SESSION['Tuan']."' AND Thu= 2 AND Tiet= $stt AND HocKy= '".$_SESSION['HocKy']."' AND NamHoc= '".$_SESSION['Nam']."'  ";											
														$resultT2 = mysqli_query($conn, $sql);
														$rowT2= mysqli_fetch_array($resultT2);
														if(isset($rowT2))
															{
																echo $rowT2['MaLop'];
																echo "<br>";
																echo $rowT2['MaMon'];
															}													
													}
													else
														echo " ";
														?>
													</td>
													<td><?php 

													if($_SESSION['check']!="")
													{
														$sql = " SELECT * FROM tkb, dayhoc WHERE tkb.MaLop= dayhoc.MaLop AND  tkb.MaMon= dayhoc.MaMon AND MaGV= '".$_SESSION['user']."' AND Tuan= '".$_SESSION['Tuan']."' AND Thu= 3 AND Tiet= $stt AND HocKy= '".$_SESSION['HocKy']."' AND NamHoc= '".$_SESSION['Nam']."'  ";
											
														$resultT2 = mysqli_query($conn, $sql);
														$rowT2= mysqli_fetch_array($resultT2);
														if(isset($rowT2))
															{
																echo $rowT2['MaLop'];
																echo "<br>";
																echo $rowT2['MaMon'];
															}
													}
													else
														echo " ";

														?>
														
													</td>
													<td><?php 
													if($_SESSION['check']!="")
													{
														$sql = " SELECT * FROM tkb, dayhoc WHERE tkb.MaLop= dayhoc.MaLop AND  tkb.MaMon= dayhoc.MaMon AND MaGV= '".$_SESSION['user']."' AND Tuan= '".$_SESSION['Tuan']."' AND Thu= 4 AND Tiet= $stt AND HocKy= '".$_SESSION['HocKy']."' AND NamHoc= '".$_SESSION['Nam']."'  ";
											
														$resultT2 = mysqli_query($conn, $sql);
														$rowT2= mysqli_fetch_array($resultT2);
														if(isset($rowT2))
															{
																echo $rowT2['MaLop'];
																echo "<br>";
																echo $rowT2['MaMon'];
															}

														}
														else
															echo " ";
														?>
													</td>
													<td><?php 
													if($_SESSION['check']!="")
													{
														$sql = " SELECT * FROM tkb, dayhoc WHERE tkb.MaLop= dayhoc.MaLop AND  tkb.MaMon= dayhoc.MaMon AND MaGV= '".$_SESSION['user']."' AND Tuan= '".$_SESSION['Tuan']."' AND Thu= 5 AND Tiet= $stt AND HocKy= '".$_SESSION['HocKy']."' AND NamHoc= '".$_SESSION['Nam']."'  ";
											
														$resultT2 = mysqli_query($conn, $sql);
														$rowT2= mysqli_fetch_array($resultT2);
														if(isset($rowT2))
														{
															echo $rowT2['MaLop'];
															echo "<br>";
															echo $rowT2['MaMon'];
														}	

													}
													else
														echo " ";
														?>
													</td>
													<td><?php 
													if($_SESSION['check']!="")
													{
														$sql = " SELECT * FROM tkb, dayhoc WHERE tkb.MaLop= dayhoc.MaLop AND  tkb.MaMon= dayhoc.MaMon AND MaGV= '".$_SESSION['user']."' AND Tuan= '".$_SESSION['Tuan']."' AND Thu= 6 AND Tiet= $stt AND HocKy= '".$_SESSION['HocKy']."' AND NamHoc= '".$_SESSION['Nam']."'  ";
											
														$resultT2 = mysqli_query($conn, $sql);
														$rowT2= mysqli_fetch_array($resultT2);
														if(isset($rowT2))
														{
															echo $rowT2['MaLop'];
															echo "<br>";
															echo $rowT2['MaMon'];
														}

													}
													else
														echo " ";
														?>
													</td>
													<td><?php 
													if($_SESSION['check']!="")
													{
														$sql = " SELECT * FROM tkb, dayhoc WHERE tkb.MaLop= dayhoc.MaLop AND  tkb.MaMon= dayhoc.MaMon AND MaGV= '".$_SESSION['user']."' AND Tuan= '".$_SESSION['Tuan']."' AND Thu= 7 AND Tiet= $stt AND HocKy= '".$_SESSION['HocKy']."' AND NamHoc= '".$_SESSION['Nam']."'  ";
											
														$resultT2 = mysqli_query($conn, $sql);
														$rowT2= mysqli_fetch_array($resultT2);
														if(isset($rowT2))
														{
															echo $rowT2['MaLop'];
															echo "<br>";
															echo $rowT2['MaMon'];
														}

													}
													else
														echo " ";
														?>
													</td>
													<td><?php 
													if($_SESSION['check']!="")
													{
														$sql = " SELECT * FROM tkb, dayhoc WHERE tkb.MaLop= dayhoc.MaLop AND  tkb.MaMon= dayhoc.MaMon AND MaGV= '".$_SESSION['user']."' AND Tuan= '".$_SESSION['Tuan']."' AND Thu= 8 AND Tiet= $stt AND HocKy= '".$_SESSION['HocKy']."' AND NamHoc= '".$_SESSION['Nam']."'  ";
											
														$resultT2 = mysqli_query($conn, $sql);
														$rowT2= mysqli_fetch_array($resultT2);
														if(isset($rowT2))
														{
															echo $rowT2['MaLop'];
															echo "<br>";
															echo $rowT2['MaMon'];
														}

													}
													else
														echo " ";
														?>
													</td>
													
												</tr>
												<?php 
											}while($stt<$countTiet)?>
									
								</table>
						</form>
	           </div>
			</div>
			
		</div>	
    </section>
    <script src="Js/main.js"></script>
</body>
</html>