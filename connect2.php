<?php
session_start();
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
$query = "SELECT * FROM usersdetail WHERE username='$username' AND password='$password'";
$results = mysqli_query($conn, $query);
if (mysqli_num_rows($results) == 1) {
      $_SESSION['name']=$username;
      header("Location: need_for_login.html");
}
else
{
      $a="SELECT * FROM usersdetail WHERE username='$username'";
      $aq=mysqli_query($conn,$a);
      if(mysqli_num_rows($aq)==0)
      {
      echo "<p style='color:red;text-align:center'>User with these username not exists</p>";
      echo "<a href='register.html'><p style='text-align:center;'>Click here to register/create new account</p></a>";
      }
      else{
      echo "<p style='color:red;text-align:center'>Wrong Password</p>";
      echo "<a href='login.html'><p style='text-align:center;'>Get back to login page</p></a>";}
}
}}
?>