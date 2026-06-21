<?php

include 'koneksi.php';

$id=$_GET['id'];

mysqli_query(
$koneksi,
"DELETE FROM dataset_pendidikan
WHERE id_wilayah='$id'"
);

header("location:dataset.php");

?>