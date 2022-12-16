<?php
    session_start();
    require_once "../LogIn/checklogin.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <link rel="stylesheet" href="./CSS/styleGiaoVien_edit_infor.css">
    <title>Document</title>
</head>
<body>
    <nav>
        <div class="menu_top">
            <i class="fas fa-bookmark"></i>
            <p>Education</p>
        </div>
        <div class="menu_mid">
            <ul class="menu_main">
                <li class="li1 test"><a href="giaovien.php" class="taga"><i class="fas fa-home i_normal i_to" ></i><p class="to">Home</p></a></li> 
				<li class="li1"><a href="./giaovien.php" class="taga"><i class="fas fa-chalkboard-teacher i_normal"></i><p>Giáo viên</p></a></li>
				<li class="li1"><a href="./giaovien.php" class="taga"><i class="fas fa-users i_normal"></i></i><p>Giảng dạy</p></a></li>
                <li class="li1"><a href="./giaovien.php" class="taga"><i class="fas fa-user-graduate i_normal"></i><p>Học sinh</p></a></li>
                <li class="li1"><a href="../GiaoVien/index.php" class="taga"><i class="fas fa-sign-out-alt i_normal"></i><p>Đăng xuất</p></a></li>
            </ul>
        </div>
        <div class="menu_img"></div>
    </nav>
    <section>
        <header>
            <div class="account">
                <p> 
                    <?php 
                        require_once "../Execute/get_item.php";
                        $hoten = new Exe();
                        echo $hoten->get_item('giaovien','TenGV',$_SESSION['user'],$_SESSION['pass'],'MaGV');                   
                    ?>                
                </p>
                <i class="fas fa-user"></i>
            </div>
            <div>
                <h1>Giáo Viên</h1>
            </div>
        </header>
        <div class="con">
            <div class="menu">
                <div class="infor_main infor_class">
                    <img src="Img/teacher.svg" alt="">
                    <div class="infor_content">
                        <h1>Giáo viên</h1>
                        <p>
                            <?php
                                $lop = new Exe();
                                $countClass = $lop->get_item('giaovien','MaGV',$_SESSION['user'],$_SESSION['pass'],'MaGV');     
                                echo $countClass."";
                            ?>
                        </p>
                    </div>
                </div>
                <div class="infor_main infor_teacher">
                    <img src="Img/class.svg" alt="">
                    <div class="infor_content">
                        <h1>Giảng dạy</h1>
                        <p>
                            <?php
                                $countTeacher = $lop->get_item_countLike('dayhoc','MaGV',$_SESSION['user']);
                                echo $countTeacher."_lớp";
                            ?>
                        </p>
                    </div>
                </div>
                <div class="infor_main infor_student">
                    <img src="Img/student.svg" alt="">
                    <div class="infor_content">
                        <h1>Học sinh</h1>
                        <p>
                            <?php
                                $countStudent = $lop->count_hs_cua_giaovien($_SESSION['user']);
                                echo $countStudent."_hs";
                            ?>
                        </p>
                    </div>
                </div>
            </div>
			
            <div class="content">
                <div class="class content_home">
					
					<div class="class content_home">
						<div class="content_tieude">
							<a href="#"><h1><i>NỘI QUY</i></h1></a>
							<div style="line-height: 30px">
						
								<h1 align="center">NỘI QUY TRƯỜNG HỌC</h1>
<div align="center">Năm học 2020- 2021</div>
								
<div align="center"><i>(Ban hành kèm theo Quyết định số 06/QĐ-THTHCSXL ngày 05 tháng 9 năm 2020 của Hiệu trưởng trường TH&THCS An Khê)</i></div><br>
 
<h3>MỤC I: NỘI QUY NHÀ TRƯỜNG</h3><br>
            Căn cứ vào 7 nhiệm vụ của giáo viên - nhân viên trong điều lệ trường TH&THCS và quy chế dân chủ. Ban giám hiệu xây dựng: "Nội quy nhà trường"của trường TH&THCS An Khê như sau:<br><br>
