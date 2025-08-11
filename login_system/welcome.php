<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: index.html");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
</head>
<body>
    <h1>Welcome, <?php echo $_SESSION['email']; ?>!</h1>
    <p>Your mobile number is: <?php echo $_SESSION['mobile']; ?></p>
    <a href="logout.php">Logout</a>
</body>
</html>
