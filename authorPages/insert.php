<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<form action = "insert.php" method="post">

		<label></label>
		Author Number<br>
		<input type="number" name="authorNum" id="authorNum">
		<br>
		Last Name<br>
		<input type="text" name="authorLast" id="authorLast">
		<br>
		First Name<br>
		<input type="text" name="authorFirst" id="authorFirst">
		<br>
		<input type="submit" name ="submission" value="Submit">
	</form>

	<?php 

	// SQL STATEMENT  & CONNECTION ESTABLISHMENT
	$connection=mysqli_connect("localhost","root","","her");

	$sql = "INSERT INTO Author(authorNum,authorLast,authorFirst)
	VALUES(?, ?, ?)";
	
	// EXECUTES STATMENT ONLY WHEN INFORMATION IS SUBMITTED
	if(isset($_POST['submission']))
	{
		//PREPARED STATEMENT
		if($stmt = $connection->prepare($sql))
		{
			$stmt->bind_param("iss",$_POST['authorNum'],$_POST['authorLast'],$_POST['authorFirst']);
			//$stmt->execute();
			

			if($stmt->execute())
			{	
				echo "<br>";
				echo "SUCCESS";
				echo "<br>";
			}

			else
			{
				//echo "ERROR $sql. " . $connection->error;
			}

		}
	
	}

 ?>
<br>
-------------------------------------------------
<br>
<A href="readAuthor.php">VIEW AUTHOR DATABASE</A> - VIEW DATABASE
<br>
<A href="author.php">AUTHOR PAGE</A> - AUTHOR 
<br>
<A href="../index.php">HOME</A> - HOME

</body>
</html>