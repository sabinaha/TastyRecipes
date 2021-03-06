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
                <a href="index.php">Home</a>
                <a class="active" href="calendar.php">Calendar</a>
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
            <section>
                <h1>Calendar</h1>

                <div id="calendar-wrap">
                        <h2>August 2017</h2>
                    <div id="calendar">
                        <ul class="weekdays">
                            <li>Monday</li>
                            <li>Tuesday</li>
                            <li>Wednesday</li>
                            <li>Thursday</li>
                            <li>Friday</li>
                            <li>Saturday</li>
                            <li>Sunday</li>
                        </ul>

                        <!-- Days from previous month -->

                        <ul class="days">
                            <li class="day other-month">
                                <div class="date">31</div>                      
                            </li>

                            <!-- Days in current month -->

                            <li class="day">
                                <div class="date">1</div>                       
                            </li>
                            <li class="day">
                                <div class="date">2</div>                     
                            </li>
                        </ul>

                            <!-- Row #2 -->

                        <ul class="days">
                            <li class="day">
                                <div class="date">3</div>                       
                            </li>
                            <li class="day">
                                <div class="date">4</div>                       
                            </li>
                            <li class="day">
                                <div class="date">5</div>                       
                            </li>
                            <li class="day">
                                <div class="date">6</div>                       
                            </li>
                            <li class="day">
                                <div class="date">7</div>
                                <div class="event">
                                    <div class="event-desc">
                                        <a href="meatballs.html"><img src="images/meatball.jpg" alt="Swedish meatballs" class="imageCalendar"></a>
                                    </div>
                                </div>                      
                            </li>
                            <li class="day">
                                <div class="date">8</div>                       
                            </li>
                            <li class="day">
                                <div class="date">9</div>                       
                            </li>
                        </ul>

                            <!-- Row #3 -->

                        <ul class="days">
                            <li class="day">
                                <div class="date">10</div>                      
                            </li>
                            <li class="day">
                                <div class="date">11</div>                      
                            </li>
                            <li class="day">
                                <div class="date">12</div>                      
                            </li>
                            <li class="day">
                                <div class="date">13</div>                      
                            </li>
                            <li class="day">
                                <div class="date">14</div>                  
                            </li>
                            <li class="day">
                                <div class="date">15</div>                      
                            </li>
                            <li class="day">
                                <div class="date">16</div>                      
                            </li>
                        </ul>

                            <!-- Row #4 -->

                        <ul class="days">
                            <li class="day">
                                <div class="date">17</div>                      
                            </li>
                            <li class="day">
                                <div class="date">18</div>
                                <div class="event">
                                    <div class="event-desc">
                                        <a href="pancakes.html"><img src="images/pancakes.jpg" alt="Pancakes" class="imageCalendar"></a>
                                    </div>
                                </div>     
                            </li>
                            <li class="day">
                                <div class="date">19</div>                      
                            </li>
                            <li class="day">
                                <div class="date">20</div>                      
                            </li>
                            <li class="day">
                                <div class="date">21</div>                      
                            </li>
                            <li class="day">
                                <div class="date">22</div>                   
                            </li>
                            <li class="day">
                                <div class="date">23</div>                      
                            </li>
                        </ul>

                                <!-- Row #5 -->

                        <ul class="days">
                            <li class="day">
                                <div class="date">24</div>                      
                            </li>
                            <li class="day">
                                <div class="date">25</div>                    
                            </li>
                            <li class="day">
                                <div class="date">26</div>                      
                            </li>
                            <li class="day">
                                <div class="date">27</div>                      
                            </li>
                            <li class="day">
                                <div class="date">28</div>                      
                            </li>
                            <li class="day">
                                <div class="date">29</div>                      
                            </li>
                            <li class="day">
                                <div class="date">30</div>                      
                            </li>
                        </ul>

                        <!-- Row #6 -->

                        <ul class="days">
                            <li class="day">
                                <div class="date">31</div>                      
                            </li>
                            <li class="day other-month">
                                <div class="date">1</div> <!-- Next Month -->                       
                            </li>
                            <li class="day other-month">
                                <div class="date">2</div>                       
                            </li>
                            <li class="day other-month">
                                <div class="date">3</div>                       
                            </li>
                        </ul>

                    </div><!-- /. calendar -->
                </div>
            </section>
        </div>
    </body>

</html>