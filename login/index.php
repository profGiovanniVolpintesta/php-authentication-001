<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <h1>Login</h1>
    <form action="./auth.php" method="POST">
        <table>
            <tr>
                <td>
                    <label>username</label>
                </td>
                <td>
                    <label>password</label>
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
                    <input type="submit" value="Login">
                </td>
            </tr>
        </table>        
    </form>
</body>
</html>