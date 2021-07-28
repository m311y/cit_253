<!--
    Name: Melissa Hardwick
    Date: 07/25/2021
    Purpose: Assignment 9 - Elementary Math and Functions
-->

<style type="text/css">
    .txt {font-family:Courier New, Courier, Monospaced;
        font-size: 30pt; font-weight: bold;
        text-align: right;
        }
    hr {
        border-width:0;
        background-color: #000000;
        height:1.5px;
    }
    #c {
        border-radius: 2px;
        width:80%;
        font-size:25pt;
        text-align:right;
    }
    #submit {
        margin-top:10px;
    }
    form {
        text-align: right;
        width: 9em;
        border: 1px solid black;
        padding: .5em;
        border-radius: 7px;
        margin-top: 1em;
    }
    #submit {
        width: 10em;
        cursor: pointer;
    }
 </style>
 <?php
    //define title
    define('TITLE', 'Test Your Addition Skills');

    if (isset($_GET["a"])) {$msg="Fb";$a=$_GET['a'];} else {$a="";}
    if (isset($_GET["b"])) {$b=$_GET['b'];} else {$msg="a";$b="";}
    if (isset($_GET["c"])) {$c=$_GET['c'];} else {$c="";}

    if ($a=="") {
        $a = rand(1,99); $b = rand(1,99); $c = "";
        $msg="Fill in the blank to answer this math question.";
    }
    elseif (is_numeric($c) && $a+$b==$c) {
        $a = rand(1,99); $b = rand(1,9); $c = "";
        $msg="Correct! Now try this new problem.";
    }
    elseif (!is_numeric($c)) {
        $c = "";
        $msg= "You must enter a number and press the submit button.";
    }
    else {
        $msg= "Incorrect! Please try again.";
    }
    
    print "
        <h1>$msg</h1>
        <form id=\"mathform\" action=\"#\" methof=\"GET\">
        <input id=\"a\" name=\"a\" type=\"hidden\" value=\"$a\">
        <span class = 'txt'>${a}</span><br>
        <input id=\"b\" name=\"b\" type=\"hidden\" value=\"$b\">
        <span class ='txt'> + ${b}</span><br>
        <hr>
        <input id=\"c\" name=\"c\" type=\"text\" autofocus  /><br>
        <input id=\"submit\" type=\"submit\" value=\"submit\" name=\"submit\" form=\"mathForm\"><br>
        </form>
    ";
  



   


 ?>