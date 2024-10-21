<?php
// Include connection to database

$servername = "localhost";
$username = "root";
$password = "";  // Add your MySQL password
$dbname = "test";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch form data
$name = $_POST['name'];
$department = $_POST['department'];
$year = $_POST['year'];
$rollno = $_POST['rollno'];
$section = $_POST['section'];
$email = $_POST['email'];
$event_name = $_POST['event_name'];
$od_reason = $_POST['od_reason'];
$od_date = $_POST['od_date'];
$is_inside = $_POST['is_inside'];
$college_name = $is_inside == '0' ? $_POST['college_name'] : NULL;

// Insert into database
$sql = "INSERT INTO odapply (name, department, year, roll_no, section, mail_id, event_name, od_reason, od_date, is_inside, college_name)
        VALUES ('$name', '$department', '$year', '$rollno', '$section', '$email', '$event_name', '$od_reason', '$od_date', '$is_inside', '$college_name')";

if ($conn->query($sql) === TRUE) {
    header("Location: status.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
