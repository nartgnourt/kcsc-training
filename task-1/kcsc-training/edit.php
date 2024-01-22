<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="favicon-32x32.png" type="image/x-icon">
  <title>KCSC Training</title>
  <link rel="stylesheet" href="style.css">
</head>
<?php
require "connect.php";

$id = $_GET["id"];
$sql = "SELECT * FROM mentees WHERE id = $id";

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>

<body>
  <h1>Sửa thông tin mentee</h1>
  <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
    <label for="mentee">Mentee</label><br>
    <input type="text" name="mentee" id="mentee" value="<?php echo $row['mentee'] ?>">
    <br>
    <label for="course">Khoá học</label><br>
    <input type="text" name="course" id="course" value="<?php echo $row['course'] ?>">
    <br>
    <label for="category">Mảng CTF</label><br>
    <select name="category" id="category">
      <option value="Forensics" <?php if ($row['category'] ==  "Forensics") echo "selected" ?>>Forensics</option>
      <option value="Cryptography" <?php if ($row['category'] ==  "Cryptography") echo "selected" ?>>Cryptography</option>
      <option value="Web Exploitation" <?php if ($row['category'] ==  "Web Exploitation") echo "selected" ?>>Web Exploitation</option>
      <option value="Binary Exploitation" <?php if ($row['category'] ==  "Binary Exploitation") echo "selected" ?>>Binary Exploitation</option>
      <option value="Reverse Engineering" <?php if ($row['category'] ==  "Reverse Engineering") echo "selected" ?>>Reverse Engineering</option>
    </select>
    <br>
    <input type="submit" value="Sửa">
  </form>
  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mentee = htmlspecialchars($_POST["mentee"]);
    $course = htmlspecialchars($_POST["course"]);
    $category = htmlspecialchars($_POST["category"]);

    if (empty($mentee) || empty($course) || empty($category)) {
      echo "<p style='color:red'>Vui lòng nhập đủ thông tin!</p>";
    } else {
      $sql = "UPDATE mentees SET mentee='$mentee', course='$course', category='$category' WHERE id=$id";

      mysqli_query($conn, $sql);
      mysqli_close($conn);
      header("Location: index.php");
    }
  }
  ?>
</body>