<b>I. ĐỐI VỚI GIÁO VIÊN</b><br>
1. Giảng dạy và giáo dục học sinh theo đúng chương trình giáo dục quy định, thực hiện đúng điều lệ trường học và các quy định của ngành;<br>
2. Thực hiện tốt quy chế chuyên môn: Soạn, giảng, chấm theo đúng quy định.<br>
3. Kiểm tra, đánh giá học sinh theo hướng dẫn của Bộ GD&ĐT;<br>
4. Thực hiện nghiêm túc chế độ thông tin, báo cáo và các qui ước nếp sống văn hoá của nhà trường;<br>
5. Tham gia và quản lý học sinh trong các hoạt động giáo dục nhà trường tổ chức;<br>
6. Tự bồi dưỡng nâng cao trình độ nghiệp vụ chuyên môn để nâng cao hiệu quả giảng dạy và giáo dục;<br>
7. Giáo dục học sinh có ý thức bảo vệ và giữ gìn tài sản của nhà trường và nơi công cộng. Tiết kiệm điện, nước, lớp tan học phải tắt quạt, tắt điện, đóng cửa và luôn có ý thức giữ gìn khung cảnh sư phạm nhà trường “Sáng - Xanh - Sạch - Đẹp”;<br>
8. Làm tốt công tác phổ cập giáo dục và xã hội hoá giáo dục.<br><br>
<b>II. ĐỐI VỚI PHỤ HUYNH HỌC SINH VÀ KHÁCH</b><br>
1. Khách, phụ huynh học sinh khi đến trường<br>
- Phải xuất trình giấy giới thiệu hoặc chứng minh thư nhân dân cho bảo vệ hoặc báo cho bảo vệ biết mình đến trường gặp ai, để làm gì;<br>
- Bảo vệ báo với Ban giám hiệu hoặc giáo viên chủ nhiệm để cùng thông báo cho khách. Khách và PHHS vào trường trong giờ học của học sinh phải được sự đồng ý của bảo vệ nhà trường.<br>
2. Các phương tiện<br>
- Không đi xe vào trong sân trường (Trừ trời mưa sẽ linh hoạt để phụ huynh đi xe vào đón con).<br>
- Xe đạp, xe máy, trong sân trường phải để đúng nơi quy định theo chỉ dẫn của nhà trường và hướng dẫn của tổ bảo vệ.<br>
3. Thực hiện “3 không”<br>
- Không có mùi rượu, bia;<br>
- Không gây ổn ào to tiếng;<br>
- Không trao đổi trò chuyện với giáo viên trong giờ lên lớp.<br>
4. Phụ huynh học sinh cần<br>
- Thực hiện tốt nội quy của trường, có ý thức xây dựng môi trường sư phạm;<br>
- Thực hiện tốt trách nhiệm phối kết hợp các công tác giáo dục đối với nhà trường;<br>
- Đưa đón học sinh đúng giờ quy định của nhà trường.<br><br>
<b>III ĐỐI VỚI HỌC SINH</b><br>
1. Đi học đều, nghỉ học phải có giấy phép của bố, mẹ. Đến trường đúng giờ quy định (trước giờ vào học 15 phút);<br>
2. Giữ gìn kỷ luật trật tự ở nơi công cộng, trong giờ học, trong các buổi học ngoại khoá ... học và làm bài đầy đủ trước khi lên lớp;<br>
3. Có cử chỉ lễ phép, nói năng lịch sự với thầy cô giáo, khách, bạn ở trường và ông bà, cha mẹ, anh chị em ở nhà;<br>
4. Bảo vệ của công, giữ gìn bàn ghế, không làm bẩn tường, không leo trèo, không bẻ cành ngắt hoa, có ý thức chăm sóc công trình măng non của lớp, của trường;<br>
5. Luôn giữ trường lớp sạch đẹp, chăm lo rèn luyện thân thể, giữ gìn vệ sinh cá nhân; nhiệt tình tham gia xây dựng "Trường học thân thiện-Học sinh tích cực".<br>
6. Khi xếp hàng ra vào lớp, lên xuống cầu thang không xổ đẩy lẫn nhau, không đùa nghịch, biết nhường nhịn cho các em nhỏ hơn, không leo trèo lan can;<br>
7. Cố gắng làm nhiều việc làm tốt, biết giúp đỡ bạn bè và mọi người xung quanh. Tính cực tham gia các hoạt động tập thể của nhà trường, của Đội thiếu niên tiền phong Hồ Chí Minh và Sao nhi đồng;<br>
8. Biết giúp đỡ gia đình công việc vừa sức, biết lao động tự phục vụ. Tham gia lao động công ích vào thứ sáu hàng tuần;<br>
9. Tích cực tham gia các hoạt động xã hội (giúp đỡ bạn có hoàn cảnh khó khăn, đồng bào bị thiên tai hoạn nạn, người già, trẻ em...), làm tốt công tác đền ơn đáp nghĩa;<br>
10. Mặc đồng phục thứ 2, 6; các ngày khác trang phục gọn gàng lịch sự, đi dép quai hậu, đội viên đeo khăn đỏ khi đến trường.<br><br>
 
