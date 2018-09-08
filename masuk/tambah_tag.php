<?php
include "../config/konek.php";
$cek= "SELECT * FROM tagihan where ID_Pelanggan='$_POST[IDP]'";
$prosescek= mysqli_query($koneksi, $cek);

$id = $_POST['IDP'];
$bulan = $_POST['BT'];
$tahun = $_POST['TT'];
$tagih = $_POST['id_tagihan'];
$PF = $_POST['P2'];
$PL = $_POST['P1'];
$PT = $PL-$PF;

if (mysqli_num_rows($prosescek)>0) {
	mysqli_connect("localhost","root","","listrik"); 
    $update="UPDATE tagihan SET 
    	ID_Tagihan = '$tagih',
		TahunTagih='$tahun', 
		BulanTagih='$bulan', 
		PemakaianF='$PF', 
		PemakaianL='$PL', 
		PemakaianT='$PT' WHERE ID_Pelanggan='$id'";
	mysqli_query($koneksi, $update);

	$update2 = "UPDATE pembayaran SET status = 'Belum Lunas' WHERE ID_Pelanggan='$id'";
	mysqli_query($koneksi, $update);
	?>
	
<script language="javascript">
alert ('Data Berhasil Diperbarui');
document.location=('tagihan.php');
</script>
	
<?php } 
else {?>

	<?php 
	mysqli_connect("localhost","root","","listrik"); 
	$simpan="INSERT INTO tagihan SET 

		ID_Tagihan = '$tagih',
		ID_Pelanggan='$id',
        TahunTagih='$tahun', 
        BulanTagih='$bulan', 
        PemakaianF='$PF', 
        PemakaianL='$PL', 
		PemakaianT='$PT'"; 

mysqli_query($koneksi, $simpan); 

$update2 = "UPDATE pembayaran SET status='Belum Lunas' WHERE ID_Pelanggan = '$id'";
?>
<script language="javascript">
alert ('Data Berhasil Dimasukan');
document.location=('tagihan.php');
</script>

<?php 
}
?>