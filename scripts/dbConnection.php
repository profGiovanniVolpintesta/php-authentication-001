<?php

function connectToDb ()
{
    $servername = "localhost";
    $dbUsername = "root";
    $dbPassword = "mysql";
    $dbname = "volpintesta_autenticazione_php";

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbUsername, $dbPassword);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
}

?>