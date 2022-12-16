<?php
session_start();
require_once "../LogIn/checklogin.php";
$_SESSION['MaLopCN'] = $_GET['idMaLopCN'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<link rel="stylesheet" href="./CSS/styleCN.css">
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
				<li class="li1 test"><a href="./giaovien.php" class="taga"><i class="fas fa-home i_normal i_to"></i>
						<p class="to">Home</p>
					</a></li>
				<li class="li1"><a href="./giaovien.php" class="taga"><i class="fas fa-chalkboard-teacher i_normal"></i>
						<p>Giáo viên</p>
					</a></li>
				<li class="li1"><a href="./giaovien.php" class="taga"><i class="fas fa-users i_normal"></i></i>
						<p>Giảng dạy</p>
					</a></li>
				<li class="li1"><a href="./giaovien.php" class="taga"><i class="fas fa-user-graduate i_normal"></i>
						<p>Học sinh</p>
					</a></li>
				<li class="li1"><a href="../GiaoVien/index.php" class="taga"><i class="fas fa-sign-out-alt i_normal"></i>
						<p>Đăng xuất</p>
					</a></li>
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
					echo $hoten->get_item('giaovien', 'TenGV', $_SESSION['user'], $_SESSION['pass'], 'MaGV');
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
							$countClass = $lop->get_item('giaovien', 'MaGV', $_SESSION['user'], $_SESSION['pass'], 'MaGV');
							echo $countClass . "";
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
							$countTeacher = $lop->get_item_countLike('dayhoc', 'MaGV', $_SESSION['user']);
							echo $countTeacher . "_lớp";
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
							echo $countStudent . "_hs";
							?>
						</p>
					</div>
				</div>
			</div>


			<div class="content">
				<div class="content_home">
					<?php
					$conn = mysqli_connect('localhost', 'root', '', 'quanlyhocsinh5') or die('không thể kết nối tới database');
					mysqli_set_charset($conn, "utf8");
					$sql = "SELECT * FROM danhgia INNER JOIN hocsinh ON danhgia.MaHS= hocsinh.MaHS WHERE  MaLop= '" . $_SESSION['MaLopCN'] . "' ";
					$result = mysqli_query($conn, $sql);

					$sql_namhoc = "SELECT NamHoc from lophoc where MaLop = '".$_GET['idMaLopCN']."'";
					$namhoc = mysqli_query($conn, $sql_namhoc)->fetch_assoc()['NamHoc'];

					?>

					<a href="#">
						<h1>Bảng đánh giá (mã lớp: <?php echo $_GET['idMaLopCN'] . ")" ?></h1>
					</a><br>

					<form action="">
						<table>
							<tr>
								<td>STT</td>
								<td>MaHS</td>
								<td>Tên học sinh</td>

								<td>Hạnh kiểm</td>
								<td>Học lực</td>
								<td>Xếp loại</td>
								<td>Thông tin cá nhân</td>
							</tr>
								
							<?php
							$stt = 0;
							while ($row = mysqli_fetch_array($result)) {
								$stt++;

							?>
								<tr>
									<td><?= $stt ?></td>
									<td><?= $row['MaHS'] ?></td>
									<td class="TenHS"><?= $row['TenHS'] ?></td>
									<td><?= $row['HanhKiem'] ?></td>

									<td>
										<?php
										$check = 0;
										$checkGioi = 0;
										$checkKha = 0;
										$checkTB = 0;
										$checkYeu = 0;
										$dem = 0;
										$tong = 0;
										$sqlcheck = "SELECT * FROM diem WHERE  MaHS= '" . $row['MaHS'] . "' and MaLop = '".$_GET['idMaLopCN']."'";
										$resultcheck = mysqli_query($conn, $sqlcheck);
										while ($rowcheck = mysqli_fetch_array($resultcheck)) {
											if ($rowcheck['DiemTbMon'] == -1) {
												$check = 1;
												break;
											} else
												$dem++;
										}
										//											checkGioi
										$sqlcheck = "SELECT * FROM diem WHERE  MaHS= '" . $row['MaHS'] . "' and MaLop = '".$_GET['idMaLopCN']."'";
										$resultcheck = mysqli_query($conn, $sqlcheck);
										while ($rowcheck = mysqli_fetch_array($resultcheck)) {
											if ($rowcheck['DiemTbMon'] < 6.5) {
												$checkGioi = 1;
												break;
											}
										}
										//											checkKha
										$sqlcheck = "SELECT * FROM diem WHERE  MaHS= '" . $row['MaHS'] . "' and MaLop = '".$_GET['idMaLopCN']."'";
										$resultcheck = mysqli_query($conn, $sqlcheck);
										while ($rowcheck = mysqli_fetch_array($resultcheck)) {
											if ($rowcheck['DiemTbMon'] < 5) {
												$checkKha = 1;
												break;
											}
										}
										//											checkTB
										$sqlcheck = "SELECT * FROM diem WHERE  MaHS= '" . $row['MaHS'] . "' and MaLop = '".$_GET['idMaLopCN']."'";
										$resultcheck = mysqli_query($conn, $sqlcheck);
										while ($rowcheck = mysqli_fetch_array($resultcheck)) {
											if ($rowcheck['DiemTbMon'] < 3.5) {
												$checkTB = 1;
												break;
											}
										}
										//											checkYeu
										$sqlcheck = "SELECT * FROM diem WHERE  MaHS= '" . $row['MaHS'] . "' and MaLop = '".$_GET['idMaLopCN']."'";
										$resultcheck = mysqli_query($conn, $sqlcheck);
										while ($rowcheck = mysqli_fetch_array($resultcheck)) {
											if ($rowcheck['DiemTbMon'] < 2) {
												$checkYeu = 1;
												break;
											}
										}
										//-----------------------------------
										if ($check == 0) {
											$sqlDiem = "SELECT * FROM diem WHERE  MaHS= '" . $row['MaHS'] . "' and MaLop = '".$_GET['idMaLopCN']."'";
											$resultDiem = mysqli_query($conn, $sqlDiem);
											while ($rowDiem = mysqli_fetch_array($resultDiem)) {
												$tong += $rowDiem['DiemTbMon'];
											}

											$HL = $tong / $dem;
											$sql = "UPDATE diemtbnam SET DiemTBNam= '".$HL."' WHERE MaHS= '" . $row['MaHS'] . "' and NamHoc = '".$namhoc."'";
											mysqli_query($conn, $sql);

											if ($HL >= 8 && $checkGioi == 0) {
												echo "Giỏi";
												$sql = "UPDATE danhgia SET HocLuc= 'Giỏi' WHERE MaHS= '" . $row['MaHS'] . "' and MaLop = '".$_GET['idMaLopCN']."'";
												mysqli_query($conn, $sql);
											}

											if ($HL >= 8 && $checkGioi == 1) {
												echo "Khá";
												$sql = "UPDATE danhgia SET HocLuc= 'Khá' WHERE MaHS= '" . $row['MaHS'] . "' and MaLop = '".$_GET['idMaLopCN']."'";
												mysqli_query($conn, $sql);
											}

											if ($HL > 6.5 && $HL < 7.9 && $checkKha == 0) {
												echo "Khá";
												$sql = "UPDATE danhgia SET HocLuc= 'Khá' WHERE MaHS= '" . $row['MaHS'] . "' and MaLop = '".$_GET['idMaLopCN']."'";
												mysqli_query($conn, $sql);
											}
											if ($HL > 6.5 && $HL < 7.9 && $checkKha == 1) {
												echo "Trung bình";
												$sql = "UPDATE danhgia SET HocLuc= 'Trung bình' WHERE MaHS= '" . $row['MaHS'] . "' and MaLop = '".$_GET['idMaLopCN']."'";
												mysqli_query($conn, $sql);
											}

											if ($HL > 5 && $HL < 6.4 && $checkTB == 0) {
												echo "Trung bình";
												$sql = "UPDATE danhgia SET HocLuc= 'Trung bình' WHERE MaHS= '" . $row['MaHS'] . "' and MaLop = '".$_GET['idMaLopCN']."'";
												mysqli_query($conn, $sql);
											}
											if ($HL > 5 && $HL < 6.4 && $checkTB == 1) {
												echo "Yếu";
												$sql = "UPDATE danhgia SET HocLuc= 'Yếu' WHERE MaHS= '" . $row['MaHS'] . "' and MaLop = '".$_GET['idMaLopCN']."'";
												mysqli_query($conn, $sql);
											}


											if ($HL > 3.5 && $HL < 4.9 && $checkYeu == 0) {
												echo "Yếu";
												$sql = "UPDATE danhgia SET HocLuc= 'Yếu' WHERE MaHS= '" . $row['MaHS'] . "' and MaLop = '".$_GET['idMaLopCN']."'";
												mysqli_query($conn, $sql);
											}
											if ($HL > 3.5 && $HL < 4.9 && $checkYeu == 1) {
												echo "Kém";
												$sql = "UPDATE danhgia SET HocLuc= 'Kém' WHERE MaHS= '" . $row['MaHS'] . "' and MaLop = '".$_GET['idMaLopCN']."'";
												mysqli_query($conn, $sql);
											}

											if ($HL < 3.5) {
												echo "Kém";
												$sql = "UPDATE danhgia SET HocLuc= 'Kém' WHERE MaHS= '" . $row['MaHS'] . "' and MaLop = '".$_GET['idMaLopCN']."'";
												mysqli_query($conn, $sql);
											}
										} else
											echo "";
										?>

									</td>

									<td>
										<!--											<?= $row['XepLoai'] ?>-->
										<?php
										$KT = 0;

										$sqlXL = "SELECT * FROM danhgia WHERE  MaHS= '" . $row['MaHS'] . "' and MaLop = '".$_GET['idMaLopCN']."'";
										$resultXL = mysqli_query($conn, $sqlXL);
										while ($rowXL = mysqli_fetch_array($resultXL)) {
											if (strcmp($rowXL['HanhKiem'], 'Tốt') == 0 && strcmp($rowXL['HocLuc'], 'Giỏi') == 0) {
												$KT = 1;
												$XL = "Giỏi";
												echo "Giỏi";
											}
											if (strcmp($rowXL['HanhKiem'], 'Khá') == 0 && strcmp($rowXL['HocLuc'], 'Giỏi') == 0) {
												$KT = 1;
												$XL = "Khá";
												echo "Khá";
											}
											if (strcmp($rowXL['HanhKiem'], 'Trung bình') == 0 && strcmp($rowXL['HocLuc'], 'Giỏi') == 0) {
												$KT = 1;
												$XL = "Khá";
												echo "Khá";
											}
											if (strcmp($rowXL['HanhKiem'], 'Yếu') == 0 && strcmp($rowXL['HocLuc'], 'Giỏi') == 0) {
												$KT = 1;
												$XL = "Khá";
												echo "Khá";
											}

											if (strcmp($rowXL['HanhKiem'], 'Tốt') == 0 && strcmp($rowXL['HocLuc'], 'Khá') == 0) {
												$KT = 1;
												$XL = "Khá";
												echo "Khá";
											}
											if (strcmp($rowXL['HanhKiem'], 'Khá') == 0 && strcmp($rowXL['HocLuc'], 'Khá') == 0) {
												$KT = 1;
												$XL = "Khá";
												echo "Khá";
											}
											if (strcmp($rowXL['HanhKiem'], 'Trung bình') == 0 && strcmp($rowXL['HocLuc'], 'Khá') == 0) {
												$KT = 1;
												$XL = "Trung Binh";
												echo "Trung Binh";
											}
											if (strcmp($rowXL['HanhKiem'], 'Yếu') == 0 && strcmp($rowXL['HocLuc'], 'Khá') == 0) {
												$KT = 1;
												$XL = "Trung Binh";
												echo "Trung Binh";
											}
											if (strcmp($rowXL['HanhKiem'], 'Kém') == 0 && strcmp($rowXL['HocLuc'], 'Khá') == 0) {
												$KT = 1;
												$XL = "Trung Binh";
												echo "Trung Binh";
											}

											if (strcmp($rowXL['HanhKiem'], 'Tốt') == 0 && strcmp($rowXL['HocLuc'], 'Trung bình') == 0) {
												$KT = 1;
												$XL = "Trung Binh";
												echo "Trung Binh";
											}
											if (strcmp($rowXL['HanhKiem'], 'Khá') == 0 && strcmp($rowXL['HocLuc'], 'Trung bình') == 0) {
												$KT = 1;
												$XL = "Trung Binh";
												echo "Trung Binh";
											}
											if (strcmp($rowXL['HanhKiem'], 'Trung bình') == 0 && strcmp($rowXL['HocLuc'], 'Trung bình') == 0) {
												$KT = 1;
												$XL = "Trung Binh";
												echo "Trung Binh";
											}
											if (strcmp($rowXL['HanhKiem'], 'Yếu') == 0 && strcmp($rowXL['HocLuc'], 'Trung bình') == 0) {
												$KT = 1;
												$XL = "Yếu";
												echo "Yếu";
											}
											if (strcmp($rowXL['HanhKiem'], 'Kém') == 0 && strcmp($rowXL['HocLuc'], 'Trung bình') == 0) {
												$KT = 1;
												$XL = "Yếu";
												echo "Yếu";
											}

											if (strcmp($rowXL['HanhKiem'], 'Tốt') == 0 && strcmp($rowXL['HocLuc'], 'Yếu') == 0) {
												$KT = 1;
												$XL = "Yếu";
												echo "Yếu";
											}
											if (strcmp($rowXL['HanhKiem'], 'Khá') == 0 && strcmp($rowXL['HocLuc'], 'Yếu') == 0) {
												$KT = 1;
												$XL = "Yếu";
												echo "Yếu";
											}
											if (strcmp($rowXL['HanhKiem'], 'Trung bình') == 0 && strcmp($rowXL['HocLuc'], 'Yếu') == 0) {
												$KT = 1;
												$XL = "Yếu";
												echo "Yếu";
											}
											if (strcmp($rowXL['HanhKiem'], 'Yếu') == 0 && strcmp($rowXL['HocLuc'], 'Yếu') == 0) {
												$KT = 1;
												$XL = "Yếu";
												echo "Yếu";
											}
											if (strcmp($rowXL['HanhKiem'], 'Kém') == 0 && strcmp($rowXL['HocLuc'], 'Yếu') == 0) {
												$KT = 1;
												$XL = "Kém";
												echo "Kém";
											}

											if (strcmp($rowXL['HocLuc'], 'Kém') == 0) {
												$KT = 1;
												$XL = "Kém";
												echo "Kém";
											}

											if ($KT == 1) {
												$sql = "UPDATE danhgia SET XepLoai= '" . $XL . "' WHERE MaHS= '" . $row['MaHS'] . "' and MaLop = '".$_GET['idMaLopCN']."'";
												mysqli_query($conn, $sql);
											}
										}
										?>
									</td>

									<td><a href='viewStudent.php?idMaHS=<?= $row['MaHS'] ?>'>Xem</a></td>
								</tr>
							<?php

							} ?>
						</table>
						<p style="text-align: center; margin-top: 20px;">
							<td><a style=" border: 1px solid gray; border-radius:2px; padding: 5px 5px; margin: 0px auto; background-color: aliceblue" href='editDanhGia.php?'>Cập nhật</a></td>
						</p>
					</form>
				</div>
			</div>
		</div>
	</section>
	<script src="Js/main.js"></script>
</body>

</html>