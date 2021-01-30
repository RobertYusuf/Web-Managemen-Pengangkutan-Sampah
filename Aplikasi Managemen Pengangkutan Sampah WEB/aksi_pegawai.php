<?php
include "koneksi.php";
$id_supir=$_POST['id_supir'];
$nama=$_POST['nama'];
$alamat=$_POST['alamat'];
$telp=$_POST['telp'];

$query = "INSERT INTO supir (id_supir, nama, alamat, telp) VALUES ('".$id_supir."', '".$nama."', '".$alamat."', '".$telp."')";

$a=$koneksi->query($query);
if ($a==true) { 
    header('location: pegawai.php');
} else {
    echo "Error";
}          
?>