<x-layout>
    <x-card>
        <h1>Log In</h1>

        <form method="POST" action="/users/authenticate">
            @csrf
            <div>
                <label for="email">email</label>
                <input type="email" name="email" />
            </div>
            <div>
                <label for="password">password</label>
                <input type="password" name="password" />
            </div>
            <div>
                <label for="checkbox">Remember Me</label>
                <input id="checkbox" type="checkbox" name="remember" />
            </div>
            <div>
                <button type="submit">Log In</button>
                <a href="#">Forgot Password?</a>
            </div>
        </form>
    </x-card>
</x-layout>