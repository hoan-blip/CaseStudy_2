<?php 
session_start();
if( !isset($_SESSION['sinhvien']) ){
    header( 'Location: login.php' );
} 
?>
<?php  include 'layout/header.php'; ?>
<?php  include 'layout/menu.php'; ?>
<?php  include 'ketnoicsdl.php'; ?>

<?php
    $sql = "SELECT * FROM `muonsach`
    JOIN sinhvien  ON muonsach.ID_SV = sinhvien.ID
    JOIN book ON muonsach.ID_Sach = book.ID_Sach";

    $sql = "SELECT muonsach.ID,muonsach.Ngay_muon, sinhvien.Ten_SV, book.Ten_Sach  FROM `muonsach`
    JOIN sinhvien  ON muonsach.ID_SV = sinhvien.ID
    JOIN book ON muonsach.ID_Sach = book.ID_Sach";

    //thực hiện truy vấn
    $stmt  = $connect->query( $sql );
    //tùy chọn kiểu trả về
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    //lấy tất cả kết quả
    $rows   = $stmt->fetchAll();
?>

<div class="content">
    <div class="breadLine">
        <ul class="breadcrumb">
            <li><a href="list-products.php">Sách Đã Mượn</a></li>
        </ul>
    </div>
    <div class="workplace">
        <div class="row-fluid">
            <div class="span12 search">
                <form>
                    <input type="text" class="span11" placeholder="Some text for search..." name="search"/>
                    <button class="btn span1" type="submit">Search</button>
                </form>
            </div>
        </div>
        <!-- /row-fluid-->

        <div class="row-fluid">

            <div class="span12">
                <div class="head">
                    <div class="isw-grid"></div>
                    <h1>Sách Đã Mượn</h1>

                    <div class="clear"></div>
                </div>
                <div class="block-fluid table-sorting">
                    <a href="add-borrow.php" class="btn btn-add">Thêm</a>
                    <table cellpadding="0" cellspacing="0" width="100%" class="table" id="tSortable_2">
                        <thead>
                        <tr>
                            <th><input type="checkbox" id="checkAll"/></th>
                            <th class="sorting"><a href="#">ID</a></th>
                            <th class="sorting"><a href="#">Tên Sách</a></th>
                            <th class="sorting"><a href="#">Tên Sinh Viên</a></th>
                            <th class="sorting"><a href="#">Ngày Mượn</a></th>
                            <th >Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            <!-- START LOOP-->
                            <?php foreach( $rows as $key => $row ):?>
                            <?php
                              $row->Ngay_muon = date('d-m-Y', strtotime($row->Ngay_muon) );      
                            ?>
                                <tr>
                                    <td><input type="checkbox" name="checkbox"/></td>
                                    <td><?php echo $row->ID;?></td>
                                    <td><?php echo $row->Ten_Sach;?></td>
                                    <td><?php echo $row->Ten_SV;?></td>
                                    <td><?php echo $row->Ngay_muon;?></td>
                                    <td>
                                    <a href="edit-borrow.php?id=<?php echo $row->ID;?>" style="background:green" class="btn btn-info">Sửa</a>
                                    <a href="delete-borrow.php?id=<?php echo $row->ID;?>" style="background:red" class="btn btn-info" onclick="xac_nhan()">Xóa</a></td>
                                </tr>
                            <?php endforeach; ?>
                            <!-- END LOOP-->
                        </tbody>
                    </table>
                    <!-- <div class="bulk-action">
                        <a href="#" class="btn btn-success">Activate</a>
                        <a href="#" class="btn btn-danger">Delete</a>
                    </div>/bulk-action -->
                    <div class="dataTables_paginate">
                        <a class="first paginate_button paginate_button_disabled" href="#">First</a>
                        <a class="previous paginate_button paginate_button_disabled" href="#">Previous</a>
                        <span>
                            <a class="paginate_active" href="#">1</a>
                            <a class="paginate_button" href="#">2</a>
                        </span>
                        <a class="next paginate_button" href="#">Next</a>
                        <a class="last paginate_button" href="#">Last</a>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>

        </div>
        <div class="dr"><span></span></div>

    </div>

</div>
<script>
    function xac_nhan(){
        let thong_bao = confirm('Bạn có chắc chắn xóa hay không ?');
        if( thong_bao == false ){
            console.log( event );
            event.preventDefault();
        }
    }
</script>
<?php  include 'layout/footer.php'; ?>
