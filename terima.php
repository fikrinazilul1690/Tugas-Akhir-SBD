<?php
session_start();
include "config.php";
$id = $_GET['terima'];
$result_terima = mysqli_query($mysqli, "UPDATE pengajuan SET
status_pinj = 'diterima' WHERE no_ajuan='$id'");
if (isset($_GET['terima'])) {
    # code...
    $result_terima;
    $_SESSION['status'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Permintaan Diterima!!</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    header("location: admin.php");
}
