<?php
$username=filter_input(INPUT_POST,'username'); 
$p1=filter_input(INPUT_POST,'new_pwd1');
$p2=filter_input(INPUT_POST,'new_pwd2');
if(!empty($username))
{
$host="localhost";
$dbusername="root";
$dbpassword="";
$dbname="logging";
$conn=new mysqli($host,$dbusername,$dbpassword,$dbname);
$query = "SELECT * FROM admindetail WHERE username='$username'";
$results = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($results);
if (mysqli_num_rows($results) == 1) {
if($p1==$p2){
$query1="UPDATE admindetail SET password='$p1' WHERE username='$username'";
mysqli_query($conn,$query1);
echo "Password changed Successfully";
echo "<a href='logina.html'>Go back to login page</a>";
}
else{
echo "Password doesnt match";
}
}
else{
echo "Entered username doesnt exist";
}
}
else{
echo "Enter username";
}
?>