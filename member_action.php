 <?php
	  //ini_set("error_reporting","E_ALL & ~E_NOTICE");
	  if ($_POST['submit']){
			try{
				$pdo=new pdo("mysql:host=mysql.dur.ac.uk; dbname=Xlqwn42_game","lqwn42","niced4ay");
			}
			catch(PDOException $e){
				 echo "Database connection error !";
				 die();
					}
			//check			 
			 if ($_POST['userOption']=="gameList") {
				   header("location:member_gameList.php");
				   die();
				  }
			//check
			if ($_POST['userOption']=="gamePlayed") {
				   header("location:member_gameplayed.php");
				   die();
				  }
		      // check
			 if ($_POST['userOption']=="gameResult") {
				  header("location:member_userResult.php");
				   die();
				  }
		      //check 
	         if ($_POST['userOption']=="gameRecord") {
				  header("location:member_playmate.php");
				   die();
				  }
				  
	         
       }
  
    
     ?>