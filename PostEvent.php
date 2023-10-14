<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post-Event</title>
</head>
<body>
    <h1>So you had your event...tell us all about it</h1>
    <h2>Post-Event Review</h2>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['eventSummary'])) {
            $eventSummary = $_POST['eventSummary'];
            echo "<p>$eventSummary</p>";
        }
    }
    ?>
    <form id="postEventForm" action="" method="POST" enctype="multipart/form-data">
        <textarea id="eventSummary" name="eventSummary" rows="4" required></textarea><br>
        <button type="submit">Submit Review</button>
    </form>

    <a href="home.php"><button>Go to Home</button></a>
</body>
</html>
