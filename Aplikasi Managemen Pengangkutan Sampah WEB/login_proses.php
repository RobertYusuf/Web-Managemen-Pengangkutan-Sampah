<?php
$username   = $_POST['username'];
$pass       = $_POST['password'];

 session_start();

if ($username=="superadmin" && $pass=="12345") {
    session_start();
    $_SESSION['username'] = $username;
    header("location:super_admin.php");

}else{
  include 'koneksilogin.php';
  $user = mysqli_query($connect,"select * from login where username='$username' and password='$pass'");
  $chek = mysqli_num_rows($user);
  if($chek>0)
  {
        session_start();
        $_SESSION['username'] = $username;

        header("location:index.php");
  }else
  {
      header("location:login.php");
  }

}

?>
