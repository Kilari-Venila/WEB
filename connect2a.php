<?php
$username=filter_input(INPUT_POST,'username');
$password=filter_input(INPUT_POST,'password');
if(!empty($username))
{
if(!empty($password))
{
$host="localhost";
$dbusername="root";
$dbpassword="";
$dbname="logging";
$conn=new mysqli($host,$dbusername,$dbpassword,$dbname);
$query = "SELECT * FROM admindetail WHERE username='$username' AND password='$password'";
$results = mysqli_query($conn, $query);
if (mysqli_num_rows($results) == 1) {
	header("Location: need_for_logina.html");
}
else{
echo "<p style='color:red;text-align:center'>Wrong username/password</p>";
echo "<a href='logina.html'><p style='text-align:center;'>Get back to login page</p></a>";
}
}}
?>