
<?php
$cno=filter_input(INPUT_POST,'cno');
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
    echo "<html>";
    echo "<head>";
    echo "<style>";
    echo ".sytleing{
    border-top-style: dotted;
    border-right-style: solid;
    border-bottom-style: dotted;
    border-left-style: solid;
  }";
    echo ".styleing:hover{
        background-color:lightgrey;
    }";
    echo "</style>";
    echo "</head>";
    echo "<body>";
    echo "<div class='styleing'>";
    echo "<p style='color:green;font-size:25px;'>Issue is : </p>";
    echo "<p style='margin-left:100px;font-size:20px;font-family: Garamond, serif;'>".$row["comp"]."</p>";
    echo "<p  style='text-align:right;font-size:15px;color:red;'>Date of Complaint Issued : ".$row["datetime"]."</p>";
    echo "<p  style='text-align:right;font-size:15px;color:red;'>Complaint Number : ".$row["id"]."</p>";
    echo "<hr width='100%' size='2' color='green' noshade>";
    echo "</div>"; 
    echo "</body>";
    echo "</html>";
}
else{
echo "<p style='color:red;text-align:center'>There is no any complaint with the entered number</p>";
echo "<p style='color:green;text-align:center'>Available complaints are : </p>";
$sel = mysqli_query($conn,"SELECT * FROM complaint") or die(mysql_error());
while($row = mysqli_fetch_array($sel)){
    echo "<p style='color:green;text-align:center'>".$row['id']."</p>";
}
echo "<a href='view_comp.html' style='text-decoration:none;'><p style='text-align:center;color:green;font-size:30px;'>Get back to again search for a complaint </p></a>";
}
}
?>