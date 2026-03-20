<?php 
    require_once "../scripts/dbConnection.php";
    require_once("../scripts/rightsChecking.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coach</title>
</head>
<body>

    <?php 
        session_start();

        if (isset($_SESSION) && isset($_SESSION["user"]))
        {
            $user = $_SESSION["user"];
            $conn = $_SESSION["dbConnection"];
    ?>
            <h1>Istruttori</h1>

            <?php
                if (checkCoachVisualizeRights()) 
                {
                    try {
                        $conn = connectToDb();
                        
                        $sql = "SELECT username from users where userType = 'COACH';";
                        // echo $sql;

                        $result = $conn->query($sql);
                        // var_dump($result);

                        if ($result->rowCount() > 0)
                        {
                            echo "<table>";
                            echo "<th>Username</th>";
                            
                            while ($row = $result->fetch())
                            {
                                echo "<tr><td>";
                                echo $row['username'];
                                echo "</td></tr>";
                            }

                            echo "</table>";
                        }

                        echo "<br><br>";
                    } catch(PDOException $e) {
                        // echo "Connection failed: " . $e->getMessage();
                        http_response_code(500); // internal server error
                    }
                }
            ?>

            <?php if (checkCoachCreateRights()) { ?>
                <form action="./addCoach.php" method="POST">
                    <table>
                        <tr>
                            <td>
                                <label>username</label>
                            </td>
                            <td>
                                <label>password</label>
                            </td>
                            <td>
                                <label>tipo</label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" id="user_text" name="username">
                            </td>
                            <td>
                                <input type="password" id="pwd_text" name="password">
                            </td>
                            <td>
                                <input type="submit" value="Aggiungi">
                            </td>
                        </tr>
                    </table>        
                </form>
            <?php } ?>

            <?php
                if (isset($_GET) && isset($_GET["errorCode"]))
                {
                    switch ($_GET["errorCode"])
                    {
                        case "success":
                            echo "Inserimento avvenuto con successo";
                            break;
                        case 1:
                            echo "Errore nell'inserimento dei dati";
                            break;
                        case 4:
                            echo "Dati mancanti";
                            break;
                        case 3:
                            echo "Operazione di inserimento fallita"; // probabilmente username già esistente
                            break;
                        default:
                            echo "Errore sconosciuto";
                    }
                }
            ?>
            
            <br>
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