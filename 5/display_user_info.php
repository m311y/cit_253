<!--
    Name: Melissa Hardwick
    Date: 07/09/2021
    Purpose: Assignment 5 - String Manipulation Functions
-->
<!DOCTYPE html>
<html lang="en">
    <head>
        <style>
            <?php include "styles.css" ?>
        </style>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text" href="styles.css">
        <title>Display your info</title>
    </head>
    <body>
        <?php 
        //Declare variable values from the user_input form
        $full_name = $_POST['fullname'];
        $tel = $_POST['tel'];
        $email = $_POST['email'];
        $notes = $_POST['notes'];

        //Split fullname into fname and lname variables with first letters capitalized
        $full_name_raw = trim($full_name); //trim leading and trailing spaces
        $name_parts = explode(" ", $full_name_raw); //explode full name into array
        $l_name = ucfirst(array_pop($name_parts)); //pop last name out of array and uppercase
        $f_name = ucfirst(implode(" ", $name_parts)); //implode array back to just first name and uppercase

        //remove special characters and spaces from phone number
        $clean_tel = preg_replace('/[^A-Za-z0-9]/', '', $tel);

        //Split email into username and domain with all letters lowercase
        $email_raw = trim($email); //trim leading and trailing spaces
        $email_parts = explode("@", $email_raw); //explode full email into an array
        $domain = strtolower(array_pop($email_parts)); //pop domain out of array and lower case
        $username = strtolower(implode($email_parts));//implode array back to just username and lower case

        //Strip HTML and PHP tags && replace " " with "-" && extract first 30 characters && convert new lines to breaks
        $html_notes = htmlentities($notes); //all HTML tags to their entity versions
        $clean_notes = strip_tags($notes); //all HTML and PHP tags are stripped
        $first_30 = substr($clean_notes,0,30); //only forst 30 characters
        $first_30_dash = str_replace(" ", "-", $first_30); //replace " " with "-"
        $notes_nl2br = strtolower(nl2br($first_30_dash, false)); // new lines to br and lower case


        print"
            <h1>Display Your info</h1>
            <p></p>
            <table>
                <tr>
                    <td class=\"left-col\">First Name:</td>
                    <td class=\"right-col\">$f_name</td>
                </tr>
                <tr>
                    <td class=\"left-col\">Last Name:</td>
                    <td class=\"right-col\">$l_name</td>
                </tr>
                <tr>
                    <td class=\"left-col\">Telephone Number:</td>
                    <td class=\"right-col\">$clean_tel</td>
                </tr>
                <tr>
                    <td class=\"left-col\">Username:</td>
                    <td class=\"right-col\">$username</td>
                </tr>
                <tr>
                    <td class=\"left-col\">Domain:</td>
                    <td class=\"right-col\">$domain</td>
                </tr>
                <tr>
                    <td class=\"left-col\">Notes:</td>
                    <td class=\"right-col\">$notes_nl2br</td>
                </tr>
            </table>

            <a href=\"user_input.html\">Return to input form</a>
        ";
        ?>
    </body>
</html>