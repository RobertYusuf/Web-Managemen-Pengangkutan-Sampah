<?php
    session_start();
    if (!isset($_SESSION['username'])){
        header("Location: login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin - Titik Pengangkutan</title>

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

      <!-- Nav Item - Dashboard -->
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


        <li class="nav-item">
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
        <li class="nav-item active">
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
<a class="dropdown-item" href="login.php" data-toggle="modal" data-target="#logoutModal">
                      <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                          Logout
                      </a>
                  </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                  <!-- DataTales Example -->
                  <div class="card shadow mb-4">
                    <div class="card-header py-3">
                      <h6 class="m-0 font-weight-bold text-primary">Data Titik Pengangkutan</h6>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Nama Titik</th>
                              <th>Rute</th>
                              <th>Update</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            include "koneksi.php";
                            $no=1;
                            $i="SELECT titik_pengangkutan.nama_titik_pengangkutan, rute.nama_rute, titik_pengangkutan.id_titik_pengangkutan FROM titik_pengangkutan, rute where titik_pengangkutan.id_rute=rute.id_rute";
                            $j=$koneksi->query($i);
                            while ($k=$j->fetch_array()) {
                              ?>
                              <tr>
                                <!-- <tbody> -->
                                  <td><?php echo $no++; ?></td>
                                  <td><?php echo $k['nama_titik_pengangkutan']; ?></td>
                                  <td><?php echo $k['nama_rute']; ?></td>
                                  <td><a href="edit_titik_pengangkutan.php?id=<?php echo $k['id_titik_pengangkutan']; ?>" class="badge badge-warning">Edit</a>
                                  <a href="delete_titik_pengangkutan.php?id=<?php echo $k['id_titik_pengangkutan']; ?>" class="badge badge-danger" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
                                  </td>
                                  <!-- </tbody> -->
                                </tr>
                              <?php } ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>


                    <a href="#" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#inputModal">
                      <span class="icon text-white-50">
                        <i class="fas fa-info-circle"></i>
                      </span>
                      <span class="text">Input Data Titik Pengangkutan</span>
                    </a>
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

            <!-- Logout Modal-->
            <div class="modal fade" id="inputModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Input Data Titik Pengangkutan</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="col-lg">
                      <form action="aksi_titik.php" method="POST" enctype="multipart/form-data" class="form-horizontal">
                        <div class="row form-group">
                          <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nama Titik</label></div>
                          <div class="col-12 col-md-9"><input type="text" id="nama_titik" name="nama_titik" class="form-control"></div>
                        </div>
                        <div class="form-group row">
                          <div class="col col-md-3">
                            <label class="form-control-label">Rute</label>
                           </div>
                            <div class="col-12 col-md-9">
                              <select name="id_rute" class="form-control" required>
                                <option value="" disabled selected="">Pilih Rute</option>
                                <?php
                                  include "koneksi.php";
                                  $no=1;
                                  $i="SELECT * FROM rute ";
                                  $j=$koneksi->query($i);
                                  while ($k=$j->fetch_array()) { ?>
                                  <option value="<?php echo $k['id_rute']; ?>"><?php echo $k['nama_rute']; ?></option>
                                <?php } ?>
                              </select>
                            </div>
                        </div>
                        <input class="btn btn-primary" type="reset" value="Reset">
                        <input class="btn btn-primary" type="submit" value="Submit">
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>

<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"></h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Ready to Leave?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

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
