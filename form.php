<?php
session_start();

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);

    if (empty($name) || empty($email)) {
        $error = "All fields are required!";
    } else {
        $_SESSION["name"] = $name;
        $_SESSION["email"] = $email;

        setcookie("username", $name, time() + 3600, "/");

        header("Location: dashboard.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>

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

        .form {
            background: white;
            padding: 30px;
            width: 350px;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        .form h2 {
            text-align: center;
            margin-bottom: 20px;
       
        }

        .form input[type="text"],
        .form input[type="email"] {
            width: 92%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form input[type="submit"] {
            width: 50%;
            padding: 10px;
            background-color: #007ef5;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;

            display: block;
            margin: 20px auto 0 auto; /* centers the button */
        }

        .form input[type="submit"]:hover {
            background-color: #013d75;
        }

        .error {
            color: red;
            text-align: center;
            margin-bottom: 10px;
        }
    </style>

</head>

<body>

<div class="form">
    <h2>Login Form</h2>

    <?php if (!empty($error)) { ?>
        <p class="error"><?php echo $error; ?></p>
    <?php } ?>

    <form method="POST" action="">
        <label>Name:</label>
        <input type="text" name="name">

        <label>Email:</label>
        <input type="email" name="email">

        <input type="submit" value="Submit">
    </form>
</div>

</body>
</html>