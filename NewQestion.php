<?php
require_once 'Connection.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    $newQuestion = $_POST['newQuestion'];
    $solution = $_POST['solution'];
    $examKey = $_POST['ExamKey'];
    $minutes = $_POST['Minutes'];
    $choice1 = $_POST['choice1'];
    $choice2 = $_POST['choice2'];
    $choice3 = $_POST['choice3'];
    $choice4 = $_POST['choice4'];

    
    $query = "INSERT INTO questions (question, solution, exam_key, minutes, choice1, choice2, choice3, choice4) 
              VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $statement = $connection->prepare($query);
    $statement->bind_param('ssssssss', $newQuestion, $solution, $examKey, $minutes, $choice1, $choice2, $choice3, $choice4);
    $statement->execute();

    
    if ($statement->affected_rows > 0) {
        echo "Question saved successfully.";
    } else {
        echo "Failed to save the question.";
    }

    $statement->close();
    $connection->close();
}
?>