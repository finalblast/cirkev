@extends('master')
@section('description', isset($metades) ? strip_tags($metades) : 'Cirkevonline.sk Kresťanský video-portál')
@section('autor', isset ( $post->user->name) ?  strip_tags($post->user->name) : 'Gabriel Gajdoš' )
@section('title', $post->title)


@section('content')
<span  style="font-size: 20px">Zamyslenie na dnes {{ date('d M Y') }}
	<section class="">
		<article class="full-post">

			<header class="post-header">
				<h1 class="box-heading">
						{{ $post->title }}
				</h1>
			</header>

			<div class="post-content col-md-8">

               <p> {!! $post->zamyslenie !!}</p>


			<div class="row"><strong class="pull-right" >{{ $post->autor }}</strong></div>

			<footer class="post-footer">
				<ul class="pager">
					@if($previous)
					<li class="previous"><a href="{{ URL::to( 'zamyslenia/' . $previous ) }}"><< Včera</a></li>
					@endif

					@if($next)
					<li class="next"><a class="pull-right" href="{{ URL::to( 'zamyslenia/' . $next ) }}">Zajtra >></a></li>
						@endif
				</ul>
			</footer>
			</div>

			<div class="col-sm-4">Novozmluvny verš na dnešný deň
				<blockquote class="blockquote">
				<p><strong> {{ $post->biblicky_vers }}</strong></p>
					<footer class="blockquote-footer">{{ $post->biblicky_vers_ref }}</footer>
				{{--<p class="pull-right">{{ $post->biblicky_vers_ref }}</p>--}}
				</blockquote>
				</div>

			<div class="col-sm-4">Starozmluvny verš na dnešný deň
				<blockquote class="blockquote">
					<p><strong> {{ $post->szvers_text }}</strong></p>
					<footer class="blockquote-footer">{{ $post->szvers_ref }}</footer>
					<blockquote>
			</div>
		</article>
	</section>

@endsection


@section('side')
		<div class="col-md-3 hidden-xs img-responsive"><img src="{{ asset('images/biblia1.jpg' ) }}"> </div>



@endsection