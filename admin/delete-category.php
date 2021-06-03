<?php  include 'ketnoicsdl.php'; ?>
<?php 
    //lấy id được truyền qua
    $id = $_GET['id'];//10

    //xóa dữ liệu
    $sql    = " DELETE FROM theloai WHERE ID_danh_muc = $id";
    $stmt   = $connect->query( $sql );

    //chuyển hướng về trang danh sách
    header("Location: list-categories.php");
?>