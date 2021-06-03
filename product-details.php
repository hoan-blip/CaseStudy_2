<?php include_once 'admin/ketnoicsdl.php';  ?>
<?php include_once 'layout/header.php'; ?>
<?php  
    //lấy tất cả từ bảng thể loại
    $id_sp = $_GET['id'];
	$sql = "SELECT * FROM book WHERE ID_Sach = $id_sp";
	$stmt = $connect->query( $sql );
		//tùy chọn trả về
	$stmt->setFetchMode(PDO::FETCH_OBJ);
		//lấy kết quả
	$rows = $stmt->fetch(); 
    
    ?>
		<!-- breadcrumbs-area-start -->
		<div class="breadcrumbs-area mb-70">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="breadcrumbs-menu">
							<ul>
								<li><a href="index.php">Home</a></li>
								<li><a href="product-details.php" class="active">product-details</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- breadcrumbs-area-end -->
		<!-- product-main-area-start -->
		<div class="product-main-area mb-70">
			<div class="container">
				<div class="row">
					<div class="col-lg-9 col-md-12 col-12 order-lg-1 order-1">
						<!-- product-main-area-start -->
						<div class="product-main-area">
							<div class="row">
								<div class="col-lg-5 col-md-6 col-12">
									<div class="flexslider">
										<ul class="slides">
											<li data-thumb="public/img/thum-2/1.jpg">
											  <img src="admin/<?= $rows->Hinh_anh; ?>" alt="woman" />
											</li>
										</ul>
									</div>
								</div>
								<div class="col-lg-7 col-md-6 col-12">
									<div class="product-info-main">
										<div class="page-title">
											<h1><?= $rows->Ten_sach; ?></h1>
										</div>
										
										<div class="product-reviews-summary">
											<div class="rating-summary">
												<a href="#"><i class="fa fa-star"></i></a>
												<a href="#"><i class="fa fa-star"></i></a>
												<a href="#"><i class="fa fa-star"></i></a>
												<a href="#"><i class="fa fa-star"></i></a>
												<a href="#"><i class="fa fa-star"></i></a>
											</div>
											
										</div>
										<div class="product-info-price">
											<div class="price-final">
												<span><?= number_format($rows->gia_tien); ?>đ</span>
												<span class="old-price">300.000đ</span>
											</div>
										</div>
										<div class="product-add-form">
											<form action="add_cart.php" method="GET">
											<input type="hidden" name="id_sp" value="<?php echo $rows->ID_Sach ;?>">
												<div class="quality-button">
													<input class="qty" name="so_luong" type="number" value="1">
												</div>
												<button type="submit" class="btn btn-primary">Add to cart</button>
												<!-- <a href="add_cart.php?id=<?php echo $rows->ID_Sach ;?>">Add to cart</a> -->
											</form>
										</div>
										<div class="product-social-links">
											
											<div class="product-addto-links-text">
												<p>Powerwalking to the gym or strolling to the local coffeehouse,
												 the Savvy Shoulder Tote lets you stash your essentials in sporty style!
												  A top-loading compartment provides quick and easy access to larger items,
												   while zippered pockets on the front and side hold cash, credit cards and phone.</p>
											</div>
										</div>
									</div>
								</div>
							</div>	
						</div>
						<!-- product-main-area-end -->
						<!-- new-book-area-start -->
						<div class="new-book-area mt-60">
							<div class="section-title text-center mb-30">
								<h3>Upsell Products</h3>
							</div>
							<div class="tab-active-2 owl-carousel">
							
								<!-- single-product-start -->
								<div class="product-wrapper">
									<div class="product-img">
										<a href="#">
											<img  src="admin/<?= $rows->Hinh_anh; ?>" alt="book" class="primary" />
										</a>
										<div class="quick-view">
                                            <a class="action-view" href="#" data-target="#productModal" data-toggle="modal" title="Quick View">
                                                <i class="fa fa-search-plus"></i>
                                            </a>
                                        </div>
                                        <div class="product-flag">
                                            <ul>
                                                <li><span class="sale">new</span></li>
                                            </ul>
                                        </div>
									</div>
									<div class="product-details text-center">
										<div class="product-rating">
											<ul>
												<li><a href="#"><i class="fa fa-star"></i></a></li>
												<li><a href="#"><i class="fa fa-star"></i></a></li>
												<li><a href="#"><i class="fa fa-star"></i></a></li>
												<li><a href="#"><i class="fa fa-star"></i></a></li>
												<li><a href="#"><i class="fa fa-star"></i></a></li>
											</ul>
										</div>
										<h4><a href="product-details.php?id=<?php echo $rows->ID_Sach ;?>"><?= $rows->Ten_sach ?></a></h4>
										<div class="product-price">
											<ul>
												<li><?= number_format($rows->gia_tien); ?>đ</li>
											</ul>
										</div>
									</div>
									
								</div>
								<!-- single-product-end -->
								<!-- single-product-start -->
								<div class="product-wrapper">
									<div class="product-img">
										<a href="shop.php">
											<img src="public/img/product/5.jpg" alt="book" class="primary" />
										</a>
										<div class="quick-view">
                                            <a class="action-view" href="#" data-target="#productModal" data-toggle="modal" title="Quick View">
                                                <i class="fa fa-search-plus"></i>
                                            </a>
                                        </div>
                                        <div class="product-flag">
                                            <ul>
                                                <li><span class="discount-percentage">-5%</span></li>
                                            </ul>
                                        </div>
									</div>
									<div class="product-details text-center">
										<div class="product-rating">
											<ul>
												<li><a href="#"><i class="fa fa-star"></i></a></li>
												<li><a href="#"><i class="fa fa-star"></i></a></li>
												<li><a href="#"><i class="fa fa-star"></i></a></li>
												<li><a href="#"><i class="fa fa-star"></i></a></li>
												<li><a href="#"><i class="fa fa-star"></i></a></li>
											</ul>
										</div>
										<h4><a href="shop.php">Toán Học 12</a></h4>
										<div class="product-price">
											<ul>
												<li> <span>Starting at</span>$34.00</li>
											</ul>
										</div>
									</div>
									
								</div>
								<!-- single-product-end -->
								<!-- single-product-start -->
								<div class="product-wrapper">
									<div class="product-img">
										<a href="shop.php">
											<img src="public/img/product/7.jpg" alt="book" class="primary" />
										</a>
										<div class="quick-view">
                                            <a class="action-view" href="#" data-target="#productModal" data-toggle="modal" title="Quick View">
                                                <i class="fa fa-search-plus"></i>
                                            </a>
                                        </div>
                                        <div class="product-flag">
                                            <ul>
                                                <li><span class="sale">new</span></li>
                                                <li><span class="discount-percentage">-5%</span></li>
                                            </ul>
                                        </div>
									</div>
									<div class="product-details text-center">
										<div class="product-rating">
											<ul>
												<li><a href="#"><i class="fa fa-star"></i></a></li>
												<li><a href="#"><i class="fa fa-star"></i></a></li>
												<li><a href="#"><i class="fa fa-star"></i></a></li>
												<li><a href="#"><i class="fa fa-star"></i></a></li>
												<li><a href="#"><i class="fa fa-star"></i></a></li>
											</ul>
										</div>
										<h4><a href="shop.php">Strive Shoulder Pack</a></h4>
										<div class="product-price">
											<ul>
												<li>$30.00</li>
												<li class="old-price">$32.00</li>
											</ul>
										</div>
									</div>
									
								</div>
								<!-- single-product-end -->	
							</div>
						</div>
						<!-- new-book-area-start -->
					</div>
					<div class="col-lg-3 col-md-12 col-12 order-lg-2 order-2">
						<div class="shop-left">
							
							<div class="banner-area mb-30">
								<div class="banner-img-2">
									<a href="shop.php"><img src="public/img/banner/33.jpg" alt="banner" /></a>
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- product-main-area-end -->
<?php include_once 'layout/footer.php'; ?>