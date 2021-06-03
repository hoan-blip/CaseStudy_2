<?php session_start(); ?>
<?php
    unset( $_SESSION['sinhvien'] );
        header( 'Location: login.php' );
?>
