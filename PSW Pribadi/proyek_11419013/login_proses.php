<link rel="stylesheet" href="style.css">

<?php 
    session_start();
    
    $koneksi = mysqli_connect ("localhost", "root", "", "library_b_app");
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!empty($username) && !empty($password))
    {
        $login = mysqli_query($koneksi, "SELECT * FROM akun WHERE username = '$username' AND password = '$password'");
        $result = mysqli_num_rows($login);
        if ($result>0)
        {
            $data = mysqli_fetch_assoc($login);
            if($data['level']=="petugas"){
              $_SESSION['username'] = $username;
              header("location:home_petugas.php");
            }
            else if($data['level']=="anggota"){
                $_SESSION['username'] = $username;
                $_SESSION['level'] = "anggota";
                header("location:home_anggota.php");
                
            }
        }
        else
        {
        echo"
        <form action='' method='post'>
          <center>
            <div class='login'><br>
                <input type='text' name='username' placeholder='Username' class='login_error'>
                <input type='password' name='password' placeholder='Password' class='login_error'>
                <button name='login'>LOGIN</button><br><br>
                <a href='daftar.php'>Belum memiliki akun</a><br><br><br><br>
                <a href='home_pengunjung.php' style='margin-left:-80%'>Kembali</a>
            </div>
          </center>
        </form>";
        }
    }
    else if (!empty($username))
    {
        echo"
        <form action='' method='post'>
          <center>
            <div class='login'><br>
                <input type='text' name='username' placeholder='Username'>
                <input type='password' name='password' placeholder='Password' class='login_error'>
                <button name='login'>LOGIN</button><br><br>
                <a href='daftar.php'>Belum memiliki akun</a><br><br><br><br>
                <a href='home_pengunjung.php' style='margin-left:-80%'>Kembali</a>
            </div>
          </center>
        </form>";
    }
    else{
        echo"
        <form action='' method='post'>
          <center>
            <div class='login'><br>
                <input type='text' name='username' placeholder='Username' class='login_error'>
                <input type='password' name='password' placeholder='Password' class='login_error'>
                <button name='login'>LOGIN</button><br><br>
                <a href='daftar.php'>Belum memiliki akun</a><br><br><br><br>
                <a href='home_pengunjung.php' style='margin-left:-80%'>Kembali</a>
            </div>
          </center>
        </form>";
    }
?>