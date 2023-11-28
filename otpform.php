<html>
<head>
<title>Complaint Page</title>
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
  width: 50%;
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
  width: 50%;
  margin: 0px auto;
  padding: 20px;
  border: 1px solid #B0C4DE;
  background: white;
  border-radius: 0px 0px 10px 10px;
}
.input-group {
  margin: 10px 0px 10px 0px;
  margin-left:40px;
border-style:dotted;
border-radius:10px;
padding:0.5em;
border-color:lightblue;
}
.input-group label {
  display: block;
  text-align: left;
  margin: 3px;
}
.input-group textarea {
  height: 30px;
  width: 100%;
  padding: 5px 10px;
  font-size: 16px;
  border-radius: 5px;
  border: 1px solid grey;
}
.btn {
  padding: 10px;
  font-size: 15px;
  color: white;
  background: #5F9EA0;
  border: none;
  border-radius: 5px;
margin-left:320px;
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
.but{
display:block;
margin:auto;
background-color:lightgrey;
color:black;
border:2px solid lightgrey;
boder-radius:5px;
width:200px;
height:30px;
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
<button style="margin-left:750px;" onClick="location.href='destroy.php'" type="button">Logout</button>
</div>
</div>
</div>
<div class="header">
    <h2>Email Verification</h2>
</div>
<form action="" method="post">
    <label>Enter OTP to verify</label>
    <input type="number" name="otp" laceholder="Enter the Otp send to your mail to verify" autofocus>
<button type="submit" class="btn" name="login_user" >Verify OTP</button>  
</form>
<?php
if(isset($_POST['login_user'])){
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
echo "<p style='color:red;text-align:center;'>Wrong OTP</p>";}
?>
</body>
</html>
