<?php
    session_start();

    include 'function.php';
    $db = new Database();
    if(isset($_POST['kirim']))
    {
        $db->pinjamBuku($_POST['tanggal_peminjaman'],$_POST['tanggal_pengembalian'],$_POST['username'],$_POST['id_buku']);
        header("location:home_anggota.php");
    }
?>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <title>Pinjam Buku</title>
    </head>
    <body>
        <center>
            <div class="e_a_buku" style="height:385px; margin-top: 135px;"><br>
                <form action="" method="post">
                    <p>Pinjam Buku</p><br>
                    <input type="text" name="username" value="<?php echo $_SESSION['username'];?>" required hidden>
                    <input type="number" name="id_buku" placeholder="ID Buku" required><br>
                    <input type="date" name="tanggal_peminjaman" placeholder="Penerbit" required><br>
                    <input type="date" name="tanggal_pengembalian" placeholder="Tahun Terbit" required><br><br>
                    <button type="reset" name="reset">RESET</button><button type="submit" name="kirim">SEND</button><br><br>
                    <a href="home_anggota.php">Kembali</a>
                </form>
            </div>
        </center>
    </body>
</html>
