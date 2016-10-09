

<div id="discussion">
    <h2>Pridať komentár</h2>

    {!! Form::open(['route' => 'comment.store', 'method' => 'post', 'class' => 'post']) !!}

    {{-- Text Field --}}
    <div class="form-group">
        {!! Form::textarea('text', null, [
        'class' => 'form-control',
        'placeholder' => "komentujte slušne a nepoužívajte nadávky...",
        'rows' => 3,
        ]) !!}
    </div>

    {{-- Add comment Button --}}
    <div class="form-group">
        {!! Form::hidden('post_id', $post->id) !!}
        {!! Form::button('Vložiť komentár', [
        'type' => 'submit',
        'class' => 'btn btn-primary pull-right'
        ]) !!}
    </div>

    {!! Form::close() !!}


    {{-- List of comments --}}
    @if($post->comments)
        <ol class="comments">
            @foreach($post->comments as $comment)
                <li>
                    <img src="{{ $comment->user->avatar['tiny'] }}" alt="{{ $comment->user->name }}">

                    <header>
                        <a href="{{ url('user', $comment->user->id) }}">
                            <strong>{{ $comment->user->name }}</strong>
                        </a>
                        <small>{{ $comment->created_at }}</small>
                    </header>

                    <p>
                        {{ $comment->text }}
                    </p>
                </li>
            @endforeach
        </ol>
    @endif

</div>

