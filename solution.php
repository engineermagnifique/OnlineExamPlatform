<?php
session_start();
    include('Connection.php');

    if (isset($_POST['examKey'])) {
        $examKey = $_POST['examKey'];

        $firstname = $_SESSION['firstname'];
        $lastname = $_SESSION['lastname'];

        $sqlQuestions = "SELECT * FROM solution WHERE exam_key='$examKey'";
        $resultQuestions = $conn->query($sqlQuestions);
        if ($resultQuestions->num_rows > 0) {
            
            $rows = array();
            while ($row = $resultQuestions->fetch_assoc()) {
                $rows[] = $row;
            }
        
        
            usort($rows, function ($a, $b) {
                return $b['Marks'] - $a['Marks'];
            });
        
            
            $index = 1;
            foreach ($rows as $row) {
                $name = $row['firstname'];
                $sname = $row['lastname'];
                $marks = $row['Marks'];
        
                
                $color = '';
                if ($marks > 80) {
                    $color = 'green';
                } elseif ($marks > 60) {
                    $color = 'blue';
                } elseif ($marks > 50) {
                    $color = 'black';
                } else {
                    $color = 'red';
                }
        
                echo "<span style='color: $color;'>Index: $index</span><br>";
                echo "Name: $name $sname<br>";
                echo "Marks: $marks<br><br>";
        
                $index++;
            }
        } else {
            echo "No results found.";
        }
    }
        else {
            
        echo "<form method='post' action=''>";
        echo "<label for='examKey'>Enter Exam Key:</label>";
        echo "<input type='text' id='examKey' name='examKey' required>";
        echo "<button type='submit'>Start Exam</button>";
        echo "</form>";
    }
        

    $conn->close();
?>
