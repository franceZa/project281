<!DOCTYPE html>
<?php
session_start();
$thisNameparent = $_SESSION['varname'];


class  People  implements JsonSerializable //สร้างคลาสว่า ObjMetch
{   	
	var $user ;
	var $nick ;
    var $name ;//ประกาศตัวแปร $name ของคลาส ด้วยคำสั่ง var
    var $surname;
	var $age ;
	var $birth;
	var $pic ;
	var $hobbit ;
	var $astrology ;
	var $sex ;
	var $skin ;
	var $weight ;
	var $high ;
	var $nationality;
	var $Status;
	
	function People($user="",$nick="",$name="",$surname="",$age="",$birth="",$pic="",$hobbit="",$astrology="",$gender="",$skin="",$weight="",$high="",$nationality="" ,$Status="" )// สร้าง เมธอด ชื่อว่า Hello()
         {
		$this->user=$user;
		$this->nick=$nick;
           $this->name=$name;
		 $this->surname=$surname;
		 $this->age=$age;
		 $this->birth=$birth;
		 $this->pic=$pic;
		 $this->hobbit=$hobbit;
		 $this->astrology=$astrology;
		 $this->sex=$gender;
		
		 $this->skin=$skin;
		 $this->weight=$weight;
		 $this->high=$high;
		 $this->nationality=$nationality;
		 $this->Status=$Status;
	
         }
	 
	 
	     public function jsonSerialize () {
        return array(
			 'user'=>$this->user,
            'nick'=>$this->nick,
			'name'=>$this->name,
			'surname'=>$this->surname,
			'age'=>$this->age,
			'birth'=>$this->birth,
			'pic'=>$this->pic,
			'hobbit'=>$this->hobbit,
			'astrology'=>$this->astrology,
			'sex'=>$this->sex,
		'skin'=>$this->skin,
		'weight'=> $this->weight,
		'high'=> $this->high,
		'nationality'=> $this->nationality,
		'Status'=> $this->Status
			
	
        );
    }

	function getinfo(){
		return $this->sex."/".$this->skin."/".$this->weight."/".$this->high."/".$this->nationality;
	}

}

$hostname_ff = "localhost";
$database_ff = "couple";
$username_ff = "franceZza";
$password_ff = "12345678";

$conn = new mysqli($hostname_ff, $username_ff, $password_ff,$database_ff);
$people=array();
$peopleuser=array();
$pic=array();
$zo;
$astrology=array();
$picown=array();
$piczo=array();
$astrologypeo=array();
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$conn = new mysqli($hostname_ff, $username_ff, $password_ff,$database_ff);



$sql = "SELECT Zodiac  FROM astrology WHERE Username ='$thisNameparent'" ;

$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) > 0) {
	   while($row = mysqli_fetch_assoc($result)) {
		
	//	echo $row['Username'];
	
			
			//array_push($piczo, base64_encode($row["image"]));
				$zo=$row["Zodiac"];
		 //  echo "<script>alert('$zo'); </script>";
	}
	
}
$sql = "SELECT  Username FROM astrology WHERE Zodiac ='$zo'" ;

