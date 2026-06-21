<?php
include 'header.php';
include 'koneksi.php';
?>

<div class="d-flex justify-content-between mb-3">

<h3>Dataset Pendidikan</h3>

<a href="dataset_tambah.php"
class="btn btn-primary">

+ Tambah Data

</a>

</div>

<div class="card shadow">

<div class="card-header bg-primary text-white">

Data Wilayah Pendidikan

</div>

<div class="card-body">

<table class="table table-bordered table-striped">

<thead class="table-primary">

<tr>

<th>No</th>
<th>Wilayah</th>
<th>Sekolah</th>
<th>Guru</th>
<th>Siswa</th>
<th>Rasio</th>
<th>Akses</th>
<th>Aksi</th>

</tr>

</thead>

<tbody>

<?php

$no=1;

$data=mysqli_query(
$koneksi,
"SELECT * FROM dataset_pendidikan"
);

while($d=mysqli_fetch_array($data))
{
?>

<tr>

<td><?= $no++ ?></td>

<td><?= $d['nama_wilayah'] ?></td>

<td><?= $d['jumlah_sekolah'] ?></td>

<td><?= $d['jumlah_guru'] ?></td>

<td><?= $d['jumlah_siswa'] ?></td>

<td><?= $d['rasio_guru_siswa'] ?></td>

<td><?= $d['akses_pendidikan'] ?></td>

<td>

<a href="dataset_edit.php?id=<?= $d['id_wilayah'] ?>"
class="btn btn-warning btn-sm">

Edit

</a>

<a href="dataset_hapus.php?id=<?= $d['id_wilayah'] ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Hapus Data?')">

Hapus

</a>

</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

</div>

<?php include 'footer.php'; ?>