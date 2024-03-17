<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <h1>User Profile</h1>
    <?php
    // Start the session
    session_start();
    
    // Check if the user is logged in
    if(isset($_SESSION['user_id'])) {
        // Fetch user information from session
        $user_id = $_SESSION['user_id'];
        
        // Include database connection
        include_once '../settings/connection.php';

        $stmt = $connection->prepare("SELECT * FROM Users WHERE user_id = ?");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows > 0) {
            $user = $result->fetch_assoc();
    ?>
    <form id="profile-form" method="post" action="update_profile.php">
        <label for="firstname">First Name:</label>
        <div id="firstname-container">
            <span id="firstname-value"><?php echo htmlspecialchars($user['firstname']); ?></span>
            <button type="button" class="edit-btn" data-field="firstname">Edit</button>
        </div>

        <label for="lastname">Last Name:</label>
        <div id="lastname-container">
            <span id="lastname-value"><?php echo htmlspecialchars($user['lastname']); ?></span>
            <button type="button" class="edit-btn" data-field="lastname">Edit</button>
        </div>

        <label for="email">Email:</label>
        <div id="email-container">
            <span id="email-value"><?php echo htmlspecialchars($user['email']); ?></span>
            <button type="button" class="edit-btn" data-field="email">Edit</button>
        </div>

        <label for="phone">Phone:</label>
        <div id="phone-container">
            <span id="phone-value"><?php echo htmlspecialchars($user['phone']); ?></span>
            <button type="button" class="edit-btn" data-field="phone">Edit</button>
        </div>

        <!-- Add more fields as needed -->

        <button type="submit" id="submit-btn" style="display: none;">Update Profile</button>
    </form>

    <script>
    $(document).ready(function() {
        // Edit button click event
        $('.edit-btn').click(function() {
            var field = $(this).data('field');
            var container = $('#' + field + '-container');
            var value = $('#' + field + '-value').text();

            // Replace span with input field and submit button
            container.html('<input type="text" id="' + field + '-input" name="' + field + '" value="' + value + '"> <button type="button" class="submit-btn">Submit</button>');

            // Show submit button
            $('#submit-btn').show();
        });

        // Submit button click event
        $(document).on('click', '.submit-btn', function() {
            $('#profile-form').submit();
        });

        // Profile form submission
        $('#profile-form').submit(function(event) {
            event.preventDefault();
            var formData = $(this).serialize();

            $.ajax({
                type: "POST",
                url: "update_profile.php",
                data: formData,
                success: function(response) {
                    // Reload page if update is successful
                    location.reload();
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });
    </script>
    <?php 
        } else {
            echo "<p>Error: User data not found.</p>";
        }
    } else {
        // If the user is not logged in, display a message or redirect to the login page
        echo "<p>Please login to view your profile.</p>";
        // You can add a link to the login page here if needed
    }
    ?>
</body>
</html>