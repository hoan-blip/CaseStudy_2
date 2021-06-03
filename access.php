<?php
    session_start();
    $_SESSION['gio_hang'] = [];
?>
<?php include_once 'ketnoicsdl.php'; ?>
<?php include_once 'layout/header.php'; ?>

<div class="user-login-area mb-70">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="login-title text-center mb-30">
                            <br>
							<h2 style="color: lightgreen" >Đặt Hàng Thành Công !</h2>
						</div>
					</div>
					<div class="offset-lg-3 col-lg-6 col-md-12 col-12">
						<div class="form">
							
							
						</div>
					</div>
				</div>
			</div>
		</div>
		<script>
			setTimeout(function () {
                        window.location.href = 'shop.php';
                    }, 2000);
		</script>
<?php include_once 'layout/footer.php'; ?>