<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
</head>
<body>
     <?php 

        session_start();

        if (isset($_SESSION) && isset($_SESSION["user"]))
        {
            $user = $_SESSION["user"];
            echo "<h1>Homepage</h1>";
            echo "Benvenuto $user!";
            echo '<button type="button" onclick="window.location.href=\'../login/logout.php\'">Logout</button>';
        }
        else
        {
            echo "<h1>Homepage</h1>";
            echo '<button type="button" onclick="window.location.href=\'../login\'">Login</button>';
        }

        // verificare di aver settato un utente dopo il login riuscito
        // se è vero, mostro una homepage di benvenuto con un tasto di logout

        // se è falso, mostro una homepage non loggata con un tasto di login  
     
     ?>


<!--
    Homepage non loggata<br>
    <button type="button" onclick="window.location.href='../login'">Login</button>

-->

</body>
</html>