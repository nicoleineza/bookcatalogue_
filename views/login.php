<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page - Gringotts</title>
  
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
 
  <link rel="stylesheet" href="/bookcatalogue_/css/login.css">
  <link rel="icon" href="/bookcatalogue_/assets/icons/logo.png">
</head>
<body>
  <div class="video-container">
    <video autoplay loop muted playsinline>
      <source src="/bookcatalogue_/assets/video/log.mp4" type="video/mp4">
     
      Your browser does not support the video tag.
    </video>
  </div>
  <div id="header">
  
    <h1>Welcome to Gringotts</h1>
  </div>
  <div class="container">
    <form id="loginForm" name="login" action="/bookcatalogue_/actions/login_user_action.php" method="POST">
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email" required>
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input
          type="password"
          name="psw"
          id="password"
          class="input"
          placeholder="Enter your password"
          required
        />
        <button type="submit" id="login" name="login">Login</button>
      </form>
    </div>
    <script>
      document
        .getElementById("loginButton")
        .addEventListener("click", function (event) {
          var username = document.getElementById("username").value;
          var password = document.getElementById("password").value;

          if (!username || !password) {
            alert("Please fill in all fields");
          } else {
            // Redirect to dashboard.html
            window.location.href = "../views/dashboardcopy.php";
          }
        });
    </script>
  </body>
</html>
