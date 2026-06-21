<?php
include 'header.php';
include 'koneksi.php';

if(isset($_POST['simpan']))
{

mysqli_query(
$koneksi,

"INSERT INTO dataset_pendidikan
VALUES(
NULL,
'$_POST[nama_wilayah]',
'$_POST[jumlah_sekolah]',
'$_POST[jumlah_guru]',
'$_POST[jumlah_siswa]',
'$_POST[rasio]',
'$_POST[akses]'
)"
);

echo "
<script>
alert('Data berhasil disimpan');
location='dataset.php';
</script>
";

}
?>

<div class="card shadow">

<div class="card-header bg-success text-white">

Tambah Dataset Pendidikan

</div>

<div class="card-body">

<form method="post">

<div class="mb-3">

<label>Nama Wilayah</label>

<input
type="text"
name="nama_wilayah"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Jumlah Sekolah</label>

<input
type="number"
name="jumlah_sekolah"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Jumlah Guru</label>

<input
type="number"
name="jumlah_guru"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Jumlah Siswa</label>

<input
type="number"
name="jumlah_siswa"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Rasio Guru/Siswa</label>

<input
type="number"
step="0.01"
name="rasio"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Akses Pendidikan</label>

<select
name="akses"
class="form-control">

<option>Baik</option>
<option>Sedang</option>
<option>Kurang</option>

</select>

</div>

<button
type="submit"
name="simpan"
class="btn btn-success">

Simpan

</button>

<a href="dataset.php"
class="btn btn-secondary">

Kembali

</a>

</form>

</div>

</div>

<?php include 'footer.php'; ?>