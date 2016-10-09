@extends('master')


@section('title', $title)


@section('content')

	<section class="">
	{!! Form::open(['url' => 'post', 'method' => 'post', 'files'=> 'true', 'class' => 'post', 'id' => 'add-form']) !!}


		@include('posts.form')

	{!! Form::close() !!}
	</section>

@endsection