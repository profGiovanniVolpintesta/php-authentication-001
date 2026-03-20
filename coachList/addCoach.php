<?php

require_once "../scripts/dbConnection.php";


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST))
{
    if (isset($_POST["username"]) && isset($_POST["password"]))
    {
        $username = $_POST["username"];
        $password = $_POST["password"];

        try {
            $conn = connectToDb();
            // set the PDO error mode to exception

            $sql = "INSERT INTO users(username, password, userType) VALUES ('$username', '$password', 'COACH');";
            // echo "$sql <br>";

            if ($conn->exec($sql))
            {
                header("location:.?errorCode=success");
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

?>