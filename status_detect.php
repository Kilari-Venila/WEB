-+<?php
$cno=filter_input(INPUT_POST,'cno');
$host="localhost";
$dbusername="root";
$dbpassword="";
$dbname="logging";
$conn=new mysqli($host,$dbusername,$dbpassword,$dbname);
$q="SELECT * FROM complaint WHERE id='$cno'";
$q1=mysqli_query($conn,$q);
$q1c=mysqli_fetch_assoc($q1);
echo $q1c['status'];
if($q1c['status'] == 0)
{
    header("Location: status_zero.html");
    $to_email = $q1c["mail"];
    $subject = "FROM MCCMS";
    $body = "Your issue is not solved";
    $headers = "From: MCCMS";
    mail($to_email, $subject, $body, $headers);
}
if($q1c['status'] == 1)
{
    $to_email = $q1c["mail"];
    $subject = "FROM MCCMS";
    $body = "Your issue is on progressing";
    $headers = "From: MCCMS";
    mail($to_email, $subject, $body, $headers);
    header("Location: status_one.html");
}
if($q1c['status'] == 0)
{
    $to_email = $q1c["mail"];
    $subject = "FROM MCCMS";
    $body = "Your issue is solved";
    $headers = "From: MCCMS";
    mail($to_email, $subject, $body, $headers);
    header("Location: status_two.html");
}
?>