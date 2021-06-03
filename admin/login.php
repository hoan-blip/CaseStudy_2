<?php session_start(); ?>
<?php include_once 'ketnoicsdl.php'; ?>
<?php include_once 'layout/header.php'; ?>
<?php
    $thong_bao = '';
if( $_SERVER['REQUEST_METHOD'] == 'POST' ){
    // echo '<pre>';
    //     print_r( $_REQUEST );
    // echo '</pre>';
    $SDT        = $_REQUEST['SDT'];
    $mat_khau   = $_REQUEST['mat_khau'];
    
    if( $SDT != '' && $mat_khau != '' ){
        $sql = "SELECT * FROM `sinhvien` WHERE SDT = '$SDT' AND mat_khau = '$mat_khau'";
        $stmt   = $connect->query( $sql );
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $row    = $stmt->fetch();
        if( $row ){
            $_SESSION['sinhvien'] = $row ;
            header('Location: list-users.php');
        }else{
            $thong_bao = 'Đăng nhập không thành công !';
        }
    }
}

?>

    <div class="loginBox">        
        <div class="loginHead">
            <img width="45" src="img/logo.png" alt="HQH Book Shop" title="HQH Book Shop"/>
        </div>
        <form class="form-horizontal" action="" method="POST">
            <p style=" text-align: center; color: red "><?php echo $thong_bao; ?></p> 
            <div class="control-group">
                <label for="inputSDT">Tài Khoản</label>                
                <input type="text" name="SDT" id="inputSDT"/>
            </div>
            <div class="control-group">
                <label for="inputPassword">Mật Khẩu</label>                
                <input type="password" name="mat_khau" id="inputPassword"/>                
            </div>
            <div class="control-group" style="margin-bottom: 5px;">                
                <label class="checkbox"><input type="checkbox"> Remember me</label>                                                
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-block">Sign in</button>
            </div>
            <div class="form-actions">
            <a href="../shop.php">Go to the sales page</a>            
            </div>
        </form>        
        
    </div>    

<?php include_once 'layout/footer.php'; ?>
