<link rel="stylesheet" href="style.css">

<?php
    session_start();
    include_once('function.php');
    $database = new mysqli('127.0.0.1', 'root', '', 'library_b_app');
    $db = new Database();
    $username = $_SESSION['username'];
    $data = "SELECT * FROM anggota WHERE
            id_anggota LIKE '%$username%'
            OR nama LIKE '%$username%'
            OR nik LIKE '%$username%'
            OR no_telepon LIKE '%$username%'
            OR username LIKE '%$username%'";
    $result_set = $database -> query($data);
    while($row = $result_set -> fetch_assoc()){
        if($username == $row['id_anggota'] OR $row['nama'] OR $row['nik']
        OR $row['no_telepon'] OR $row['username']){
?>
<center><br>
    <div class="data_anggota">
        <title>Data Anggota</title>
        <h1>DATA</h1><br>
        <table border="1">
            <tr><td rowspan="5"><img src="ikon/user.ico" height="100" width="100"></td></tr>
            <tr><td></td><td>ID</td><td>:</td><td width="60px"><?php echo $row['id_anggota']; ?></td></tr>
            <tr><td></td><td>Nama</td><td>:</td><td width="60px"><?php  echo $row['nama']; ?></td></tr>
            <tr><td></td><td>NIK</td><td>:</td><td width="60px"><?php echo $row['nik']; ?></td></tr>
            <tr><td></td><td>No. Telepon</td><td>:</td><td width="60px"><?php echo $row['no_telepon']; ?></td></tr>
            <tr><td rowspan="" align="center"><?php echo $row['username']; ?></td></tr>
        </table><br>
        <a href="home_anggota.php">Kembali</a>
    </div>
</center>
<?php
        }
    }
                        
?>