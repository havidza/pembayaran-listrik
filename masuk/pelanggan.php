<!DOCTYPE html>
<html>
<head>
	<title>Pelanggan</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<div class="header">
		<img src="../images/pln.jpg">
	</div>

<?php 
		$koneksi = mysqli_connect("localhost","root","","listrik");

		$get="SELECT * FROM tarif";  
		$qry=mysqli_query($koneksi, $get);  
		
	?>

	<div class="bayaro">
	<div class="bayar">
		<h3>Pelanggan</h3>
		<form action="tambah_pel.php" method="post" name="pelanggan" id="pelanggan">

			<div>
				<label> ID Pelanggan :</label>
				<input type="text" name="IDP" id="IDP" placeholder="56254" required="required" />
			</div>


			<div>
				<label> Nama :</label>
				<input type="text" name="N" id="N" required="required">
			</div>
			<div>
				<label> Alamat:</label>
				<input type="text" name="A" id="A"/ required="required">
			</div>


			<div>
				<label> Kode Listrik:</label>
				<select id="IDP" name="K">
					<?php 
						while($tampil=mysqli_fetch_array($qry)){  
							echo '<option value="'.$tampil['kode'].'">'.$tampil['daya'].'</option>';
						}
					?>
				</select>
			</div>

	<center>
			<button class="tombol">
				Tambah
			</button>
			</center>
			</div>
			
		</form>


	<div class="menu2">
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
<th width="130">ID Pelanggan</th>
<th width="130">Nama</th>
<th width="130">Alamat</th>
<th width="130">Kode</th>
<th width="130">Aksi</th>
</tr>
</table>

	<?php
	
		$link = mysqli_connect("localhost","root","","listrik");
		$result = mysqli_query($link,"SELECT * FROM pelanggan");
		while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) 
		{
			echo  "
			<table class=table>
			<tr bgcolor =#fff class=th>
			<td align=center width=130>".$row['ID_Pelanggan']."</td>
			<td align=center width=130>".$row['nama']."</td>
			<td align=center width=130>".$row['alamat']."</td>
			<td align=center width=130>".$row['kode']."</td>
			<td align=center width=100>".$row['kode']."</td>";
			
		} 
	?>		
</table>


</div>



<br><br><br><br>
 <div class="footer4" >
      <center>
        Copyright Havid Zaeni All Rights Reserved
      </center>
    </div>
