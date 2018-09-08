<?php
include "../config/konek.php";
$cek= "SELECT * FROM pembayaran where ID_Pelanggan='$_POST[IDP]'";
$prosescek= mysqli_query($koneksi, $cek);

$id = $_POST['IDP'];
$id2 = $_POST['IDtag'];
$jumtag = $_POST['JT'];
$bd = $_POST['ta'];
$ba = $_POST['BA'];
$tb = $_POST['J'];

if (mysqli_num_rows($prosescek)>0) {
	mysqli_connect("localhost","root","","listrik");
	$update = "UPDATE pembayaran SET
			   status = 'Lunas',
			   ID_Pelanggan='$id', 
        	   ID_Tagihan='$id2',
			   jumlah_tgh='$jumtag',
			   biaya_denda='$bd',
			   biaya_admin='$ba',
			   total_byr='$tb'"; 

	mysqli_query($koneksi,$update);
?>

<script language="javascript">
alert ('Data Berhasil Diperbarui');
document.location=('pembayaran.php');
</script>


	<?php }
	else {?>

	<?php
mysqli_connect("localhost","root","","listrik"); 
$simpan="INSERT INTO pembayaran SET 
		status = 'Lunas',
        ID_Pelanggan='$id', 
        ID_Tagihan='$id2',
		jumlah_tgh='$jumtag',
		biaya_denda='$bd',
		biaya_admin='$ba',
		total_byr='$tb'"; 

mysqli_query($koneksi, $simpan); 
?>

<script language="javascript">
alert ('Data Berhasil Dimasukan');
document.location=('pembayaran.php');
</script>

<?php 
}
?>