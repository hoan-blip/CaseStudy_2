<?php session_start();
if( $_SERVER['REQUEST_METHOD'] == 'POST' ){
    $_SESSION['gio_hang'] = $_REQUEST['so_luong'];
    header( "Location: cart.php" );
}

?>

<?php include_once 'ketnoicsdl.php'; ?>
<?php include_once 'layout/header.php'; ?>
<?php 



$rows = [];
$cart = [];

// session_start();
if(isset($_SESSION['gio_hang']) && count($_SESSION['gio_hang']) > 0 ){
$cart = $_SESSION['gio_hang'];

$id_sps = array_keys( $cart );
$id_sps = implode(',',$id_sps);


$sql = "SELECT * FROM book WHERE ID_Sach IN ($id_sps)";
$stmt = $connect->query( $sql );
    //tùy chọn trả về
$stmt->setFetchMode(PDO::FETCH_OBJ);
    //lấy kết quả
$rows = $stmt->fetchAll(); 
// $_SESSION['gio_hang']=$id_sp;

}

?>
<!-- breadcrumbs-area-start -->
<div class="breadcrumbs-area mb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumbs-menu">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="cart.php" class="active">Cart</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumbs-area-end -->
<!-- entry-header-area-start -->
<div class="entry-header-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="entry-header-title">
                    <h2>Cart</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- entry-header-area-end -->

<!-- cart-main-area-start -->
<div class="cart-main-area mb-70">
    <div class="container">
    <?php if(count($rows) > 0): ?>
        <!-- <div class="row">
            <div class="col-lg-12"> -->
                <form action="" method="POST">
                    <div class="table-content table-responsive mb-15 border-1">
                        <table>
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">Image</th>
                                    <th class="product-name">Product</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-subtotal">Total</th>
                                    <th class="product-remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                               <?php    
                                        $SP_total = 0;
                                        foreach ($rows as $key => $row): 
                                        $total = $row->gia_tien * $cart[$row->ID_Sach]; 
                                        $SP_total += $total;
                                        
                                    ?>
                                    <?php 
                                        if (!function_exists('currency_format')) {
                                            function currency_format($number, $suffix = 'đ') {
                                                if (!empty($number)) {
                                                    return number_format($number, 0, ',', '.') . "{$suffix}";
                                                }
                                            }
                                        }
                                    ?>
                                <tr>
                                    <td class="product-thumbnail"><a href="#"><img src="admin/<?= $row->Hinh_anh ?>"
                                                alt="man" /></a>
                                    </td>
                                    <td class="product-name"><a href="#"><?= $row->Ten_sach ?></a></td>
                                    <td class="product-price"><span class="amount"><?= number_format($row->gia_tien) ?></span></td>
                                    <td class="product-quantity">
                                        <input type="number"
                                        name="so_luong[<?= $row->ID_Sach ?>]"
                                         value="<?= $cart[$row->ID_Sach]; ?>">
                                    </td>
                                    <td class="product-subtotal"><?= number_format($total); ?></td>
                                    <td class="product-remove"><a href="delete.php?id=<?php echo $row->ID_Sach ;?>" onclick="xac_nhan()"><i class="fa fa-times"></i></a></td>
                                </tr>
                            <?php endforeach ?> 
                             
                            </tbody>
                        </table>
                        
                        <input type="submit" value="Update" class="btn btn-primary"/>
                        
                    </div>
                </form>
            <!-- </div>
        </div> -->
        <div class="row">
            <div class="col-lg-8 col-md-6 col-12">
                <div class="buttons-cart mb-30">
                    <ul>
                        <li><a href="shop.php">Continue Shopping</a></li>
                       
                    </ul>
                    
                </div>
               
                
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <div class="cart_totals">
                    <h2>Cart Totals</h2>
                    <br>
                    <table>
                        <tbody>
                            <tr class="cart-subtotal">
                                <th>Subtotal</th>
                                <td>
                                    <span class="amount"><?= number_format($SP_total) ?> đ</span>
                                </td>
                            </tr>
                            <tr class="shipping">
                                <th>Shipping</th>
                                <td>
                                    <ul id="shipping_method">
                                        <li>   
                                            <span >7.000 đ</span>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                            <tr class="order-total">
                                <th>Total</th>
                                <td>
                                    <strong>
                                        <span class="amount"><?= number_format($SP_total + 7000) ?> đ</span>
                                    </strong>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="wc-proceed-to-checkout">
                        <a href="checkout.php">Proceed to Checkout</a>
                    </div>
                </div>
            </div>
        </div>
        <?php else: ?>  
            <form>            
                <div class="pagination-area text-center">
                    <h1>GIỎ HÀNG ĐANG TRỐNG, HÃY ĐẶT HÀNG !!! </h1>                  
                    <div class="col-lg-12 col-md-12">
                <div class="pagination-area text-center">
                
                </div>
            </div>   
                </div>
            </form>
            <!-- kết thúc if -->
        <?php endif; ?>
    </div>
</div>
<script>
    function xac_nhan(){
        let thong_bao = confirm('Bạn có chắc chắn xóa hay không ?');
        if( thong_bao == false ){
            console.log( event );
            event.preventDefault();
        }
    }
</script>
<!-- cart-main-area-end -->
<?php include_once 'layout/footer.php'; ?>