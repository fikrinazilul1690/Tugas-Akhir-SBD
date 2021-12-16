<?php
include "config.php";
$cicilan = '';
$bunga = '';
$edit = 0;
$update = false;
if (isset($_GET['edit'])) {
    # code...
    $id = $_GET['edit'];
    $update = true;
    $result = mysqli_query($mysqli, "select * from cicilan WHERE id_paket='$id'");
    $row = $result->fetch_array();
    $cicilan = $row['lama_cicilan'];
    $bunga = $row['bunga_cicilan'];
}
