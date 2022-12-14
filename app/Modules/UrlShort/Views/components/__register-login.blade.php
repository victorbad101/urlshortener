<x-app>
    @auth()
        Hello {{auth()->user()->name}}
        <p></p>
        <form action="{{ route('user.signout', auth()->id()) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit">Submit</button>
        </form>
    @else
        <a href="{{ route('user.signup.create') }}">Sign Up</a>

        <a href="{{ route('user.signin.create') }}">Login</a>

    @endauth
</x-app>