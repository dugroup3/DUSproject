<?php
		
		$selectManager="SELECT authority FROM User WHERE userName='$userName'";
		$queryManager= $pdo->query($selectManager);   
		$rowManager= $queryManager->fetch(PDO::FETCH_NUM);
		if($rowManager[0]=='manager'){
			echo "Also, as the manager </br></br>";
			echo "<a href = 'manager.php' class='backToM'> Back to manager page, Click Here </a> </br></br>"
			;}
?>



