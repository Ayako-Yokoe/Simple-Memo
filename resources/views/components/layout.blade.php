<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Simple Memo</title>
</head>
<body>
    <nav>
        <a href="/">Simple Memo</a>
        <ul>
            @auth
                <li>
                    <form method="POST" action="/logout">
                        @csrf
                        <button type="submit">Log Out</button>
                    </form>
                </li>
                <li><a href="/register">Register</a></li>
            @else
                <li><a href="/login">Log In</a></li>
                <li><a href="/register">Register</a></li>
            @endauth
            
        </ul>
    </nav>
    <main>
        {{ $slot }}
    </main>
</body>
</html>