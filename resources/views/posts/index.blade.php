@extends('master')

@section('autor', isset ( $post->user->name) ?  strip_tags($post->user->name) : 'Gabriel Gajdoš' )

@section('title', isset($title) ? strip_tags($title) : 'Najnovšie príspevky')

@section('banner_hore')
    @include('partials.carousel')
    @endsection


@section('content')
<div class="row">@include('modul.spravy')</div>


    <section class="post-list">
        <h1 class="box-heading text-muted">
            {!! $title or "Blog Cirkev Online.sk" !!}
        </h1>

        @forelse(array_chunk($posts->all(), 3) as $row )
            <div class="row">
                @foreach($row as $post)
                    <div class="col-md-4 col-sm-6" style="margin-bottom: 20px;" >

                        <div style="box-shadow: 7px 7px 5px #888888;overflow: hidden; max-height: 145px;"> @include('partials.image_title')</div>
                        <div>
                            <h5> @if($post->video_link) <img src="{{ url('images/play_icon.png') }}"> @endif <a href="{{ url($post->slug) }}"><strong>{{ $post->title }}</strong></a></h5>

                            <time datetime="{{ $post->datetime }}" style=""></time>
                                <span class="author">{{ $post->user->name }}</span> <span class=""> {{ $post->created_at }} |
                                    {{--                                    <i class="fa fa-comment"> ({{ $post->comments->count() }}) </i> |--}}
                                    <i class="fa fa-eye"> ({{ $post->count_view }}x) </i>
                                    {{--                                    | Kat.({{ $post->group->name }})--}}
                                </span>

                        </div>
                    </div>
                @endforeach
            </div>

        @empty
            <p>Nie sú žiadne príspevky!</p>
        @endforelse

    </section>

    <div class="text-center"> {!! $posts->render() !!}</div>


@endsection


@section('side')
    @include('modul.category')
    @include('modul.verse')
    @include('modul.latestcom')
    @include('modul.statistika')
    {{--@include('modul.tags')--}}




@endsection

