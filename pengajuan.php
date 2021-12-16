<?php
include "session.php";
include "config.php";
$username = $_SESSION['username'];
$user = mysqli_query($mysqli, "select id_user from db_user where username= '$username'");
$row = mysqli_fetch_array($user);
$status_pengajuan = mysqli_query($mysqli, "select a.jmlh_pinj, b.ang_perbln, a.tgl_ajuan, a.status_pinj
from pengajuan a inner join detail_pinjaman b on a.no_ajuan = b.no_ajuan where a.id_user = " . $row['id_user'] . "");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Pengajuan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Pinjaman online</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php">Ajukan Pinjaman</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="pengajuan.php">Status Pengajuan</a>
                    </li>
                </ul>
                <a class="ms-2 btn btn-danger" href="logout.php">Logout</a>
            </div>
        </div>
    </nav>
    <div class="mt-5 container">
        <div class="row mb-4">
            <h1 align="center">Status Pengajuan Pinjaman</h1>
        </div>
        <div class="row">
            <table class="table table-bordered border-primary bg-light" style="width: 70%;" align="center">
                <tr>
                    <th>Jumlah Pinjaman</th>
                    <th>Angsuran Perbulan</th>
                    <th>Tanggal Pengajuan</th>
                    <th>Status</th>
                </tr>
                <?php
                while ($item = mysqli_fetch_array($status_pengajuan)) {
                    # code...
                    echo "<tr>";
                    echo "<td>Rp." . $item['jmlh_pinj'] . "</td>";
                    echo "<td>Rp." . $item['ang_perbln'] . "/Bulan</td>";
                    echo "<td>" . $item['tgl_ajuan'] . "</td>";
                    echo "<td>" . $item['status_pinj'] . "</td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
    </div>
</body>

</html>