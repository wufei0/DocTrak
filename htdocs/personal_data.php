<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
	<head>
		<title>eLUEASP PERSONAL DATA</title>
	

		<link href="template_personal.css" rel="stylesheet" type="text/css" media="all" >
		<script type="text/javascript" src="jsDatePick.min.1.3.js"></script>
		
	
			<!-- SCRIPT FOR CLEAR!-->
			<script type="text/javascript">
			function cleartext(){
			var e = document.getElementsByTagName("input");
			//Loop through all input
			for(i = 0; i < e.length; i++){
			e[i].value = "";}
				}
		
			<!-- SCRIPT FOR DATE PICKER!-->	
			window.onload = function(){
			new JsDatePick({
				useMode:2,
				target:"inputField",
				dateFormat:"%d-%M-%Y"});
			};
			
			<!-- VALIDATE NUMERIC-->		
			function allnum()  
			{  
				var age=document.personalinfo.age.value;
				var houseno=document.personalinfo.houseno.value;
				if(isNaN(age) || isNaN(houseno)){
					alert("Numeric value only!");}
			}   
			</script>
	
	</head>

<body>

<?php include "header.php";?>

<div class="main">
	
	<div class="postleft"> <!-- picture -->
	
				<div class="picture">
					<center>
					<img src="images/users.jpg" width="200" height="200" />
					</center>
					
				<div class="listview">
					 <table align="center" width="350px" cellpadding="0" cellspacing="0" border="1">  
					 <tr>
						<td bgcolor="#919396" width="200px" align="center">ID No.</td>
						<td bgcolor="#919396" width="700px" align="center">Name of Scholar</td>
					</tr>
					 <tr>
						<td align="left">81057</td>
						<td align="left">Laigo, Clarence, Angelo </td>
					</tr>
					<tr>
						<td align="left">84011</td>
						<td align="left">Noto, Jamie Rose, Aquino </td>
					</tr>
					<tr>
						<td align="left">82088</td>
						<td align="left">Oreta, Jonalyn, Geda </td>
					</tr>
					</table>
				</div>				
	</div>
							
	</div>
	

<!-- postleft-->
	
	<div class="postright"> <!-- postright -->
	
		<div class="groupersonal">
		
			<div class="personal">
			<form name="personalinfo" method="post" action="info_addsave.php">
			
				<h2>I.  PERSONAL DATA</h2>
				<table>
					<tr>
						<td><b>Scholar Id:</b></td>				
					</tr>
					<tr>
						<td>Last Name :</td>	
						<td><input type="text" name="lname"><td>  
					</tr>
					<tr>
						<td>First Name :</td>	
						<td><input type="text" name="fname"></td>  
					</tr>
					<tr>
						<td>Middle Name :</td>	
						<td><input type="text" name="mname"></td>
					</tr>
				</table>
			</div>
			
				<div class="address">	
				
					
					<h3>Complete Address</h3>
					<table>
						<tr>
							<td>House No:</td>	
							<td class="houseno"><input type="text" name="houseno" onkeyup="allnum()";></td>  
						</tr>			
						<tr>
							<td>Street:</td>	
							<td><input type="text" name="street"></td>  
						</tr>
						
						<tr>
							<td>Barangay:</td>	
							<td><input type="text" name="barangay"></td>  
						</tr>
						
						<tr>
							<td>Municipality:</td>	
							<td><input type="text" name="municipality"></td>  
						</tr>
					</table>
				</div>	
				
				<div class="birth">	
					<table>
						<tr>
							<td>Contact No.:</td>	
							<td class="contact"><input type="text" name="contactno"></td>  
						</tr>
						<tr>
							<td>Age: </td>	
							<td class="aaa"><input type="text" name="age" id="age" onkeyup="allnum()"></td>
						</tr>	
										
							
						<tr>
							<td>Date of Birth: </td>			
							<td><input type="text" id="inputField" ></td> 		
									
						</tr> 
						<tr>
							<td>Place of Birth: </td>	
							<td><input type="text" name="pob"></td>  
						</tr>
						
						<tr>
							<td>Gender: </td>	
							<td>
								<form action="selectgender">
								<select id="sex" name="gender">
								<option value="male">Male</option>
								<option value="female">Female</option>
								</select>
								</form>
							</td> 							
						</tr>
						<tr>
							<td>Civil Status: </td>	
							<td>
								<form action="selectcs">
								<select id="cs" name="civilstatus">
								<option value="male">Single</option>
								<option value="Married">Married</option>
								<option value="Annulled">Annulled</option>
								<option value="Separated">Separated/Divorced</option>
								<option value="Widow">Widow/Widower</option>	
								</select>
								</form>
							</td>  
						</tr>
						<tr>
							<td>Religious Affiliation: </td>	
							<td><input type="text" name="religion"></td>  
						</tr>
					</table>
					</form>
				</div>
			
		</div>
	</div> <!-- postright -->



	<div class="tfclear"></div>
	
	<div class="buttons">
		<table align="center"> 	
			<tr>
			<td><input type="text" name="lname"> </td>  
			<td><button type="submit" name="search" value="Search"/>Search</td>  
			<td><button type="submit" name="edit" value="Edit"/>Edit</td> 
			<td><button type="submit" name="save" value="Save"/>Save</td> 
			<td><button type="submit" name="cancel" value="Cancel" onclick="cleartext()"/>Cancel</td> 
			</tr>
			</table>	
		</div>
	
	
	
	
</div>




<?php include "footer.php";?>

</table>
</body>
</html>