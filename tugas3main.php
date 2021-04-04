<!DOCTYPE html>
<html>
<head>
	<title>Data Pegawai</title>
</head>
<body>
<center><h1>Data Pegawai</h1></center>
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

// mengambil semua data yang ada di table pegawai
$sql= "SELECT * FROM pegawai";
$result= mysqli_query($conn, $sql);

// Jika ada datanya
if(mysqli_num_rows($result) > 0){
	//output dari data pada masing-masing baris
	//'?id=$row[id_pegawai]' digunakan untuk menuliskan id_pegawai yang dipilih dan ditampilkan pada url
	while ($row = mysqli_fetch_assoc($result)) {
		echo "================================";
		echo "<br>";
		echo "Nama: ". $row["nama"] ."<br>Alamat: ". $row["alamat"] ."<br>Telepon: ". $row["telepon"] ."<br>";
		echo "<tr>
		<td><a href='editdata.php?id=$row[id_pegawai]'>Edit</a></td>
		&emsp;|&emsp;
		<td><a href='?id=$row[id_pegawai]'>Hapus</a></td>
		</tr><br>";
	}
} else{
	echo "Tidak Ada Data";
}
// Untuk berpindah ke halaman tambah data
echo"<br><br><form action='tambahdata.php'><input type='submit' name='btnTambah' value='Tambah Data'></form>";

mysqli_close($conn);
?>
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

// mengecek koneksi
if(!$conn){
	die("Connection failed: ". mysqli_connect_error());
}

if(isset($_GET['id'])){

	// menghapus data pegawai sesuai id_pegawai yang dipilih
	$sql= "DELETE FROM pegawai WHERE id_pegawai='$_GET[id]'";
	if(mysqli_query($conn, $sql)){
		echo "Data berhasil dihapus";
		// membuka kembali tugas3main.php
		echo "<meta HTTP-EQUIV='REFRESH' content='1; url=tugas3main.php'>";
	} else{
		echo "Error: ". $sql ."<br>". mysqli_error($conn);
	}
	// Menutup koneksi
	mysqli_close($conn);	
}

?>