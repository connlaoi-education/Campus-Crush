<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
    Group 21
	Name: Jeremy Power
    File: <?php echo "$fileName \n"; ?>
    Date: <?php echo "$date \n"; ?>
    <?php echo "$description \n"; ?>
-->
    <?php 
	require('includes/constants.php');
	require('includes/db.php');
	require('includes/functions.php');
	?>
    <?php ob_start();
    session_start(); ?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab' rel='stylesheet' />
    <link rel="stylesheet" href="./css/crush.css" type="text/css" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="theme-color" content="#285C9B"/>
    <title><?php echo "$title";?></title>
    <link rel="shortcut icon" type="image/x-icon" href="./images/cc_logo.png" />
</head>

<body>
    <div id="container">
        <div id="header">
            <a href="./index.php"><img src="./images/cc_logo.png" alt="Campus Crush" /></a>
            <?php echo "<h1>$banner</h1>";?>
        </div>
        <div id="sites">
                <ul>
                    <?php
                    //if not logged in, show login and register
                    if(!isset($_SESSION['username'])) {
                    echo('<li><a href="./user-login.php">Login</a></li>
                    <li><a href="./user-register.php">Register</a></li>');
                } else {
                    //show to incomplete users
                    if($_SESSION['account_type'] == INCOMPLETE) {
                    echo('
                    <li><a href="./profile-create.php">Profile Create</a></li>');
                    } else {
                    echo(
                        //show to admin
                    '<li><a href="./dashboard.php">Dashboard</a></li>');
                    //show to complete users
                    if($_SESSION['account_type'] == CLIENT) {
                     echo('<li><a href="./profile-display.php">Profile</a></li>
                     <li><a href="./profile-create.php">Update Profile</a></li>');
                 }
                 //show to admin
                    echo('<li><a href="./profile-search.php">Search</a></li>');
                }

                    //show to all users
                    echo('
                     <li><a href="./user-update.php">Update User Info</a></li>
                     <li><a href="./user-password-request.php">Change Password</a></li>
                     <li style="float: right;"><a href="./user-logout.php">Logout</a></li> ');
                }
                    ?>
                </ul>
        </div>
        <div id="content-container">
            <div id="content">