<?php session_start(); ?>
<?php include_once 'ketnoicsdl.php'; ?>

<?php 
// session_start();
$cart = $_SESSION['gio_hang'];
$id_sps = array_keys( $cart );
$id_sps = implode(',',$id_sps);
$rows = [];
$cart = [];

// session_start();
if(isset($_SESSION['gio_hang']) && count($_SESSION['gio_hang']) > 0 ){
$cart = $_SESSION['gio_hang'];


$sql = "SELECT * FROM book WHERE ID_Sach IN ($id_sps)";
$stmt = $connect->query( $sql );
    //tùy chọn trả về
$stmt->setFetchMode(PDO::FETCH_OBJ);
    //lấy kết quả
$rows = $stmt->fetchAll(); 
// $_SESSION['gio_hang']=$id_sp;
if( $_SERVER['REQUEST_METHOD']== 'POST'){
    $Ten_kh = $_REQUEST['name'];            $ktTen_kh = '/[a-z]+\s/';
    $Dia_chi = $_REQUEST['address'];        $ktDia_chi = '/[a-z]+\s/';
    $Email = $_REQUEST['email'];            $ktEmail = '/^[a-z0-9]@[a-z]{5}.[a-z]{2,5}/';
    $SDT = $_REQUEST['phone'];              $ktSDT = '/^[0-9]{9,11}$/';

    if( $Ten_kh != '' && $Dia_chi != '' && $Email != '' && $SDT != '' ){
        $sqls1 = "INSERT INTO don_hang ( Ten_kh, Dia_chi, SDT, Email ) VALUE ( '$Ten_kh', '$Dia_chi', '$Email', '$SDT' ) ";
        $stmt = $connect->query($sqls1);
        $ID_dh = $connect->lastInsertId();
        //lấy id đơn hàng
        foreach ( $cart as $ID_sp => $so_luong ){
           
            $sqls2 = "INSERT INTO `chi_tiet_dh` (`ID_dh`, `ID_sp`, `gia_tien`, `so_luong`) VALUES ('$ID_dh', '$ID_sp', '$SP_total', '$so_luong')";
            $stmt = $connect->query($sqls2);
        }

        // SELECT * FROM `chi_tiet_dh` JOIN book ON chi_tiet_dh.ID_sp = book.ID_Sach JOIN don_hang ON chi_tiet_dh.ID_dh = don_hang.ID_dh

        //INSERT INTO `chi_tiet_dh` (`ID_dh`, `ID_sp`, `gia_tien`, `so_luong`) VALUES ('3', '22', '34000', '5');

        //chuyển hướng về trang danh sách
        header("Location: access.php");  
    }
    
}
}

