<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h2>AUTHOR DATABASE</h2>
<?php
//include "database.php";
$connection=mysqli_connect("localhost","root","","her");
$sql="SELECT CONCAT (authorFirst,'  ', authorLast) as Author_name, authorNum FROM Author";

echo "<table border='1'>";
echo "<tr><td>AUTHOR NAME</td><td>AUTHOR NUMBER</td></tr>";

	$results=mysqli_query($connection,$sql);
	$resCheck = mysqli_num_rows($results);

	if($resCheck > 0)
	{
		while($row=mysqli_fetch_array($results))
		{
			echo "<tr><td>" . $row[0]." </td><td> ".$row[1]. "</td></tr>";
		}
	}

echo "</table>";
?>

<br>
---------------------------------------------------------
</body>
</html>
<br>
	<A href="insert.php">INSERT</A> -  ADD TO AUTHOR DATABASE
	<br>
	<br>
	<A href="delete.php">DELETE</A> - DELETE AUTHOR FROM DATABASE
	<br>
	<br>
	<A href="updateAuthor.php">UPDATE</A> - UPDATE RECORD FROM DATABASE
	<br>
---------------------------------------------------------
</body>
<br>
<A href="author.php">BACK TO AUTHOR</A> - AUTHOR
<br>
<A href="../index.php">HOME</A> - HOME