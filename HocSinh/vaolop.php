<?php
    session_start();
    require_once "./LogIn/checkloginadmin.php";
    require_once "./LogIn/sql.php";
    require_once "./infor_general.php";
    $sql = new SQL();
    if(!isset($_GET['MaLop'])){
        header("location: ./");
    }
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
                <li class="li1 test"><a href="./lophoc.php" class="taga"><i class="fas fa-users i_normal i_to"></i></i><p class="to">Lớp học</p></a></li>
                <li class="li1"><a href="./thoikhoabieu.php" class="taga"><i class="far fa-calendar-alt i_normal"></i><p>Thời khóa biểu</p></a></li>
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
            <div class="chucnang">
                    <div class="chucnangchinh">
                        <input type="button" value="Vào lớp" id="vaolop">
                    </div>
                    <div class="timkiem"></div>
                </div>
                <div class="content_content">
                    
                    <table class="tenbang" cellspacing="0" width="100%" style="margin-bottom: 5px; width: calc(100%-15px);">
                        <tr class="bangtieude">
                            <th width="5%" >Stt</th>
                            <th width="12%">Mã lớp</th>
                            <th width="15%">Tên lớp</th>
                            <th width="25%">Giáo viên</th>
                            <th width="7%">Sĩ số</th>
                            <th width="12%">Năm học</th>
                            <th width="15%">Ghi chú</th>                            
                        </tr>
                    </table>
                    <div class="thongtinbang">
                        <table id="table_class" class="bangnd" border="1" cellspacing="0" width="100%">
                            
                            <?php
                                $query = "SELECT lophoc_hocsinh.MaLop, TenLop, TenGV, SiSo, NamHoc, lophoc.GhiChu from lophoc inner join giaovien on lophoc.MaGV = giaovien.MaGV inner join lophoc_hocsinh on lophoc_hocsinh.MaLop = lophoc.MaLop  where MaHS = '".$_SESSION['userhs']."'";
                                $data_lophoc_bang = $sql->getdata($query);
                                $i=1;
                                while($row = $data_lophoc_bang->fetch_assoc()){
                                    echo "
                                        <tr class=\"class noidungbang\">
                                            <td align=\"center\" width=\"5%\" >".$i."</td>
                                            <td align=\"center\" width=\"12%\">".$row['MaLop']."</td>
                                            <td align=\"center\" width=\"15%\">".$row['TenLop']."</td>
                                            <td align=\"center\" width=\"25%\">".$row['TenGV']."</td>
                                            <td align=\"center\" width=\"7%\">".$row['SiSo']."</td>
                                            <td align=\"center\" width=\"12%\">".$row['NamHoc']."</td>
                                            <td align=\"center\" width=\"15%\">".$row['GhiChu']."</td>
                                        </tr>
                                    ";
                                    $i++;
                                }
                            ?>
                        </table>
                    </div>
                </div>
            </div> 
        </div>
    </section>

    

    <script src="./Js/main.js"></script>
    <?php
        if(isset($_GET['Khoi'])){
            echo "<script>search('timkiem_lophoc.php','TenLop','".$_GET['Khoi']."');</script>";
        }
    ?>
    <script>   
          
        
        
        document.getElementById('add_lophoc').onclick = function(){
            var malop = document.getElementById('MaLop');
            var tenlop = document.getElementById('TenLop');
            var namhoc = document.getElementById('NamHoc');
            var ghichu = document.getElementById('GhiChu');
            var infor = document.getElementsByClassName('add_magv_lophoc');
            var magv = radioCheck(infor);
            var get = "MaLop=" + malop.value + "&TenLop=" + tenlop.value +  "&NamHoc=" + namhoc.value + "&GhiChu=" + ghichu.value + "&MaGV=" + magv; 
            document.getElementById('add').style.display = 'none';
            add('add_lophoc.php',get);
            setTimeout(function(){ search('timkiem_lophoc.php','MaLop',''); }, 300);  
        }

        document.getElementById('update_btn').onclick = function(){
            var lophoc = [];
            get_ma(lophoc,update_box,'sửa');
            document.getElementById('update_lophoc').onclick = function(){
                var malop = document.getElementById('MaLop_update');
                var tenlop = document.getElementById('TenLop_update');
                var namhoc = document.getElementById('NamHoc_update');
                var ghichu = document.getElementById('GhiChu_update');
                var infor = document.getElementsByClassName('add_magv_lophoc');
                var magv = radioCheck(infor);
                
                if(malop.value == "" && tenlop.value == "" && namhoc.value == "" && ghichu.value == "" && magv == ""){
                    document.getElementById('thongbao_chucnang_1').innerHTML = `
                        <h2 style=\"color: rgb(1, 82, 233);\">Thông báo</h2>
                        <p style=\"font-size: 15px; margin-top: 20px;\">Bạn chưa nhập thông tin</p>
                    `;
                    document.getElementById('thongbao_chucnang').style.display = 'block';
                }
                else{
                    var get = "MaLopCu=" + lophoc[0] + "&MaLop=" + malop.value + "&TenLop=" + tenlop.value +  "&NamHoc=" + namhoc.value + "&GhiChu=" + ghichu.value + "&MaGV=" + magv; 
                    document.getElementById('update').style.display = 'none';
                    update('update_lophoc.php',get);
                    setTimeout(function(){ search('timkiem_lophoc.php','MaLop',''); }, 300);                    
                }
            }
        }

        document.getElementById('delete_btn').onclick = function(){
            var lophoc = [];
            get_ma(lophoc,'','xóa');

            if(lophoc.length>0){
                var a = '';
                for(var i=0;i<lophoc.length;i++){
                    a+=`
                        <p style="text-align: left ;font-size: 17px; font-weight: 500; color: #5C7AEA">Xác nhận xóa lớp học có mã là <span style="color: #FFB319; font-weight: 600; border-bottom: 1px solid #FFB319">${lophoc[i]}</span></p>
                    `;
                }
                document.getElementById('delete_infor').innerHTML = a;
                document.getElementById('delete').style.display = 'block';
                document.getElementById('delete_confirm').onclick = function(){
                    var get = 'MaLop=';
                    for(var i=0;i<lophoc.length;i++){
                        get+=lophoc[i];
                        if(i<lophoc.length-1)
                            get+="_";
                    }
                    del('delete_lophoc.php',get);
                    document.getElementById('delete').style.display = 'none';
                    setTimeout(function(){ search('timkiem_lophoc.php','MaLop',''); }, 300); 
                }
                
            }
             
        }

        document.getElementById('search').oninput = function(){
            var sel_search = document.getElementById('sel_search');
            search('timkiem_lophoc.php',sel_search.value,this.value);
        }

        document.getElementById('vaolop').onclick = function(){
            var vaolop = [];
            get_ma(vaolop,'','vào lớp');
            if(vaolop.length>0){
                window.location.href = "http://localhost:81/QuanLyHocSinh_Admin/hocsinh.php?VaoLop="+vaolop[0]+"";
            }
        }

        var search_gvcn = document.getElementById('search_gvcn_btn_add');
        search_gvcn.oninput = function(){
            var search_column = document.getElementById('search_gvcn').value;
            var request = new XMLHttpRequest();

            request.open("get","search_gvcn.php?col=" + search_column + "&inf=" + this.value);
            request.onreadystatechange = function(){
                if(this.readyState === 4 && this.status === 200){
                    document.getElementById('infor_gvcn_table_add').innerHTML = this.responseText;
                }
            }
            
            request.send();
        }

        var search_gvcn = document.getElementById('search_gvcn_btn_update');
        search_gvcn.oninput = function(){
            var search_column = document.getElementById('search_gvcn_update').value;
            var request = new XMLHttpRequest();

            request.open("get","search_gvcn.php?col=" + search_column + "&inf=" + this.value);
            request.onreadystatechange = function(){
                if(this.readyState === 4 && this.status === 200){
                    document.getElementById('infor_gvcn_table_update').innerHTML = this.responseText;
                }
            }
            
            request.send();
        }
    </script>

</body>
</html>


