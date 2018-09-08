<?php session_start();
if(ISSET($_SESSION['username'])){
include"config/konek.php";
?>


<!DOCTYPE html>
<html>
<head>
  <title>HOME</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
      <img src="images/pln.jpg" class="gmbar">
      <br><br>
      <img src="images/listrik2.jpg" class="gmbar2" width="400px" height="200px">
  </div>

  
   


  <div class="baris">

    <br><br>
    <a href="masuk/pelanggan.php">
  <button class="btn3">
    PELANGGAN
  </button></a>

    <a href="masuk/pembayaran.php">
  <button class="btn1">
    PEMBAYARAN
  </button></a>


  <a href="masuk/tagihan.php">
  <button class="btn2">
    TAGIHAN
  </button></a>
</div>

<a href="masuk/tarif.php">
  <button class="btn4">
    TARIF
  </button></a>
</div>


    <div class="footer">
      <center>
        Copyright Havid Zaeni All Rights Reserved
      </center>
    </div>
</body>
</html>

<?php
}else{ 
?>
<script language="JavaScript">alert('Anda tidak boleh mengakses halaman ini, Silahkan login dahulu');
document.location=('admin/index.php')</script>
<?php 
}
?>

