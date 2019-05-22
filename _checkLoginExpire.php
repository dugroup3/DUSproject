
<?php
		$selectName="SELECT playerName FROM User Where userName='$_SESSION[userName]'";
		$queryName= $pdo->query($selectName);
		$rowName= $queryName->fetch(PDO::FETCH_NUM);
		
		//validate login information
		if($rowName[0]==""){
		    echo "<script>alert('Expire: Please re-login.')</script>";
			header("Refresh:0.1;url=login.php"); 
			die();
		}
		$ture=1;
		?>
		

	
	