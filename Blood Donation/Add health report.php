<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input from the form
    $report_id = $_POST["report_id"];
    $patient_name = $_POST["patient_name"];
    $report_text = $_POST["report_text"];
    $report_date = $_POST["report_date"];

    // Connect to the database     
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "blood_donation";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert the health report into the database
    $sql = "INSERT INTO reports (report_id,patient_name, report_text, report_date) VALUES ('$report_id','$patient_name', '$report_text', '$report_date')";

    if ($conn->query($sql) === TRUE) {
        echo "Health report added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Add Health Report</title>
    <link rel="stylesheet" href="add health reports.css">
</head>
<body>
    <img src="images\logo.png" class="logo" >
    <h1 class="logo_topic">LIFEFLOW</h1>
    <h2 class="logo_sub_topic">Blood Donation System</h2>
    

    <nav class="navbar">
    <a href="home page.html">Home</a>
        <a href="about us page.html">About Us</a>
        <a href="donor home page.html">Donor</a>
        <a href="donation procedure.html">Donations</a>
        <a href="login page.php">Login</a>
        <a href="FAQs page.html">FAQs</a>
        <a href="staff registration.php">Staff REG</a>
        <span></span>
    </nav>

    <hr class="topic_line">
    <h1 class="topic">Add Health Reports</h1>

    <form action="Add health report.php" method="post">
        <label for="report_id" class="lables">Report ID:</label>
        <input type="text" name="report_id" required><br><br>

        <label for="patient_name" class="lables">Patient Name:</label>
        <input type="text" name="patient_name" required><br><br>

        <label for="report_text" class="lables">Report Text:</label>
        <textarea name="report_text" rows="5" required></textarea><br><br>

        <label for="report_date" class="lables">Report Date:</label>
        <input type="date" name="report_date" required><br><br>

        <input type="submit" value="Submit">
        <script>
            function showMessage () {
                alert("Submitted Successfully !");
            }

            document.getElementById
            ("submit_button").
            addEventListener("click",showMessage);
        </script>
    </form>

    <hr class="footer_line">
    <div class="footer">
        <a href="https://www.who.int/" target="_blank">
        <button type="button" class="help_button">Help and Support</button>
        </a>

        <div class="fb_icon">
            <a href="https://www.facebook.com/" target="_blank"><img src="images/facebook.png"></a>
        </div>

        <div class="insta_icon">
            <a href="https://www.instagram.com/" target="_blank"><img src="images/insta.png"></a>
        </div>

        <div class="twitt_icon">
            <a href="https://www.twitter.com/" target="_blank"><img src="images/Twitter.png"></a>
        </div>

        <div class="yt_icon">
            <a href="https://www.youtube.com/watch?v=ku0zMBVjjAs" target="_blank"><img src="images/yt.png"></a>
        </div>
    </div>

    <div class="contacts">
        <h1 class="Genaral">Genaral: +94225 225 25</h1>
        <h1 class="Donor_section">Donor Section: +94522 522 52</h1>
    </div>
</body>
</html>
