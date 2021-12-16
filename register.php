<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    include "config.php";
    if (isset($_POST['Daftar'])) {
        # code...
        $nama = $_POST['txtNamaUser'];
        $nik = $_POST['txtNikUser'];
        $penghasilan = $_POST['txtPenghasilanUser'];
        $email = $_POST['txtEmailUser'];
        $username = $_POST['txtUsername'];
        $pass = md5($_POST['txtPassUser']);
        $q = "INSERT INTO db_user (nama, nik, penghasilan, email, username, pass)
        VALUES ('$nama','$nik','$penghasilan','$email','$username','$pass')";
        $hasil = mysqli_query($mysqli, $q);
        if ($hasil) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Daftar Berhasil!!</strong> kembali ke halaman <strong><a href="login.php">login</a></strong>.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        } else {
            echo "<div class='alert alert-warning' role='alert'>
        Daftar Gagal!!
        </div>";
            echo "<meta http-equiv=refresh content=2;URL='register.php'>";
        }
    }
    ?>
    <div class="container">
        <div class="row m-auto" style="width: 30%; height: 100vh;">
            <div class="card m-auto" style="height: fit-content; padding-top: 50px; padding-bottom: 50px;">
                <h1 align="center">Register</h1>
                <form action="register.php" method="post" class="mt-3 ms-3">
                    <label for="namaUser" class="form-label">Nama</label>
                    <input type="text" name="txtNamaUser" id="namaUser" required class="form-control">
                    <label for="nikUser" class="form-label">NIK</label>
                    <input type="text" name="txtNikUser" id="nikUser" pattern="[1-9]{1}[0-9]{15}" required class="form-control">
                    <label for="penghasilanUser" class="form-label">Penghasilan</label>
                    <input type="text" name="txtPenghasilanUser" id="penghasilanUser" required class="form-control">
                    <label for="emailUser" class="form-label">Email</label>
                    <input type="email" name="txtEmailUser" id="emailUser" required class="form-control">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="txtUsername" id="username" required class="form-control">
                    <label for="passUser" class="form-label">Password</label>
                    <input type="password" name="txtPassUser" id="passUser" required class="form-control">
                    <input class="btn btn-primary mt-3 ps-4 pe-4" type="submit" value="Daftar" name="Daftar" class="mt-3">
                    <a class="btn btn-secondary ps-4 pe-4 mt-3" href="login.php">Login</a>
                </form>
            </div>
        </div>
    </div>
    <!-- <div class="row align-items-center justify-content-center">
        <div class="col-3">


        </div>
    </div> -->
</body>

</html>