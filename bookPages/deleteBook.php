<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h2>DELETE FROM BOOK<br>
	-------------------------------------
	</h2>
	

	<form action = "deleteBook.php" method="post">

		<label></label>
		ENTER BOOKCODE OF BOOK TO DELETE FROM DATABASE<br>
		<input type="text" name="bookCode" id="bookCode">
	
		<br>
		<input type="submit" name="submission" value="submit">
	</form>

	<?php 

	$connection=mysqli_connect("localhost","root","","her");

	// DELETES BOOK FROM DATABASE
	$sql = "DELETE FROM Book WHERE bookCode = ?";
	if(isset($_POST['submission']))
	{
	
		if($stmt = $connection->prepare($sql))
		{
			$stmt->bind_param("s",$_POST['bookCode']);
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
	<A href="readBook.php">READ</A> - VIEW BOOK DATABASE
	<br>
	<A href="book.php">BOOK</A> - BACK TO BOOK
	<br>
	<A href="../index.php">HOME</A> - HOME

</body>
</html>