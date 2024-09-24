<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Log In</title>
</head>
<body>
    <form action="" method="POST" id="login-form">
        <div class="container" id="login-container">
            <h1 id="login-heading">Log In</h1>
            <input type="text" name="admin_id" id="admin-id" class="input-box" placeholder="Admin Id" required><br><br>
            <input type="password" name="pass" id="password" class="input-box" placeholder="Enter Password" required><br><br>

            <input type="submit" id="login-btn" name="btn" value="Log In">
            <p id="register-prompt" style="font-size: 10px;">Don't Have an Account? 
                <a href="register.php" id="register-link">Register</a>
            </p>
        </div>
    </form>

    <?php
    include 'db.php'; // Include database connection

    if (isset($_POST['btn'])){
        
        $admin_id = $_POST['admin_id'];
        $password = $_POST['pass'];
        
        session_start();
        $_SESSION['var1'] = $admin_id;

        $sql_user = "SELECT * FROM `admin` WHERE admin_id = '$admin_id' AND password = '$password'";
        $result = mysqli_query($conn, $sql_user);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $pass = $row['password'];

            if ($pass == $password) {
                header('Location: home.php');
            }    
        } else {
            echo '<script>
                alert("Invalid admin ID or password");
            </script>';
        }
    }
    ?>
</body>
</html>
