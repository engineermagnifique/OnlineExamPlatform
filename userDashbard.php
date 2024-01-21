


<?php
session_start(); 
include('Connection.php');

$firstname = $_SESSION['firstname'] ?? null;
$lastname = $_SESSION['lastname'] ?? null;
$examKey = $_SESSION['examkey'] ?? null;



$sql = "SELECT SUM(Minutes) AS totalMinutes FROM questions WHERE exam_key='$examKey'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$totalMinutes = $row['totalMinutes'];
$timeRemaining = $totalMinutes * 60; 

function displayTimeRemaining($seconds) {
    $hours = floor($seconds / 3600);
    $minutes = floor(($seconds % 3600) / 60);
    $seconds = $seconds % 60;
    return sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds);
}
?>


<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <style>
    body {
      color:white;
    }
    a {
      text-decoration:none;
      color:black;
    }
    .questionform {
      color:black;
      width: 60%;
      border: 1px solid #ddd;
      padding: 20px;
      margin-left: 20%;
      margin-right: 20%;
      margin-top: 10%;
      margin-bottom: 20px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .questionform p.subq {
      font-size: 20px;
      margin-bottom: 10px;
      color:black;
    }

    .answer-option {
      margin-bottom: 10px;
    }

    .programming-textarea,
    .audio-input,
    .video-input,
    textarea {
      width: 100%;
      height: 150px;
      resize: vertical;
      margin-bottom: 10px;
      color:black;
    }

    .edit-button,
    .delete-button {
      background-color: #007bff;
      color: #fff;
      border: none;
      padding: 5px 10px;
      margin-right: 10px;
      cursor: pointer;
    }

    button[type="submit"] {
      background-color: #28a745;
      color: #fff;
      border: none;
      padding: 10px 20px;
      font-size: 16px;
      cursor: pointer;
    }

    .next-previous {
      display: flex;
      justify-content: space-between;
      margin-top: 35px;
    }

    .next-previous button {
      background-color: #007bff;
      color: #fff;
      border: none;
      padding: 5px 10px;
      font-size: 16px;
      cursor: pointer;
    }

    

    .submit-button {
      position: fixed;
      top: 10px;
      left: 10px;
      background-color: #dc3545;
      color: #fff;
      border: none;
      padding: 10px 20px;
      font-size: 16px;
      cursor: pointer;
    }
    .next {
        position:fixed;
        top: 40%;
        right:10%;
    }
    .prev {
        position:fixed;
        top: 40%;
        left:10%;
    }
    .submit {
        position:fixed;
        top:5%;
        right: 4%;
    }
    .question-container {
      position: relative;
    }
    .question-index {
      position: absolute;
      top: 10px;
      right: 10px;
      font-size: 16px;
      font-weight: bold;
    }
    .programming-textarea,
  .audio-input,
  .video-input,
  textarea {
    width: 100%;
    height: 150px;
    resize: vertical;
    margin-bottom: 10px;
    font-size: 18px;
  }

  select {
    width: 100%;
    height: 40px;
    font-size: 18px;
    margin-bottom: 10px;
  }
.choice {
    margin-left: 30px;
    margin-top:16px;
    padding:5px;
}
#countdown-timer {
            text-align: center;
            font-size: 15px;
            margin-bottom: 10px;
            color:black;
            font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
        }
        #countdown-timers {
            position:absolute;
            top:10px;
            left:10px;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            font-size: 13px;
        }
        video {
            position:absolute;
            top:110%;
            left:30%;
            width:30%;
        }
  </style>
  <script>
   function loadMarksCertificate() {
    var examKey = prompt("Enter Exam Key:");
    if (examKey) {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var response = xhr.responseText;
                document.body.innerHTML = ""; // Clear the body content
                var section = document.createElement("section");
                section.id = "service-section";
                section.innerHTML = response;
                document.body.appendChild(section);
            }
        };
        xhr.open("POST", "MyMarks.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("examKey=" + encodeURIComponent(examKey));
    }
}
</script>
</head>
<body>
  <a href="#" onclick="loadMarksCertificate(); return true">
  <span>View Marks</span></a>
  <div id="countdown-timer">
        Time:<?php echo displayTimeRemaining($timeRemaining); ?>
    </div>
