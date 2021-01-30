<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin - Input Laporan</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <hr class="sidebar-divider">
      
      <div class="sidebar-heading">
        Jadwal & Laporan
      </div>
      <!-- Nav Item - Dashboard -->
      <li class="nav-item ">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Data Jadwal</span></a>
        </li>


        <li class="nav-item active">
              <a class="nav-link" href="laporan.php">
                <i class="fas fa-fw fa-table"></i>
                <span>Laporan Pengangkutan</span></a>
              </li>

      <hr class="sidebar-divider my-0">
      
      <hr class="sidebar-divider">
      
      <div class="sidebar-heading">
        Personalia
      </div>

            <li class="nav-item">
              <a class="nav-link" href="pegawai.php">
                <i class="fas fa-fw fa-table"></i>
                <span>Data Supir</span></a>
              </li>
              
            <li class="nav-item">
              <a class="nav-link" href="pegawai2.php">
                <i class="fas fa-fw fa-table"></i>
                <span>Data Pengepul</span></a>
              </li>
              
              <li class="nav-item ">
              <a class="nav-link" href="kendaraan.php">
                <i class="fas fa-fw fa-table"></i>
                <span>Kendaraan</span></a>
              </li>

      <hr class="sidebar-divider my-0">
      
      <hr class="sidebar-divider">
      
      <div class="sidebar-heading">
        Rute & Titik Pengangkutan
      </div>

              <li class="nav-item ">
            <a class="nav-link" href="rute.php">
              <i class="fas fa-fw fa-table"></i>
              <span>Data Rute</span></a>
            </li>
        <!-- Nav Item - Charts -->
        <li class="nav-item">
          <a class="nav-link" href="titik_pengangkutan.php">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Data Titik Pengangkutan</span></a>
          </li>

              <!-- Divider -->
              <hr class="sidebar-divider d-none d-md-block">

              <!-- Sidebar Toggler (Sidebar) -->
              <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
              </div>

            </ul>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

              <!-- Main Content -->
              <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                  <!-- Topbar Navbar -->
                  <ul class="navbar-nav ml-auto">
                  </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                                
                  <h2>Input Data Laporan</h2>

                  <hr>

                  <?php
                  include "koneksi.php";
                  //jika sudah mendapatkan parameter GET id dari URL
                  if(isset($_GET['id'])){
                    //membuat variabel $id untuk menyimpan id dari GET id di URL
                    $id = $_GET['id'];

                    //query ke database SELECT tabel mahasiswa berdasarkan id = $id
                    $select = mysqli_query($koneksi, "SELECT * FROM laporan_pengangkutan WHERE id_laporan_pengangkutan='$id'") or die(mysqli_error($koneksi));

                    //jika hasil query = 0 maka muncul pesan error
                    if(mysqli_num_rows($select) == 0){
                      echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
                      exit();
                    //jika hasil query > 0
                    }else{
                      //membuat variabel $data dan menyimpan data row dari query
                      $data = mysqli_fetch_assoc($select);
                    }
                  }
                  ?>

                  <?php
                    if(isset($_POST['submit'])){
                    $volume_sampah=$_POST['volume_sampah'];
                    $status=$_POST['status'];

                    $sql = mysqli_query($koneksi, "UPDATE laporan_pengangkutan SET volume_sampah='$volume_sampah', status_pengangkutan='$status' WHERE id_laporan_pengangkutan='$id'") or die(mysqli_error($koneksi));

                    if($sql){
                      echo '<script>alert("Berhasil menyimpan data."); document.location="laporan.php?id='.$id.'";</script>';
                    }else{
                      echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
                    }
                  }
                  ?>

                    <form action="input_laporan.php?id=<?php echo $id; ?>" method="post">
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Id Jadwal Pengangkutan</label>
                      <div class="col-sm-10">
                        <input type="text" name="id_supir" class="form-control" size="4" value="<?php echo $data['id_jadwal_pengangkutan']; ?>" readonly required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Volume Sampah</label>
                      <div class="col-sm-10">
                        <input type="text" name="volume_sampah" class="form-control" size="4" required>
                      </div>
                    </div>
                    <div class="form-group row">
                          <div class="col col-md-2">
                            <label class="form-control-label">Status</label>
                           </div>
                            <div class="col-12 col-md-10">
                              <select name="status" class="form-control" required>
                                <option value="" disabled selected="">Pilih Status</option>
                                <option value="Selesai">Selesai</option>
                                <option value="Belum Selesai">Belum Selesai</option>
                              </select>
                            </div>
                        </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">&nbsp;</label>
                      <div class="col-sm-10">
                        <input type="submit" name="submit" class="btn btn-primary" value="SIMPAN">
                        <a href="laporan.php" class="btn btn-warning">KEMBALI</a>
                      </div>
                    </div>
                  </form>


                  
                </div>
                  <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                  <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                      <span>Copyright &copy; Your Website 2020</span>
                    </div>
                  </div>
                </footer>
                <!-- End of Footer -->

              </div>
              <!-- End of Content Wrapper -->

            </div>
            <!-- End of Page Wrapper -->

            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
              <i class="fas fa-angle-up"></i>
            </a>


<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script>

</body>

</html>
