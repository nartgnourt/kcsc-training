<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="favicon-32x32.png" type="image/x-icon">
  <title>KCSC Training</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <h1>Quản lý danh sách mentee</h1>
  <form action="add.php" method="post">
    <label for="mentee">Mentee</label>
    <br>
    <input type="text" name="mentee" id="mentee">
    <br>
    <label for="course">Khoá học</label>
    <br>
    <input type="text" name="course" id="course">
    <br>
    <label for="category">Mảng CTF</label>
    <br>
    <select name="category" id="category">
      <option value="Forensics">Forensics</option>
      <option value="Cryptography">Cryptography</option>
      <option value="Web Exploitation">Web Exploitation</option>
      <option value="Binary Exploitation">Binary Exploitation</option>
      <option value="Reverse Engineering">Reverse Engineering</option>
    </select>
    <br>
    <input type="submit" value="Thêm">
  </form>
  <br>
  <table>
    <th>Mentee</th>
    <th class="course-data">Khoá học</th>
    <th>Mảng CTF</th>
    <th colspan="2">Thao tác</th>
    <?php
    require "connect.php";

    $sql = "SELECT * FROM mentees";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
    ?>
      <tr>
        <td><?php echo $row["mentee"] ?></td>
        <td class="course-data"><?php echo $row["course"] ?></td>
        <td><?php echo $row["category"] ?></td>
        <td class="action"><a href="edit.php?id=<?php echo $row['id'] ?>">Sửa</a></td>
        <td class="action"><a href="delete.php?id=<?php echo $row['id'] ?>">Xóa</a></td>
      </tr>
    <?php
    }
    ?>
  </table>
</body>

</html>