<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h2>COPY DATABASE<br>
	--------------------------</h2>
<?php
$connection=mysqli_connect("localhost","root","","her");
$sql="SELECT bookCode, branchNum, copyNum, quality, price FROM Copy";

echo "<table border='1'>";
echo "<tr><td>BOOK CODE</td><td>BRANCH NUMBER</td><td>COPY NUMBER</td><td>QUALITY</td><td>PRICE</td></tr>";

	$results=mysqli_query($connection,$sql);
	$resCheck = mysqli_num_rows($results);

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
	<A href="insertCopy.php">INSERT</A> -  ADD BOOK TO DATABASE
	<br>
	<br>
	<A href="deleteCopy.php">DELETE</A> - DELETE BOOK FROM DATABASE
	<br>
	<br>
	<A href="updateCopy.php">UPDATE</A> - UPDATE BOOK FROM DATABASE
	<br>
---------------------------------------------------------
</body>
<br>
<A href="copy.php">BACK TO BOOK</A> - BOOK
<br>
<A href="../index.php">HOME</A> - HOME