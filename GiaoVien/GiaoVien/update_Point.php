<?php
    session_start();
	$conn = mysqli_connect("localhost","root","","quanlyhocsinh5");
	mysqli_set_charset($conn,"utf8");
	$_SESSION['loi1']=0;
	$_SESSION['loi2']=0;
	$_SESSION['loi3']=0;
	$_SESSION['loi4']=0;
	$_SESSION['loi5']=0;
	$_SESSION['loi6']=0;
	$_SESSION['loi7']=0;
	$_SESSION['loi8']=0;


	if(  isset($_POST['submit']))
{		
		if( $_POST["point15_HK1"] != ''&& $_POST["point15_HK1"]>=0 && $_POST["point15_HK1"]<=10)
			{
			
			$_15_HK1= $_POST["point15_HK1"];
			$sql= "UPDATE diem 
				   SET Diem15PhutHK1= '".$_15_HK1."'
				   WHERE MaHS ='".$_SESSION['MaHS']."' AND MaMon='".$_SESSION['MaMon']."' ";
			mysqli_query($conn, $sql);	
			$_SESSION['loi1']=1;
		   }

		if( $_POST["point45_HK1"] != '' && $_POST["point45_HK1"]>=0 && $_POST["point45_HK1"]<=10)
			{
			
			$_45_HK1= $_POST["point45_HK1"];
			$sql= "UPDATE diem 
				   SET Diem1TietHK1= '".$_45_HK1."'
				   WHERE MaHS ='".$_SESSION['MaHS']."' AND MaMon='".$_SESSION['MaMon']."' ";
			mysqli_query($conn, $sql);
			$_SESSION['loi2']=1;
		   }
		
		if( $_POST["pointGK_HK1"] != '' && $_POST["pointGK_HK1"]>=0 && $_POST["pointGK_HK1"]<=10)
			{
			
			$GK_HK1= $_POST["pointGK_HK1"];
			$sql= "UPDATE diem 
				   SET DiemGiuaKyHK1= '".$GK_HK1."'
				   WHERE MaHS ='".$_SESSION['MaHS']."' AND MaMon='".$_SESSION['MaMon']."' ";
			mysqli_query($conn, $sql);
			$_SESSION['loi3']=1;
		   }
			
		
		if( $_POST["pointCK_HK1"] != '' && $_POST["pointCK_HK1"]>=0 && $_POST["pointCK_HK1"]<=10)
			{
			
			$CK_HK1= $_POST["pointCK_HK1"];
			$sql= "UPDATE diem 
				   SET DiemCuoiKyHK1= '".$CK_HK1."'
				   WHERE MaHS ='".$_SESSION['MaHS']."' AND MaMon='".$_SESSION['MaMon']."' ";
			mysqli_query($conn, $sql);
			$_SESSION['loi4']=1;
		   }
			
		//
		if( $_POST["point15_HK2"] != '' && $_POST["point15_HK2"]>=0 && $_POST["point15_HK2"]<=10)
			{
			
			$_15_HK2= $_POST["point15_HK2"];
			$sql= "UPDATE diem 
				   SET Diem15PhutHK2= '".$_15_HK2."'
				   WHERE MaHS ='".$_SESSION['MaHS']."' AND MaMon='".$_SESSION['MaMon']."' ";
			mysqli_query($conn, $sql);
			$_SESSION['loi5']=1;
		   }
			
	
		if( $_POST["point45_HK2"] != '' && $_POST["point45_HK2"]>=0 && $_POST["point45_HK2"]<=10)
			{
			
			$_45_HK2= $_POST["point45_HK2"];
			$sql= "UPDATE diem 
				   SET Diem1TietHK2= '".$_15_HK1."'
				   WHERE MaHS ='".$_SESSION['MaHS']."' AND MaMon='".$_SESSION['MaMon']."' ";
			mysqli_query($conn, $sql);
			$_SESSION['loi6']=1;
		   }
			
		
		if( $_POST["pointGK_HK2"] != '' && $_POST["pointGK_HK2"]>=0 && $_POST["pointGK_HK2"]<=10)
			{
			
			$GK_HK1= $_POST["pointGK_HK2"];
			$sql= "UPDATE diem 
				   SET DiemGiuaKyHK2= '".$GK_HK1."'
				   WHERE MaHS ='".$_SESSION['MaHS']."' AND MaMon='".$_SESSION['MaMon']."' ";
			mysqli_query($conn, $sql);
			$_SESSION['loi7']=1;
		   }
			 
		
		if( $_POST["pointCK_HK2"] != '' && $_POST["pointCK_HK2"]>=0 && $_POST["pointCK_HK2"]<=10)
			{
			
			$CK_HK1= $_POST["pointCK_HK2"];
			$sql= "UPDATE diem 
				   SET DiemCuoiKyHK2= '".$CK_HK1."'
				   WHERE MaHS ='".$_SESSION['MaHS']."' AND MaMon='".$_SESSION['MaMon']."' ";
			mysqli_query($conn, $sql);
			$_SESSION['loi8']=1;
		   }
			
		
		if( $_POST["GhiChu"] != '' )
			{
			
			$GhiChu= $_POST["GhiChu"];
			$sql= "UPDATE diem 
				   SET GhiChu= '".$GhiChu."'
				   WHERE MaHS ='".$_SESSION['MaHS']."' AND MaMon='".$_SESSION['MaMon']."' ";
			mysqli_query($conn, $sql);
		   }

		if($_POST["point15_HK1"] != '' && $_POST["point15_HK1"]<0 || $_POST["point15_HK1"] >10)
			$_SESSION['loi1']=2;
		
		if($_POST["point45_HK1"] != '' && $_POST["point45_HK1"]<0 || $_POST["point15_HK1"] >10)
			$_SESSION['loi2']=2;
		
		if($_POST["pointGK_HK1"] != '' && $_POST["pointGK_HK1"]<0 || $_POST["point15_HK1"] >10)
			$_SESSION['loi3']=2;
		
		if($_POST["pointCK_HK1"] != '' && $_POST["pointCK_HK1"]<0 || $_POST["point15_HK1"] >10)
			$_SESSION['loi4']=2;

		if($_POST["point15_HK2"] != '' && $_POST["point15_HK2"]<0 || $_POST["point15_HK1"] >10)
			$_SESSION['loi5']=2;

		if($_POST["point45_HK2"] != '' && $_POST["point45_HK2"]<0 || $_POST["point15_HK1"] >10)
			$_SESSION['loi6']=2;
		
		if($_POST["pointGK_HK2"] != '' && $_POST["pointGK_HK2"]<0 || $_POST["point15_HK1"] >10)
			$_SESSION['loi7']=2;
		
		if($_POST["pointCK_HK2"] != '' && $_POST["pointCK_HK2"]<0 || $_POST["point15_HK1"] >10)
			$_SESSION['loi8']=2;
		
			header("location:./editPoint.php?idMaHS=".$_SESSION['MaHS']."");
}

?>
