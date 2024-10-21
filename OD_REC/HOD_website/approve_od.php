<?php
$servername = "localhost";
$username = "root";
$password = "";  // Add your MySQL password
$dbname = "test";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_POST['id'];
$sql = "UPDATE odapply SET status='Approved' WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    header("Location: hod_pending.php");
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>
