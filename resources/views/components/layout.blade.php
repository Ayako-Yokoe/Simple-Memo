<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Simple Memo</title>
</head>
<body>
    <nav class="flex justify-between items-center bg-blue-700 text-white p-6">
        <a href="/" class="hover:text-blue-300">
            <span class="text-xl">Simple Memo</span>
        </a>

        <ul class="flex text-lg space-x-8">
            @auth
                <li>
                    <form method="POST" action="/logout">
                        @csrf
                        <button type="submit" class="hover:text-blue-300">
                            ログアウト
                        </button>
                    </form>
                </li>
                <li>
                    <a href="/register" class="hover:text-blue-300">
                        新規登録
                    </a>
                </li>
            @else
                <li>
                    <a href="/login" class="hover:text-blue-300">
                        ログイン
                    </a>
                </li>
                <li>
                    <a href="/register" class="hover:text-blue-300">
                        新規登録
                    </a>
                </li>
            @endauth
        </ul>
    </nav>

    <main>
        {{$slot}}
    </main>
</body>
</html>