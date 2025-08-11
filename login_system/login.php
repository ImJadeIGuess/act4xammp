<?php
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "login_system";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted via POST
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    die("Please submit the form from the login page.");
}

// Debug: check what data we got
if (empty($_POST['email']) || empty($_POST['password'])) {
    echo "<pre>POST data: ";
    print_r($_POST);
    echo "</pre>";
    die("Email or password not provided.");
}

$email = $_POST['email'];
$pass  = $_POST['password'];

// Prepare SQL to prevent SQL injection
$stmt = $conn->prepare("SELECT * FROM logins WHERE email = ? AND password = ?");
$stmt->bind_param("ss", $email, $pass);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "Login successful!";
} else {
    echo "Invalid email or password.";
}

$stmt->close();
$conn->close();
?>
