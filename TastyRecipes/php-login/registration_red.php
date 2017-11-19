<?php
    include_once("session_start.php");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Tasty Recipes - Seccessful registration</title>
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
        
                <?php
                    $readFromFile = fopen("users.txt", "r+") or die("Unable to open file!");
                    $username = $_GET["username"];
                    $password = $_GET["password"];

                    while(!feof($readFromFile)){
                        if(trim(fgets($readFromFile)) === $username){
                            echo "<p id='signup'>Username already taken, please <a href='signup.php'>try a new one</a>.</p>";
                            break;
                        }
                        fgets($readFromFile);
                        fgets($readFromFile);
                    }

                    if(fgets($readFromFile) === false){
                        $txt = PHP_EOL . $username;
                        fwrite($readFromFile, $txt);
                        $txt = PHP_EOL . $password;
                        fwrite($readFromFile, $txt);
                        $txt = PHP_EOL . "end";
                        fwrite($readFromFile, $txt);
                        echo"<h1>Registration successful!</h1><br><p>You are registered with username {$_SESSION['user']}! <br>You can now sign in <a href='login.php' style='color:white;'>here</a></p>";
                    }
                    fclose($readFromFile);
                ?>
            </section>
        </div>
    </body>

</html>