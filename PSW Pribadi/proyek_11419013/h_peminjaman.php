<?php
    session_start();
    include_once('function.php');
    $database = new mysqli('127.0.0.1', 'root', '', 'library_b_app');
    $db = new Database();
?>

<script type="text/javascript">
	function logout()
    {
        var conf= confirm("Do you really want to logout?");
        if (conf == true){
            window.location.href = "logout.php";
            session_destroy();
        }else{
        }
    }
</script>

<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <title>History Peminjaman</title>
    </head>

    <body>
        <center>
            <div class="header H_L">
                <ul>
                <li><a href="home_petugas.php"><img src="ikon/home.ico"  height="30" width="30"></a></li>
                <li><a href="#" style="background-color: rgba(255, 255, 255, 0.034);"><img src="ikon/pinjam.ico"  height="30" width="30"></a></li>
                <li><a href="tambah_buku.php"><img src="ikon/add.ico"  height="30" width="30"></a></li>
                </ul>
            </div>        

            <div class="header H_R"><br>
                <ul>
                    <li><a onClick="logout()" name="logout" type="button">LOGOUT</a></li><br>
                </ul>
            </div>
            <div class="buku_s" id="buku_s">
            <h2>PEMINJAMAN</h2><br>
                <table border="1">
                    <thead>
                        <td align="center"><?php $no=1; ?>No</td>
                        <td align="center">ID Peminjaman</td>
                        <td align="center">ID Anggota   </td>
                        <td align="center">Nama</td>
                        <td align="center">NIK</td>
                        <td align="center">Username</td>
                        <td align="center">ID Buku</td>
                        <td align="center">Judul</td>
                        <td align="center">Tanggal Peminjaman</td>
                        <td align="center">Tanggal Pengembalian</td>
                    </thead>
                    <?php
                            foreach($db->h_peminjaman() as $value){
                    ?>
                    <tr>
                        <td width="30px"><?php echo $no++; ?></td>
                        <td width="105px"><?php echo $value['id_peminjaman']; ?></td>
                        <td width="80px"><?php echo $value['id_anggota']; ?></td>
                        <td width="160px"><?php echo $value['nama']; ?></td>
                        <td width="100px"><?php echo $value['nik']; ?></td>
                        <td width="100px"><?php echo $value['username'];  ?></td>
                        <td width="60px"><?php echo $value['id_buku']; ?></td>
                        <td width="250px"><?php echo $value['judul']; ?></td>
                        <td width="150px"><?php echo $value['tanggal_peminjaman']; ?></td>
                        <td width="150px"><?php echo $value['tanggal_pengembalian']; ?></td>
                    </tr>
                    <?php
                            }
                    ?>
            </div>
        </center>
    </body>
</html>