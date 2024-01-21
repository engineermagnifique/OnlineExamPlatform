<?php
session_start();
    include('Connection.php');

    if (isset($_POST['examKey'])) {
        $examKey = $_POST['examKey'];

        $firstname = $_SESSION['firstname'];
        $lastname = $_SESSION['lastname'];

        $sqlQuestions = "SELECT distinct id, question, solution, exam_key, choice1, choice2, choice3, choice4, fullname, lastname FROM questions WHERE fullname='$firstname' AND lastname='$lastname' AND exam_key='$examKey'";
        $resultQuestions = $conn->query($sqlQuestions);

        if ($resultQuestions->num_rows > 0) {
            echo "<br>";
            echo "<form class='preview-sub' method='post' action=''>";
            $index = 1;
            while ($row = $resultQuestions->fetch_assoc()) {
                echo '<div class="questionform">';
                echo "<p class='subq'>{$index}: {$row['question']}</p>";
                echo "<button type='button' class='edit-button' data-question-id='{$row['id']}'>Edit</button>";
                echo "<button type='button' class='delete-button' data-question-id='{$row['id']}'>Delete</button><br>";
                if ($row['solution'] === 'choice') {
                    $choices = array_filter([$row['choice1'], $row['choice2'], $row['choice3'], $row['choice4']]);
                    if (!empty($choices)) {
                        foreach ($choices as $choice) {
                            echo "<label class='answer-option'><input type='radio' name='userOpt[]' value='{$choice}'>{$choice}</label>";
                            echo "<br>";
                        }
                    }
                } elseif ($row['solution'] === 'checkbox') {
                    $choices = array_filter([$row['choice1'], $row['choice2'], $row['choice3'], $row['choice4']]);
                    if (!empty($choices)) {
                        foreach ($choices as $choice) {
                            echo "<label class='answer-option'><input type='checkbox' name='userCheck[]' value='{$choice}'>{$choice}</label>";
                            echo "<br>";
                        }
                    }
                } elseif ($row['solution'] === 'Selects') {
                    $choices = array_filter([$row['choice1'], $row['choice2'], $row['choice3'], $row['choice4']]);
                    if (!empty($choices)) {
                        echo "<select class='answer-option' name='userchoice2'>";
                        foreach ($choices as $choice) {
                            echo "<option value='{$choice}'>{$choice}</option>";
                        }
                        echo "</select>";
                    }
                } elseif ($row['solution'] === 'Choose') {
                    $choices = array_filter([$row['choice1'], $row['choice2'], $row['choice3'], $row['choice4']]);
                    if (!empty($choices)) {
                        foreach ($choices as $choice) {
                            echo "<button type='button' value='{$choice}'>{$choice}</button>";
                        }
                    }
                } elseif ($row['solution'] === 'Programming') {
                    echo "<textarea class='programming-textarea' name='programming_solution' placeholder='Write your program'></textarea>";
                } elseif ($row['solution'] === 'audio') {
                    echo "<input type='file' class='audio-input' name='audio_solution' accept='audio/*'/>";
                } elseif ($row['solution'] === 'video') {
                    echo "<input type='file' class='video-input' name='video_solution' accept='video/*'/>";
                } elseif ($row['solution'] === 'Pragaraph') {
                    echo "<textarea></textarea>";
                }
                $index++;
                echo '</div>';
            }
            echo "<button type='submit' disabled>Submit Exam</button>";
            echo "</form>";
        } else {
            echo "No questions found.";
        }
    } else {
        echo "<form method='post' action=''>";
        echo "<label for='examKey'>Enter Exam Key:</label>";
        echo "<input type='text' id='examKey' name='examKey' required>";
        echo "<button type='submit'>Start Exam</button>";
        echo "</form>";
    }

    $conn->close();
?>
