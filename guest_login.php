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
</div>
</div>
</div>
  <div class="header">
  	<h2>Complaint</h2>
  </div>
	 
  <form method="post" action="">
  	<div class="input-group">
  		<label>Select Municipal Ward No :</label>
  		<select autofocus id="wardno" name="wardno">
<option>1</option><option>2</option><option>3</option><option>4</option>
<option>5</option><option>6</option><option>7</option><option>9</option>
<option>4</option><option>10</option><option>11</option><option>13</option>
<option>13</option><option>14</option><option>15</option><option>17</option>
<option>17</option><option>18</option><option>19</option><option>21</option>
<option>21</option><option>22</option><option>23</option><option>25</option>
<option>25</option><option>26</option><option>27</option><option>29</option>
<option>29</option><option>30</option><option>31</option><option>33</option>
</select>
  	</div>
  	<div class="input-group">
  		<label>Select Type of Grievance : </label>
  		<select autofocus id="ctype" name="ctype">
<option>FOUNTATION STAFF</option><option>LIFTING OF GARBAGE</option><option>COMPLIANT AGAINST SANITATION STAFF</option><option>WATER LOGGING</option>
<option>DOOR TO DOOR GARBAGE COLLECTION</option><option>NON DEPLOYMENT OF GARBAGE COLLECTION VEHICLE</option><option>GARBAGE COLLECTION VEHICLE NOT FUNCTIONAL</option><option>GARBAGE VEHICLE NOT ON ROAD</option>
<option>DRAIN BLOCKAGE</option><option>DRAIN WORK NOT COMPLETED</option><option>OTHER</option><option>GARBAGE CARRIED NOT PROPERLY</option>
<option>OVERFLOWING OF DRAIN BECAUSE OF CHOCKED</option><option>CUTTING OF WILD GRASS NEAR THE DRAIN</option><option>SKC SWEEPING NOT PROPERLY</option><option>SKC NOT COMMING REGULARLY</option>
<option>SKC MISBEHAVE WITH THE COMPLAINT</option><option>HAWKERS NOT MAINTAINING CLEANLINESS</option><option>MOSQUITOES BREEDING SITE/WATER LOGGING</option><option>PUBLIC TOILED NOT CLEANED</option>
<option>IMPROPER MANAGEMENT OF PUBLIC TOILET</option><option>LIFTING OF DEAD SMALL ANIMAL</option><option>UNSANITARY CONDITION ON THE ROAD</option><option>SKS ABSENT</option>
<option>REMOVAL OF SILT ON THE DRAIN</option>
</select>
  	</div>
    <div class="input-group">
  		<label>Enter Complaint Here</label>
  		<textarea name="comp" rows="5" cols="90" placeholder="Drag the textbox to extend it " autofocus></textarea>
  	</div>
    <div class="input-group">
  		<label>Enter Address of the Issue</label>
  		<textarea name="address" rows="5" cols="90" autofocus></textarea>
  	</div>
  		<button type="submit" class="btn" name="g_users" >Lodge Complaint</button>
  </form>
  <?php
  if(isset($_POST['g_users'])){
  $ward=filter_input(INPUT_POST,'ward'); 
  $ctype=filter_input(INPUT_POST,'ctype');
  $comp=filter_input(INPUT_POST,'comp');
  $address=filter_input(INPUT_POST,'address');
  $host="localhost";
  $dbusername="root";
  $dbpassword="";
  $dbname="logging";
  $conn=new mysqli($host,$dbusername,$dbpassword,$dbname);
  $a=1;
  $query = "INSERT into complaint(wardno,ctype,comp,address,guest) values ('$ward','$ctype','$comp','$address','$a')";
  $q1="UPDATE complaint SET guest='$a'";
  $results = mysqli_query($conn, $query);
  if($results)
  {
    echo "<html>";
echo "<style>";
echo "body{ background-image: url('img4_logo.jpg');
    background-repeat:no-repeat;
    background-attachment: fixed;
    background-size: 55% 55%;
    background-position:center;}";
echo "</style>";
echo "<body>";
echo "<p style='color:green;text-align:center;font-size:40px;'>Thanks for bringing this issue to our notice</p>";
echo "</body>";
echo "</html>";
  }
  }
  ?>
</body>
</html








