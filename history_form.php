<?php
session_start();
$a=$_SESSION['name'];
$host="localhost";
$dbusername="root";
$dbpassword="";
$dbname="logging";
$conn=new mysqli($host,$dbusername,$dbpassword,$dbname);
$query = "SELECT * FROM complaint WHERE name='$a'";
$results = mysqli_query($conn, $query);
if(mysqli_num_rows($results)>0){
    while($row=mysqli_fetch_assoc($results))
    {
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
}
else{
    echo "<p style='color:green;font-size:25px;'>No Registered Complaints are there  </p>";
}
$conn->close();
?>