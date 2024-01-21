<!DOCTYPE html>
<html>
<head>
    <title>Online Exam Platform</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        html,body {
            scroll-behavior: smooth;
        }
        .wave-header {
            background-color: #0099ff;
            position: relative;
        }

        .wave-svg {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
        }

        
        .centered-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            text-align: center;
            padding: 0 20px;
        }

        .title {
            font-size: 36px;
            color: #333;
            margin-bottom: 20px;
        }

        .subtitle {
            font-size: 24px;
            color: #666;
            margin-bottom: 40px;
        }

        .register-button {
            padding: 15px 30px;
            font-size: 18px;
            background-color: #0099ff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .register-button:hover {
            background-color: #0077cc;
            text-decoration: none;
            color:white;
        }

        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 100;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-size: 24px;
            color: #333;
            font-weight: bold;
        }

        .navbar-nav {
            margin-left: auto;
        }

        .nav-item {
            margin-right: 15px;
        }

        .nav-link {
            font-size: 18px;
            color: #666;
        }

        .nav-link:hover {
            color: #333;
        }
        .airbnb-footer {
background-color: #F7F7F7;
padding: 40px 0;
color: #484848;
position:absolute;
top:100%;
width: 100%;
}

.footer-inner {
display: flex;
justify-content: space-around;
max-width: 1200px;
margin: 0 auto;
}

.footer-column {
flex: 0 1 calc(33.33% - 20px);
}

h4 {
font-size: 1.5rem;
margin-bottom: 1rem;
}

ul {
list-style: none;
padding: 0;
}

li {
margin-bottom: 0.5rem;
}

a {
text-decoration: none;
color: #484848;
transition: color 0.2s;
}

a:hover {
color: #008489;
}

    </style>
  <script>
        $(document).ready(function () {
            $("a[href='#footer']").on('click', function (event) {
                if (this.hash !== "") {
                    event.preventDefault();

                    var hash = this.hash;

                    $('html, body').animate({
                        scrollTop: $(hash).offset().top
                    }, 800, function () {
                        window.location.hash = hash;
                    });
                }
            });
        });
    </script>
</head>
<body>
<nav class="navbar navbar-expand-md">
    <a class="navbar-brand" href="#">OnlineExam</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="UserLogin.php">User Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="Loginform.php">Instructor Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#footer">Documentation</a>
            </li>
        </ul>
    </div>
</nav>

<!-- Hero section -->
<section class="wave-header">
    <div class="wave-svg">
    
    </div>
    <div class="centered-content">
        <h1 class="title">Online Exam Platform</h1>
        <h3 class="subtitle">Set and Run Exams in a Safe and Easy Manner</h3>
        <a href="RegistrationForm.php" class="register-button">Register</a>
    </div>
</section>
<footer class="airbnb-footer">
        <div class="footer-inner">
          <div class="footer-column">
            <h4>Instructor dashboard</h4>
            <ul>
              <li><a href="#">How vaster works</a></li>
              <li><a href="#">Documantaries</a></li>
              <li><a href="#">Totoliars</a></li>
              <li><a href="#">User benefit</a></li>
            </ul>
          </div>
          <div class="footer-column">
            <h4>Categories</h4>
            <ul>
              <li><a href="#">Questionerre</a></li>
              <li><a href="#">Interview</a></li>
              <li><a href="#">Recording</a></li>
              <li><a href="#">High security</a></li>
            </ul>
          </div>
          <div class="footer-column">
            <h4>User Dashboard</h4>
            <ul>
              <li><a href="#">Documantaries</a></li>
              <li><a href="#">User guide</a></li>
              <li><a href="#">Premium access</a></li>
              <li><a href="#">Ender-user</a></li>
            </ul>
          </div>
        </div>
      </footer>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.0/dist/umd/popper.min.js"></script>

</body>
</html>