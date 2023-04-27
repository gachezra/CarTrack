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
    <!-- Registered Cars -->
    <div class="container my-4">
      <h1>Registered Cars</h1>
      <table class="table">
        <thead>
          <tr>
            <th>Name</th>
            <th>Phone Number</th>
            <th>Car Name</th>
            <th>Car Plate Number</th>
            <th>Driver Name</th>
          </tr>
        </thead>
        <tbody>
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
  
            // Select data from the "details" table
            $sql = "SELECT * FROM details";
            $result = mysqli_query($conn, $sql);
  
            // Loop through the results and display them in the table
            while ($row = mysqli_fetch_assoc($result)) {
              echo "<tr>";
              echo "<td>" . $row['name'] . "</td>";
              echo "<td>" . $row['phone'] . "</td>";
              echo "<td>" . $row['car'] . "</td>";
              echo "<td>" . $row['plate'] . "</td>";
              echo "<td>" . $row['driver'] . "</td>";
              echo "</tr>";
            }
  
            // Close the database connection
            mysqli_close($conn);
          ?>
        </tbody>
      </table>
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