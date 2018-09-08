<?php 
mysql_connect('localhost','root','');
mysql_select_db('listrik');

$username = $_POST['username'];
$password = md5($_POST['password']);
 
$login = mysql_query("select * from user where username='$username' and password='$password'");
$cek = mysql_num_rows($login);
 
if($cek > 0){
	session_start();
	$_SESSION['username'] = $username;
	$_SESSION['status'] = "login";
	?>

<script language="JavaScript">alert('Welcome Back Darling');
document.location=('../oke.php')</script>
<?php

}else{
	echo "<script>
	eval(\"parent.location='index.php '\");
	alert (' Maaf Login Gagal, Silahkan Isi Username dan Password Anda Dengan Benar');
	</script>";
}
 
?>