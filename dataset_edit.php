<?php
include 'header.php';
include 'koneksi.php';

$id=$_GET['id'];

$data=mysqli_query(
$koneksi,
"SELECT * FROM dataset_pendidikan
WHERE id_wilayah='$id'"
);

$d=mysqli_fetch_array($data);

if(isset($_POST['update']))
{

mysqli_query(
$koneksi,

"UPDATE dataset_pendidikan SET

nama_wilayah='$_POST[nama_wilayah]',
jumlah_sekolah='$_POST[jumlah_sekolah]',
jumlah_guru='$_POST[jumlah_guru]',
jumlah_siswa='$_POST[jumlah_siswa]',
rasio_guru_siswa='$_POST[rasio]',
akses_pendidikan='$_POST[akses]'

WHERE id_wilayah='$id'
"
);

echo "
<script>
alert('Data berhasil diupdate');
location='dataset.php';
</script>
";

}
?>

<div class="card shadow">

<div class="card-header bg-warning">

Edit Dataset

</div>

<div class="card-body">

<form method="post">

<input
type="text"
name="nama_wilayah"
value="<?= $d['nama_wilayah'] ?>"
class="form-control mb-2">

<input
type="number"
name="jumlah_sekolah"
value="<?= $d['jumlah_sekolah'] ?>"
class="form-control mb-2">

<input
type="number"
name="jumlah_guru"
value="<?= $d['jumlah_guru'] ?>"
class="form-control mb-2">

<input
type="number"
name="jumlah_siswa"
value="<?= $d['jumlah_siswa'] ?>"
class="form-control mb-2">

<input
type="number"
step="0.01"
name="rasio"
value="<?= $d['rasio_guru_siswa'] ?>"
class="form-control mb-2">

<select
name="akses"
class="form-control mb-3">

<option><?= $d['akses_pendidikan'] ?></option>

<option>Baik</option>
<option>Sedang</option>
<option>Kurang</option>

</select>

<button
name="update"
class="btn btn-primary">

Update

</button>

</form>

</div>

</div>

<?php include 'footer.php'; ?>