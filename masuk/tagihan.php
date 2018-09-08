<!DOCTYPE html>
<html>
<head>
	<title>Listrik ku</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>


	<?php 
	$koneksi = mysqli_connect("localhost","root","","listrik");

	$get="SELECT * FROM pelanggan";  
    $qry=mysqli_query($koneksi, $get);  
	
	?> 



	 <div class="header">
      <img src="../images/pln.jpg">
  </div>

  	<div class="bayaro">
	<div class="bayar">
		<form name ="tagihan" action="tambah_tag.php" method="POST">
		<h3>Tagihan</h3>
		<form>
			<div>
				<label>ID Pelanggan:</label>
				<select name="IDP" id="IDP" onchange="changeValue(this.value)" >
				<option value="1"> - Pilih - </option>
				<?php 
						while($tampil=mysqli_fetch_array($qry)){  
							echo '<option value="'.$tampil['ID_Pelanggan'].'">'.$tampil['ID_Pelanggan'].'</option>';
						}
					?>
				</select>

        </select>

			</div>

			<div>
				<label> ID Tagihan :</label>
				<input type="text" name="id_tagihan" id="id_tagihan" />
			</div>

			<div>
				<label> Tahun Tagih :</label>
				<select name="TT" id="TT">
				<option value="">----</option>
				<?php
				$tahun = 2010;
				for($a =1; $a<10; $a++){
					echo "<option value=\"$tahun\">$tahun</option>";
					$tahun++;
				};

			?>
		</select>
			</div>

			<div>
				<label> Bulan Tagih:</label>
				<select name="BT" id="BT">
					<option >JANUARI</option>
					<option >FEBRUARI</option>
					<option >MARET</option>
					<option >APRIL</option>
					<option >MEI</option>
					<option >JUNI</option>
					<option >JULI</option>
					<option >AGUSTUS</option>
					<option >SEPTEMBER</option>
					<option >OKTOBER</option>
					<option >NOVEMBER</option>
					<option >DESEMBER</option>
				</select>
			</div>

				<div>
				<label> Pemakaian:</label>
				<input type="text" name="P1" id="P1" required="required" placeholder="Meteran Awal" /> <center><b>-</b></center> 
				<input type="text" name="P2" id="P2" required="required" placeholder="Meteran Akhir">
			</div>
			
			<center>
			<button class="tombol">
				Tambah
			</button>
			</center>
			</div>
			
		</form>

    </script> 

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


<div class="tabel2">

	<table class="table1">
<tr class="th">
<th width="130">ID Pelanggan</th>
<th width="130">ID Tagihan</th>
<th width="130">Tahun Tagihan</th>
<th width="130">Bulan Tagihan</th>
<th width="130">Meteran Awal</th>
<th width="130">Meteran Akhir</th>
<th width="130">Pemakaian Total</th>
</tr>
</table>

	<?php
	
		$link = mysqli_connect("localhost","root","","listrik");
		$result = mysqli_query($link,"SELECT * FROM tagihan");
		while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) 
		{
			echo  "
			<table class=table>
			<tr bgcolor =#fff class=th>
			<td align=center width=130>".$row['ID_Pelanggan']."</td>
			<td align=center width=130>".$row['ID_Tagihan']."</td>
			<td align=center width=130>".$row['TahunTagih']."</td>
			<td align=center width=130>".$row['BulanTagih']."</td>
			<td align=center width=130>".$row['PemakaianF']."</td>
			<td align=center width=130>".$row['PemakaianL']."</td>
			<td align=center width=130>Rp. ".$row['PemakaianT']."</td>";
			
		} 
	?>

</table>

	</div>		
</div>




</div>

 <div class="footer1">
      <center>
        Copyright Havid Zaeni All Rights Reserved
      </center>
    </div>