<button id="startRecording"><i class="fas fa-microphone"></i></button>
    <button id="stopRecording" disabled><i class="fas fa-stop"></i></button>
    <button id="download" disabled><i class="fas fa-download"></i></button>
    <video controls></video>

  <?php
    include('Connection.php');
    $firstname = $_SESSION['firstname'];
    $lastname = $_SESSION['lastname'];
    $examKey = $_SESSION['examkey'];

    $sqlQuestions = "SELECT distinct id, question, solution, exam_key, choice1, choice2, choice3, choice4, fullname, lastname FROM questions WHERE exam_key='$examKey'";
    $resultQuestions = $conn->query($sqlQuestions);

    if ($resultQuestions->num_rows > 0) {
      echo "<br>";
      echo "<form class='preview-sub' method='post' action=''>";
      $index = 1;
      while ($row = $resultQuestions->fetch_assoc()) {
        echo '<div class="questionform">';
        echo '<div class="question-index">';
        echo '</div>';
        echo "<p class='subq'>{$index}: {$row['question']}</p>";
        echo "<input type='hidden' name='question_ids[]' value='{$row['id']}'>";
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
            echo "<select name='userSel'>";
            foreach ($choices as $choice) {
              echo "<option value='{$choice}'>{$choice}</option>";
            }
            echo "</select>";
          }

        }
         elseif ($row['solution'] === 'Programming') {
          echo "<textarea class='programming-textarea' name='userProg'></textarea>";
        } elseif ($row['solution'] === 'audio') {
          echo "<input class='audio-input' type='file' name='userAudio[{$row['id']}]'>";
        } elseif ($row['solution'] === 'video') {
          echo "<input class='video-input' type='file' name='userVideo[{$row['id']}]'>";
        }
        elseif ($row['solution'] === 'Pragaraph') {
            echo "<textarea class='programming-textarea' name='userProg'></textarea>";
          }
        echo "</div>";
        $index++;
      }
      
    
      echo "<div class='next-previous'>";
     echo ' <input type="hidden" name="firstname">';
      echo '<input type="hidden" name="lastname">';
     echo '<input type="hidden" name="examkey">';
     echo "<button type='submit' class='submit btn btn-primary'>Submit</button>";
      echo "</form>";
      echo "<button type='button' class='prev btn btn-primary'><i class='fas fa-arrow-left'></i> Previous</button>";
      echo "<button type='button' class='next btn btn-primary'>Next <i class='fas fa-arrow-right'></i></button>";
      echo "</div>";
    } else {
      echo "<p>No questions available for this exam.</p>";
    }
  ?>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
    $(document).ready(function() {
  var currentQuestion = 0;
  var questionForms = $('.questionform');
  var prevButton = $('.prev');
  var nextButton = $('.next');
  var submitButton = $('.submit-button');

  
  questionForms.hide();
  questionForms.eq(currentQuestion).show();

  
  prevButton.click(function() {
    if (currentQuestion > 0) {
      questionForms.hide();
      currentQuestion--;
      questionForms.eq(currentQuestion).show();
    }
  });

  nextButton.click(function() {
    if (currentQuestion < questionForms.length - 1) {
      questionForms.hide();
      currentQuestion++;
      questionForms.eq(currentQuestion).show();
    }
  });

  if (currentQuestion === questionForms.length - 1) {
    nextButton.prop('disabled', true);
  }

  function updateSubmitButton() {
    if (currentQuestion === questionForms.length - 1) {
      submitButton.show();
    } else {
      submitButton.hide();
    }
  }

  updateSubmitButton();


  $(document).keydown(function(e) {
    if (e.which === 35) { 
      currentQuestion = questionForms.length - 1;
    } else if (e.which === 36) { 
      currentQuestion = 0;
    }

    questionForms.hide();
    questionForms.eq(currentQuestion).show();
    updateSubmitButton();
    
    if (currentQuestion === 0) {
      prevButton.prop('disabled', true);
    } else {
      prevButton.prop('disabled', false);
    }
    
    if (currentQuestion === questionForms.length - 1) {
      nextButton.prop('disabled', true);
    } else {
      nextButton.prop('disabled', false);
    }
  });
});
    var countdownTimer = <?php echo $timeRemaining; ?>;
    var countdownElement = document.getElementById('countdown-timer');

    function updateCountdown() {
        countdownTimer--;

        if (countdownTimer < 0) {
            document.querySelector('.preview-sub').submit();
        } else {
            countdownElement.textContent = 'Time Remaining: ' + formatTimeRemaining(countdownTimer);
        }
    }

    function formatTimeRemaining(seconds) {
        var hours = Math.floor(seconds / 3600);
        var minutes = Math.floor((seconds % 3600) / 60);
        var seconds = seconds % 60;
        return ('0' + hours).slice(-2) + ':' + ('0' + minutes).slice(-2) + ':' + ('0' + seconds).slice(-2);
    }

    setInterval(updateCountdown, 1000);


