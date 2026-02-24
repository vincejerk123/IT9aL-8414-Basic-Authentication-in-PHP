<?php
session_start();

// If logout button is clicked
if (isset($_GET['logout'])) {

    $_SESSION = [];
    session_destroy();

    setcookie("username", "", time() - 3600, "/");
    header("Location: form.php");
    exit();
}

// Access protection
if (!isset($_SESSION['name']) || !isset($_SESSION['email'])) {
    header("Location: form.php");
    exit();
}

$name = $_SESSION['name'];
$email = $_SESSION['email'];
$cookieName = isset($_COOKIE['username']) ? $_COOKIE['username'] : "No cookie found";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .card {
            background: white;
            padding: 30px;
            width: 400px;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            text-align: center;
        }

        .logout-btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007ef5;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .logout-btn:hover {
            background-color: #013d75;
        }
    </style>

</head>
<body>

<div class="card">
    <h2>Dashboard</h2>

    <p><strong>Welcome:</strong> <?php echo htmlspecialchars($name); ?></p>
    <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
    <p><strong>Cookie Value:</strong> <?php echo htmlspecialchars($cookieName); ?></p>

    <!-- Logout Button -->
    <a href="dashboard.php?logout=true" class="logout-btn">Logout</a>
</div>

</body>
</html>