$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) > 0) {

    while($row = mysqli_fetch_assoc($result)) {
		
	//	echo $row['Username'];
		if($thisNameparent!=$row['Username']){
	 array_push($astrology,   $row['Username']    );
			//$z=$row['Username'] ;
//		 echo "<script>alert('$z'); </script>";
		//	array_push($piczo, base64_encode($row["image"]));
			
	}
	}
$sql = "SELECT  users.username As user
    ,users.firstname As firstname
    , users.surname As surname
    , users.nick As nick
    , userinformation.age As age
    , userinformation.Birthdate As Birthdate
    , userinformation.Gender As Gender
	 , userinformation.Hobbit As Hobbit
    , userinformation.Skin As Skin
	    , userinformation.Weight As Weight
		    , userinformation.high As high
			    , userinformation.nationality As nationality
				  , userinformation.Status As Status
    , contact.Idline As Idline
    , contact.facebook As facebook
    , contact.Ig As Ig 
    , contact.hotmail As hotmail
    , astrology.Zodiac As Zodiac
    , product_images.image As image
FROM  users 

INNER JOIN userinformation
    ON users.username = userinformation.Username
INNER JOIN contact
    ON userinformation.Username = contact.Username
INNER JOIN astrology
    ON contact.Username = astrology.Username
	
INNER JOIN product_images
    ON astrology.Username = product_images.id";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {

    while($row = mysqli_fetch_assoc($result)) {
		
		if($thisNameparent!=$row["user"]){
	 array_push($people,new people($row["user"],$row["nick"],$row["firstname"],$row["surname"],$row["age"],$row["Birthdate"],base64_encode($row["image"]),$row["Hobbit"],$row["Zodiac"],$row["Gender"],$row["Skin"],$row["Weight"],$row["high"],$row["nationality"],$row["Status"]));
		array_push($pic, base64_encode($row["image"]));
		//	echo "<script>alert(in_array($thisNameparent,$astrology)); </script>";
			if(in_array($row["user"],$astrology)){
				//echo "<script>alert('$thisNameparent|$astrology'); </script>";
				// echo "<script>alert('132'); </script>";
				array_push($piczo, base64_encode($row["image"]));
					 array_push($astrologypeo,new people($row["user"],$row["nick"],$row["firstname"],$row["surname"],$row["age"],$row["Birthdate"],base64_encode($row["image"]),$row["Hobbit"],$row["Zodiac"],$row["Gender"],$row["Skin"],$row["Weight"],$row["high"],$row["nationality"],$row["Status"]));
		array_push($pic, base64_encode($row["image"]));
			}
	}else{
			
			array_push($picown, base64_encode($row["image"]));
array_push($peopleuser,new people($row["user"],$row["nick"],$row["firstname"],$row["surname"],$row["age"],$row["Birthdate"],base64_encode($row["image"]),$row["Hobbit"],$row["Zodiac"],$row["Gender"],$row["Skin"],$row["Weight"],$row["high"],$row["nationality"],$row["Status"]));
		
			
		}
	
	}
	
}else{
	echo "none";
}
}else{
	echo "none";
}




$sql = "SELECT  * FROM criteria WHERE Username ='$thisNameparent'" ;

		$strcriarr=array();
$cripeople=array();
if (mysqli_num_rows($result) > 0) {
$matchlev=0;
	$strcri;
	$result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)) {
		           
		
	$strcri="".$row["Gender"]."/".$row["Skin"]."/".$row["Weight"]."/".$row["Height"]."/".$row["Nationality"];
		
	}
		$strcriarr = explode('/', $strcri);
}
			for($c=0 ; $c < (count($people)); $c++){
			$cripeopleinfo	= explode('/', $people[$c]->getinfo());
		
			for($lv=0 ; $lv< (count($strcriarr)); $lv++){
				
				if($cripeopleinfo[$lv]==$strcriarr[$lv]){
					$matchlev++;
					//	echo "x";
				}
			}
			if($matchlev>2){
	 array_push($cripeople,$people[$c]);
				$matchlev=0;
				
				
				
}else{
			$matchlev=0;	
			}
		}
	
	




//print_r($people);
mysqli_close($conn);
?>






<html lang="en">

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<style>
body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
.w3-third img{margin-bottom: -6px; opacity: 0.8; cursor: pointer}
.w3-third img:hover{opacity: 1}
footer {
  position: absolute;
  bottom: 0;
  width: 100%;
  height: 50px;
	left: 9%;
}
</style>
<body class="w3-light-grey w3-content" style="max-width:1600px">

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-bar-block w3-white w3-animate-left w3-text-grey w3-collapse w3-top w3-center" style="z-index:3;width:300px;font-weight:bold" id="mySidebar"><br>
     <img src="data:image/jpeg;base64,<?php echo $picown[0]; ?>'" height="200" width="200">  
  <h3 class="w3-padding-64 w3-center" ><b id="nametag"></b></h3>
	  <a href="testphp.php" class="w3-bar-item w3-button">Change picture</a> 
	
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-hide-large">CLOSE</a>
	<a  onclick="Changecri()" class="w3-bar-item w3-button">Change Mycritiria</a> 
