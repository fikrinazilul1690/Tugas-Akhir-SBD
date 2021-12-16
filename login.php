<?php
session_start();
include "config.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    if (isset($_POST['proseslog'])) {
        # code...
        $pass = md5($_POST['password']);
        $hasil = mysqli_query($mysqli, "select * from db_user where username='$_POST[username]' and  pass = '$pass'");

        if ($hasil && $hasil->num_rows > 0) {
            $row = mysqli_fetch_assoc($hasil);

            if ($row['level'] == "Admin" && $row['level'] != "User") {
                # code...
                $_SESSION['username'] = $row['username'];
                header("location:admin.php");
            } else if ($row['level'] == "User") {
                # code...
                $_SESSION['username'] = $row['username'];
                echo "<meta http-equiv=refresh content=0;URL='index.php'>";
            }
        } else {
            echo "<div class='alert alert-warning' role='alert'>
        Password/Username Salah!!
        </div>";
            echo "<meta http-equiv=refresh content=2;URL='login.php'>";
        }
    }
    ?>
    <div class="container">
        <div class="d-flex align-items-center justify-content-center flex-column" style="height: 90vh;">
            <h1 class="mb-5 mt-auto">Pinjaman Online</h1>
            <div class="card mb-auto">
                <form action="login.php" method="post" class="login">
                    <table align="center">
                        <tr>
                            <th colspan="2" height="40">
                                <h4 ms-4>
                                    Login
                                </h4>
                            </th>
                        </tr>
                        <tr>
                            <td width="100">Username</td>
                            <td>
                                <input type="text" name="username" required>
                            </td>
                        </tr>
                        <tr>
                            <td width="100">Password</td>
                            <td>
                                <input type="password" name="password" required>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input class="btn btn-primary mt-2" style="width: 93px;" type="submit" name="proseslog" value="Login">
                                <a class="btn btn-secondary ps-4 pe-4 mt-2" href="register.php">Daftar</a>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</body>

</html>