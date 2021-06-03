<?php include_once 'layout/header.php'; ?>
		<!-- breadcrumbs-area-start -->
		<div class="breadcrumbs-area mb-70">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="breadcrumbs-menu">
							<ul>
								<li><a href="#">Home</a></li>
								<li><a href="#" class="active">contact</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- breadcrumbs-area-end -->
		<!-- googleMap-area-start -->
		<div class="map-area mb-70">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div id="googleMap"></div>
					</div>
				</div>
			</div>
		</div>
		<!-- googleMap-end -->
		<!-- contact-area-start -->
		<div class="contact-area mb-70">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-md-6 col-12">
						<div class="contact-info">
							<h3>Contact info</h3>
							<ul>
								<li>
									<i class="fa fa-map-marker"></i>
									<span>Address: </span>
									CodeGym 133 Lý Thường Kiệt.						
								</li>
								<li>
									<i class="fa fa-envelope"></i>
									<span>Phone: </span>
									0845591879
								</li>
								<li>
									<i class="fa fa-mobile"></i>
									<span>Email: </span>
									<a href="#">hoqhoan6868@gmail.com</a>
								</li>
							</ul>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		<!-- contact-area-end -->
		<!-- footer-area-start -->
		<footer>
			<!-- footer-top-start -->
			<div class="footer-top">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="footer-top-menu bb-2">
								<nav>
									<ul>
										<li><a href="index.php">home</a></li>
										
										<li><a href="contact.php">contact us</a></li>
										<li><a>
										<marquee width="100%" behavior="scroll" style="color: white" bgcolor="black">  
											Book Shop HQH Giúp Bạn Vươn Tầm Kiến  Thức
										</marquee>
										<i></i></a>
										</li>
									</ul>
								</nav>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- footer-top-start -->
			<!-- footer-mid-start -->
			<div class="footer-mid ptb-50">
				<div class="container">
					<div class="row">
				        
				        <div class="col-lg-4 col-md-12">
                            <div class="single-footer mrg-sm">
                                <div class="footer-title mb-20">
                                    <h3>STORE INFORMATION</h3>
                                </div>
                                <div class="footer-contact">
                                    <p class="adress">
                                        <span>My Company</span>
                                        CodeGym 133 Lý Thường Kiệt.
                                    </p>
                                    <p><span>Call us now:</span> 0845591879</p>
                                    <p><span>Email:</span>  hoqhoan6868@gmail.com</p>
                                </div>
                            </div>
				        </div>
					</div>
				</div>
			</div>
			<!-- footer-mid-end -->
			<!-- footer-bottom-start -->
			<div class="footer-bottom">
				<div class="container">
					<div class="row bt-2">
						<div class="col-lg-6 col-md-6 col-12">
							<div class="copy-right-area">
								<p> &copy; 2021 <strong>Koparion </strong> Mede with ❤️ by <a href="https://hasthemes.com/" target="_blank"><strong>HasThemes</strong></a></p>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-12">
							<div class="payment-img text-right">
								<a href="#"><img src="public/img/1.png" alt="payment" /></a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- footer-bottom-end -->
		</footer>
		<!-- footer-area-end -->
		
		
		<!-- all js here -->
		<!-- jquery latest version -->
        <script src="public/js/vendor/jquery-1.12.0.min.js"></script>
		<!-- popper js -->
        <script src="public/js/popper.min.js"></script>
		<!-- bootstrap js -->
        <script src="public/js/bootstrap.min.js"></script>
        <!-- ajax-mail js -->
        <script src="public/js/ajax-mail.js"></script>
		<!-- owl.carousel js -->
        <script src="public/js/owl.carousel.min.js"></script>
		<!-- meanmenu js -->
        <script src="public/js/jquery.meanmenu.js"></script>
		<!-- wow js -->
        <script src="public/js/wow.min.js"></script>
		<!-- jquery.parallax-1.1.3.js -->
        <script src="public/js/jquery.parallax-1.1.3.js"></script>
		<!-- jquery.countdown.min.js -->
        <script src="public/js/jquery.countdown.min.js"></script>
		<!-- jquery.flexslider.js -->
        <script src="public/js/jquery.flexslider.js"></script>
		<!-- chosen.jquery.min.js -->
        <script src="public/js/chosen.jquery.min.js"></script>
		<!-- jquery.counterup.min.js -->
        <script src="public/js/jquery.counterup.min.js"></script>
		<!-- waypoints.min.js -->
        <script src="public/js/waypoints.min.js"></script>
		<!-- plugins js -->
        <script src="public/js/plugins.js"></script>
		<!-- main js -->
        <script src="public/js/main.js"></script>
		<!-- googleapis -->
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBMlLa3XrAmtemtf97Z2YpXwPLlimRK7Pk"></script>
		<script>
			/* Google Map js */
			function initialize() {
			  var mapOptions = {
				zoom: 15,
				scrollwheel: false,
				center: new google.maps.LatLng(16.801839, 107.110959)
			  };

			  var map = new google.maps.Map(document.getElementById('googleMap'),
				  mapOptions);

			  var marker = new google.maps.Marker({
				position: map.getCenter(),
				animation:google.maps.Animation.BOUNCE,
				icon: 'public/img/map.png',
				map: map
			  });

			}
			google.maps.event.addDomListener(window, 'load', initialize);
		</script>
    </body>
</html>
