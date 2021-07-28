<!--
    Name: Melissa Hardwick
    Date: 07/09/2021
    Purpose: Assignment 4 - Paycheck Calculator
-->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="styles.css">
        <title>Paycheck Calculator</title>
    </head>
    <body>
        <?php
        //Declare variable values from the user_input form
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $weeklyhours = $_POST['weeklyhours'];
        $hourlyrate = $_POST['hourlyrate'];

        //Paycheck calculations
        $grosspay = $weeklyhours * $hourlyrate;
        $fedtax = $grosspay * .1065;
        $statetax = $grosspay * .04;
        $socialtax = $grosspay * .038;
        $medicare = $grosspay * .013;
        $totaltaxes = $fedtax + $statetax + $socialtax + $medicare;
        $netpay = $grosspay - $totaltaxes;

        print"
            <h1>Paycheck Information</h1>
            <p>Hello $fname $lname. This week you worked $weeklyhours hours, and based on the pay rate
            of $$hourlyrate per hour, your paycheck information is:</p>
            <table>
                <tr>
                    <td class=\"left-col\">Gross Pay:</td>
                    <td class=\"right-col\">$$grosspay</td>
                </tr>
                <tr>
                    <td class=\"left-col\">Federal Taxes:</td>
                    <td class=\"right-col\">$$fedtax</td>
                </tr>
                <tr>
                    <td class=\"left-col\">State Taxes:</td>
                    <td class=\"right-col\">$$statetax</td>
                </tr>
                <tr>
                    <td class=\"left-col\">Social Security Taxes:</td>
                    <td class=\"right-col\">$$socialtax</td>
                </tr>
                <tr>
                    <td class=\"left-col\">Medicare Taxes:</td>
                    <td class=\"right-col\">$$medicare</td>
                </tr>
                <tr>
                    <td class=\"left-col\">Total Taxes:</td>
                    <td class=\"right-col\">$$totaltaxes</td>
                </tr>
                <tr>
                    <td class=\"left-col\">Net Pay:</td>
                    <td class=\"right-col\">$$netpay</td>
                </tr>
            </table>

            <a href=\"user_input.html\">Return to input form</a>
        ";
        ?>
    </body>
</html>