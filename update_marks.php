<?php
include('Connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id = $_POST['id'];
  $newMarks = $_POST['newMarks'];


  $updateQuery = "UPDATE solution SET Marks = '$newMarks' WHERE id = '$id'";
  mysqli_query($conn, $updateQuery);
}
?>
