<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>BOOK Catalogue</title>
    
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" href="/bookcatalogue_/assets/icons/logo.png">
    <style>

        :root{
            --primary-color:#5c48ee;
            --primary-color-dark:#0f1e6a;
            --secondary-color:#f9fafe;
            --text-color:#333333;
            --white:#ffffff;
            --max-width:1200px;


}

        body {
            font-family: 'Poppins', sans-serif;
            background: url(/bookcatalogue_/assets/jaredd-craig-HH4WBGNyltc-unsplash.jpg)center/cover fixed;
            margin: 0;
            padding: 0;
            
        }

        .container {
            max-width: 400px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            
        }

        h1 {
            text-align: center;
            color:var(--primary-color)
        }

        .input-box {
            margin-bottom: 20px;
        }

        .input-field {
            margin-bottom: 10px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"],
        input[type="date"],
        input[type="tel"],
        input[type="email"] {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        .gender {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .confirmation {
            font-size: 14px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color:var(--primary-color);
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: var(--primary-color-dark);
        }

        .Login {
            text-align: center;
        }

        .Login a {
            color: #007bff;
        }

        .Login a:hover {
            text-decoration: underline;
        }


        #header{
            color:var(--primary-color);
            transition: 0.3s;
        }

        #header:hover{
            color:var(--primary-color-dark);
        }


    </style>
</head>
<body>
    
    <div class="container">
        <!-- Form to be filled for registration -->
        <div id="error"></div>
        <form action="../actions/signup_user_action.php" method="POST" class="Signup" id="registration" name="registration" onsubmit="return validation()">
            <h1 id="header">GRINGOTTS</h1> 
            <h1 >Welcome
            </h1>
            <p id="result">head</p>
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
                <input type="date" id="dob" name="dob">
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
                    <input name="psw" type="password"  required id="psw">
                    <!--pattern="(?=.\d)(?=.[a-z])(?=.*[A-Z]).{8,}"-->
                </div>
                <div class="input-field">
                    <label for="psw2" >Confirm Password</label>
                    <input type="password" name="psw2" id="psw2" required>
                </div>
            </div>
            <label class="confirmation" value=1><input type="checkbox" name="confirmation" id="confirmation">I hereby declare that the above information is true and correct</label>
            <div>
                <button name="register" type="submit" id="#register">Register</button>
            </div>
            <div class="Login">
                <p>You can now <a href="../views/login.php">Log in</a></p>
            </div>
        </form>
    </div>
    <script>
        function validation() {
            const isValidEmail = email => {
                const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                return re.test(String(email).toLowerCase());
            }

            if (document.registration.email.value === "") {
                document.getElementById("result").innerHTML = "Please enter your email";
                return false;
            } else if (!isValidEmail(document.registration.email.value)) {
                document.getElementById("result").innerHTML = "Please enter a valid email";
                return false;
            } else if (document.registration.psw.value === "") {
                document.getElementById("result").innerHTML = "Please enter your password";
                return false;
            } else if (document.registration.psw.value.trim() !== document.registration.psw2.value.trim()) {
                document.getElementById("result").innerHTML = "Passwords do not match";
                return false;
            }
        }
    </script>
</body>
</html>
