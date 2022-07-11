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
        <title>Home</title>
    </head>

    <body>
        <center>
            <div class="header H_L">
                <ul>
                <li><a href="#" style="background-color: rgba(255, 255, 255, 0.034);"><img src="ikon/home.ico"  height="30" width="30"></a></li>
                <li><a href="h_peminjaman.php"><img src="ikon/pinjam.ico"  height="30" width="30"></a></li>
                <li><a href="tambah_buku.php"><img src="ikon/add.ico"  height="30" width="30"></a></li>
                </ul>
            </div>        

            <div class="header H_R"><br>
                <ul>
                    <li><a onClick="logout()" name="logout" type="button">LOGOUT</a></li><br>
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
                        <td ></td>
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
                        <td><center><a class="E_D h-edit" href="edit_data_buku.php?id=<?php echo $value['id_buku']; ?>"><b>EDIT</b></a> | 
                        <a class="E_D delete" href="delete.php?id=<?php echo $value['id_buku']; ?>"><b>DELETE</b></a></center></td>
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
                        <td><a class="E_D h-edit" href="edit_data_buku.php?id=<?php echo $row['id_buku']; ?>"><b>EDIT</b></a> | 
                        <a class="E_D delete" href="delete.php?id=<?php echo $row['id_buku']; ?>"><b>DELETE</b></a></td>
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
        <script src="script_ed.js"></script>
    </body>
</html>