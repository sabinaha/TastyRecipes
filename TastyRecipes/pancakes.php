<?php
    include_once("php-login/session_start.php");

    #Setting page where user's at
    $_SESSION['page'] = 1;
    
    #If a comment has been added
    if($_POST['comment']){
        $content = $_POST['comment'];
        $handle = fopen("php-login/commentPancakes.txt", "a") or die("Unable to open comments!");
        fwrite($handle, "\n". $_POST['timestamp']. "\n". $_SESSION['user']. "\n". $content);
        fclose($handle);
    }

    #If a comment has been deleted
    if($_POST['delete']){
        $c = copy("php-login/commentPancakes.txt", "php-login/copyMeatballs.txt");
        $copy = fopen("php-login/copyPancakes.txt", "r") or die("Unable to open comments copy file!");
        $readComments = fopen("php-login/commentPancakes.txt", "a") or die("Unable to open empty comments file!");
        W('php-login/commentPancakes.txt', '');
                     
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
        <title>Tasty Recipes - Pancakes</title>
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
                <a href="meatballs.php">Meatballs</a>
                <a class="active" href="pancakes.php">Pancakes</a>
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
                
                <h1>American pancakes</h1>
                <img class="recipeImage" src="images/pancakes.jpg" alt="American pancakes">
                
                <div class="left">
                    
                    <h2>Ingredients</h2>
                    <ul>
                        <li>150g plain flour</li>
                        <li>½ teaspoon salt</li>
                        <li>1 tablespoon baking powder</li>
                        <li>1 teaspoon caster sugar</li>
                        <li>225ml milk</li>
                        <li>1 egg</li>
                        <li>1 knob of butter, melted</li>
                        <li>butter or oil for frying</li>
                    </ul>
                </div>
                
                <div class="middle">
                    <h2>Directions</h2>
                    <p><strong>Prep:</strong> 10 min <strong>Cook:</strong> 15 min <strong>Ready in:</strong> 25 min</p>
                    <ol>
                        <li>
                            Sift together the flour, salt, baking powder and sugar. Make a well in the centre. Pour in the milk, then add the egg and melted butter. Beat well till the pancake batter is smooth.
                        </li>
                        <li>
                            Heat a frying pan over medium heat. Lightly grease with butter or vegetable oil. To test to see if the pan is hot enough, flick a bit of water on the pan. If it sizzles, it is ready. Ladle the pancake batter into the pan.
                        </li>
                        <li>
                            Cook each pancake till bubbles appear on the surface and the edges have gone slightly dry. Flip each pancake and cook for a minute or two on the reverse side, till golden brown.
                        </li>
                        <li>
                            Serve hot with your favourite toppings, such as maple syrup and fresh berries. Enjoy!
                        </li>
                    </ol>
                </div>
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
                            $readComments = fopen("php-login/commentPancakes.txt", "r") or die("Unable to open file!");

                            while(!feof($readComments)) {
                                $id = fgets($readComments);
                                $u = fgets($readComments);
                                $c = fgets($readComments);
                                echo "<br><b>". $u. "</b>";
                                echo $c;
                                echo "<br>";
                                if(trim($u) === $_SESSION['user']) {
                                    echo("<form class='deletebtn' action='pancakes.php' method='post'>");
                                    echo("<input type='hidden' name='delete' value='$id'/>");
                                    echo("<input type='submit' value='Delete'/>");
                                    echo("</form>");
                                }
                            }
                            fclose($readComments);

                            if (empty($_SESSION['user'])) {    
                                echo "<p>Also want to make a comment on this recipe?<br>Please <a href='php-login/login.php'>log in</a> first!</p>";
                            } 
                        ?>
                    </div>
                </div>
            </section>
        </div>
    </body>

</html>