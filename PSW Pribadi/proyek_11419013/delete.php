<?php 
    include 'function.php';
    $db = new Database();

    $db->hapus($_GET['id']);
    header("location:home_petugas.php");

?>