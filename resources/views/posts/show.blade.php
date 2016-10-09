@extends('master')
@section('description', isset($metades) ? strip_tags($metades) : 'Cirkevonline.sk Kresťanský video-portál')
@section('autor', isset ( $post->user->name) ?  strip_tags($post->user->name) : 'Gabriel Gajdoš' )
@section('title', $post->title)


@section('content')


	<section class="">
		<article class="full-post">

			<header class="post-header">
				<h1 class="box-heading">
					<a href="{{ url($post->slug) }}">
						{{ $post->title }}
					</a>

					@can('edit-post', $post)
                    <a href="{{ route('post.delete', $post->id) }}" class="btn btn-xs edit-link pull-right">&times;</a>
                    <a href="{{ route('post.edit', $post->id) }}" class="btn btn-xs edit-link pull-right">upraviť</a>
					@endcan

					<time datetime="{{ $post->datetime }}">
						<small>{{ $post->created_at }} | <i class="fa fa-eye"></i> ({{ $post->count_view }}x) - Napísal
                            {{ $post->user->name }}</small>
					</time>
			</header>

			<div class="post-content">

                {{--{!! $post->video_link !!}--}}
                @if ($post->video_link)
                    @section('video-fool')
                    <div class="embed-responsive embed-responsive-16by9" style="margin-bottom: 20px">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{ $post->video_link }}?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
                    </div>
                @endsection
                @endif

                {!! htmlspecialchars_decode ($post->rich_text) !!}


                <p class="written-by small pull-right">
                    <small>- Napísal
                        <a href="{{ url('user', $post->user->slug) }}">{{ $post->user->name }}</a>
                    </small>
                </p>

                <div id="fb-root"></div>
                <script>(function(d, s, id) {
                        var js, fjs = d.getElementsByTagName(s)[0];
                        if (d.getElementById(id)) return;
                        js = d.createElement(s); js.id = id;
                        js.src = "//connect.facebook.net/sk_SK/sdk.js#xfbml=1&version=v2.7&appId=1586103578324591";
                        fjs.parentNode.insertBefore(js, fjs);
                    }(document, 'script', 'facebook-jssdk'));</script>

                <div class="fb-share-button" data-href="{{ url($post->slug) }}" data-layout="button_count" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">Zdieľať</a></div>


            @if($post->picture)
                    <div class="row">
                        <div class="col-md-5">
                            <a href="#" class="thumbnail" data-toggle="modal" data-target="#lightbox">
                            <img src="{{ asset('posts/' . $post->id . '/' . $post->picture ) }}" alt="{{ $post->title }}" style="width: 100%">
                            </a>
                        </div>
                    </div>
                @endif

                @can('edit-post', $post)
                <div class="row ">
                    <a class="pull-right btn btn-default btn-xs" href="{{ route('post.delete', $post->id) }}">Zmazať článok</a>
                    <a class="pull-right btn btn-danger btn-xs" href="{{ route('post.edit', $post->id) }}">Upraviť článok</a>
                </div>
                @endcan
			</div>

			<footer class="post-footer">
				@include('partials.tags')
                {{--  @include('partials.comments')--}}

               {{--Výzva /--}}
                {{--<div style="padding: 15px;">--}}
                {{--<h3 style="color: red">Pomôžte autorovi s propagáciou príspevku.</h3>--}}
                {{--<span style="font-size: 18px">tým, že budete sdieľajte tento príspevok, alebo sa zapojte prakticky. Návod ako môžete--}}
                    {{--pomôcť vám zašleme obratom.--}}
                    {{--&nbsp;&nbsp;&nbsp;<a href="#nid" data-toggle="modal" data-target="#contact" data-whatever="@mdo" >Napíšte nám!</a>--}}

                        {{--Modal pre kontaktný formulár --}}
                              {{--<div class="modal fade" id="contact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">--}}
                        {{--<div class="modal-dialog" role="document">--}}
                            {{--<div class="modal-content">--}}
                                {{--<div class="modal-header">--}}
                                    {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>--}}
                                    {{--<h4 class="modal-title" id="exampleModalLabel">Napíšte nám!</h4>--}}
                                {{--</div>--}}
                                {{--@include('partials.contact-form')--}}
                            {{--</div>--}}
                        {{--</div>--}}
                {{--</span></div>--}}
{{--Koniec výzvyy--}}
			</footer>

		</article>
	</section>

@endsection


@section('side')

    <div class="panel panel-danger">
        @if($post->user->avatar)
            <a href="{{ url('user', $post->user->slug) }}"><img class="img-rounded" src="{{ asset('users/' . $post->user->id . '/' . $post->user->avatar ) }}"  style="width: 100%"></a>
        @else
            <a href="{{ url('post', $post->slug) }}"><img src="{{ asset('image/foto.jpg') }}" style="width: 100%"></a>
        @endif
            <div data-toggle="tooltip" data-placement="bottom" title="{{$post->user->info_popis}}" class="panel-heading">{{ $post->user->name }} <button class="btn btn-primary btn-xs pull-right" data-toggle="modal" data-target="#user_sprava" data-whatever="@mdo" > Pozdravte autora</div>
    </div>


    {{--Modal picture of post --}}
    <div id="lightbox" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <button type="button" class="close hidden" data-dismiss="modal" aria-hidden="true">×</button>
            <div class="modal-content">
                <div class="modal-body">
                    <img src="{{ asset('posts/' . $post->id . '/' . $post->picture ) }}" alt="" />
                </div>
            </div>
        </div>
    </div>


{{--Modal message for author --}}
    <div class="modal fade" id="user_sprava" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Správa pre {{ $post->user->name }}</h4>
                </div>
                @include('partials.contact-form-user')
            </div>
        </div>


@endsection
