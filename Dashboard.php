<?php
$events = [
    ['id' => 1, 'title' => 'Event 1', 'date' => '2023-10-15'],
    ['id' => 2, 'title' => 'Event 2', 'date' => '2023-11-01'],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h1>Dashboard</h1>
    <h2>Events</h2>
      <?php
    $events = [
     ['id' => 1, 'title' => 'Event 1', 'date' => '2023-10-15'],
     ['id' => 2, 'title' => 'Event 2', 'date' => '2023-11-01'],
    ];
    

    if (count($events) > 0) {
        echo '<ul>';
        foreach ($events as $event) {
            echo '<li>';
            echo '<strong>' . $event['title'] . '</strong><br>';
            echo 'Date: ' . $event['date'] . '<br>';         
            echo 'Time: ' . (isset($event['time']) ? $event['time'] : 'N/A') . '<br>';
            echo 'Location: ' . (isset($event['location']) ? $event['location'] : 'N/A') . '<br>';
            echo 'Description: ' . (isset($event['description']) ? $event['description'] : 'N/A'); 
            echo '</li>';
        }
        echo '</ul>';
    } else {
        echo '<p>No upcoming events.</p>';
    }
    ?>
    <h2>Create New Event</h2>
	<form action="Tasks.php" method="post">
        <label for="eventTitle">Event Title:</label>
        <input type="text" id="eventTitle" name="eventTitle" required><br>
        <label for="eventDate">Event Date:</label>
        <input type="date" id="eventDate" name="eventDate" required><br>		
		<label for="eventTitle">Event Time:</label>
        <input type="text" id="eventTitle" name="eventTitle" required><br>		
		<label for="eventTitle">Event Location:</label>
        <input type="text" id="eventTitle" name="eventTitle" required><br>		
		<label for="eventDescription">Event Description:</label><br>
        <textarea id="eventDescription" name="eventDescription" rows="4" required></textarea><br>
        <button id="createEventbutton" onclick="redirectToTasks()">Create Event</button>
    </form>
</body>
</html>
