<?php
        session_start();//Establish session in order to get messages, errors 
                        //about account creation, username occupation or when loginname or password is wrong.

    if((isset($_SESSION['logged_in'])) && ($_SESSION['logged_in'] == TRUE)){// If user is signed in then redirect to profile.php 
    //fx when someone is trying to type index.php directly in URL during log in session 
        header('Location: profile.php');
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
            <div id="main-index">
                    <div class="form-content">
                       <div id="log-in">
                            <form action="register.php" method="post">

                                <div class="row-box">
                                    <div class="form-text"><label>Login: </label></div>
                                    <div class="form-input">

                                        <input class="login" type="text" name="user_name" placeholder="Username" required=""/>

                                    </div>
                                </div>
                                <div class="row-box">
                                    <div class="form-text"><label>Pass: </label></div>
                                    <div class="form-input">
                                        <input class="password" type="password" name="user_pass" placeholder="Password" required/>
                                    </div>
                                </div>
                                    <div class="button-position">
                                        <input class="send-button" type="submit" value="Create account"/>
                                    </div>
                                 <div id="fix-float" style="clear:both"></div>
                              </form>
                          </div>
                      </div> 


              <div class="form-content">
                 <div id="register">
                    <form action="login.php" method="post">

                        <div class="row-box">
                            <div class="form-text"><label>Login: </label></div>
                            <div class="form-input">

                                <input class="login" type="text" name="user_name" placeholder="Username" required=""/>

                            </div>
                        </div>
                        <div class="row-box">
                            <div class="form-text"><label>Pass: </label></div>
                            <div class="form-input">
                                <input class="password" type="password" name="user_pass" placeholder="Password" required/>
                            </div>
                        </div>
                            <div class="button-position">
                                <input class="send-button" type="submit" value="Login"/>
                            </div>

                        <div id="fix-float2" style="clear:both"></div>
                      </form>
                    </div>
                </div> 
        </div>
        <?php
      if(!empty($_GET['status'])){
          echo '<p class="user-info">You are logged out :)</p>'; //Display message when user is looged out based on URL info
      }
      
       
      if(isset($_SESSION['error'])){       //Display error when wrong username or password is typed.
            echo $_SESSION['error'];
            }
      
      if (isset ($_SESSION['account_created'])) { //Display message when account is created.
            echo $_SESSION['account_created'];
       }
      
      if (isset ($_SESSION['checked'])) { //Display message that username is already occupied.
            echo $_SESSION['checked'];
      }
        
      ?>
    </body>
</html>
