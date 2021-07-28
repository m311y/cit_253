<!--
    Name: Melissa Hardwick
    Date: 06/30/2021
    Assignment 2: Variables, Assignment Statements, and Arithmetic Operations
-->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Variables and Arithemtic Operations</title>

    </head>
    <body>
        <?php 
            //Declare Variables
            $number_one = rand(1, 100);
            $number_two = rand(1, 100);

            $addition = $number_one + $number_two;
            $difference = $number_two -  $number_one;
            $product = $number_one * $number_two;
            $division = $number_two / $number_one;
            $remainder = $number_two % $number_one;

            echo("$number_one + $number_two = $addition ");
            echo("<br>");
            echo("$number_two - $number_one = $difference");
            echo("<br>");
            echo("$number_one * $number_two = $product");
            echo("<br>");
            echo("$number_two / $number_one = $division");
            echo("<br>");
            echo("$number_two % $number_one = $remainder");


        ?>

    </body>
</html>