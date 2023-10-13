!DOCTYPE html> 
html lang="en">
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
                <ul class ="navbar-nav ms-auto">
                <ul class ="navbar-nav ms-auto">
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="index.php">Home</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="createEvent.php">Create an Event</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="guest_list.php">Guest List</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="contact.php">Contact Us</a></li>
                </ul>
            </nav>
        </header>
        <div id="mission statement">
        <?php
function readTextFile($filename) {
    $lines = [];

    if (file_exists($filename)) {
        $file = fopen($filename, 'r');

        if ($file) {
            while (($line = fgets($file)) !== false) {
                $lines[] = trim($line); 
            }

            fclose($file);
        } else {
            echo "Error opening file: $filename";
        }
    } else {
        echo "File does not exist: $filename";
    }

    return $lines;
}

$filename = './midterm.txt'; 
$data = readTextFile($filename);

foreach ($data as $line) {
    echo $line . "<br>";
}
?>
        </div>
        <footer>
            &copy; 2023
        </footer>
    </body>
/html>