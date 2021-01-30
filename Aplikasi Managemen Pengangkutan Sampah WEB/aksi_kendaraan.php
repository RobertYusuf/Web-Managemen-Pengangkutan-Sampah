<?php
include "koneksi.php";
$jenis_kendaraan=$_POST['jenis_kendaraan'];
$plat_nomor=$_POST['plat_nomor'];
$id_pengepul=$_POST['id_pengepul'];
$id_supir=$_POST['id_supir'];

$query = "INSERT INTO kendaraan (jenis_kendaraan, plat_nomor, id_supir, id_pengepul) VALUES ('".$jenis_kendaraan."', '".$plat_nomor."', '".$id_supir."', '".$id_pengepul."')";
$a=$koneksi->query($query);
if ($a==true) { 
    header('location: kendaraan.php');
} else {
    echo "Error";
}          

?>