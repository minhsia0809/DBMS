<!DOCTYPE html>
<html>
<head>
	<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf8">

<title>index.php</title>

</head>



<body bgcolor="#a3a3a3">

<center>


<form action="Customer_search_check.php" method="POST">

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
	  FROM Customer,Tend_like_Group, Tend_like_Artist
	  Where Customer.Name = Tend_like_Group.Cname
	  AND Customer.Name = Tend_like_Artist.CName ";
$result=mysqli_query($con,$SQL);
$row=mysqli_fetch_assoc($result);

echo "<center>";

echo "<table border = 0>";
echo "<tr font-size:18px;><td>Name</td><td>Address</td><td>Total_amount</td><td>Tend_like_Group</td></td>";
echo "<td>Tend_like_Artist</td></tr>";

while ($row=mysqli_fetch_assoc($result))
{
	if($row['Address']==$info || $row['Total_amount']==$info || $row['GName']==$info || $row['AName']==$info)
	{
		echo "<tr><td>".$row["Name"]."</td>";
		echo "<td>".$row["Address"]."</td>";
		echo "<td>".$row["Total_amount"]."</td>";
		echo "<td>".$row["GName"]."</td>";
		echo "<td>".$row["AName"]."</td></tr>";
		
	}
	if($row['Name']==$info)
	{
		echo "<tr><td>".$row["Name"]."</td>";
		echo "<td>".$row["Address"]."</td>";
		echo "<td>".$row["Total_amount"]."</td>";
		echo "<td>".$row["GName"]."</td>";
		echo "<td>".$row["AName"]."</td></tr>";
		break;
		
	}	
}

echo "</table>";

echo "</center>";

?>
</br>
<input type="button" value="Back" 
	   style="width:80px;height:30px;font-size:16px;background-color:#c6d8ec;font-family:monospace;border-color:#f3f3f3;" 
	   onclick="javascript:location.href='Customer.php'">

</center>
</body>
</html>