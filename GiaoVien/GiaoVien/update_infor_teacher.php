<?php
    session_start();
	$conn = mysqli_connect("localhost","root","","quanlyhocsinh5");
	mysqli_set_charset($conn,"utf8");
	$_SESSION['loiInf']=0;

		if(!preg_match ("/^[0-9]*$/", $_POST["DienThoai"]) || strlen($_POST ["DienThoai"])<10 )
		{
			$_SESSION['loiInf']=3;
			header("location:./editInformation.php");
		}
			
else{
	if(  isset($_POST['submit'])&& $_POST["DienThoai"] != '' && $_POST["DiaChi"] != ''){
		
		$user= $_SESSION['user'];
		$DienThoai= $_POST["DienThoai"];
		$DiaChi= $_POST["DiaChi"];
		$GhiChu= $_POST["GhiChu"];
		
		$sql= "UPDATE giaovien SET DienThoai= '".$DienThoai."',DiaChi= '".$DiaChi."',
			   GhiChu= '".$GhiChu."' WHERE MaGV ='".$user."' ";
		mysqli_query($conn, $sql);
		
		$_SESSION['loiInf']=2;
		header("location:./editInformation.php");
		
	}else {
		$_SESSION['loiInf']=1;
		header("location:./editInformation.php");
	}
	
}	

?>
