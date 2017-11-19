<?php
    include_once("session_start.php");
    
    session_destroy();
    echo"<meta http-equiv='refresh' content='0;url=../index.php'>";