<?php  
	$searchBook="";
?>
<!DOCTYPE html>
<html>
<head>
	<title>
		

	</title>
</head>
<body>

	<!---TEXT BAR FOR SEARCH-->
	<h2>SEARCH DATABASE</h2>
	<form action = "search.php" method="post">

		<label></label>
		SEARCH BY TITLE<br>
		<input type="text" name="searchTitle" id="searchTitle">
		<br>
		
		<input type="submit" name="submission" value="Submit">
	</form>
	

	<br>

	<?php 
	//IF SUBMIT BUTTON PPRESSED, SEARCH WILL BE EXECUTED
	if(isset($_POST['submission']))
	{

		echo "-----------------------------------------------------------";

		// SETS UP DATABASE CONNECTION
		$connection=mysqli_connect("localhost","root","","her");
		$searchBook=$_POST['searchTitle'];
		

		//SQL STATEMENT
		$sql="SELECT DISTINCT
	    title as Book_Title,
	    CONCAT(authorFirst, ' ', authorLast) AS Author_Name,
	    p.publisherName,
	    b.branchName,
	    COUNT(OnHand)as Available_Units
		FROM
		    (
		        (
		            (
		                Wrote
		            INNER JOIN Inventory ON Inventory.bookCode = Wrote.bookCode
		            )
		        INNER JOIN Book ON wrote.bookCode = book.bookCode
		        )
		    INNER JOIN Author ON wrote.authorNum = Author.authorNum
		    ),
		    branch AS b,
		    Publisher AS p
		WHERE
		    title LIKE '%$searchBook%' AND b.branchNum = Inventory.BranchNum AND p.publisherCode = Book.publisherCode
		GROUP BY
		    title
			";

		echo "<table border='1'>";
		echo "<tr><td>BOOK TITLE</td><td>AUTHOR NAME</td><td>PUBLISHER NAME</td><td>BRANCHNAME</td><td>INVENTORY ON HAND</td></tr>";

		$results=mysqli_query($connection,$sql);
		$resCheck = mysqli_num_rows($results);

		// PRINTS RESULTS
		if($resCheck > 0)
		{
			while($row=mysqli_fetch_array($results))
			{
				echo "<tr><td>" .$row[0]." </td><td> ".$row[1]." </td><td> ".$row[2]." </td><td> ".$row[3]." </td><td> ".$row[4]. "</td></tr>";
			}
		}
		echo "</table>";
		echo "<br>";
		echo "SEARCH RESULTS - TITLES CONTAINING: '$searchBook'";
		echo "<br>";
		echo "-----------------------------------------------------------";
	}
		

	?>
	
	<br>
	<br>
	<a href="index.php">HOME</a> - NAVIGATE BACK TO HOME PAGE

</body>
</html>