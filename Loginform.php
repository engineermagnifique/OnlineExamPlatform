<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to sabern e platform login</title>
    <style>
        body {
    margin: 0;
    padding: 0;
    font-family: 'Arial', sans-serif;
    background-color: #f2f2f2;
}

.login-container {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
}

.login-box {
    background-color: white;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    padding: 20px;
    width: 300px;
    text-align: center;
}

.logo {
    width: 100px;
    margin-bottom: 20px;
}

h2 {
    margin-bottom: 20px;
    color: #333;
}

form {
    display: flex;
    flex-direction: column;
}

.input-group {
    margin-bottom: 15px;
}

label {
    display: block;
    font-size: 14px;
    margin-bottom: 8px;
    color: #333;
}

input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    font-size: 14px;
    margin-bottom: 10px;
}

button {
    width: 100%;
    padding: 10px;
    background-color: #ff5a5f;
    color: white;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
}

button:hover {
    background-color: #e04952;
}

.signup-link {
    font-size: 14px;
    margin-top: 20px;
}

.signup-link a {
    color: #ff5a5f;
    text-decoration: none;
    font-weight: bold;
}

.signup-link a:hover {
    text-decoration: underline;
}
.error {
    position :absolute;
    top:30%;
    left:70%;
    color:red;
    background-color: whitesmoke;
}
    </style>
</head>
<body>
<div class="login-container">
        <div class="login-box">
            <img src="airbnb-logo.png" alt="Sabern Logo" class="logo">
            <h2>Login </h2>
            <form action="" method="post">
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit">Login</button>
            </form>
            <p class="signup-link">Don't have an account? <a href="RegistrationForm.php">Sign up here</a></p>
        </div>
    </div>
    <?php
    session_start();
    include('Connection.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $Email = $_POST['email'];
        $Password = $_POST['password'];

       
        $stmt = $conn->prepare("SELECT * FROM Users WHERE email=? AND password=?");
        $stmt->bind_param("ss", $Email, $Password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            $_SESSION['firstname'] = $user['firstname'];
            $_SESSION['lastname'] = $user['lastname'];
            echo "Logged in";
            header("Location:dashboard.php");
            exit();
        } else {
            echo "<p class='error'>Invalid email or password. Please try again.</p>";
        }
        $stmt->close();
    }
    $conn->close();
    ?>

</body>
</html>