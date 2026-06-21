<?php
include 'header.php';
include 'koneksi.php';
?>

<h3 class="mb-4">
Training Self Organizing Maps (SOM)
</h3>

<?php

$total_data = mysqli_num_rows(
mysqli_query(
$koneksi,
"SELECT * FROM dataset_pendidikan"
)
);

$baik = mysqli_num_rows(
mysqli_query(
$koneksi,
"SELECT * FROM dataset_pendidikan
WHERE akses_pendidikan='Baik'"
)
);

$sedang = mysqli_num_rows(
mysqli_query(
$koneksi,
"SELECT * FROM dataset_pendidikan
WHERE akses_pendidikan='Sedang'"
)
);

$kurang = mysqli_num_rows(
mysqli_query(
$koneksi,
"SELECT * FROM dataset_pendidikan
WHERE akses_pendidikan='Kurang'"
)
);

?>

<div class="row">

<div class="col-md-3">

<div class="card shadow">
<div class="card-body text-center">

<h5>Total Wilayah</h5>

<h2><?= $total_data ?></h2>

</div>
</div>

</div>

<div class="col-md-3">

<div class="card shadow">
<div class="card-body text-center">

<h5>Baik</h5>

<h2 class="text-success">
<?= $baik ?>
</h2>

</div>
</div>

</div>

<div class="col-md-3">

<div class="card shadow">
<div class="card-body text-center">

<h5>Sedang</h5>

<h2 class="text-warning">
<?= $sedang ?>
</h2>

</div>
</div>

</div>

<div class="col-md-3">

<div class="card shadow">
<div class="card-body text-center">

<h5>Kurang</h5>

<h2 class="text-danger">
<?= $kurang ?>
</h2>

</div>
</div>

</div>

</div>

<br>

<div class="card shadow">

<div class="card-header bg-primary text-white">

Data Training SOM

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

</tr>

<?php } ?>

</tbody>

</table>

</div>

</div>

<br>

<div class="card shadow">

<div class="card-header bg-success text-white">

Grafik Distribusi Data Training

</div>

<div class="card-body">

<div style="width:400px;margin:auto">

<canvas id="trainingChart"></canvas>

</div>

</div>

</div>

<script>

new Chart(
document.getElementById('trainingChart'),
{

type:'pie',

data:{

labels:[
'Baik',
'Sedang',
'Kurang'
],

datasets:[{

data:[
<?= $baik ?>,
<?= $sedang ?>,
<?= $kurang ?>
],

backgroundColor:[
'#198754',
'#ffc107',
'#dc3545'
]

}]

},

options:{

plugins:{
legend:{
position:'bottom'
}
}

}

}

);

</script>

<?php include 'footer.php'; ?>