<?php
//include file config.php
include('koneksi.php');

//jika benar mendapatkan GET id dari URL
if(isset($_GET['id'])){
	//membuat variabel $id yang menyimpan nilai dari $_GET['id']
	$id = $_GET['id'];

	//melakukan query ke database, dengan cara SELECT data yang memiliki id yang sama dengan variabel $id
	$cek = mysqli_query($koneksi, "SELECT * FROM jadwal_pengangkutan WHERE id_jadwal_pengangkutan='$id'") or die(mysqli_error($koneksi));

	$cek2 = mysqli_query($koneksi, "SELECT * FROM laporan_pengangkutan WHERE id_jadwal_pengangkutan='$id'") or die(mysqli_error($koneksi));
		
	//jika query menghasilkan nilai > 0 maka eksekusi script di bawah
	if(mysqli_num_rows($cek2) > 0){

		//query ke database DELETE untuk menghapus data dengan kondisi id=$id
		$del2 = mysqli_query($koneksi, "DELETE FROM laporan_pengangkutan WHERE id_jadwal_pengangkutan='$id'") or die(mysqli_error($koneksi));
		$del = mysqli_query($koneksi, "DELETE FROM jadwal_pengangkutan WHERE id_jadwal_pengangkutan='$id'") or die(mysqli_error($koneksi));
		if($del){
			echo '<script>alert("Berhasil menghapus data."); document.location="index.php";</script>';
		}else{
			echo '<script>alert("Gagal menghapus data."); document.location="index.php";</script>';
		}
	}else{
		$del = mysqli_query($koneksi, "DELETE FROM jadwal_pengangkutan WHERE id_jadwal_pengangkutan='$id'") or die(mysqli_error($koneksi));
	}
}else{
	echo '<script>alert("ID tidak ditemukan di database."); document.location="index.php";</script>';
}
