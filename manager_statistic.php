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

            <h3>See other statistics</h3>	 
			
			<form method="post" id="fstatistic"  action="manager_statistic_action.php">
			 <p>Please choose one statistic type:</p>
		     <input type="radio" name="statistic" id="memberP" value="memberP">
             <label for="memberP"> member won-played percentage </label> 
			 <br>
			 
		     <input type="radio" name="statistic" id="matchP" value="matchP">
             <label for="matchP"> number of matches per day </label>
			 <br>
			 <div class="clickUser">
               <input type="submit" name="confirm" value="confirm"/><br>
			 </div>
         </form>
            
		<a href='manager.php' class='backToM'> Back to the previous page, Click Here </a>
		
		
     </div>
		 
    <?php include('footer.html');?>
  </body>
  
  
  
</html>