<?php
    include_once('function.php');
    $database = new mysqli('127.0.0.1', 'root', '', 'library_b_app');
    $db = new Database();
?>

<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <title>Sedang Bekunjung</title>
    </head>

    <body>
        <center>
            <div class="header H_L">
                <ul>
                    <li><a href="#" style="background-color: rgba(255, 255, 255, 0.034);"><img src="ikon/none.ico"  height="30" width="30"></a></li>
                </ul>
            </div>

            <div class="header H_R"><br>
                <ul>
                    <li><a href="login.php">LOGIN</a></li><br>
                </ul>
            </div>

             
            <form action="" action="post">
	            <input type="text" name="pencarian" placeholder="Pencarian" autofocus autocomplete="off" id="pencarian">
	            <input type="submit" name="cari" id="cari" value="Cari">
            </form><br>
            <div class="buku_s" id="buku_s"> 
                <table border="1">
                    <thead>
                        <td align="center"><?php $no=1; ?>No</td>
                        <td align="center">ID Buku</td>
                        <td align="center">Judul</td>
                        <td align="center">Kategori</td>
                        <td align="center">Lokasi Buku</td>
                        <td align="center">Penulis</td>
                        <td align="center">Penerbit</td>
                        <td align="center">Tahun Terbit</td>
                    </thead>
                    <?php
                    if(isset($_GET['pencarian'])=="" OR isset($_GET['lihat'])=="all"){
                        foreach($db->dataBuku() as $value){
                    ?>
                    <tr>
                        <td width="30px"><?php echo $no++; ?></td>
                        <td width="60px"><?php echo $value['id_buku']; ?></td>
                        <td width="300px"><?php echo $value['judul']; ?></td>
                        <td width="100px"><?php echo $value['kategori']; ?></td>
                        <td width="90px"><?php echo $value['lokasi_buku']; ?></td>
                        <td width="220px"><?php echo $value['penulis'];  ?></td>
                        <td width="150px"><?php echo $value['penerbit']; ?></td>
                        <td width="90px"><?php echo $value['tahun_terbit']; ?></td>
                    </tr>
                    <?php
                        }
                    }
                        if(isset($_GET['pencarian']))
                            {
                                $cari = $_GET['pencarian'];
                                $data = "SELECT * FROM buku WHERE
                                        judul LIKE '%$cari%'
                                        OR kategori LIKE '%$cari%'
                                        OR lokasi_buku LIKE '%$cari%'
                                        OR penulis LIKE '%$cari%'
                                        OR penerbit LIKE '%$cari%'
                                        OR tahun_terbit LIKE '%$cari%'";
                                $result_set = $database -> query($data);
                                while($row = $result_set -> fetch_assoc()){
                                if($cari == $row['judul'] OR $row['kategori'] OR $row['lokasi_buku']
                                    OR $row['penulis'] OR $row['penerbit'] OR $row['tahun_terbit']){
                    ?>
                    <tr>
                        <td width="30px"><?php echo $no++; ?></td>
                        <td width="60px"><?php echo $row['id_buku']; ?></td>
                        <td width="300px"><?php echo $row['judul']; ?></td>
                        <td width="100px"><?php echo $row['kategori']; ?></td>
                        <td width="90px"><?php echo $row['lokasi_buku']; ?></td>
                        <td width="220px"><?php echo $row['penulis'];  ?></td>
                        <td width="150px"><?php echo $row['penerbit']; ?></td>
                        <td width="90px"><?php echo $row['tahun_terbit']; ?></td>
                    </tr>
                    <?php
                                }
                            }
                        }
                    ?>
                </table><br>
            </div>
            <form action="" action="post">
	            <button type="submit" name="lihat" value="all">Lihat Semua</button>
            </form><br>       
        </center>
        <script src="script.js"></script>
    </body>
</html>