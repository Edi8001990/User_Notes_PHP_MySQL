<?php
        session_start(); //Establish session in order to get variables 
                        //(user ID, user notes and user password ,login info, errors etc.) from login.php file.

    if(!isset($_SESSION['logged_in'])){ //When session is not established then redirect to index.php page. 
            header('Location: index.php');
            exit();
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial=scale=1.0">
        <link href="CSS/reset.css" rel="stylesheet" type="text/css"/>
        <link href="CSS/style.css" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet"> 
        <title>User Notes</title>
     </head>
    <body>
        
        
         <h1 id="header"><a href="index.php">USER NOTES</a></h1>
         
        <?php echo '<p class="user-info">Welcome '.$_SESSION['user_name'].'! [ <a href="logout.php">Logout</a>  ]</p>'; ?>
         
        <div id="main">
            <div class="form-note">
                <form action="note.php" method="post">
                            <div class="row-box">
                                <div class="form-text"><label>Your Note: </label></div>
                                <div class="form-input">
                                    <input class="note" type="text" name="note" placeholder="Write your Note" required/>
                                </div>
                            </div>
                                <div class="button-position">
                                    <input class="send-button" type="submit" name="submit" value="Insert Note"/>
                                </div>
                                <div id="fix-float" style="clear:both"></div>
                 </form>
           </div>
        </div>
        <?php
        
        require_once "connect.php";//Get DB connection info. Concerning error connection case the rest of the PHP script is not going to be executed. 
        //require_once statement allows to prevent avoid the statement redundancy. 
        
        
        $connect = new mysqli($host, $db_user, $db_pass, $db_name); //Establish database connection.
        
        if($connect->connect_errno!=FALSE){
                echo "Error: ".$connect->connect_errno; //If DB connection failed then display error.
        }else{
                $user_id = $_SESSION['user_id']; //Get this value typed in login form. 
            
            
            if($result = $connect->query(// Send the $sql query to DB
                    
                    sprintf("SELECT note FROM notes WHERE user_id = '%s'", //%s in query means string
                        mysqli_real_escape_string($connect, $user_id)))){ //Prevent SQL injection.
                
                $rows_amount = mysqli_num_rows($result); //display number of rows taken from DB
                echo '<p class="user-info"> The total amount of notes is '.$rows_amount.'.</p>';
                echo '<div style="overflow-x:auto;">';
                echo '<table id="table-style">';
                echo '<tr style="background-color: rgba(234, 234, 234, 0.5);"><th>'.$_SESSION['user_name'].' NOTES</th></tr>';
                
                
                while($row = $result->fetch_assoc()){ //bring rows content taken from SQL query
                    echo '<tr><td> '.$row['note'].'</td></tr>';
            }
            
            
            echo '</table>';
            echo '</div>';
            
            $result->free_result();// Clear records taken from DB.
             }
             $connect->close(); //Close DB connection.
         }
        ?>
        
        
        
    <?php
        if (isset ($_SESSION['inserted'])) { //display message when note is inserted
            echo $_SESSION['inserted'];
      }
        
        if(isset($_SESSION['error'])){ //display error when Insert note script cannot be executed.
            echo $_SESSION['error'];
       }
     ?>
    </body>
</html>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             