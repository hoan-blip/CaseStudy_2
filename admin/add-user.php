<?php  include 'ketnoicsdl.php'; ?>
<?php  include 'layout/header.php'; ?>
<?php  include 'layout/menu.php'; ?>
<?php 
    //kiểm tra xử lí khi submit from ới method
    if( $_SERVER['REQUEST_METHOD'] == 'POST' ){
        // echo '<pre>';
        //     print_r( $_REQUEST );
        // echo '</pre>';
        

        $Ten_SV = $_REQUEST['Ten_SV'];
        $SDT = $_REQUEST['SDT'];

        //xác thực dữ liệu
        if( $Ten_SV != '' && $SDT != ''){
            $sql = "INSERT INTO sinhvien ( Ten_SV, SDT) VALUES ( '$Ten_SV', '$SDT' ) ";
            $stmt = $connect->query( $sql );
            
            //chuyển hướng về trang danh sách
            header("Location: list-users.php");
        }
    }
        
?>
<div class="content">


    <div class="breadLine">

        <ul class="breadcrumb">
            <li><a href="list-users.php">Danh Sách Sinh Viên</a> <span class="divider">></span></li>
            <li class="active">Thêm</li>
        </ul>

    </div>

    <div class="workplace">

        <div class="row-fluid">

            <div class="span12">
                <div class="head">
                    <div class="isw-grid"></div>
                    <h1>QUẢN LÝ NGƯỜI DÙNG</h1>

                    <div class="clear"></div>
                </div>
                <div class="block-fluid">
                    <form action="" method="POST">
                    	<div class="row-form">
                            <div class="span3">Họ và Tên:</div>
                            <div class="span9"><input type="text" name="Ten_SV" placeholder="Some text value..."/></div>
                            <div class="clear"></div>
                        </div> 
                    	<div class="row-form">
                            <div class="span3">SDT:</div>
                            <div class="span9"><input type="text" name="SDT" placeholder="Some text value..."/></div>
                            <div class="clear"></div>
                        </div> 
                            <div class="span3">Kích hoạt:</div>
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