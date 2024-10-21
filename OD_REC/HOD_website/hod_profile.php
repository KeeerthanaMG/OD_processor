<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'hod') {
    header("Location: ../login.php");
    exit();
}

// Assuming you have a database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

$conn = new mysqli($servername, $username, $password, $dbname);
$user = $_SESSION['username'];
$sql = "SELECT * FROM hod WHERE username='$user'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOD Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .profile-container {
            margin: 50px auto;
            padding: 30px;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
        }
        .profile-container:hover {
            transform: scale(1.02);
        }
        .profile-header {
            background: #1d4b8f;
            color: white;
            padding: 15px;
            border-radius: 10px 10px 0 0;
        }
        .profile-content {
            padding: 20px;
        }
        button {
    transition: background-color 0.3s ease-in-out;
}

button:hover {
    background-color: #143a6c;
}

.profile-container, .apply-form-container, .status-container {
    transition: transform 0.3s ease-in-out;
}

.profile-container:hover, .apply-form-container:hover, .status-container:hover {
    transform: scale(1.02);
}

.table-hover tbody tr:hover {
    background-color: #f1f3f5;
}

.navbar {
    transition: background-color 0.4s ease;
}

    </style>
</head>
<body>
    <?php include 'navbar.php'; ?>  <!-- Including the navbar -->
    <div class="container profile-container">
        <div class="profile-header text-center">
            <h3>Welcome, <?php echo $row['name']; ?></h3>
        </div>
        <div class="profile-content">
            <p><strong>HOD ID: </strong><?php echo $row['hod_id']; ?></p>
            <p><strong>Department: </strong><?php echo $row['department']; ?></p>
            <p><strong>Email: </strong><?php echo $row['email']; ?></p>
        </div>
    </div>
</body>
</html>

<?php $conn->close(); ?>
