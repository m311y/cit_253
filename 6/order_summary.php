<!--
    Name: Melissa Hardwick
    Date: 07/10/2021
    Purpose: Assignment 6 - Coffee house Order Form
-->

    <head>
        <meta charset="utf-8">
        <style>
           <?php include "styles.css" ?>
        </style>
        <link rel="stylesheet" type="text" href="styles.css">
        <title>The Coffee House - Order Summary</title>
    </head>
    <body>
        <?php
            

            //Track variable success
            $okay = TRUE;

            //Declare variables from coffee order form
            $coffee = $_POST['coffee'];
            $type = $_POST['type'] ?? "";
            $quantity = $_POST['quantity'];
            $cast_int = (int)$quantity;
            $name = $_POST['name'];
            $email = $_POST['email'];
            $telephone = $_POST['telephone'];
            $address = $_POST['address'];
            $city = $_POST['city'];
            $state = $_POST['state'];
            $zip = $_POST['zip'];
            $add_one = 0;
            $unit_price = 0;

            //formatted phone number
            $formatted_telephone = sprintf("(%s)%s-%s",
                                            substr($telephone, 0, 3),
                                            substr($telephone, 3, 3),
                                            substr($telephone, 6, 4));

            //determine price of selected coffee
            switch ($_POST['coffee']) {
                case 'Boca Vila' :
                    $unit_price = 7.99;
                    break;
                case 'South Beach Rhythm' :
                    $unit_price = 8.99;
                    break;
                case 'Pumpkin Paradise' :
                    $unit_price = 8.99;
                    break;
                case 'Sumatran Sunset' :
                    $unit_price = 9.99;
                    break;
                case 'Bali Batur' :
                    $unit_price = 10.95;
                    break;
                case 'Double Dark' :
                    $unit_price = 9.95;
                    break;
            }

            //Add one dollar for decaf
            switch($_POST['type'] ?? "") {
                case 'Regular' :
                    $add_one = 0.00;
                    break;
                case 'Decaffeinated' :
                    $add_one = 1.00;
                    break;
                    
            }

            //Add decaf up charge to coffee base price then multiply bu quantity
            $total = $unit_price + $add_one;
            $grand_total = $total * $cast_int;

                 //Validate form variables and handle errors
            
            if (empty($_POST['coffee'])) {
                $okay = FALSE;
            }else{
                $coffee = $_POST['coffee'] ?? "";
                $okay - TRUE;
            }

            if (empty($_POST['type'])) {
                $okay = FALSE;
            }else{
                $coffee = $_POST['type'] ?? "";
                $okay - TRUE;
            }

            if (empty($_POST['quantity'])) {
                $okay = FALSE;
            } elseif (!is_numeric($_POST['quantity'])) {
                $okay = FALSE;
            }else{
                $quantity = $_POST['quantity'];
                $okay - TRUE;
            }


            if (empty($_POST['name'])) {
                $okay = FALSE;
            }else{
                $name = $_POST['name'];
                $okay - TRUE;
            
            }

            if (empty($_POST['email'])) {
                $okay = FALSE;
            }else{
                $email = $_POST['email'];
                $okay - TRUE;
            }

            if (empty($_POST['telephone'])) {
                $okay = FALSE;

            } elseif (!is_numeric($_POST['telephone'])) {
                $okay = FALSE;
            }else{
                $telephone = $_POST['telephone'];
                $okay - TRUE;
            }

            if (empty($_POST['address'])) {
                $okay = FALSE;

            }else{
                $address = $_POST['address'];
                $okay - TRUE;
            }

            if (empty($_POST['city'])) {
                $okay = FALSE;

            }else{
                $city = $_POST['city'];
                $okay - TRUE;
            }

            if (empty($_POST['state'])) {
                $okay = FALSE;

            }else{
                $state = $_POST['state'];
                $okay - TRUE;
            }

            if (empty($_POST['zip'])) {
                $okay = FALSE;

            } elseif (!is_numeric($_POST['zip'])){
                $okay = FALSE;
            }else{
                $zip = $_POST['zip'];
                $okay - TRUE;
            }

            
                switch($okay) {
                    case TRUE :
                        print "
                        <span class=\"order-body\">
                        <h1>The Coffee House</h1>
                        <h2>Order Summary</h2>
                        <div>
                        <table id=\"contact-table\" class=\"contact-table\">
                            <tbody>
                                <tr>
                                    <td>Name:</td>
                                    <td>$name</td>
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
                                    <td>phone #:</td>
                                    <td>$formatted_telephone</td>
                                </tr>
                                <tr>
                                    <td>E-mail:</td>
                                    <td>$email</td>
                                </tr>
                            </tbody>
                        </table>
                        <br>
                        <table id=\"order-table\" class=\"order-table\">
                            <caption>Order Information</caption>
                            <thead>
                                <tr>
                                    <th>Coffee</th>
                                    <th>Type</th>
                                    <th>Quantity</th>
                                    <th>Unit Cost</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>$coffee</td>
                                    <td>$type</td>
                                    <td>$quantity lb(s)</td>
                                    <td>$$unit_price</td>
                                    <td>$$grand_total</td>
                                </tr>
                            </tbody>
                        </table>
                        </section>
                        ";
                        break;

                    case FALSE :
                        print '<section class=\"error-body\">';
                        print"
                        <h2 class=\"error\">Error!</h2>
                        ";
            //Print errors
            if (empty($_POST['coffee'])) {
                print '<p class="error">Please select a coffee to be purchased.</p>';
                $okay = FALSE;
            }else{
                $coffee = $_POST['coffee'] ?? "";
                $okay - TRUE;
            }

            if (empty($_POST['type'])) {
                print '<p class="error">Please select regular or decaffeinated.</p>';
                $okay = FALSE;
            }else{
                $coffee = $_POST['type'] ?? "";
                $okay - TRUE;
            }

            if (empty($_POST['quantity'])) {
                print '<p class="error">Please enter a numeric value for quantity.</p>';
                $okay = FALSE;
            } elseif (!is_numeric($_POST['quantity'])) {
                print '<p class="error">Please enter a numeric value for quantity.</p>';
                $okay = FALSE;
            }else{
                $quantity = $_POST['quantity'];
                $okay - TRUE;
            }


            if (empty($_POST['name'])) {
                print'<p class="error">Please enter a name.</p>';
                $okay = FALSE;
                $okay - TRUE;

            }else{
                $name = $_POST['name'];
                $okay - TRUE;
                $okay - TRUE;
            }

            if (empty($_POST['email'])) {
                print'<p class="error">Please enter an email address.</p>';
                $okay = FALSE;
                $okay - TRUE;

            }else{
                $name = $_POST['email'];
                $okay - TRUE;
            }

            if (empty($_POST['telephone'])) {
                print'<p class="error">Please enter a numeric phone number.</p>';
                $okay = FALSE;

            } elseif (!is_numeric($_POST['telephone'])) {
                print'<p class="error">Please enter a numeric zip code.</p>';
                $okay = FALSE;
            }else{
                $name = $_POST['telephone'];
                $okay - TRUE;
            }

            if (empty($_POST['address'])) {
                print'<p class="error">Please enter an address.</p>';
                $okay = FALSE;

            }else{
                $name = $_POST['address'];
                $okay - TRUE;
            }

            if (empty($_POST['city'])) {
                print'<p class="error">Please enter a city.</p>';
                $okay = FALSE;

            }else{
                $name = $_POST['city'];
                $okay - TRUE;
            }

            if (empty($_POST['state'])) {
                print'<p class="error">Please enter a state abbreviation.</p>';
                $okay = FALSE;

            }else{
                $name = $_POST['state'];
                $okay - TRUE;
            }

            if (empty($_POST['zip'])) {
                print'<p class="error">Please enter a numeric zip code.</p>';
                $okay = FALSE;

            } elseif (!is_numeric($_POST['zip'])){
                print'<p class="error">Please enter a numeric zip code.</p>';
                $okay = FALSE;
            }else{
                $name = $_POST['zip'];
                $okay - TRUE;
            }
                        break;
                    default :
                        print "";
                        
                }
            print '</section>';
            print'<br>';
            print "<a href=\"order_form.html\">Return to order form</a>";
        ?>
    </body>

