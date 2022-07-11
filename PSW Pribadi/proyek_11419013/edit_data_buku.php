<?php
    session_start();
    include_once('function.php');
         
    $database = new mysqli('127.0.0.1', 'root', '', 'library_b_app');
    $id = $_GET['id'];
    $query = mysqli_query($database,"SELECT * FROM buku WHERE id_buku = $id");
    $result = mysqli_fetch_assoc($query);

    if(isset($_POST["edit"]))
    {
        $judul = $_POST['judul'];
        $kategori = $_POST['kategori'];
        $lokasi_buku = $_POST['lokasi_buku'];
        $penulis = $_POST['penulis'];
        $penerbit = $_POST['penerbit'];
        $tahun_terbit = $_POST['tahun_terbit'];
        $query = mysqli_query($database, "UPDATE buku SET judul='$judul', kategori='$kategori', lokasi_buku='$lokasi_buku', penulis='$penulis', penerbit='$penerbit',
        tahun_terbit='$tahun_terbit' WHERE id_buku='$id'");

        if($query)
        { 
            header('Location: home_petugas.php');
        }
        else
        {
            echo 'gagal';
        }

    }
    $database -> close();

?>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <title>Edit Data Buku</title>
    </head>
    <body>
        <center>
            <div class="e_a_buku">
                <form action="" method="post">
                    <p>Edit Data</p><br>
                    <input type="text" name="judul" placeholder="Judul" value="<?= $result['judul']?>" required><br>
                    <input type="text" name="kategori" placeholder="Kategori" value="<?= $result['kategori']?>" required><br>
                    <input type="text" name="lokasi_buku" placeholder="Lokasi Buku" value="<?= $result['lokasi_buku']?>"required><br>
                    <input type="text" name="penulis" placeholder="Penulis" value="<?= $result['penulis']?>" required><br>
                    <input type="text" name="penerbit" placeholder="Penerbit" value="<?= $result['penerbit']?>" required><br>
                    <input type="number" name="tahun_terbit" placeholder="Tahun Terbit" value="<?= $result['tahun_terbit']?>" required><br><br>
                    <button type="reset" name="reset">RESET</button><button type="submit" name="edit">EDIT</button><br><br>
                    <a href="home_petugas.php">Kembali</a>
                </form>
            </div>
        </center>
    </body>
</html>
