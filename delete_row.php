<?php
include('Connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $examKey = mysqli_real_escape_string($conn, $_POST['examKey']);

    $deleteQuery = "DELETE FROM solution WHERE id = '$id' AND firstname = '$name' AND exam_key = '$examKey'";
    $deleteResult = mysqli_query($conn, $deleteQuery);

    if ($deleteResult) {
        echo "Row deleted successfully";
    } else {
        echo "Error deleting row: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request method";
}
?>
<script>
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