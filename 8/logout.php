<!--
    Name: Melissa Hardwick
    Date: 07/25/2021
    Purpose: Assignment 8 - Script 9.8 logout.php
-->

<?php 
    //Need the session
    session_start();

    //reset the session array
    $_SESSION = [];

    //Destroy the session data on the server
    session_destroy();

    //Define a page title and include the header
    define('TITLE', 'Logout');
    include('templates/header.html');
?>

<h2>Welcome to the J.D. Salinger Fan Club!</h2>
<p>You are now logged out</p>
<p>Thank you for using the site. This is some filler text.<br> It is here to make the page seem less empty</p>

<?php 
    include('templates/footer.html');
?>