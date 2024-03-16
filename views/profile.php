<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="/bookcatalogue_/css/profile.css">
    
</head>
<body>
    <div class="container">
        <h1>User Profile</h1>
        <!-- Display feedback message here -->
        <div id="message"></div>
        <form id="profileForm" method="POST">
            <div class="input-field">
                <label for="firstname">Firstname</label>
                <input name="firstname" type="text" value="<?php echo $user['firstname']; ?>" readonly>
                <button type="button" onclick="toggleEdit('firstname')">Edit</button>
            </div>
            <div class="input-field">
                <label for="lastname">Lastname</label>
                <input name="lastname" type="text" value="<?php echo $user['lastname']; ?>" readonly>
                <button type="button" onclick="toggleEdit('lastname')">Edit</button>
            </div>
            <div class="input-field">
                <label for="email">Email:</label>
                <input name="email" type="email" value="<?php echo $user['email']; ?>" readonly>
                <button type="button" onclick="toggleEdit('email')">Edit</button>
            </div>
            <div class="input-field">
                <label for="phone">Phone Number:</label>
                <input type="tel" name="phone" value="<?php echo $user['phone']; ?>" readonly>
                <button type="button" onclick="toggleEdit('phone')">Edit</button>
            </div>
            <button type="submit">Update Profile</button>
        </form>
    </div>
    <script>
        function toggleEdit(field) {
            var inputField = document.getElementsByName(field)[0];
            var editButton = inputField.nextElementSibling;
            if (inputField.readOnly) {
                inputField.readOnly = false;
                editButton.textContent = "Save";
            } else {
                inputField.readOnly = true;
                editButton.textContent = "Edit";
            }
        }

        // Submit the form using AJAX
        document.getElementById("profileForm").addEventListener("submit", function(event) {
            event.preventDefault(); // Prevent default form submission
            var form = this;
            var formData = new FormData(form); // Create FormData object from form
            var xhr = new XMLHttpRequest(); // Create new XMLHttpRequest object

            // Configure XMLHttpRequest
            xhr.open(form.method, form.action, true);
            xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest'); // Set header to identify AJAX request

            // Define function to handle AJAX response
            xhr.onload = function() {
                if (xhr.status >= 200 && xhr.status < 400) { // Check for successful response
                    var response = xhr.responseText; // Get response from server
                    document.getElementById("message").innerHTML = response; // Display response message
                } else {
                    console.error("Request failed: " + xhr.status); // Log error if request fails
                }
            };

            // Send AJAX request
            xhr.send(formData);
        });
    </script>
</body>
</html>
