<?php
session_start();
    include('Connection.php');

    if (isset($_POST['examKey'])) {
        $examKey = $_POST['examKey'];

        $firstname = $_SESSION['firstname'];
        $lastname = $_SESSION['lastname'];

        $sqlQuestions = "update solution set Publish='Allowed' WHERE exam_key='$examKey'";
        $resultQuestions = $conn->query($sqlQuestions);
        if ($resultQuestions)
        {
            echo " successfully published";
        }
        else {
            echo "No found marks to be published";
        }
    }

    $conn->close();
?>