<a  onclick="cri()" class="w3-bar-item w3-button">Match by critiria</a> 
 <select  name="cri" id="criselect">
	   <option value="0">--Select critiria--</option>
	  <option value="1">เพศ ชาย</option>
     <option value="2">เพศ หญิง</option>
    <option value="3">ส่วนสูง 140-160</option>
    <option value="4">ส่วนสูง 161-180</option>
	     <option value="5">ส่วนสูง 181-200</option>
	   <option value="6">น้ำหนัก 35-44</option>
	   <option value="7">น้ำหนัก 45-65</option>
	   <option value="8">น้ำหนัก 65-150</option>
    <option value="9">เชื้อชาติ เอเชีย</option>
   <option value="10">เชื้อชาติ ฝรั่ง</option>
	 <option value="11">เชื้อชาติ เเอฟริกา</option>
	  <option value="12">ผิว ขาว</option>
	  <option value="13">ผิว เเทน</option>
	  <option value="14">ผิด ดำ</option>
	   <option value="15">อายุ น้อยกว่า21</option>
	   <option value="16">อายุ 21-30</option>
	 <option value="17">อายุ 31-40</option>
	  <option value="18">อายุ มากกว่า40</option>
	   <option value="19">สถานะ หย่า</option>
	   <option value="20">สถานะ แม่ม้ายหรือพ่อม้าย</option>
	  
	 
  </select>
	
	
	
  <a onclick="ast()" class="w3-bar-item w3-button">Match by astrology</a>
	<a onclick="Begin2()" class="w3-bar-item w3-button">Match Random</a>
	
	 <div class="w3-center w3-padding-32"  >  
    <div class="w3-bar" id="pad">
		
 
    </div>
  </div>
</nav>

<!-- Top menu on small screens -->
<header class="w3-container w3-top w3-hide-large w3-white w3-xlarge w3-padding-16">
  <span class="w3-left w3-padding">SOME NAME</span>
 
</header>

<!-- Overlay effect when opening sidebar on small screens -->


<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px" id="all">

  <!-- Push down content on small screens --> 
  <div class="w3-hide-large" style="margin-top:83px"></div>
  
  <!-- Photo grid -->
<div class="photo" id ="photo">
  
  </div>
  </div>
  <!-- Pagination -->
 
  
  <!-- Modal for full size images on click-->
  <div id="modal01" class="w3-modal w3-black" style="padding-top:0" onclick="this.style.display='none'">
    <span class="w3-button w3-black w3-xlarge w3-display-topright">×</span>
    <div class="w3-modal-content w3-animate-zoom w3-center w3-transparent w3-padding-64">
      <img id="img01" class="w3-image">
      <p id="caption" ></p>
		  <p id="love" name="" onClick="love()"> สนใจ </p>
    </div>
  </div>

 
  

<!-- End page content -->
</div>
	
  </div>

</body>




<script>
// Script to open and close sidebar
	//window.alert("s");
		 
	
		 
		 	 var peopleuser= <?php echo json_encode($peopleuser); ?>;
//	var js_obj_data = JSON.parse(jArray);
	// window.alert(js_obj_data[0].);
		//window.alert(jArray.length);
			var nametag=document.getElementById("nametag");
	
	nametag.innerHTML= "คุณ "+JSON.stringify(peopleuser[0].name);
	
Begin2();

		//alert("as");
	function ast(){
			var subzo = <?php echo json_encode($piczo) ?>; 
	pad(subzo.length,"ast");
	}
	
	
	
	function astt(element){
		
var astrology = <?php echo json_encode($astrologypeo) ?>; 
			var subzo = <?php echo json_encode($piczo) ?>; 
		
var beginnz=document.getElementById("photo");
		//form.reset();	
beginnz.innerHTML = '';
	/////////////////////////////////////
			var j = 9*parseInt(element);
    var sum = 9*(1+parseInt(element));
	if(sum>astrology.length){
	   
	  sum = (astrology.length%9)+j;
	      
	   }	
		//alert(astrology.length);
	for(j;j<astrology.length;j++){ 
		
		
		//	alert(JSON.stringify(astrology[j].name));
var new_rowzz = document.createElement("div");
			new_rowzz.setAttribute("class", "w3-third" );
var piccc = document.createElement("IMG");
	var astuser=JSON.stringify(astrology[j].user).split('"');
			piccc.setAttribute("src", "data:image/jpeg;base64,"+subzo[j]);
	//	picc.setAttribute("src", "images/1500x900-IWR-wintersunset-temple-1500x1050.jpg");
			piccc.setAttribute("style", "width:100%" );
			piccc.setAttribute("onclick", "onClick(this)" );
				//	picc.setAttribute("onclick", "ondblclick(this,"+astuser[1]+" )");
			piccc.setAttribute("alt", "คุณ :"+JSON.stringify(astrology[j].nick)+" hobbit :"+JSON.stringify(astrology[j].hobbit));
			document.body.appendChild(piccc);
		piccc.setAttribute("id", ""+astuser[1]);
			document.body.appendChild(piccc);
			new_rowzz.appendChild(piccc);
			
			document.body.appendChild(new_rowzz);
			beginnz.appendChild(new_rowzz);

	}
		
		
		
		
		
	}
	
