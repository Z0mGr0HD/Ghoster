<?php
if($_POST['logout']) {
session_abort('userid');
session_abort('username');
}
?>



<html>
    <head>
        
    </head>
    
    <body>
        <form method="POST">
            <input type="submit" value="logout" name="logout" />
        </form>
    </body>
</html>