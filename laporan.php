<?php
include 'header.php';
include 'koneksi.php';
?>

<h3 class="mb-4">
Laporan Hasil Pemetaan Pemerataan Pendidikan
</h3>


<?php

$total_wilayah=mysqli_num_rows(
mysqli_query(
$koneksi,
"SELECT * FROM dataset_pendidikan"
)
);


$cluster1=mysqli_num_rows(
mysqli_query(
$koneksi,
"SELECT * FROM hasil_cluster
WHERE cluster='Cluster 1'"
)
);


$cluster2=mysqli_num_rows(
mysqli_query(
$koneksi,
"SELECT * FROM hasil_cluster
WHERE cluster='Cluster 2'"
)
);


$cluster3=mysqli_num_rows(
mysqli_query(
$koneksi,
"SELECT * FROM hasil_cluster
WHERE cluster='Cluster 3'"
)
);


?>


<button 
onclick="window.print()"
class="btn btn-primary mb-3">

Cetak Laporan

</button>



<div class="card shadow">


<div class="card-header bg-primary text-white">

Identitas Penelitian

</div>


<div class="card-body">


<table class="table table-bordered">


<tr>

<th width="30%">
Judul Penelitian
</th>

<td>

Implementasi Metode Self Organizing Maps (SOM)
untuk Pemetaan Tingkat Pemerataan Pendidikan
Berbasis Sistem Informasi Geografis (SIG)

</td>

</tr>


<tr>

<th>Metode</th>

<td>

Self Organizing Maps (SOM)

</td>

</tr>


<tr>

<th>Objek Penelitian</th>

<td>

Wilayah Pemerataan Pendidikan

</td>

</tr>


<tr>

<th>Total Wilayah</th>

<td>

<?= $total_wilayah ?>

Wilayah

</td>

</tr>


</table>


</div>


</div>


<br>



<div class="row">


<div class="col-md-4">


<div class="card shadow text-center">


<div class="card-body">


<h5>

Cluster 1

</h5>


<h2 class="text-success">

<?= $cluster1 ?>

</h2>


<p>

Pemerataan Tinggi

</p>


</div>


</div>


</div>



<div class="col-md-4">


<div class="card shadow text-center">


<div class="card-body">


<h5>

Cluster 2

</h5>


<h2 class="text-warning">

<?= $cluster2 ?>

</h2>


<p>

Pemerataan Sedang

</p>


</div>


</div>


</div>



<div class="col-md-4">


<div class="card shadow text-center">


<div class="card-body">


<h5>

Cluster 3

</h5>


<h2 class="text-danger">

<?= $cluster3 ?>

</h2>


<p>

Pemerataan Rendah

</p>


</div>


</div>


</div>



</div>


<br>



<div class="card shadow">


<div class="card-header bg-success text-white">

Hasil Pemetaan SOM

</div>


<div class="card-body">


<table class="table table-striped table-bordered">


<thead class="table-success">


<tr>

<th>No</th>

<th>Wilayah</th>

<th>Cluster</th>

<th>Keterangan</th>

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


<td>

<?= $no++ ?>

</td>


<td>

<?= $d['nama_wilayah'] ?>

</td>


<td>


<?php

if($d['cluster']=="Cluster 1")
{

echo "

<span class='badge bg-success'>

Cluster 1

</span>

";

}

elseif($d['cluster']=="Cluster 2")
{

echo "

<span class='badge bg-warning text-dark'>

Cluster 2

</span>

";

}

else

{

echo "

<span class='badge bg-danger'>

Cluster 3

</span>

";

}

?>


</td>


<td>

<?= $d['keterangan'] ?>

</td>


</tr>


<?php } ?>


</tbody>


</table>


</div>


</div>



<br>



<div class="card shadow">


<div class="card-header bg-info text-white">

Kesimpulan Analisis

</div>


<div class="card-body">


<p>

Berdasarkan hasil proses clustering menggunakan metode 
Self Organizing Maps (SOM), wilayah penelitian berhasil
dikelompokkan menjadi tiga kategori pemerataan pendidikan.

</p>


<ul>

<li>

<b>Cluster 1</b> menunjukkan wilayah dengan tingkat
pemerataan pendidikan tinggi.

</li>


<li>

<b>Cluster 2</b> menunjukkan wilayah dengan tingkat
pemerataan pendidikan sedang.

</li>


<li>

<b>Cluster 3</b> menunjukkan wilayah dengan tingkat
pemerataan pendidikan rendah sehingga membutuhkan
perhatian lebih dalam peningkatan fasilitas pendidikan.

</li>


</ul>


</div>


</div>


<?php include 'footer.php'; ?>