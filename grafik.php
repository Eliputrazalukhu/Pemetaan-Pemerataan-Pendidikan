<?php
include 'header.php';
include 'koneksi.php';


// ==========================
// HITUNG DATA CLUSTER
// ==========================

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


// ==========================
// DATA GRAFIK SEKOLAH & GURU
// ==========================

$wilayah = [];
$sekolah = [];
$guru = [];


$data = mysqli_query(
$koneksi,
"SELECT * FROM dataset_pendidikan"
);


while($d=mysqli_fetch_array($data))
{

$wilayah[] = $d['nama_wilayah'];

$sekolah[] = $d['jumlah_sekolah'];

$guru[] = $d['jumlah_guru'];

}

?>


<h3 class="mb-4">

Dashboard Grafik Pemerataan Pendidikan

</h3>


<!-- CARD JUMLAH CLUSTER -->

<div class="row mb-4">


<div class="col-md-4">

<div class="card shadow">

<div class="card-body text-center">


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

<div class="card shadow">

<div class="card-body text-center">


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

<div class="card shadow">

<div class="card-body text-center">


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




<!-- GRAFIK -->


<div class="row">


<div class="col-md-4">


<div class="card shadow">


<div class="card-header bg-success text-white">

Distribusi Cluster SOM

</div>


<div class="card-body">

<canvas id="clusterChart"></canvas>

</div>


</div>


</div>




<div class="col-md-4">


<div class="card shadow">


<div class="card-header bg-primary text-white">

Jumlah Sekolah

</div>


<div class="card-body">

<canvas id="sekolahChart"></canvas>

</div>


</div>


</div>




<div class="col-md-4">


<div class="card shadow">


<div class="card-header bg-warning">

Jumlah Guru

</div>


<div class="card-body">

<canvas id="guruChart"></canvas>

</div>


</div>


</div>



</div>





<script>


// ==========================
// PIE CLUSTER
// ==========================


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

text:'Distribusi Pemerataan Pendidikan'


}


}


}


}

);




// ==========================
// BAR JUMLAH SEKOLAH
// ==========================


new Chart(

document.getElementById('sekolahChart'),

{


type:'bar',


data:{


labels:

<?= json_encode($wilayah) ?>,


datasets:[{


label:'Jumlah Sekolah',


data:

<?= json_encode($sekolah) ?>


}]


}


}

);





// ==========================
// BAR JUMLAH GURU
// ==========================


new Chart(

document.getElementById('guruChart'),

{


type:'bar',


data:{


labels:

<?= json_encode($wilayah) ?>,


datasets:[{


label:'Jumlah Guru',


data:

<?= json_encode($guru) ?>


}]


}


}

);



</script>



<?php

include 'footer.php';

?>