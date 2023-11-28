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
$query = "SELECT * FROM usersdetail WHERE username='$username'";
$results = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($results);
if (mysqli_num_rows($results) == 1) {
if($p1==$p2){
$query1="UPDATE usersdetail SET password='$p1' WHERE username='$username'";
mysqli_query($conn,$query1);
echo "<p style='text-align:center;color:red;font-size:15px;'>Password changed Successfully</p>";
echo "<a href='login.html'><p style='text-align:center;'>Go back to login page</p></a>";
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