<!--
    Name: Melissa Hardwick
    Date: 07/28/2021
    Purpose: Assignment 10 - Script 13.1
    This script connects to the database and establishes the character set for communications
-->
<?php  
    //Connect
    $dbc = mysqli_connect('localhost', 'qconnect', 'BXSN0*B8d79GKAkX', 'myquotes');

    //Set the character set
    mysqli_set_charset($dbc, 'utf-8');