<h3>MỤC II: NỘI QUY PHÒNG HỌC</h3>
Mọi học sinh học đều phải thực hiện nghiêm túc các quy định sau:<br>
1. Giữ gìn vệ sinh chung<br>
- Hàng ngày: lớp phân công làm trực nhật đầu giờ trong lớp, ngoài hành lang thuộc khu vực lớp quản lý. Đổ rác đúng nơi quy định;<br>
- Không viết vẽ bậy lên tường, lên mặt bàn, mặt ghế;<br>
- Không xả giấy, rác bừa bãi ở chỗ ngồi, trong lớp ngoài sân;<br>
- Đi vệ sinh phải dội nước không bỏ giấy vào hố toilet gây tắc nghẽn.<br>
2. Giữ gìn an ninh, trật tự, an toàn khu lớp học<br>
- Không đùa nghịch la hét gây ồn làm ảnh hưởng đến các lớp học ở bên cạnh;<br>
- Không nhảy lên bàn ghế (làm hỏng bàn ghế hoặc sẽ bị đụng đầu vào quạt);<br>
- Không leo trèo lên bờ tường, lên cây;<br>
- Không tự tiện nghịch, sửa ổ điện, công tắc đèn quạt.<br>
3. Giữ gìn và quản lý tốt cơ sở vật chất phòng học<br>
- Khi đến hoặc ra về, trực nhật lớp phải kiểm tra hiện trạng lớp, ghi vào sổ quản lý cơ sở vật chất của lớp;<br>
- Khi về đóng tất cả các cửa sổ của lớp và khoá cửa ra vào;<br>
- Có trách nhiệm bảo quản và sử dụng trang thiết bị dạy học đồ dùng dạy học được lắp đặt tại lớp học đúng với qui định của nhà trường;<br>
- Báo cáo kịp thời các hiện tượng bất thường phát hiện thấy trong buổi học cho bảo vệ hoặc cho BGH.<br><br>
 
<h3>MỤC III: NỘI QUY PHÒNG TIN HỌC</h3>
 
Mọi học sinh đều phải thực hiện nghiêm túc các quy định dưới đây:<br>
  1. Không được đi giày dép vào phòng máy. Mọi giày dép, ô, mũ nón, vật dụng cá nhân phải để đúng nơi quy định; giữ vệ sinh phòng máy sạch sẽ ;<br>
  2. Không được tự động bật, tắt máy vi tính, dụng cụ thiết bị điện trong phòng Tin học ;<br>
      3. Ngồi đúng vị trí đã được giáo viên qui định, sử dụng đúng máy được phân công ;<br>
  4. Không đi lại tuỳ tiện, gây mất trật tự trong phòng máy ;<br>
  5. Đi học đúng giờ; đảm bảo chuyên cần; ghi chép bài đầy đủ; thực hành nghiêm túc ;<br>
  6. Tập trung nghe giảng; tuyệt đối phục tùng theo sự hướng dẫn của giáo viên dạy và nhân viên quản lý phòng máy.<br>
