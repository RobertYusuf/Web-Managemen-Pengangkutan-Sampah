<html>
<head>
	<title>Koneksi Database MySQL</title>
</head>
<body>
<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "pengangkutans1";
$koneksi = mysqli_connect($host, $username, $password, $database);

// if ($koneksi) {
// 	echo "Sukses";
// } else {
// 	echo "Server Not Found";
// }

?>
</body>
</html>
