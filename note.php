<?php
session_start();//Establish session in order to pass variables 
        //concerning sucessfull note insert or error.

require_once "connect.php";//Get DB connection info. Concerning error connection case the rest of the PHP script is not going to be executed. 
        //require_once statement allows to prevent avoid the statement redundancy. 


        $connect = new mysqli($host, $db_user, $db_pass, $db_name); //Establish database connection. 

        if($connect->connect_errno!= FALSE){
                echo "Error: ".$connect->commect_errno; //If DB connection failed then display error.
    }else{
            $user_id = $_SESSION['user_id']; //Get logged in user with own ID number. 
            $note = $_POST['note']; //Get this value typed in note form. 
            $note = htmlentities($note, ENT_QUOTES, "UTF-8"); //Prevent to insert HTML entities.
    
            
            
    if(!$connect->query(// Send the sql query to DB
            
            sprintf("INSERT INTO notes (user_id, note) VALUES ('%s', '%s')", //%s in query means string
                  mysqli_real_escape_string($connect, $user_id), //Prevent SQL injection.
                  mysqli_real_escape_string($connect, $note))) //Prevent SQL injection.
            === FALSE){// When DB connection is not FALSE then isert note into DB
        
        
        $_SESSION['inserted'] = '<p class="inserted">Note has been inserted</p>'; // Display message when note is inserted sucessfully.
         header('Location: profile.php'); // Then redirect to user profile page.
       
       
   }else{
       
        $_SESSION['error'] = '<p class="inserted">OBS Something was wrong!!!</p>'; // Display error when note is NOT inserted sucessfully.
        header('Location: profile.php'); // Then redirect to user profile anyway.
      
  }
        
      

     $connect->close(); //Close DB connection.
}

?>
