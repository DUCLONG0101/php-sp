<?php
    session_start();
	$conn = mysqli_connect("localhost","root","","quanlyhocsinh5");
	mysqli_set_charset($conn,"utf8");
	$_SESSION['loiP']=0;
	if(  isset($_POST['submit'])&& $_POST["PassOld"] != ''&& $_POST["PassNew"] != '' && $_POST["RePassNew"] != ''){
		
		$user= $_SESSION['user'];
		$pass= $_SESSION['pass'];
		
		$PassOld= $_POST["PassOld"];
		$PassNew= $_POST["PassNew"];
		$RePassNew= $_POST["RePassNew"];
		
		if( strcasecmp( $pass, $PassOld ) == 0 && strcasecmp( $PassNew, $RePassNew ) == 0)
		{
		
			$sql= "UPDATE giaovien SET Pass= '".$PassNew."' WHERE MaGV ='".$user."' ";
			mysqli_query($conn, $sql);
		
			header("location:./giaovien.php");	
		}
		
		
		if( strcasecmp( $pass, $PassOld ) != 0)
		{
			$_SESSION['loiP']=1;
			header("location:./Pass.php");
		}else if( strcasecmp( $PassNew, $RePassNew )!=0)
				{
					$_SESSION['loiP']=2;
					header("location:./Pass.php");
				}
	}
	else {
		$_SESSION['loiP']=3;
		header("location:./Pass.php");
	}
		

?>