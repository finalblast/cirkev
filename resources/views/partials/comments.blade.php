<h3>Komentáre</h3>

    {{-- List of comments --}}
    @forelse($comments as $comment)
        <div class="row">
            <div class="col-sm-1 thumbnail">
                    @if($post->user->avatar)
                        <img class="img-rounded" src="{{ asset('users/' . $comment->user->id . '/' . $comment->user->avatar ) }}">
                    @else
                        <a href="{{ url('post', $post->slug) }}"><img src="{{ asset('image/foto.jpg') }}" style="width: 100%"></a>
                    @endif
                    {{--<img class="img-responsive user-photo" src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png">--}}
            </div><!-- /col-sm-1 -->

            <div class="col-sm-11">
                <div class="panel panel-default">
                    {{--<div class="panel-heading">--}}
                    {{--<strong>{{ $post->user->name }}</strong> <span class="text-muted">commented 5 days ago</span>--}}
                    {{--</div>--}}
                    <div class="panel-body"><strong>{{ $comment->user->name }}:</strong>
                        {{ $comment->text }}
                        {{--@can('edit-comment')--}}
                        {{--<br><small class="pull-right">upraviť || <a href="{{ url('comment' , $comment->id ).'/delete'  }}">vymazať</a></small>--}}
                        {{--@endcan--}}
                    </div><!-- /panel-body -->
                </div><!-- /panel panel-default -->
            </div><!-- /col-sm-5 -->
        </div>
    @empty
        Pridajte prvý komentár
    @endforelse



@if(Auth::check())
    {!! Form::open(['route' => 'comment.store', 'method' => 'post', 'class' => 'post']) !!}
<div class="row">
   <div class="col-md-2">
        <img class="img-rounded" style="width: 62px" src="{{ asset('users/' . Auth::user()->id . '/' . Auth::user()->avatar ) }}">
   </div>
       <div class="col-md-10">
            <div class="form-group">
                {!! Form::text('text', null, [
                'class' => 'form-control',
                'placeholder' => "komentujte slušne a nepoužívajte nadávky...",
                ]) !!}
            </div>
       </div>
<div>
    <div class="row">
    {{-- Add comment Button --}}
    <div class="form-group">
        {!! Form::hidden('post_id', $post->id) !!}
        {!! Form::button('Vložiť komentár', [
        'type' => 'submit',
        'class' => 'btn btn-primary pull-right',
        'style' => 'margin-bottom: 20px'
        ]) !!}
    </div>
    </div>
    {!! Form::close() !!}

@endif
