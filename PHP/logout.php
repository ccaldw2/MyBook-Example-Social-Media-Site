<?php 
    require_once 'header.php';
    
    if (isset($_SESSION['user'])) {
        destroySession();
        echo "<div class='main'>You have been logged out. please " . 
             "<a href='index.php'>click here</a> to referesh the screen.";
    }
    
    else echo "<div class='main'><br>You cannot log out because you aren't logged in";
?>

    	
    </body>
</html>