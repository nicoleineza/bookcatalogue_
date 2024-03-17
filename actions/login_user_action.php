<?php
// Starting a session
session_start();

//including the connection file
include '(../settings/connection.php)';

//initializing variable error for capturing errors
$errors = array();



echo "Errors!!";

if(isset($_POST['login'])){
   
    echo "Errors!!";

    //Collecting form data and storing in variables
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection, $_POST['psw']);


        //Query to check if the user exists
    $query = "SELECT * FROM Users WHERE email = '$email'";
    $result = mysqli_query($connection, $query);
    $user = mysqli_fetch_assoc($result);

    
  

    if(!$user){

            echo '<h2>No registered account found!!!</h2>';
        
            array_push($errors, "User not found!!");

            header("Location: ../login/Register_view.php");
            die();
        }


        else{

            //User then exists
            //Retrieving the hashed password from the database
            $passwdquery = "SELECT psw FROM Users WHERE email= '$email'";
            $passwdresult = mysqli_query($connection,$passwdquery);
            $row = mysqli_fetch_assoc($passwdresult);
            $hashedpasswd = $row['psw'];



            //Comparing the entered password with the hashed password
            if(password_verify($password, $hashedpasswd)){
                //passwords meatch meaning log in was successful
                //storing user id and role id
                $user_query = "SELECT user_id FROM Users WHERE email= '$email'";
                $user_id_result = mysqli_query($connection,$user_query);
                $user_row = mysqli_fetch_assoc($user_id_result);
                $user_id_value = $user_row['user_id'];


               
                $_SESSION['user_id'] = $user_id_value;
                

                //Leading the user to the dashboard
                header("Location:bookcatalogue_/views/dashboard.php");
                
            }    

            }
        }




?>