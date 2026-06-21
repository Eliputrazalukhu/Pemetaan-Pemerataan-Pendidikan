<?php
include 'header.php';
include 'koneksi.php';
?>

<h3 class="mb-4">
Hasil Clustering SOM
</h3>

<?php

$cluster1 = mysqli_num_rows(
mysqli_query(
$koneksi,
"SELECT * FROM hasil_cluster
WHERE cluster='Cluster 1'"
)
);

$cluster2 = mysqli_num_rows(
mysqli_query(
$koneksi,
"SELECT * FROM hasil_cluster
WHERE cluster='Cluster 2'"
)
);

$cluster3 = mysqli_num_rows(
mysqli_query(
$koneksi,
"SELECT * FROM hasil_cluster
WHERE cluster='Cluster 3'"
)
);

?>

<div class="row">

<div class="col-md-4">

<div class="card shadow">

<div class="card-body text-center">

<h5>Cluster 1</h5>

<h2 class="text-success">

<?= $cluster1 ?>

</h2>

<p>Pemerataan Tinggi</p>

</div>

</div>

</div>

<div class="col-md-4">

<div class="card shadow">

<div class="card-body text-center">

<h5>Cluster 2</h5>

<h2 class="text-warning">

<?= $cluster2 ?>

</h2>

<p>Pemerataan Sedang</p>

</div>

</div>

</div>

<div class="col-md-4">

<div class="card shadow">

<div class="card-body text-center">

<h5>Cluster 3</h5>

<h2 class="text-danger">

<?= $cluster3 ?>

</h2>

<p>Pemerataan Rendah</p>

</div>

</div>

</div>

</div>

<br>

<div class="card shadow">

<div class="card-header bg-primary text-white">

Data Hasil Clustering SOM

</div>

<div class="card-body">

<table class="table table-bordered table-striped">

<thead class="table-primary">

<tr>

<th>No</th>
<th>Nama Wilayah</th>
<th>Cluster</th>
<th>Keterangan</th>
<th>Tanggal</th>

</tr>

</thead>

<tbody>

<?php

$no=1;

$data=mysqli_query(
$koneksi,
"SELECT * FROM hasil_cluster"
);

while($d=mysqli_fetch_array($data))
{
?>

<tr>

<td><?= $no++ ?></td>

<td><?= $d['nama_wilayah'] ?></td>

<td>

<?php

if($d['cluster']=="Cluster 1")
{
echo "<span class='badge bg-success'>Cluster 1</span>";
}
elseif($d['cluster']=="Cluster 2")
{
echo "<span class='badge bg-warning text-dark'>Cluster 2</span>";
}
else
{
echo "<span class='badge bg-danger'>Cluster 3</span>";
}

?>

</td>

<td><?= $d['keterangan'] ?></td>

<td><?= $d['tanggal'] ?></td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

</div>

<br>

<div class="card shadow">

<div class="card-header bg-success text-white">

Grafik Hasil Clustering SOM

</div>

<div class="card-body">

<div style="width:450px; margin:auto">

<canvas id="clusterChart"></canvas>

</div>

</div>

</div>

<script>

new Chart(
document.getElementById('clusterChart'),
{

type:'pie',

data:{

labels:[
'Cluster 1',
'Cluster 2',
'Cluster 3'
],

datasets:[{

data:[
<?= $cluster1 ?>,
<?= $cluster2 ?>,
<?= $cluster3 ?>
],

backgroundColor:[
'#198754',
'#ffc107',
'#dc3545'
]

}]

},

options:{

responsive:true,

plugins:{

legend:{
position:'bottom'
},

title:{
display:true,
text:'Distribusi Cluster Pemerataan Pendidikan'
}

}

}

}

);

</script>

<?php include 'footer.php'; ?>