<?php
    if(isset($_SESSION['user']) && isset($_SESSION['pass'])){
        require_once "sql.php";
        $Sql = new SQL('quanlyhocsinh5');
        $user = $_SESSION['user'];
        $pass = $_SESSION['pass'];
        if($_SESSION['power'] == 'hs'){
            checkdata($Sql,'hocsinh',$user,$pass,'MaHS','hocsinh.php');
        }
        if($_SESSION['power'] == 'gv'){
            checkdata($Sql,'giaovien',$user,$pass,'MaGV','giaovien.php');
        }
        if($_SESSION['power'] == 'admin'){
            checkdata($Sql,'admin',$user,$pass,'UserName','admin.php');
        }        
    }
    else
        header("location: ./");

    function checkdata($sql,$bang,$user,$pass,$id,$trang)
    {
        $data = $sql->getdata("select * from ".$bang." where ".$id." = '$user' and Pass = '$pass'");

        if($data->num_rows < 1){
            $_COOKIE['check'] = 'false';
            header("location: ./");
            die();
        }
        else
            $_COOKIE['check'] = 'true';
    }
?>