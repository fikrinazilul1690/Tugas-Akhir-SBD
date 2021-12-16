<?php
session_start();
include "config.php";
$id = $_GET['tolak'];
if (isset($_GET['tolak'])) {
    # code...
    $result = mysqli_query($mysqli, "UPDATE pengajuan SET
    status_pinj = 'ditolak' WHERE no_ajuan='$id'");
    $_SESSION['status'] = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Permintaan Ditolak!!</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    header("location: admin.php");
}
