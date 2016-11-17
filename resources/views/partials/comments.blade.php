<style>
    .fade-enter-active, .fade-leave-active {
        transition: opacity .7s
    }
    .fade-enter, .fade-leave-active {
        opacity: 0
    }




</style>
<h3>Komentáre</h3>
<div id="app">
    {{-- List of comments --}}
    @forelse($comments as $comment)

        <div class="row" style="    background: rgba(57, 61, 57, 0.15); padding: 15px; border-radius: 8px; margin-bottom: 28px;">
            <div class="col-sm-1 thumbnail">
                    @if(empty(!$comment->user->avatar))
                        <img class="img-rounded" src="{{ asset('users/' . $comment->user->id . '/' . $comment->user->avatar ) }}">
                @else
                    <i class="fa fa-user fa-4x"></i>
                    @endif
            </div><!-- /col-sm-1 -->

            <div class="col-sm-11">
                <div class="panel panel-default">
                    <div class="panel-body"><strong style="color: #000076">{{ $comment->user->name }}:</strong>
                        {{ $comment->text }}
                    </div><!-- /panel-body -->
                </div><!-- /panel panel-default -->

                {{--Reaction comment--}}
                <transition name="fade">
                <div v-show="showComment" class="form-group">
                    {!! Form::text('text', null, [
                    'class' => 'form-control',
                    'placeholder' => "Reagujem ...",
                    ]) !!}
                </div>
                </transition>
                {{--<button @click="showComment = ! showComment" class="pull-right btn btn-default btn-xs">Reagovať</button>--}}
                {{--End of reaction comment--}}
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
                'placeholder' => "komentujeme slušne ...",
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

    @else

        {!! Form::open(['route' => 'comment.store', 'method' => 'post', 'class' => 'post']) !!}
        <div class="row">
            <div class="col-md-1">
                <i class="fa fa-user fa-4x"></i>
            </div>
            <div class="col-md-11">
                <div class="form-group">
                    {!! Form::textarea('text', null, [
                    'class' => 'form-control',
                    'placeholder' => "komentujeme slušne ...",
                    'v-model' => 'newComment',
                    'rows' => 1,
                    ]) !!}
                </div>

                <transition name="fade">
                <div class=" row form-group-sm col-sm-3">
                    {!! Form::text('name', null, [
                    'class' => 'form-control',
                    'placeholder' => "Meno",
                    'v-if'=> 'newComment',
                    ]) !!}
                </div>
                </transition>

                <transition name="fade">
                <div class="form-group-sm col-sm-3">
                    {!! Form::email('email', null, [
                    'class' => 'form-control',
                    'placeholder' => "Email",
                    'v-if'=> 'newComment',
                    ]) !!}
                </div>
                </transition>

                {{--Recapcha--}}
                <transition name="fade">
                        <div v-show="newComment" class="col-md-4">
                            {!!  app('captcha')->display() !!}
                        </div>
                </transition>
                @if ($errors->has('g-recaptcha-response') )
                    <span class="help-block">
                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                    </span>
                @endif
            </div>
            <div>
                <div class="row">
                    {{-- Add comment Button --}}
                    <div class="form-group">
                        {!! Form::hidden('post_id', $post->id) !!}
                        {!! Form::button('Vložiť komentár', [
                        'type' => 'submit',
                        'class' => 'btn btn-primary pull-right',
                        ':disabled' => 'newComment == false' ,
                        'style' => 'margin-bottom: 20px'
                        ]) !!}
                    </div>
                </div>
    {!! Form::close() !!}

@endif
            </div>

            <script src="{{ asset('js/vue.js') }}"></script>


<script>
    new Vue ({
        el: '#app',
        data: {
            showComment: false,
            newComment: ''
        }
    });
</script>