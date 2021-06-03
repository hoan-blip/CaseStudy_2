<?php include 'ketnoicsdl.php'; ?>
<?php include 'layout/header.php'; ?>
<?php include 'layout/menu.php'; ?>
<?php 
    //kiểm tra xử lí khi submit from ới method
    if( $_SERVER['REQUEST_METHOD'] == 'POST' ){
        // echo '<pre>';
        //     print_r( $_REQUEST );
        // echo '</pre>';
        // die();

        $Ten_danh_muc = $_REQUEST['Ten_danh_muc'];
        //xác thực dữ liệu
        if( $Ten_danh_muc != '' ){
            $sql = "INSERT INTO theloai ( Ten_danh_muc ) VALUES ( '$Ten_danh_muc' ) ";
            $stmt = $connect->query( $sql );
            
            //chuyển hướng về trang danh sách
            header("Location: list-categories.php");
        }
    }
?>
<div class="content">


    <div class="breadLine">

        <ul class="breadcrumb">
            <li><a href="list-categories.php">Liệt Kê Danh Mục</a> <span class="divider">></span></li>
            <li class="active">Thêm</li>
        </ul>

    </div>

    <div class="workplace">

        <div class="row-fluid">

            <div class="span12">
                <div class="head">
                    <div class="isw-grid"></div>
                    <h1>DANH MỤC</h1>
                    <div class="clear"></div>
                </div>
                <div class="block-fluid">
                    <form action="" method="POST">
                    	<div class="row-form">
                            <div class="span3">Tên Danh Mục:</div>
                            <div class="span9"><input type="text" name='Ten_danh_muc' placeholder="Nhập vào tên danh mục"/></div>
                            <div class="clear"></div>
                        </div> 
                        <div class="row-form">
                            <div class="span3">Trạng thái:</div>
                            <div class="span9">
                                <select name="select">
                                    <option value="0">Choose a option...</option>
                                    <option value="1">Activate</option>
                                    <option value="2">Deactivate</option>
                                </select>
                            </div>
                            <div class="clear"></div>
                        </div>                          
                        <div class="row-form">
                        	<button class="btn btn-success" type="submit">Lưu</button>
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