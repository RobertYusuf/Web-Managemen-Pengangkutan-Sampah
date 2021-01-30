<?php
include "koneksi.php";
$id_jadwal_pengangkutan=$_POST['id_jadwal_pengangkutan'];
$volume_sampah=$_POST['volume_sampah'];
$status_pengangkutan=$_POST['status_pengangkutan'];

$query = "INSERT INTO laporan_pengangkutan (id_jadwal_pengangkutan, volume_sampah, status_pengangkutan) VALUES ('".$id_jadwal_pengangkutan."', '".$volume_sampah."', '".$status_pengangkutan."')";

$a=$koneksi->query($query);
if ($a==true) { 
    header('location: laporan.php');
} else {
    echo "Error";
}          
?>