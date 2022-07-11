<?php
    session_start();

    include 'function.php';
    $db = new Database();
    if(isset($_POST['tambah']))
    {
        $db->tambahBuku($_POST['judul'],$_POST['kategori'],$_POST['lokasi_buku'],$_POST['penulis'],$_POST['penerbit'],$_POST['tahun_terbit']);
        header("location:home_petugas.php");
    }
?>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <title>Tambah Buku</title>
    </head>
    <body>
        <center>
            <div class="e_a_buku">
                <form action="" method="post">
                    <p>Tambah Buku</p><br>
                    <input type="text" name="judul" placeholder="Judul" required><br>
                    <input type="text" name="kategori" placeholder="Kategori" required><br>
                    <input type="text" name="lokasi_buku" placeholder="Lokasi Buku" required><br>
                    <input type="text" name="penulis" placeholder="Penulis" required><br>
                    <input type="text" name="penerbit" placeholder="Penerbit" required><br>
                    <input type="number" name="tahun_terbit" placeholder="Tahun Terbit" required><br><br>
                    <button type="reset" name="reset">RESET</button><button type="submit" name="tambah">TAMBAH</button><br><br>
                    <a href="home_petugas.php">Kembali</a>
                </form>
            </div>
        </center>
    </body>
</html>
