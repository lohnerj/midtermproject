<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Freelancer - Start Bootstrap Theme</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <header class="masthead bg-primary text-white text-center" >
            <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="main navigation">
                <ulclass ="navbar-nav ms-auto">
                <ul class ="navbar-nav ms-auto">
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="index.php">Home</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="createEvent.php">Create an Event</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="guest_list.php">Guest List</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="contact.php">Contact Us</a></li>
                </ul>
            </nav>
        </header>
        <?php
        $eventErr = $numberErr = $dateErr = $timeErr = $musicErr = $foodErr = $drinksErr = "";
        $drinks = $number = $date = $time = $music = $food = $drinks = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            If (empty($_POST["event type"])){
                $eventErr = "Input is Required";
            } 
            else {
                $event = test_input($_POST["event type"]);
            }
            If (empty($_POST["number"])){
                $numberErr = "Input is Required";
            } 
            else {
                $number = test_input($_POST["number"]);
            } 
            If (empty($_POST["dates"])){
                $dateErr = "Input is Required";
            } 
            else {
                $date = test_input($_POST["dates"]);
            }
            If (empty($_POST["time"])){
                $timeErr = "Input is Required";
            } 
            else {
                $time = test_input($_POST["time"]);
            }
            If (empty($_POST["music"])){
                $musicErr = "Input is Required";
            } 
            else {
                $music = test_input($_POST["music"]);
            }
            If (empty($_POST["food"])){
                $foodErr = "Input is Required";
            } 
            else {
                $food = test_input($_POST["food"]);
            }
            If (empty($_POST["drinks"])){
                $drinksErr = "Input is Required";
            } 
            else {
                $drinks = test_input($_POST["drinks"]);
            }
        }
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        
        ?>
        <div id="main content">
            <h1><?php echo "Plan Your Event"?></h1>
        </div>
        <div id="form">
            Event Type: <textarea name="event type" rows="1" cols="25">?php echo $event;?></textarea>
            <br><br>
            Number of Guests: <input type="number" name="number">?php echo $number;?>
            <br><br>
            Date: <textarea name="dates" rows="1" cols="25"><?php echo $date;?></textarea>
            <br><br>
            Time: <textarea name="time" rows="1" cols="25"><?php echo $time;?></textarea>
            <br><br>
            Music: <textarea name="music" rows="20" cols="25"><?php echo $music;?></textarea>
            <br><br>
            Food: <textarea name="food" rows="30" cols="40"><?php echo $food;?></textarea>
            <br><br>
            Drinks: <textarea name="drinks" rows="30" cols="40"><?php echo $drinks;?></textarea>
            <br><br>
            <input type="submit" name="submit" value="submit">
        </div>
        <footer>
            &copy; 2023
        </footer>
    </body>
</html>