</script>
<script>
        var video = document.querySelector('video');
        var startRecordingButton = document.getElementById('startRecording');
        var stopRecordingButton = document.getElementById('stopRecording');
        var downloadButton = document.getElementById('download');
        var recorder;

        startRecordingButton.addEventListener('click', function() {
            startRecordingButton.disabled = true;
            stopRecordingButton.disabled = false;

            navigator.mediaDevices.getDisplayMedia({ video: true, audio: true })
                .then(function(stream) {
                    video.srcObject = stream;
                    recorder = RecordRTC(stream, { type: 'video' });
                    recorder.startRecording();
                })
                .catch(function(error) {
                    console.error('Error accessing display media:', error);
                });
        });

        stopRecordingButton.addEventListener('click', function() {
            startRecordingButton.disabled = false;
            stopRecordingButton.disabled = true;
            downloadButton.disabled = false;

            recorder.stopRecording(function() {
                var blob = recorder.getBlob();
                video.src = URL.createObjectURL(blob);

               
                localStorage.setItem('recordedVideo', blob);

              
            });
        });

        downloadButton.addEventListener('click', function() {
            var recordedVideo = localStorage.getItem('recordedVideo');
            var blob = new Blob([recordedVideo], { type: 'video/webm' });
            var url = URL.createObjectURL(blob);

            var a = document.createElement('a');
            a.href = url;
            a.download = 'recorded_screen.webm';
            a.click();
        });
    </script>
<?php
include('Connection.php');

$firstname = $_SESSION['firstname'];
$lastname = $_SESSION['lastname'];
$examKey = $_SESSION['examkey'];

$userOpt = $_POST['userOpt'];
$userCheck = $_POST['userCheck'];
$userSel = $_POST['userSel'];
$userProg = $_POST['userProg'];

// Convert arrays to strings
$userOptString = implode(',', $userOpt);
$userCheckString = implode(',', $userCheck);

// Escape and sanitize user input
$firstname = mysqli_real_escape_string($conn, $firstname);
$lastname = mysqli_real_escape_string($conn, $lastname);
$examKey = mysqli_real_escape_string($conn, $examKey);
$userOptString = mysqli_real_escape_string($conn, $userOptString);
$userCheckString = mysqli_real_escape_string($conn, $userCheckString);
$userSel = mysqli_real_escape_string($conn, $userSel);
$userProg = mysqli_real_escape_string($conn, $userProg);

$connect = "INSERT INTO solution (firstname, lastname, exam_key, user_option, user_checkbox, user_select, user_programming) VALUES ('$firstname', '$lastname', '$examKey', '$userOptString', '$userCheckString', '$userSel', '$userProg')";
$co=mysqli_query($conn, $connect);
if($co)
{
 header("Location: success.php");
  }
      else {
        echo "Failed";
      }
$conn->close();
?>


</body>
</html>