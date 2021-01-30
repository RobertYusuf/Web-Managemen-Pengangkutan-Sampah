<?php
include "koneksi.php";
$id_pengepul=$_POST['id_pengepul'];
$nama=$_POST['nama'];
$alamat=$_POST['alamat'];
$telp=$_POST['telp'];

$query = "INSERT INTO pengepul (id_pengepul, nama_pengepul, alamat, telp) VALUES ('".$id_pengepul."', '".$nama."', '".$alamat."', '".$telp."')";

$a=$koneksi->query($query);
if ($a==true) { 
    header('location: pegawai2.php');
} else {
    echo "Error";
}          
?>