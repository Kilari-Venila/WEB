<?php
$username=filter_input(INPUT_POST,'username');
$password=filter_input(INPUT_POST,'password');
$email=filter_input(INPUT_POST,'email');
$phoneno=filter_input(INPUT_POST,'phoneno');
if(!empty($username)){
if(!empty($password)){
if(!empty($email)){
if(!empty($phoneno)){
$host="localhost";
$dbusername="root";
$dbpassword="";
$dbname="logging";
$conn=new mysqli($host,$dbusername,$dbpassword,$dbname);
$sele="SELECT * FROM admindetail WHERE username='$username' OR email='$email' OR phoneno='$phoneno' LIMIT 1";
$result=mysqli_query($conn,$sele);
$user=mysqli_fetch_assoc($result);
if(mysqli_connect_error()){
die('Connect Error('.mysqli_connect_errno().')'
.mysqli_connect_error());
}
else if($user){
    if ($user['username'] === $username) {
      echo "Username already exists";
    }

    if ($user['email'] === $email) {
      echo "email already exists";
    }
    if ($user['phoneno'] === $phoneno) {
      echo "Phoneno already exists";
    }
}
else{
$sql="INSERT INTO admindetail(username,password,email,phoneno)
      values ('$username','$password','$email','$phoneno')";
if($conn->query($sql)){
  echo "Registered successfully";
  echo "<html>";
  echo "<body>";
  echo "<button  type='button'><a style='text-decoration: none;' href='login.html'>Click here to login</a></button>";
  echo "</body>";
  echo "</html>";
}
else{
echo "error : ".$sql."<br>".$conn->error;
}
$conn->close();
}
}
else{
echo "Phoneno Should not be empty";
die();
}}
else{
echo "Email should not be empty";
die();
}
}
else{
echo "Password should not be empty";
die();
}
} 
else{
echo "USername should not be empty";
}
?>