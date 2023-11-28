<?php
session_start();
$a=$_SESSION['name'];
$otp=filter_input(INPUT_POST,'otp');
$host="localhost";
$dbusername="root";
$dbpassword="";
$dbname="logging";
$conn=new mysqli($host,$dbusername,$dbpassword,$dbname);
$p="SELECT *
FROM complaint
WHERE name='$a'
ORDER BY id DESC
LIMIT 1";
$p1=mysqli_query($conn,$p);
$pc1=mysqli_fetch_assoc($p1);
$idr=$pc1['id'];
$q="UPDATE complaint SET otp='$otp' WHERE id='$idr'";
$q1=mysqli_query($conn,$q);
$ab="SELECT * FROM complaint WHERE id='$idr'";
$a1=mysqli_query($conn,$ab);
$abc=mysqli_fetch_assoc($a1);
if($abc['otp']===$abc['otpv']){
header("Location: complaint_dup.html");
}
else
header("Location: otpform1.html");
?>