<?php
error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);

// Create connection
session_start();
if(isset($_SESSION['regisname'])) {
$thisNameparent = $_SESSION['regisname'];
}
	$hostname_ff = "localhost";
$database_ff = "couple";
$username_ff = "franceZza";
$password_ff = "12345678";

$json = $_GET['jsoncri'];
$thisjson = explode("\\",$json);
	 $conn = new mysqli($hostname_ff, $username_ff, $password_ff,$database_ff);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

if(!is_null($json)){
$sql = "INSERT INTO criteria (Username, Gender,Skin,Weight,Height,Nationality)VALUES ('$thisNameparent',   '$thisjson[0]', '$thisjson[1]',  '$thisjson[3]', '$thisjson[4]', '$thisjson[2]')";
 
if ($conn->query($sql) == TRUE) {
  echo "New records created successfully";
			echo "<script>alert(' การทำรายการเสร็จสมบูรณ์'); </script>";
	// echo "<script type='text/javascript'> window.location.href='testphp.php'; </script>";
			echo "<script type='text/javascript'> window.location.href='testphp.php'; </script>";		
	
	

	
} else{
	  echo "Error: " . $sql . "<br>" . $conn->error;
		echo "<script>alert('เกิดข้อผิดพลาดบางอย่าง'); </script>";
	echo "<script type='text/javascript'> window.location.href='index.php'; </script>";		
	
	$sql = "DELETE FROM users,userinformation,astrology,contact WHERE Username='$thisNameparent'";
	
	if ($conn->query($sql) == FALSE) {
		 echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
}


}

$conn->close();
?>