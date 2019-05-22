 <?php

      //ini_set("error_reporting","E_ALL & ~E_NOTICE");
	  
	  if ($_POST['submit']){
			  //check whether password has 8 digitals.
			 if (strlen($_POST['password'])<8) {
				  $error="Please enter password with 8 characters.";
				  }
		      // check whether password includes upper case from A to Z.
			  if (!preg_match('`[A-Z]`',$_POST['password'])){
				  $error.="Please include at least one capital letter in your password.";
				  }
	          if ($error) {
				  //echo INPUT Errors;
				  echo '<script language="javascript">'; echo'alert("'.$error.'");';echo'</script>';
						 header("Refresh:0.1;url=login.php");
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
					$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
			        $salt= md5($userName);
                    $hashPassword= md5($salt .$password) ;
					
	                //session.
					session_start();
                    $_SESSION["userName"] =$userName;
					$_SESSION["password"] =$hashPassword;

			
			         // SELECT statement.
		             $selectInformation="SELECT userName,password,authority FROM User WHERE (userName='$userName' AND password='$hashPassword')";
                     // fetch form database.  
					 $query= $pdo->query($selectInformation);   
					 $row= $query->fetch(PDO::FETCH_NUM);
					 $checkName=$row[0];
			         $checkPassword=$row[1];
					
				     //check whether a member.---maybe can be simplified for it has been checked in $selectInformation.
			         if($checkName==$userName&&$checkPassword==$hashPassword){
						 // check whether the manager.
						 $checkAuthority=$row[2];
						 if($checkAuthority=='manager'){
							 header("location:manager.php");
						 }
						 else{
                             header("location:member.php");
						 }
					 }
				     else{
					     echo "<script>alert('registration information cannot find')</script>";
						 header("Refresh:0.1;url=login.php");
						 die();
                        } 
				    } 
        }
 ?>