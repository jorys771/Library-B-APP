<?php
    
?>
<?php
    session_start();
    include 'function.php';
    $db = new Database();

   
    if (isset($_POST['captcha'], $_POST['username'], $_POST['password'], $_POST['nama'], $_POST['nik'], $_POST['no_telepon']))
    { 
        $captcha = $_POST['captcha'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $level = $_POST['level'];
        $nama = $_POST['nama'];
        $nik = $_POST['nik'];
        $no_telepon = $_POST['no_telepon'];
    }
    header("location:daftar.php");

    if($_POST['captcha'] == $_SESSION['my_captcha']){
        $db->daftarAkun($_POST['username'],$_POST['password'],$_POST['level']);
        $db->daftarAnggota($_POST['nama'],$_POST['nik'],$_POST['no_telepon'],$_POST['username']);
        header ("Location: login.php");
    }
    else {
        header("location:daftar.php");
    }
    unset ($_SESSION['my_captcha']);
?>
