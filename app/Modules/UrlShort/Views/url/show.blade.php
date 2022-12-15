<x-app>
    <table>
        <tr>
            <th>Urls</th>
        </tr>
    @foreach($urls as $url)
        <tr>
            <td>Short.ly/{{ $url->slug }}</td>
        </tr>
    @endforeach
    </table>
</x-app>