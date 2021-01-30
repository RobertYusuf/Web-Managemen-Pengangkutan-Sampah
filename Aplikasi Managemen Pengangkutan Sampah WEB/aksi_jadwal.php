<?php
include "koneksi.php";
$id_kendaraan=$_POST['id_kendaraan'];
$id_rute=$_POST['id_rute'];
$id_jadwal_pengangkutan = $_POST['id_jadwal_pengangkutan'];
$tanggal=$_POST['tanggal'];

$query = "INSERT INTO jadwal_pengangkutan (id_jadwal_pengangkutan, id_kendaraan, id_rute, tanggal) VALUES ('".$id_jadwal_pengangkutan."','".$id_kendaraan."', '".$id_rute."', '".$tanggal."')";
$query2 = "INSERT INTO laporan_pengangkutan (id_jadwal_pengangkutan) VALUES ('".$id_jadwal_pengangkutan."')";

$a=$koneksi->query($query);
$b=$koneksi->query($query2);
if ($a==true && $b==true) { 
    header('location: index.php');
} else {
    echo "Error";
}          



?>