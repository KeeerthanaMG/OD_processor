<?php
$servername = "localhost";
$username = "root";
$password = "";  // Add your MySQL password
$dbname = "test";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$rollno = 'someRollNo';  // Assume this is retrieved from session/login
$sql = "SELECT event_name, status FROM odapply WHERE roll_no='$rollno'";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Your OD Status</h2>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Event Name</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $statusColor = $row['status'] == 'Approved' ? 'green' : 'red';
                        echo "<tr>
                                <td>{$row['event_name']}</td>
                                <td style='color: $statusColor'>{$row['status']}</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='2'>No OD applications found</td></tr>";
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
