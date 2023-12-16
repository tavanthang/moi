<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm mới thông tin sản phẩm</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
    <?php
        include("ketnoi.php");
        //đọc dữ liệu cần sửa
        if(isset($_GET["spid_TVT"])){
            //lấy mã nhân viên cần sửa
            $SPID_TVT= $_GET["spid_TVT"];
            //tạo truy vấn đọc dữ liệu từ bảng nhân viên
            $sql_edit_TVT= "SELECT * FROM `sanpham_TVT` WHERE SPID_TVT='$SPID_TVT'";
            // thực thi câu lệnh truy vấn
            $result_edit_TVT = $conn_TVT->query($sql_edit_TVT);
            //đọc bản ghi từ kết quả
            $row_edit_TVT = $result_edit_TVT->fetch_array();
        }else{
            header("Location: sanpham-list-TVT.php");
        }
        //đọc dữ liệu phòng ban
        $sql_pb_TVT = "SELECT * FROM DANHMUC_TVT WHERE 1=1";
        $res_pb_TVT = $conn_TVT->query($sql_pb_TVT);
        // => hiển thị trong điều khiển select
        // Thực hiện thêm dữ liệu
        $error_message_TVT ="";
        if(isset($_POST["btnSubmit_TVT"])){
            // lấy dữ liệu trên form
            $SPID_TVT = $_POST["SPID_TVT"];
            $TENSP_TVT = $_POST["TENSP_TVT"];
            $SOLUONG_TVT = $_POST["SOLUONG_TVT"];
            $GIABAN_TVT = $_POST["GIABAN_TVT"];
            $GIAMUA_TVT = $_POST["GIAMUA_TVT"];
            $TRANGTHAI_TVT = $_POST["TRANGTHAI_TVT"];
            $MADM = $_POST["MADM"];
            $sql_update_TVT= "UPDATE `sanpham_TVT` SET";
            $sql_update_TVT.="TENSP_TVT='$TENSP_TVT',";
            $sql_update_TVT.="SOLUONG_TVT='$SOLUONG_TVT',";
            $sql_update_TVT.="GIABAN_TVT='$GIABAN_TVT',";
            $sql_update_TVT.="GIAMUA_TVT='$GIAMUA_TVT',";
            $sql_update_TVT.="TRANGTHAI_TVT='$TRANGTHAI_TVT',";
            $sql_update_TVT.="MADM='$MADM'";
            $sql_update_TVT.=" WHERE SPID_TVT='$SPID_TVT'";
            if($conn_TVT->query($sql_update_TVT)){
                   header("Location:sanpham-list-TVT.php"); 
            }else{
                $error_message_TVT="Lỗi sửa dữ liệu". mysqli_error($conn_TVT);
            }
        }
    ?>
    <section class="container">
        <h1>Thêm mới thông tin sản phẩm</h1>
        <form name="frm_TVT" method="post" action="">
            <table border="1" width="100%" cellspacing="5" cellpadding="5">
                <tbody>
                    <tr>
                        <td>Mã</td>
                        <td>
                            <input type="text" name="SPID_TVT" id="SPID_TVT" readonly
                                value="<?php echo  $row_edit_TVT["SPID_TVT"]?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Tên</td>
                        <td>
                            <input type="text" name="TENSP_TVT" id="TENSP_TVT"
                                value="<?php echo  $row_edit_TVT["TENSP_TVT"]?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Số lượng</td>
                        <td>
                            <input type="text" name="SOLUONG_TVT" id="SOLUONG_TVT"
                                value="<?php echo  $row_edit_TVT["SOLUONG_TVT"]?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Đơn giá</td>
                        <td>
                        <input type="text" name="GIABAN_TVT" id="GIABAN_TVT"
                                value="<?php echo  $row_edit_TVT["GIABAN_TVT"]?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Đơn giá</td>
                        <td>
                        <input type="text" name="GIAMUA_TVT" id="GIAMUA_TVT"
                                value="<?php echo  $row_edit_TVT["GIAMUA_TVT"]?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Trạng thái</td>
                        <td>
                            <select name="TRANGTHAI_TVT" >
                                <option value="1" <?php if($row_edit_TVT["TRANGTHAI_TVT"]==1){echo "selected";}?>>Hoạt động</option>
                                <option value="0" <?php if($row_edit_TVT["TRANGTHAI_TVT"]==0){echo "selected";}?>>Không hoạt động</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Mã loại</td>
                        <td>
                            <select name="MADM_TVT" id="MADM_TVT">
                                <?php
                                    while($row = $res_pb_TVT->fetch_array()):        
                                ?>
                                <option value="<?php echo $row["MADM_TVT"]?>"
                                <?php
                                    if($row["MADM_TVT"]==$row_edit_TVT["MADM_TVT"]){
                                        echo "selected";
                                    }
                                ?>
                                >
                                    <?php echo $row["TENDM_TVT"]?>
                                </option>
                                <?php
                                    endwhile;
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" value="Thêm" name="btnSubmit_TVT">
                            <input type="reset" value="Làm lại" name="btnReset_TVT">
                        </td>
                    </tr>
                </tbody>
            </table>    
            <div>
                <?php echo $error_message_TVT;?>
            </div>
        </form>
        <a href="sanpham-list-TVT.php">Danh sách sản phẩm</a>
    </section>
</body>
</html>