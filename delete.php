<?php 
session_start();
if(!isset($_SESSION['user_id']))
{
    header("Location: index.php");
    die();
}
include("database.php");
$sid=$_GET['sid'];
$sql="DELETE from student_table where sid='$sid'";
$sql_submit=mysqli_query($conn,$sql);
if($sql_submit)
{
    ?>  
        <script>
            alert("Student Details Deleted");
            window.location.href = "http://localhost/student_management/dashboard.php";
        </script>
    <?php
}else
{
    ?>  
        <script>
            alert("Somthing went wrong! Please contact to admin!!");
            window.location.href = "http://localhost/student_management/dashboard.php";
        </script>
    <?php
}

?>