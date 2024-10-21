<?php
include 'navbar.php';
$servername = "localhost";
$username = "root";
$password = "";  // Add your MySQL password
$dbname = "test";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id'];
$sql = "SELECT * FROM odapply WHERE id='$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OD Application Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>OD Application Details</h2>

        <table class="table table-bordered">
            <tr><th>Name</th><td><?php echo $row['name']; ?></td></tr>
            <tr><th>Department</th><td><?php echo $row['department']; ?></td></tr>
            <tr><th>Year</th><td><?php echo $row['year']; ?></td></tr>
            <tr><th>Roll No</th><td><?php echo $row['roll_no']; ?></td></tr>
            <tr><th>Section</th><td><?php echo $row['section']; ?></td></tr>
            <tr><th>Mail ID</th><td><?php echo $row['mail_id']; ?></td></tr>
            <tr><th>Event Name</th><td><?php echo $row['event_name']; ?></td></tr>
            <tr><th>OD Reason</th><td><?php echo $row['od_reason']; ?></td></tr>
            <tr><th>OD Date</th><td><?php echo $row['od_date']; ?></td></tr>
            <tr><th>Inside College</th><td><?php echo $row['is_inside'] ? 'Yes' : 'No'; ?></td></tr>
            <tr><th>College Name (if outside)</th><td><?php echo $row['college_name']; ?></td></tr>
        </table>

        <form action="approve_od.php" method="post">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <button type="submit" class="btn btn-success">Approve</button>
        </form>
    </div>
</body>
</html>

<?php
$conn->close();
?>
