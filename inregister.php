<?php
error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);

// Create connection

	$hostname_ff = "localhost";
$database_ff = "couple";
$username_ff = "franceZza";
$password_ff = "12345678";



$json = $_GET['json'];
$thisjson = explode("\\",$json);

$thisage = explode("/",$thisjson[5]);
$t=time();
$yearold = date("Y",$t)-$thisage[0];
	$astrology = array("Rat", "OX", "TIGER", "RABBIT", "DRAGON", "SNAKE", "HORSE", "GOAT", "MONKEY", "ROOSTER", "DOG", "PIG");
$astrologyyear = 	($thisage[0] - 1900) % 12;
	
	//echo $astrology[$astrologyyear];
	
	//echo "<script>alert('$json'); </script>";
	


	 $conn = new mysqli($hostname_ff, $username_ff, $password_ff,$database_ff);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

if(!is_null($json)){
$sql = "INSERT INTO users (username, surname,nick,password,firstname)VALUES ('$thisjson[0]',   '$thisjson[3]', '$thisjson[4]',  '$thisjson[1]', '$thisjson[2]')";
 
if ($conn->query($sql) == TRUE) {
   // echo "New record created successfully";
	
	$sql = "INSERT INTO userinformation (Username, Hobbit,Birthdate,Skin,Weight,Gender,Status,age,nationality,high)VALUES ('$thisjson[0]',   '$thisjson[13]', '$thisjson[5]',  '$thisjson[8]', '$thisjson[10]', '$thisjson[6]', '$thisjson[12]', '$yearold ', '$thisjson[9]', '$thisjson[11]')";
	
	if ($conn->query($sql) == TRUE) {
		$sql = "INSERT INTO contact (Username, Idline,Facebook,Ig,hotmail)VALUES ('$thisjson[0]','$thisjson[15]', '$thisjson[17]','$thisjson[16]','$thisjson[14]')";
		
			if ($conn->query($sql) == TRUE) {
				
				$sql = "INSERT INTO astrology (Username,Zodiac)VALUES ('$thisjson[0]',   '$astrology[$astrologyyear]')";
				
				if ($conn->query($sql) == TRUE) {
					
				echo "New records created successfully";
						echo "<script>alert(' การทำรายการเสร็จสมบูรณ์'); </script>";
					session_start();
					$_SESSION['regisname'] = $thisjson[0];
		
	echo "<script type='text/javascript'> window.location.href='criteria.php'; </script>";
			//echo "<script type='text/javascript'> window.location.href='criteria.php'; </script>";		
				}else{
					 echo "Error: " . $sql . "<br>" . $conn->error;
				}
			
				
			}
	
		
	}
	

	
} 


else {
	if("Duplicate entry '$thisLastName' for key 'PRIMARY'"==$conn->error){
		echo "<script>alert(' มีคนใช้ Username นี้เเล้วโปรดใช้ Username อื่น'); </script>";
	 // echo "Error: " . $sql . "<br>" . $conn->error;
	//	echo "<script>alert('เกิดข้อผิดพลาดบางอย่าง'); </script>";
	echo "<script type='text/javascript'> window.location.href='index.php'; </script>";		
	
	$sql = "DELETE FROM users,userinformation,astrology,contact WHERE Username='$thisNameparent'";
	
	if ($conn->query($sql) == FALSE) {
		 echo "Error: " . $sql . "<br>" . $conn->error;
	}
	}
}
		
	

}

$conn->close();
?>