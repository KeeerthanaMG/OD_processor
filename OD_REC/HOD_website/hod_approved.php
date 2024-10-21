<?php
include 'navbar.php'; 
session_start();
$servername = "localhost";
$username = "root";
$password = "";  // Add your MySQL password
$dbname = "test";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT name, event_name FROM odapply WHERE status='Approved'";
$result = $conn->query($sql);
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Update the status to Approved
    $sql = "UPDATE odapply SET status='Approved' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: hod_pending_list.php"); // Redirect to the HOD pending list
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Approved OD Applications</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Approved OD List</h2>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Student Name</th>
                    <th>Event Name</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['name']}</td>
                                <td>{$row['event_name']}</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='2'>No approved applications</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php
$conn->close();
?>
