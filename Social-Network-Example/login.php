<?php 
    require_once 'header.php';
    echo "<div class='main'><h3>Please enter your login credentials</h3>";
    $error = $user =$pass = "";
    
    if (isset($_POST['user'])) {
        $user = sanitizeString($_POST['user']);
        $pass = sanitizeString($_POST['pass']);
        
        if ($user == "" || $pass == "")
            $error = "Not all fields were entered<br />";
        else {
            $result = queryMysql("SELECT user, pass FROM members WHERE user='$user' AND pass='$pass'");
            
            if ($result->num_rows == 0) {
                $error = "<span class='error'>Invalid username/password combination</span><br /><br />";
            }
            
            else {
                $_SESSION['user'] = $user;
                $_SESSION['pass'] = $pass;
                die("You are now logged in. Click <a href='members.php?view=$user'>HERE</a> to continue.<br /><br />");
            }
        }  
    }
    
    echo <<<_END
        <form method='post' action='login.php'>$error
            <span class='fieldname'>Username</span>
            <input type='text' maxlength='16' name='user' value='$user'><br />
            <span class='fieldname'>Password</span>
            <input type='password' maxlength='16' name='pass' value='$pass'><br />
_END;
?>
    
            <br />
            <span class='fieldname'>&nbsp;</span>
            <input type='submit' value='Login'>
        </form><br />
        </div>
    </body>
<html>