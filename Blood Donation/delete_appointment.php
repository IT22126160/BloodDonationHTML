<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the form was submitted
    if (isset($_POST["delete_appointment"])) {
        // Get the appointment_id from the form
        $appointment_id = $_POST["appointment_id"];

        // Connect to the database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "blood_donation";

        $conn = new mysqli($servername, $username, $password, $database);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Delete the appointment from the database
        $sql = "DELETE FROM appointments WHERE appointment_id = '$appointment_id'";

        if ($conn->query($sql) === TRUE) {
            echo "Appointment deleted successfully!";
            header("Location: show_appointment.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Delete Appointment</title>
</head>
<body>
    <h1>Delete Appointment</h1>
    <form action="delete_appointment.php" method="post">
        <label for="appointment_id">Appointment ID to Delete:</label>
        <input type="text" name="appointment_id" required><br><br>

        <input type="submit" name="delete_appointment" value="Delete Appointment">
    </form>
</body>
</html>