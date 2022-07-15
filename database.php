<?php
$conn = mysqli_connect("localhost", "root", "", "student_management");
if (!$conn) {
  echo "Database connection failed";
  exit();
}
?>