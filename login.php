<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $city = $_POST['city'];
    
    // Database connection details
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $dbname = 'login_db';
    
    // Establish connection
    $conn = mysqli_connect($host, $user, $pass, $dbname);
    
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    // Insert query
    $sql = "INSERT INTO aksu (name, email, mobile, city) VALUES ('$name', '$email', '$mobile', '$city')";
    
    // Execute the query
    if (mysqli_query($conn, $sql)) {
        echo "<script>
                alert('Successfully Submitted!');
                window.location.href = 'http://localhost/login_db/'; // Replace with your desired URL
              </script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    
    // Close the connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News App</title>
    <style>
        /* Apply a colorful background */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: white;
        }

        /* Style the form container */
        form {
            background-color: rgba(255, 255, 255, 0.2);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
            width: 300px;
            text-align: center;
        }

        /* Style the input fields */
        input[type="text"],
        input[type="email"],
        input[type="number"],
        button {
            width: calc(100% - 20px);
            margin-bottom: 15px;
            padding: 10px;
            border: none;
            border-radius: 5px;
        }

        /* Add specific styles to the button */
        button {
            background-color: #ff5f6d;
            color: white;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s ease;
        }

        /* Change button color on hover */
        button:hover {
            background-color: #ffc371;
        }

        /* Adjust form fields for mobile responsiveness */
        @media (max-width: 480px) {
            form {
                width: 90%;
            }
        }
    </style>
</head>
<body>
    <form action="" method="POST">
        <h2>Submit Your Details</h2>
        Name: <input type="text" name="name" placeholder="Enter your name" required><br>
        Email: <input type="email" name="email" placeholder="Enter your email" required><br>
        Mobile: <input type="number" name="mobile" placeholder="Enter your mobile number" required><br>
        City: <input type="text" name="city" placeholder="Enter your city" required><br>
        <button type="submit" name="submit">Send Data</button>
    </form>
</body>
</html>
