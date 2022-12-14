<x-app>
    <form action="{{ route('user.signup.store') }}" method="post">
        @csrf
        <p>Name</p><input name="name" id="name">
        <p>Email</p><input type="email" name="email" id="email">
        <p>Password</p><input type="password" name="password" id="password">
        <p></p>
        <button type="submit">Submit</button>
    </form>
</x-app>