<!DOCTYPE html>

<html  lang=”en”>

  <head>
	 <meta charset="utf-8"/>
     <meta name="viewport" content="width=device-width, initial-scale=1"/>
	 <title> Oh! Board Game </title>
	 <link rel ="stylesheet" type ="text/css" href ="gameStyle.css">
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	  <script type="text/javascript" src="checkInput.js"></script> 
	  
	 
  </head>
 
  <body>
     <?php include('header.html');?>
     
	 <div id="content">    
         <h3>See lists and modify match information</h3>
		 <div class="filter">   
             <form method="post" id="fgame"   action="manager_listsNmodify_action.php">
				<p> Dear manager, please choose what you want to do :</p> 
			    <input type="radio" name="choose" id="viewMember" value="member">
				<label for="viewMember">view the list of all members</label>	
				</br>
				<input type="radio" name="choose" id="viewMatch" value="match" />
				<label for="viewMatch"> view the list of all matches</label>
                </br>
                <input type="radio" name="choose" id="viewRecord" value="result" />
				<label for="viewRecord"> view the list of all matches results</label>
                </br>	
                <input type="radio" name="choose" id="modifyMatch" value="modifyMatch" />
				<label for="modifyMatch"> modify matches</label>
                </br>								
				<div class="clickUser">
			       <input type="submit" name="submit"  value="confirm"/>
				</div>
			 </form> 
		</div>
		<a href='manager.php' class='backToM'> Back to the previous page, Click Here </a>
		
     </div>
		 
    
  <?php include('footer.html');?>
  </body>
  
  
  
</html>