function 	Changecri(){
	
	
	window.location.href='Changecri.php';
	
	
}
	
	
		function cri() {
			var arrpeoplecri=[];
			var cri=document.getElementById("criselect");
			var strUser = parseInt( cri.options[cri.selectedIndex].value);

		 	
			 
	//alert(strUser);

			switch (strUser) {
					
					
				  case 0:
	           
				 var people= <?php echo json_encode($cripeople); ?>;
					 var i=0;
					//alert("yes");
					 for(i;i<people.length;i++){
             var peopleaftersplit=JSON.stringify(people[i].sex).split('"');
						//alert(peopleaftersplit[1]);
				
					 arrpeoplecri.push(people[i])   ;
					}
				
					
        break;	
					
   
		  case 1:
	           
				 var people= <?php echo json_encode($people); ?>;
					 var i=0;
					
					 for(i;i<people.length;i++){
             var peopleaftersplit=JSON.stringify(people[i].sex).split('"');
						//alert(peopleaftersplit[1]);
					if(peopleaftersplit[1]=="male"){
						
					 arrpeoplecri.push(people[i])   ;
					}
						 }
					
        break;
		  case 2:
		
		              			 var people= <?php echo json_encode($people); ?>;
					 var i=0;
					 for(i;i<people.length;i++){
             var peopleaftersplit=JSON.stringify(people[i].sex).split('"');
						
					if(peopleaftersplit[1]=="female"){
						
					 arrpeoplecri.push(people[i])   ;
					}
						 }
					
        break;
				
		  case 3:
					 			 var people= <?php echo json_encode($people); ?>;
					 var i=0;
					 for(i;i<people.length;i++){
             var peopleaftersplit=JSON.stringify(people[i].high).split('"');
						
					if(peopleaftersplit[1]=="140-160"){
					arrpeoplecri.push(people[i])   ;
					}
					}
					
	
        break;
						
		  case 4:
	 			 var people= <?php echo json_encode($people); ?>;
					 var i=0;
					 for(i;i<people.length;i++){
             var peopleaftersplit=JSON.stringify(people[i].high).split('"');
						
					if(peopleaftersplit[1]=="161-180"){
						
					 arrpeoplecri.push(people[i])   ;
					}
						 }
					
        break;
					
				case 5:
	 			
					var people= <?php echo json_encode($people); ?>;
					 var i=0;
					 for(i;i<people.length;i++){
             var peopleaftersplit=JSON.stringify(people[i].high).split('"');
						
					if(peopleaftersplit[1]=="181-200"){
						
					 arrpeoplecri.push(people[i])   ;
					}
						 }
					
        break;
					
				
				case 6:
		
						 	var people= <?php echo json_encode($people); ?>;
					 var i=0;
					 for(i;i<people.length;i++){
             var peopleaftersplit=JSON.stringify(people[i].weight).split('"');
						
					if(peopleaftersplit[1]=="35-44"){
						
					 arrpeoplecri.push(people[i])   ;
					}
						 }
					
        break;
					   
					 case 7:
						 
			 	var people= <?php echo json_encode($people); ?>;
					 var i=0;
					 for(i;i<people.length;i++){
             var peopleaftersplit=JSON.stringify(people[i].weight).split('"');
						
					if(peopleaftersplit[1]=="45-65"){
						
					 arrpeoplecri.push(people[i])   ;
					}
						 }
					
        break;
					
		 case 8:
						 var people= <?php echo json_encode($people); ?>;
					 var i=0;
					 for(i;i<people.length;i++){
						 var peopleaftersplit=JSON.stringify(people[i].weight).split('"');
						
					if(peopleaftersplit[1]=="65-150"){
						
					 arrpeoplecri.push(people[i])   ;
					}
						 }
					
        break;			
					
					
					
		 case 9:

						 var people= <?php echo json_encode($people); ?>;
					 var i=0;
					 for(i;i<people.length;i++){
						 var peopleaftersplit=JSON.stringify(people[i].nationality).split('"');
					if(peopleaftersplit[1]=="Asian"){
					 arrpeoplecri.push(people[i])   ;
					}
						 }
					
        break;			
		
		 case 10:
	 		var people= <?php echo json_encode($people); ?>;
					 var i=0;
					 for(i;i<people.length;i++){
						 var peopleaftersplit=JSON.stringify(people[i].nationality).split('"');
					if(peopleaftersplit[1]=="European"){
					 arrpeoplecri.push(people[i])   ;
					}
						 }
					
        break;		
									
		 case 11:

						 	var people= <?php echo json_encode($people); ?>;
					 var i=0;
					 for(i;i<people.length;i++){
						 var peopleaftersplit=JSON.stringify(people[i].nationality).split('"');
					if(peopleaftersplit[1]=="Africa"){
					 arrpeoplecri.push(people[i])   ;
					}
						 }
        break;			
					
					
		 case 12:
                       	var people= <?php echo json_encode($people); ?>;
					 var i=0;
					 for(i;i<people.length;i++){
						 var peopleaftersplit=JSON.stringify(people[i].skin).split('"');
					if(peopleaftersplit[1]=="white"){
					 arrpeoplecri.push(people[i])   ;
					}
						 }
					
        break;	
					
		 case 13:
	                  	var people= <?php echo json_encode($people); ?>;
					 var i=0;
					 for(i;i<people.length;i++){
						 var peopleaftersplit=JSON.stringify(people[i].skin).split('"');
					if(peopleaftersplit[1]=="tan"){
					 arrpeoplecri.push(people[i])   ;
					}
						 }
        break;			
					
		 case 14:
		
				var people= <?php echo json_encode($people); ?>;
					 var i=0;
					 for(i;i<people.length;i++){
						 var peopleaftersplit=JSON.stringify(people[i].skin).split('"');
					if(peopleaftersplit[1]=="black"){
					 arrpeoplecri.push(people[i])   ;
					}
						 }
					
        break;			
					
					
			case 15:
		
				var people= <?php echo json_encode($people); ?>;
					 var i=0;
					 for(i;i<people.length;i++){
						 var peopleaftersplit=JSON.stringify(people[i].age).split('"');
						   var sumage = parseInt(peopleaftersplit[1]);
					if(sumage<20){
					 arrpeoplecri.push(people[i])   ;
					}
						 }
					
        break;						 
						 
						 
				case 16:
		
				var people= <?php echo json_encode($people); ?>;
					 var i=0;
					 for(i;i<people.length;i++){
						 var peopleaftersplit=JSON.stringify(people[i].age).split('"');
						   var sumage = parseInt(peopleaftersplit[1]);
					if(sumage>20&&sumage<31){
					 arrpeoplecri.push(people[i])   ;
					}
						 }
					
        break;						 		 
						 
				case 17:
		
				var people= <?php echo json_encode($people); ?>;
					 var i=0;
					 for(i;i<people.length;i++){
						 var peopleaftersplit=JSON.stringify(people[i].age).split('"');
						   var sumage = parseInt(peopleaftersplit[1]);
					if(sumage>30&&sumage<41){
					 arrpeoplecri.push(people[i])   ;
					}
						 }
					
        break;						 		 		 
						 
					case 18:
		
				var people= <?php echo json_encode($people); ?>;
					 var i=0;
					 for(i;i<people.length;i++){
						 var peopleaftersplit=JSON.stringify(people[i].age).split('"');
						   var sumage = parseInt(peopleaftersplit[1]);
					if(sumage>40){
					 arrpeoplecri.push(people[i])   ;
					}
						 }
					
        break;						 		 
					 
				case 19:
		
				var people= <?php echo json_encode($people); ?>;
					 var i=0;
					 for(i;i<people.length;i++){
						 var peopleaftersplit=JSON.stringify(people[i].Status).split('"');
						  
					if(peopleaftersplit[1]=="divorce"){
					 arrpeoplecri.push(people[i])   ;
					}
						 }
					
        break;
						 case 20:
		
				var people= <?php echo json_encode($people); ?>;
					 var i=0;
					 for(i;i<people.length;i++){
						 var peopleaftersplit=JSON.stringify(people[i].Status).split('"');
					if(peopleaftersplit[1]=="widow"){
					 arrpeoplecri.push(people[i])   ;
					}
						 }
					
        break;
			
		default:
						
}
			
			pad(arrpeoplecri.length,"cri");
					
var cout = Math.floor(arrpeoplecri.length/9 )+1;

	           if(cout<1){
	
				   
				var j =0;
    var sum = 9;
	if(sum>arrpeoplecri.length){
	
		sum = (arrpeoplecri.length%9)+j;
	      
	   }	
				
var beginn=document.getElementById("photo");
		//form.reset();	
beginn.innerHTML = '';
	/////////////////////////////////////
		//var sub = <?php echo json_encode($pic) ?>; 
	for(j;j<sum;j++){ 
		//alert(jArray.length));
			//alert(JSON.stringify(jArray[j].pic));
		 var cripic=JSON.stringify(arrpeoplecri[j].Status).split('"');
		var crinick=JSON.stringify(arrpeoplecri[j].nick).split('"');
		var crihobbit=JSON.stringify(arrpeoplecri[j].hobbit).split('"');
			var criuser=JSON.stringify(arrpeoplecri[j].user).split('"');
var new_rowz = document.createElement("div");
			new_rowz.setAttribute("class", "w3-third" );
var picc = document.createElement("IMG");
		
		//alert(sub[0]);
			picc.setAttribute("src", "data:image/jpeg;base64,"+ cripic[1]);
	//	picc.setAttribute("src", "images/1500x900-IWR-wintersunset-temple-1500x1050.jpg");
			picc.setAttribute("style", "width:100%" );
			picc.setAttribute("onclick", "onClick(this)" );
			//picc.setAttribute("onclick", "ondblclick(this,"+criuser[1]+" )");
			picc.setAttribute("alt", "คุณ :"+crinick[1]+" hobbit :"+crihobbit[1]);
			document.body.appendChild(picc);
			new_rowz.appendChild(picc);
			picc.setAttribute("id", ""+criuser[1]);
			document.body.appendChild(new_rowz);
			beginn.appendChild(new_rowz);

	}		   
				   
				   
				   
}else{
	
	var j = 9*parseInt(Math.floor(cout-1 ));
    var sum = 9*(1+parseInt(Math.floor(cout-1 )));
	if(sum>arrpeoplecri.length){
	   
	  sum = (arrpeoplecri.length%9)+j;
	      
	   }	
				
var beginn=document.getElementById("photo");
		//form.reset();	
beginn.innerHTML = '';
	/////////////////////////////////////
		//var sub = <?php echo json_encode($pic) ?>; 
	for(j;j<sum;j++){ 
		//alert(jArray.length));
			//alert(JSON.stringify(jArray[j].pic));
		 var cripic=JSON.stringify(arrpeoplecri[j].pic).split('"');
		var crinick=JSON.stringify(arrpeoplecri[j].nick).split('"');
		var crihobbit=JSON.stringify(arrpeoplecri[j].hobbit).split('"');
		var criuser=JSON.stringify(arrpeoplecri[j].user).split('"');
var new_rowz = document.createElement("div");
			new_rowz.setAttribute("class", "w3-third" );
var picc = document.createElement("IMG");
		
		//alert(sub[0]);
			picc.setAttribute("src", "data:image/jpeg;base64,"+ cripic[1]);
	//	picc.setAttribute("src", "images/1500x900-IWR-wintersunset-temple-1500x1050.jpg");
			picc.setAttribute("style", "width:100%" );
			picc.setAttribute("onclick", "onClick(this)" );
		//picc.setAttribute("onclick", "ondblclick(this,"+criuser[1]+" )");
			picc.setAttribute("alt", "คุณ :"+crinick[1]+" hobbit :"+crihobbit[1]);
			document.body.appendChild(picc);
			new_rowz.appendChild(picc);
			picc.setAttribute("id", ""+criuser[1]);
			document.body.appendChild(new_rowz);
			beginn.appendChild(new_rowz);

	}		   
	
	
	
	
	
}
			
					
					
		}
			

			
	function Begin2() {
			var jArray= <?php echo json_encode($people); ?>;
	pad(jArray.length,"n");
	}
	
	
	function Begin(element) {
		
		var jArray= <?php echo json_encode($people); ?>;
			
			//alert(element);
		//alert(arr.length);
	var j = 9*parseInt(element);
    var sum = 9*(1+parseInt(element));
	if(sum>jArray.length){
	   
	  sum = (jArray.length%9)+j;
	      
	   }	
	
var beginn=document.getElementById("photo");
		//form.reset();	
beginn.innerHTML = '';
	/////////////////////////////////////
		
		
	for(j;j<sum;j++){ 
		var sub =JSON.stringify(jArray[j].pic).split('"');
		var Beginuser=JSON.stringify(jArray[j].user).split('"');
		//alert(jArray.length));
			//alert(JSON.stringify(jArray[j].pic));
var new_rowz = document.createElement("div");
			new_rowz.setAttribute("class", "w3-third" );
var picc = document.createElement("IMG");
		
		//alert(sub[0]);
			picc.setAttribute("src", "data:image/jpeg;base64,"+sub[1]);
	//	picc.setAttribute("src", "images/1500x900-IWR-wintersunset-temple-1500x1050.jpg");
			picc.setAttribute("style", "width:100%" );
			picc.setAttribute("onclick", "onClick(this)" );
		//picc.setAttribute("onclick", "ondblclick(this,"+Beginuser[1]+")");
			picc.setAttribute("alt", "คุณ :"+JSON.stringify(jArray[j].nick)+" hobbit :"+JSON.stringify(jArray[j].hobbit));
			document.body.appendChild(picc);
			new_rowz.appendChild(picc);
			picc.setAttribute("id", ""+Beginuser[1]);
			document.body.appendChild(new_rowz);
			beginn.appendChild(new_rowz);

	}
		//begin.appendChild(new_rowz);
	
	}
	
	////////////////////////////////////

	
	
	
