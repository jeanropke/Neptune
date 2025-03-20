@forelse($messages as $message)
    @include('home.ajax.guestbook.add', ['message' => $message])
@empty
    <div id="guestbook-empty-notes">Sem mensagens</div>
@endforelse
