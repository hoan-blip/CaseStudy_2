<?php include_once 'ketnoicsdl.php'; ?>
<?php include_once 'layout/header.php'; ?>
<?php
    if(isset($_GET['page'])){
        $current_page = $_GET['page'];
    }else{
        $current_page = 1;
    }
    $limit = 8;
    $sql_1 = "SELECT COUNT(ID_Sach) as total from book";
    $query = $connect->query($sql_1);
    // tùy chọn kiểu trả về
    $query->setFetchMode(PDO::FETCH_OBJ);
    // lấy tất cả kết quả
    $total = $query->fetch();
    
    $total_pages = ceil($total->total / $limit);
    $start = ($current_page - 1) * $limit;


    //lấy tất cả từ bảng thể loại
    $sql = "SELECT book.*,theloai.Ten_danh_muc FROM `book` JOIN theloai ON 
    book.ID_danh_muc = theloai.ID_danh_muc LIMIT $start,$limit  " ;
    if( isset($_REQUEST['search']) ){
        $search = $_REQUEST['search'];
        if($search !==''){
            $sql .= " where Ten_sach like '%$search%'";
        }
    }
    //thực hiện truy vấn
    $stmt = $connect->query( $sql );
    //tùy chọn trả về
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    //lấy kết quả
    $rows = $stmt->fetchAll(); 
    

    ?>
<!-- breadcrumbs-area-start -->
<div class="breadcrumbs-area mb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumbs-menu">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="shop.php" class="active">shop</a></li>
						<li><div class="header-search">
                                <form action="" method="GET">
                                    <input type="text" placeholder="Search..." name="search" />
                                    <a href="#" onclick="this.form.submit();"><i class="fa fa-search"></i></a>
                                </form>
                        </div></li>
                        <li><a><div class="toolbar-sorter">
                            <select name="cc">
                            <option value="">Thể Loại</option>
                            <option value="">Lãng Mạn</option>
                            <option value="">Kinh Dị</option>
                            <option value="">Tình Yêu</option>
                            </select>               
                        </div></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumbs-area-end -->
