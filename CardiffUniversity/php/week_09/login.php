<?php

session_start();

if(isset($_POST['submit']) && $_POST['submit'] == 'Login') {
    
    
    if( ($_POST['username'] == 'Chris') &&
        ($_POST['password'] == 'Maggs')) {
        
        // Set SESSION variables to use to check
        $_SESSION['isLoggedIn'] = true;
        $_SESSION['loggedInName'] = $_POST['username'];
    }
    else {
        $_SESSION['isLoggedIn'] = false;
        $_SESSION['loggedInName'] = '';        
    }
}
?>

<h1>My Secure Page</h1>

<?php if (! $_SESSION['isLoggedIn']) { ?>

<form name="" action ="" method="post">
    
    <p>
        <input name="username" type="text">
        <input name="password" type="password">
    </p>
    
    <input name="submit" type="submit" value="Login">
    
</form>

<?php } else { ?>

<h2>Welcome: <?php echo $_SESSION['loggedInName'] ?><h2>
<?php } ?>

<p><a href="secure.php">Secure page</a></p>
<p><a href="logout.php">Logout</a></p>


