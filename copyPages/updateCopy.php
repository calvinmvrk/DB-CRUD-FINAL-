<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<form action = "updateCopy.php" method="post">

		<label></label>
		ENTER BOOKCODE OF COPY TO UPDATE IN DATABASE<br>
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
		BRANCH NUMBER
		<br>
		<input type="number" name="branchNum" id="branchNum">
		<br>
		COPY NUMBER 
		<br>
		<input type="number" name="copyNum" id="copyNum">
		<br>
		QUALITY
		<br>
		<input type="text" name="quality" id="quality">
		<br>
		PRICE
		<br>
		<input type="number" name="price" id="price">
		<br>
		<input type="submit" name ="submission" value="Submit">
	</form>


	<?php 

		$connection=mysqli_connect("localhost","root","","her");

		$sql = "UPDATE Copy SET bookCode = ?, branchNum = ?, copyNum= ?, quality= ?, price=? WHERE bookCode = ?";
		if(isset($_POST['submission']))
		{		
			if($stmt = $connection->prepare($sql))
			{
				if(isset($_POST["submission"]))
				{
					$stmt->bind_param("siisis",$_POST['bookCode'],$_POST['branchNum'],$_POST['copyNum'],$_POST['quality'],$_POST['price'],$_POST['searchBookCode']);
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
<A href="readCopy.php">READ</A> - VIEW COPY DATABASE	
<br>
<A href="copy.php">BACK TO COPY</A> - COPY
<br>
<A href="../index.php">HOME</A> - HOME

</body>
</html>