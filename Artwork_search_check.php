<!DOCTYPE html>
<html>
<head>
	<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf8">

<title>index.php</title>

</head>



<body bgcolor="#a3a3a3">

<center>


<form action="Artwork_search_check.php" method="POST">

<div style="background-color:white; width:100%;height:45px; font-size:24px ;font-family:monospace; ">

Please input what you want to search：
<input type="text" name="info">
<input type="submit" value="search" style="background-color:#c6d8ec; border-color:#f3f3f3; ">
<input type="reset" value="delete"  style="background-color:#c6d8ec; border-color:#f3f3f3;"><br/>

</div>


<br/>
<table border = 0>
<th>
<input type="button" value="Artist" 
	   style="width:120px;height:40px;font-size:20px;background-color:#c6d8ec;font-family:monospace;border-color:#f3f3f3;" 
	   onclick="javascript:location.href='index.php'">

<input type="button" value="Artwork" 
	   style="width:120px;height:40px;font-size:20px;background-color:#d9e5f2;font-family:monospace;
	   border-color:#f3f3f3;"
	   onclick="javascript:location.href='Artwork.php'">

<input type="button" value="Group" 
	   style="width:120px;height:40px;font-size:20px;background-color:#FFF0D4;font-family:monospace;
	   border-color:#f3f3f3;" 
	   onclick="javascript:location.href='Group.php'">

<input type="button" value="Customer" 
	   style="width:120px;height:40px;font-size:20px;background-color:#fdf1d8;font-family:monospace;
	   border-color:#f3f3f3;" 
	   onclick="javascript:location.href='Customer.php'">
</th>
</table>
<br/><br/>
</form>


<style type = "text/css">
table{
  font-size:18px; 
  width:50%;
  text-align:center;
}
tr:nth-of-type(even){
	background-color: #f3f3f3;
}
tr:nth-of-type(odd){
	background-color: #ddd;
}
</style>

<?php
session_start();

$info=$_POST["info"];

$con=mysqli_connect('140.127.220.233','a1083301','a1083301Checkpoint7','a1083301');
$SQL="SELECT * 
	  FROM Artist,Artwork
	  WHERE Artist.Name = Artwork.Artist_name ";
$result=mysqli_query($con,$SQL);
$row=mysqli_fetch_assoc($result);

echo "<center>";

echo "<table border = 0>";
echo "<tr font-size:18px;><td>Title</td><td>Year</td><td>Price</td><td>Type</td></td>";
echo "<td>Artist_name</td></tr>";

while ($row=mysqli_fetch_assoc($result))
{

	if($row['Title']==$info)
	{
		echo "<tr><td>".$row["Title"]."</td>";
		echo "<td>".$row["Year"]."</td>";
		echo "<td>".$row["Price"]."</td>";
		echo "<td>".$row["Type"]."</td>";
		echo "<td>".$row["Artist_name"]."</td></tr>";
		break;
	}

	if($row['Year']==$info || $row['Price']==$info || $row['Type']==$info || $row['Artist_name']==$info)
	{
		echo "<tr><td>".$row["Title"]."</td>";
		echo "<td>".$row["Year"]."</td>";
		echo "<td>".$row["Price"]."</td>";
		echo "<td>".$row["Type"]."</td>";
		echo "<td>".$row["Artist_name"]."</td></tr>";
		
	}

	
}

echo "</table>";

echo "</center>";

?>
</br>
<input type="button" value="Back" 
	   style="width:80px;height:30px;font-size:16px;background-color:#c6d8ec;font-family:monospace;border-color:#f3f3f3;" 
	   onclick="javascript:location.href='Artwork.php'">

</center>
</body>
</html>