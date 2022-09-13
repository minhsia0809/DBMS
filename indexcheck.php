<?php
session_start();

$info=$_POST["info"];

$con=mysqli_connect('140.127.220.233','a1083301','a1083301Checkpoint7','a1083301');
$SQL="SELECT * 
	  FROM Artist ,Artwork ,Group ,Customer, Classified_into, Tend_like_Group, Tend_like_Artist
	  WHERE Artist.Name = Artwork.Artist_name
	  AND  Artwork.Title = Classified_into.Atitle
	  AND Group_Artwork.Name = Classified_into.GName
	  AND Name='$info'";
$result=mysqli_query($con,$SQL);
$row=mysqli_fetch_assoc($result);

if($info==$row["Name"] || $info==$row["Birthplace"] || $info==$row["Age"] || $info==$row["Art_style"])
{
	if($row["type"]==1)
	{
		$_SESSION["login"]="Yes";
		header("location:Admin.php");
	}
	else
	{
		$_SESSION["login"]="Yes";
		header("location:Apply.php");
	}
}
	else
	{
		$_SESSION["login"]="No";
		echo "登入失敗!!!本頁面會在3秒後自動跳轉至登入頁面</br>";
		echo "<button onclick='javascript:location.href=\"index.php\"'>返回登入頁面</buttom>";

		header("refresh:3; url='index.php'");
	}

?>