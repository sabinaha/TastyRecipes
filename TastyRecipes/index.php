<?php

    include_once("php-login/session_start.php");

?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <title>Tasty Recipes - Pancakes</title>
        <link href="css/reset.css" rel="stylesheet" type="text/css">
        <link href="css/stylesheet.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Grand+Hotel%7CUbuntu%7CYanone+Kaffeesatz" rel="stylesheet">
    </head>

    <body>
        
        <nav>
            <div class="topnav" id="myTopnav">
                <p>Tasty Recipes</p>
                <a class="active" href="index.php">Home</a>
                <a href="calendar.php">Calendar</a>
                <a href="meatballs.php">Meatballs</a>
                <a href="pancakes.php">Pancakes</a>
                <?php if(empty($_SESSION['user'])){
                    echo'<a id="login" href="php-login/login.php">Log in</a>';
                }
                elseif(isset($_SESSION['user'])){
                    echo '<a id="logout" href="php-login/logout.php">Log out</a>';
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
            <img id="head" src="images/header.png" alt="Header of Tasty Recipes">
        </header>
        <div class="wrapper">
            <div class="about">
                <h1>About us</h1>
                <p>
                    Thank you so much for stopping by the site! If you are new to Tasty Recipes, the one thing you should know about us is that we are obsessed with creating scratch cooking recipes that you will love.<br><br>
                    There are two things we think about when deciding if a recipe is good enough to go on the site.<br>
                    First, does it work? Does the dish make us smile inside and out? Do we want to eat the whole batch by ourselves?<br> 
                    Second, if the dish tastes great, is it worth the effort? Do we want to make it again (and again and again)?<br><br>
                    Please try the recipes and if you have a question or constructive feedback, let us know about it in the comments to the recipe.
                </p>
            </div>
            <div class="aside">
                
                <h1>News</h1>

                <h2>Calendar</h2>
                <p><a href="calendar.html">Here</a> you can see the recipe of the day.</p>

                <h2 id="secondh2">Newly added recipes</h2>
                <div id="list">
                    <ul>
                        <li><a href="meatballs.html">Meatballs</a></li>
                        <li><a href="pancakes.html">Pancakes</a></li>
                    </ul>
                </div>

            </div>
        </div>
        
    </body>

</html>