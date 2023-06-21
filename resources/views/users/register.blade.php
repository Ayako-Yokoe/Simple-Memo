<x-layout>
    <x-card>
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
    </x-card>
</x-layout>