<?php
include "config.php";
include "session.php";
$paket_cicilan = mysqli_query($mysqli, "select * from cicilan where is_delete = 0");
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
                        <a class="nav-link" aria-current="page" href="admin.php">Tinjau Permintaan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="paketCicilan.php">Tambah/Edit Paket</a>
                    </li>
                </ul>
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
    <div class="container">
        <div class="row mt-4 mb-4">
            <h1 align="center">Paket Cicilan</h1>
        </div>
        <div class="row">
            <div class="col">
                <a class="btn btn-secondary btn-sm mb-1" href="restoreCicilan.php">Restore Paket</a>
                <table align="center" width="60%" class="table table-bordered border-primary bg-light">
                    <tr>
                        <th scope="col">Paket</th>
                        <th scope="col">Lama Cicilan</th>
                        <th scope="col">Bunga</th>
                        <th style="padding-left: 55px;">Aksi</th>
                    </tr>
                    <tr>
                        <?php
                        while ($item = mysqli_fetch_array($paket_cicilan)) {
                            # code...
                            echo "<tr>";
                            echo "<td>" . $item['id_paket'] . "</td>";
                            echo "<td>" . $item['lama_cicilan'] . " Bulan</td>";
                            echo "<td>" . $item['bunga_cicilan'] . " %</td>";
                            echo "<td style='width: 100px;'><div class='btn-group'><a class='btn btn-success' href='paketCicilan.php?edit=$item[id_paket]'>Edit</a><a onClick=\"javascript: return confirm('yakin ingin menghapus?');\" class='btn btn-danger' href='delete.php?delete=$item[id_paket]'>Delete</a></div></td>";
                            echo "</tr>";
                        }
                        ?>
                    </tr>
                </table>
            </div>
            <div class="col-5">
                <div class="card m-auto" style="height: 250px;">
                    <?php require_once 'edit.php' ?>
                    <form action="paketCicilan.php" method="post" class="m-auto">
                        <input type="hidden" name="id" value="<?php echo $id ?>">
                        <table align="center">
                            <tr>
                                <th colspan="2" height="40">
                                    <h3>Tambah/Edit Paket</h3>
                                </th>
                            </tr>
                            <tr>
                                <td width="100">Lama Cicilan</td>
                                <td>
                                    <input type="text" name="cicilan" value="<?php echo $cicilan ?>">
                                </td>
                            </tr>
                            <tr>
                                <td width="100">Bunga</td>
                                <td>
                                    <input type="text" name="bunga" value="<?php echo $bunga ?>">
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <?php if ($update == true) : ?>
                                        <input class="btn btn-primary ps-4 pe-4" type="submit" name="update" value="Update">
                                    <?php else : ?>
                                        <input class="btn btn-primary ps-4 pe-4" type="submit" name="save" value="Save">
                                    <?php endif; ?>
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

<?php
if (isset($_POST['update'])) {
    # code...
    $update_paket = mysqli_query($mysqli, "update cicilan set lama_cicilan = " . $_POST['cicilan'] . ", bunga_cicilan = " . $_POST['bunga'] . " where id_paket = " . $_POST['id'] . "");
    echo "<meta http-equiv=refresh content=0;URL='paketCicilan.php>";
    $_SESSION['status'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Berhasil Update!!</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
} elseif (isset($_POST['save'])) {
    # code...
    $tambah_paket = mysqli_query($mysqli, "INSERT INTO
        cicilan(lama_cicilan,bunga_cicilan) VALUES(" . $_POST['cicilan'] . "," . $_POST['bunga'] . ")");
    echo "<meta http-equiv=refresh content=0;URL='paketCicilan.php>";
    $_SESSION['status'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Berhasil Tambah Paket!!</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
}
?>