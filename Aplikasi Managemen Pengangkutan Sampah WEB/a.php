<?php 
include "koneksi.php";
?>

<html>
	<head>
	<title>Data Pelanggan</title>
</head>
<body>
	<h2>Data Pelanggan</h2>
	<table border="1">
		<tr>
			<thead>
				<th>No</th>
                <th>Nama Rute</th>
                <th>Jarak</th>
                <th>Waktu Tempuh</th>
			</thead>
		</tr>
		<tbody>
		<?php
                      include "koneksi.php";
                      $no=1;
                      $i="SELECT * FROM rute";
                      $j=$koneksi->query($i);
                      while ($k=$j->fetch_array()) {
                    ?>
                      <tr>
                        <!-- <tbody> -->
                          <td><?php echo $no++; ?></td>
                          <td><?php echo $k['nama_rute']; ?></td>
                          <td><?php echo $k['jarak_rute']; ?></td>
                          <td><?php echo $k['waktu_tempuh']; ?></td>
                        <!-- </tbody> -->
                      </tr>
                    <?php } ?>
		</tbody>
	</table>
</body>
</html> 
