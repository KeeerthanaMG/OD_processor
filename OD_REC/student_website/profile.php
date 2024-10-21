<?php
// Assume session or login validation

echo "
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Profile</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css' rel='stylesheet'>
</head>
<body>
    <div class='container'>
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

        <div class='mt-4'>
            <h2>Welcome to the Student Profile</h2>
            <p>Here you can view your attendance and profile details.</p>
        </div>
    </div>
</body>
</html>
";
?>
