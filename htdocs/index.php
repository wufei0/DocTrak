<html>
	<title>e-LUEASP</title>
	<head>
		<link rel="stylesheet" media="screen" href="template_login.css" type="text/css" />
		
		<!-- SCRIPT FOR CLEAR !-->
		<script type="text/JavaScript"> 
		function clearlogin(){
			document.form1.username.value="";
			document.form1.password.value="";
		}
		</script>
	</head>
	
	<body>
	<div class="content">
		<div class="head-login">
			<tr>
				<td><img src="images/LUEASP_LOGO.png" alt="pglu logo" width="150px" height="150px" align="middle" class="textmiddle"><td>
			</tr>
		</div>
		
		<div class="login">
		<form name="form1" method="post" action="login.php">
			<table class="login" align="center" valign="middle">
				<tr>	
					<td><font style="font-weight:bold;">Username:</font><class="user"><input name="username" type="text" id="username" class="user"/></td>
				</tr>
				<tr>
					<td><font style="font-weight:bold;">Password:</font><class="pass"><input name="password" type="password" id="password" class="pass" onclick="clearlogin()"/></td>
				</tr>
			</table>
		</div>
		
		<div class="buttons" >
			<table align="center">
				<tr>
					<td><input type="checkbox" name="remember"><font style="calibri"; size="2px" color="#ffffff">Remember me on this computer? </font></td>
				</tr>
				<tr>
					<td><input type="submit" name="login" value="LOG IN"/></td>
				</tr>
			</table>
			
			<div id="error" align="center">
				<?php
					session_start();
					if($_SESSION['checkq']=='invalid')
					{ echo "Invalid Username or Password";}
					$_SESSION['checkq']='clear'
				?>
			</div>
			
		</div>
		
		<div class="footer">
			<p>Copyright &#169; 2014 e-LUEASP | Management Information System Office | Provincial Government of La Union</p>
		</div>
	</div>	
	</body>
</html>
