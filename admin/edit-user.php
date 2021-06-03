<?php include 'ketnoicsdl.php'; ?>
<?php include 'layout/header.php'; ?>
<?php include 'layout/menu.php'; ?>
<?php 
  
    $id = $_GET['id'];

    $sql    = "SELECT * FROM sinhvien WHERE ID = $id ";
    $stmt   = $connect->query( $sql );
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $row    = $stmt->fetch();

    if( $_SERVER['REQUEST_METHOD'] == 'POST' ){
        $Ten_SV = $_REQUEST['Ten_SV'];
        $sql    = " UPDATE sinhvien SET Ten_SV = '$Ten_SV' WHERE ID = $id ";
        $stmt   = $connect->query( $sql );

        header("Location: list-users.php");
    }
    if( $_SERVER['REQUEST_METHOD'] == 'POST' ){
        $SDT = $_REQUEST['SDT'];
        $sql    = " UPDATE sinhvien SET SDT = '$SDT' WHERE ID = $id ";
        $stmt   = $connect->query( $sql );

        header("Location: list-users.php");
    }
   
?>
<div class="content">


    <div class="breadLine">

        <ul class="breadcrumb">
            <li><a href="list-users.php">Danh Sách Sinh Viên</a> <span class="divider">></span></li>
            <li class="active">Sửa</li>
        </ul>

    </div>

    <div class="workplace">

        <div class="row-fluid">

            <div class="span12">
                <div class="head">
                    <div class="isw-grid"></div>
                    <h1>QUẢN LÝ SINH VIÊN</h1>

                    <div class="clear"></div>
                </div>
                <div class="block-fluid">
                    <form action="" method="POST">
                    	<div class="row-form">
                            <div class="span3">Họ và Tên:</div>
                            <div class="span9"><input type="text" name="Ten_SV" placeholder="Some text value..."
                            value="<?php echo $row->Ten_SV; ?>"/></div>
                            <div class="clear"></div>
                        </div> 
                    	<div class="row-form">
                            <div class="span3">SDT:</div>
                            <div class="span9"><input type="text" name="SDT" placeholder="Some text value..."
                            value="<?php echo $row->SDT; ?>"/></div>
                            <div class="clear"></div>
                        </div> 
                        <div class="row-form">
                            <div class="span3">Kích Hoạt:</div>
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
                        	<button class="btn btn-success" type="submit">Cập Nhật</button>
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