<?php 
session_start();
if(isset($_SESSION['user_id']))
{
    header("Location: dashboard.php");
    die();
}
?>
<?php
include("database.php");
if(isset($_POST['submit']))
{
    $user_name=$_POST['username'];
    $password=$_POST['password'];
    if($user_name=="")
    {
        ?>
        <script>
            alert("Please Enter User Name");
        </script>
        <?php
    }
    if($password=="")
    {
        ?>
        <script>
            alert("Please Enter Password");
        </script>
        <?php
    }
    $qry="SELECT * from users where user_name='$user_name' and password='$password'";
    $sql_submit=mysqli_query($conn,$qry);
    if(mysqli_num_rows($sql_submit)>0)
    {   $row = $sql_submit->fetch_assoc();
        $_SESSION["user_id"] = $row['user_id'];
        header("Location: dashboard.php");
    }else
    {
        ?>
        <script>
            alert("Wrong UserName Or Password! Please Try Again!");
        </script>
        <?php
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Student Management</title>
    <link rel="stylesheet" href="login_css.css">
</head>
<body>
    <section class="login_section">
        <div class="main_div">
            <div class="login_logo">
                <img src="./images/student_logo.jpg" class="logo"/>
            </div>
            <div class="login_form_div">
                <form name="loginform" action="index.php" method="post">
                    <div class="form_field">
                        <label for="username">User Name <span>*</span></label><br/>
                        <input type="text" name="username" id="username" class="field"/>
                    </div>
                    <div class="form_field">
                        <label for="password">Password <span>*</span></label><br/>
                        <input type="password" name="password" id="password" class="field"/>
                    </div>
                    <div class="submit_button">
                        <button type="submit" name="submit" id="submit" value="Login"> Login</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>
</html>