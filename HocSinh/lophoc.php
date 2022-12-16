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
    <div class="hidden" id="add">
        <div class="bk_mo ">
            <div class="box_fun">
                <span class="close"><i class="fas fa-times"></i></span>
                <h2>Thêm mới lớp học</h2>
                <form class="" action="" method="post">
                    <div class="box_content">
                        <div class="add_ma">
                            <label for="MaLop">Mã Lớp <span>*</span></label>
                            <input type="text" name="malopadd" id="MaLop">
                        </div>
                        <div class="add_pass">
                            <label for="TenLop">Tên lớp <span>*</span></label>
                            <input type="text" name="tenlopadd" id="TenLop">
                        </div>
                        <div class="add_gt">
                            <label for="NamHoc">Năm học <span>*</span></label>
                            <select name="namhoc" id="NamHoc">
                                <?php
                                    $query_namhoc = "select * from namhoc";
                                    $data_namhoc = $sql->getdata($query_namhoc);
                                    while($row = $data_namhoc->fetch_assoc()){
                                        echo "<option value=\"".$row['NamHoc']."\">".$row['NamHoc']."</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        
                        <div class="add_gv">
                            <label for="GhiChu">Ghi chú </label>
                            <input type="text" name="magvadd" id="GhiChu">
                        </div>
                       
                        
                    </div>
                    <div class="thongtingiaovien">
                        <div class="giaovienchunhiem">
                            <label for="">Giáo viên chủ nhiệm<span style="color: red;"> *</span></label>
                            <div class="search_gvcn">
                                <select name="" id="search_gvcn">
                                    <option value="MaGV">Mã giáo viên</option>
                                    <option value="TenGV">Họ tên</option>
                                    <option value="DienThoai">Số ĐT</option>
                                </select>
                                <input type="text" placeholder="Tìm kiếm " id="search_gvcn_btn_add">
                            </div>
                        </div>
                        <table >
                            <thead>
                                <tr>
                                    <th width="15%">Mã GV</th>
                                    <th width="35%">Họ tên</th>
                                    <th width="35%">Số điện thoại</th>
                                    <th width="15%">Lựa chọn</th>
                                </tr>
                            </thead>
                            <tbody id="infor_gvcn_table_add">
                                
                                <?php
                                    $query_giaovien = "SELECT MaGV, TenGV, DienThoai from giaovien";
                                    $data_giaovien = $sql->getdata($query_giaovien);
                                    while($row = $data_giaovien->fetch_assoc()){
                                        echo "
                                            <tr>
                                                <td width=\"15%\">".$row['MaGV']."</td>
                                                <td width=\"35%\">".$row['TenGV']."</td>
                                                <td width=\"35%\">".$row['DienThoai']."</td>
                                                <td width=\"15%\"><input type=\"radio\" name=\"MaGV\" class=\"add_magv_lophoc\" value=\"".$row['MaGV']."\"></td>
                                            </tr>
                                        ";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="button">
                        <button type="button" id="add_lophoc">Thêm</button>
                    </div>
                    <p>Lưu ý: thông tin có chứa dấu (*) bắt buộc phải điền</p>                
                </form>
            </div>
        </div>
    </div>
    <div class="hidden" id="update">
        <div class="bk_mo ">
            <div class="box_fun">
                <span class="close"><i class="fas fa-times"></i></span>
                <h2>Sửa thông tin lớp học</h2>
                <form class="" action="" method="post">
                    <div class="box_content">
                        <div class="add_ma">
                            <label for="MaLop">Mã Lớp</label>
                            <input type="text" name="malopadd" id="MaLop_update">
                        </div>
                        <div class="add_pass">
                            <label for="TenLop">Tên lớp</label>
                            <input type="text" name="tenlopadd" id="TenLop_update">
                        </div>
                        <div class="add_gt">
                            <label for="NamHoc">Năm học</label>
                            <select name="namhoc" id="NamHoc_update">
                                <option value=""></option>
                                <?php
                                    $query_namhoc = "select * from namhoc";
                                    $data_namhoc = $sql->getdata($query_namhoc);
                                    while($row = $data_namhoc->fetch_assoc()){
                                        echo "<option value=\"".$row['NamHoc']."\">".$row['NamHoc']."</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        
                        <div class="add_gv">
                            <label for="GhiChu">Ghi chú </label>
                            <input type="text" name="magvadd" id="GhiChu_update">
                        </div>
                       
                        
                    </div>
                    <div class="thongtingiaovien">
                        <div class="giaovienchunhiem">
                            <label for="">Giáo viên chủ nhiệm</label>
                            <div class="search_gvcn">
                                <select name="" id="search_gvcn_update">
                                    <option value="MaGV">Mã giáo viên</option>
                                    <option value="TenGV">Họ tên</option>
                                    <option value="DienThoai">Số ĐT</option>
                                </select>
                                <input type="text" placeholder="Tìm kiếm "  id="search_gvcn_btn_update">
                            </div>
                        </div>
                        
                        <table >
                            <thead>
                                <tr>
                                    <th width="15%">Mã GV</th>
                                    <th width="35%">Họ tên</th>
                                    <th width="35%">Số điện thoại</th>
                                    <th width="15%">Lựa chọn</th>
                                </tr>
                            </thead>
                            <tbody  id="infor_gvcn_table_update">
                                
                                <?php
                                    $query_giaovien = "SELECT MaGV, TenGV, DienThoai from giaovien";
                                    $data_giaovien = $sql->getdata($query_giaovien);
                                    while($row = $data_giaovien->fetch_assoc()){
                                        echo "
                                            <tr>
                                                <td width=\"15%\">".$row['MaGV']."</td>
                                                <td width=\"35%\">".$row['TenGV']."</td>
                                                <td width=\"35%\">".$row['DienThoai']."</td>
                                                <td width=\"15%\"><input type=\"radio\" name=\"MaGV\" class=\"add_magv_lophoc\" value=\"".$row['MaGV']."\"></td>
                                            </tr>
                                        ";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="button">
                        <button type="button" id="update_lophoc">Sửa</button>
                    </div>
                    <p>Lưu ý: thông tin có chứa dấu (*) bắt buộc phải điền
                        <br> Nếu chọn nhiều hơn 1 sẽ thực hiện sửa cho hàng đầu tiên mà bạn chọn
                    </p>                
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
          
    </script>

</body>
</html>