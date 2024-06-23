<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$database = "blood_donation";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle appointment deletion when the "Delete" button is clicked
if (isset($_POST['delete_appointment'])) {
    $appointment_id_to_delete = $_POST['appointment_id'];
    
    // Add appropriate validation and error handling here

    // Perform the deletion
    $sql = "DELETE FROM appointments WHERE appointment_id = '$appointment_id_to_delete'";
    if ($conn->query($sql) === TRUE) {
        echo "Appointment with ID $appointment_id_to_delete deleted successfully.";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Fetch appointment reservations from the database
$sql = "SELECT * FROM appointments"; 
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output the data in an HTML table
    echo "<table>";
    echo "<tr><th>Appointment ID</th><th>Name</th><th>Date</th><th>Action</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["appointment_id"] . "</td>";
        echo "<td>" . $row["name_with_initials"] . "</td>";
        echo "<td>" . $row["donation_date"] . "</td>";
        echo "<td>" . $row["phone_number"] . "</td>";
        echo "<td>" . $row["center"] . "</td>";
        echo '<td>
                <form method="post" action="delete_appointment.php">
                    <input type="hidden" name="appointment_id" value="' . $row["appointment_id"] . '">
                    <input type="submit" name="delete_appointment" value="Delete">
                </form>
              </td>';
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No appointment reservations found.";
}

$conn->close();
?>