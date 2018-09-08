<?php 
	include '../config/konek.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Listrik ku</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<?php 
	$koneksi = mysqli_connect("localhost","root","","listrik");
	
	$getid="SELECT * FROM tarif";
    $qryid=mysqli_query($koneksi, $getid); 

	
	?>

	 <div class="header">
      <img src="../images/pln.jpg">
  </div>

  	<div class="bayaro">
	<div class="bayar">
		
		<br><br><br>
		<form name="tarif" id="tarif" method="post" action="tambah_tar.php">
					<h3>Tarif</h3>
		<form>
			<div>
				<label>Kode</label>
				<input type="text" name="kode" id="kode" required="required">
			</div>

			<div>
				<label> Daya :</label>
				<input type="text" name="daya" id="daya" required="required" />
			</div>

			<div>
				<label> Tarif perKWH :</label>
				<input type="text" name="tarif" id="tarif" required="required">
	
			</div>

				<div>
				<label> Beban:</label> 
				<input type="text" name="beban" id="beban" required="required">
			</div>
			
			<center>
			<button class="tombol">
				Tambah
			</button>
			</center>
			</div>
			
		</form>

<div class="menu">
    <div class="pojok">
 	<a href="../oke.php">
 		<img src="../images/home.png" class="home">
 	</a> 
	</div>

	<div class="pojok2">
		<a href="../admin/logout.php">
			<img src="../images/outi.png " width="40px" height="40px" class="out">
		</a>
		
	</div>
</div> 
	<div class="tabel3">

	<table class="table1">
<tr class="th">
<th width="130">Kode</th>
<th width="130">Daya</th>
<th width="130">Tarif PerKWH</th>
<th width="130">Beban</th>
</tr>
</table>

	<?php
	
		$link = mysqli_connect("localhost","root","","listrik");
		$result = mysqli_query($link,"SELECT * FROM tarif");
		while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) 
		{
			echo  "
			<table class=table>
			<tr bgcolor =#fff class=th>
			<td align=center width=130>".$row['kode']."</td>
			<td align=center width=130>".$row['daya']."</td>
			<td align=center width=130>".$row['tarif_perKWH']."</td>
			<td align=center width=130>".$row['beban']."</td>";
			
		} 
	?>

</table>
</div>
 <div class="footer4">
      <center>
        Copyright Havid Zaeni All Rights Reserved
      </center>
    </div>