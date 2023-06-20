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
        <h1>Register</h1>

        <form method="POST" action="/users">
            @csrf

            <div>
                <label for="email">email</label>
                <input type="email" name="email" value="{{old('email')}}" />

                @error('email')
                    {{ $message }}
                @enderror
            </div>

            <div>
                <label for="password">password</label>
                <input type="password" name="password" value="{{old('password')}}" />

                @error('password')
                    {{ $message }}
                @enderror
            </div>

            <div>
                <button type="submit">Register</button>
                <a href="/login">Already have an account?</a>
            </div>
        </form>
    </div>
</body>
</html>