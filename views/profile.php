<?php
session_start();

// Redirect to login page if user is not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: /login.php");
    exit();
}

include "../settings/connection.php";

$user = null;

// Fetch user details from the database
$get_user_query = "SELECT user_id, firstname, lastname, email, gender, dob, phone FROM Users WHERE user_id = {$_SESSION['user_id']}";
$get_user_result = $connection->query($get_user_query);

// Check if query executed successfully and user details exist
if ($get_user_result && $get_user_result->num_rows > 0) {
    $user = $get_user_result->fetch_assoc(); // Fetch user details
} else {
    // Redirect to error page if user details are not found
   
    exit();
}

$connection->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="/bookcatalogue_/css/profile.css">
    <title>Edit User</title>
</head>
<body>

  <div class="content">
    
    <section class="users-list-section">
      <h2>My Profile</h2>
      <!-- Users List -->
      <ul class="users-list">
        <li data-user-id='<?php echo $user['user_id']; ?>'>
          <button onclick='editUser(<?php echo $user['user_id']; ?>, "firstname")'>Edit</button>
          <strong>First Name:</strong> <?php echo $user["firstname"]; ?><br>
          <button onclick='editUser(<?php echo $user['user_id']; ?>, "lastname")'>Edit</button>
          <strong>Last Name:</strong> <?php echo $user["lastname"]; ?><br>
          <button onclick='editUser(<?php echo $user['user_id']; ?>, "email")'>Edit</button>
          <strong>Email:</strong> <?php echo $user["email"]; ?><br>
          <button onclick='editUser(<?php echo $user['user_id']; ?>, "gender")'>Edit</button>
          <strong>Gender:</strong> <?php echo ($user["gender"] == 0 ? 'Male' : 'Female'); ?><br>
          <button onclick='editUser(<?php echo $user['user_id']; ?>, "dob")'>Edit</button>
          <strong>Date of Birth:</strong> <?php echo $user["dob"]; ?><br>
          <button onclick='editUser(<?php echo $user['user_id']; ?>, "phone")'>Edit</button>
          <strong>Phone:</strong> <?php echo $user["phone"]; ?><br>
          <button onclick='deleteUser(<?php echo $user['user_id']; ?>)'>Delete</button>
        </li>
      </ul>
    </section>

    <!-- button to go back to the previous page -->
    <button class="back-button" onclick="goToDashboard()">Back to Dashboard</button>
  </div>

  <script>
    function editUser(userId, attribute) {
      var newValue = prompt('Edit ' + attribute + ':');
      if (newValue !== null && newValue.trim() !== '') {
        var formData = new FormData();
        formData.append('newValue', newValue);
        formData.append('attribute', attribute);
        formData.append('userId', userId);

        fetch('/bookcatalogue_/functions/update_profile.php', {
          method: 'POST',
          body: formData
        })
        .then(response => {
          if (response.ok) {
            window.location.reload(); // Reload the page to reflect changes
          } else {
            alert('Failed to update profile. Please try again.');
          }
        })
        .catch(error => {
          console.error('Error:', error);
          alert('Failed to update profile. Please try again.');
        });
      }
    }

    function deleteUser(userId) {
      if (confirm("Are you sure you want to delete your profile?")) {
        fetch('/bookcatalogue_/functions/delete_profile.php', {
          method: 'POST',
        })
        .then(response => {
          if (response.ok) {
            window.location.href = "/bookcatalogue/views/login.php"; // Redirect to login page after successful deletion
          } else {
            alert('Failed to delete profile. Please try again.');
          }
        })
        .catch(error => {
          console.error('Error:', error);
          alert('Failed to delete profile. Please try again.');
        });
      }
    }

    function goToDashboard() {
      window.location.href = "/bookcatalogue_/views/dashboardcopy.php";
    }
  </script>
</body>
</html>
