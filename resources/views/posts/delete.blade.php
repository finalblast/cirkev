@extends('master')


@section('title', $post->title)


@section('content')
<style>
    form.post input, form.post textarea {
        background: rgba(233, 30, 99, 0.58);
    }
</style>
	<section class="">


			<header class="post-header">
                <h1 class="bg-danger">Chcete zmatať článok?</h1>
                <blockquote>
				<h3>
					<a href="{{ url('post', $post->slug) }}">
						{{ $post->title }} <small>Čítaný ({{ $post->count_view }})</small></a>
				</h3>

                {{ $post->teaser }}
                    <p>
                    {!! Form::model($post, ['route' => [ 'post.destroy', $post->id ], 'method' => 'delete', 'class' => 'post', 'id' => 'delete-form']) !!}
                    @can('edit-post', $post)
                   {!! Form::submit('Zmazať článok', ['class' =>'btn btn-danger']) !!} or {!! link_back('späť') !!}
                    @endcan
                    {!! Form::close() !!}
                </p>
			</header>

	</section>

@endsection