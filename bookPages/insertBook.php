<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h2>INSERT BOOK INTO DATABASE<br>
--------------------------------
</h2>
	<form action = "insertBook.php" method="post">

		<label></label>
		BOOK CODE
		<br>
		<input type="text" name="bookCode" id="bookCode">
		<br>
		TITLE
		<br>
		<input type="text" name="title" id="title">
		<br>
		PUBLISHER CODE
		<br>
		<input type="text" name="publisherCode" id="publisherCode">
		<br>
		TYPE
		<br>
		<input type="text" name="type" id="type">
		<br>
		PAPERBACK
		<br>
		<input type="text" name="paperback" id="paperback">
		<br>
		<input type="submit" name ="submission" value="Submit">
	</form>

	<?php 
	// PREPARES STATEMNT
	$connection=mysqli_connect("localhost","root","","her");


	$sql = "INSERT INTO Book(bookCode,title,publisherCode,type,paperback)
	VALUES(?, ?, ?, ?, ?)";
	
	//EXECUTES PREPARED STATEMENT
	if(isset($_POST['submission']))
	{
		if($stmt = $connection->prepare($sql))
		{
			$stmt->bind_param("sssss",$_POST['bookCode'],$_POST['title'],$_POST['publisherCode'],$_POST['type'],$_POST['paperback']);
			

			if($stmt->execute())
			{	
				echo "<br>";
				echo "BOOK ADDED SUCCESSLLY";
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
<A href="readBook.php">VIEW BOOK DATABASE</A> - VIEW DATABASE
<br>
<A href="book.php">BOOK PAGE</A> - BOOK 
<br>
<A href="../index.php">HOME</A> - HOME

</body>
</html>