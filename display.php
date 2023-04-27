<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Tracker</title>
  </head>
  <body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3">
       <div class="container justify-content-center">
         <a href="index.php" class="navbar-brand">254 Track</a>
         <a href="register.html" class="navbar-brand">Register</a>
       </div>
    </nav>
    <!-- Search Bar -->
    <section>
        <div class="container my-4">
            <h1>Search for Registered Cars</h1>
            <form action="display.php" method="GET">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Enter Plate Number" aria-label="Enter Plate Number" aria-describedby="button-addon2" id="vin" name="plate">
                    <button class="btn btn-outline-primary" type="submit" id="search">Search</button>
                </div>
            </form>
        </div>
    </section>
    <?php
    // Connect to the database
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "254track";
    $conn = mysqli_connect($host, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Check if the search query is set
    if (isset($_GET['plate'])) {
        // Escape the search query to prevent SQL injection
        $search_query = mysqli_real_escape_string($conn, $_GET['plate']);

        // Select data from the "details" table based on the search query
        $sql = "SELECT * FROM details WHERE plate='$search_query'";
        $result = mysqli_query($conn, $sql);

        // Check if any results were found
        if (mysqli_num_rows($result) > 0) {
            // Display the results in a table
            echo "<table class='table'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th>Name</th>";
            echo "<th>Phone Number</th>";
            echo "<th>Car Name</th>";
            echo "<th>Car Plate Number</th>";
            echo "<th>Driver Name</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['phone'] . "</td>";
                echo "<td>" . $row['car'] . "</td>";
                echo "<td>" . $row['plate'] . "</td>";
                echo "<td>" . $row['driver'] . "</td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
        } else {
            // Display a message if no results were found
            echo "No results found.";
        }
    }

    // Close the database connection
    mysqli_close($conn);
    ?>
    <div class="container text-center">
        <span class="fw-bold">Location </span>
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d63823.038717524294!2d36.87711607259666!3d-1.2023068597567381!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2ske!4v1682608622502!5m2!1sen!2ske" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <!-- Footer -->
    <footer class="p-5 bg-dark text-white text-center position-relative">
      <div class="container">
        <p class="lead">Copyright &copy; 2023 254 Track</p>
       </div>
    </footer>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>