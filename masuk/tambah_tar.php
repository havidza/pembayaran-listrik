<?php
include "../config/konek.php";
$cek= "SELECT * FROM tarif where kode='$_POST[kode]'";
$prosescek= mysqli_query($koneksi, $cek);
if (mysqli_num_rows($prosescek)>0) {
    echo "
	<script>
		alert('ID Sudah Digunakan');
		document.location=('tarif.php'); 
	</script>";
}
else {?>

	<?php 
mysqli_connect("localhost","root","","listrik"); 

$kde = $_POST['kode'];
$da = $_POST['daya'];
$tar = $_POST['tarif'];
$be = $_POST['beban'];

$simpan="INSERT INTO tarif SET 
        kode='$kde', 
        daya ='$da',
		tarif_perKWH ='$tar',
		beban ='$be'"; 

mysqli_query($koneksi, $simpan); 
?>
<script language="javascript">
alert ('Data Berhasil Dimasukan');
document.location=('tarif.php');
</script>

<?php 
}
?>