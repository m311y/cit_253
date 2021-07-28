<!--
    Name: Melissa Hardwick
    Date: 07/28/2021
    Purpose: Assignment 10 - Script 13.6
    This page lets people log out of the site and destroys the cookie
-->

<?php 
    
    //Destroy the cookie if it exists
    if (isset($_COOKIE['Samuel'])) {
        setcookie('Samuel', 'FALSE', time()-300);
    }

    //Define the page title and include the header
    define('TITLE', 'Logout');
    include('templates/header.html');

    //Print a message
    print '<p>You are now logged out!</p>';
    //display a link to return to index.php
    print '<p><a href="index.php">Return to Homepage</a></p>';

    //Include the footer
    include('templates/footer.html');
?>

