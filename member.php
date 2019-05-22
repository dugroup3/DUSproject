<!DOCTYPE html>

<html>

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
	    <h2>Member page</h2>
	    <div class="information">   
             <form method="post" onsubmit="return checkOption();" action="member_action.php">
				<label for="option"> Dear member, please select what you want to know :</label> 
				</br></br>
  				<select name="userOption" size="1"  id="option">
				    <option value="0" selected="selected">-Choose-</option>
                    <option value="gameList">All the games</option>
					<option value="gamePlayed">Games played by me</option>
                    <option value="gameResult"> My match results</option>
                    <option value="gameRecord">My playmates and results</option>
				</select>
				<div class="clickUser">
			        <input type="submit" name="submit" value="search"/>
				</div>
			 </form> 
			
  		</div>
  			
   
	
	 <?php include('_linkDb.php');?>
	 
	 <?php include('_checkManager.php');?>
		 
      </div>
   
    <?php include('footer.html');?>
  </body>
  
  
  
</html>