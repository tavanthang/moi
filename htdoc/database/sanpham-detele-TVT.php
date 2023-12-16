<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
    <?php
        include("ketnoi.php");
        $sql_TVT = "SELECT * FROM sanpham_TVT WHERE 1=1";
        $result_TVT = $conn_TVT->query($sql_TVT);
        //Duyệt và hiển thị kết quả -> tbody
    ?>
    <section class="container">
        <h1>Danh sách sản phẩm</h1>
        <hr/>
        <a href="sanpham-create-TVT.php" class="btn">Thêm mới sản phẩm</a>
        <table width="100%" border="1px">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Mã</th>
                    <th>Tên</th>
                    <th>Số lượng</th>
                    <th>Giá mua</th>
                    <th>Giá bán</th>
                    <th>Trạng thái</th>
                    <th>Mã loại</th>
                    <th>Chức năng</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if($result_TVT->num_rows>0){
                        $stt=0;
                        while($row_TVT = $result_TVT->fetch_array()):
                        $stt++;
                ?>
                <tr>
                    <td><?php echo $stt;?></td>
                    <td><?php echo $row_TVT["SPID_TVT"];?></td>
                    <td><?php echo $row_TVT["TENSP_TVT"];?></td>
                    <td><?php echo $row_TVT["SOLUONG_TVT"];?></td>
                    <td><?php echo $row_TVT["GIAMUA_TVT"];?></td>
                    <td><?php echo $row_TVT["GIABAN_TVT"];?></td>
                    <td><?php echo $row_TVT["TRANGTHAI_TVT"];?></td>
                    <td><?php echo $row_TVT["MADM"];?></td>
                    <td>
                        <a href="sanpham-edit-TVT.php?spid_TVT=<?php echo $row_TVT["SPID_TVT"];?>">Sửa</a>|
                        <a href="sanpham-list-TVT.php?spid_TVT=<?php echo $row_TVT["SPID_TVT"];?>">Xóa</a>
                    </td>
                </tr>
                <?php
                    endwhile;
                }
                ?>
            </tbody>
        </table>
        <a href="sanpham-create-TVT.php" class="btn">Thêm mới sản phẩm</a>
    </section>
    <?php
        if(isset($_GET["spid_TVT"])){
            $proid_TVT = $_GET["spid_TVT"];
            $sql_delete_TVT = "DELETE FROM SANPHAM_TVT where SPID_TVT='$spid_TVT'";
            if($conn_TVT->query($sql_delete_TVT)){
                header("Location:sanpham-list-TVT.php");
            }else{
                echo "<script> alert('lỗi xóa'; </script>";
            }
        }
    ?>
</body>
</html>