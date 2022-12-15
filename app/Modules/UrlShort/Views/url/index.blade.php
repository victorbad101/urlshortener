<x-app>
    <x-__register-login/>
    <p></p>
    <table>
        <tr>
            <th>URL</th>
            <th>Owner</th>
            <th>Viewed</th>
        </tr>
        @foreach($urls as $url)
            <tr>
                <th><a href="{{ route('test', $url->slug) }}">Short.ly/{{ $url->slug }}</a></th>
                <th>{{ $url->author->name }}</th>
                @auth()

                    @php(
    $variabile = \App\Modules\UrlShort\Models\Url::where(function ($querry) {
        $querry->where('user_id', auth()->user()->id);
        })
          ->first()
        )

                    @php(
            $variabile = $variabile->
                author()->
                where('name', $url->author->name)
                ->first()
            )

                @else

                    @php(
                $variabile = null
                )

                @endauth
                @if($variabile)
                    <th>{{ $url->url_visits }}</th>
                    <th><a href="{{ route('url.edit', $url->slug) }}">Edit</a></th>
                @else
                    <th>Unknown</th>
                @endif
            </tr>
        @endforeach
    </table>
    <br>
    @auth()
        @if(isset($url))
        <a href="{{ route('url.show', $url->id) }}">My Urls</a>
        @endif
        <br/>
        <a href="{{ route('url.create') }}">Create</a>

    @endauth
</x-app>