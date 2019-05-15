
<?php

session_start();


if(isset($_SESSION['regisname'])) {
$thisNameparent = $_SESSION['regisname'];
}else{
	$thisNameparent = $_SESSION['varname'];
}

//$var_value = $_COOKIE['regisname'];
  echo "<script>alert('$thisNameparent'); </script>";
	$hostname_ff = "localhost";
$database_ff = "couple";
$username_ff = "franceZza";
$password_ff = "12345678";
	
	 $conn = new mysqli($hostname_ff, $username_ff, $password_ff,$database_ff);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$image = addslashes(file_get_contents($_FILES['image']['tmp_name'])); //SQL Injection defence!
$image_name = addslashes($_FILES['image']['name']);

$sql = "INSERT INTO `product_images` (`id`, `image`, `image_name`) VALUES ('$thisNameparent', '{$image}', '{$image_name}')";
if ($conn->query($sql) === TRUE) {// Error handling
  echo "<script>alert(' การทำรายการเสร็จสมบูรณ์'); </script>";
	if(isset($_SESSION['regisname'])){
		
			 echo "<script type='text/javascript'> window.location.href='index.php'; </script>";
	}else{
			 echo "<script type='text/javascript'> window.location.href='main.php'; </script>";
}
	   
}else{
	if("Duplicate entry '$thisNameparent' for key 'PRIMARY'"==$conn->error){
		
		//echo "Something went good :("; 
		
		
$sql = "UPDATE `product_images` SET image='{$image}',image_name='{$image_name}' WHERE id='$thisNameparent'";

if (mysqli_query($conn, $sql)) {
   	 echo "<script type='text/javascript'> window.location.href='main.php'; </script>";
} else {
    echo "Error updating record: " . mysqli_error($conn);
		 echo "<script type='text/javascript'> window.location.href='main.php'; </script>";
}
		
		
		
	}
	
}




?>