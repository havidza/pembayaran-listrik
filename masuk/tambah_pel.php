<?php
include "../config/konek.php";
$cek= "SELECT * FROM pelanggan where ID_Pelanggan='$_POST[IDP]'";
$prosescek= mysqli_query($koneksi, $cek);
if (mysqli_num_rows($prosescek)>0) {
    echo "
	<script>
		alert('ID Sudah Digunakan');
		document.location=('../User.php'); 
	</script>";
}
else {?>

	<?php 
mysqli_connect("localhost","root","","listrik"); 

$id = $_POST['IDP'];
$nama = $_POST['N'];
$alamat = $_POST['A'];
$kwh = $_POST['K'];

$simpan="INSERT INTO pelanggan SET 
        ID_Pelanggan='$id', 
        nama='$nama',
		alamat='$alamat',
		kode='$kwh'"; 

mysqli_query($koneksi, $simpan); 
?>
<script language="javascript">
alert ('Data Berhasil Dimasukan');
document.location=('pelanggan.php');
</script>

<?php 
}
?>