<?php
    include_once("php-login/session_start.php");

    #Setting page where user's at
    $_SESSION['page'] = 0;
    
    #If a comment has been added
    if($_POST['comment']){
        $content = $_POST['comment'];
        $handle = fopen("php-login/commentMeatballs.txt", "a") or die("Unable to open comments!");
        fwrite($handle, "\n". $_POST['timestamp']. "\n". $_SESSION['user']. "\n". $content);
        fclose($handle);
    }

    #If a comment has been deleted
    if($_POST['delete']){
        $c = copy("php-login/commentMeatballs.txt", "php-login/copyMeatballs.txt");
        $copy = fopen("php-login/copyMeatballs.txt", "r") or die("Unable to open comments copy file!");
        $readComments = fopen("php-login/commentMeatballs.txt", "a") or die("Unable to open empty comments file!");
        file_put_contents('php-login/commentMeatballs.txt', '');
                     
        while(!feof($copy)) {
            $id = fgets($copy);
            $u = fgets($copy);
            $c = fgets($copy);

            if(trim($_POST['delete']) !== trim($id)) {
                fwrite($readComments, $id. $u. $c);
            }
        }
        fclose($readComments); 
        fclose($copy);
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <title>Tasty Recipes - Meatballs</title>
        <link href="css/reset.css" rel="stylesheet" type="text/css">
        <link href="css/stylesheet.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Grand+Hotel%7CUbuntu%7CYanone+Kaffeesatz" rel="stylesheet">
    </head>

    <body>
        <nav>
            <div class="topnav" id="myTopnav">
                <p>Tasty Recipes</p>
                <a href="index.php">Home</a>
                <a href="calendar.php">Calendar</a>
                <a class="active" href="meatballs.php">Meatballs</a>
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
            <section>
                
                <h1>Swedish meatballs</h1>
                
                <img class="recipeImage" src="images/meatball.jpg" alt="Swedish meatballs">
                
                <!--Ingredient section-->
                <div class="left">
                    <h2>Ingredients</h2>
                    <ul>
                        <li>2 slices fresh white bread</li>
                        <li>¼ c. milk</li>
                        <li>3 tbsp. clarified butter</li>
                        <li>½ c. finely chopped onion</li>
                        <li>1 tsp. kosher salt</li>
                        <li>¾ lb. ground chuck</li>
                        <li>¾ lb. ground pork</li>
                        <li>2 large egg yolks</li>
                        <li>½ tsp. black pepper</li>
                        <li>¼ tsp. ground allspice</li>
                        <li>¼ tsp. freshly grated nutmeg</li>
                        <li>¼ c. all-purpose flour</li>
                        <li>3 c. beef broth</li>
                        <li>¼ c. heavy cream</li>
                    </ul>
                </div>
                
                <!--Instruction section-->
                <div class="middle">
                    <h2>Directions</h2>
                    <p><strong>Prep:</strong> 30 min <strong>Cook:</strong> 25 min <strong>Ready in:</strong> 55 min</p>
                    <ol>
                        <li>
                            Preheat oven to 200 degrees F.
                        </li>
                        <li>
                            Tear the bread into pieces and place in a small mixing bowl along with the milk. Set aside.
                        </li>
                        <li>
                            In a 12-inch straight sided saute pan over medium heat, melt 1 tablespoon of the butter. Add the onion and a pinch of salt and sweat until the onions are soft. Remove from the heat and set aside.
                        </li>
                        <li>
                            In the bowl of a stand mixer, combine the bread and milk mixture, ground chuck, pork, egg yolks, 1 teaspoon of kosher salt, black pepper, allspice, nutmeg, and onions. Beat on medium speed for 1 to 2 minutes.
                        </li>
                        
                        <li>
                            Using a scale, weigh meatballs into 1-ounce portions and place on a sheet pan. Using your hands, shape the meatballs into rounds.
                        </li>
                        
                        <li>
                            Heat the remaining butter in the saute pan over medium-low heat, or in an electric skillet set to 250 degrees F. Add the meatballs and saute until golden brown on all sides, about 7 to 10 minutes. Remove the meatballs to an ovenproof dish using a slotted spoon and place in the warmed oven.
                        </li>
                        
                        <li>
                            Once all of the meatballs are cooked, decrease the heat to low and add the flour to the pan or skillet. Whisk until lightly browned, approximately 1 to 2 minutes. Gradually add the beef stock and whisk until sauce begins to thicken. Add the cream and continue to cook until the gravy reaches the desired consistency. Remove the meatballs from the oven, cover with the gravy and serve.
                        </li>
                    </ol>
                </div>
                
                <!-- Comment section -->
                <div class="right">
                    <h2>Comments</h2>
                    <?php
                        if (isset($_SESSION['user'])) {    
                            require_once 'php-login/commentForm.php';
                            include 'commentForm';
                        }
                    ?>
        
                    <div class="commentBox">
                        <?php
                            $readComments = fopen("php-login/commentMeatballs.txt", "r") or die("Unable to open file!");

                            while(!feof($readComments)) {
                                $id = fgets($readComments);
                                $u = fgets($readComments);
                                $c = fgets($readComments);
                                echo "<br><b>". $u. "</b>";
                                echo $c;
                                echo "<br>";
                                if(trim($u) === $_SESSION['user']) {
                                    echo("<form class='deletebtn' action='meatballs.php' method='post'>");
                                    echo("<input type='hidden' name='delete' value='$id'/>");
                                    echo("<input type='submit' value='Delete'/>");
                                    echo("</form>");
                                }
                            }
                            fclose($readComments);

                            if (empty($_SESSION['user'])) {    
                                echo "<h3>Also want to make a comment on this recipe?<br>Please <a href='php-login/login.php'>log in</a> first!</h3>";
                            } 
                        ?>
                    </div>
                </div>
            </section>
        </div>
    </body>

</html>