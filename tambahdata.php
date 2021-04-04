<!DOCTYPE html>
<html>
<head>
	<title>tes</title>
</head>
<body>
<h1>Isi Data Baru</h1>
<!-- Membuat form data pegawai -->
<form method="POST" action="#">
	<table width="400" cellpadding="2" cellspacing="2">
		<tr>
			<td width="130">Nama</td>
			<td><input type="text" name="nama" required></td>
		</tr>
		<tr>
			<td width="130">Alamat</td>
			<td><input type="text" name="alamat" required></td>
		</tr>
		<tr>
			<td width="130">Telepon</td>
			<td><input type="text" name="telepon" required></td>
		</tr>
		<tr>
			<td>
				<input type="submit" name="btnSimpan" value="Simpan">
				<input type="reset" name="btnReset" value="Reset">
			</td>
		</tr>
	</table>
</form>
<!-- Ketika button batal di klik akan berpindah ke tugas3main.php -->
<form action="tugas3main.php">
    <input type="submit" value="Batal" />
</form>
</body>
</html>
<?php
// Deklarasi nama server, username, password, dan database
$servername="localhost";
$username="root";
$password="";
$dbname="db_perusahaan";

// Membuat koneksi
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Mengecek koneksi
if(!$conn){
	die("Connection failed: ". mysqli_connect_error());
}

// jika btnSimpan diklik
if(isset($_POST['btnSimpan'])){

	// Membuat data
	$sql= "INSERT INTO pegawai(nama, alamat, telepon, id_divisi) VALUES ('$_POST[nama]', '$_POST[alamat]', '$_POST[telepon]', '1')";
	if(mysqli_query($conn, $sql)){
		echo "New record created succesfully";
		// pindah ke tugas3main.php
		echo "<meta HTTP-EQUIV='REFRESH' content='1; url=tugas3main.php'>";
	} else{
		echo "Error: ". $sql ."<br>". mysqli_error($conn);
	}
	// menutup koneksi
	mysqli_close($conn);	
}

?>