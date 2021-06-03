<?php  include 'ketnoicsdl.php'; ?>
<?php  include 'layout/header.php'; ?>
<?php  include 'layout/menu.php'; ?>
<?php 
    $sql    = "SELECT * FROM theloai";
    $stmt  = $connect->query( $sql );
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $The_loai   = $stmt->fetchAll();
    //kiểm tra xử lí khi submit from ới method
    if( $_SERVER['REQUEST_METHOD'] == 'POST' ){
       
        $Ten_sach = $_REQUEST['Ten_sach'];
        $The_loai = $_REQUEST['The_loai'];
        $gia_tien = $_REQUEST['gia_tien'];
        
        if ( isset( $_FILES['Hinh_anh'] ) ){
            $tmp_name = $_FILES['Hinh_anh']['tmp_name'];
            $name     = $_FILES['Hinh_anh']['name'];

            $duoi = end( explode('.',$name) );

            $name      = time().'.'.$duoi;

            $target_file = 'img/products/'.$name;
            $upload  = move_uploaded_file($tmp_name,$target_file);

            $Hinh_anh = $target_file;
        }
        //  echo '<pre>';
        //     print_r( $_REQUEST );
        // echo '</pre>';
        //xác thực dữ liệu
        if( $Ten_sach != '' && $The_loai != '' && $Hinh_anh != '' && $gia_tien != '' ){
            $sql = "INSERT INTO book ( Ten_sach,ID_danh_muc,Hinh_anh,gia_tien ) VALUES ( '$Ten_sach',$The_loai,'$Hinh_anh','$gia_tien' ) ";

            $stmt = $connect->query( $sql );
            // $sqld = "INSERT INTO theloai ( Ten_danh_muc ) VALUES ( '$The_loai' ) ";
            // $stmt = $connect->query( $sqld );
            
            //chuyển hướng về trang danh sách
            header("Location: list-products.php");
        }
    }
?>
<div class="content">


    <div class="breadLine">

        <ul class="breadcrumb">
            <li><a href="list-products.php">Danh Sách Sinh Viên</a> <span class="divider">></span></li>
            <li class="active">Thêm</li>
        </ul>

    </div>

    <div class="workplace">

        <div class="row-fluid">

            <div class="span12">
                
                <div class="head">
                    <div class="isw-grid"></div>
                    <h1>QUẢN LÝ SẢN PHẨM</h1>

                    <div class="clear"></div>
                </div>
                <div class="block-fluid">
                    <form action="" method="POST" enctype="multipart/form-data">
                    	<div class="row-form">
                            <div class="span3">Tên Sản Phẩm:</div>
                            <div class="span9"><input type="text" name="Ten_sach" placeholder="some text value..."/></div>
                            <div class="clear"></div>
                        </div> 
                        <div class="row-form">
                            <div class="span3">Thể Loại:</div>
                            <div class="span9">
                            <select name="The_loai">
                                    <option value="0">Chọn Thể Loại</option>
                                    <?php foreach( $The_loai as $Ten_Sach ):?>
                                    <option value="<?php echo $Ten_Sach->ID_danh_muc ;?>">
                                    <?php echo $Ten_Sach->Ten_danh_muc ;?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="row-form" >
                            <div class="span3">Giá SÁch:</div>
                            <div class="span9"><input type="number" name="gia_tien" /></div>
                            <div class="clear"></div>
                        </div> 
                        <div class="row-form" >
                            <div class="span3">Hình ảnh:</div>
                            <div class="span9"><input type="file" name="Hinh_anh" /></div>
                            <div class="clear"></div>
                        </div> 
                    
                                              
                        <div class="row-form">
                        	<button class="btn btn-success" type="submit">Tạo</button>
							<div class="clear"></div>
                        </div>
                    </form>
                    <div class="clear"></div>
                </div>
            </div>

        </div>
        <div class="dr"><span></span></div>

    </div>

</div>

<?php include 'layout/footer.php'; ?>