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
        <div class="container">
          <a href="#" class="navbar-brand">254 Track</a>
          <div class="" id="navmenu">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <a href="#track" class="nav-link">Track</a>
              </li>
              <li class="nav-item">
                <a href="#questions" class="nav-link">Questions</a>
              </li>
              <li class="nav-item">
                <a href="#contact" class="nav-link">Contact</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- Welcome -->
    <section class="bg-dark text-light p-5 p-lg-0 pt-lg-5 text-center text-sm-start">
    <div class="container">
      <div class="d-sm-flex align-items-center justify-content-between">
        <div class="p-3">
          <h1>Get your car a  <span class="text-warning">Tracker</span></h1>
          <p class="lead my-4">
            We focus on keeping your cars safe by providing actual feedback to where and when your car is only at the palm of your hand.
          </p>
        </div>
        <img class="img-fluid w-50 d-none d-sm-block" src="sport-car.png" alt="Sport Car"/>
      </div>
    </div>
    </section>
    <section id="track" class="text-center">
        <div class="container mt-3">
            <h1>How it works</h1>
            <P>Head on to the <a href="track.php">Tracking</a> page where you will be able to input your vehicle's Vin number which will ping it's location to the nearest cell tower giving you the exact location along with the car's details and driver if it's comercial.</P>
            <h3 class="mb-5">The query will give out an answer similar to this</h3>
            
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
                        $sql = "SELECT * FROM details WHERE id=2";
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
                    <span class="fw-bold">Location </span>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d63823.038717524294!2d36.87711607259666!3d-1.2023068597567381!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2ske!4v1682608622502!5m2!1sen!2ske" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </section>
    <!-- Newsletter -->
    <section class="bg-primary text-light p-5">
        <div class="container">
          <div class="d-md-flex justify-content-between align-items-center">
            <h3 class="m-0 border-0 shadow1">Sign up for our Newsletter to get more information and offers</h3>
  
            <div class="input-group news-input">
              <input type="text" class="form-control" placeholder="Enter Email" />
              <button class="btn btn-dark btn-lg" type="button">Submit</button>
            </div>
          </div>
        </div>
      </section>
    <!-- Question Accordion -->
    <section id="questions" class="p-5">
        <div class="container border-1 shadow-1">
          <h2 class="text-center mb-4">Frequently Asked Questions</h2>
          <div class="accordion accordion-flush" id="questions">
            <!-- Item 1 -->
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#question-one">
                  Where exactly are you located?
                </button>
              </h2>
              <div id="question-one" class="accordion-collapse collapse" data-bs-parent="#questions">
                <div class="accordion-body">
                  Main offices are located at Lang'ata, Nairobi. But there are various branches throughout Kenya.
                </div>
              </div>
            </div>
            <!-- Item 2 -->
            <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#question-two">
                    How does the tracking work?
                  </button>
                </h2>
                <div id="question-two" class="accordion-collapse collapse" data-bs-parent="#questions">
                  <div class="accordion-body">
                    Your car is fitted with a tracker that will respond to every ping that will be sent to it.
                  </div>
                </div>
              </div>
        </div>
      </section>
      <hr class="mb-auto">
      <!-- Contact & Map -->
    <section class="p-5" id="contact">
    <div class="container">
        <div class="row g-4">
          <h2 class="text-center mb-4">Contact Info</h2>
          <div class="col-md">
          <ul class="list-group list-group-flush lead">
            <li class="list-group-item">
              <span class="fw-bold">Main Location:</span> Lang'ata in Nairob, Kenya
            </li>
            <li class="list-group-item">
              <span class="fw-bold">Phone:</span> +254712345678
            </li>
            <li class="list-group-item">
              <span class="fw-bold">Email:</span>inquire@254track.com
            </li>
          </ul>
          </div>
          <div class="col-md">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63819.000689169814!2d36.6949833516494!3d-1.364142887140612!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f04e2529bcab3%3A0xb85155f9a25aa4c0!2sLangata%2C%20Nairobi!5e0!3m2!1sen!2ske!4v1682608336505!5m2!1sen!2ske" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
        </div>
    </div>
    </section>
    <!-- Footer -->
    <footer class="p-5 bg-dark text-white text-center position-relative">
        <div class="container">
          <p class="lead">Copyright &copy; 2023 254 Track</p>
        </div>
    </footer>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
