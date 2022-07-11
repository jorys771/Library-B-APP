<?php
    include_once('function.php');
    $database = new mysqli('127.0.0.1', 'root', '', 'library_b_app');
    $db = new Database();
    $pencarian = $_GET["pencarian"];
?>
<html>
    <body>
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
    </body>
</html>