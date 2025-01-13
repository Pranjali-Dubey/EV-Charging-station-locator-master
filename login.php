<?php
    // Database credentials
    $host = "localhost";
    $email = "root";
    $password= "";
    $database = "ev_db";

    // Create a database connection
    $conn = new mysqli($host, $email, $password, $database);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Handle form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // Retrieve the username and password from the form
      $email = $_POST['email'];
      $password = $_POST['password'];
  
      // Prepare the SQL statement to check if the user exists
      $sql = "SELECT * FROM  ev_table WHERE email = '$email' AND password = '$password'";
  
      // Execute the query
      $result = $conn->query($sql);
  
      // Check if a row was returned
      if ($result->num_rows == 1) {
          // User credentials are valid
          $_SESSION['email'] = $email;
           // Store username in the session for future use
           echo "Login successful. Welcome...!!! " . $email;
          header("Location: home.php");
      } else {
          // Invalid credentials
          
          echo "Sorry....!!!Invalid email or password ".$email;
          
      }
  }
  ?>