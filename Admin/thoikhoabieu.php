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
    <div class="hidden" id="delete">
        <div class="bk_mo ">
            <div class="box_fun">
                <span class="close"><i class="fas fa-times"></i></span>
                <h2>Thông báo </h2>
                <div id="delete_infor">
                    
                </div>
                <form class="" action="./dangxuat.php" method="post">
                    
                    <div class="submit">
                        <button type="button" id="delete_confirm">Xóa</button>
                    </div>          
                </form>
            </div>
        </div>
    </div>
    <div class="hidden" id="update">
        <div class="bk_mo ">
            <div class="box_fun">
                <span class="close"><i class="fas fa-times"></i></span>
                <h2>Thông báo </h2>
                <div id="resetpass_infor">
                    <label for="MonHoc_tkb_update">Môn hoc: </label>
                    <select name="" id="MonHoc_tkb_update">

                    </select>
                </div>
                <form class="" action="" method="post">
                    
                    <div class="submit">
                        <button type="button" id="resetpass_confirm">Lưu</button>
                    </div>          
                </form>
            </div>
        </div>
    </div>
    <div class="hidden" id="add">
        <div class="bk_mo ">
            <div class="box_fun">
                <span class="close"><i class="fas fa-times"></i></span>
                <h2>Thông báo </h2>
                <div id="resetpass_infor">
                    <label for="MonHoc_tkb_add">Môn hoc: </label>
                    <select name="" id="MonHoc_tkb_add">

                    </select>
                </div>
                <form class="" action="" method="post">
                    
                    <div class="submit">
                        <button type="button" id="add_confirm">Lưu</button>
                    </div>          
                </form>
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
                <li class="li1 "><a href="./admin.php" class="taga"><i class="fas fa-home i_normal " ></i><p >Home</p></a></li>
                <li class="li1"><a href="./namhoc.php" class="taga"><i class="fas fa-vote-yea i_normal"></i><p>Năm học</p></a></li>
                <li class="li1 "><a href="./lophoc.php" class="taga"><i class="fas fa-users i_normal "></i></i><p>Lớp học</p></a></li>
                <li class="li1"><a href="./giaovien.php" class="taga"><i class="fas fa-chalkboard-teacher i_normal"></i><p>Giáo viên</p></a></li>
                <li class="li1"><a href="./hocsinh.php" class="taga"><i class="fas fa-user-graduate i_normal "></i><p>Học sinh</p></a></li>
                <li class="li1"><a href="./monhoc.php" class="taga"><i class="fas fa-tags i_normal"></i><p>Môn học</p></a></li>
                <li class="li1 test"><a href="./thoikhoabieu.php" class="taga"><i class="far fa-calendar-alt i_normal i_to"></i><p class="to">Thời khóa biểu</p></a></li>
                <li class="li1"><a href="./hoc.php" class="taga"><i class="fas fa-book i_normal"></i><p>Học</p></a></li>
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
                        echo $_SESSION['userad'];
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
                            <label for="namhoc">Năm học: </label>
                            <select name="" id="namhoc">
                                <?php
                                    $query_namhoc = "select * from namhoc order by NamHoc desc";
                                    $data_namhoc = $sql->getdata($query_namhoc);
                                    while($row = $data_namhoc->fetch_assoc()){                        
                                        echo "<option value=\"".$row['NamHoc']."\">".$row['NamHoc']."</option>";
                                    }
                                ?>
                            </select>

                            <label for="hocky">Học kỳ: </label>
                            <select name="" id="hocky">
                                <?php
                                    $query_hocky = "select * from hocky";
                                    $data_hocky = $sql->getdata($query_hocky);
                                    while($row = $data_hocky->fetch_assoc()){                        
                                        echo "<option value=\"".$row['HocKy']."\">".$row['HocKy']."</option>";
                                    }
                                    echo "<script>document.getElementById('hocky').value = \"".$hocky_hientai."\"</script>";
                                ?>
                                
                            </select>

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

                            <label for="lophoc">Lớp học: </label>
                            <select name="" id="lophoc">
                                <?php
                                    $query_lophoc = "select * from lophoc where NamHoc = '".$namhoc_hientai."'";
                                    $data_lophoc = $sql->getdata($query_lophoc);
                                    while($row = $data_lophoc->fetch_assoc()){                        
                                        echo "<option value=\"".$row['MaLop']."\">".$row['TenLop']."</option>";
                                    }
                                    $query_lophoc = "select * from lophoc where NamHoc != '".$namhoc_hientai."'";
                                    $data_lophoc = $sql->getdata($query_lophoc);
                                    while($row = $data_lophoc->fetch_assoc()){                        
                                        echo "<option style=\"color: red\" value=\"".$row['MaLop']."\">".$row['TenLop']."</option>";
                                    }

                                ?>
                            </select>
                        </div>
                        <div class="tkb_header_right">
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
                            $lopdautien = $sql->getdata("SELECT MaLop from lophoc where NamHoc = '$namhoc_hientai'")->fetch_assoc()['MaLop'];
                            for($i=1;$i<=10;$i++){
                                $hang =  "<tr height=\"9%\"><th width=\"5%\" class=\"".$i."\">$i</th>";

                                for($j=2;$j<=7;$j++){
                                    $query_tkb_hocsinh = "SELECT * from tkb inner join dayhoc on tkb.MaLop = dayhoc.MaLop and tkb.MaMon = dayhoc.MaMon inner join giaovien on giaovien.MaGV = dayhoc.MaGV inner join monhoc on dayhoc.MaMon = monhoc.MaMon where tkb.NamHoc = '".$namhoc_hientai."' and tkb.HocKy = '".$hocky_hientai."' and Tuan = '".$tuan_hientai."' and tkb.MaLop = '$lopdautien' and Tiet = '$i' and Thu = '$j'";
                                    $data_tkb_hocsinh = $sql->getdata($query_tkb_hocsinh);
                                    if($data_tkb_hocsinh->num_rows>0){
                                        while($row = $data_tkb_hocsinh->fetch_assoc()){
                                            $hang.= "<td id=\"".$j."_".$i."\" align=\"center\" width=\"11.875%\" onclick=\"todam_tkb(this)\">".$row['TenMon']."<br><span>".$row['TenGV']."</span></td>";
                                        }
                                    }
                                    else
                                        $hang.= "<td id=\"".$j."_".$i."\" align=\"center\" width=\"11.875%\" onclick=\"todam_tkb(this)\"></td>";
                                }
                                $hang .= "</tr>";
                                echo $hang;
                                
                            }
                        ?>
                    </table>

                    <div class="sua_tkb" style="width: 100%; display: flex; flex-direction: row-reverse;">
                        <button type="button" id="update_tkb">Sửa</button>
                        <button type="button" id="delete_tkb">Xóa</button>
                        <button type="button" id="add_tkb">Thêm</button>
                    </div>
                </div>
            </div> 
        </div>
    </section>
    <script src="./Js/main.js"></script>
    <script>   
        function todam_tkb(a){
            if(a.className.search('todam_tkb') >= 0){
                a.classList.remove('todam_tkb');
            }
            else{
                var todam = document.getElementsByClassName('todam_tkb');
                if(todam != null){
                    for(var i=0;i<todam.length;i++){
                        todam[i].classList.remove('todam_tkb');
                    }
                    a.classList.add('todam_tkb');
                }
                else{
                    a.classList.add('todam_tkb');
                }
            }                
        }

        function loc(){
            var namhoc = document.getElementById('namhoc');
            var hocky = document.getElementById('hocky');
            var tuan = document.getElementById('tuan');
            var lophoc = document.getElementById('lophoc');
            var get = "NamHoc=" + namhoc.value + "&HocKy=" + hocky.value + "&Tuan=" + tuan.value + "&MaLop=" + lophoc.value+"";
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

        document.getElementById('add_tkb').onclick = function(){
            
            var add = document.getElementsByClassName('todam_tkb');
            if(add.length > 0){
                
                if(add[0].innerHTML==""){
                    var namhoc = document.getElementById('namhoc');
                    var hocky = document.getElementById('hocky');
                    var tuan = document.getElementById('tuan');
                    var lophoc = document.getElementById('lophoc');
                    
                    if(add != null && add[0].innerHTML == ""){
                        var a = add[0].id.split('_');
                        var thu = a[0];
                        var tiet = a[1];
                        var request = new XMLHttpRequest();
                        request.open("get","getdataupdatetkb.php?NamHoc=" + namhoc.value + "&HocKy=" + hocky.value + "&Tuan=" + tuan.value + "&MaLop=" + lophoc.value + "&Thu=" + thu + "&Tiet=" + tiet + "");
                        request.onreadystatechange = function(){
                            if(this.readyState === 4 && this.status === 200){
                                document.getElementById('MonHoc_tkb_add').innerHTML = this.responseText;
                            }
                        }

                        request.send();
                        document.getElementById('add').style.display = 'block';
                    }
                    document.getElementById('add_confirm').onclick = function(){
                        var b = document.getElementById("MonHoc_tkb_add").value.split('_');
                        mamon = b[0]; magv = b[1];
                        get = "NamHoc=" + namhoc.value + "&HocKy=" + hocky.value + "&Tuan=" + tuan.value + "&MaLop=" + lophoc.value + "&Thu=" + thu + "&Tiet=" + tiet + "&MaMon="+ mamon ;
                        var request = new XMLHttpRequest();

                        request.open("get","add_tkb.php?" + get + "");
                        request.onreadystatechange = function(){
                            if(this.readyState === 4 && this.status === 200){
                                document.getElementById('thongbao_chucnang_1').innerHTML = this.responseText;
                            }
                        }
                        
                        request.send();
                        document.getElementById('add').style.display = 'none';
                        document.getElementById('thongbao_chucnang').style.display = 'block';
                        setTimeout(function(){loc()},500);
                    }
                }
                else{
                    document.getElementById('thongbao_chucnang_1').innerHTML =  `
                        <h2 style=\"color: rgb(1, 82, 233);\">Thông báo</h2>
                        <p style=\"font-size: 15px; margin-top: 20px;\">Vui lòng chọn tiết học trống để thêm</p>
                    `;
                    document.getElementById('thongbao_chucnang').style.display = 'block';
                }
                
            }
            else{
                document.getElementById('thongbao_chucnang_1').innerHTML =  `
                    <h2 style=\"color: rgb(1, 82, 233);\">Thông báo</h2>
                    <p style=\"font-size: 15px; margin-top: 20px;\">Bạn chưa tiết học cần thêm</p>
                `;
                document.getElementById('thongbao_chucnang').style.display = 'block';
            }
            

        }

        document.getElementById('update_tkb').onclick = function(){
            var update = document.getElementsByClassName('todam_tkb');
            if(update.length > 0){
                if(update[0].innerHTML!=""){
                    var namhoc = document.getElementById('namhoc');
                    var hocky = document.getElementById('hocky');
                    var tuan = document.getElementById('tuan');
                    var lophoc = document.getElementById('lophoc');
                    var todam = document.getElementsByClassName('todam_tkb');
                    
                    if(todam != null && this.innerHTML != ""){
                        var a = todam[0].id.split('_');
                        var thu = a[0];
                        var tiet = a[1];
                        var request = new XMLHttpRequest();
                        request.open("get","getdataupdatetkb.php?NamHoc=" + namhoc.value + "&HocKy=" + hocky.value + "&Tuan=" + tuan.value + "&MaLop=" + lophoc.value + "&Thu=" + thu + "&Tiet=" + tiet + "");
                        request.onreadystatechange = function(){
                            if(this.readyState === 4 && this.status === 200){
                                document.getElementById('MonHoc_tkb_update').innerHTML = this.responseText;
                            }
                        }

                        request.send();
                        document.getElementById('update').style.display = 'block';
                    }
                    document.getElementById('resetpass_confirm').onclick = function(){
                        var b = document.getElementById("MonHoc_tkb_update").value.split('_');
                        mamon = b[0]; magv = b[1];
                        get = "NamHoc=" + namhoc.value + "&HocKy=" + hocky.value + "&Tuan=" + tuan.value + "&MaLop=" + lophoc.value + "&Thu=" + thu + "&Tiet=" + tiet + "&MaMon="+ mamon +"&MaGV="+ magv +"";
                        var request = new XMLHttpRequest();

                        request.open("get","update_tkb.php?" + get + "");
                        request.onreadystatechange = function(){
                            if(this.readyState === 4 && this.status === 200){
                                document.getElementById('thongbao_chucnang_1').innerHTML = this.responseText;
                            }
                        }
                        
                        request.send();
                        document.getElementById('thongbao_chucnang').style.display = 'block';
                        setTimeout(function(){loc()},500);
                    }
                }
                else{
                    document.getElementById('thongbao_chucnang_1').innerHTML =  `
                        <h2 style=\"color: rgb(1, 82, 233);\">Thông báo</h2>
                        <p style=\"font-size: 15px; margin-top: 20px;\">Ô trống không thể thực hiện chức năng sửa</p>
                    `;
                    document.getElementById('thongbao_chucnang').style.display = 'block';
                }
                
            }
            else{
                document.getElementById('thongbao_chucnang_1').innerHTML =  `
                    <h2 style=\"color: rgb(1, 82, 233);\">Thông báo</h2>
                    <p style=\"font-size: 15px; margin-top: 20px;\">Bạn chưa chọn môn học cần sửa</p>
                `;
                document.getElementById('thongbao_chucnang').style.display = 'block';
            }
            

        }

        document.getElementById('delete_tkb').onclick = function(){
            var update = document.getElementsByClassName('todam_tkb');
            if(update.length > 0){
                if(update[0].innerHTML!=""){
                    var namhoc = document.getElementById('namhoc');
                    var hocky = document.getElementById('hocky');
                    var tuan = document.getElementById('tuan');
                    var lophoc = document.getElementById('lophoc');
                    var todam = document.getElementsByClassName('todam_tkb');
                    
                    if(todam != null && this.innerHTML != ""){
                        var a = todam[0].id.split('_');
                        var thu = a[0];
                        var tiet = a[1];
                        document.getElementById('delete_infor').innerHTML = `
                            <p style="text-align: left ;font-size: 17px; font-weight: 500; color: #5C7AEA">Xác nhận xóa tiết học <span style="color: #FFB319; font-weight: 600; border-bottom: 1px solid #FFB319">${tiet}</span></p>
                        `;
                        document.getElementById('delete').style.display = 'block';
                        document.getElementById('delete_confirm').onclick = function(){
                            var get = "NamHoc=" + namhoc.value + "&HocKy=" + hocky.value + "&Tuan=" + tuan.value + "&MaLop=" + lophoc.value + "&Thu=" + thu + "&Tiet=" + tiet+ "";
                            
                            del('delete_tkb.php',get);
                            document.getElementById('delete').style.display = 'none';
                            setTimeout(function(){loc()},500);
                        }
                    }
                }
                else{
                    document.getElementById('thongbao_chucnang_1').innerHTML =  `
                        <h2 style=\"color: rgb(1, 82, 233);\">Thông báo</h2>
                        <p style=\"font-size: 15px; margin-top: 20px;\">Ô chọn trống không thể thực hiện chức năng xóa</p>
                    `;
                    document.getElementById('thongbao_chucnang').style.display = 'block';
                }
                
            }
            else{
                document.getElementById('thongbao_chucnang_1').innerHTML =  `
                    <h2 style=\"color: rgb(1, 82, 233);\">Thông báo</h2>
                    <p style=\"font-size: 15px; margin-top: 20px;\">Bạn chưa chọn môn học cần xóa</p>
                `;
                document.getElementById('thongbao_chucnang').style.display = 'block';
            }
            

        }
    </script>

</body>
</html>