<!-- shop-main-area-start -->
<div class="shop-main-area mb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-12 col-12 order-lg-1 order-2 mt-sm-50 mt-xs-40">
                <div class="shop-left">
                    <div class="section-title-5 mb-30">
                        <h2>Shopping Options</h2>
                    </div>
                    <!-- <div class="left-title mb-20">
							<h4>Category</h4>
						</div>
						<div class="left-menu mb-30">
							<ul>
								<li><a href="#">Jackets<span>(15)</span></a></li>
								<li><a href="#">weaters<span>(9)</span></a></li>
								<li><a href="#">Bottoms<span>(12)</span></a></li>
								<li><a href="#">Jeans Pants<span>(6)</span></a></li>
							</ul>
						</div>
						<div class="left-title mb-20">
							<h4>Color</h4>
						</div>
						<div class="color-menu mb-30">
							<ul class="color">
								<li><a href="#"></a></li>
								<li><a href="#" class="bg-2"></a></li>
								<li><a href="#" class="bg-3"></a></li>
								<li><a href="#" class="bg-4"></a></li>
							</ul>
						</div> -->
                    <!-- <div class="left-title mb-20">
							<h4>Manufacturer</h4>
						</div>
						<div class="left-menu mb-30">
							<ul>
								<li><a href="#">Adidas<span>(4)</span></a></li>
								<li><a href="#">Chanel<span>(7)</span></a></li>
								<li><a href="#">DKNY <span>(3)</span></a></li>
								<li><a href="#">Dolce<span>(3)</span></a></li>
								<li><a href="#">Gabbana<span>(2)</span></a></li>
								<li><a href="#">Nike<span>(3)</span></a></li>
								<li><a href="#">Other <span>(1)</span></a></li>
							</ul>
						</div> -->
                    <!-- <div class="left-title mb-20">
							<h4>Price</h4>
						</div>
						<div class="left-menu mb-30">
							<ul>
								<li><a href="#">$0.00-$9.99<span>(1)</span></a></li>
								<li><a href="#">$30.00-$39.99<span>(11)</span></a></li>
								<li><a href="#">$40.00-$49.99<span>(2)</span></a></li>
								<li><a href="#">$50.00-$59.99<span>(3)</span></a></li>
								<li><a href="#">$70.00-and above<span>(1)</span></a></li>
							</ul>
						</div> -->
                    <div class="left-title mb-20">
                        <h4>Random</h4>
                    </div>
                    <div class="random-area mb-30">
                        <div class="product-active-2 owl-carousel">
                            <div class="product-total-2">
                                <div class="single-most-product bd mb-18">
                                    <div class="most-product-img">
                                        <a href="shop.php"><img src="public/img/product/20.jpg" alt="book" /></a>
                                    </div>
                                    <div class="most-product-content">
                                        <div class="product-rating">
                                            <ul>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            </ul>
                                        </div>
                                        <h4><a href="shop.php">Vật Lý 10</a></h4>
                                        <div class="product-price">
                                            <ul>
                                                <li>$30.00</li>
                                                <li class="old-price">$33.00</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-most-product bd mb-18">
                                    <div class="most-product-img">
                                        <a href="shop.php"><img src="public/img/product/21.jpg" alt="book" /></a>
                                    </div>
                                    <div class="most-product-content">
                                        <div class="product-rating">
                                            <ul>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            </ul>
                                        </div>
                                        <h4><a href="shop.php">Savvy Shoulder Tote</a></h4>
                                        <div class="product-price">
                                            <ul>
                                                <li>$30.00</li>
                                                <li class="old-price">$35.00</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-most-product">
                                    <div class="most-product-img">
                                        <a href="shop.php"><img src="public/img/product/22.jpg" alt="book" /></a>
                                    </div>
                                    <div class="most-product-content">
                                        <div class="product-rating">
                                            <ul>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            </ul>
                                        </div>
                                        <h4><a href="shop.php">Compete Track Tote</a></h4>
                                        <div class="product-price">
                                            <ul>
                                                <li>$35.00</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-total-2">
                                <div class="single-most-product bd mb-18">
                                    <div class="most-product-img">
                                        <a href="shop.php"><img src="public/img/product/23.jpg" alt="book" /></a>
                                    </div>
                                    <div class="most-product-content">
                                        <div class="product-rating">
                                            <ul>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            </ul>
                                        </div>
                                        <h4><a href="shop.php">Voyage Yoga Bag</a></h4>
                                        <div class="product-price">
                                            <ul>
                                                <li>$30.00</li>
                                                <li class="old-price">$33.00</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-most-product bd mb-18">
                                    <div class="most-product-img">
                                        <a href="shop.php"><img src="public/img/product/24.jpg" alt="book" /></a>
                                    </div>
                                    <div class="most-product-content">
                                        <div class="product-rating">
                                            <ul>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            </ul>
                                        </div>
                                        <h4><a href="shop.php">Impulse Duffle</a></h4>
                                        <div class="product-price">
                                            <ul>
                                                <li>$70.00</li>
                                                <li class="old-price">$74.00</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-most-product">
                                    <div class="most-product-img">
                                        <a href="shop.php"><img src="public/img/product/22.jpg" alt="book" /></a>
                                    </div>
                                    <div class="most-product-content">
                                        <div class="product-rating">
                                            <ul>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            </ul>
                                        </div>
                                        <h4><a href="shop.php">Fusion Backpack</a></h4>
                                        <div class="product-price">
                                            <ul>
                                                <li>$59.00</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="banner-area mb-30">
                        <div class="banner-img-2">
                            <a href="shop.php"><img src="public/img/banner/31.jpg" alt="banner" /></a>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="col-lg-9 col-md-12 col-12 order-lg-2 order-1">
                <div class="category-image mb-30">
                    <a href="shop.php"><img src="public/img/banner/32.jpg" alt="banner" /></a>
                </div>
                <div class="section-title-5 mb-30">
                    <h2>Book</h2>
                </div>
                <div class="toolbar mb-30">
                    <div class="shop-tab">
                        <div class="tab-3">
                            <ul class="nav">
                                <li><a class="active" href="#th" data-toggle="tab"><i
                                            class="fa fa-th-large"></i>Grid</a></li>
                                <li><a href="#list" data-toggle="tab"><i class="fa fa-bars"></i>List</a></li>
                            </ul>
                        </div>
                        
                    </div>
                    <div class="field-limiter">
                        <div class="control">
                            
                        </div>
                    </div>
                    <div class="toolbar-sorter">
                    <form action="" method="POST">
                        <span>Sort By</span>
                        <select id="sorter" onchange="this.form.submit()" name="sapxep" class="sorter-options" data-role="sorter">
                            <option value="az" selected> A -> Z </option>
                            <option value="za"> Z -> A </option>
                        </select>
                    </form>  
                    
                    </div>
                </div>
                <!-- tab-area-start -->
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="th">
                        <div class="row">
                        
						<?php foreach ( $rows as $key => $row ) : ?>

                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                <!-- single-product-start -->
                                <div class="product-wrapper mb-40">
                                    <div class="product-img">
                                        <a href="product-details.php?id=<?php echo $row->ID_Sach ;?>">
                                            <img src="admin/<?= $row->Hinh_anh ?>" alt="book" class="primary" />
                                        </a>
                                        <!-- <div class="quick-view" >
                                            <a class="action-view"  data-target="#productModal"
                                                data-toggle="modal" title="Quick View">
                                                <i class="fa fa-search-plus"></i>
                                            </a>
                                        </div> -->
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
                                        <h4><a href="product-details.php?id=<?php echo $row->ID_Sach ;?>"><?= $row->Ten_sach ?></a></h4>
                                        <div class="product-price">
                                            <ul>
                                                <li><?= number_format($row->gia_tien) ; ?>đ</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-link">
                                        <div class="product-button">
                                            <a href="product-details.php?id=<?php echo $row->ID_Sach ;?>" title="Product Details"><i class="fa fa-shopping-cart"></i>Product Details
                                            </a>
                                        </div>
                                        <div class="add-to-link">
                                            <ul>
                                                <li><a href="product-details.php?id=<?php echo $row->ID_Sach ;?>" title="Details"><i
                                                            class="fa fa-external-link"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- single-product-end -->
                            </div>
						<?php endforeach ?>

                        </div>
                    </div>

                    <div class="tab-pane fade" id="list">
                        <!-- single-shop-start -->
                        <div class="single-shop mb-30">
                            <div class="row">
                            <?php foreach ( $rows as $key => $row ) : ?>
                                <div class="col-lg-4 col-md-4 col-12">
                                    <div class="product-wrapper-2">
                                        <div class="product-img">
                                            <a href="product-details.php?id=<?php echo $row->ID_Sach ;?>">
                                                <img src="admin/<?= $row->Hinh_anh ?>" alt="book" class="primary" />
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-8 col-12">
                                    <div class="product-wrapper-content">
                                        <div class="product-details">
                                            <div class="product-rating">
                                                <ul>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                </ul>
                                            </div>
                                            <h4><a href="product-details.php?id=<?php echo $row->ID_Sach ;?>"><?= $row->Ten_sach ?></a></h4>
                                            <div class="product-price">
                                                <ul>
                                                    <li><?= number_format($row->gia_tien) ; ?>đ</li>
                                                    <li class="old-price">380.000đ</li>
                                                </ul>
                                            </div>
                                            <p>The sporty Joust Duffle Bag can't be beat - not in the gym, not on the
                                                luggage carousel, not anywhere. Big enough to haul a basketball or
                                                soccer ball and some sneakers with plenty of room to spare,... </p>
                                        </div>
                                        <div class="product-link">
                                            <div class="product-button">
                                                <a href="product-details.php?id=<?php echo $row->ID_Sach ;?>" title="Product Details">
                                                <i class="fa fa-shopping-cart"></i> Product Details
                                                </a>
                                            </div>
                                            <div class="add-to-link">
                                                <ul>
                                                    <li><a href="product-details.php?id=<?php echo $row->ID_Sach ;?>" title="Details"><i
                                                                class="fa fa-external-link"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                            <?php endforeach ?>
                            </div>
                        </div>
                        <!-- single-shop-end -->
                    </div>
                </div>
                <!-- tab-area-end -->
                <!-- pagination-area-start -->
                <div class="pagination-area mt-50">
                    
                    <div class="page-number">
                    <?php if($current_page > 1 ): ?>
                    <a href="shop.php?page=<?php echo $current_page - 1; ?>" class="prev page-numbers">--- Back</i></a>
                    <?php endif; ?>
                    <?php for($i = 1 ; $i <= $total_pages ; $i++) :?>
                        <a href="shop.php?page=<?php echo $i; ?>">
                        <span class="page-numbers current" aria-current="page"><?php echo $i; ?></span>
                        </a>
                    <?php endfor; ?>
                    <?php if($current_page < $total_pages ): ?>
                    <a href="shop.php?page=<?php echo $current_page + 1; ?>" class="next page-numbers">Next ---</i></a>
                    <?php endif; ?>
                    </div>
                </div>
                <!-- pagination-area-end -->
            </div>
        </div>
    </div>
</div>
<!-- shop-main-area-end -->
<?php include_once 'layout/footer.php'; ?>