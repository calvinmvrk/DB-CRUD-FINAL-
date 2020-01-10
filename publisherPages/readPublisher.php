<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h2>PUBLISHER DATABASE<br>
	--------------------------</h2>
<?php
$connection=mysqli_connect("localhost","root","","her");
$sql="SELECT publisherCode, publisherName, city FROM Publisher";

echo "<table border='1'>";
echo "<tr><td>PUBLISHER CODE</td><td>PUBLISHER NAME</td><td>CITY</td></tr>";

	$results=mysqli_query($connection,$sql);
	$resCheck = mysqli_num_rows($results);

	if($resCheck > 0)
	{
		while($row=mysqli_fetch_array($results))
		{
			echo "<tr><td>" . $row[0]." </td><td> ".$row[1]. "</td><td> ".$row[2]."</td></tr>";
		}
	}

echo "</table>";
?>

<br>
---------------------------------------------------------
</body>
</html>
	<br>
	<A href="insertPublisher.php">INSERT</A> -  ADD PUBLISHER TO DATABASE
	<br>
	<br>
	<A href="deletePublisher.php">DELETE</A> - DELETE PUBLISHER FROM DATABASE
	<br>
	<br>
	<A href="updatePublisher.php">UPDATE</A> - UPDATE PUBLISHER DATABASE
	<br>
---------------------------------------------------------
</body>
<br>
<A href="publisher.php">BACK TO PUBLISHER</A> - PUBLISHER
<br>
<A href="../index.php">HOME</A> - HOME