<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
        <h1>Log In</h1>

        <form method="POST" action="/users/authenticate">
            <label for="email">email</label>
            <input id="email" type="email" name="email" /><br>
            <label for="password">password</label>
            <input id="password" type="password" name="password" /><br>
            <label for="checkbox">Remember Me</label>
            <input id="checkbox" type="checkbox" name="rememberMe" /><br>

            <button type="submit">Log In</button>
            <a href="#">Forgot Password?</a>
        </form>
    </div>
    
</body>
</html>