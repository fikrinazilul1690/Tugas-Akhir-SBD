<?php
include "config.php";
include "session.php";
if (isset($_POST['Submit']) && !isset($_POST['Clear'])) {
    # code...
    $detail_pengajuan = mysqli_query($mysqli, "select * from detail_pengajuan where nama like '%" . $_POST['search'] . "%' or penghasilan like '%" . $_POST['search'] . "%' or jmlh_pinj like '%" . $_POST['search'] . "%' or no_ajuan like '%" . $_POST['search'] . "%' or status_pinj like '%" . $_POST['search'] . "%' or tgl_ajuan like '%" . $_POST['search'] . "%' or ang_perbln like '%" . $_POST['search'] . "%'");
} else {
    $detail_pengajuan = mysqli_query($mysqli, "select * from detail_pengajuan");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Tinjau Permintaan</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
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
                        <a class="nav-link active" aria-current="page" href="admin.php">Tinjau Permintaan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="paketCicilan.php">Tambah/Edit Paket</a>
                    </li>
                </ul>
                <form action="admin.php" method="post" class="d-flex">
                    <input class="form-control me-2" type="text" name="search" placeholder="Search" aria-label="Search">
                    <input class="btn btn-outline-light me-2" type="submit" name="Submit" value="Cari">
                    <input class="btn btn-outline-light" type="submit" name="Clear" value="Clear">
                </form>
                <a class="ms-2 btn btn-danger" href="logout.php">Logout</a>
            </div>
        </div>
    </nav>
    <?php
    if (isset($_SESSION['status'])) {
        # code...
        echo $_SESSION['status'];
        unset($_SESSION['status']);
    }
    ?>
    <div class="mt-5 container">
        <div class="row mb-4">
            <h1 align="center">Status Pengajuan Pinjaman</h1>
        </div>
        <div class="row">
            <table class="table table-bordered border-primary bg-light" style="width: 90%;" align="center">
                <tr>
                    <th scope="col">No Pengajuan</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Penghasilan</th>
                    <th scope="col">Pinjaman Diajukan</th>
                    <th scope="col">Angsuran Perbulan</th>
                    <th scope="col">Tanggal Permohonan</th>
                    <th scope="col">Status Permohohnan</th>
                    <th scope="col" style="padding-left: 60px;">Aksi</th>
                </tr>
                <?php
                while ($item = mysqli_fetch_array($detail_pengajuan)) {
                    # code...
                    echo "<tr>";
                    echo "<td align='center'>" . $item['no_ajuan'] . "</td>";
                    echo "<td align='center'>" . $item['nama'] . "</td>";
                    echo "<td align='center'>Rp." . $item['penghasilan'] . "</td>";
                    echo "<td align='center'>Rp." . $item['jmlh_pinj'] . "</td>";
                    echo "<td align='center'>Rp." . $item['ang_perbln'] . "/Bulan</td>";
                    echo "<td align='center'>" . $item['tgl_ajuan'] . "</td>";
                    echo "<td align='center'>" . $item['status_pinj'] . "</td>";
                    echo "<td><div class='btn-group'><a class='btn btn-success' href='terima.php?terima=$item[no_ajuan]'>Terima</a><a class='btn btn-warning' href='tolak.php?tolak=$item[no_ajuan]'>Tolak</a></div></td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
    </div>
</body>

</html>