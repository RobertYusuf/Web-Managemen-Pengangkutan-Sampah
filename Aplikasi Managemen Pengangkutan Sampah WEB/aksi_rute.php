<?php
include "koneksi.php";
$nama_rute=$_POST['nama_rute'];
$jarak_rute=$_POST['jarak_rute'];
$waktu_tempuh=$_POST['waktu_tempuh'];


$query = "INSERT INTO rute (nama_rute, jarak_rute, waktu_tempuh) VALUES ('".$nama_rute."', '".$jarak_rute."', '".$waktu_tempuh."')";
$a=$koneksi->query($query);
if ($a==true) { 
    header('location: rute.php');
} else {
    echo "Error";
}          

?>