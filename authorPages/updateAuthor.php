<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<form action = "updateAuthor.php" method="post">

		<label></label>
		SELECT LAST NAME OF AUTHOR RECORD TO UPDATE<br>
		<input type="text" name="authorLastEdit" id="authorLastEdit">
		<br>
		<br>	
		UPDATE BELOW<br>

		Author Number<br>
		<input type="number" name="authorNum" id="authorNum">
		<br>
		Last Name<br>
		<input type="text" name="authorLast" id="authorLast">
		<br>
		First Name<br>
		<input type="text" name="authorFirst" id="authorFirst">
		<br>
		<input type="submit" name="submission" value="Submit">
	</form>


	<?php 

		$connection=mysqli_connect("localhost","root","","her");

		$sql = "UPDATE Author SET authorNum = ?, authorLast = ?, authorFirst= ?		WHERE authorLast = ?";
		if(isset($_POST['submission']))
		{
			if($stmt = $connection->prepare($sql))
			{
				if(isset($_POST["submission"]))
				{
					$stmt->bind_param("isss",$_POST['authorNum'],$_POST['authorLast'],$_POST['authorFirst'],$_POST['authorLastEdit']);
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
<A href="readAuthor.php">READ</A> - VIEW DATABASE	
<br>
<A href="author.php">BACK TO AUTHOR</A> - AUTHOR
<br>
<A href="../index.php">HOME</A> - HOME

</body>
</html>