<?php
    include_once("session_start.php")
?>

<!DOCTYPE html>
<html lang="en">
   
    <head>
        <title>Tasty Recipes - Login Successful</title>
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
                <a id="logout"href="logout.php" class="logButton">Log out</a>
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
                <div class="loginBox">
                    <?php
                        $readFromFile = fopen("users.txt", "r") or die("Unable to open file!");
                        $username = $_GET["username"];
                        $password = $_GET["password"];
                        while(!feof($readFromFile)){
                            if(trim(fgets($readFromFile)) === $username){
                                if(trim(fgets($readFromFile)) === $password){
                                    $_SESSION["user"] = $username;
                                    echo "<h2>Welcome {$_SESSION['user']}! You are now logged in!";
                                    break;
                                }
                                echo "<h3>Wrong password, <a href='login.php'>try again.</a></h3>";
                                echo "<h3>If you don't have a registered account yet, please register one <a href='signup.php'>here</a></h3>";
                                break;
                            }
                            fgets($readFromFile);
                            fgets($readFromFile);
                        }

                        if(fgets($readFromFile) === false){
                            echo "<h1>Oops!</h1>";
                                echo "<p>That username is not registered yet,<br>please <a style='color:white;' href='login.php'>try again</a> with an existing account.</p>";
                                echo "<p>If you don't have an account yet, please register <a style='color:white;' href='signup.php'>here</a></p>";
                        }
                        fclose($readFromFile);
                    ?>
                </div>
            </section>
        </div>
    </body>

</html>