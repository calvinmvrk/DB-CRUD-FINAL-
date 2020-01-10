<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h2>INSERT COPY INTO DATABASE<br>
--------------------------------
</h2>
	<form action = "insertCopy.php" method="post">

		<label></label>
		BOOK CODE
		<br>
		<input type="text" name="bookCode" id="bookCode">
		<br>
		BRANCH NUMBER
		<br>
		<input type="number" name="title" id="title">
		<br>
		COPY NUMBER
		<br>
		<input type="number" name="publisherCode" id="publisherCode">
		<br>
		QUALITY
		<br>
		<input type="text" name="type" id="type">
		<br>
		PRICE
		<br>
		<input type="number" name="paperback" id="paperback">
		<br>
		<input type="submit" name ="submission" value="Submit">
	</form>

	<?php 

	$connection=mysqli_connect("localhost","root","","her");

	$sql = "INSERT INTO Copy(bookCode,branchNum,copyNum,quality,price)
	VALUES(?, ?, ?, ?, ?)";
	
	if(isset($_POST['submission']))
	{
		if($stmt = $connection->prepare($sql))
		{
			$stmt->bind_param("sddsd",$_POST['bookCode'],$_POST['title'],$_POST['publisherCode'],$_POST['type'],$_POST['paperback']);		

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
<A href="readCopy.php">VIEW BOOK DATABASE</A> - VIEW DATABASE
<br>
<A href="copy.php">BOOK PAGE</A> - BOOK 
<br>
<A href="../index.php">HOME</A> - HOME

</body>
</html>