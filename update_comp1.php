
<?php
$cno=filter_input(INPUT_POST,'cno');
$sno=filter_input(INPUT_POST,'sno');
if(!empty($cno))
{
$host="localhost";
$dbusername="root";
$dbpassword="";
$dbname="logging";
$conn=new mysqli($host,$dbusername,$dbpassword,$dbname);
$query = "SELECT * FROM complaint WHERE id='$cno'";
$results = mysqli_query($conn, $query);
$row=mysqli_fetch_array($results);
if (mysqli_num_rows($results) == 1) {
    $a="UPDATE complaint SET status='$sno' WHERE id='$cno'";
    $res=mysqli_query($conn,$a);
    if($res)
    {
        echo "<p style='color:red;text-align:center'>Status Updated successfully </p>"; 
        echo "<p style='color:red;text-align:center'>Complaint Number :   ".$cno."<br>"."Status is :    ".$sno."</p>";
    }
}
else{
echo "<p style='color:red;text-align:center'>There is no any complaint with the entered number</p>";
echo "<p style='color:green;text-align:center'>Available complaints are : </p>";
$sel = mysqli_query($conn,"SELECT * FROM complaint") or die(mysql_error());
while($row = mysqli_fetch_array($sel)){
    echo "<p style='color:green;text-align:center'>".$row['id']."</p>";
}
echo "<a href='view_comp.html'><p style='text-align:center;'>Get back to again search for a complaint </p></a>";
}
}
?>