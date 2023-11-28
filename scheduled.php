<?php
$host="localhost";
$dbusername="root";
$dbpassword="";
$dbname="logging";
$conn=new mysqli($host,$dbusername,$dbpassword,$dbname);
$q="Good morning";
$a="INSERT INTO checking (msg) values('$q')";
$res=mysqli_query($conn,$a);
?>