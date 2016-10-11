@extends('master')


@section('title', isset($title) ? strip_tags($title) : 'All posts')


@section('content')
    @include('flash::message')
	<section class="post-list">

		<h1 class="box-heading text-muted">
			{!! $title or "this is a blog, bitch" !!}
		</h1>


{{--Email list--}}
        <table class="table table-hover table-bordered">
            <thead class="thead-primary">
            <tr>
                <th>id</th>
                <th>Meno</th>
                <th>Email</th>
                <th>Odber</th>
            </tr>
            </thead>
            <tbody>
                @forelse( $users as $user )
                    <tr>
                    <td>{{ $user->id }}</td>
                    <td><a href="{{ url('kategorie', $user->id) }}">{{ $user->name }}</a></td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->send_email }}</td>
                    </tr>
                @empty
                    Žiadna kategória.
                @endforelse
            </tbody>
        </table>

    </section>


@endsection


@section('side')
    <div class="col-sm-12">
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
    {{--@include('modul.statistika')--}}
    {{--@include('modul.latestcom')--}}
    {{--@include('modul.category')--}}



@endsection

