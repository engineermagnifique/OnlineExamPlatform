<?php
include('Connection.php');


if (isset($_GET['exam_key'])) {
  
  $examKey = mysqli_real_escape_string($conn, $_GET['exam_key']);

  
  $query = "SELECT * FROM solution WHERE exam_key = '$examKey'";
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) === 0) {
    $noResults = true;
  } else {
    $noResults = false;
  }
} else {
  $result = false;
  $noResults = false;
}
?>

<button onclick="fetchExamResults()">Enter Exam Key</button>

<div id="examResults">
  <?php if ($noResults) { ?>
    <p>No results found for the entered exam key.</p>
  <?php } elseif ($result) { ?>
    <table>
      <thead>
        <tr>
          <th>Firstname</th>
          <th>Lastname</th>
          <th>Exam Key</th>
          <th>User Option</th>
          <th>User Checkbox</th>
          <th>User Select</th>
          <th>User Programming</th>
          <th>Marks</th>
          <th>Add Marks</th>
          <th>Delete Marks</th>
        </tr>
      </thead>
      <tbody>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
          $id = $row['id'];
          $firstname = $row['firstname'];
          $lastname = $row['lastname'];
          $examKey = $row['exam_key'];
          $userOptString = $row['user_option'];
          $userCheckString = $row['user_checkbox'];
          $userSel = $row['user_select'];
          $userProg = $row['user_programming'];
          $marks = $row['Marks'];

        
          $userOpt = explode(',', $userOptString);
          $userCheck = explode(',', $userCheckString);
        ?>
          <tr>
            <td><?php echo $firstname; ?></td>
            <td><?php echo $lastname; ?></td>
            <td><?php echo $examKey; ?></td>
            <td><?php echo implode(', ', $userOpt); ?></td>
            <td><?php echo implode(', ', $userCheck); ?></td>
            <td><?php echo $userSel; ?></td>
            <td><?php echo $userProg; ?></td>
            <td><?php echo $marks; ?></td>
            <td><button onclick="addMarks(<?php echo $id; ?>)">Add Marks</button></td>
            <td><button onclick="deleteMarks(<?php echo $id; ?>)">Delete Marks</button></td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  <?php
  }
  ?>
</div>

<script>
  function fetchExamResults() {
    var examKey = prompt("Enter the exam key:");

  
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
      if (xhr.readyState == 4 && xhr.status == 200) {
    
        document.getElementById('examResults').innerHTML = xhr.responseText;
      }
    };
    xhr.open("GET", "try.php?exam_key=" + encodeURIComponent(examKey), true);
    xhr.send();
  }

  function addMarks(id) {
    
    var newMarks = prompt("Enter the new marks:");

    
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
      if (xhr.readyState == 4 && xhr.status == 200) {
      
        fetchExamResults();
      }
    };
    xhr.open("POST", "update_marks.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("id=" + encodeURIComponent(id) + "&newMarks=" + encodeURIComponent(newMarks));
  }

  function deleteMarks(id) {
    var confirmDelete = confirm("Are you sure you want to delete this row?");
    
    if (confirmDelete) {
        var name = prompt("Enter the name:");
        var examKey = prompt("Enter the exam key:");

        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                fetchExamResults();
            }
        };
        xhr.open("POST", "delete_row.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("id=" + encodeURIComponent(id) + "&name=" + encodeURIComponent(name) + "&examKey=" + encodeURIComponent(examKey));
    }
  }

</script>
