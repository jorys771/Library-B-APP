<?php 
	class database{
		var $host = "localhost";
		var $username = "root";
		var $password = "";
		var $db = "library_b_app";
        var $con;

        function __construct(){
            $this->con = mysqli_connect($this->host, $this->username, $this->password,$this->db);
        }

        function daftarAkun($username,$password, $level){
            mysqli_query($this->con,"INSERT INTO akun VALUES('$username','$password','$level')");
        }
         
        function daftarAnggota($nama,$nik,$no_telepon,$username){
            mysqli_query($this->con,"INSERT INTO anggota VALUES('','$nama','$nik','$no_telepon','$username')");
        }

        function tambahBuku($judul,$kategori,$lokasi_buku,$penulis,$penerbit,$tahun_terbit){
            mysqli_query($this->con,"INSERT INTO buku VALUES('','$judul','$kategori','$lokasi_buku','$penulis','$penerbit','$tahun_terbit')");
        }
        
        function pinjamBuku($tanggal_peminjaman,$tanggal_pengembalian,$username,$id_buku){
            mysqli_query($this->con,"INSERT INTO peminjaman VALUES('','$tanggal_peminjaman','$tanggal_pengembalian','$username','$id_buku')");
        }
        
        function dataBuku(){
            $data_buku = mysqli_query($this->con,"SELECT * FROM buku ORDER BY id_buku ASC");
            $hasil= [];
            while($d =mysqli_fetch_array($data_buku)){
                $hasil[] = $d;
            }
            return $hasil;
        }

        function h_peminjaman(){
            $h_peminjaman= mysqli_query($this->con,"SELECT id_peminjaman, id_anggota, nama, nik, no_telepon,
            anggota.username, buku.id_buku, judul, tanggal_peminjaman, tanggal_pengembalian FROM peminjaman
            RIGHT JOIN anggota
            ON peminjaman.username = anggota.username
            RIGHT JOIN buku
            ON peminjaman.id_buku = buku.id_buku
            WHERE id_peminjaman != 'NULL'
            ORDER BY id_peminjaman ASC");
            $hasil= [];
            while($d = mysqli_fetch_array($h_peminjaman)){
                $hasil[] = $d;
            }
            return $hasil;
        }

        function h_pinjaman(){
            $username = $_SESSION['username'];
            $h_peminjaman= mysqli_query($this->con,"SELECT id_peminjaman, id_anggota, nama, nik, no_telepon,
            anggota.username, buku.id_buku, judul, tanggal_peminjaman, tanggal_pengembalian FROM peminjaman
            RIGHT JOIN anggota
            ON peminjaman.username = anggota.username
            RIGHT JOIN buku
            ON peminjaman.id_buku = buku.id_buku
            WHERE id_peminjaman != 'NULL' AND anggota.username = '$username'
            ORDER BY id_peminjaman ASC");
            $hasil= [];
            while($d = mysqli_fetch_array($h_peminjaman)){
                $hasil[] = $d;
            }
            return $hasil;
        }

        function hapus($id){
			mysqli_query($this->con,"DELETE FROM buku WHERE id_buku='$id'");
		}

        

    }
   
?>
