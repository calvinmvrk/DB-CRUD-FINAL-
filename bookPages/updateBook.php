<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<form action = "updateBook.php" method="post">

		<label></label>
		ENTER BOOKCODE OF BOOK TO UPDATE IN DATABASE<br>
		<input type="text" name="searchBookCode" id="searchBookCode">
		<br>
		<br>	
		UPDATE BELOW<br>
		-----------------------------------
		<br>

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

		$connection=mysqli_connect("localhost","root","","her");

		$sql = "UPDATE Book SET bookCode = ?, title = ?, publisherCode= ?, type= ?, paperback=?		
				WHERE bookCode = ?";
		if(isset($_POST['submission']))
		{		
			if($stmt = $connection->prepare($sql))
			{
				if(isset($_POST["submission"]))
				{
					$stmt->bind_param("ssssss",$_POST['bookCode'],$_POST['title'],$_POST['publisherCode'],$_POST['type'],$_POST['paperback'],$_POST['searchBookCode']);
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
<A href="readBook.php">READ</A> - VIEW BOOK DATABASE	
<br>
<A href="book.php">BACK TO AUTHOR</A> - AUTHOR
<br>
<A href="../index.php">HOME</A> - HOME

</body>
</html>