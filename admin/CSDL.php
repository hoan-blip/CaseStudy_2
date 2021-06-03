<?php
    $username = 'root'; //tên đăng nhập cơ sở diwx liệu
    $password = ''; //mk
    //kết nối tới CSDL
    $connect = new PDO('mysql:host=localhost;dbname=thu_vien', $username, $password);

    //lấy tất cả từ bảng thể loại
    $sql = "SELECT * FROM theloai";

    //thực hiện truy vấn
    $stmt = $connect->query( $sql );

    //tùy chọn trả về
    $stmt->setFetchMode(PDO::FETCH_OBJ);

    //lấy kết quả
    $rows = $stmt->fetchAll();

    // lấy một kết quả duy nhất từ thể loại dựa vào id_danh_muc
    $sql = "SELECT * FROM theloai WHERE ID_danh_muc = 1";
    $stmt = $connect->query( $sql );
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $row = $stmt->fetch();

    //chèn dữ liệu vào
    $sql = "INSERT INTO theloai ( Ten_danh_muc ) VALUES ( 'Sinh Học' ) ";
    // $stmt = $connect->query( $sql );
 
   

    //cập nhật dữ liệu
    $sql = "UPDATE theloai SET Ten_danh_muc = 'Sinh Lý Thể Dục' WHERE ID_danh_muc = 5";
    // $stmt = $connect->query( $sql );

    //xóa dữ liệu
    $sql = "DELETE FROM theloai WHERE ID_danh_muc = 5";
    $stmt = $connect->query( $sql );

    