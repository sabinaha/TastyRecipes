<?php
    include_once("session_start.php");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Tasty Recipes - Sign up</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link href="../css/reset.css" rel="stylesheet" type="text/css">
        <link href="../css/stylesheet.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Grand+Hotel%7CUbuntu%7CYanone+Kaffeesatz" rel="stylesheet">
    </head>
    
    <body>
        <nav>
            <div class="topnav" id="myTopnav">
                <p>Tasty Recipes</p>
                <a href="../index.php">Home</a>
                <a href="../calendar.php">Calendar</a>
                <a href="../meatballs.php">Meatballs</a>
                <a href="../pancakes.php">Pancakes</a>
                <?php if(empty($_SESSION['user'])){
                    echo'<a id="login" href="login.php">Log in</a>';
                }
                elseif(isset($_SESSION['user'])){
                    echo '<a id="logout" href="logout.php">Log out</a>';
                } ?>
                <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
            </div>

            <script>
            function myFunction() {
                var x = document.getElementById("myTopnav");
                if (x.className === "topnav") {
                    x.className += " responsive";
                } else {
                    x.className = "topnav";
                }
            }
            </script>
            
        </nav>
        
        <header>
            <img id="head" src="../images/header.png" alt="Header of Tasty Recipes">
        </header>
        
        <div class="wrapper">
            <section>
                <h1>Register new user</h1>
                <form accept-charset="UTF-8" role="form" method="get" action="registration_red.php">
                    
                    <div class="logcontainer">
                        <lable>Username</lable>
                        <input type="text" placeholder="Choose your username" name="username" required>
                        <br>
                        <lable>Password</lable>
                        <input type="password" placeholder="Choose a password" name="password" required>
                        <br>
                        <button class="button" type="submit" name="submit" value="register">Register</button>
                        
                        <button class="button" type="button" class="cancelbtn">
                            <a href="signup.php">Cancel</a>
                        </button>
                    </div>
                </form>
            </section>
        </div>
    </body>
</html>