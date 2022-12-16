<?php
    $loi = false;
    if(isset($_POST['user']) && isset($_POST['pass']) && isset($_POST['submit'])){
        require_once "sql.php";
        $Sql = new SQL('quanlyhocsinh5');
        $_SESSION['user'] = $_POST['user'];
        $_SESSION['pass'] = $_POST['pass'];

        $user = $_SESSION['user'];
        $pass = $_SESSION['pass'];
        if($_SESSION['power'] == 'hs'){
            checkdata($Sql,'hocsinh',$user,$pass,'MaHS','hocsinh.php',$loi);
        }
        if($_SESSION['power'] == 'gv'){
            checkdata($Sql,'giaovien',$user,$pass,'MaGV','giaovien.php',$loi);
        }
        if($_SESSION['power'] == 'admin'){
            checkdata($Sql,'admin',$user,$pass,'UserName','admin.php',$loi);
        }        
    }

    if(isset($_COOKIE['check'])){
        if($_COOKIE['check']){
            if($_SESSION['power'] == 'hs'){
                header("location: ./hocsinh.php");
            }
            if($_SESSION['power'] == 'gv'){
                header("location: ./giaovien.php");
            }
            if($_SESSION['power'] == 'admin'){
                header("location: ./admin.php");
            }     
        }
    }

    function checkdata($sql,$bang,$user,$pass,$id,$trang,&$loi)
    {
        $data = $sql->getdata("select * from ".$bang." where ".$id." = '$user' and Pass = '$pass'");

        if($data->num_rows > 0){
            setcookie('check',true,time()+3600);
            header("location: ./".$trang."");
            die();
        }
        else{
            $loi = true;
        }
    }
?>