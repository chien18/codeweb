<?php
session_start();
unset($_SESSION['ten_nguoi_dung']);
unset($_SESSION['nguoi_dung_id']);
unset($_SESSION['nguoi_dung_email']);

header('Location: http://localhost/tintucdulich/');
?>