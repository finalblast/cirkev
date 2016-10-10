@extends('master')


@section('title', isset($title) ? strip_tags($title) : 'All posts')


@section('content')
    @include('flash::message')
	<section class="post-list">

		<h1 class="box-heading text-muted">
			{!! $title or "this is a blog, bitch" !!}
		</h1>
        <div class="col-sm-4">
            <div class="panel panel-danger">
                <div class="panel-heading">Názvy kategórií</div>
                {!! Form::open(['url' => 'kategorie', 'method' => 'post', 'class' => 'post', 'id' => 'add-form']) !!}                <div class="panel-footer">
                    <div class="input-group">
                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'nová kategória']) !!}
                        <span class="input-group-btn">
                        <button class="btn btn-primary btn-sm">Pridať</button>
                        </span>
                        {{ Form::close() }}
                    </div>
                </div>
                <div class="panel-body">

                    @forelse( $groups as $group )
                                    <p><a href="{{ url('kategorie' ,$group->id) }}"> {{ $group->name }} - ({{ $group->id }})</li></a></p>
                    @empty
                        Žiadna kategória.
                    @endforelse
                </div>

            </div>
        </div>

{{--Email list--}}
    <div class="col-md-4">
        <div class="panel panel-primary">
            <div class="panel-heading">Emaily</div>
            <div class="panel-body">
                @forelse( $users as $user )
                    <p><a href=""> ({{ $user->id }}) {{ $user->name }} - ({{ $user->send_email }})</li></a></p>
                @empty
                    Žiadna kategória.
                @endforelse

            </div>
        </div>


    </div>


@endsection


@section('side')
    {{--@include('modul.statistika')--}}
    {{--@include('modul.latestcom')--}}
    {{--@include('modul.category')--}}



@endsection

