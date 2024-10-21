<?php
include 'navbar.php';  // Include the navbar at the top of the page

$servername = "localhost";
$username = "root";
$password = "";  // Add your MySQL password
$dbname = "test";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, name, event_name, od_date FROM odapply WHERE status='Pending' ORDER BY od_date ASC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OD Pending List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>OD Pending List</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Student Name</th>
                    <th>Event Name</th>
                    <th>Event Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['name']}</td>
                                <td>{$row['event_name']}</td>
                                <td>{$row['od_date']}</td>
                                <td>
                                    <a href='view_od.php?id={$row['id']}' class='btn btn-info'>View Details</a>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No pending applications</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php $conn->close(); ?>
