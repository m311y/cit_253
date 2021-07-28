<!--
    Name: Melissa Hardwick
    Date: 07/28/2021
    Purpose: Assignment 10 - Script 13.8
    This script lists every quote
-->
<?php 
    //define the title and include the header
    define('TITLE', 'View All Quotes');
    include('templates/header.html');


    //Print a header
    print '<h2>All Quotes</h2>';

    //Restrict access to administrators only

    if (!is_administrator()) {
        print '<h2>Access Denied!</h2>
        <p class="error">YOu do not have permission to access this page.</p>';
        include('templates/footer.html');
        exit();

    }

    //Include database connection
    include('includes/mysqli_connect.php');

    //Define the query
    $query = 'SELECT id, quote, source, favorite
    FROM quotes
    ORDER BY date_entered DESC';

    //Run the query
    if ($result = mysqli_query($dbc, $query)) {

        //Retrieve returned records
        while ($row = mysqli_fetch_array($result)) {

            //Print the record
            print "<div><blockquote>{$row['quote']}</blockquote>- {$row['source']}\n";

            //Is this a favorite?
            if ($row['favorite'] == 1) {
                print '<strong>Favorite!</strong>';

            }

            //Add administrative links
            print "<p><b>Quote Admin:</b> <a href=\"edit_quote.php?id={$row['id']}\">Edit</a> <->
		        <a href=\"delete_quote.php?id={$row['id']}\">Delete</a></p></div>\n";

        } //End of while loop

    } else { //Query did not run
        print '<p class="error">Could not retrieve the data because: <br>' . mysqli_error($dbc) . '</p>
            <p> The query being run was: '. $query . '</p>';

    }

//close the connection
mysqli_close($dbc);

//Include the footer
include('templates/footer.html');
    
?>