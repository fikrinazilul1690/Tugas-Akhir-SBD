<?php
include "config.php";
include "session.php";
$paket_cicilan = mysqli_query($mysqli, "select * from cicilan where is_delete = 1");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tinjau Permintaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="admin.php">Admin</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="admin.php">Tinjau Permintaan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="paketCicilan.php">Tambah/Edit Paket</a>
                    </li>
                </ul>
                <a class="ms-2 btn btn-danger" href="logout.php">Logout</a>
            </div>
        </div>
    </nav>
    <div class="mt-5 container">
        <div class="row mb-4">
            <h1 align="center">Paket Cicilan</h1>
        </div>
        <div class="row">
            <table class="table table-bordered border-primary bg-light" style="width: 70%;" align="center">
                <tr>
                    <th scope="col">Paket</th>
                    <th scope="col">Lama Cicilan</th>
                    <th scope="col">Bunga</th>
                    <th style="width: 100px; padding-left: 30px;" scope="col">Aksi</th>
                </tr>
                <tr>
                    <?php
                    while ($item = mysqli_fetch_array($paket_cicilan)) {
                        # code...
                        echo "<tr>";
                        echo "<td align='center'>" . $item['id_paket'] . "</td>";
                        echo "<td align='center'>" . $item['lama_cicilan'] . " Bulan</td>";
                        echo "<td align='center'>" . $item['bunga_cicilan'] . " %</td>";
                        echo "<td><a class='btn btn-success' href='restore.php?restore=$item[id_paket]'>Restore</a></td>";
                        echo "</tr>";
                    }
                    ?>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>