<?php
// Deklarasi nama server, username, dan password
$servername="localhost";
$username="root";
$password="";

// Membuat koneksi
$conn = mysqli_connect($servername, $username, $password);

// Mengecek Koneksi
if(!$conn){
	die("Connection failed: ". mysqli_connect_error());
}

// Membuat Database
$sql= "CREATE DATABASE tamu";
if(mysqli_query($conn, $sql)){
	echo "Database created succesfully";
} else{
	echo "Error creating database". mysqli_error($conn);
}

// Menghentikan koneksi
mysqli_close($conn);
?>