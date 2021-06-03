<?php  include 'ketnoicsdl.php'; ?>
<?php 
    //lấy id được truyền qua
    $id = $_GET['id'];//10

    //xóa dữ liệu
    $sql    = " DELETE FROM sinhvien WHERE ID = $id";
    $stmt   = $connect->query( $sql );

    //chuyển hướng về trang danh sách
    header("Location: list-users.php");
?>