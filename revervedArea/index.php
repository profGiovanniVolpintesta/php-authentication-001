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
    ?>
            <h1>Area riservata</h1>
            <br>Benvenuto <?php echo $user ?>
            <br>Cose riservate varie...
            <br>Cose riservate varie...
            <br>Cose riservate varie...
            <br>Cose riservate varie...
            <br><button type="button" onclick="window.location.href='../home'">Homepage</button>
            <br><button type="button" onclick="window.location.href='../login/logout.php'">Logout</button>
    <?php 
        }
        else
        {
            header("location:../home");
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