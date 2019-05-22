 <?php
	
	 /*  if (isset($_POST['submit'])){
		  exit('no access'!);
	  }
	   */
	  ini_set("error_reporting","E_ALL & ~E_NOTICE");
	  
	  if ($_POST['submit']){
			  //check whether password has 8 digitals.
			  if (strlen($_POST['password'])<8) {
				  $error="Please enter password with 8 characters.";}
		      // check whether password includes upper case from A to Z.
			  if (!preg_match('`[A-Z]`',$_POST['password'])){
				  $error.="Please include at least one capital letter in your password.";}
		       
	          if ($error) {
				 echo '<script language="javascript">'; echo'alert("'.$error.'");';echo'</script>';
				 header("Refresh:0.1;url=register.php");
				  }
	              else{
		         //link the database.
					try{
						$pdo=new pdo("mysql:host=mysql.dur.ac.uk; dbname=Xlqwn42_game","lqwn42","niced4ay");
					}
					catch(PDOException $e){
						echo "Database connection error !";
					}
				  //filter input variables.
				  $userName = filter_input(INPUT_POST, 'userName', FILTER_SANITIZE_STRING); 
				  $playerName = filter_input(INPUT_POST, 'playerName', FILTER_SANITIZE_STRING);
				  $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
			      $salt= md5($userName);
                  $hashPassword= md5($salt .$password) ;
				
					// check whether userName is already exist in database.
				  $select="SELECT userName From User";
				  $queryOnly= $pdo->query($select);   
				     //$row= $queryOnly->fetch(PDO::FETCH_NUM);
				  
				  $repeatedUser=0;
				   foreach($queryOnly as $rowA)
				  {  
				     if($rowA[0]==$_POST['userName'])
				     {$repeatedUser=1;}
				  }

				  
				  if($repeatedUser==0){
				  //INSERT statement.
		             $insert = "INSERT INTO User(userName, playerName, password, authority) VALUES('$userName','$playerName','$hashPassword','player')";
				     //insert into database. 
                     $result= $pdo->exec($insert);				  
				     if ($result==0){
                       echo "<script>alert('Fail! Please contact administrator or try again.')</script>";
					   header("Refresh:0.1;url=register.php");
					   die();
				     }
				     else{
				       echo "<script>alert('success! Now you can log in.')</script>";
				       header("Refresh:0.1;url=login.php"); 
				       die();
		             }
				  }
				  else{
					   echo "<script>alert('User name already exist please try another one.')</script>";
				       header("Refresh:0.1;url=register.php");
					  ;}
			
	        }
       }
  
    
     ?>
			 