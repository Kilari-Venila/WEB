<?php
session_start();
$a=$_SESSION['name'];
echo "Username is ";
echo $a;
function generateNumericOTP($n) {
      
    // Take a generator string which consist of
    // all numeric digits
    $generator = "135792468";
  
    // Iterate for n-times and pick a single character
    // from generator and append it to $result
      
    // Login for generating a random character from generator
    //     ---generate a random number
    //     ---take modulus of same with length of generator (say i)
    //     ---append the character at place (i) from generator to result
  
    $result = "";
  
    for ($i = 1; $i <= $n; $i++) {
        $result .= substr($generator, (rand()%(strlen($generator))), 1);
    }
  
    // Return result
    return $result;
}
$n = 6;
$otpgenerated=generateNumericOTP($n);
$host="localhost";
$dbusername="root";
$dbpassword="";
$dbname="logging";
$conn=new mysqli($host,$dbusername,$dbpassword,$dbname);
$sele="SELECT * FROM usersdetail WHERE username='$a' LIMIT 1";
$result=mysqli_query($conn,$sele);
$user=mysqli_fetch_assoc($result);
$to_email = $user["email"];
$subject = "FROM MCCMS";
$body = "Hi, This is test mail to check how to send mail from Localhost Using Gmail ".$otpgenerated;
$headers = "From: MCCMS";
if(mail($to_email, $subject, $body, $headers)){
    $s="INSERT INTO complaint(name,otpv) values 
      ('$a','$otpgenerated')";
    if(mysqli_query($conn,$s)){
    header("Location: otpform.php");
}}
else{
    echo "Header not works";
}
?>