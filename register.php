<!DOCTYPE html>

<html  lang=”en”>

  <head>
	 <meta charset="utf-8"/>
     <meta name="viewport" content="width=device-width, initial-scale=1"/>
	 <title> Oh! Board Game </title>
	 <link rel ="stylesheet" type ="text/css" href ="gameStyle.css">
	 <script type="text/javascript" src="checkInput.js"></script>  
  </head>
 
  <body>
      <?php include('header.html');?>
     
	 <div id="content">    
                <form method="post" id="registerNlogin" name="register" onsubmit="return check();" action="register_action.php">
  					<div >
  						<label for="femail" class="labelHint"> User Name: </label> 
						<input type="email" name="userName" id="femail" placeholder="email@address.com" />	
  					</div>
					</br>
					<div>
  						<label for="fname" class="labelHint"> Player Name: </label> 
						<input type="text" name="playerName" id="fname" maxlength="16" placeholder="player name" />	
  					</div>
					</br>
  					<div >  
					    <label for="fpassword" class="labelHint"> Password: </label> 
  						<input type="password" name="password" id="fpassword" maxlength="8" placeholder="8 characters contain capital letter(s)"/>
  					</div>
					<div class="click">
  					<input type="submit" name="submit" value="Register" >
  					</div>
  				</form>
				
			    <div class="goLogin">
  					 <a href = "login.php"> Already registered? Click here to login.</a>
  				</div>
     </div>
		 
  <?php include('footer.html');?>
	  
  </body>
 
</html>