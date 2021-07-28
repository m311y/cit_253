<!--
    Name: Melissa Hardwick
    Date: 07/25/2021
    Purpose: Assignment 8 - Script 9.6 login.php
-->

<?php 
    //Set the page title and include header file
    define('TITLE', 'Login');
    include('templates/header.html');

    //print some introductory text
    print '<h2>Login Form</h2>
        <p>Users who are logged in can take advantage of certain features like this, that, and the other thing.</p>';
    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        $email = $_POST['email'];
        $password = $_POST['password']; 
        //Handle the form
        if((!empty($_POST['email'])) && (!empty($_POST['password']))) {
            if((strtolower($_POST['email'] == 'me@example.com')) && ($_POST['password'] == 'testpass')) {
                //correct

                //Do session stuff
                session_start();
                $_SESSION['email'] = $_POST['email'];
                $_SESSION['loggedin'] = time();

                //Redirect user to welcome page
                ob_end_clean(); //Destroy the buffer
                header('Location: welcome.php');
                exit();
            } else {
                //incorrect
                print '<p class="text--error">THe submitted email address and password do not match those on file<br>Go back and try again.</p>';
            }
        } else {
            //forgot a field
            print '<p class="test--error">Please make sure you enter both an email address and password!<br>Go back and try again.</p>';
        }
    } else {
        //Display the form
        print '
        <form action="login.php" method="POST" class="form-inline">
            <p>
                <label for="email">Email Address:</label>
                <input type="email" name="email" size="20">
            </p>
            <p>
                <label for="password">Password:</label>
                <input type="password" name="password" size="20">
            </p>
            <p>
                <input type="submit" name="submit" value="Log In!" class="button--pill">
            </p>
        </form>
            ';
    }

    include('templates/footer.html'); 
?>