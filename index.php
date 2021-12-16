<?php
include "session.php";
include "config.php";
$paket_cicilan = mysqli_query($mysqli, "select * from cicilan where is_delete=0 order by id_paket ASC");
$username = $_SESSION['username'];
$user = mysqli_query($mysqli, "select id_user from db_user where username= '$username'");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pinjol</title>
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
                        <a class="nav-link active" aria-current="page" href="index.php">Ajukan Pinjaman</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pengajuan.php">Status Pengajuan</a>
                    </li>
                </ul>
                <a class="ms-2 btn btn-danger" href="logout.php">Logout</a>
            </div>
        </div>
    </nav>
    <?php
    if (isset($_POST['Submit'])) {
        # code...
        $pinjaman = $_POST['pinjaman'];
        $paket = $_POST['paket'];
        $row = mysqli_fetch_array($user);
        $pengajuan = "INSERT INTO pengajuan (jmlh_pinj, id_user, id_paket, tgl_ajuan)
VALUES ('$pinjaman'," . $row['id_user'] . ",'$paket',now())";
        $hasil = mysqli_query($mysqli, $pengajuan);


        $data_cicilan = mysqli_query($mysqli, "select * from cicilan where id_paket='$paket'");
        $cicilan = mysqli_fetch_array($data_cicilan);
        $angsuran = ($pinjaman / $cicilan['lama_cicilan']) + (($pinjaman / $cicilan['lama_cicilan']) * $cicilan['bunga_cicilan'] / 100);
        $ajuan = mysqli_query($mysqli, "select no_ajuan from pengajuan ORDER BY no_ajuan DESC LIMIT 1");
        $no_ajuan = mysqli_fetch_array($ajuan);
        $detail = "INSERT INTO detail_pinjaman (ang_perbln,id_user,id_paket,no_ajuan)
VALUES ('$angsuran'," . $row['id_user'] . ",'$paket'," . $no_ajuan['no_ajuan'] . ")";
        $detail_hasil = mysqli_query($mysqli, $detail);
        if ($hasil) {
            // echo "<meta http-equiv=refresh content=0;URL='index.php>";
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Berhasil melakukan pengajuan cek status pengajuan <a href="pengajuan.php">disini</a>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
    }
    ?>
    <div class="container">
        <div class="row mt-4 mb-4">
            <h1 align="center">Paket Cicilan</h1>
        </div>
        <div class="row">
            <div class="col">
                <table align="center" width="60%" class="table table-bordered border-primary bg-light">
                    <tr>
                        <th>Paket</th>
                        <th>Lama Cicilan</th>
                        <th>Bunga</th>
                    </tr>
                    <tr>
                        <?php
                        while ($item = mysqli_fetch_array($paket_cicilan)) {
                            # code...
                            echo "<tr>";
                            echo "<td>" . $item['id_paket'] . "</td>";
                            echo "<td>" . $item['lama_cicilan'] . " Bulan</td>";
                            echo "<td>" . $item['bunga_cicilan'] . " %</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tr>
                </table>
            </div>
            <div class="col-6">
                <div class="card m-auto" style="height: 250px;">
                    <form action="index.php" method="post" class="m-auto">
                        <table align="center">
                            <tr>
                                <th colspan="2" height="40">
                                    <h1>Ajukan Pinjaman</h1>
                                </th>
                            </tr>
                            <tr>
                                <td width="100">Jumlah Pinjaman</td>
                                <td>
                                    <input type="text" name="pinjaman">
                                </td>
                            </tr>
                            <tr>
                                <td width="100">Paket Cicilan</td>
                                <td>
                                    <input type="text" name="paket">
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <input class="btn btn-primary ps-4 pe-4 my-2" type="submit" name="Submit" value="Ajukan">
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>