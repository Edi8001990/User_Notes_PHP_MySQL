<?php
session_start();

require_once "connect.php";//Get DB connection info. Concerning error connection case the rest of the PHP script is not going to be executed. 
        //require_once statement allows to prevent avoid the statement redundancy. 

$connect = new mysqli($host, $db_user, $db_pass, $db_name); //Establish database connection. 

        if($connect->connect_errno != FALSE){
            echo "Error: ".$connect->commect_errno; //If DB connection failed then display error.
    }else{
        $user_name = $_POST['user_name']; //Get this value typed in regustration form. 
        $user_pass = $_POST['user_pass']; //Get this value typed in regustration form. 

        $user_name = htmlentities($user_name, ENT_QUOTES, "UTF-8"); //Prevent to insert HTML entities.
        $user_pass = htmlentities($user_pass, ENT_QUOTES, "UTF-8"); //Prevent to insert HTML entities.


        $password_hash = password_hash($user_pass, PASSWORD_DEFAULT); //Hash password for security purposes
   
        
    //Check if user already exist.
    if(mysqli_num_rows($connect->query(// Send the $sql query to DB
            
                            sprintf("SELECT user_name FROM users WHERE user_name = '%s'", //%s in query means string
                            mysqli_real_escape_string($connect, $user_name))))!= 0){      //Prevent SQL injection / check if row exist
        
        //Display below message when username is already occupied.
        $_SESSION['checked'] = '<p class="error-message">This username is already occupied. Please choose another one.</p>';
        header('Location: index.php');  // Then redirect to index page.  
    }
    
    //If username not exist then execute the below script.
    else if($result = $connect->query(// Send the $sql query to DB
            
            sprintf("INSERT INTO users (user_name, user_pass) VALUES ('%s','%s')", //%s in query means string
                 mysqli_real_escape_string($connect, $user_name),                  //Prevent SQL injection
                 mysqli_real_escape_string($connect, $password_hash)))){           //Prevent SQL injection
        
        //If account is created then display below message.
        $_SESSION['account_created'] = '<p class="inserted">Your account has been created. Please sign in now.</p>'; 
        header('Location: index.php'); // Then redirect to index page.
    }
    

   else {
        $_SESSION['error'] = '<p class="error-message">STH was wrong.</p>'; // If user cannot be registered display error.
        header('Location: index.php'); // Then redirect to index page.
        
    }

     $connect->close(); //Close DB connection.
}
?>

