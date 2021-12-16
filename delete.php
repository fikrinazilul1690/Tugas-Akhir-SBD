<?php
session_start();
include "config.php";
$id = $_GET['delete'];
if (isset($_GET['delete'])) {
    # code...
    $result = mysqli_query($mysqli, "UPDATE cicilan SET
    is_delete = 1 WHERE id_paket='$id'");
    $_SESSION['status'] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Berhasil Menghapus Paket!!</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    header("location: paketCicilan.php");
}
