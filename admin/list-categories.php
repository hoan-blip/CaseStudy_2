<?php
session_start();
if( !isset($_SESSION['sinhvien']) ){
    header( 'Location: login.php' );
} 
?>
<?php    include 'layout/header.php'; ?>
<?php    include 'layout/menu.php'; ?>
<?php    include 'ketnoicsdl.php'; ?>
<?php  
    //lấy tất cả từ bảng thể loại
    $sql = "SELECT * FROM theloai";
    //thực hiện truy vấn
    $stmt = $connect->query( $sql );
    //tùy chọn trả về
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    //lấy kết quả
    $rows = $stmt->fetchAll(); 
    ?>
<div class="content">


    <div class="breadLine">

        <ul class="breadcrumb">
            <li><a href="list-categories.php">Liệt Kê Danh Mục</a></li>
        </ul>

    </div>

    <div class="workplace">

        <div class="row-fluid">
            <div class="span12 search">
                <form>
                    <input type="text" class="span11" placeholder="Search..." name="search"/>
                    <button class="btn span1" type="submit">Tìm kiếm</button>
                </form>
            </div>
        </div>
        <!-- /row-fluid-->
        <div class="row-fluid">

            <div class="span12">
                <div class="head">
                    <div class="isw-grid"></div>
                    <h1>QUẢN LÝ DANH MỤC</h1>

                    <div class="clear"></div>
                </div>
                <div class="block-fluid table-sorting">
                    <a href="add-category.php" class="btn btn-add">Thêm Danh Mục</a>
                    <table cellpadding="0" cellspacing="0" width="100%" class="table" id="tSortable_2">
                        <thead>
                        <tr>
                            <th><input type="checkbox" id="checkAll"/></th>
                            <th class="sorting"><a href="#">ID</a></th>
                            <th class="sorting"><a href="#">Tên Danh Mục</a></th>
                            <th >Hoạt Động</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($rows as $key => $row): ?>
                        <tr>
                            <td><input type="checkbox" name="checkbox"/></td>
                            <td><?php echo $row->ID_danh_muc ?></td>
                            <td><?php echo $row->Ten_danh_muc ?></td>
                            
                            <td>
                                <a href="edit-category.php?id=<?php echo $row->ID_danh_muc ;?>" style="background:green" class="btn btn-info">Sửa</a>
                                <a href="delete-category.php?id=<?php echo $row->ID_danh_muc ;?>" style="background:red" class="btn btn-info" onclick="xac_nhan()">Xóa</a>
                                </td>
                        </tr>
                        <?php endforeach ?>
                        </tbody>
                    </table>
                    <!-- <div class="bulk-action">
                        <a href="#" class="btn btn-success">Kích Hoạt</a>
                        <a href="#" class="btn btn-danger">Xóa</a>
                    </div>/bulk-action -->
                    <div class="dataTables_paginate">
                        <a class="first paginate_button paginate_button_disabled" href="#">Đầu tiên</a>
                        <a class="previous paginate_button paginate_button_disabled" href="#">Trước</a>
                        <span>
                            <a class="paginate_active" href="#">1</a>
                            <a class="paginate_button" href="#">2</a>
                        </span>
                        <a class="next paginate_button" href="#">Tiếp theo</a>
                        <a class="last paginate_button" href="#">Cuối cùng</a>
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
<?php    include 'layout/footer.php'; ?>

