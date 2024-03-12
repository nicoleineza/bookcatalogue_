<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Page - Gringotts</title>
    <link rel="stylesheet" href="bookcatalogue_/css/login.css" />
    <style>
      :root {
        --primary-color: #5c48ee;
        --primary-color-dark: #0f1e6a;
        --secondary-color: #f9fafe;
        --text-color: #333333;
        --white: #ffffff;
        --max-width: 1200px;
      }

      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }

      html {
        height: 100%;
      }

      body {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100%;
        font-family: Arial, sans-serif;
        background-image: url("/bookcatalogue_/assets/login.jpg");
        background-size: cover;
        background-position: center;
      }

      .container {
        background-color: rgba(255, 255, 255, 0.7);
        border: 1px solid;
        border-radius: 5px;
        padding: 20px;
        width: 300px;
      }

      .input {
        margin: 10px 0;
        padding: 10px;
        width: calc(100% - 20px);
        border: 1px solid #ccc;
        border-radius: 5px;
        outline: none;
      }

      button {
        background-color: rgb(154, 79, 154);
        border: rgb(203, 199, 199);
        border-radius: 5px;
        color: white;
        cursor: pointer;
        display: block;
        font-size: 16px;
        margin: 10px 0;
        padding: 10px;
        width: 100%;
      }

      button:hover {
        background-color: var(--primary-color-dark);
      }
    </style>
  </head>
  <body>
    <div id="header"><h1>Welcome to Gringotts</h1></div>
    <div class="container">
      <form id="loginForm" name="login" action="../actions/login_user_action.php" method="POST">
        <label for="email">email</label>
        <input
          name="email"
          id="username"
          class="input"
          placeholder="Enter your email"
          required
        />
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
            window.location.href = "dashboard.php";
          }
        });
    </script>
  </body>
</html>
