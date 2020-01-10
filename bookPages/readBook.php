<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h2>BOOK DATABASE</h2>
<?php
//ESTABLISHES PREPARED STATEMENT AND CONNECTION
$connection=mysqli_connect("localhost","root","","her");
$sql="SELECT bookCode, title, publisherCode, type, paperback FROM Book";

echo "<table border='1'>";
echo "<tr><td>BOOK CODE</td><td>BOOK TITLE</td><td>PUBLISHER CODE</td><td>TYPE</td><td>	PAPERBACK</td></tr>";

	$results=mysqli_query($connection,$sql);
	$resCheck = mysqli_num_rows($results);

	//PRINTS RESULTS TO TABLE
	if($resCheck > 0)
	{
		while($row=mysqli_fetch_array($results))
		{
			echo "<tr><td>" . $row[0]." </td><td> ".$row[1]. "</td><td> ".$row[2]. "</td><td> ".$row[3]. "</td><td> ".$row[4]. "</td></tr>";
		}
	}

echo "</table>";
?>

<br>
---------------------------------------------------------
</body>
</html>
	<br>
	<A href="insertBook.php">INSERT</A> -  ADD BOOK TO DATABASE
	<br>
	<br>
	<A href="deleteBook.php">DELETE</A> - DELETE BOOK FROM DATABASE
	<br>
	<br>
	<A href="updateBook.php">UPDATE</A> - UPDATE BOOK FROM DATABASE
	<br>
---------------------------------------------------------
</body>
<br>
<A href="book.php">BACK TO BOOK</A> - BOOK
<br>
<A href="../index.php">HOME</A> - HOME