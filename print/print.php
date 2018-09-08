<?php ob_start(); ?>
<html>
<head>
  <title>Cetak PDF</title>
    
   <style>
   table {border-collapse:collapse; table-layout:fixed;width: 630px; margin-left: 50px;}
   table td {word-wrap:break-word;width: 90px;}
   table th {word-wrap:break-word;width: 90px;}
   </style>
</head>
<body>

  
<h3 style="text-align: center;">Laporan Pembayaran PLN<br>
  Dibuat tanggal : 

  <?php
    $today = date("j F, Y");
    echo $today;
  ?>

</h3>
<table border="1" width="100%">
<tr>
  <th>ID Pelanggan</th>
  <th>ID Tagihan</th>
  <th>Jumlah Tagihan</th>
  <th>Biaya Denda</th>
  <th>Biaya Admin</th>
  <th>Total Bayar</th>
  <th>Status</th>
</tr>
<?php
// Load file koneksi.php

$koneksi = mysqli_connect("localhost","root","","listrik");
$query = "SELECT * FROM pembayaran"; // Tampilkan semua data gambar
$sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query
$row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
 
if($row > 0){ // Jika jumlah data lebih dari 0 (Berarti jika data ada)
    while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
        echo "<tr>";
        echo "<td>".$data['ID_Pelanggan']."</td>";
        echo "<td>".$data['ID_Tagihan']."</td>";
        echo "<td> Rp. ".$data['jumlah_tgh']."</td>";
        echo "<td>Rp. ".$data['biaya_denda']."</td>";
        echo "<td>Rp. ".$data['biaya_admin']."</td>";
        echo "<td>Rp. ".$data['total_byr']."</td>";
        echo "<td>".$data['status']."</td>";
        echo "</tr>";
    }
}else{ // Jika data tidak ada
    echo "<tr><td colspan='7'>Data tidak ada</td></tr>";
}
?>
</table>
</body>
</html>
<?php
$html = ob_get_contents();
ob_end_clean();
        
require_once('html2pdf/html2pdf.class.php');
$pdf = new HTML2PDF('P','A4','en');
$pdf->WriteHTML($html);
$pdf->Output('Data Pembayaran.pdf', 'D');
?>