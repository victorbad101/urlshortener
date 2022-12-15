<x-app>
    <form action="{{ route('url.update', $url->slug) }}" method="post">
        @csrf
        @method('put')
        <p>Slug</p><input name="slug">
        <button type="submit">submit</button>
    </form>
</x-app>