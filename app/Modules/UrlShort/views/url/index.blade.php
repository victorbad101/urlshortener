<x-app>
    <table>
        @foreach($urls as $url)
            <tr>
                <th>URL</th>
            </tr>
            <tr>
                <th><a href="{{ route('test', $url->id) }}">Short.ly/{{ $url->slug }}</a></th>
            </tr>
        @endforeach
    </table>
    <a href="{{ route('url.create') }}">Create</a>
</x-app>