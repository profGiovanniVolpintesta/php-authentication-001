<?php

require_once "../scripts/dbConnection.php";


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST))
{
    if (isset($_POST["username"]) && isset($_POST["password"]))
    {
        $username = $_POST["username"];
        $password = $_POST["password"];

        try {
            echo "stop 1<br>";

            $conn = connectToDb();
            // set the PDO error mode to exception

            echo "stop 2<br>";

            $sql = "INSERT INTO users(username, password, userType) VALUES ($username, $password, 'COACH'),";
            echo $sql + "<br>";

            if ($conn->exec($sql))
            {
                echo "stop 3<br>";
                //header("location:.");
            }
            else
            {
                header("location:.?errorCode=3"); // operazione fallita
            }
        } catch(PDOException $e) {
            // echo "Connection failed: " . $e->getMessage();
            http_response_code(500); // internal server error
        }
    }
    else
    {
        header("location:.?errorCode=4"); // dati mancanti
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