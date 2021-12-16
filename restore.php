<?php
session_start();
include "config.php";
if (isset($_GET['restore'])) {
    # code...
    $id = $_GET['restore'];
    $result = mysqli_query($mysqli, "UPDATE cicilan SET
    is_delete = 0 WHERE id_paket='$id'");
    $_SESSION['status'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Paket berhasil direstore!!</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    header("location: paketCicilan.php");
}
