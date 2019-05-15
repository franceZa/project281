
<html>
	<?php
	 include_once 'inregister.php';
     
?>
<head>
	<title>Login V4</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	 

<!--===============================================================================================-->
</head>

<body>
	
	
	
	<div class="limiter">
		<div class="container-login100"style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form class="login100-form validate-form">
					<span class="login100-form-title p-b-49">
					Registeration
					</span>

		
						<br>	<br>
					<div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="username" id="username" placeholder="Type your username">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="pass" id="pass" placeholder="Type your password">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>
				
					<div class="wrap-input100 validate-input" data-validate="First name is required">
						<span class="label-input100">Firstname</span>
						<input class="input100" type="text" name="firstname" id="firstname" placeholder="Type your firstname">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Last name is required">
						<span class="label-input100">Lastname</span>
						<input class="input100" type="text" name="lastname" id="lastname" placeholder="Type your lastname">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>
					
						<div class="wrap-input100 validate-input" data-validate="Nickname is required">
						<span class="label-input100">Nickname</span>
						<input class="input100" type="text" name="nickname" id="nickname" placeholder="Type your Nickname">
							
							
							
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>
						<br>	
						<span class="login100-form-title p-b-49">
					User Informatiom
					</span>
			
						<div class="wrap-input100 validate-input" data-validate="Sex is required">
						                <form action="/action_page.php" id="sex">
						  Choose Sex <br>
  <input type="radio" name="genderS" value="male" > Male<br>
  <input type="radio" name="genderS" value="female"> Female<br>

</form>
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>
					
						<div class="wrap-input100 validate-input" data-validate="job is required">
						                <form action="/action_page.php" id="job">
						  Choose jobs <br>
  <input type="radio" name="job" value="Private business " > Private business<br>
  <input type="radio" name="job" value="Government office"> Government office<br>
		  <input type="radio" name="job" value="Other"> Other<br>									

</form>
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>
					
							<div class="wrap-input100 validate-input" data-validate="skin is required">
						                <form action="/action_page.php" id="skin">
						  Choose skin <br>
  <input type="radio" name="skin" value="white" > white skin<br>
  <input type="radio" name="skin" value="tan"> Tan skin<br>
<input type="radio" name="skin" value="black"> black skin<br>										
											
</form>
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>
					
					
							<div class="wrap-input100 validate-input" data-validate="nationality is required">
						                <form action="/action_page.php" id="nationality">
						  Choose nationality
 <br>
  <input type="radio" name="nationality" value="Africa" > Africa<br>
  <input type="radio" name="nationality" value="European"> European<br>
<input type="radio" name="nationality" value="Asian"> Asian<br>										
											
</form>
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>
						<div class="wrap-input100 validate-input" data-validate="weight is required">
						                <form action="/action_page.php" id="weight">
						  Choose weight
 <br>
  <input type="radio" name="weight" value="35-44" >thin body 35-44kg.<br>
  <input type="radio" name="weight" value="45-65"> plump body 45-65kg.<br>
<input type="radio" name="weight" value="65-150"> fat body (over 65kg)<br>										
											
</form>
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>
					
					<div class="wrap-input100 validate-input" data-validate="weight is required">
						                <form action="/action_page.php" id="weight">
						  Choose hight
 <br>
  <input type="radio" name="hight" value="140-160" >short (140-160) <br>
  <input type="radio" name="hight" value="161-180"> Medium high (161-181) <br>
<input type="radio" name="hight" value="181-200"> tall (181-200)<br>										
											
</form>
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>
					
					
					
					<div class="wrap-input100 validate-input" data-validate="weight is required">
						                <form action="/action_page.php" id="weight">
						  Choose status
 <br>
  <input type="radio" name="status" value="widow" >widow <br>
  <input type="radio" name="status" value="divorce">divorce <br>
<input type="radio" name="status" value="none-status">none <br>										
											
