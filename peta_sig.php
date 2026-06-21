<?php
include 'header.php';
include 'koneksi.php';
?>

<link rel="stylesheet"
href="https://unpkg.com/leaflet/dist/leaflet.css"/>

<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<h3 class="mb-4">
Peta Sistem Informasi Geografis (SIG)
</h3>

<div class="row">

<div class="col-md-12">

<div class="card shadow">

<div class="card-header bg-primary text-white">

Pemetaan Pemerataan Pendidikan

</div>

<div class="card-body">

<div id="map"
style="height:600px;">
</div>

</div>

</div>

</div>

</div>

<br>

<div class="card shadow">

<div class="card-header bg-success text-white">

Keterangan Cluster

</div>

<div class="card-body">

<span class="badge bg-success">
Cluster 1
</span>

Pemerataan Tinggi

<br><br>

<span class="badge bg-warning text-dark">
Cluster 2
</span>

Pemerataan Sedang

<br><br>

<span class="badge bg-danger">
Cluster 3
</span>

Pemerataan Rendah

</div>

</div>

<script>

var map = L.map('map').setView(
[2.8,98.5],
7
);

L.tileLayer(
'https://tile.openstreetmap.org/{z}/{x}/{y}.png',
{
maxZoom:19
}
).addTo(map);

<?php

$data=mysqli_query(
$koneksi,
"SELECT * FROM data_sig"
);

while($d=mysqli_fetch_array($data))
{

$warna="green";

if($d['cluster']=="Cluster 2")
{
$warna="orange";
}
elseif($d['cluster']=="Cluster 3")
{
$warna="red";
}

?>

L.circleMarker(
[
<?= $d['latitude'] ?>,
<?= $d['longitude'] ?>
],
{
radius:10,
color:'<?= $warna ?>',
fillColor:'<?= $warna ?>',
fillOpacity:0.8
}
)
.addTo(map)
.bindPopup(
`
<b><?= $d['nama_wilayah'] ?></b>
<br>
<?= $d['cluster'] ?>
`
);

<?php } ?>

</script>

<?php include 'footer.php'; ?>