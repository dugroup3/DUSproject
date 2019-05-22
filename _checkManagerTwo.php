 <?php
 
   // in case of user mistypes and enters.
		$selectManager="SELECT authority FROM User WHERE userName='$userName'";
		$queryManager= $pdo->query($selectManager);   
		$rowManager= $queryManager->fetch(PDO::FETCH_NUM);
			
			if($rowManager[0]!='manager'){
			   echo "<script>alert('Oops， How do you come to this page without manager authoriy???')</script>";
			   header("Refresh:0.1;url=login.php");
			   die();
			;}
			
     ?> 
    