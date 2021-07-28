<!--
    Name: Melissa Hardwick
    Date: 07/28/2021
    Purpose: Assignment 10 - Script 13.2
    This script defines custom functions
-->

<?php 
    //This function checks if the user is an adminsistrator.
    //This function takes two optional values
    //This function returns a boolean value.

    function is_administrator($name='Samuel', $value = 'Clemens') {

        //check for the cookie and check it's value
        if (isset($_COOKIE[$name]) && ($_COOKIE[$name] == $value)) {
            return true;

        } else {
            return false;
        }
    }  //end of function