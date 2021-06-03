<?php  include 'layout/header.php'; ?>
<?php  include 'layout/menu.php'; ?>
<?php  include 'ketnoicsdl.php'; ?>
<?php

    //Lấy tất cả sinh viên
    $sql    = "SELECT * FROM sinhvien";
    $stmt  = $connect->query( $sql );
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $sinhviens   = $stmt->fetchAll();

    //Lấy tất cả sách
    $sql    = "SELECT * FROM book";
    $stmt  = $connect->query( $sql );
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $Ten_Sachs   = $stmt->fetchAll();

    //xử lý lưu dữ liệu
    if( $_SERVER['REQUEST_METHOD'] == 'POST' ){

        $ID_Sach    = $_REQUEST['ID_Sach'];
        $ID_SV      = $_REQUEST['ID_SV'];
        $Ngay_muon  = $_REQUEST['Ngay_muon'];

        //chuyển sang định dạng Y-m-d
        $Ngay_muon = date('Y-m-d', strtotime($Ngay_muon) );

        //chèn dữ liệu vào
        $sql = " INSERT INTO muonsach 
                    ( ID_Sach ,ID_SV ,Ngay_muon) 
                    VALUES 
                    ( $ID_Sach,$ID_SV,'$Ngay_muon')";

        $stmt  = $connect->query( $sql );

        //chuyển hướng về trang danh sách
        header("Location: list-borrow.php");
    }
?>

<div class="content">
    <div class="breadLine">
        <ul class="breadcrumb">
            <li><a href="list-borrows.php">Sách Đã Mượn </a> <span class="divider">></span></li>
            <li class="active">Thêm</li>
        </ul>
    </div>
    <div class="workplace">
        <div class="row-fluid">
            <div class="span12">
                <?php
                // echo '<pre>';
                   
                //     print_r( $Ten_Sachs );
                // echo '</pre>';
                ?>
                <div class="head">
                    <div class="isw-grid"></div>
                    <h1>Thêm</h1>
                    <div class="clear"></div>
                </div>
                <div class="block-fluid">
                    <form action="" method="POST">
                        

                        <div class="row-form">
                            <div class="span3">Sách:</div>
                            <div class="span9">
                                <select name="ID_Sach">
                                    <option value="0">Chọn Sách</option>
                                    <?php foreach( $Ten_Sachs as $Ten_Sach ):?>
                                    <option value="<?php echo $Ten_Sach->ID_Sach ;?>">
                                    <?php echo $Ten_Sach->Ten_sach ;?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="clesar"></div>
                        </div>

                        <div class="row-form">
                            <div class="span3">Sinh Viên:</div>
                            <div class="span9">
                                <select name="ID_SV">
                                    <option value="0">Chọn Sinh Viên</option>
                                    
                                    <?php foreach( $sinhviens as $sinhvien ):?>
                                    <option 
                                    value="<?php echo $sinhvien->ID ;?>"
                                    ><?php echo $sinhvien->Ten_SV ;?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="row-form">
                            <div class="span3">Ngày Mượn:</div>
                            <div class="span9">
                                <input type="date" name="Ngay_muon"  />
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
<?php  include 'layout/footer.php'; ?>