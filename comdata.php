<?php
session_start();
$wardno=filter_input(INPUT_POST,'wardno');
$ctype=filter_input(INPUT_POST,'ctype');
$comp=filteR_INPUT(INPUT_POST,'comp');
$address=filter_input(INPUT_POST,'address');
$a=$_SESSION['name'];
if($wardno){
if($ctype){
if($address){
$host="localhost";
$dbusername="root";
$dbpassword="";
$dbname="logging";
$conn=new mysqli($host,$dbusername,$dbpassword,$dbname);
if(mysqli_connect_error()){
die('Connect Error('.mysqli_connect_errno().')'
.mysqli_connect_error());
}
$q="SELECT * FROM usersdetail WHERE username='$a'";
$result=mysqli_query($conn,$q);
$user=mysqli_fetch_assoc($result);
$phoneno=$user['phoneno'];
$mail=$user['email'];
$p="SELECT *
FROM complaint
WHERE name='$a'
ORDER BY id DESC
LIMIT 1";
$p1=mysqli_query($conn,$p);
$pc1=mysqli_fetch_assoc($p1);
$idr=$pc1['id'];
$i=filter_input(INPUT_POST,'img');
$sql="UPDATE complaint SET wardno='$wardno',ctype='$ctype',comp='$comp',mobile='$phoneno',mail='$mail',address='$address',img='$i' WHERE id='$idr'";
$results=mysqli_query($conn,$sql);
$my_date = date("Y-m-d H:i:s");
$dtime="UPDATE complaint SET datetime='$my_date' WHERE id='$idr'";
$dtimec=mysqli_query($conn,$dtime);
$to_email = $mail;
$subject = "FROM MCCMS";
$body = "Your Complaint number : ".$idr;
$headers = "From: MCCMS";
if(mail($to_email, $subject, $body, $headers)){
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
}}}
?>

