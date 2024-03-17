<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GRINGOTTS</title>
    <link rel="stylesheet" href="/bookcatalogue_/css/signup.css">
    <link rel="icon" href="/bookcatalogue_/assets/icons/logo.png">
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="/bookcatalogue_/assets/icons/logo.png" alt="Gringotts Logo">
            <h1>GRINGOTTS</h1>
            <h2 class="header">Sign Up</h2>
        </div>
        <form action="/bookcatalogue_/actions/signup_user_action.php" method="POST" class="Signup" id="registration" name="registration" onsubmit="return validation()">
            <p class="result" id="result"></p>
            <div class="input-box">
                <div class="input-field">
                    <label for="firstname">Firstname</label>
                    <input name="firstname" type="text" required id="firstname">
                </div>
                <div class="input-field">
                    <label for="lastname">Lastname</label>
                    <input name="lastname" type="text" required id="lastname">
                </div>
            </div>
            <div class="gender">
                <div class="input-field">
                    <label for="male">Gender:</label>
                    <input type="radio" name="gender" value="0" id="male"> Male
                </div>
                <div class="input-field">
                    <input type="radio" name="gender" value="1" id="female"> Female 
                </div> 
            </div>
            <div class="input-field">
                <label for="dob">Date of Birth</label>
                <input type="date" id="dob" name="dob" required>
            </div>
            <div class="input-box">
                <div class="input-field">
                    <label for="phone">Phone Number:</label>
                    <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" required>
                </div>
                <div class="input-field">
                    <label for="email">Email:</label>
                    <input name="email" type="text" required id="email">
                </div>
            </div>
            <div class="input-box">
                <div class="input-field">
                    <label for="psw">Password</label>                    
                    <input name="psw" type="password" required id="psw">
                </div>
                <div class="input-field">
                    <label for="psw2" >Confirm Password</label>
                    <input type="password" name="psw2" id="psw2" required>
                </div>
            </div>
            <label class="confirmation"><input type="checkbox" name="confirmation" id="confirmation" required>I hereby declare that the above information is true and correct</label>
            <div>
                <button name="register" type="submit">Register</button>
            </div>
            <div class="Login">
                <p>Have an Account? <a href="bookcatalogue_/views/login.php">Log in</a></p>
            </div>
        </form>
    </div>

    <script src="script.js"></script>
</body>
</html>
