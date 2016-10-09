@extends('master')


@section('title', isset($title) ? strip_tags($title) : 'All posts')


@section('content')
    @include('flash::message')
	<section class="post-list">

		<h1 class="box-heading text-muted">
			{!! $title or "this is a blog, bitch" !!}
		</h1>

        <div class="col-md-6">

        <h3>Názvy kategórií</h3>
		@forelse( $groups as $group )

            <ul>
            <li> <a href="{{ url('kategorie' ,$group->id) }}"> {{ $group->name }}</li></a>
            </ul>

		@empty
			<p>Nie sú žiadne príspevky!</p>
		@endforelse

    </div>


        <div class="col-md-6">

            <h3>Pridať novú kategóriu</h3>
            {!! Form::open(['url' => 'kategorie', 'method' => 'post', 'class' => 'post', 'id' => 'add-form']) !!}
            <div class="form-group">
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'nová kategória']) !!}
            </div>
            {!! Form::button('Pridať kategóriu', ['type' => 'submit', 'class' => 'btn btn-primary pull-right']) !!}
            {!! Form::close() !!}
        </div>


@endsection


@section('side')
    {{--@include('modul.statistika')--}}
    {{--@include('modul.latestcom')--}}
    {{--@include('modul.category')--}}



@endsection

