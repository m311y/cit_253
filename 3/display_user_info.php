<!--
    Name: Melissa Hardwick
    Date: 06/30/2021
    Purpose: Assignment 3 - Form Processing
-->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="styles.css">
        <title>Form Processing Demonstrated Through User Registration</title>
    </head>
    <body>
        <?php 
            //Get variable values from user_input.html form
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $email = $_POST['email'];
            $tel = $_POST['tel'];
            $address = $_POST['address'];
            $city = $_POST['city'];
            $state = $_POST['state'];
            $zip = $_POST['zip'];

            //fORMATTED PHONE
            $formatted = substr($tel,0,3)."-".substr($tel,3,3)."-".substr($tel,6);
         
           

            print"
                <table>
                    <th colspan=\"2\">Please enter user information</th>
                    <tbody>
                        <tr>
                            <td>Name:</td>
                            <td>$fname $lname</td>
                        </tr>
                        <tr>
                            <td>Address:</td>
                            <td>$address</td>
                        </tr>
                        <tr>
                            <td>City, State, Zip:</td>
                            <td>$city, $state, $zip</td>
                        </tr>
                        <tr>
                            <td>Telephone #:</td>
                            <td>$formatted</td>
                        </tr>
                        <tr>
                            <td>Email:</td>
                            <td>$email</td>
                        </tr>
                        <tr>
                            <form action=\"user_input.html\" method=\"GET\">
                                <td><input type=\"submit\" value=\"Return to input form\"/></td>
                                <td></td>
                            </form>
                        </tr>
                    </tbody>
                </table>
            ";
            
        ?>
    </body>
</html>