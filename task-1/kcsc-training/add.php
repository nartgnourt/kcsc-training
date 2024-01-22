<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $mentee = htmlspecialchars($_POST["mentee"]);
  $course = htmlspecialchars($_POST["course"]);
  $category = htmlspecialchars($_POST["category"]);

  if (empty($mentee) || empty($course) || empty($category)) {
    echo "<p style='color:red'>Vui lòng nhập đủ thông tin!</p>" . "<a href='javascript:history.back()'>Quay trở lại</a>";
  } else {
    require "connect.php";

    $sql = "INSERT INTO mentees (mentee, course, category) VALUES ('$mentee', '$course', '$category')";

    mysqli_query($conn, $sql);
    mysqli_close($conn);
    header("Location: index.php");
  }
}
