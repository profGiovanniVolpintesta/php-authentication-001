<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST))
{
    if (isset($_POST["username"]) && isset($_POST["password"]))
    {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $servername = "localhost";
        $dbUsername = "root";
        $dbPassword = "mysql";
        $dbname = "volpintesta_autenticazione_php";

        try {
            $conn = new PDO("mysql:host=$servername;,dbname=$dbname", $dbUsername, $dbPassword);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $sql = "SELECT username FROM users WHERE username = '$username' AND password = '$password';";
            $result = $conn->query($sql);
            
            if ($result->rowCount() > 0)
            {
                session_start();
                $_SESSION["user"] = $username;
                header("location:../home");
            }
            else
            {
                header("location:.?errorCode=2"); // username e password errati
            }
        } catch(PDOException $e) {
            // echo "Connection failed: " . $e->getMessage();
            http_response_code(500); // internal server error
        }
    }
    else
    {
        header("location:.?errorCode=2"); // username e password errati
    }
}
else
{
    header("location:.?errorCode=1"); // errore generico
}


/*
$servername = "localhost";
$dbUsername = "root";
$dbPassword = "mysql";
$dbname = "volpintesta_autenticazione_php";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbUsername, $dbPassword);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  

  $result = $conn->query("");
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
  */
?>