<?php  include 'ketnoicsdl.php'; ?>
<?php  include 'layout/header.php'; ?>
<?php  include 'layout/menu.php'; ?>
<?php 
  
    $id = $_GET['id'];

    $sql    = "SELECT book.*,theloai.Ten_danh_muc FROM `book` JOIN theloai ON 
    book.ID_danh_muc = theloai.ID_danh_muc WHERE ID_Sach = $id";
    $stmt   = $connect->query( $sql );
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $row    = $stmt->fetch();

     
    $sql    = "SELECT * FROM theloai";
    $stmt  = $connect->query( $sql );
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $The_loais   = $stmt->fetchAll();
 

    if( $_SERVER['REQUEST_METHOD'] == 'POST' ){
        $Ten_sach = $_REQUEST['Ten_sach'];
        $The_loai = $_REQUEST['The_loai'];
        $Hinh_anh = $_REQUEST['Hinh_anh'];
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
        if( $Hinh_anh != '' ){
        
    
        $sql    = " UPDATE book SET Ten_sach = '$Ten_sach',ID_danh_muc = '$The_loai',Hinh_anh = '$Hinh_anh',gia_tien = '$gia_tien' WHERE ID_Sach = $id ";
        $stmt   = $connect->query( $sql );
        header("Location: list-products.php");
        }
    }
    
   
?>
<div class="content">


    <div class="breadLine">

        <ul class="breadcrumb">
            <li><a href="list-products.php">Liệt Kê Sản Phẩm</a> <span class="divider">></span></li>
            <li class="active">Sửa</li>
        </ul>

    </div>
    <?php 
   
    ?>
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
                            <div class="span9"><input type="text" name="Ten_sach" 
                            placeholder="Nhập tên sản phẩm"
                            value="<?php echo $row->Ten_sach; ?>"/></div>
                            <div class="clear"></div>
                        </div> 
                        <div class="row-form">
                            <div class="span3">Thể Loại:</div>
                            <div class="span9">
                                <select name="The_loai" >
                                    <option value="0">Chọn Thể Loại</option>
                                    <?php foreach( $The_loais as $The_loai ):?>
                                    <option 
                                    value="<?php echo $The_loai->ID_danh_muc ;?>"
                                    <?php if ($row->ID_danh_muc == $The_loai->ID_danh_muc) {
                                        echo 'selected';
                                    } ?>
                                    ><?php echo $The_loai->Ten_danh_muc ;?>
                                    </option>
                                    <?php endforeach;?>
                                </select>
                            <div class="clear"></div>
                        </div> 
                        <div class="row-form">
                        </div> 
                        <div class="row-form">
                            <div class="span3">Giá Sách:</div>
                            <div class="span9"><input type="number" name="gia_tien" 
                            value="<?php echo $row->gia_tien; ?>"/></div>
                            <div class="clear"></div>
                        </div> 
                    	<div class="row-form">
                            <div class="span3">Hình Ảnh:</div>
                            <div class="span9"><input type="file" name="Hinh_anh" 
                            value="<?php echo $row->Hinh_anh; ?>"/></div>
                            <div class="clear"></div>
                        </div> 
                    	                    
                        <div class="row-form">
                        	<button class="btn btn-success" type="submit">Update</button>
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
<?php  include 'layout/footer.php'; ?>
