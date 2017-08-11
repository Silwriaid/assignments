<?php

session_start();

if (! $_SESSION['isLoggedIn']) {
    
    header("Location: logout.php");
    exit;
}

?>

<h1>Welcome: <?php echo $_SESSION['loggedInName'] ?></h1>
<p>This page is secure</p>

<p><a href="login.php">Back</a></p>
<p><a href="logout.php">Logout</a></p>