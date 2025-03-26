@forelse($messages as $message)
    @include('home.widgets.ajax.guestbook.add', ['message' => $message])
@empty
    <div id="guestbook-empty-notes">Sem mensagens</div>
@endforelse
