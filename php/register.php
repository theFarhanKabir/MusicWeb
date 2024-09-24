<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Player - Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<form action="" method="POST">
        <div class="container">
            <h1>Registration</h1>
            </select><br>
            <input type="admin_id" name="admin_id" class="input-box" placeholder="Admin Id" required><br><br>
            <input type="password" name="pass" class="input-box" placeholder="Enter Password" required><br><br>

            <input type="submit" id="btn" name="btn" value="Register">
            <p style="font-size: 10px;">Already Have an Account?<a href="login.php">Login</a></p>
        </div>
    </form>
    <!-- <script src="script.js"></script> -->



    <?php
    include 'db.php'; // Include database connection

    if (isset($_POST['btn'])){
        
        $admin_id = $_POST['admin_id'];
        $password = $_POST['pass'];

        // Check if the admin ID already exists
        $check_query = "SELECT * FROM admin WHERE admin_id = '$admin_id'";
        $check_result = $conn->query($check_query);

        if ($check_result->num_rows > 0) {
            echo json_encode(['message' => 'Admin ID already exists']);
        } else {
            // Insert new admin into the admin table
            $sql = "INSERT INTO admin (admin_id, password) VALUES ('$admin_id', '$password')";
            if ($conn->query($sql) === TRUE) {
                echo json_encode(['message' => 'Registration successful']);
            } else {
                echo json_encode(['message' => 'Error: ' . $conn->error]);
            }
        }
    }
    ?>
</body>
</html>