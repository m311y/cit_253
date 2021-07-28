<!--
    Name: Melissa Hardwick
    Date: 07/21/2021
    Purpose: Assignment 7 - Coffee house Order Form - Sticky Form
-->
<head>
<meta charset="utf-8">
        <style>
           <?php include "styles.css" ?>
        </style>
        <link rel="stylesheet" type="text" href="styles.css">
</head>
<body>
<?php 
//usu php to define title
 define('TITLE', 'The coffee House');
//Print header
 print'<h1>The Coffee House</h1>';

 //check to see if form has been submitted
 if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    //Track Variable success
    $okay = TRUE;

    //Validate form variables and handle errors    
    if (empty($_POST['coffee'])) {
        $okay = FALSE;
        print '<p class="error">Please select a coffee to be purchased.</p>';
    }else{
        $coffee = $_POST['coffee'] ?? "";
        $okay = TRUE;
    }

    if (empty($_POST['type'])) {
        $okay = FALSE;
        print '<p class="error">Please select regular or decaffeinated.</p>';
    }else{
        $coffee = $_POST['type'] ?? "";
        $okay = TRUE;
    }

    if (empty($_POST['quantity'])) {
        $okay = FALSE;
        print '<p class="error">Please enter a numeric value for quantity.</p>';
    } elseif (!is_numeric($_POST['quantity'])) {
        $okay = FALSE;
        print '<p class="error">Please enter a numeric value for quantity.</p>';
    }else{
        $quantity = $_POST['quantity'];
        $okay = TRUE;
    }


    if (empty($_POST['name'])) {
        $okay = FALSE;
        print'<p class="error">Please enter a name.</p>';
    }else{
        $name = $_POST['name'];
        $okay = TRUE;
    
    }

    if (empty($_POST['email'])) {
        $okay = FALSE;
        print'<p class="error">Please enter an email address.</p>';
    }else{
        $email = $_POST['email'];
        $okay - TRUE;
    }

    if (empty($_POST['telephone'])) {
        $okay = FALSE;
        print'<p class="error">Please enter a numeric phone number.</p>';

    } elseif (!is_numeric($_POST['telephone'])) {
        $okay = FALSE;
        print'<p class="error">Please enter a numeric phone number.</p>';
    }else{
        $telephone = $_POST['telephone'];
        $okay - TRUE;
    }

    if (empty($_POST['address'])) {
        $okay = FALSE;
        print'<p class="error">Please enter an address.</p>';

    }else{
        $address = $_POST['address'];
        $okay - TRUE;
    }

    if (empty($_POST['city'])) {
        $okay = FALSE;
        print'<p class="error">Please enter a city.</p>';

    }else{
        $city = $_POST['city'];
        $okay - TRUE;
    }

    if (empty($_POST['state'])) {
        $okay = FALSE;
        print'<p class="error">Please enter a state abbreviation.</p>';

    }else{
        $state = $_POST['state'];
        $okay - TRUE;
    }

    if (empty($_POST['zip'])) {
        $okay = FALSE;
        print'<p class="error">Please enter a numeric zip code.</p>';

    } elseif (!is_numeric($_POST['zip'])){
        $okay = FALSE;
        print'<p class="error">Please enter a numeric zip code.</p>';
    }else{
        $zip = $_POST['zip'];
        $okay - TRUE;
    }

    //Decalre variables from coffee order form
    $coffee = $_POST['coffee'] ?? "";
    $type = $_POST['type'] ?? "";
    $quantity = $_POST['quantity'] ?? "";
    $cast_int = (int)$quantity;
    $name = $_POST['name'] ?? "";
    $email = $_POST['email'] ?? "";
    $telephone = $_POST['telephone'] ?? "";
    $address = $_POST['address'] ?? "";
    $city = $_POST['city'] ?? "";
    $state = $_POST['state'] ?? "";
    $zip = $_POST['zip'] ?? "";
    $add_one = 0;
    $unit_price = 0;

     //formatted phone number
     $formatted_telephone = sprintf("(%s)%s-%s",
     substr($telephone, 0, 3),
     substr($telephone, 3, 3),
     substr($telephone, 6, 4));

    //determine price of selected coffee
    switch ($_POST['coffee'] ?? "") {
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

    switch($okay) {
        case FALSE :
            print '
            <h2 class=\"error\">Error!</h2>
                <form action="coffee_order.php" method="POST">
                <table id="orderform">
                    <thead>
                        <tr>
                            <th colspan="2" style="text-align: left;"> Order Form</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><label for="coffee">Coffee:</label></td>
                            <td>
                                <select name="coffee" id="coffee">
                                    <option value="">Select Coffee:</option>
                                    <option value="Boca Vila">Boca Vila</option>
                                    <option value="South Beach Rhythm">South Beach Rhythm</option>
                                    <option value="Pumpkin Paradise">Pumpkin Paradise</option>
                                    <option value="Sumatran Sunset">Sumatran Sunset</option>
                                    <option value="Bali Batur">Bali Batur</option>
                                    <option value="Double Dark">Doulble Dark</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="type">Type:</label></td>
                            <td>
                                <input type="radio" id="regular" name="type" value="Regular"><label for="regular">Regular</label><br>
                                <input type="radio" id="decaf" name="type" value="Decaffeinated"><label for="decaf">Decaffeinated</label>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="quantity">Quantity (in pounds):</label></td>
                            <td><input type="text" id="quantity" name="quantity" min="1" size="3" value="';?><?php if (isset($_POST['quantity'])) {
                                                                                                                    if (is_numeric($_POST['quantity'])) {
                                                                                                                            print $_POST['quantity'];
                                                                                                                            $okay = TRUE; 
                                                                                                                        } else { $okay = FALSE; } 
                                                                                                                    } else {$okay = FALSE;} ?> <?php print'"></td>
                        </tr>
                        <tr>
                            <td><label for="name">Name:</label></td>
                            <td><input type="text" id="name" name="name" value="';?><?php print $_POST['name'] ?? ""; ?> <?php print '"></td>
                        </tr>
                        <tr>
                            <td><label for="email">E-mail address:</label></td>
                            <td><input type="text" id="email" name="email" value="'; ?> <?php if (isset($_POST['email'])) {
                                                                                                print $_POST['email'] ?? "";
                                                                                                $okay= TRUE;
                                                                                                } else {$okay = FALSE;} ?> <?php print '"></td>
                        </tr>
                        <tr>
                            <td><label for="telephone">Telephone #:</label></td>
                            <td><input type="text" id="telephone" name="telephone" maxlength="10" size="10" value="'; ?> <?php if (isset($_POST['telephone'])) {
                                                                                                                                if (is_numeric($_POST['telephone'])) {
                                                                                                                                        print $_POST['telephone'] ?? "";
                                                                                                                                        $okay = TRUE; 
                                                                                                                                    } else { $okay = FALSE; } 
                                                                                                                                } else {$okay = FALSE;} ?><?php print '"></td>
                        </tr>
                        <tr>
                            <td><label for="address">Address:</label></td>
                            <td><input type="text" id="address" name="address" value="'; ?> <?php if (isset($_POST['address'])) {
                                                                                                    print $_POST['address'] ?? "";
                                                                                                    $okay= TRUE;
                                                                                                    } else {$okay = FALSE;} ?><?php print '"></td>
                        </tr>
                        <tr>
                            <td><label for="city">City:</label></td>
                            <td><input type="text" id="city" name="city" value="'; ?> <?php if (isset($_POST['city'])) {
                                                                                                print $_POST['city'] ?? "";
                                                                                                $okay= TRUE;
                                                                                                } else {$okay = FALSE;} ?><?php print '"></td>
                        </tr>
                        <tr>
                            <td><label for="state">State:</label></td>
                            <td><input type="text" id="state" name="state" maxlength="2" size="2" value="'; ?> <?php if (isset($_POST['state'])) {
                                print $_POST['state'] ?? "";
                                $okay= TRUE;
                                } else {$okay = FALSE;} ?><?php print '"></td>
                        </tr>
                        <tr>
                            <td><label for="state">Zip:</label></td>
                            <td><input type="text" id="zip" name="zip" size="5" minlength="5" maxlength="5" value="'; ?> <?php if (isset($_POST['zip'])) {
                                                                                                                            if (is_numeric($_POST['zip'])) {
                                                                                                                                    print $_POST['zip'] ?? "";
                                                                                                                                    $okay = TRUE; 
                                                                                                                                } else { $okay = FALSE; } 
                                                                                                                            } else {$okay = FALSE;} ?><?php print '"></td>
                        </tr>
                        <tr>
                            <td><button type="submit" name="submit" value="Submit">Submit</button></td>
                            <td><button type="reset" name="reset" value="Reset">Reset</button></td>
                        </tr>
                    </tbody>
                </table>
            </form>
                ';
            break;
        case TRUE :
            print "
            <span class=\"order-body\">
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
            </span>
            <br>
            ";
            print "<a href=\"coffee_order.php\">Return to order form</a>";
            break;
    }

 
} else {
    print '
    <h2>Order Form</h2>
    <form action="coffee_order.php" method="POST">
    <table id="orderform">
        <thead>
            <tr>
                <th colspan="2" style="text-align: left;"> Order Form</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><label for="coffee">Coffee:</label></td>
                <td>
                    <select name="coffee" id="coffee">
                        <option value="">Select Coffee:</option>
                        <option value="Boca Vila">Boca Vila</option>
                        <option value="South Beach Rhythm">South Beach Rhythm</option>
                        <option value="Pumpkin Paradise">Pumpkin Paradise</option>
                        <option value="Sumatran Sunset">Sumatran Sunset</option>
                        <option value="Bali Batur">Bali Batur</option>
                        <option value="Double Dark">Doulble Dark</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="type">Type:</label></td>
                <td>
                    <input type="radio" id="regular" name="type" value="Regular"><label for="regular">Regular</label><br>
                    <input type="radio" id="decaf" name="type" value="Decaffeinated"><label for="decaf">Decaffeinated</label>
                </td>
            </tr>
            <tr>
                <td><label for="quantity">Quantity (in pounds):</label></td>
                <td><input type="text" id="quantity" name="quantity" min="1" size="3" value="';?><?php if (isset($_POST['quantity'])) {
                                                                                                        if (is_numeric($_POST['quantity'])) {
                                                                                                                print $_POST['quantity'];
                                                                                                                $okay = TRUE; 
                                                                                                            } else { $okay = FALSE; } 
                                                                                                        } else {$okay = FALSE;} ?> <?php print'"></td>
            </tr>
            <tr>
                <td><label for="name">Name:</label></td>
                <td><input type="text" id="name" name="name" value="';?><?php print $_POST['name'] ?? ""; ?> <?php print '"></td>
            </tr>
            <tr>
                <td><label for="email">E-mail address:</label></td>
                <td><input type="text" id="email" name="email" value="'; ?> <?php if (isset($_POST['email'])) {
                                                                                    print $_POST['email'] ?? "";
                                                                                    $okay= TRUE;
                                                                                    } else {$okay = FALSE;} ?> <?php print '"></td>
            </tr>
            <tr>
                <td><label for="telephone">Telephone #:</label></td>
                <td><input type="text" id="telephone" name="telephone" maxlength="10" size="10" value="'; ?> <?php if (isset($_POST['telephone'])) {
                                                                                                                    if (is_numeric($_POST['telephone'])) {
                                                                                                                            print $_POST['telephone'] ?? "";
                                                                                                                            $okay = TRUE; 
                                                                                                                        } else { $okay = FALSE; } 
                                                                                                                    } else {$okay = FALSE;} ?><?php print '"></td>
            </tr>
            <tr>
                <td><label for="address">Address:</label></td>
                <td><input type="text" id="address" name="address" value="'; ?> <?php if (isset($_POST['address'])) {
                                                                                        print $_POST['address'] ?? "";
                                                                                        $okay= TRUE;
                                                                                        } else {$okay = FALSE;} ?><?php print '"></td>
            </tr>
            <tr>
                <td><label for="city">City:</label></td>
                <td><input type="text" id="city" name="city" value="'; ?> <?php if (isset($_POST['city'])) {
                                                                                    print $_POST['city'] ?? "";
                                                                                    $okay= TRUE;
                                                                                    } else {$okay = FALSE;} ?><?php print '"></td>
            </tr>
            <tr>
                <td><label for="state">State:</label></td>
                <td><input type="text" id="state" name="state" maxlength="2" size="2" value="'; ?> <?php if (isset($_POST['state'])) {
                    print $_POST['state'] ?? "";
                    $okay= TRUE;
                    } else {$okay = FALSE;} ?><?php print '"></td>
            </tr>
            <tr>
                <td><label for="state">Zip:</label></td>
                <td><input type="text" id="zip" name="zip" size="5" minlength="5" maxlength="5" value="'; ?> <?php if (isset($_POST['zip'])) {
                                                                                                                if (is_numeric($_POST['zip'])) {
                                                                                                                        print $_POST['zip'] ?? "";
                                                                                                                        $okay = TRUE; 
                                                                                                                    } else { $okay = FALSE; } 
                                                                                                                } else {$okay = FALSE;} ?><?php print '"></td>
            </tr>
            <tr>
                <td><button type="submit" name="submit" value="Submit">Submit</button></td>
                <td><button type="reset" name="reset" value="Reset">Reset</button></td>
            </tr>
        </tbody>
    </table>
</form>
    ';
}


?>
</body>
