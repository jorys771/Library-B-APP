<script type="text/javascript">
function reload ()
{
    img = document.getElementById("capt");
    img.src="captcha_creator.php?rand_number=" + Math.random();
}
</script>

<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <title>Daftar Akun</title>
    </head>
    <body>
        <center>
            <div class="daftar"><br>
                <form action="daftar_proses.php" method="post">
                    <p>Daftar</p><br>
                    <input type="text" name="nama" placeholder="Nama" required><br>
                    <input type="number" name="nik" placeholder="NIK" required><br>
                    <input type="number" name="no_telepon" placeholder="No Telepon" required><br>
                    <input type="text" name="username" placeholder="Username" required><br>
                    <input type="password" name="password" placeholder="Password" required><br>
                    <select name="level" required>
                        <option value="anggota">anggota</option>
                    </select><br>
                    <input type="text" name="captcha" placeholder="Captcha" style="width:210px;" required>
                    <img src=captcha_creator.php id="capt">
                    <button type=button onClick=reload() style="margin: 1%; width: 25px;padding: 3px;background-color: transparent;color: white;border: none;font-size: 15px;"><img src="ikon/refresh.ico"  height="20" width="20"></button><br><br>
                    <button type="reset" name="reset">RESET</button><button type="submit" name="simpan">DAFTAR</button><br><br>
                    <a href="login.php">Kembali</a>
                </form>
            </div>
        </center>
    </body>
</html>
