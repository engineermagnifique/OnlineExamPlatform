<?php
session_start();
include('Connection.php');
?>

<!DOCTYPE html>
<html>
<head>
<script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
    <title>Certificate of Examination</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    
    <style>
        /* Custom styles for the certificate */
        .certificate-container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #f8f9fa;
            border: 20px solid transparent;
            border-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100"><path fill="none" d="M0 0h100v100H0z"/><path fill="%23FFD700" d="M50 16.667l3.99 12.237h12.932l-10.463 7.59 3.99 12.238-10.463-7.59-10.462 7.59 3.99-12.238L16.667 28.904h12.932z"/></svg>') 1;
            border-image-slice: 30;
            border-image-repeat: round;
        }
        a {
            color:black;
            background-color: green;
        }
        .certificate-heading {
            color:green;
            margin-top: 35px;
            text-align: center;
            margin-bottom: 55px;
        }

        .certificate-content {
            margin-bottom: 40px;
            font-size: 18px;
            line-height: 1.5;
            text-align: justify;
        }

        .certificate-awarding-person {
            text-align: left;
            font-size: 14px;
            margin-left:30px;
            font-weight: 60px;
        }
    </style>
</head>
<body>
    <div class="certificate-container" id="certificate">
        <div class="certificate-heading">
            <h2>Certification of Examination</h2>
        </div>

        <?php
        if (isset($_POST['examKey'])) {
            
            $examKey = $_POST['examKey'];
            $firstname = $_SESSION['firstname'];
            $lastname = $_SESSION['lastname'];

            $sqlQuestions = "SELECT * FROM solution WHERE exam_key='$examKey' and firstname='$firstname' and lastname='$lastname' and Publish='Allowed'";
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

                    
                    $sqlQuestion = "SELECT fullname,lastname FROM questions WHERE exam_key='$examKey' LIMIT 1";
                    $resultQuestion = $conn->query($sqlQuestion);
                    $rowQuestion = $resultQuestion->fetch_assoc();
                    $awardingName = $rowQuestion['fullname'];
                    $awardingNames = $rowQuestion['lastname'];
                    // Assign form of words based on marks range
                    $formOfWords = '';
                    if ($marks > 80) {
                        $formOfWords = 'outstanding';
                    } elseif ($marks > 60) {
                        $formOfWords = 'excellent';
                    } elseif ($marks > 50) {
                        $formOfWords = 'very bad';
                    } else {
                        $formOfWords = 'bad';
                    }
                    
                    echo "<div class='certificate-content'>This is to certify that $name $sname has achieved an $formOfWords score of $marks in recognition of their remarkable achievement and dedication. Their commitment is commendable, marking a significant milestone in their journey.</div>";
                    echo "<div class='certificate-awarding-person'></div><br><br>";

                    $index++;
                }
        } else {
            echo "<div class='certificate-content'>No results found.</div>";
        }
    } else {
        echo "<form method='post' action=''>";
        echo "<label for='examKey'>Enter Exam Key:</label>";
        echo "<input type='text' id='examKey' name='examKey' required>";
        echo "<button type='submit'>See the certificate</button>";
        echo "</form>";
    }
    ?>

        <div class="certificate-awarding-person">
            <p>Awarded by <?php echo $awardingName . ' ' . $awardingNames; ?></p>
                <script>
    var currentDate = new Date();
    var formattedDate = currentDate.toLocaleString('en-US', { day: 'numeric', month: 'long', year: 'numeric', hour: 'numeric', minute: 'numeric', second: 'numeric', hour12: true });

    var dateElement = document.createElement('p');
    dateElement.textContent = 'Done at: ' + formattedDate;

    document.querySelector('.certificate-awarding-person').appendChild(dateElement);
            </script>
        </div>
    </div>

  
    <img id="capturedImage" alt="Captured Image">

    <a id="downloadLink" download="certificate" style="display: none;">Download Image</a>

    <script>
        function captureScreenshot() {
            html2canvas(document.getElementById('certificate')).then(canvas => {
                var imageData = canvas.toDataURL('image/png');

                document.getElementById('capturedImage').src = imageData;

                var downloadLink = document.getElementById('downloadLink');
                downloadLink.href = imageData;
                downloadLink.style.display = 'block';

            });
        }
        setInterval(captureScreenshot, 4000);
    </script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>