Nếu học sinh nào vi phạm những quy định nêu trên: tái phạm nhiều lần hoặc gây thiệt hại về máy móc, tai nạn cho bạn trong giờ học sẽ bị thi hành kỷ luật, hạ bậc hạnh kiểm và bồi thường thiệt hại do mình gây ra; nếu nghiêm trọng sẽ bị đuổi học.<br><br>
 
<h3>MỤC IV: NỘI QUY BẢO VỆ</h3>
 
1. Đi làm đúng giờ. Đảm bảo ngày công, giờ công. Nghỉ phải có xin phép trước 1 ngày. Trang phục đúng quy định. Giao tiếp cởi mở, ân cần, đúng mực với học sinh, giáo viên, phụ huynh và khách đến liên hệ công tác ;<br>
2. Trong giờ làm việc phải thực hiện đúng chức năng, nhiệm vụ được phân công (Bao quát sự an toàn nhà trường, khóa mở các cầu thang, đánh trống, mở đóng cửa trường, loa đài, trông xe, bơm nước và các việc phát sinh theo sự phân công của hiệu trưởng). Sau giờ học không cho người ngoài vào trường;<br>
3. Bảo quản, giữ gìn cơ sở vật chất của nhà trường. Không cho mượn, cho thuê, cho mang ra khỏi trường nếu không có ý kiến của hiệu trưởng;<br>
4. Thực hiện chế độ bảo vệ của công, an toàn cơ quan. Có ý thức tiết kiệm điện nước;<br>
5. Giữ vệ sinh trong phòng làm việc sạch sẽ, gọn gàng. Không được uống rượu bia, không hút thuốc trong khi làm việc. Thực hiện tổng vệ sinh phòng trực vào thứ 6 hàng tuần;<br>
6. Cộng đồng trách nhiệm với tập thể giáo viên để đưa học sinh vào nề nếp, có trách nhiệm với sự an toàn của HS trong giờ và ngoài giờ học;<br>
7. Thường xuyên và kịp thời phản ánh cho Ban giám hiệu tình hình đặc biệt xảy ra trong nhà trường 24/24 giờ;<br>
8. Có trách nhiệm bao quát, giám sát việc thi công các công trình xây dựng trong trường, kịp thời phản ánh những vấn đề phát sinh để nhà trường giải quyết;<br>
9. Xây dựng mối đoàn kết, tương trợ, giúp đỡ giữa các thành viên trong tổ bảo vệ.<br><br>
 
<h3>MỤC V: NỘI QUY TỔ VĂN PHÒNG</h3>
 
1. Đi làm đúng giờ. Nghỉ phải xin phép;<br>
2. Sắp xếp phòng làm việc ngăn nắp, gọn gàng, thuận tiện, sạch sẽ;<br>
3. Phải có kế hoạch công việc của mình (Kế toán, Thủ quỹ, Văn phòng, Đồ dùng, Thư viện);<br>
4. Sổ sách của các bộ phận phải khoa học, rõ ràng, chính xác, đúng thời gian quy định;<br>
5. Các loại thông tin, báo cáo phải làm đúng quy định, nộp đúng thời hạn;<br>
6. Trong tổ phải có sự đoàn kết, thân ái tương trợ giúp đỡ lẫn nhau;<br>
7. Phải có thái độ đúng mực với phụ huynh, học sinh, giáo viên và nhân viên trong trường;<br>
8. Có trách nhiệm với sự an toàn của nhà trường, của HS và CB, GV, NV.<br><br>
 
<h3>MỤC VI: ĐIỀU KHOẢN THI HÀNH</h3>
1. Ban giám hiệu nhà trường, các tổ chuyên môn, các đoàn thể tổ chức trong nhà trường có trách nhiệm thực hiện những Nội quy trong Qui định này.<br>
2. Trong quá trình thực hiện, nếu có phát sinh vướng mắc, các cán bộ, giáo viên, nhân viên chức có trách nhiệm phản ánh kịp thời với Ban giám hiệu nhà trường để xem xét, điều chỉnh, bổ sung cho hợp lý.<br>
 							
							</div>
						</div>              
            		</div> 
                </div>
			</div>
		</div>	
    </section>
    <script src="Js/main.js"></script>
</body>
</html>