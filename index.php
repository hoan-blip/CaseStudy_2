<?php include_once 'ketnoicsdl.php'; ?>
<?php include_once 'layout/header.php'; ?>
<?php  
    //lấy tất cả từ bảng thể loại
    $sql = "SELECT book.*,theloai.Ten_danh_muc FROM `book` JOIN theloai ON 
    book.ID_danh_muc = theloai.ID_danh_muc";
    //thực hiện truy vấn
    $stmt = $connect->query( $sql );
    //tùy chọn trả về
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    //lấy kết quả
    $rows = $stmt->fetchAll(); 
    

    ?>
    <!-- header-area-end -->
    <!-- slider-area-start -->
    <div class="slider-area mt-30">
        <div class="container">
            <div class="slider-active owl-carousel">
                <div class="single-slider pt-100 pb-145 bg-img" style="background-image:url(public/img/slider/13.jpg);">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="slider-content-3 slider-animated-1 pl-100">
                                <h1>A Game <br>Mock up</h1>
                                <p class="slider-sale">
                                    <span class="sale1">-20%</span>
                                    <span class="sale2">
                                        <strong>£80.00</strong>
                                        £60.00
                                    </span>
                                </p>
                                <a href="shop.php">Shop now!</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-slider pt-100 pb-145 bg-img" style="background-image:url(public/img/slider/12.jpg);">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="slider-content-3 slider-animated-1 pl-100">
                                <h1>Wake The <br>of Thrones</h1>
                                <p class="slider-sale">
                                    <span class="sale1">-20%</span>
                                    <span class="sale2">
                                        <strong>£80.00</strong>
                                        £60.00
                                    </span>
                                </p>
                                <a href="shop.php">Shop now!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider-area-end -->
    <!-- featured-area-start -->
    <div class="new-book-area pt-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title section-title-res text-center mb-30">
                        <h2>Featured</h2>
                    </div>
                </div>
            </div>
            <div class="tab-active owl-carousel">
                
                    <!-- single-product-start -->
                    <?php foreach ( $rows as $key => $row ): ?>
                    <div class="product-wrapper">
                        <div class="product-img">
                            <a href="shop.php">
                                <img src="admin/<?= $row->Hinh_anh ?>" alt="book" class="primary" />
                            </a>
                            
                            <div class="product-flag">
                                <ul>
                                    <li><span class="sale">new</span> <br></li>
                                    <li><span class="discount-percentage">-5%</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-details text-center">
                            <div class="product-rating">
                                <ul>
                                    <li><a href="shop.php"><i class="fa fa-star"></i></a></li>
                                    <li><a href="shop.php"><i class="fa fa-star"></i></a></li>
                                    <li><a href="shop.php"><i class="fa fa-star"></i></a></li>
                                    <li><a href="shop.php"><i class="fa fa-star"></i></a></li>
                                    <li><a href="shop.php"><i class="fa fa-star"></i></a></li>
                                </ul>
                            </div>
                            <h4><a href="shop.php"><?= $row->Ten_sach ?></a></h4>
                            <div class="product-price">
                                <ul>
                                    <li><?= number_format($row->gia_tien) ; ?>đ</li>
                                </ul>
                            </div>
                        </div>
 
                    </div>
                    <?php endforeach ?>
                    <!-- single-product-end -->
            </div>
        </div>
    </div>
    <!-- featured-area-start -->
    <!-- banner-area-start -->
    <div class="banner-area-5 mtb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner-img-2">
                        <a href="shop.php"><img src="public/img/banner/5.jpg" alt="banner" /></a>
                        <div class="banner-text">
                            <h3>G. Meyer Books & Spiritual Traveler Press</h3>
                            <h2>Sale up to 30% off</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- banner-area-end -->
    <!-- product-area-start -->
    <div class="product-area pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title bt text-center pt-100 mb-50">
                        <h2>Our Products</h2>
                        <!-- <p>Browse the collection of our best selling and top interresting products. <br /> ll definitely find what you are looking for.</p> -->
                    </div>
                </div>
                <div class="col-lg-12">
                    <!-- tab-menu-start -->
                    <div class="tab-menu mb-40 text-center">
                        <ul class="nav justify-content-center">
                            <li><a class="active" href="shop.phpAudiobooks" data-toggle="tab">New Arrival</a></li>
                            <li><a href="shop.phpbooks" data-toggle="tab">OnSale</a></li>
                            <li><a href="shop.phpbussiness" data-toggle="tab">Featured Products</a></li>
                        </ul>
                    </div>
                    <!-- tab-menu-end -->
                </div>
            </div>
            <!-- tab-area-start -->
            <div class="tab-content">
                <div class="tab-pane fade show active" id="Audiobooks">
                    <div class="tab-active owl-carousel">
                        <!-- single-product-start -->
                        <div class="product-wrapper">
                            <div class="product-img">
                                <a href="shop.php">
                                    <img src="public/img/product/1.jpg" alt="book" class="primary" />
                                </a>
                                
                                <div class="product-flag">
                                    <ul>
                                        <li><span class="sale">new</span> <br></li>
                                        <li><span class="discount-percentage">-5%</span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-details text-center">
                                <div class="product-rating">
                                    <ul>
                                        <li><a href="shop.php"><i class="fa fa-star"></i></a></li>
                                        <li><a href="shop.php"><i class="fa fa-star"></i></a></li>
                                        <li><a href="shop.php"><i class="fa fa-star"></i></a></li>
                                        <li><a href="shop.php"><i class="fa fa-star"></i></a></li>
                                        <li><a href="shop.php"><i class="fa fa-star"></i></a></li>
                                    </ul>
                                </div>
                                <h4><a href="shop.php">Joust Duffle Bag</a></h4>
                                <div class="product-price">
                                    <ul>
                                        <li>$60.00</li>
                                    </ul>
                                </div>
                            </div>
                            
                        </div>
                        <!-- single-product-end -->
                        <!-- single-product-start -->
                        <div class="product-wrapper">
                            <div class="product-img">
                                <a href="shop.php">
                                    <img src="public/img/product/3.jpg" alt="book" class="primary" />
                                </a>
                                
                                <div class="product-flag">
                                    <ul>
                                        <li><span class="sale">new</span> <br></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-details text-center">
                                <div class="product-rating">
                                    <ul>
                                        <li><a href="shop.php"><i class="fa fa-star"></i></a></li>
                                        <li><a href="shop.php"><i class="fa fa-star"></i></a></li>
                                        <li><a href="shop.php"><i class="fa fa-star"></i></a></li>
                                        <li><a href="shop.php"><i class="fa fa-star"></i></a></li>
                                        <li><a href="shop.php"><i class="fa fa-star"></i></a></li>
                                    </ul>
                                </div>
                                <h4><a href="shop.php">Chaz Kangeroo Hoodie</a></h4>
                                <div class="product-price">
                                    <ul>
                                        <li>$52.00</li>
                                    </ul>
                                </div>
                            </div>
                            
                        </div>
                        <!-- single-product-end -->
                        <!-- single-product-start -->
                        <div class="product-wrapper">
                            <div class="product-img">
                                <a href="shop.php">
                                    <img src="public/img/product/20.jpg" alt="book" class="primary" />
                                </a>
                                
                                <div class="product-flag">
                                    <ul>
                                        <li><span class="sale">new</span> <br></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-details text-center">
                                <div class="product-rating">
                                    <ul>
                                        <li><a href="shop.php"><i class="fa fa-star"></i></a></li>
                                        <li><a href="shop.php"><i class="fa fa-star"></i></a></li>
                                        <li><a href="shop.php"><i class="fa fa-star"></i></a></li>
                                        <li><a href="shop.php"><i class="fa fa-star"></i></a></li>
                                        <li><a href="shop.php"><i class="fa fa-star"></i></a></li>
                                    </ul>
                                </div>
                                <h4><a href="shop.php">Vật Lý 10</a></h4>
                                <div class="product-price">
                                    <ul>
                                        <li>$34.00</li>
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
                                
                                <div class="product-flag">
                                    <ul>
                                        <li><span class="sale">new</span> <br></li>
                                        <li><span class="discount-percentage">-5%</span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-details text-center">
                                <div class="product-rating">
                                    <ul>
                                        <li><a href="shop.php"><i class="fa fa-star"></i></a></li>
                                        <li><a href="shop.php"><i class="fa fa-star"></i></a></li>
                                        <li><a href="shop.php"><i class="fa fa-star"></i></a></li>
                                        <li><a href="shop.php"><i class="fa fa-star"></i></a></li>
                                        <li><a href="shop.php"><i class="fa fa-star"></i></a></li>
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
                        <!-- single-product-start -->
                        <div class="product-wrapper">
                            <div class="product-img">
                                <a href="shop.php">
                                    <img src="public/img/product/9.jpg" alt="book" class="primary" />
                                </a>
                                
                                <div class="product-flag">
                                    <ul>
                                        <li><span class="discount-percentage">-5%</span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-details text-center">
                                <div class="product-rating">
                                    <ul>
                                        <li><a href="shop.php"><i class="fa fa-star"></i></a></li>
                                        <li><a href="shop.php"><i class="fa fa-star"></i></a></li>
                                        <li><a href="shop.php"><i class="fa fa-star"></i></a></li>
                                        <li><a href="shop.php"><i class="fa fa-star"></i></a></li>
                                        <li><a href="shop.php"><i class="fa fa-star"></i></a></li>
                                    </ul>
                                </div>
                                <h4><a href="shop.php">Wayfarer Messenger Bag</a></h4>
                                <div class="product-price">
                                    <ul>
                                        <li>$35.00</li>
                                        <li class="old-price">40.00</li>
                                    </ul>
                                </div>
                            </div>
                            
                        </div>
                        <!-- single-product-end -->
                        <!-- single-product-start -->
                        <div class="product-wrapper">
                            <div class="product-img">
                                <a href="shop.php">
                                    <img src="public/img/product/11.jpg" alt="book" class="primary" />
                                </a>
                               
                                <div class="product-flag">
                                    <ul>
                                        <li><span class="sale">new</span> <br></li>
                                        <li><span class="discount-percentage">-5%</span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-details text-center">
                                <div class="product-rating">
                                    <ul>
                                        <li><a href="shop.php"><i class="fa fa-star"></i></a></li>
                                        <li><a href="shop.php"><i class="fa fa-star"></i></a></li>
                                        <li><a href="shop.php"><i class="fa fa-star"></i></a></li>
                                        <li><a href="shop.php"><i class="fa fa-star"></i></a></li>
                                        <li><a href="shop.php"><i class="fa fa-star"></i></a></li>
                                    </ul>
                                </div>
                                <h4><a href="shop.php">Impulse Duffle</a></h4>
                                <div class="product-price">
                                    <ul>
                                        <li>$74.00</li>
                                        <li class="old-price">78.00</li>
                                    </ul>
                                </div>
                            </div>
                            
                        </div>
                        <!-- single-product-end -->
                    </div>
                </div>
                <div class="tab-pane fade" id="books">
                    <div class="tab-active owl-carousel">
                        <!-- single-product-start -->
                        <div class="product-wrapper">
                            <div class="product-img">
                                <a href="shop.php">
                                    <img src="public/img/product/5.jpg" alt="book" class="primary" />
                                </a>
                                
                                <div class="product-flag">
                                    <ul>
                                        <li><span class="sale">new</span> <br></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-details text-center">
                                <div class="product-rating">
                                    <ul>
                                        <li><a href="shop.php"><i class="fa fa-star"></i></a></li>
                                        <li><a href="shop.php"><i class="fa fa-star"></i></a></li>
                                        <li><a href="shop.php"><i class="fa fa-star"></i></a></li>
                                        <li><a href="shop.php"><i class="fa fa-star"></i></a></li>
                                        <li><a href="shop.php"><i class="fa fa-star"></i></a></li>
                                    </ul>
                                </div>
                                <h4><a href="shop.php">Chaz Kangeroo Hoodie</a></h4>
                                <div class="product-price">
                                    <ul>
                                        <li>$52.00</li>
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
                                
                                <div class="product-flag">
                                    <ul>
                                        <li><span class="sale">new</span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-details text-center">
                                <div class="product-rating">
                                    <ul>
                                        <li><a href="shop.php"><i class="fa fa-star"></i></a></li>
                                        <li><a href="shop.php"><i class="fa fa-star"></i></a></li>
                                        <li><a href="shop.php"><i class="fa fa-star"></i></a></li>
                                        <li><a href="shop.php"><i class="fa fa-star"></i></a></li>
                                        <li><a href="shop.php"><i class="fa fa-star"></i></a></li>
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
                        <!-- single-product-start -->
                        <div class="product-wrapper">
                            <div class="product-img">
                                <a href="shop.php">
                                    <img src="public/img/product/1.jpg" alt="book" class="primary" />
                                </a>
                                
                                <div class="product-flag">
                                    <ul>
                                        <li><span class="sale">new</span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-details text-center">
                                <div class="product-rating">
                                    <ul>
                                        <li><a href="shop.php"><i class="fa fa-star"></i></a></li>
                                        <li><a href="shop.php"><i class="fa fa-star"></i></a></li>
                                        <li><a href="shop.php"><i class="fa fa-star"></i></a></li>
                                        <li><a href="shop.php"><i class="fa fa-star"></i></a></li>
                                        <li><a href="shop.php"><i class="fa fa-star"></i></a></li>
                                    </ul>
                                </div>
                                <h4><a href="shop.php">Joust Duffle Bag</a></h4>
                                <div class="product-price">
                                    <ul>
                                        <li>$60.00</li>
                                    </ul>
                                </div>
                            </div>
                            
                        </div>
                        <!-- single-product-end -->
                        <!-- single-product-start -->
                        <div class="product-wrapper">
                            <div class="product-img">
                                <a href="shop.php">
                                    <img src="public/img/product/3.jpg" alt="book" class="primary" />
                                </a>
                                
                                <div class="product-flag">
                                    <ul>
                                        <li><span class="sale">new</span> <br></li>
                                        <li><span class="discount-percentage">-5%</span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-details text-center">
                                <div class="product-rating">
                                    <ul>
                                        <li><a href="shop.php"><i class="fa fa-star"></i></a></li>
                                        <li><a href="shop.php"><i class="fa fa-star"></i></a></li>
                                        <li><a href="shop.php"><i class="fa fa-star"></i></a></li>
                                        <li><a href="shop.php"><i class="fa fa-star"></i></a></li>
                                        <li><a href="shop.php"><i class="fa fa-star"></i></a></li>
                                    </ul>
                                </div>
                                <h4><a href="shop.php">Chaz Kangeroo Hoodie</a></h4>
                                <div class="product-price">
                                    <ul>
                                        <li>$52.00</li>
                                    </ul>
                                </div>
                            </div>
                            
                        </div>
                        <!-- single-product-end -->
                        <!-- single-product-start -->
                        <div class="product-wrapper">
                            <div class="product-img">
                                <a href="shop.php">
                                    <img src="public/img/product/9.jpg" alt="book" class="primary" />
                                </a>
                                
                                <div class="product-flag">
                                    <ul>
                                        <li><span class="sale">new</span> <br></li>
                                        <li><span class="discount-percentage">-5%</span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-details text-center">
                                <div class="product-rating">
                                    <ul>
                                        <li><a href="shop.php"><i class="fa fa-star"></i></a></li>
                                        <li><a href="shop.php"><i class="fa fa-star"></i></a></li>
                                        <li><a href="shop.php"><i class="fa fa-star"></i></a></li>
                                        <li><a href="shop.php"><i class="fa fa-star"></i></a></li>
                                        <li><a href="shop.php"><i class="fa fa-star"></i></a></li>
                                    </ul>
                                </div>
                                <h4><a href="shop.php">Wayfarer Messenger Bag</a></h4>
                                <div class="product-price">
                                    <ul>
                                        <li>$35.00</li>
                                        <li class="old-price">40.00</li>
                                    </ul>
                                </div>
                            </div>
                            
                        </div>
                        <!-- single-product-end -->
                        <!-- single-product-start -->
                        <div class="product-wrapper">
                            <div class="product-img">
                                <a href="shop.php">
                                    <img src="public/img/product/11.jpg" alt="book" class="primary" />
                                </a>
                                
                                <div class="product-flag">
                                    <ul>
                                        <li><span class="discount-percentage">-5%</span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-details text-center">
                                <div class="product-rating">
                                    <ul>
                                        <li><a href="shop.php"><i class="fa fa-star"></i></a></li>
                                        <li><a href="shop.php"><i class="fa fa-star"></i></a></li>
                                        <li><a href="shop.php"><i class="fa fa-star"></i></a></li>
                                        <li><a href="shop.php"><i class="fa fa-star"></i></a></li>
                                        <li><a href="shop.php"><i class="fa fa-star"></i></a></li>
                                    </ul>
                                </div>
                                <h4><a href="shop.php">Impulse Duffle</a></h4>
                                <div class="product-price">
                                    <ul>
                                        <li>$74.00</li>
                                        <li class="old-price">78.00</li>
                                    </ul>
                                </div>
                            </div>
                            
                        </div>
                        <!-- single-product-end -->
                    </div>
                </div>
                <div class="tab-pane fade" id="bussiness">
                    <div class="tab-active owl-carousel">
                        <!-- single-product-start -->
                        <div class="product-wrapper">
                            <div class="product-img">
                                <a href="shop.php">
                                    <img src="public/img/product/9.jpg" alt="book" class="primary" />
                                </a>
                                
                                <div class="product-flag">
                                    <ul>
                                        <li><span class="sale">new</span> <br></li>
                                        <li><span class="discount-percentage">-5%</span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-details text-center">
                                <div class="product-rating">
                                    <ul>
                                        <li><a href="shop.php"><i class="fa fa-star"></i></a></li>
                                        <li><a href="shop.php"><i class="fa fa-star"></i></a></li>
                                        <li><a href="shop.php"><i class="fa fa-star"></i></a></li>
                                        <li><a href="shop.php"><i class="fa fa-star"></i></a></li>
                                        <li><a href="shop.php"><i class="fa fa-star"></i></a></li>
                                    </ul>
                                </div>
                                <h4><a href="shop.php">Wayfarer Messenger Bag</a></h4>
                                <div class="product-price">
                                    <ul>
                                        <li>$35.00</li>
                                        <li class="old-price">40.00</li>
                                    </ul>
                                </div>
                            </div>
                            
                        </div>
                        <!-- single-product-end -->
                        <!-- single-product-start -->
                        <div class="product-wrapper">
                            <div class="product-img">
                                <a href="shop.php">
                                    <img src="public/img/product/11.jpg" alt="book" class="primary" />
                                </a>
                                
                                <div class="product-flag">
                                    <ul>
                                        <li><span class="sale">new</span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-details text-center">
                                <div class="product-rating">
                                    <ul>
                                        <li><a href="shop.php"><i class="fa fa-star"></i></a></li>
                                        <li><a href="shop.php"><i class="fa fa-star"></i></a></li>
                                        <li><a href="shop.php"><i class="fa fa-star"></i></a></li>
                                        <li><a href="shop.php"><i class="fa fa-star"></i></a></li>
                                        <li><a href="shop.php"><i class="fa fa-star"></i></a></li>
                                    </ul>
                                </div>
                                <h4><a href="shop.php">Impulse Duffle</a></h4>
                                <div class="product-price">
                                    <ul>
                                        <li>$74.00</li>
                                        <li class="old-price">78.00</li>
                                    </ul>
                                </div>
                            </div>
                            
                        </div>
                        <!-- single-product-end -->
                        <!-- single-product-start -->
                        <div class="product-wrapper">
                            <div class="product-img">
                                <a href="shop.php">
                                    <img src="public/img/product/1.jpg" alt="book" class="primary" />
                                </a>
                                
                                <div class="product-flag">
                                    <ul>
                                        <li><span class="sale">new</span> <br></li>
                                        <li><span class="discount-percentage">-5%</span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-details text-center">
                                <div class="product-rating">
                                    <ul>
                                        <li><a href="shop.php"><i class="fa fa-star"></i></a></li>
                                        <li><a href="shop.php"><i class="fa fa-star"></i></a></li>
                                        <li><a href="shop.php"><i class="fa fa-star"></i></a></li>
                                        <li><a href="shop.php"><i class="fa fa-star"></i></a></li>
                                        <li><a href="shop.php"><i class="fa fa-star"></i></a></li>
                                    </ul>
                                </div>
                                <h4><a href="shop.php">Joust Duffle Bag</a></h4>
                                <div class="product-price">
                                    <ul>
                                        <li>$60.00</li>
                                    </ul>
                                </div>
                            </div>
                            
                        </div>
                        <!-- single-product-end -->
                        <!-- single-product-start -->
                        <div class="product-wrapper">
                            <div class="product-img">
                                <a href="shop.php">
                                    <img src="public/img/product/3.jpg" alt="book" class="primary" />
                                </a>
                                
                                <div class="product-flag">
                                    <ul>
                                        <li><span class="sale">new</span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-details text-center">
                                <div class="product-rating">
                                    <ul>
                                        <li><a href="shop.php"><i class="fa fa-star"></i></a></li>
                                        <li><a href="shop.php"><i class="fa fa-star"></i></a></li>
                                        <li><a href="shop.php"><i class="fa fa-star"></i></a></li>
                                        <li><a href="shop.php"><i class="fa fa-star"></i></a></li>
                                        <li><a href="shop.php"><i class="fa fa-star"></i></a></li>
                                    </ul>
                                </div>
                                <h4><a href="shop.php">Chaz Kangeroo Hoodie</a></h4>
                                <div class="product-price">
                                    <ul>
                                        <li>$52.00</li>
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
                               
                                <div class="product-flag">
                                    <ul>
                                        <li><span class="sale">new</span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-details text-center">
                                <div class="product-rating">
                                    <ul>
                                        <li><a href="shop.php"><i class="fa fa-star"></i></a></li>
                                        <li><a href="shop.php"><i class="fa fa-star"></i></a></li>
                                        <li><a href="shop.php"><i class="fa fa-star"></i></a></li>
                                        <li><a href="shop.php"><i class="fa fa-star"></i></a></li>
                                        <li><a href="shop.php"><i class="fa fa-star"></i></a></li>
                                    </ul>
                                </div>
                                <h4><a href="shop.php">Set of Sprite Yoga Straps</a></h4>
                                <div class="product-price">
                                    <ul>
                                        <li>$34.00</li>
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
                                
                                <div class="product-flag">
                                    <ul>
                                        <li><span class="discount-percentage">-5%</span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-details text-center">
                                <div class="product-rating">
                                    <ul>
                                        <li><a href="shop.php"><i class="fa fa-star"></i></a></li>
                                        <li><a href="shop.php"><i class="fa fa-star"></i></a></li>
                                        <li><a href="shop.php"><i class="fa fa-star"></i></a></li>
                                        <li><a href="shop.php"><i class="fa fa-star"></i></a></li>
                                        <li><a href="shop.php"><i class="fa fa-star"></i></a></li>
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
            </div>
            <!-- tab-area-end -->
        </div>
    </div>
    <!-- product-area-end -->

    <!-- banner-area-start -->
    <div class="banner-area banner-res-large pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="single-banner mb-30">
                        <div class="banner-img">
                            <a><img src="public/img/banner/1.png" alt="banner" /></a>
                        </div>
                        <div class="banner-text">
                            <h4>Free Ship</h4>
                            <p>For all orders over $500</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="single-banner mb-30">
                        <div class="banner-img">
                            <a><img src="public/img/banner/3.png" alt="banner" /></a>
                        </div>
                        <div class="banner-text">
                            <h4>Cash on delivery</h4>
                            <p>Lorem ipsum dolor consect</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="single-banner mb-30">
                        <div class="banner-img">
                            <a><img src="public/img/banner/4.png" alt="banner" /></a>
                        </div>
                        <div class="banner-text">
                            <h4>Help & Support</h4>
                            <p>Call us : + 0123.4567.89</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- banner-area-end -->


   <?php include_once 'layout/footer.php'; ?>