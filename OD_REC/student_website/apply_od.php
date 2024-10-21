<?php
session_start();
$servername = "localhost";
$username = "root";
$password = ""; // Your MySQL password
$dbname = "test";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Assuming the form method is POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $rollno = $_SESSION['roll_no']; // Retrieve from session or form
    $event_name = $_POST['event_name'];
    $od_reason = $_POST['od_reason'];
    $od_date = $_POST['od_date'];
    $college_type = $_POST['college_type']; // Inside/Outside
    $outside_college_name = $_POST['outside_college_name'] ?? ''; // Handle optional field

    // Insert into database
    $sql = "INSERT INTO odapply (roll_no, event_name, od_reason, od_date, status, college_type, outside_college_name)
            VALUES ('$rollno', '$event_name', '$od_reason', '$od_date', 'Pending', '$college_type', '$outside_college_name')";

    if ($conn->query($sql) === TRUE) {
        header("Location: status.php"); // Redirect to the status page
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply OD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class='navbar navbar-expand-lg navbar-dark bg-primary'>
            <a class='navbar-brand' href='#'>Student Portal</a>
            <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarNav'>
                <span class='navbar-toggler-icon'></span>
            </button>
            <div class='collapse navbar-collapse' id='navbarNav'>
                <ul class='navbar-nav'>
                    <li class='nav-item'><a class='nav-link' href='apply_od.php'>Apply OD</a></li>
                    <li class='nav-item'><a class='nav-link' href='profile.php'>Profile</a></li>
                    <li class='nav-item'><a class='nav-link' href='status.php'>Status</a></li>
                </ul>
            </div>
        </nav>
    <div class="container mt-5">
        <h2>Apply for OD</h2>
        <form action="submit_od.php" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="mb-3">
                <label for="department" class="form-label">Department</label>
                <select id="department" name="department" class="form-control">
                    <option value="CSE">CSE</option>
                    <option value="ECE">ECE</option>
                    <option value="EEE">EEE</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="year" class="form-label">Year</label>
                <select id="year" name="year" class="form-control">
                    <option value="1">1st Year</option>
                    <option value="2">2nd Year</option>
                    <option value="3">3rd Year</option>
                    <option value="4">4th Year</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="rollno" class="form-label">Roll Number</label>
                <input type="number" class="form-control" id="rollno" name="rollno" required>
            </div>

            <div class="mb-3">
                <label for="section" class="form-label">Section</label>
                <select id="section" name="section" class="form-control">
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="mb-3">
                <label for="event_name" class="form-label">Event Name</label>
                <input type="text" class="form-control" id="event_name" name="event_name" required>
            </div>

            <div class="mb-3">
                <label for="od_reason" class="form-label">OD Reason</label>
                <textarea class="form-control" id="od_reason" name="od_reason" required></textarea>
            </div>

            <div class="mb-3">
                <label for="od_date" class="form-label">OD Applying Date</label>
                <input type="date" class="form-control" id="od_date" name="od_date" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Inside or Outside College</label><br>
                <input type="radio" name="is_inside" value="1" checked> Inside College<br>
                <input type="radio" name="is_inside" value="0"> Outside College<br>
            </div>

            <div class="mb-3" id="outside_college" style="display: none;">
                <label for="college_name" class="form-label">College Name</label>
                <input type="text" class="form-control" id="college_name" name="college_name">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script>
        // Show/Hide college name input when "Outside College" is selected
        document.querySelectorAll('input[name="is_inside"]').forEach((elem) => {
            elem.addEventListener('change', function() {
                const collegeField = document.getElementById('outside_college');
                if (this.value == '0') {
                    collegeField.style.display = 'block';
                } else {
                    collegeField.style.display = 'none';
                }
            });
        });
    </script>
</body>
</html>
