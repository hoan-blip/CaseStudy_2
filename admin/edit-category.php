<?php  include 'ketnoicsdl.php'; ?>
<?php  include 'layout/header.php'; ?>
<?php  include 'layout/menu.php'; ?>
<?php 
    //lấy id được truyền qua
    $id = $_GET['id'];//10

    // lấy 1 kết quả duy nhất từ thể loại dựa vào id_danh_muc
    $sql    = "SELECT * FROM theloai WHERE ID_danh_muc = $id ";
    $stmt   = $connect->query( $sql );
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $row    = $stmt->fetch();

    //kiểm tra xử lý khi submit form với method POST
    if( $_SERVER['REQUEST_METHOD'] == 'POST' ){
        //lấy giá trị gán vào biến
        $Ten_danh_muc = $_REQUEST['Ten_danh_muc'];

        //cập nhật dữ liệu
        $sql    = " UPDATE theloai SET Ten_danh_muc = '$Ten_danh_muc' WHERE ID_danh_muc = $id ";
        $stmt   = $connect->query( $sql );

        //chuyển hướng về trang danh sách
        header("Location: list-categories.php");
    }
    
?>
<div class="content">
    <div class="breadLine">
        <ul class="breadcrumb">
            <li><a href="list-categories.php">List Categories</a> <span class="divider">></span></li>
            <li class="active">Edit</li>
        </ul>
    </div>
    <div class="workplace">
        <div class="row-fluid">
            <div class="span12">
                <div class="head">
                    <div class="isw-grid"></div>
                    <h1>Cập Nhật Danh Mục</h1>

                    <div class="clear"></div>
                </div>
                <div class="block-fluid">
                    <form action="" method="POST">
                    	<div class="row-form">
                            <div class="span3">Tên Danh Mục:</div>
                            <div class="span9">
                                <input type="text" name="Ten_danh_muc" placeholder="Nhập tên danh mục"
                                value="<?php echo $row->Ten_danh_muc; ?>"
                                />
                            </div>
                            <div class="clear"></div>
                        </div> 
                        <div class="row-form">
                            <div class="span3">Activate:</div>
                            <div class="span9">
                                <select name="select">
                                        <option value="0">choose a option...</option>
                                        <option value="1">Activate</option>
                                        <option value="2">Deactivate</option>
                                </select>
                            </div>
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
​
</div>
<?php  include 'layout/footer.php'; ?>