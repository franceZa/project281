<?php
error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);

// Create connection
session_start();
if(isset($_SESSION['varname'])) {
$thisNameparent = $_SESSION['varname'];
}
	$hostname_ff = "localhost";
$database_ff = "couple";
$username_ff = "franceZza";
$password_ff = "12345678";

$json = $_GET['Changecri'];
$thisjson = explode("\\",$json);
	 $conn = new mysqli($hostname_ff, $username_ff, $password_ff,$database_ff);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

if(!is_null($json)){
	
$sql = "UPDATE criteria SET Gender='$thisjson[0]',Skin='$thisjson[1]',Weight='$thisjson[3]',Height='$thisjson[4]',Nationality='$thisjson[2]' WHERE Username='$thisNameparent'";

if ($conn->query($sql) === TRUE) {
	echo "<script>alert(' การทำรายการเสร็จสมบูรณ์'); </script>";
	// echo "<script type='text/javascript'> window.location.href='testphp.php'; </script>";
			echo "<script type='text/javascript'> window.location.href='main.php'; </script>";		
} else {
    echo "Error updating record: " . $conn->error;
		echo "<script type='text/javascript'> window.location.href='main.php'; </script>";		
}

}

$conn->close();
?>