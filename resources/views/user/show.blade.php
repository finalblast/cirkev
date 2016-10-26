@extends('master')


@section('title', $user->name)


@section('content')
    <div class="row">
        <div class="col-md-6">
            <h3><a href="{{ URL::current() }}">{{ $user->name }}</a></h3>
            <h4>O Autorovi</h4>
            <p>{!! $user->info_popis !!}  Je členom portála od {{ $user->created_at }}</p>
        </div>

        <div class="col-md-6">
            @if ($user->avatar)
                <div class="col-md-4">
                    <img class="img-rounded " src="{{ asset('users/' . $user->id . '/' . $user->avatar ) }} ">

                    <button class="btn-info btn-xs"> <a href="{{ route('user.edit', $user->id) }}" >Zmeniť foto</a></button>

                </div>
            @else
                <div>
                    <button class="btn-info btn-xs"> <a href="{{ route('user.edit', $user->id) }}" >Zmeniť foto</a></button>
                    <i class="fa fa-user fa-5x"></i> Profilová fotka
                </div>
            @endif
        </div>

    </div>


        <div class="col-md-9">
                    <h3>Všetky články od <strong> {{ $user->name }}</strong></h3>
                    @forelse( $user->posts as $post )

                <div class="media">

                    <div class="col-md-3  img-rounded"
                         style=" margin-right: 10px;">
                       @include('partials.image_title')
                    </div>


                    <div class="media-body">
                        <h3 class="media-heading"> <a href="{{ url($post->slug) }}">{{ $post->title }}</a></h3>
                        <p>
                            <time datetime="{{ $post->datetime }}" style="">
                                <span style="color: rgb(166, 164, 7)">{{ $post->user->name }}</span> <span class=""> {{ $post->created_at }} | <i class="fa fa-comment"> ({{ $post->comments->count() }}) </i> |
                        <i class="fa fa-eye"> ({{ $post->count_view }}x) </i> | Kat.({{ $post->group->name }})</span>
                            </time>
                        </p>

                    </div>
                </div>

                    @empty
                        <p>Nemáte žiadne príspevky</p>
                    @endforelse

        </div>






@endsection