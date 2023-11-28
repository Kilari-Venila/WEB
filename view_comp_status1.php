
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
    if($row['status']==0)
    {
        echo "<p style='color:red;text-align:center'>Yet not solved</p>";
    }
    if($row['status']==1)
    {
        echo "<p style='color:red;text-align:center'>In Progress</p>";
    }
    if($row['status']==2)
    {
        echo "<p style='color:red;text-align:center'>It's solved</p>";
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