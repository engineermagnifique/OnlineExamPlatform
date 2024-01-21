<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Exam Submission Confirmation</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f5f5f5;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .container {
      text-align: center;
      padding: 30px;
      background-color: #ffffff;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    h1 {
      color: #1e90ff;
      font-size: 28px;
      margin-bottom: 10px;
    }

    p {
      color: #333333;
      font-size: 18px;
      margin-bottom: 20px;
    }

    .success-icon {
      width: 80px;
      height: 80px;
      margin-bottom: 30px;
      fill: #1e90ff;
    }

    .btn {
      display: inline-block;
      padding: 10px 20px;
      background-color: #1e90ff;
      color: #ffffff;
      font-size: 16px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .btn:hover {
      background-color: #0077ff;
    }
    a {
        text-decoration: none;
        color:white;
    }
  </style>
</head>
<body>
  <div class="container">
    <svg class="success-icon" viewBox="0 0 24 24">
      <path fill-rule="evenodd" d="M0 11c0-5.523 4.477-10 10-10s10 4.477 10 10-4.477 10-10 10S0 16.523 0 11zm18.707-1.293l-7-7a1 1 0 1 0-1.414 1.414L15.586 10H10a1 1 0 1 0 0 2h5.586l-4.293 4.293a1 1 0 1 0 1.414 1.414l7-7a1 1 0 0 0 0-1.414z"/>
    </svg>
    <h1>Exam Submitted Successfully!</h1>
    <p>Congratulations! Your exam has been submitted successfully.</p>
    <button class="btn"><a href="Home.php">Home page</a></button>
  </div>
</body>
</html>