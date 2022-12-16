<?php
    session_start();
    require_once "./LogIn/checkloginadmin.php";
    require_once "./LogIn/sql.php";
    require_once "./infor_general.php";
    $sql = new SQL();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <link rel="stylesheet" href="./Css/style.css">
    <title>Document</title>
    <script>


    </script>
</head>
<body>
    <div class="hidden" id="thongbao_chucnang" style="z-index: 1000;">
        <div class="bk_mo ">
            <div class="box_fun">
                <span class="close"><i class="fas fa-times"></i></span>
                <div id="thongbao_chucnang_1">
                    
                </div>
            </div>
        </div>
    </div>
    <div class="hidden" id="logout">
        <div class="bk_mo ">
            <div class="box_fun">
                <span class="close"><i class="fas fa-times"></i></span>
                <h2>Đăng xuất </h2>
                <form class="" action="./dangxuat.php" method="post">
                    
                    <div class="submit">
                        <button>Xác nhận đăng xuất</button>
                    </div>          
                </form>
            </div>
        </div>
    </div>
    <nav>
        <div class="menu_top">
            <i class="fas fa-bookmark"></i>
            <p>Education</p>
        </div>
        <div class="menu_mid">
            <ul class="menu_main">
                <li class="li1"><a href="./admin.php" class="taga"><i class="fas fa-home i_normal" ></i><p>Home</p></a></li>
                <li class="li1"><a href="./lophoc.php" class="taga"><i class="fas fa-users i_normal"></i></i><p>Lớp học</p></a></li>
                <li class="li1 test"><a href="./thoikhoabieu.php" class="taga"><i class="far fa-calendar-alt i_normal i_to"></i><p class="to">Thời khóa biểu</p></a></li>
                <li class="li1"><a href="./bangdiem.php" class="taga"><i class="fas fa-chalkboard-teacher i_normal"></i><p>Bảng điểm</p></a></li>
                <li class="li1"><a href="./canhan.php" class="taga"><i class="fas fa-user i_normal"></i><p>Cá nhân</p></a></li>
                <li class="li1"><a href="#" id="logout_btn" class="taga"><i class="fas fa-sign-out-alt i_normal"></i><p>Đăng xuất</p></a></li>
            </ul>
        </div>
        <!-- <div class="menu_img"></div> -->
    </nav>
    <section>
        <header>
            <div class="account">
                <p> 
                    <?php
                        echo $tenhs_hientai;
                    ?>
                </p>
                <i class="fas fa-user"></i>
            </div>
            <div>
                <h1>Quản lý học sinh</h1>
            </div>
        </header>
        <div class="con">
        <div class="menu">
                <div class="infor_main infor_class">
                    <img src="Img/class.svg" alt="">
                    <div class="infor_content">
                        <h1>Lớp học</h1>
                        <p>
                            <?php echo $solop ?>
                        </p>
                    </div>
                </div>
                <div class="infor_main infor_teacher">
                    <img src="Img/teacher.svg" alt="">
                    <div class="infor_content">
                        <h1>Giáo viên</h1>
                        <p>
                            <?php echo $sogv ?>
                        </p>
                    </div>
                </div>
                <div class="infor_main infor_student">
                    <img src="Img/student.svg" alt="">
                    <div class="infor_content">
                        <h1>Học sinh</h1>
                        <p>
                            <?php echo $sohs ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="noidungcontent_tkb">
                    <div class="tkb_header">
                        <div class="tkb_header_left">
                            <p style="font-weight: 500; font-size: 18px; display: inline;">Mã lớp: </p>
                            <input type="text" id="malop_tkb" disabled value="<?php echo $malop ?>">
                        </div>
                        <div class="tkb_header_right">
                            <label for="tuan">Tuần: </label>
                            <select name="" id="tuan">
                                <?php
                                    $query_tuan = "select * from tuan";
                                    $data_tuan = $sql->getdata($query_tuan);
                                    while($row = $data_tuan->fetch_assoc()){                        
                                        echo "<option value=\"".$row['Tuan']."\">".$row['Tuan']."</option>";
                                    }
                                    echo "<script>document.getElementById('tuan').value = \"".$tuan_hientai."\"</script>";
                                ?>
                            </select>
                            <button type="button" id="loc_tkb">Lọc</button>
                        </div>
                    </div>
                    
                    <table width="100%" >
                        <tr>
                            <th width="5%" style="font-size: 15.5px;">Tiết | Thứ</th>
                            <th width="11.875%">2</th>
                            <th width="11.875%">3</th>
                            <th width="11.875%">4</th>
                            <th width="11.875%">5</th>
                            <th width="11.875%">6</th>
                            <th width="11.875%">7</th>
                        </tr>
                    </table>
                    <table  width="100%" height="80%" id="data_tkb">
                        <?php
                            for($i=1;$i<=10;$i++){
                                $hang =  "<tr height=\"9%\"><th width=\"5%\" class=\"".$i."\">$i</th>";

                                for($j=2;$j<=7;$j++){
                                    $query_tkb_hocsinh = "SELECT * from tkb inner join dayhoc on tkb.MaLop = dayhoc.MaLop and tkb.MaMon = dayhoc.MaMon inner join giaovien on giaovien.MaGV = dayhoc.MaGV inner join monhoc on dayhoc.MaMon = monhoc.MaMon where tkb.NamHoc = '".$namhoc_hientai."' and tkb.HocKy = '".$hocky_hientai."' and Tuan = '".$tuan_hientai."' and tkb.MaLop = '".$malop."' and Tiet = '$i' and Thu = '$j'";
                                    $data_tkb_hocsinh = $sql->getdata($query_tkb_hocsinh);
                                    if($data_tkb_hocsinh->num_rows>0){
                                        while($row = $data_tkb_hocsinh->fetch_assoc()){
                                            $hang.= "<td id=\"".$j."_".$i."\" align=\"center\" width=\"11.875%\">".$row['TenMon']."<br><span>".$row['TenGV']."</span></td>";
                                        }
                                    }
                                    else
                                        $hang.= "<td id=\"".$j."_".$i."\" align=\"center\" width=\"11.875%\"></td>";
                                }
                                $hang .= "</tr>";
                                echo $hang;
                                
                            }
                        ?>
                    </table>
                </div>
            </div> 
        </div>
    </section>
    <script src="./Js/main.js"></script>
    <script>   

        function loc(){
            var malop = document.getElementById('malop_tkb');
            var get = "&Tuan=" + tuan.value + "&MaLop=" + malop.value;
            var request = new XMLHttpRequest();
            request.open("get","loc_tkb.php?"+get+"");
            request.onreadystatechange = function(){
                if(this.readyState === 4 && this.status === 200){
                    document.getElementById('data_tkb').innerHTML = this.responseText;
                }
            }

            request.send();
        }

        document.getElementById('loc_tkb').onclick = function(){
            loc();
        }
    </script>

</body>
</html>