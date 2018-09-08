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
	
	$getid="SELECT * FROM tagihan pb INNER JOIN pelanggan t ON t.ID_Pelanggan=pb.ID_Pelanggan INNER JOIN tarif tr ON tr.kode=t.kode";
    $qryid=mysqli_query($koneksi, $getid); 

	
	?>

	 <div class="header">
      <img src="../images/pln.jpg">
  </div>

  	<div class="bayaro">
	<div class="bayar">
		<h3>Data Pembayar</h3>


		<form name="pembayaran" id="pembayaran" method="post" action="tambah_byr.php">

			<div>
				<label>ID Pelanggan:</label>
				<select name="IDP" id="IDP" onchange="pilih(this.value)" >
				<option value="0"> - Pilih - </option>


				<?php 
						$array = "var IDp = new Array();\n";
						while($tampil=mysqli_fetch_array($qryid)){  
							echo '<option value="'.$tampil['ID_Pelanggan'].'">'.$tampil['ID_Pelanggan'].'</option>';
							$array .= "IDp['".$tampil['ID_Pelanggan']."']={
								idt:'".addslashes($tampil['ID_Tagihan'])."',
								pemakaian:'".addslashes($tampil['PemakaianT'])."',
								tarif:'".addslashes($tampil['tarif_perKWH'])."'
								};\n";
						}
					?>	


				</select>
			</td>
		</tr>
		
		<tr>
			<td>ID Tagihan</td>
			<td>:</td>
			<td>
				<input type="text" placeholder="" name="IDtag" id="IDtag"  readonly="">
			</td>
		</tr>
		
		<tr>
			<td>Jumlah Tagihan</td>
			<td>:</td>
			<td><input type="text" placeholder="" name="JT" id="JT" readonly></td>
		</tr>
		<tr>
			<td>Biaya Denda</td>
			<td>:</td>
			<td><input type="text" placeholder="" name="ta" id="ta" readonly></td>
		</tr>
		<tr>
			<td>Biaya Admin</td>
			<td>:</td>
			<td><input type="text" placeholder="" name="BA" id="BA" readonly ></td>
		</tr>
		<tr>
			<td>Total bayar</td>
			<td>:</td>
			<td><input type="text" placeholder="" name="J" id="J"  readonly ></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td align="right">
			<br>
				<button class="tombol">
				Tambah
			</button>
			</td>
		</tr>
	</table>	
</form>

	<script type="text/javascript">
		<?php echo $array; ?>
		function pilih(IDP){
			
			var value=document.getElementById("pembayaran").IDP.value;
				if (value=="0"){
					document.getElementById('IDtag').value = '';
					document.getElementById('JT').value = '';
				}
				else{
			var date = new Date();
			var d = date.getYear();
			var a = IDp[IDP].pemakaian;
			var b = IDp[IDP].tarif;
			var c = 2000;
			var e = 5000;
			var t = a*b;
			var ta = t+c;
			var f = t;
					document.getElementById('IDtag').value = IDp[IDP].idt; 
					document.getElementById('JT').value = a; //jumlahtagihan
					document.getElementById('ta').value = e; //biayadenda
					document.getElementById('BA').value = c; //biayadmin
					document.getElementById('J').value = f; //totalbayar
				}
		};
	</script>


	</div>
</div>

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


<div class="tabel4">

<table class="table1">
<tr class="th">
<th width="130">ID Pelanggan</th>
<th width="130">ID Tagihan</th>
<th width="130">Jumlah Tagihan</th>
<th width="130">Biaya Denda </th>
<th width="130">Biaya Admin </th>
<th width="130">Total Bayar</th>
<th width="130">Status</th>
</tr>
</table>

	<?php
	
		$link = mysqli_connect("localhost","root","","listrik");
		$result = mysqli_query($link,"SELECT * FROM pembayaran");
		while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) 
		{
			echo  "
			<table class=table>
			<tr bgcolor =#fff class=th>
			<td align=center width=130>".$row['ID_Pelanggan']."</td>
			<td align=center width=130>".$row['ID_Tagihan']."</td>
			<td align=center width=130>Rp. ".$row['jumlah_tgh']."</td>
			<td align=center width=130>Rp. ".$row['biaya_denda']."</td>
			<td align=center width=130>Rp. ".$row['biaya_admin']."</td>
			<td align=center width=130>Rp. ".$row['total_byr']."</td>
			<td align=center width=130>".$row['status']."</td>";

			
		} 
	?>		
</table>

<div class="print">
	<a class="pb" href="../print/print.php">
	<img src="../images/print.png" width="80px" height=80px>	
</a>
</div>
</div>

 <div class="footer2" >
      <center>
        Copyright Havid Zaeni All Rights Reserved
      </center>
    </div>