?>
<?php include_once 'layout/header.php'; ?>
		<!-- breadcrumbs-area-start -->
		<div class="breadcrumbs-area mb-70">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="breadcrumbs-menu">
							<ul>
								<li><a href="#">Home</a></li>
								<li><a href="#" class="active">checkout</a></li>
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
							<h2>Checkout</h2>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- entry-header-area-end -->
		
		<!-- checkout-area-start -->
		<div class="checkout-area mb-70">
			<div class="container">
            <?php if(count($rows) > 0): ?>
				<div class="row">
					<div class="col-12">
					    <form action="" method="POST">
                            <div class="row">
                                <div class="col-lg-6 col-md-12 col-12">
                                <div class="checkbox-form">						
                                    <h3>Billing Details</h3>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-12">
                                            <div class="checkout-form-list">
                                                <label> Name <span class="required">*</span></label>										
                                                <input type="text" name="name" placeholder="">
                                                <?php if($_SERVER['REQUEST_METHOD']=='POST'){
                                                    if(preg_match($ktTen_kh,$Ten_kh)){
                                                    echo '';
                                                    }else{
                                                    echo '<p style="color:red;">Nhập không hợp lệ</p>';
                                                    }
                                                }?>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-12">
                                            <div class="checkout-form-list">
                                                <label>Address <span class="required">*</span></label>
                                                <input type="text" name="address" placeholder="Street address">
                                                <?php if($_SERVER['REQUEST_METHOD']=='POST'){
                                                    if(preg_match($ktDia_chi,$Dia_chi)){
                                                    echo '';
                                                    }else{
                                                    echo '<p style="color:red;">Nhập không hợp lệ</p>';
                                                    }
                                                }?>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="checkout-form-list">
                                                <label>Email Address <span class="required">*</span></label>										
                                                <input type="email" name="email" placeholder="">
                                                <?php if($_SERVER['REQUEST_METHOD']=='POST'){
                                                    if(preg_match($ktEmail,$Email)){
                                                    echo '';
                                                    }else{
                                                    echo '<p style="color:red;">Nhập không hợp lệ</p>';
                                                    }
                                                }?>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="checkout-form-list">
                                                <label>Phone  <span class="required">*</span></label>										
                                                <input type="text" name="phone" placeholder="Postcode / Zip">
                                                <?php if($_SERVER['REQUEST_METHOD']=='POST'){
                                                    if(preg_match($ktSDT,$SDT)){
                                                    echo '';
                                                    }else{
                                                    echo '<p style="color:red;">Nhập không hợp lệ</p>';
                                                    }
                                                }?>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-12">
                                            <div class="checkout-form-list create-acc">	
                                                <input type="checkbox" id="cbox">
                                                <label>Create an account?</label>
                                            </div>
                                            <div class="checkout-form-list create-account" id="cbox_info" style="display: none;">
                                                <p>Create an account by entering the information below. If you are a returning customer please login at the top of the page.</p>
                                                <label>Account password  <span class="required">*</span></label>
                                                <input type="password" placeholder="password">	
                                            </div>
                                        </div>								
                                    </div>
                                    <div class="different-address">
                                        <div class="order-notes">
                                            <div class="checkout-form-list">
                                                <label>Order Notes</label>
                                                <textarea placeholder="Notes about your order, e.g. special notes for delivery." rows="10" cols="30" id="checkout-mess"></textarea>
                                            </div>									
                                        </div>
                                    </div>													
                                </div>
                            </div>
                                <div class="col-lg-6 col-md-12 col-12">
                                <div class="your-order">
                                    <h3>Your order</h3>
                                    <div class="your-order-table table-responsive">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th class="product-name">Product</th>
                                                    <th class="product-total">Total</th>
                                                </tr>							
                                            </thead>
                                            <tbody>
                                            <?php    
                                                $SP_total = 0;
                                                foreach ($rows as $key => $row): 
                                                $total = $row->gia_tien * $cart[$row->ID_Sach]; 
                                                $SP_total += $total;
                                                
                                            ?>
                                                <tr class="cart_item">
                                                    <td class="product-name">
                                                    <?= $row->Ten_sach ?> <strong class="product-quantity">x <?= $cart[$row->ID_Sach]; ?></strong>
                                                    </td>
                                                    <td class="product-total">
                                                        <span class="amount"><?= number_format($total); ?>đ</span>
                                                    </td>
                                                </tr>
                                                
                                                <?php endforeach ?>
                                            </tbody>
                                            <tfoot>
                                                <tr class="cart-subtotal">
                                                    <th>Cart Subtotal</th>
                                                    <td><span class="amount"><?= number_format($SP_total); ?>đ</span></td>
                                                </tr>
                                                <tr class="shipping">
                                                    <th>Shipping</th>
                                                    <td>
                                                        <ul>
                                                            <li>
                                                                <label>
                                                                    <span class="amount">7,000đ</span>
                                                                </label>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                <tr class="order-total">
                                                    <th>Order Total</th>
                                                    <td><strong><span class="amount"><?= number_format($SP_total + 7000) ?>đ</span></strong>
                                                    </td>
                                                </tr>								
                                            </tfoot>
                                        </table>
                                    </div>
                                    <div class="payment-method">
                                        <div class="payment-accordion">
                                            <div class="collapses-group">
                                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading" role="tab" id="headingOne">
                                                            <h4 class="panel-title">
                                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                  Direct Bank Transfer
                                                                </a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                                            
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="order-button-payment">
                                            <input type="submit" value="Place order">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </form>
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
		<!-- checkout-area-end -->
<?php include_once 'layout/footer.php'; ?>
