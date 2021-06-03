<?php  include 'ketnoicsdl.php'; ?>
<?php 
    //lấy id được truyền qua
    $id = $_GET['id'];//10

    //xóa dữ liệu
    $sql    = " DELETE FROM don_hang WHERE ID_dh = $id";
    $stmt   = $connect->query( $sql );

    //chuyển hướng về trang danh sách
    header("Location: list-cart.php");
?>