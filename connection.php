
<?php
$servername="localhost";
$username="root";
$password="";
$dbname="bankdb";

// connecting to database
$conn = mysqli_connect($servername,$username,$password,$dbname);

if($conn)
{
    echo "";
    
}
else 
{
    echo '<script>alert("Not connected");</script>';
}
?>   