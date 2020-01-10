<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h2>DELETE FROM PUBLISHER<br>
	-------------------------------------
	</h2>
	

	<form action = "deletePublisher.php" method="post">

		<label></label>
		ENTER PUBLISHER CODE OF COPY TO DELETE FROM DATABASE<br>
		<input type="text" name="publisherCode" id="publisherCode">

	
		<br>
		<input type="submit" name="submission" value="submit">
	</form>

	<?php 

	$connection=mysqli_connect("localhost","root","","her");

	$sql = "DELETE FROM Publisher WHERE publisherCode = ?";
	if(isset($_POST['submission']))
	{
	
		if($stmt = $connection->prepare($sql))
		{
			$stmt->bind_param("s",$_POST['publisherCode']);
			$stmt->execute();

			
			if($stmt->error)
			{

				echo "DELETION ERROR";
			}

			else
			{	echo "<br>";
				echo "DELETION SUCCESSFUL";
				echo "<br>";
			}
			
		}
	}
	?>
	<br>
	------------------------------------------
	<br>
	<A href="readPublisher.php">READ</A> - VIEW PUBLISHER DATABASE
	<br>
	<A href="publisher.php">BOOK</A> - BACK TO PUBLISHER
	<br>
	<A href="../index.php">HOME</A> - HOME

</body>
</html>