function	pad(leght,namefun){

	
	var cout = Math.floor(leght/9 )+1;
	//alert(jArray.length);
	switch (namefun) {
			
  case "n":
			//alert(namefun);
	           if(cout<1){
	Begin(0);
}else{
		Begin(Math.floor(cout-1 ));
}
			
			
			
			var beginpad=document.getElementById("pad");
	beginpad.innerHTML = '';

var k =0;
	for(k;k<cout;k++){
		
	var new_rowpad = document.createElement("a");
	new_rowpad.setAttribute("class", "w3-bar-item w3-button w3-hover-black" );
	new_rowpad.setAttribute("id", ""+k );
		new_rowpad.setAttribute("onclick", "Begin("+k+")" );
		new_rowpad.innerHTML = ""+(k+1);
		document.body.appendChild(new_rowpad);
beginpad.appendChild(new_rowpad);
	}
	 break;
			
		 case "ast":
	           if(cout<1){
	             astt(0);
}else{
		astt(Math.floor(cout-1 ));
}
	
			var beginpad=document.getElementById("pad");
	beginpad.innerHTML = '';

var k =0;
	for(k;k<cout;k++){
		
	var new_rowpad = document.createElement("a");
	new_rowpad.setAttribute("class", "w3-bar-item w3-button w3-hover-black" );
	new_rowpad.setAttribute("id", ""+k );
		new_rowpad.setAttribute("onclick", "astt("+k+")" );
		new_rowpad.innerHTML = ""+(k+1);
		document.body.appendChild(new_rowpad);
beginpad.appendChild(new_rowpad);
	}
		
        break;
			
		 case "cri":
	         /*  if(cout<1){
	             crii(0);
}else{
		 crii(Math.floor(cout-1 ));
}
	*/
			
			var beginpad=document.getElementById("pad");
	beginpad.innerHTML = '';

var k =0;
	for(k;k<cout;k++){
		
	var new_rowpad = document.createElement("a");
	new_rowpad.setAttribute("class", "w3-bar-item w3-button w3-hover-black" );
	new_rowpad.setAttribute("id", ""+k );
		new_rowpad.setAttribute("onclick", "astt("+k+")" );
		new_rowpad.innerHTML = ""+(k+1);
		document.body.appendChild(new_rowpad);
beginpad.appendChild(new_rowpad);
	}
		
        break;
	
		default:
			
				   }
	

	

	//beginpad.appendChild(new_rowpad);
	
}
	function love() {
		  var love = document.getElementById("love");
	//alert(love.name);
     window.location.href='matching.php?id='+love.name;     
}
	
	
// Modal Image Gallery
function onClick(element) {
	
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
  var captionText = document.getElementById("caption");
  captionText.innerHTML = element.alt;
	 var love = document.getElementById("love");
	love.name=element.id;
}

</script>




</html>
