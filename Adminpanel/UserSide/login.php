<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['email'], $_POST['password']) &&
        !empty($_POST['email']) &&
        !empty($_POST['password'])) {

        $email = $_POST['email'];
        $password = $_POST['password'];

        // Establish database connection
        $conn = new mysqli('localhost', 'root', '', 'usersignupin');
        if ($conn->connect_error) {
            die('Connection failed: ' . $conn->connect_error);
        }

        // Prepare SQL statement to prevent SQL injection
        $stmt = $conn->prepare("SELECT password FROM registration WHERE email = ?");
        if ($stmt === false) {
            die('Prepare failed: ' . $conn->error);
        }
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($storedHashedPassword);
        $stmt->fetch();
        // Verify password and handle successful login
        if ($storedHashedPassword && password_verify($password, $storedHashedPassword)) {
            echo "Login successful!";
            header("Location: UserHomePage.php");
            exit; // Ensure no further code is executed after redirect
        } else {
            echo "Invalid email or password.";
        }

        $stmt->close();
        $conn->close();
    } else {
        echo "Please fill in all required fields.";
    }
} else {
    echo "Invalid request method.";
}
?>
