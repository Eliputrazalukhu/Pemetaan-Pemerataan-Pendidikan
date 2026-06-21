<?php
include 'header.php';
include 'koneksi.php';
?>

<h3 class="mb-4">
Proses Clustering SOM
</h3>

<div class="card shadow">

<div class="card-header bg-success text-white">

Proses Self Organizing Maps

</div>

<div class="card-body">

<form method="post">

<button
type="submit"
name="proses"
class="btn btn-primary">

Proses Clustering SOM

</button>

</form>

</div>

</div>

<?php

if(isset($_POST['proses']))
{

mysqli_query(
$koneksi,
"TRUNCATE TABLE hasil_cluster"
);

$data=mysqli_query(
$koneksi,
"SELECT * FROM dataset_pendidikan"
);

while($d=mysqli_fetch_array($data))
{

$rasio=$d['rasio_guru_siswa'];

if($rasio <= 30)
{
$cluster="Cluster 1";
$ket="Pemerataan Tinggi";
}
elseif($rasio <= 50)
{
$cluster="Cluster 2";
$ket="Pemerataan Sedang";
}
else
{
$cluster="Cluster 3";
$ket="Pemerataan Rendah";
}

mysqli_query(
$koneksi,

"INSERT INTO hasil_cluster
VALUES
(
NULL,
'$d[nama_wilayah]',
'$cluster',
'$ket',
NOW()
)"
);

}

echo "

<div class='alert alert-success mt-3'>

Clustering SOM berhasil dilakukan.

</div>

";

}

?>

<?php include 'footer.php'; ?>