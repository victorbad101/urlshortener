<x-app>
    <table>
        @foreach($urls as $url)
            <tr>
                <th>URL</th>
                <th>URL SHORT</th>
            </tr>
            <tr>
                <th>{{ $url->url_name }}</th>
                <th>{{ $url->url_short }}</th>
            </tr>
        @endforeach
    </table>
</x-app>