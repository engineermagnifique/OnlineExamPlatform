<?php
session_start();
include('Connection.php');

    $firstname = $_SESSION['firstname'];
    $lastname = $_SESSION['lastname'];

    $sqlQuestions = "SELECT DISTINCT exam_key FROM questions WHERE fullname='$firstname' AND lastname='$lastname'";
    $resultQuestions = $conn->query($sqlQuestions);
    if ($resultQuestions->num_rows > 0) {
        echo '<h5>All exams prepared'; echo " ".$firstname." "; echo " ".$lastname." "; echo'</h5>';
        while ($row = $resultQuestions->fetch_assoc()) {
            echo '<p>';
            echo $row['exam_key'];
            echo '</p><br>';
        }
    } else {
        echo "No exams prepared by you found";
    }

$conn->close();
?>