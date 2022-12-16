<?php
    $loi = false;
    if(isset($_POST['user']) && isset($_POST['pass']) && isset($_POST['submit'])){
        require_once "sql.php";
        $Sql = new SQL();

        $user = $_POST['user'];
        $pass = $_POST['pass'];
        
        checkdata($Sql,$user,$pass,'admin.php',$loi);
                
    }

    if(isset($_COOKIE['checkhs'])){
        if($_COOKIE['checkhs']){
            header("location: ./admin.php");
        }
    }

    function checkdata($sql,$user,$pass,$trang,&$loi)
    {
        $data = $sql->getdata("select * from hocsinh where MaHS = '$user' and pass = '$pass'");

        if($data->num_rows > 0){
            setcookie('checkhs',true,time()+3600);
            $_SESSION['userhs'] = $_POST['user'];
            $_SESSION['passhs'] = $_POST['pass'];
            header("location: ./".$trang."");
            die();
        }
        else{
            $loi = true;
        }
    }
?>