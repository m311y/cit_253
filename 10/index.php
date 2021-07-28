<!--
    Name: Melissa Hardwick
    Date: 07/28/2021
    Purpose: Assignment 10 - Script 13.11
    This is the home page for this site. It displays:
        - The most recent quote (default)
        - OR, a random quote
        - OR, a random favorite quote
-->

<?php 

    //include the header
    include('templates/header.html');

    //include the database connection
    include('includes/mysqli_connect.php');

    //Define the query
    //Change the particulars depending upon values passed in the URL:
    if (isset($_GET['random'])) {
        $query = 'SELECT id, quote, source, favorite FROM quotes ORDER BY RAND() DESC LIMIT 1';
    } elseif (isset($_GET['favorite'])) {
        $query = 'SELECT id, quote, source, favorite FROM quotes WHERE favorite=1 ORDER BY RAND() DESC LIMIT 1';
    } else {
        $query = 'SELECT id, quote, source, favorite FROM quotes ORDER BY date_entered DESC LIMIT 1';
    }

    //Run the query:
    if ($result = mysqli_query($dbc, $query)) {

        //Retrieve the returned record:
        $row = mysqli_fetch_array($result);

        //Print the record:
        print "<div><blockquote>{$row['quote']}</blockquote>- {$row['source']}";

        //Is this a favorite?
        if ($row['favorite'] == 1) {
            print ' <strong>Favorite!</strong>';
        }

        //Complete the DIV:
        print '</div>';

        //If the admin is logged in, display admin links for this record:
        if (is_administrator()) {
            print "<p><b>Quote Admin:</b> <a href=\"edit_quote.php?id={$row['id']}\">Edit</a> <->
            <a href=\"delete_quote.php?id={$row['id']}\">Delete</a>
            </p>\n";
        } else {
            print "<p> Please log into an administrator account to make an edit <a href=\"login.php\">Login!</a></p>";
        }

    } else { //Query didn't run.
        print '<p class="error">Could not retrieve the data because:<br>' . mysqli_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>';
    } //End of query IF.

//Close the connection.
mysqli_close($dbc);

print '<p><a href="index.php">Latest</a> <-> <a href="index.php?random=true">Random</a> <-> <a href="index.php?favorite=true">Favorite</a></p>';

//Include the footer.
include('templates/footer.html');
?>