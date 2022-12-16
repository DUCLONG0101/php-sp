<?php
    session_start();
	$conn = mysqli_connect("localhost","root","","quanlyhocsinh5");
	mysqli_set_charset($conn,"utf8");

	$sql = "SELECT * FROM hocsinh, diem WHERE  hocsinh.MaHS = diem.MaHS 
	AND MaLop= '".$_SESSION['MaLop']."' AND MaMon= '".$_SESSION['MaMon']."' ORDER BY TenHS ";
	$result = mysqli_query($conn, $sql);

	$stt=0;
	while($row= mysqli_fetch_array($result))
	{
		$stt++;
		$point15_HK1="point15_HK1".$stt."";

		if($_POST[$point15_HK1]!="" && $_POST[$point15_HK1]<=10 && $_POST[$point15_HK1]>=0)
		{
			$sql= "UPDATE diem SET Diem15PhutHK1= '".$_POST[$point15_HK1]."'
				   WHERE MaHS ='".$row['MaHS']."' AND MaMon='".$_SESSION['MaMon']."' ";
			mysqli_query($conn, $sql);
		}
		
	}
		header("location:./point.php?idMaLop=".$_SESSION['MaLop']."&idMaMon=".$_SESSION['MaMon']."");

?>
