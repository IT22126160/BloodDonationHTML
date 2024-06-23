<?php
session_start();

// Check if the user is not logged in
if (!isset($_SESSION["email"])) {
    // Redirect to the login page or any other appropriate action
    header("Location: Donor login page.php");
    exit;
}

// Database connection
$conn = mysqli_connect("localhost", "root", "", "blood_donation");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve user's feedback
$email = $_SESSION['email'];
$selectQuery = "SELECT feedback FROM f_user WHERE email = ?";
$stmt = $conn->prepare($selectQuery);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

$feedbackData = $result->fetch_assoc();

$stmt->close();
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Feedback Page</title>
</head>
<body>
    <h1>Your Feedback</h1>
    <p><?php echo isset($feedbackData['feedback']) ? $feedbackData['feedback'] : "No feedback available"; ?></p>
    
    <a href="donor profile page.php">Back to Profile</a>
</body>
</html>
