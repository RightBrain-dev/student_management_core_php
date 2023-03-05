<?php
session_start();
if(!isset($_SESSION['user_id']))
{
    header("Location: index.php");
    die();
}
include("database.php");

if(isset($_POST['submit'])&&!empty($_POST['submit']))
{
    $sid=$_POST['sid'];
    $name=$_POST['name'];
    $gender=$_POST['gender'];
    $address=$_POST['address'];
    $class=$_POST['class'];
    $mobile_number=$_POST['mobile_number'];
    $email=$_POST['email'];

    if($name==""||$gender==""||$class==""||$address==""||$mobile_number==""||$email=="")
    {
        ?>  
            <script>
                alert("All Fields Are Required!!");
            </script>
        <?php
    }else
    {

        $sql="UPDATE `student_table` SET `name`='$name',`gender`='$gender',`class`='$class',`address`='$address',`mobile_no`='$mobile_number',`email`='$email' WHERE sid='$sid'";
        $sql_submit=mysqli_query($conn,$sql);
        if($sql_submit)
        {
            ?>
            <script>
                alert("Student Data Updated Successfully!!");
                window.location.href = "http://localhost/student_management/dashboard.php";
            </script>
            <?php
        }else
        {
            ?>
                <script>
                    alert("Somthing went wrong! Please contact to admin!!");
                </script>
            <?php
        }
    }
}
?>

<?php
    $sid=$_GET['sid'];
    $sql="SELECT * from student_table where sid='$sid'";
    $sql_submit=mysqli_query($conn,$sql);
    $row = $sql_submit->fetch_assoc();
?>
<html>
<head>
    <title>Student Management</title>
    <link rel="stylesheet" href="login_css.css">
    <style>
        .add_div{
            
        }
        .add_title{
            text-align:center;
        }
        .form_div{
            margin:50px 500px;
        }
        .f_div{
            display:flex;
            justify-content:space-between;
            margin-bottom:15px;
            flex-wrap: wrap;
        }
        .f_div_save{
            display:flex;
            justify-content:space-evenly;
            margin-bottom:15px;
        }
        .input-field{
            width:200px;
        }
    </style>
</head>
    <body>
    <section class="menu-section">
        <div class="main-div">
            <div class="left-menus">
                <div class="Logo-menu"><a href="http://localhost/student_management/dashboard.php">Student Management System</a></div>
            </div>
            <div class="logout-btn">
                <div><a href="http://localhost/student_management/logout.php">Logout</a></div>
            </div>
        </div>
    </section>
        <section class="add_new_section">
            <div class="add_div">
                <div class="add_title">
                    <h1>Update Student Details</h1>
                </div>    
            </div>
            <div class="form_div">
                <form name="stu_form" action="edit.php" method="post">
                    <input type="hidden" name='sid' value="<?=$row['sid']?>"/>
                    <div class="f_div">
                        <div class="label">Full Name</div>
                        <div class="field"><input type="text" name="name" class="input-field" value="<?=$row['name'];?>"/></div>
                    </div>
                    <div class="f_div">
                        <div class="label">Gender</div>
                        <div class="field">
                            <select name="gender" class="input-field">
                                <option value="Male" <?php if($row['gender']=="Male"){echo "selected";}?>>Male</option>

                                <option value="FeMale" <?php if($row['gender']=="FeMale"){echo "selected";}?>>FeMale</option>
                            </select>
                        </div>
                    </div>
                    <div class="f_div">
                        <div class="label">Class</div>
                        <div class="field"><input type="text" name="class" class="input-field" value="<?=$row['class'];?>"/></div>
                    </div>
                    <div class="f_div">
                        <div class="label">Address</div>
                        <div class="field">
                            <textarea class="input-field" name="address"><?=$row['address'];?></textarea>
                        </div>
                    </div>
                    <div class="f_div">
                        <div class="label">Mobile Number</div>
                        <div class="field"><input type="text" name="mobile_number" class="input-field" value="<?=$row['mobile_no'];?>"/></div>
                    </div>
                    <div class="f_div">
                        <div class="label">Email</div>
                        <div class="field"><input type="text" name="email" class="input-field" value="<?=$row['email'];?>"/></div>
                    </div>
                    <div class="f_div_save">
                        <div class=""><input type="submit" name="submit" value="Save"/></div>
                        <div class=""><a href="http://localhost/student_management/dashboard.php">Cancle</a></div>
                    </div>  
                </form>
            </div>
        </section>
    </body>
</html>