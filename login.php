<?php
        session_start(); //Establish session in order to pass variables 
        //(user ID, user notes and user password, login info, errors etc.) into login.php file.
        
        if((!isset($_POST['user_name'])) || (!isset($_POST['user_pass']))){ //When user login and user password is not established 
        header('Location: index.php');//then redirect to index.php page
            exit();
        }
        
        
        require_once "connect.php"; //Get DB connection info. 
        //Concerning error connection case the rest of the PHP script is not going to be executed. 
        //require_once statement allows to prevent avoid the statement redundancy. 
        
        $connect = new mysqli($host, $db_user, $db_pass, $db_name); //Establish database connection. 
        
        if($connect->connect_errno!= FALSE){
            
            echo "Error: ".$connect->connect_errno; //If DB connection failed then display error.
            
        }else{
            $user_name = $_POST['user_name']; //Get this value typed in login form. 
            $user_pass = $_POST['user_pass']; //Get this value typed in login form.
           
            $user_name =  htmlentities($user_name, ENT_QUOTES, "UTF-8");  //Prevent to insert HTML entities.
            
            
           if($result = $connect->query(// Send the $sql query to DB
                   
                    sprintf("SELECT * FROM users WHERE user_name ='%s'", //%s in query means string
                         mysqli_real_escape_string($connect, $user_name))))//Prevent SQL injection.
        {
                
               $users_amount = $result->num_rows; //Check if user record in DB exist. 
               
                if($users_amount>0){//Check if user record in DB exist. If value is larger than zero then execute the script 
                    $row = $result->fetch_assoc(); //Get all values from row.
                    
                    if (password_verify($user_pass, $row['user_pass'])){// When hashed user pass is confimed then execute the script.
                    
                        $_SESSION['logged_in'] = TRUE;//Set session as true in order to pass it for login verification purposes.
                    
                    
                        $_SESSION['user_name'] = $row['user_name']; //Set session to pass userinfo variable to profile.php page and get selected value from row.
                        $_SESSION['user_id'] = $row['user_id']; //Set session to pass userinfo variable to profile.php page and get selected value from row.


                        unset($_SESSION['error']); // If user is logged in successfully then disable error.
                        $result->free_result();// Clear records taken from DB.
                        header('Location: profile.php');// When typed login and password are correct then redirect to user profile.

                    
                    }else{
                      
                        $_SESSION['error'] = '<p class="error-message">Wrong login or password. Try again.</p>'; // Display message when user record in DB not exist
                        header('Location: index.php'); // Then redirect to login form.
                        
                    }
                    
                    
                }else{
                   
                    $_SESSION['error'] = '<p class="error-message">Wrong login or password. Try again.</p>'; // Display message when user record in DB not exist
                    header('Location: index.php'); // Then redirect to login form.
                    
                }
                
                
            }
            
            $connect->close(); //Close DB connection.
        }
?>
    