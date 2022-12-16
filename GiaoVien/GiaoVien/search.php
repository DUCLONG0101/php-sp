<?php
    session_start();
	$_SESSION['loiTKB']=0;
	if(  isset($_POST['submit'])&& $_POST["Tuan"] != ''&& $_POST["Nam"] != ''&& $_POST["HocKy"] != '' ){
		
		$_SESSION['Tuan']= $_POST['Tuan'];
		$_SESSION['Nam']= $_POST['Nam'];
		$_SESSION['HocKy']= $_POST['HocKy'];
		$_SESSION['loiTKB']=1;
		header("location:./TKB.php");	

	}
else {
		$_SESSION['loiTKB']=2;
		header("location:./TKB.php");	
	}

?>
