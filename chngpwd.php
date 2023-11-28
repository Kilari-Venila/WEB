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
  	<h2>Password Change</h2>
  </div>
	 
  <form method="post" action="">
  	<div class="input-group">
  		<label>Username</label>
  		<input type="text" name="username" id="username" required>
  	</div>
    <div class="input-group">
  		<label>New Password</label>
  		<input type="password" name="new_pwd1" id="new_pwd1" required>
  	</div>
  	<div class="input-group">
  		<label>Confirm Password</label>
  		<input type="password" name="new_pwd2" id="new_pwd2" required>
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="change_user">Submit</button>
  	</div>
  </form>
  <?php
  if(isset($_POST['change_user'])){
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
echo "<a href='login.html' style='text-decoration:none;'><p style='text-align:center;font-size:40px;color:green;'>Click here to login </p></a>";
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
}}
?>
</body>
</html

