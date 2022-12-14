<x-app>
    <form action="{{ route('url.store') }}" method="post">
        @csrf
        <p>Url</p><input name="url_name" id="url_name">
        <button type="submit">Submit</button>
    </form>
</x-app>