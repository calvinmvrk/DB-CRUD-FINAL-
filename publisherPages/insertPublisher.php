<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h2>INSERT PUBLISHER INTO DATABASE<br>
--------------------------------
</h2>
	<form action = "insertPublisher.php" method="post">

		<label></label>
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
		<input type="submit" name ="submission" value="Submit">
	</form>

	<?php 

	$connection=mysqli_connect("localhost","root","","her");

	$sql = "INSERT INTO Publisher(publisherCode,publisherName,city)
	VALUES(?, ?, ?)";
	
	if(isset($_POST['submission']))
	{
		if($stmt = $connection->prepare($sql))
		{
			$stmt->bind_param("sss",$_POST['publisherCode'],$_POST['publisherName'],$_POST['city']);		

			if($stmt->execute())
			{	
				echo "<br>";
				echo "PUBLISHER ADDED SUCCESSFULLY";
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
-------------------------------------------------
<br>
<A href="readPublisher.php">VIEW PUBLISHER DATABASE</A> - VIEW DATABASE
<br>
<A href="publisher.php">PUBLISHER PAGE</A> - PUBLISHER 
<br>
<A href="../index.php">HOME</A> - HOME

</body>
</html>