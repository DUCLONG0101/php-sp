<?php
    require_once "./LogIn/sql.php";
    $sql = new SQL();
    $data = $sql->getdata("SELECT * FROM hesotinhdiem");
    $row = $data->fetch_assoc();
    echo "
        <tr class=\"class noidungbang class_bold\">
            <td align=\"center\" width=\"5%\" >".$row['Diem15']."</td>
            <td align=\"center\" width=\"10%\">".$row['Diem1Tiet']."</td>
            <td align=\"center\" width=\"10%\">".$row['DiemGK']."</td>
            <td align=\"center\" width=\"18%\">".$row['DiemCK']."</td>                                         
        </tr>
    ";

?>