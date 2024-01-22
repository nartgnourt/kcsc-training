<?php
require "connect.php";

$id = $_GET["id"];
$sql = "DELETE FROM mentees WHERE id=$id";

mysqli_query($conn, $sql);
mysqli_close($conn);
header("Location: index.php");