</form>
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>
					
			
						<div class="wrap-input100 validate-input" data-validate="hobbit is required">
						<span class="label-input100">hobbit</span>
						<input class="input100" type="text" name="hobbit" id="hobbit" placeholder="Type your hobbit">
							
							
							
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>
					
					
					
					
					
					
	
				<div class="wrap-input100 validate-input" data-validate="Birth Date is required">
					<span class="label-input100">Birth Date</span>	
			<span class="label-input100"	style="padding-left:20px"	></span>	
	  <input type="text"name="filter-date" id="filter-date" placeholder="dd/mm/yy"  >
	  <span class="focus-input100" data-symbol="&#xf206;"></span>
				</div>
						<br>	
				<span class="login100-form-title p-b-49">
					User contact
					</span>
			
<div class="wrap-input100 validate-input" data-validate="Email is required">
						<span class="label-input100">Email</span>
						<input class="input100" type="text" name="email" id="email" placeholder="Type your email">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>
					
					<div class="wrap-input100 validate-input" data-validate="IdLine is required">
						<span class="label-input100">IdLine</span>
						<input class="input100" type="text" name="IdLine" id="IdLine" placeholder="Type your IdLine">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Email is required">
						<span class="label-input100">IG</span>
						<input class="input100" type="text" name="IG" id="IG" placeholder="Type your IG">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>
	
	
                    <div class="wrap-input100 validate-input" data-validate="Email is required">
						<span class="label-input100">Facebook</span>
						<input class="input100" type="text" name="Facebook" id="Facebook" placeholder="Type your Facebook">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>
						<br>	

					
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn"   onclick="myFunction()" > 
								 
								OK!
							</button>
							<p id="demo"></p>
	
						</div>
					</div>
		
			</from>
		
				  <script src="jquery.js"></script>
        <script src="jquery.datetimepicker.full.js"></script>
						<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	 <link rel="stylesheet" type="text/css" href="jquery.datetimepicker.css"/>
<link rel = "stylesheet" href="jquery.datetimepicker.min.css">
	<script src="js/main.js"></script>
	<script src="jquery.js"></script>
	<script src="jquery.datetimepicker.full.js"></script>
				
	<script type="text/javascript">
		

			$(function() {
    $( "#filter-date" ).datetimepicker({ dateFormat: 'DD-MM-yy'  ,maxDate : 'now',minDate : new Date('1900-01-01') });
			//((Integer.valueOf(in)) - 1900) % 12
		
  })

			function myFunction()
{

	
	
	//window.location.href = "register.php?birthdate=" + birthdate;
	
	
	var strname =document.getElementById("username").value;
	
	
		var pass =document.getElementById("pass").value;

	
		var firstname =document.getElementById("firstname").value;
	

		var lastname =document.getElementById("lastname").value;

	var nickname =document.getElementById("nickname").value;
	
	
	var birthdate = $( "#filter-date" ).val();
	
	var sex =document.querySelector('input[name="genderS"]:checked').value;
	var job =document.querySelector('input[name="job"]:checked').value;
	var skin =document.querySelector('input[name="skin"]:checked').value;
	var nationality =document.querySelector('input[name="nationality"]:checked').value;
	var weight =document.querySelector('input[name="weight"]:checked').value;
	var hight =document.querySelector('input[name="hight"]:checked').value; //status
var status =document.querySelector('input[name="status"]:checked').value;
	var hobbit =document.getElementById("hobbit").value;
	
	
	var email =document.getElementById("email").value;
	var IdLine =document.getElementById("IdLine").value;
	var IG =document.getElementById("IG").value;
	var Facebook =document.getElementById("Facebook").value;
	
	var json=strname+"\\"+pass+"\\"+firstname+"\\"+lastname+"\\"+nickname+"\\"+birthdate+"\\"+sex+"\\"+job+"\\"+skin+"\\"+nationality+"\\"+weight+"\\"+hight+"\\"+status+"\\"+hobbit+"\\"+email+"\\"+IdLine+"\\"+IG+"\\"+Facebook;
	//var json=sex+"/"+job+"/"+skin+"/"+nationality+"/"+weight+"/"+hight;
	//alert(json);
window.location.href = "register.php?json=" + json;
	
}
		
		
		</script>
					
				
		</body>
		
</html>