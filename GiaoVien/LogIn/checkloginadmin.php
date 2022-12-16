<?php
    if(isset($_SESSION['userhs']) && isset($_SESSION['passhs'])){
        require_once "sql.php";
        $Sql = new SQL();
        $user = $_SESSION['userhs'];
        $pass = $_SESSION['passhs'];
        checkdata($Sql,$user,$pass);
    }
    else
    {
        if (isset($_SERVER['HTTP_COOKIE'])) {
            $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
            foreach($cookies as $cookie) {
                $parts = explode('=', $cookie);
                $name = trim($parts[0]);
                setcookie($name, '', time()-1000);
                setcookie($name, '', time()-1000, '/');
            }
        }
        header("location: ./");
    }
    function checkdata($sql,$user,$pass)
    {
        $data = $sql->getdata("select * from hocsinh where MaHS = '$user' and pass = '$pass'");

        if($data->num_rows < 1){
            header("location: ./");
            die();
        }
    }
?>