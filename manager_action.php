 <?php
	  //ini_set("error_reporting","E_ALL & ~E_NOTICE");
	 
	  if ($_POST['submit']){ 
	       //check connection
			try{
				$pdo=new pdo("mysql:host=mysql.dur.ac.uk; dbname=Xlqwn42_game","lqwn42","niced4ay");
			}
			catch(PDOException $e){
				 echo "Database connection error !";
				 die();
					}
			 
			 if ($_POST['managerOption']=="1") {
				   header("location:member.php");
				   die();
				  }
				  
			 if ($_POST['managerOption']=="2") {
				   header("location:manager_listsNmodify.php");
				   die();
				  }
		  
			 if ($_POST['managerOption']=="3") {
				  header("location:manager_leaderboard.php");
				   die();
				  }
		       
	         if ($_POST['managerOption']=="4") {
				  header("location:manager_statistic.php");
				   die();
				  }
				  
			if ($_POST['managerOption']=="5") {
				   header("location:manager_addGame.php");
				   die();
				  }
	         
       }
  
    
     ?>