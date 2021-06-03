<?php  include 'ketnoicsdl.php'; ?>
<?php 
    //lấy id được truyền qua
    $id = $_GET['id'];//10
    $order_id = $_GET['order_id'];

    //xóa dữ liệu
    $sql    = " DELETE FROM chi_tiet_dh WHERE ID = $id";
    $stmt   = $connect->query( $sql );

    //chuyển hướng về trang danh sách
    header("Location: detail-cart.php?id=".$order_id);
?>
