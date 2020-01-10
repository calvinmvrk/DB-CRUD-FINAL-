<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<form action = "delete.php" method="post">

		<label></label>
		ENTER LAST NAME OF AUTHOR TO DELETE FROM DATABASE<br>
		<input type="text" name="authorLast" id="authorLast">
	
		<br>
		<input type="submit" name="submission" value="submit">
	</form>

	<?php 

	$connection=mysqli_connect("localhost","root","","her");

	//EXECTUES SQL STATEMENT TO DELETE ENTRY
	$sql = "DELETE FROM Author WHERE authorLast = ?";
	if(isset($_POST['submission']))
	{
	
		if($stmt = $connection->prepare($sql))
		{
			$stmt->bind_param("s",$_POST['authorLast']);
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
	<A href="readAuthor.php">READ</A> - VIEW DATABASE
	<br>
	<A href="author.php">AUTHOR</A> - BACK TO AUTHOR
	<br>
	<A href="../index.php">HOME</A> - HOME

</body>
</html>