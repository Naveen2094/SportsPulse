<?php
include 'db_connect.php'; // Database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $event = $_POST['event'];

    $sql = "INSERT INTO event_registrations (full_name, email, phone, event_name) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $name, $email, $phone, $event);

    if ($stmt->execute()) {
        echo "<p style='color: green;'>✔ Registration Successful!</p>";
    } else {
        echo "<p style='color: red;'>❌ Error in Registration!</p>";
    }

    $stmt->close();
    $conn->close();
}
?>
