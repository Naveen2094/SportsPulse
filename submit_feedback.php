<?php
include 'db_connect.php';

$response = ""; // Variable to store response message

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST['name'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    if (empty($full_name) || empty($phone) || empty($message)) {
        $response = "All fields are required!";
    } else {
        $stmt = $conn->prepare("INSERT INTO feedback (full_name, phone, message) VALUES (?, ?, ?)");
        
        if (!$stmt) {
            $response = "Prepare failed: " . $conn->error;
        } else {
            $stmt->bind_param("sss", $full_name, $phone, $message);
            if ($stmt->execute()) {
                $response = "Feedback submitted successfully!";
            } else {
                $response = "Execution failed: " . $stmt->error;
            }
            $stmt->close();
        }
    }
    $conn->close();
    echo $response; // Send the response back to AJAX
}
?>
