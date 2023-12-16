<?php
     $conn_LHL = new mysqli("localhost","root","","database/moi.sql");
     if(!$conn_LHL){
        echo "<h2> Lỗi: ". mysqli_error($conn_LHL). "</h2>";
     }else{
        echo "<h2>Xin chào ,Tạ văn Thắng-2210900063 </h2>";
     }
     ?>