<?php
    session_start();
	$conn = mysqli_connect("localhost","root","","quanlyhocsinh5");
	mysqli_set_charset($conn,"utf8");
	$_SESSION['loiDG']=0;
	$check=0;
	if(  isset($_POST['submit']) )
	{

		$sql = "SELECT * FROM danhgia INNER JOIN hocsinh ON danhgia.MaHS= hocsinh.MaHS WHERE  MaLop= '".$_SESSION['MaLopCN']."' ";
		$result = mysqli_query($conn, $sql);
		$stt=0;
		while($row= mysqli_fetch_array($result))
		{
			$stt++;
			$HanhKiem="HanhKiem".$stt."";
			if($_POST[$HanhKiem]!='')
			{
				$sql= "UPDATE danhgia SET HanhKiem= '".$_POST[$HanhKiem]."' WHERE MaHS ='".$row['MaHS']."' and MaLop = '".$_SESSION['MaLopCN']."'";
				mysqli_query($conn, $sql);
				$_SESSION['loiDG']=1;
				$check=1;
			}
			
		}
		if($check==0)
			$_SESSION['loiDG']=2;
		header("location:editDanhGia.php?idMaHS=".$_SESSION['MaHS_CN']."");	
	}

?>
