<?php
session_start();
if(!isset($_SESSION['user_id']))
{
    header("Location: index.php");
    die();
}
include("database.php");
?>
<html>
<head>
    <title>Student Management</title>
    <link rel="stylesheet" href="login_css.css">
</head>
<body>
    <section class="menu-section">
        <div class="main-div">
            <div class="left-menus">
                <div class="Logo-menu"><a href="http://localhost/student_management/dashboard.php">Student Management System</a></div>
                <!-- <div class="menu-list">
                   <div class="menu-item"><a href="http://localhost/student_management/dashboard.php">Home</a></div>
                </div> -->
            </div>
            <div class="logout-btn">
                <div><a href="http://localhost/student_management/logout.php">Logout</a></div>
            </div>
        </div>
    </section>
    <section>
        <div class="table_div">
            <div class="add_btn_div">
                <a href="http://localhost/student_management/add_new_student.php">Add New Student</a>
            </div>
            <table class="table" border="1">
                <tr>
                    <th>ID</th>
                    <th id="name-col">Name</th>
                    <th>Gender</th>
                    <th>Class</th>
                    <th>Address</th>
                    <th>Mobile Number</th>
                    <th>Email</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
               <?php
               $selqry="SELECT * from student_table";
               $submit_sql=mysqli_query($conn,$selqry);
               if(mysqli_num_rows($submit_sql)>0)
               {
                    while($row = $submit_sql->fetch_assoc())
                    {
                        ?>
                            <tr>
                                <td><?=$row['sid']; ?></td>
                                <td><?=$row['name']; ?></td>
                                <td><?=$row['gender']; ?></td>
                                <td><?=$row['class']; ?></td>
                                <td><?=$row['address']; ?></td>
                                <td><?=$row['mobile_no']; ?></td>
                                <td><?=$row['email']; ?></td>
                                <td><a href="http://localhost/student_management/edit.php?sid=<?=$row['sid']; ?>">Edit</a></td>
                                <td><a href="http://localhost/student_management/delete.php?sid=<?=$row['sid']; ?>">Delete</a></td>
                            </tr>
                        <?php
                    }
               }else
               {
                ?>
                <tr>
                    <td colspan="9">Sorry, No Any Student Found!!</td>
               </tr>
                <?php
               }
               ?> 



            </table>
        </div>
    </section>
</body>
</html>