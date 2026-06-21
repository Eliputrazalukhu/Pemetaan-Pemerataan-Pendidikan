<?php

$host="localhost";
$user="root";
$pass="";
$db="db_pemerataan_pendidikan";

$koneksi=mysqli_connect(
$host,
$user,
$pass,
$db
);

if(!$koneksi)
{
die("Koneksi Database Gagal");
}

?>