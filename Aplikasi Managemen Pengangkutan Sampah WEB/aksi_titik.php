<?php
include "koneksi.php";
$nama_titik=$_POST['nama_titik'];
$id_rute=$_POST['id_rute'];



$query = "INSERT INTO titik_pengangkutan (nama_titik_pengangkutan, id_rute) VALUES ('".$nama_titik."', '".$id_rute."')";
$a=$koneksi->query($query);
if ($a==true) { 
    header('location: titik_pengangkutan.php');
} else {
    echo "Error";
}          

?>