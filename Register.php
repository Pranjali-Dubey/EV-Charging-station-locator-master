
<?php
    
    // Database credentials
    $host = "localhost";
    $email = "root";
    $password= "";
    $database = "ev_db";

    $conn = new mysqli($host, $email, $password, $database);

    if ($conn->connect_error)
    {
        die("Connection failed: " . $conn->connect_error);
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST') 
	{
        // Retrieve form inputs
        $username = $_POST['username'];
        $email = $_POST['email'];
       
        $password = $_POST['password'];

        // Validate form inputs
       
        // Insert data into the database
        $stmt = $conn->prepare("INSERT INTO ev_table(username,email,password) VALUES (?,?,?)");
        $stmt->bind_param("sss",$username, $email, $password);

        // Execute the statement
        if ($stmt->execute()) {
            echo "Registered successfully.";
            header("Location:login2.php");
        } else {
            echo "Error inserting data: " . $stmt->error;
        }
		
        // Close the statement
        $stmt->close();
    }
                      
    // Close the database connection
    $conn->close();
    ?>