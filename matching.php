
<?php

session_start();
$thisNameparent = $_SESSION['varname'];


	$hostname_ff = "localhost";
$database_ff = "couple";
$username_ff = "franceZza";
$password_ff = "12345678";
	$jsonlove= $_GET['id'];
	 $conn = new mysqli($hostname_ff, $username_ff, $password_ff,$database_ff);
$match=0;
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$sql = "SELECT Match_Username FROM matching WHERE   Match_Username='$thisNameparent'&& Match_Username2='$jsonlove'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) < 1) {
  $sql = "INSERT INTO `matching` (`Match_Username`, `Match_Username2`) VALUES ('$thisNameparent', '$jsonlove')";
	if ($conn->query($sql) === TRUE) {// Error handling

}  
}


$sql = "SELECT Match_Username2 FROM matching WHERE   Match_Username='$jsonlove'  ";
$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
         if($row['Match_Username2']==$thisNameparent){
			   echo "<script>alert(' อีกฝ่านกดสนใจในตัวท่าน '); </script>";
			 $match=1;
	
		 }
    }
} else {
      echo "<script>alert(' การทำรายการเสร็จสมบูรณ์โปรดรออีกฝ่านกดสนใจสามาถติดตามผลได้จากกดถูกใจอีกรอบ '); </script>";
	   	 echo "<script type='text/javascript'> window.location.href='main.php'; </script>";
}

if($match==1){
	
	$sql = "SELECT * FROM contact WHERE Username='$jsonlove'  ";
$result = mysqli_query($conn, $sql);
	
	if (mysqli_num_rows($result) > 0) {

    while($row = mysqli_fetch_assoc($result)) {
         echo "<script>alert('idline :".$row['Idline']." facebook : ".$row['Facebook']." Ig : ".$row['Ig']." Hotmail : ".$row['hotmail']."'); </script>";
	   	 echo "<script type='text/javascript'> window.location.href='main.php'; </script>";
    }
}
}



?>