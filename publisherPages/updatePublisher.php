<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<form action ="updatePublisher.php" method="post">

		<label></label>
		ENTER PUBLISHER CODE OF COPY TO UPDATE IN DATABASE<br>
		<input type="text" name="searchPublisherCode" id="searchPublisherCode">
		<br>
		<br>	
		UPDATE BELOW<br>
		-----------------------------------
		<br>

		PUBLISHER CODE
		<br>
		<input type="text" name="publisherCode" id="publisherCode">
		<br>
		PUBLISHER NAME
		<br>
		<input type="text" name="publisherName" id="publisherName">
		<br>
		CITY
		<br>
		<input type="text" name="city" id="city">
		<br>
		<br>
		<input type="submit" name ="submission" value="Submit">
	</form>


	<?php 

		$connection=mysqli_connect("localhost","root","","her");

		$sql = "UPDATE Publisher SET publisherCode = ?, publisherName = ?, city= ?
				WHERE publisherCode = ?";
		if(isset($_POST['submission']))
		{
				
			if($stmt = $connection->prepare($sql))
			{
				if(isset($_POST["submission"]))
				{
					$stmt->bind_param("ssss",$_POST['publisherCode'],$_POST['publisherName'],$_POST['city'],$_POST['searchPublisherCode']);
					$stmt->execute();
					echo "<br>";
					echo "RECORD UPDATE SUCCESSFUL";
					echo "<br>";
				}
				else
				{
					echo "ERROR";
				}
			}
		}

	?>
<br>	
-----------------------------------------
<br>
<A href="readPublisher.php">READ</A> - VIEW PUBLISHERDATABASE	
<br>
<A href="publisher.php">BACK TO PUBLISHER</A> - PUBLISHER
<br>
<A href="../index.php">HOME</A> - HOME

</body>
</html>