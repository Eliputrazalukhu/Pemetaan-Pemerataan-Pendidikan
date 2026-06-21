<?php
include 'header.php';
include 'koneksi.php';
?>

<h2 class="mb-4">

Dashboard Pemerataan Pendidikan

</h2>

<?php

$total_wilayah=mysqli_num_rows(
mysqli_query(
$koneksi,
"SELECT * FROM dataset_pendidikan"
)
);

$total_cluster=mysqli_num_rows(
mysqli_query(
$koneksi,
"SELECT * FROM hasil_cluster"
)
);

$total_sig=mysqli_num_rows(
mysqli_query(
$koneksi,
"SELECT * FROM data_sig"
)
);

?>

<div class="row">

<div class="col-md-4">

<div class="card shadow">

<div class="card-body text-center">

<h5>Total Wilayah</h5>

<h2>

<?= $total_wilayah ?>

</h2>

</div>

</div>

</div>

<div class="col-md-4">

<div class="card shadow">

<div class="card-body text-center">

<h5>Data Cluster</h5>

<h2>

<?= $total_cluster ?>

</h2>

</div>

</div>

</div>

<div class="col-md-4">

<div class="card shadow">

<div class="card-body text-center">

<h5>Titik SIG</h5>

<h2>

<?= $total_sig ?>

</h2>

</div>

</div>

</div>

</div>

<br>

<div class="card shadow">

<div class="card-header bg-primary text-white">

Tentang Sistem

</div>

<div class="card-body">

Sistem ini digunakan untuk
menganalisis tingkat pemerataan
pendidikan menggunakan metode
Self Organizing Maps (SOM)
dan divisualisasikan melalui
Sistem Informasi Geografis (SIG).

</div>

</div>

<?php include 'footer.php'; ?>