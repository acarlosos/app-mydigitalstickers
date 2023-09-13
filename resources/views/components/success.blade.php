@if (session('status'))
    <p class="alert-success p-3">
        {{ session('status') }}
    </p>
@endif