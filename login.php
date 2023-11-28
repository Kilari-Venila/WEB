
<html>
<head>
<title>Login Page</title>
<style>
* {
  margin: 0px;
  padding: 0px;
}
body {
  font-size: 120%;
  background: #F8F8FF;
}

.header {
  width: 30%;
  margin: 50px auto 0px;
  color: white;
  background: #5F9EA0;
  text-align: center;
  border: 1px solid #B0C4DE;
  border-bottom: none;
  border-radius: 10px 10px 0px 0px;
  padding: 20px;
}
form, .content {
  width: 30%;
  margin: 0px auto;
  padding: 20px;
  border: 1px solid #B0C4DE;
  background: white;
  border-radius: 0px 0px 10px 10px;
}
.input-group {
  margin: 10px 0px 10px 0px;
}
.input-group label {
  display: block;
  text-align: left;
  margin: 3px;
}
.input-group input {
  height: 30px;
  width: 93%;
  padding: 5px 10px;
  font-size: 16px;
  border-radius: 5px;
  border: 1px solid gray;
}
.btn {
  padding: 10px;
  font-size: 15px;
  color: white;
  background: #5F9EA0;
  border: none;
  border-radius: 5px;
}
.headline{
height:200px;
width:100%;
background: radial-gradient(circle at center, 
    white, rgb(90,90, 150),Midnightblue),100% ;
}
#heading{
text-shadow: 2px 2px blue;
position: absolute;
  left: 10px;
  top: 1px;
}
#moto
{
position: absolute;
  right: 10px;
  top: 45px;
}
#logo
{
display: flex;
justify-content:center;
}
#img{
border:10px ridge;
}
.logobeside {
 display: grid;
 align-items: center; 
 grid-template-columns: 1fr 1fr 1fr;
 column-gap: 10px;
 position:absolute;
 top:90px;
 left:580px;
}

.logo {
  max-width: 100px;
  max-height:100px;
}

.helptext {
  font-size: 20px;
}
</style>
</head>
<body>
  <div class="headline">
<h1 id="heading" style="color:brown;font-size:40px;"><b>MUNICIPAL CORPORATION COMPLAINT MANAGEMENT SYSTEM-AP</b></h1>
<p id="moto" style="color:yellow;text-align:right;font-family:cursive;font-size:20px">-keen to serve you better</p>
<div class="logobeside">
<div id = "logo">
<img src="logo.jpg" width="90px" height="90px">
</div>
<div class="helptext">
<p style="color:yellow;text-align:right;font-family:cursive;"><br><span style="color:black;">Helpline No:<span style="color:yellow;">0846995,0846996</span></span></p>
</div>
</div>
</div>
  <div class="header">
  	<h2>Login</h2>
  </div>
	 
  <form method="post" action="">
  	<div class="input-group">
  		<label>Username</label>
  		<input type="text" name="username" id="username" required>
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password" id="password" required>
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Login</button>
  	</div>
    <p>
  		Not a member? <a href="register.php" style="text-decoration:none;" >Sign up</a>
  	</p>
    <p>
       <a href="chngpwd.php" style="text-decoration:none;">Forgot/Change password</a>
    </p>
  </form>
<?php
if(isset($_POST['login_user'])){
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
      }
      else{
      echo "<p style='color:red;text-align:center'>Wrong Password</p>";
     }
}
}}}
?>
</body>
</html>