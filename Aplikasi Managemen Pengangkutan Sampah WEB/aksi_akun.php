<?php
include "koneksi.php";
$username=$_POST['username'];
$password=$_POST['password'];

$query = "INSERT INTO login (username, password) VALUES ('".$username."','".$password."')";

$a=$koneksi->query($query);
if ($a==true) { 
    header('location: super_admin.php');
} else {
    echo "Error";
}          



?>