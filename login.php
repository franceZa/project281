<?php
	//error_reporting(E_ALL ^ E_NOTICE^ E_WARNING);
 //include_once 'main.php';
if(isset($_GET['username'])&&isset($_GET['pass'])){
$thisName = $_GET['username'];
$thisPass = $_GET['pass'];


$hostname_ff = "localhost";
$database_ff = "couple";
$username_ff = "franceZza";
$password_ff = "12345678";
$conn = new mysqli($hostname_ff, $username_ff, $password_ff,$database_ff);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//?
$sql = "SELECT  username,password FROM users WHERE `username` ='$thisName'&&`password`='$thisPass'";
$result = mysqli_query($conn, $sql); 


if(mysqli_num_rows($result) > 0){
	session_start();
$_SESSION['varname'] = $thisName;

echo "<script type='text/javascript'> window.location.href='main.php'; </script>";

	
}else if (mysqli_num_rows($result) == 0 && !is_null( $thisName)){
	
	echo "<script>alert(' Username หรือ password ไม่ถูกต้อง'); </script>";
}

	  



/*
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
	// echo  $row["username"]. " " .  "<br>";
   if($row["username"]==$thisName && $row["password"]==$thisPass ){
	 //  echo "id: " . $row["id"]. " - Name: " . $row["username"]. " " .  "<br>";
	   echo "<script type='text/javascript'> window.location.href='main.php'; </script>";
	 
   }else{
echo "<script>alert(' Username หรือ password ไม่ถูกต้อง'); </script>";
   }
      
    }
}else if (mysqli_num_rows($result) == 0){
	
	echo "<script>alert(' Username หรือ password ไม่ถูกต้อง'); </script>";
}
*/

$conn->close();
	  }

	  
  

 
?>
