<?php 
session_start();
include('Connection.php');
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $FirstName = $_POST['fname'];
        $LastName = $_POST['lname'];
        $Email = $_POST['email'];
        $password = $_POST['psw'];

        $sql = "INSERT INTO Users (firstname, lastname, email, password) VALUES ('$FirstName','$LastName','$Email','$password')";
        $connect = mysqli_query($conn, $sql);

        if ($connect) {
            header("Location: Loginform.php"); 
            exit(); 
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    $conn->close();
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sabern register</title>
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

        .password-strength {
            height: 3px;
            background: #ccc;
            margin-top: 5px;
        }

        .strength-weak {
            background: red;
        }

        .strength-medium {
            background: orange;
        }

        .strength-strong {
            background: green;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="login-box">
            <img class="logo" src="your_logo_url" alt="Eplatform Logo">
            <h2>Registration Form</h2>

            <form method="post" action="">
                <div class="input-group">
                    <label for="fname">First Name:</label>
                    <input type="text" name="fname" required>
                </div>
                <div class="input-group">
                    <label for="lname">Last Name:</label>
                    <input type="text" name="lname" required>
                </div>
                <div class="input-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" required>
                </div>

                <div class="input-group">
                    <label for="psw">Password:</label>
                    <input type="password" name="psw" id="password" required oninput="checkPasswordStrength(this.value)">
                    <div class="password-strength" id="password-strength"></div>
                </div>
                <button type="submit">Sign Up</button>
            </form>

          

            <script>
                function validateForm() {
                    var password = document.getElementById("password").value;
                    var passwordStrength = document.getElementById("password-strength").className;

                    if (passwordStrength <5) {
                        alert("Password is not strong enough. Please choose a stronger password.");
                        return false;
                    }

                    return true;
                }

                function checkPasswordStrength(password) {
                    var strengthIndicator = document.getElementById("password-strength");

                    strengthIndicator.className = "password-strength";

                    if (password.length < 6) {
                        strengthIndicator.classList.add("strength-weak");
                    } else if (password.length < 10) {
                        strengthIndicator.classList.add("strength-medium");
                    } else {
                        strengthIndicator.classList.add("strength-strong");
                    }
                }
            </script>
        </div>
    </div>

</body>

</html>
